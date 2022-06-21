<?php
/**
 * Created by PhpStorm.
 * User: Jiten Patel
 * Date: 12/12/2021
 * Time: 2:09 PM
 */

namespace App\Traits;

use Illuminate\Http\JsonResponse;

/**
 * AjaxResponse
 */
trait AjaxResponse {
    /**
     * @param $data
     * @param string|null $message
     * @param int $status
     * @return JsonResponse
     */
    public function returnSuccess($data, string $message = null, int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], $status);
    }

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function returnFail(string $message, int $code = 422): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => $message
        ], $code);
    }
}
