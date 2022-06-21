<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Viewer;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class FollowerController extends Controller
{
    /**
     * @return Renderable
     */
    public function getMyFollowers(): Renderable
    {
        return view();
    }

    /**
     * Show the artists followed by user (viewer)
     * @return Renderable
     */
    public function getMyArtist(): Renderable
    {

        $artists = Artist::whereHas('followers', function ($query) {
            $query->where('user_id', Auth::id());
        });

        if (request()->has('order_by')) {
            if (request()->get('order_by') == 'newest') {
                $artists->orderBy('created_at', 'desc');
            } elseif (request()->get('order_by') == 'oldest') {
                $artists->orderBy('created_at', 'asc');
            }
        }

        $value = request()->get('order_by');

        $artists = $artists->paginate(16);

        return view('front.my-artists', compact('artists'))->with('types', $value);
    }

    /**
     * Add an artist to followings
     * @param Request $request
     * @return RedirectResponse
     */
    public function addArtistToMyFollowings(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            DB::table('artist_followers')->insert([
                'user_id' => Auth::id(),
                'artist_id' => $request->artist_id
            ]);

            DB::commit();

            return Redirect::to(URL::previous());

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous());
        }
    }

    /**
     * Add an artist to followings
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeArtistFromMyFollowings(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            DB::table('artist_followers')
                ->where('user_id', Auth::id())
                ->where('artist_id', $request->artist_id)
                ->delete();

            DB::commit();

            return Redirect::to(URL::previous());

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous());
        }
    }
}
