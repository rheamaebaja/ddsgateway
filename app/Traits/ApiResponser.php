<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * @param string/array $data
     * @param int $code 
     * @return Illuminate\Http\Response
     */

     public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * @param string/array $data
     * @param int $code 
     * @return Illuminate\Http\JsonResponse
     */

     public function validResponse($data, $code = Response::HTTP_OK)
     {
         return response()->json(['data' => $data], $code);
     }

     /**
     * @param string/array $message
     * @param int $code 
     * @return Illuminate\Http\JsonResponse
     */

    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

     /**
     * @param string/array $message
     * @param int $code 
     * @return Illuminate\Http\Response
     */
    
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}