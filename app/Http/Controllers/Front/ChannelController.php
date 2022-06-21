<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Jeeni;
use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Track;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Show single channel page.
     *
     * @param Request $request
     * @param string $slug
     * @return Renderable
     */
    public function getData(Request $request, string $slug = ''): Renderable
    {
        if($slug == '') {
            abort(404);
        } else {
            $channel = Channel::find(Jeeni::decryptData($slug));
            /*$tracks = Track::whereIn('id',function ($query) use ($channel) {
                $query->select('track_id')
                    ->from('track_channels')
                    ->where('channel_id', $channel->id);
            });*/

            $tracks = $channel->tracks();
            $order = $request->get('order', 'latest');
            if($order == 'latest') {
                $tracks = $channel->tracks()->latest();
            } elseif($order == 'random') {
                $tracks = $channel->tracks()->orderByRaw('RAND()');
            }
            $tracks = $tracks->paginate(16);
            return view('front.channel', compact('channel','tracks', 'order'));
        }
    }
}
