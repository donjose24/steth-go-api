<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait RestTrait
{
    /**
     * Determines if request is an api call or not
     *
     * @param Request request
     * @return bool
     */
    protected function isApiCall(Request $request)
    {
        return strpos($request->getUri(), '/api/v') !== false;
    }
}
