<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\OfferTag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class OfferController extends Controller
{
    /**
     * Show Offer page
     * @return Renderable
     */
    public function getOffers(): Renderable
    {
        $data['offers'] = Offer::latest()
            ->paginate(12);

        return view('front.offers-service', $data);
    }

    /**
     * Create an offer
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
//        dd($request->all());
        $request->validate([
            'offerTitle' => 'required',
            'offerMaxPrice' => 'required',
            'offerMinPrice' => 'required',
            'offerDescription' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $offer = Offer::create([
                'user_id' => Auth::id(),
                'title' => $request->offerTitle,
                'max_price' => $request->offerMaxPrice,
                'min_price' => $request->offerMinPrice,
                'description' => $request->offerDescription
            ]);

            foreach ($request->offerTags as $tag) {
                OfferTag::create([
                    'offer_id' => $offer->id,
                    'tag_id' => $tag
                ]);
            }

            DB::commit();

            // redirecting user back to offer page
            // any alerts should be kept here
            return Redirect::to(URL::previous() . "#offers");

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous() . "#offers")
                ->withInput();
        }
    }

    /**
     * Update an offer
     * @param Request $request
     * @param Offer $offer
     * @return RedirectResponse
     */
    public function update(Request $request, Offer $offer): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $offer->update([
                'title' => $request->offerTitle,
                'max_price' => $request->offerMaxPrice,
                'min_price' => $request->offerMinPrice,
                'description' => $request->offerDescription
            ]);

            OfferTag::where('offer_id', $offer->id)->delete();

            foreach ($request->offerTags as $tag) {
                OfferTag::create([
                    'offer_id' => $offer->id,
                    'tag_id' => $tag
                ]);
            }

            DB::commit();

            return Redirect::to(URL::previous() . "#offers");

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous() . "#offers")
                ->withInput();
        }
    }

    /**
     * Delete an offer
     * @param Offer $offer
     * @return RedirectResponse
     */
    public function delete(Offer $offer): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $offer->delete();

            DB::commit();

            return Redirect::to(URL::previous() . "#offers");

        } catch (QueryException $exception) {
            DB::rollBack();

            return Redirect::to(URL::previous() . "#offers");
        }
    }

    /**
     * Display Search Data
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $offers = Offer::where('title', 'LIKE', '%' . $request->keyword . '%')->get();

        $result = view('front.renders.offer-search-result', compact('offers'))->render();

        return response()->json([
            'success' => true,
            'html' => $result
        ], 200);
    }
}
