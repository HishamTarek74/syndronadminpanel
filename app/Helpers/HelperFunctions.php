<?php

use Illuminate\Http\JsonResponse;

/**
 * Send response of api
 *
 * @param  integer  $code the status of response
 * @param mixed $data the body of response
 *
 * @return JsonResponse
 */
function responseJson(int $code, $data = null): JsonResponse
{
    switch ($code) {
        case 200:
            $message = 'success';
            break;
        case 201:
            $message = 'Created';
            break;
        case 400:
            $message = 'Bad Request';
            break;
        case 401:
            $message = trans('api.unauthorized');
            break;
        case 403:
            $message = 'Forbidden';
            break;
        case 404:
            $message = 'Not Found';
            break;
        case 405:
            $message = 'Method Not Allowed';
            break;
        case 408:
            $message = 'Request Timeout';
            break;
        default:
            $message = null;
            break;
    }

    $response
        = [
        'status' => $code,
        'message' => $message,
        isset($data['data']) ? $data : 'data' =>$data
    ];
    return response()->json($response,$code);
}


function uploadImage($folder, $image): string
{
    $filename = time() . '-' . str_replace(' ', '', $image->getClientOriginalName());
    $path = 'uploads/images/' . $folder . '/' ;
    $image->move(public_path(). '/' .$path, $filename);
    return $path .  $filename;
}

