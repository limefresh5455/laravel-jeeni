<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Jeeni;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Jobs\GenerateTrackDuration;
use App\Jobs\GetTrackThumbnail;
use App\Mail\SendSupportCustomerEmail;
use App\Mail\TrackUploaded;
use App\Models\Playlist;
use App\Models\PlaylistTrack;
use App\Models\Showcase;
use App\Models\Track;
use App\Models\TrackChannel;
use App\Models\User;
use App\Models\UserVote;
use App\Traits\AjaxResponse;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

/**
 *
 */
class TrackController extends Controller
{
    use AjaxResponse;
    /**
     * Show the application Single Track page.
     *
     * @param $slug
     * @return Renderable
     */
    public function single_track($slug): Renderable
    {
        $trackData = Track::find(Jeeni::decryptData($slug));
        if($trackData instanceof Track) {
            return view('front.single-track', compact('trackData'));
        } else {
            abort(404);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addToFavourite(Request $request): JsonResponse
    {
        try {
            UserVote::firstOrCreate([
                'user_id' => $request->get('userId'),
                'track_id' => $request->get('trackId')
            ]);
            $trackData = Track::find($request->get('trackId'));
            return $this->returnSuccess([
                  'heartClass' => 'bi-heart-fill',
                  'spanClass' => 'remove-track-to-favourite',
                  'trackId' => $request->get('trackId'),
                  'actionLink' => route('track.remove-from-favourite'),
                  'count' => $trackData->votes->count()
            ],'Track added to your favourite list.');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function removeFromFavourite(Request $request): JsonResponse
    {
        try {
            UserVote::where('user_id', $request->get('userId'))
                ->where('track_id', $request->get('trackId'))->delete();
            return $this->returnSuccess([
                'heartClass' => 'bi-heart',
                'spanClass' => 'add-track-to-favourite',
                'trackId' => $request->get('trackId'),
                'actionLink' => route('track.add-to-favourite')
            ],'Track removed from your favourite list.');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addToPlaylist(Request $request): JsonResponse
    {
        try {

            $userId = $request->get('userId');
            $trackId = $request->get('trackId');

            $defaultPlayList = Playlist::firstOrCreate([
                'user_id' => $userId,
                'name' => 'My Playlist',
                'is_active' => true
            ]);

            PlaylistTrack::firstOrCreate([
                'playlist_id' => $defaultPlayList->id,
                'track_id' => $trackId
            ]);

            return $this->returnSuccess([
                  'heartClass' => 'bi-plus-lg',
                  'spanClass' => 'remove-track-to-playlist',
                  'trackId' => $request->get('trackId'),
                  'actionLink' => route('track.remove-from-playlist'),
            ],'Track added to your playlist.');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function removeFromPlaylist(Request $request): JsonResponse
    {
        try {

            $userId = $request->get('userId');
            $trackId = $request->get('trackId');

            $defaultPlayList = Playlist::firstOrCreate([
                'user_id' => $userId,
                'name' => 'My Playlist',
                'is_active' => true
            ]);

            PlaylistTrack::where('playlist_id', $defaultPlayList->id)
                ->where('track_id', $trackId)->delete();
            return $this->returnSuccess([
                'heartClass' => 'bi-plus-lg',
                'spanClass' => 'add-track-to-playlist',
                'trackId' => $request->get('trackId'),
                'actionLink' => route('track.add-to-playlist')
            ],'Track removed from your playlist.');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function goToTrack(Request $request): JsonResponse
    {
        try {
            $params = $request->all();
            $trackData = Track::find($params['id']);
            return $this->returnSuccess([
                'link' => $trackData->getRelatedTrack($params['id'])
            ]);
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function saveTrackDetails(Request $request): JsonResponse
    {
        try {
            $params = $request->all();
            $storage = StorageHelper::getStorage();
            $showcaseId = $this->getUserShowcase();
            $trackId = $request->get('hdnTrackId', 0);
            if($trackId > 0) {
                $trackData = Track::find($trackId);
                $trackData->update([
                    'title' => $params['trackTitle'],
                    'description' => $params['trackDescription']
                ]);
            } else {
                $trackData = Track::create([
                    'user_id' => auth()->user()->id,
                    'showcase_id' => $showcaseId,
                    'title' => $params['trackTitle'],
                    'track_file' => '',
                    'thumbnail' => '',
                    'description' => $params['trackDescription'],
                    'is_active' => false
                ]);
            }

            if($request->hasFile('trackFile')) {
                $trackFile = $request->file('trackFile');
                $storageFileName = 'track/'.$trackData->id.'/track_file.'.$trackFile->getClientOriginalExtension();
                $storage->put($storageFileName, $trackFile->getContent(), 'public');
                $fileLocation = $storage->url($storageFileName);
                $trackData->update([
                    'track_file' => $fileLocation,
                ]);
            }

            if($request->hasFile('thumbnailFile')) {
                $thumbnailFile = $request->file('thumbnailFile');
                $storageFileName = 'track/'.$trackData->id.'/thumb.'.$thumbnailFile->getClientOriginalExtension();
                $storage->put($storageFileName, $thumbnailFile->getContent(), 'public');
                $fileLocation = $storage->url($storageFileName);
                $trackData->update([
                    'thumbnail' => $fileLocation,
                ]);
            } else {
                if($trackId == 0) {
                    dispatch(new GetTrackThumbnail($trackData))->onQueue('default')
                        ->delay(Carbon::now()->addSeconds(30));
                }
            }

            $selectedChannels = $params['selectedChannels'];
            if(count($selectedChannels) > 0) {

                DB::table('track_channels')
                    ->where('track_id',$trackData->id)
                    ->delete();

                foreach($selectedChannels as $channel) {
                    TrackChannel::firstOrCreate([
                        'track_id' => $trackData->id,
                        'channel_id' => $channel
                    ]);
                }
            }


            dispatch(new GenerateTrackDuration($trackData))->onQueue('default')
                ->delay(Carbon::now()->addSeconds(30));

            Mail::to(auth()->user()->email)->send(new TrackUploaded(auth()->user()));

            return $this->returnSuccess([], 'Track Uploaded Successfully');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }

    /**
     * @param string $type
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadFile(string $type, Request $request): JsonResponse
    {
        try {
            $storage = StorageHelper::getStorage();
            if($request->hasFile($type)) {
                $trackFile = $request->file($type);
                $storageFileName = 'track/'.$type.'.'.$trackFile->getClientOriginalExtension();
                $storage->put($storageFileName, $trackFile->getContent(), 'public');
                $fileLocation = $storage->url($storageFileName);
                $message = str_replace('_', ' ', ucfirst($type));
                $this->returnSuccess(['link' => $fileLocation], $message.' uploaded successfully.');

                return response()->json([
                    'success' => true,
                    'message' => $message.' uploaded successfully.'
                ]);
            } else {
                $this->returnFail('File not received.', 204);
            }
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function getUserShowcase()
    {
        $showCase = Showcase::where('user_id', auth()->user()->id)->first();
        if(!$showCase instanceof Showcase) {
            $showCase = Showcase::create([
                'user_id' => auth()->user()->id,
                'title' => 'My Default Showcase',
                'description' => 'My Default Showcase',
                'photo' => Jeeni::getRandomThumbnail(),
                'is_active' => true
            ]);
        }
        return $showCase->id;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteTrack(Request $request): JsonResponse
    {
        try {
            $track = Track::find($request->get('id', 0));
            if($track instanceof Track) {
                $track->delete();
            }
            return $this->returnSuccess($request->all(), 'Track deleted successfully');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateTrackDetails(Request $request): JsonResponse
    {
        try {

            return $this->returnSuccess($request->all(), 'Track deleted successfully');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
    }
}
