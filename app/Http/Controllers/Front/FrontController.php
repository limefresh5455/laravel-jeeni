<?php

namespace App\Http\Controllers\Front;

use App\Helpers\CmsDataHelper;
use App\Helpers\Jeeni;
use App\Http\Controllers\Controller;
use App\Mail\SendFeedbackEmail;
use App\Mail\SendFeedbackEmailToCustomer;
use App\Mail\SendSupportCustomerEmail;
use App\Mail\SendSupportEmail;
use App\Models\Team;
use App\Models\Track;
use App\Models\User;
use App\Models\UserFeedback;
use App\Traits\AjaxResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Models\Page;

/**
 * FrontController
 */
class FrontController extends Controller
{
    use AjaxResponse;
    /**
     * Show the application Homepage.
     *
     * @return Renderable
     */
    public function welcome(): Renderable
    {
        $latestVideos = Jeeni::getLatestVideos();
        $insideStoryVideos = Jeeni::getInsideStoryVideos();
        return view('front.homepage', compact(
            'latestVideos',
            'insideStoryVideos'
        ));
    }


    /**
     * Show the application Privacy Page.
     *
     * @return Renderable
     */
    public function privacy(): Renderable
    {
        return view('front.privacy');
    }

    /**
     * @param Request $request
     * @return Renderable
     */
    public function getDynamicPage(Request $request): Renderable {
        $route = Route::currentRouteName();
        $cmsPage = Page::whereSlug($route)->first();
        if($cmsPage instanceof Page) {
            return view('front.cms-page', ['cmsPage' => $cmsPage]);
        } else {
            return view('front.'.$route);
        }
    }

    /**
     * Show the application Offers and Services Page
     *
     * @return Renderable
     */
    public function offer_service(): Renderable
    {
        return view('front.offers-service');
    }

    /**
     * Show the application My Playlist Page
     *
     * @return Renderable
     */
    public function my_playlist(): Renderable
    {
        return view('front.my-playlist');
    }

    /**
     * Show the application Join Now.
     *
     * @return Renderable
     */
    public function join_now(): Renderable
    {
        return view('front.join-now');
    }

    /**
     * Show the My Arists page, followed by the user.
     *
     * @return Renderable
     */
    public function my_artists(): Renderable
    {
        return view('front.my-artists');
    }

    /**
     * Show the application About page.
     *
     * @return Renderable
     */
    public function about(): Renderable
    {
        return view('front.about');
    }

    /**
     * Show the application Terms & Condition page.
     *
     * @return Renderable
     */
    public function terms(): Renderable
    {
        return view('front.terms');
    }

    /**
     * Show the application My Feedback page.
     *
     * @return Renderable
     */
    public function my_feedback(): Renderable
    {
        return view('front.my-feedback');
    }

    /**
     * Show the application Single Track page.
     *
     * @return Renderable
     */
    public function invest(): Renderable
    {
        $route = Route::currentRouteName();
        $cmsPage = Page::whereSlug($route)->first();
        return view('front.invest', ['cmsPage' => $cmsPage]);
    }

    /**
     * Show the application My Account Edit page.
     *
     * @return Renderable
     */
    public function my_account_edit(): Renderable
    {
        return view('front.my-account-edit');
    }

    /**
     * Show the application My Account Edit page.
     *
     * @return Renderable
     */
    public function faq(): Renderable
    {
        return view('front.faq');
    }

    /**
     * Show the application My Account Edit page.
     *
     * @return Renderable
     */
    public function partners(): Renderable
    {
        return view('front.partners');
    }

    /**
     * Show the application My Account Edit page.
     *
     * @return Renderable
     */
    public function supportHelpDesk(): Renderable
    {
        $cmsPage = Page::whereSlug('support')->first();
        return view('front.support', ['cmsPage' => $cmsPage]);
    }

    /**
     * Show the application My Account Edit page.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function supportSubmit(Request $request): RedirectResponse
    {
        $customerEmail = $request->get('feedback-email', '');
        if($customerEmail != '') {
            Mail::to(Jeeni::getSupportEmailAddress())->send(new SendSupportEmail($request->all()));
            Mail::to($customerEmail)->send(new SendSupportCustomerEmail($request->all()));
        }
        return response()->redirectToRoute('support')->with('status', 'Feedback sent successfully!!');
    }

    /**
     * Show the application My Account Edit page.
     *
     * @return Renderable
     */
    public function team(): Renderable
    {
        $teams = Team::all();
        return view('front.team', compact('teams'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function post_my_account_edit(Request $request): JsonResponse
    {
        try {

            $email = $request->get('email');
            if($email != auth()->user()->email) {
                $existingEmail = User::whereEmail($email)->first();
                if($existingEmail instanceof User) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Email address ('.$email.') already taken.'
                    ]);
                }
            }

            $userToUpdate = User::whereEmail(auth()->user()->email)->first();
            if($userToUpdate instanceof User) {
                $updateList = [
                    'first_name' => $request->get('firstname'),
                    'last_name' => $request->get('lastname'),
                    'name' => $request->get('displayName'),
                    'display_name' => $request->get('displayName'),
                    'email' => $request->get('email'),
                ];

                if($request->has('password')
                    && !is_null($request->get('password'))) {
                    $updateList['password'] = Hash::make($request->get('password'));
                }

                $userToUpdate->update($updateList);

                return response()->json([
                    'success' => true,
                    'message' => 'Account details updated successfully.',
                    'data' => $request->all()
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong, please try again.'
                ]);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'error' => true,
                'message' => $ex->getMessage()
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function close_account(Request $request): JsonResponse
    {
        try {
            $email = $request->get('email');
            $userToClose = User::whereEmail($email)->first();

            if(($userToClose instanceof User)
                && password_verify($request->get('password'), $userToClose->password)) {
                $userToClose->delete();
                Auth::logout();
                return response()->json([
                    'success' => true,
                    'data' => url('login'),
                    'message' => 'Profile deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Unable to proceed, incorrect credentials provided.'
                ]);
            }

        } catch (\Exception $ex) {
            return response()->json([
                'error' => true,
                'message' => $ex->getMessage()
            ]);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postMyFeedBack(Request $request): RedirectResponse
    {
        $params = $request->all();
        unset($params['_token']);
        $mapping = [
            'card1' => 'What sort of Jeeni user are you?',
            'card2' => 'What is your Jeeni status?',
            'card3' => 'How did you find out about Jeeni?',
            'card4' => 'Why did you become a member?',
            'card5' => 'What do you think of the site navigation BEFORE log-in?',
            'card6' => 'What do you think of the site navigation AFTER log-in?',
            'feedback' => 'Feedback/Comments'
        ];

        $finalArray = [];
        foreach ($params as $key => $value) {
            $finalValue = (is_array($value)) ? array_filter($value) : ((is_null($value)) ? '' : $value);
            $finalArray[$mapping[$key]] = $finalValue;
        }

        UserFeedback::create([
            'user_id' => \auth()->user()->id,
            'feedback' => json_encode($finalArray, JSON_UNESCAPED_UNICODE)
        ]);

        Mail::to(Jeeni::getSupportEmailAddress())
            ->send(new SendFeedbackEmail($params, $mapping, auth()->user()));

        Mail::to(Jeeni::getSupportEmailAddress())
            ->send(new SendFeedbackEmailToCustomer(auth()->user()));

        return response()->redirectToRoute('myfeedback')
            ->with('success', 'Feedback Received successfully!!');
    }

    /**
     * @return Application|Factory|View
     */
    public function investRight() {
        return view('front.invest-right');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateNewsLetterConsent(Request $request): JsonResponse
    {
        try {
            $newsLetterConsent = $request->get('toggle', 0);
            $userData = User::find(auth()->user()->id);
            $userData->toggleNewsletter($newsLetterConsent);
            return $this->returnSuccess([], 'Newsletter consent updated successfully.');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }
}
