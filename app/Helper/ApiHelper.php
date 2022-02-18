<?php

namespace App\Helper;



class ApiHelper
{
    static function successResponse($data)
    {
        $obj = [
            'success' => true,
            'errorMessage' => null,
            'data' => $data
        ];
        return response($obj,200);
    }

    static function errorResponse($errorMessage,$status = 400)
    {
        $obj = [
            'success' => false,
            'errorMessage' => $errorMessage,
        ];
        return response($obj,$status);
    }
}
