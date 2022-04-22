<?php

namespace CourseControl\controller;

require_once './../include/init.inc.php';

class StudentController
{
    public function showStudentOverview()
    {
        global $twig;
        
        return $twig->render('student_overview.view.php', [
            'title' => 'Student Overview'
        ]);
    }
}
