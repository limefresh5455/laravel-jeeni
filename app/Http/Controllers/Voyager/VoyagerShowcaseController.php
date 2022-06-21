<?php

namespace App\Http\Controllers\Voyager;


use App\Helpers\DataTableHelper;
use App\Helpers\Jeeni;
use App\Models\Showcase;
use App\Models\User;
use App\Traits\BrowseDataTables;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use Yajra\DataTables\DataTables;

class VoyagerShowcaseController extends BaseVoyagerBaseController {
    use BreadRelationshipParser, BrowseDataTables;

    /**
     * @param Request $request
     * @return void
     * @throws AuthorizationException
     */
    protected function browse(Request $request) {
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $this->getSlug($request);

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model::select('*');
            return Datatables::of($query)
                ->editColumn('id', function($query) use ($dataType) {
                    return '<input type="checkbox" name="row_id" id="checkbox_'.$query->id.'" value="'.$query->id.'">';
                })
                ->editColumn('user_id', function($query) {
                    if($query->user instanceof User) {
                        return $query->user->name;
                    } else {
                        return $query->user_id;
                    }
                })
                ->editColumn('is_active', function($query) {
                    return ($query->is_active) ?
                        DataTableHelper::getStatusLabel('Active', true) :
                        DataTableHelper::getStatusLabel('InActive', false);
                })
                ->editColumn('action', function($query) use ($dataType) {
                    return DataTableHelper::getGeneralActions($dataType, $query);
                })
                ->editColumn('created_at', function($query) use ($dataType) {
                    return Jeeni::getFormattedDateToDisplay($dataType->created_at);
                })
                ->rawColumns(['action', 'id', 'avatar', 'is_active'])
                ->make(true);
        } else {
            abort(404);
        }
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param Request $request
     *
     * @return JsonResponse|RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        //$data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

        $data = Showcase::create([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'is_active' => $request->get('is_active') == 'on'
        ]);

        event(new BreadDataAdded($dataType, $data));

        if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }

    // POST BR(E)AD
    public function update(Request $request, $id): RedirectResponse
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof \Illuminate\Database\Eloquent\Model ? $id->{$id->getKeyName()} : $id;

        $model = app($dataType->model_name);
        $query = $model->query();
        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
            $query = $query->{$dataType->scope}();
        }
        if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
            $query = $query->withTrashed();
        }

        $data = $query->findOrFail($id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();

        // Get fields with images to remove before updating and make a copy of $data
        $to_remove = $dataType->editRows->where('type', 'image')
            ->filter(function ($item, $key) use ($request) {
                return $request->hasFile($item->field);
            });
        $original_data = clone($data);

        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

        // Delete Images
        $this->deleteBreadImages($original_data, $to_remove);

        $data->update(['user_id' => $request->get('user_id')]);

        event(new BreadDataUpdated($dataType, $data));

        if (auth()->user()->can('browse', app($dataType->model_name))) {
            $redirect = redirect()->route("voyager.{$dataType->slug}.index");
        } else {
            $redirect = redirect()->back();
        }

        return $redirect->with([
            'message'    => __('voyager::generic.successfully_updated')." {$dataType->getTranslatedAttribute('display_name_singular')}",
            'alert-type' => 'success',
        ]);
    }
}
