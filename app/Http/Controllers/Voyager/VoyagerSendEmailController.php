<?php

namespace App\Http\Controllers\Voyager;

use App\Helpers\Jeeni;
use App\Jobs\SendCustomEmail;
use App\Models\Email;
use App\Models\EmailUser;
use App\Models\User;
use App\Traits\BrowseDataTables;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use Yajra\DataTables\DataTables;

/**
 *
 */
class VoyagerSendEmailController extends BaseVoyagerBaseController {
    use BreadRelationshipParser, BrowseDataTables;

    /**
     * @param Request $request
     */
    public function sendEmails(Request $request) {

        $emailList = Jeeni::availableEmailTemplates();
        $view = "voyager::sendmail.browse";
        if (view()->exists($view)) {
            return Voyager::view($view, compact(
        'emailList'
            ));
        } else {
            abort(404);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function browseUsers(Request $request) {
        $type = $request->get('type', '');
        $query = User::select('id', 'name', 'email');
        if($type != '' && $type != 'all') {
            $query->whereHas('role', function ($query) use ($type) {
                $query->where('name', $type);
            });
        }
        return Datatables::of($query)
            ->editColumn('id', function($query) {
                return '';
                //return '<input type="checkbox" name="row_id" id="checkbox_'.$query->id.'" value="'.$query->id.'">';
            })
            ->rawColumns(['id'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function scheduleEmails(Request $request): JsonResponse
    {
        $data = $request->all();
        $type = $data['userType'];

        if($type == 'all') {
            $recipients = User::where('role_id','>', 0)
                ->pluck('name', 'id')->toArray();
        } else {
            $recipients = User::whereHas('role', function ($query) use ($type){
                $query->where('name', $type);
            })->pluck('name', 'id')->toArray();
        }

        if(count($recipients) > 0 ) {
            foreach ($recipients as $id => $name) {
                $email = EmailUser::create([
                    'email_id' => $data['emailTemplateId'],
                    'user_id' => $id,
                    'status' => false
                ]);

                dispatch(new SendCustomEmail($email->id))->delay(Carbon::now()->addSeconds(10));
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Emails Scheduled Successfully!',
            'data' => $recipients
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return Application|Factory|View
     */
    public function showPreview($id, Request $request) {
        $user = auth()->user();
        $template = Email::find($id);
        return view('email-template.dynamic', compact(
            'user',
            'template'
        ));
    }
}
