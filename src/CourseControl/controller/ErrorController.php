<?php

namespace CourseControl\controller;

use Symfony\Component\ErrorHandler\Exception\FlattenException;

class ErrorController
{
    public function exception(FlattenException $exception)
    {
        global $twig;

        $errorcode = $exception->getStatusCode();
        $errormsg = $exception->getMessage();
      
        return $twig->render('error.view.php', [
            'title' => 'Error '.$errorcode,
            'errorcode' => $errorcode,
            'errormsg' => $errormsg
        ]);
    }
}
