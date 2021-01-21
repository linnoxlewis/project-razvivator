<?php
namespace App\Modules\admin\helpers;

/**
 * Апи ответ хелпер
 *
 * Class ApiResponseHelper
 *
 * @package App\Modules\admin\helpers
 */
class ApiResponseHelper
{
    public static function getSuccessResponse($data = null,$message = null,$code = 200)
    {
        $result = [
            'success' => true,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($result, $code);
    }

    public static function getErrorResponse($data = null,$message = null,$code = 400)
    {
        $result = [
            'success' => true,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($result, $code);
    }
}
