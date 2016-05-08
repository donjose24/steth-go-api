<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait RestExceptionHandlerTrait
{

    /**
     * Creates a new JSON response based on exception type
     *
     * @param Request $request
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponse(Request $request, Exception $e)
    {
        switch(true) {
            case $e instanceof NotFoundException:
                $retVal = $this->notFound();
                break;
            default:
                $retVal = $this->badRequest();
        }
        return $retVal;
    }

    /**
     * Throws a json response 404
     *
     * @param String $message
     * @param String $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function notFound($message = "Not Found", $status = 404)
    {
        return response(['error' => $message], $status);
    }

    /**
     * Throws a json response 400
     *
     * @param String $message
     * @param String $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function badRequest($message = "Bad Request", $status = 400)
    {
        return response(['error' => $message], $status);
    }
}
