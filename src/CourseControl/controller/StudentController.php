<?php

namespace CourseControl\controller;

require_once './../include/init.inc.php';

use CourseControl\database\mysql\StudentDAO;

class StudentController
{
    public function showStudentOverview()
    {
        global $twig;
      
        return $twig->render('student_overview.view.php', [
            'title' => 'Student Overview',
            'allStudents' => StudentDAO::getAllStudents()
        ]);
    }
        
    public function showStudentDetails($id) 
    {
        global $twig;

        echo $twig->render('student/studentDetails.view.php', [
            'title' => 'Student Details',
            'studentById' => StudentDAO::getStudentById($id)
        ]);
    }

}
