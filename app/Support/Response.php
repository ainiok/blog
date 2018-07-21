<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/7/21 23:29
 */

namespace App\Support;

use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Response
{
    private $response;

    private $transform;

    private $statusCode = HttpResponse::HTTP_OK;

    public function __construct(ResponseFactory $response, Transform $transform)
    {
        $this->response = $response;
        $this->transform = $transform;
    }
}