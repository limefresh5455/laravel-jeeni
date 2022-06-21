<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Helpers\Jeeni;
use App\Http\Controllers\Controller;
use App\Models\Track;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SearchController extends Controller
{
    public $searchLimit = 100;
    public $defaultSortValue = 'publish_date';
    public $defaultViewValue = 'grid';
    public $itemsPerPage = 20;
    /**
     * Show the application Search results Page.
     *
     * @return Renderable
     */
    public function search(Request $request): Renderable
    {
        $sortby = $this->getSortBy($request);
        $view = $this->getViewType($request);
        if($request->has('search')){
            $tracks = $this->searchSortedTracks($request, $sortby);
        } else {
            $tracks = NULL;
        }


        return view('front.search-results', [
            'tracks' => $tracks,
            'query' => $request->search,
            'sortby' => $sortby,
            'view' => $view
        ]);
    }

    public function getTracks($request): string
    {
        if($request->has('search')){
            $tracks = Track::search($request->search)->get();
        } else {
            $tracks = NULL;
        }
        return $tracks;
    }

    public function getSortBy($request): string
    {
        // TODO: this can be much cleaner
        if ($request->has('sortby')){

            if (!is_null($request->sortby)){

                $sortby = $request->sortby;
            } else {
                $sortby = $this->defaultSortValue;
            }
        } else {
            $sortby = $this->defaultSortValue;
        }
        return $sortby;
    }

    public function getViewType($request): string
    {
        // TODO: this can be much cleaner
        if ($request->has('view')){
            $view = $request->view;
        } else {
            $view = $this->defaultViewValue;
        }
        return $view;
    }

    public function searchSortedTracks($request, $sortby){
        switch ($sortby){
            case 'relevant':
                $tracks = Track::search($request->search)->paginate($this->itemsPerPage);
                break;
            case 'latest':
                $ids = Track::search($request->search)->take($this->searchLimit)->get()->pluck('id');
                $tracks = Track::whereIn('id', $ids)->orderBy('publish_date', 'DESC')->paginate($this->itemsPerPage);
                break;
            case 'random':
                $ids = Track::search($request->search)->take($this->searchLimit)->get()->pluck('id');
                $tracks = Track::whereIn('id', $ids)->inRandomOrder()->paginate($this->itemsPerPage);
                break;
//            case 'votes':
//                $ids = Track::search($request->search)->take($this->searchLimit)->get()->pluck('id');
//                $tracks = Track::whereIn('id', $ids)->orderBy('votes')->paginate($this->itemsPerPage);
//                break;
            default: # oldest
                $ids = Track::search($request->search)->take($this->searchLimit)->get()->pluck('id');
                $tracks = Track::whereIn('id', $ids)->orderBy('publish_date', 'ASC')->paginate($this->itemsPerPage);
                break;

        }
        return $tracks;
    }

}
