<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

// Homepage
$routes->add('start', new Routing\Route('/', [
    '_controller' => 'CourseControl\controller\HomeController::showHomepage'
]));
$routes->add('home', new Routing\Route('/home', [
    '_controller' => 'CourseControl\controller\HomeController::showHomepage'
]));

// Student Overview page
$routes->add('studentOverview', new Routing\Route('/students', [
    '_controller' => 'CourseControl\controller\StudentController::showStudentOverview'
]));

// Student Details page
$routes->add('studentDetails', new Routing\Route('/students/details/{id}', [
    '_controller' => 'CourseControl\controller\StudentController::showStudentDetails'
]));

return $routes;
