<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

// Homepage
$routes->add('start', new Routing\Route('/', [
    '_controller' => 'CourseControl\Controller\HomeController::showHomepage'
]));
$routes->add('home', new Routing\Route('/home', [
    '_controller' => 'CourseControl\Controller\HomeController::showHomepage'
]));



return $routes;
