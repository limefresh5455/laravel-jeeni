<?php

namespace App\Http\Controllers\Voyager;

use App\Helpers\DataTableHelper;
use App\Helpers\Jeeni;
use App\Helpers\StorageHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;
use TCG\Voyager\Models\Role;
use Yajra\DataTables\DataTables;

/**
 *
 */
class VoyagerUserController extends BaseVoyagerUserController {
    /**
     * @param Request $request
     * @return void
     * @throws AuthorizationException
     */
    protected function browse(Request $request){
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
                ->editColumn('role_id', function($query) {
                    if($query->role instanceof Role) {
                        return $query->role->display_name;
                    } else {
                        return $query->role_id;
                    }
                })
                ->editColumn('avatar', function($query) {
                    return Jeeni::getJeeniImage($query->avatar);
                })
                ->editColumn('is_active', function($query) {
                    return ($query->is_active) ?
                        DataTableHelper::getStatusLabel('Active', true) :
                        DataTableHelper::getStatusLabel('InActive', false);
                })
                ->editColumn('action', function($query) use ($dataType) {
                    return DataTableHelper::getGeneralActions($dataType, $query);
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
     * @return \Illuminate\Http\JsonResponse|RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

        $data->update([
            'bio' => $request->get('bio'),
            'facebook_social' => $request->get('facebook_social'),
            'twitter_social' => $request->get('twitter_social'),
            'linkedin_social' => $request->get('linkedin_social'),
            'instagram_social' => $request->get('instagram_social'),
            'website_social' => $request->get('website_social'),
            'youtube_social' => $request->get('youtube_social'),
            'paypal_link' => $request->get('paypal_link'),
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

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
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

        /*//Uploading picture
        if ($request->hasFile('avatar')) {
            $storage = StorageHelper::getStorage();
            $storageFileName = $data->id.'/avatar.'.$request->file('avatar')->getClientOriginalExtension();
            $storage->put($storageFileName, $request->file('avatar')->getContent(), 'public');
            $fileLocation = $storage->url($storageFileName);
            $data->update([
                'avatar' => $fileLocation
            ]);
        }*/

        $data->update([
            'bio' => $request->get('bio'),
            'facebook_social' => $request->get('facebook_social'),
            'twitter_social' => $request->get('twitter_social'),
            'linkedin_social' => $request->get('linkedin_social'),
            'instagram_social' => $request->get('instagram_social'),
            'website_social' => $request->get('website_social'),
            'youtube_social' => $request->get('youtube_social'),
            'paypal_link' => $request->get('paypal_link'),
            'is_active' => $request->get('is_active') == 'on'
        ]);

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
