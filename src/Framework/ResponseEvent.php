<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\Event;

class ResponseEvent extends Event
{
    protected $response;

    protected $request;

    public function __construct(Response $response, Request $request)
    {
        $this->response = $response;
        $this->request = $request;
    }
    
    /**
     * Get the value of response
     */ 
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Get the value of request
     */ 
    public function getRequest()
    {
        return $this->request;
    }
}