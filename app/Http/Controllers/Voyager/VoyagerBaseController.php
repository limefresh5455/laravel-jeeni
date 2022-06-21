<?php

namespace App\Http\Controllers\Voyager;

use App\Traits\BrowseDataTables;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;

/**
 * Extending Voyager BaseController
 */
class VoyagerBaseController extends BaseVoyagerBaseController {
    use BrowseDataTables;
}
