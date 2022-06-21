<?php

namespace App\Http\Controllers\Voyager;

use App\Helpers\HomePageHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerSettingsController as BaseVoyagerSettingsController;
use TCG\Voyager\Models\Setting;

/**
 * VoyagerSettingsController
 */
class VoyagerSettingsController extends BaseVoyagerSettingsController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getHomepageConfiguration(Request $request)
    {
        if(!auth()->check()) {
            return redirect()->route('voyager.login');
        }
        $configurationData = HomePageHelper::getConfigurationData();
        $view = "voyager::configuration.browse";
        if (view()->exists($view)) {
            return Voyager::view($view, compact('configurationData'));
        } else {
            abort(404);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postHomepageConfiguration(Request $request): RedirectResponse
    {
        try {
            $params = $request->all();
            unset($params['_token']);
            unset($params['configuration_save']);
            foreach ($params as $key => $param) {
                $configuration = Setting::firstOrCreate(['key' => 'site.'.$key]);
                $configuration->update([
                    'display_name' => ucwords(str_replace('_', ' ', $key)),
                    'value' => $param,
                    'type' => 'text',
                    'group' => 'Site'
                ]);
            }

            return redirect()->route('voyager.homepage.configuration')
                ->with([
                    'message'    => __('voyager::settings.successfully_saved'),
                    'alert-type' => 'success',
                ]);
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with([
                    'message'    => $ex->getMessage(),
                    'alert-type' => 'error',
                ]);
        }
    }
}
