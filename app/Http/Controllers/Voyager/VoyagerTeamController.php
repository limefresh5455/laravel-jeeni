<?php

namespace App\Http\Controllers\Voyager;

use App\Helpers\DataTableHelper;
use App\Helpers\Jeeni;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerRoleController;
use Yajra\DataTables\DataTables;

class VoyagerTeamController extends BaseVoyagerRoleController
{
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
            $permissionSlug = str_replace('-', '_', $slug);
            return Datatables::of($query)
                ->editColumn('id', function($query) use ($dataType) {
                    return '<input type="checkbox" name="row_id" id="checkbox_'.$query->id.'" value="'.$query->id.'">';
                })
                ->editColumn('image', function($query) {
                    return '<img class="img-responsive w-100" src="'.$query->image.'" />';
                })
                ->editColumn('action', function($query) use ($dataType, $permissionSlug) {
                    return DataTableHelper::getGeneralActions($dataType, $query, $permissionSlug);
                })
                ->editColumn('created_at', function($query) use ($dataType) {
                    return Jeeni::getFormattedDateToDisplay($query->created_at);
                })
                ->rawColumns(['action', 'id', 'image'])
                ->make(true);
        } else {
            abort(404);
        }
    }
}
