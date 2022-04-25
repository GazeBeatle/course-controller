<?php

namespace CourseControl\controller;

require_once './../include/init.inc.php';

use CourseControl\database\mysql\CourseDAO;

class CourseController
{
    public function showCourseOverview()
    {
        global $twig;
      
        return $twig->render('course_overview.view.php', [
            'title' => 'Course Overview',
            'allCourses' => CourseDAO::getAllCourses()
        ]);
    }
     
}