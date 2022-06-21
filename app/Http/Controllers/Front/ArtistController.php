<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Jeeni;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Channel;
use App\Models\Newsfeed;
use App\Models\Offer;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    /**
     *
     */
    public function getData()
    {
        $artists = Artist::query();

        if (request()->has('order_by')) {
            if (request()->get('order_by') == 'newest') {
                $artists->orderBy('created_at', 'desc');
            } elseif (request()->get('order_by') == 'oldest') {
                $artists->orderBy('created_at', 'asc');
            }
        }

        $artists = $artists->paginate(16);
        return view('front.my-artists', compact('artists'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request) {

    }

    /**
     * @param Request $request
     */
    public function search(Request $request) {

    }

    public function getArtistProfile($slug) {
        $user = User::find(Jeeni::decryptData($slug));
        if($user instanceof User) {
            $data['offers'] = Offer::whereUserId($user->id)
                ->with('tags')
                ->latest()
                ->paginate(12);

            $data['newsfeeds'] = Newsfeed::whereUserId($user->id)
                ->latest()
                ->paginate(12);

            $data['availableChannels'] = Channel::select('id', 'name')->get();

            $data['tags'] = Tag::select('id', 'name')->get();
            $readOnly = true;
            $myChannels = $user->getMyChannels();
            return view('front.my-profile.index', compact(
                'data',
                'user',
                'readOnly',
                'myChannels'
            ));
        } else {
            abort(404);
        }
    }
}
