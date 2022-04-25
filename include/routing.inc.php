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


// Student Pages
// Student Overview page
$routes->add('studentOverview', new Routing\Route('/students', [
    '_controller' => 'CourseControl\controller\StudentController::showStudentOverview'
]));

// Student Details page
$routes->add('studentDetails', new Routing\Route('/students/details/{id}', [
    '_controller' => 'CourseControl\controller\StudentController::showStudentDetails'
]));

// Student Form page
$routes->add('studentNew', new Routing\Route('/students/new', [
    '_controller' => 'CourseControl\controller\StudentController::showStudentForm'
]));
$routes->add('studentEdit', new Routing\Route('/students/edit/{id}', [
    '_controller' => 'CourseControl\controller\StudentController::showStudentEditForm'
]));
$routes->add('studentDelete', new Routing\Route('/students/delete/{id}', [
    '_controller' => 'CourseControl\controller\StudentController::doStudentDelete'
]));


// Course Pages
// Course Overview page
$routes->add('courseOverview', new Routing\Route('/courses', [
    '_controller' => 'CourseControl\controller\CourseController::showCourseOverview'
]));




return $routes;
