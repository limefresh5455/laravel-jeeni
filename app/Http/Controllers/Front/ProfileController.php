<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Jeeni;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Newsfeed;
use App\Models\Offer;
use App\Models\OfferTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class ProfileController extends Controller
{
    /**
     * Show the application My Profile - Showcase Page
     *
     * @return Renderable
     */
    public function my_profile(): Renderable
    {
        $data['offers'] = Offer::whereUserId(Auth::id())
            ->with('tags')
            ->latest()
            ->paginate(12);

        $data['newsfeeds'] = Newsfeed::whereUserId(Auth::id())
            ->latest()
            ->paginate(12);

        $data['availableChannels'] = Channel::select('id', 'name')->get();

        $data['tags'] = Tag::select('id', 'name')->get();

        $user = auth()->user();
        $readOnly = false;
        $myChannels = $user->getMyChannels();
        return view('front.my-profile.index', compact(
            'data',
            'user',
            'readOnly',
            'myChannels'
        ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update_social_media_links(Request $request): RedirectResponse
    {

        try {
            DB::beginTransaction();

            $user = User::findOrFail(Auth::id());

            $user->facebook_social = $request->facebook_social;
            $user->twitter_social = $request->twitter_social;
            $user->linkedin_social = $request->linkedin_social;
            $user->instagram_social = $request->instagram_social;
            $user->website_social = $request->website_social;
            $user->youtube_social = $request->youtube_social;

            $user->save();

            DB::commit();

            return Redirect::to(URL::previous());

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous())
                ->withInput();
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateProfilePopup(Request $request): JsonResponse
    {
        try {

            $user = User::find($request->get('userId'));
            if($user instanceof User) {
                $requestList = [
                    'profileName' => 'name',
                    'profileAboutMe' => 'bio',
                    'paypalLink' => 'paypal_link'
                ];

                foreach ($requestList as $requestKey => $dbKey) {
                    if($request->has($requestKey)) {
                        $user->{$dbKey} = $request->{$requestKey};
                    }
                }

                $user->save();

                DB::table('user_channels')
                    ->where('user_id', $user->id)
                    ->delete();

                $myInterests = $request->get('my_interests');
                foreach ($myInterests as $myInterest) {
                    DB::table('user_channels')->insert([
                        'user_id' => $user->id,
                        'channel_id' => $myInterest
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Profile updated successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'User not found.'
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function myAccount() {
        $user = auth()->user();
        return view('front.my-account-edit', compact(
            'user'
        ));
    }

    /**
     * @param $subscriptionId
     */
    public function getSubscriptionInvoice($subscriptionId) {
        dd('Work in progress');
    }

    /**
     * @param $type
     * @param Request $request
     * @return JsonResponse
     */
    public function updateProfileMedia($type, Request $request): JsonResponse
    {
        try {

            $data = User::find(Auth::user()->id);
            $storage = StorageHelper::getStorage();

            if($type == 'avatar' && $request->has('avatar')) {
                $storageFileName = $data->id.'/'.$type.'.'.'png';
                $storage->put($storageFileName, file_get_contents($request->{$type}), 'public');
                $fileLocation = $storage->url($storageFileName);
                $data->update([
                    'avatar' => $fileLocation
                ]);

                $message = str_replace('_', ' ', ucfirst($type));
                return response()->json([
                    'success' => true,
                    'data' => $fileLocation,
                    'message' => $message.' uploaded successfully.'
                ]);

            } else if($request->hasFile($type)) {
                $coverPhoto = $request->file($type);
                $storageFileName = $data->id.'/'.$type.'.'.$coverPhoto->getClientOriginalExtension();
                $storage->put($storageFileName, $coverPhoto->getContent(), 'public');
                $fileLocation = $storage->url($storageFileName);
                $data->update([
                    $type => $fileLocation
                ]);

                $message = str_replace('_', ' ', ucfirst($type));
                return response()->json([
                    'success' => true,
                    'message' => $message.' uploaded successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'File not received.'
                ], 204);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 204);
        }
    }

    /**
     * @param $slug
     * @param Request $request
     * @return RedirectResponse
     */
    public function unsubscribeUser($slug, Request $request): RedirectResponse
    {
        $userData = User::find(Jeeni::decryptData($slug));
        if($userData instanceof User) {
            $userData->disableNewsletter();
        }
        return redirect()->route('welcome')
            ->with('success', 'You have been removed from Jeeni mailing list.');
    }
}
