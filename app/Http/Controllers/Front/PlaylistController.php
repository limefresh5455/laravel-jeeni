<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class PlaylistController extends Controller
{
    /**
     * @return Renderable
     */
    public function getPlaylistTracks(): Renderable
    {
        $tracks = Playlist::where('user_id', Auth::id())->first()->tracks()->paginate(12);

        return view('front.my-playlist', compact('tracks'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function addTrackToPlaylist(Request $request): RedirectResponse
    {

        try {
            DB::beginTransaction();

            $playlist = Playlist::where('user_id', Auth::id())->first();

            $playlist->tracks->attach(Track::findOrFail($request->track_id));

            DB::commit();

            return Redirect::to(URL::previous() . "#offers");

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous() . "#offers")
                ->withInput();
        }
    }

    /**
     * Display Search Data
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $tracks = Playlist::where('user_id', Auth::id())->first()
            ->tracks()
            ->where('title', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(12);

        $resultGrid = view('front.renders.playlist-search-result-grid', compact('tracks'))->render();
        $resultList = view('front.renders.playlist-search-result-list', compact('tracks'))->render();

        return response()->json([
            'success' => true,
            'gridHtml' => $resultGrid,
            'listHtml' => $resultList
        ], 200);
    }
}
