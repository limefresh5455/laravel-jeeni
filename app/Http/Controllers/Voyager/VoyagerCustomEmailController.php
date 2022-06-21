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

class VoyagerCustomEmailController extends BaseVoyagerBaseController {
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
                ->editColumn('Is_final', function($query) {
                    return ($query->Is_final) ?
                        DataTableHelper::getStatusLabel('Yes', true) :
                        DataTableHelper::getStatusLabel('No', false);
                })
                ->editColumn('action', function($query) use ($dataType) {
                    return DataTableHelper::getGeneralActions($dataType, $query);
                })
                ->editColumn('created_at', function($query) use ($dataType) {
                    return Jeeni::getFormattedDateToDisplay($dataType->created_at);
                })
                ->rawColumns(['action', 'id', 'avatar','Is_final'])
                ->make(true);
        } else {
            abort(404);
        }
    }
}
