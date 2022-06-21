<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Newsfeed;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class MarketingController extends Controller
{
    /**
     * Show Marketing Page
     * @return Renderable
     */
    public function getData(): Renderable
    {
        $data['newsfeeds'] = Newsfeed::latest()
            ->paginate(12);

        return view('front.newsfeed', $data);
    }

    /**
     * Create new newsfeed
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'marketingTitle' => 'required',
            'marketingDescription' => 'required'
        ]);

        try {
            DB::beginTransaction();

            Newsfeed::create([
                'user_id' => Auth::id(),
                'title' => $request->marketingTitle,
                'description' => $request->marketingDescription
            ]);

            DB::commit();

            // redirecting user back to offer page
            // any alerts should be kept here
            return Redirect::to(URL::previous() . "#marketing");

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous() . "#marketing")
                ->withInput();
        }
    }

    /**
     * Update a newsfeed
     * @param Request $request
     * @param Newsfeed $newsfeed
     * @return RedirectResponse
     */
    public function update(Request $request, Newsfeed $newsfeed): RedirectResponse
    {

        try {
            DB::beginTransaction();

            $newsfeed->update([
                'title' => $request->marketingTitle,
                'description' => $request->marketingDescription
            ]);

            DB::commit();

            // redirecting user back to offer page
            // any alerts should be kept here
            return Redirect::to(URL::previous() . "#marketing");

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous() . "#marketing")
                ->withInput();
        }
    }

    /**
     * Delete a newsfeed
     * @param Newsfeed $newsfeed
     * @return RedirectResponse
     */
    public function delete(Newsfeed $newsfeed): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $newsfeed->delete();

            DB::commit();

            // redirecting user back to offer page
            // any alerts should be kept here
            return Redirect::to(URL::previous() . "#marketing");

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous() . "#marketing")
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
        $newsfeeds = Newsfeed::where('title', 'LIKE', '%' . $request->keyword . '%')->get();

        $result = view('front.renders.newsfeed-search-result', compact('newsfeeds'))->render();

        return response()->json([
            'success' => true,
            'html' => $result
        ], 200);
    }
}
