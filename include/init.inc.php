<?php

require_once './../vendor/autoload.php';
require_once './../include/functions.inc.php';

// Twig
$loader = new \Twig\Loader\FilesystemLoader('.\..\src\CourseControl\view');
$twig = new \Twig\Environment($loader, [
    'debug' => true,
    'cache' => './../src/CourseControl/view/view_cache'
]);

