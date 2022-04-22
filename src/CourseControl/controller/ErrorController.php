<?php

namespace CourseControl\controller;

use Symfony\Component\ErrorHandler\Exception\FlattenException;

class ErrorController
{
    public function exception(FlattenException $exception)
    {
        $msg = 'Something went wrong! ('.$exception->getMessage().')';

        return $msg.' '.$exception->getStatusCode();
    }
}
