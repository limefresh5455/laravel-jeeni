<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use TCG\Voyager\Http\Controllers\VoyagerAuthController as BaseVoyagerAuthController;

/**
 * Extended Auth controller from Voyager
 */
class VoyagerAuthController extends BaseVoyagerAuthController
{
    /**
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Response
     */
    public function postLogin(Request $request) {
        return parent::postLogin($request);
    }
}
