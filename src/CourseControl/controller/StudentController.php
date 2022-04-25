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

        return $twig->render('student_details.view.php', [
            'title' => 'Student Details',
            'studentById' => StudentDAO::getStudentById($id)
        ]);
    }

    public function showStudentForm()
    {
        global $twig;

        if (! $_POST) {
            return $twig->render('student_new.view.php', [
                'title' => 'New Student',
            ]);
        
        } else {
            StudentController::doStudentNew();
            return StudentController::showStudentOverview();
        }    
    }

    public function showStudentEditForm($id)
    {
        global $twig;

        if (! $_POST) {
            return $twig->render('student_edit.view.php', [
                'title' => 'Edit Student',
                'studentById' => StudentDAO::getStudentById($id)
            ]);

        } else {
            StudentController::doStudentEdit();
            return StudentController::showStudentDetails($id);
        }
    }

    public function doStudentNew()
    {
        global $twig;

        $student['email']     = $_POST['email']     ?? '';
        $student['password']  = $_POST['password']  ?? '';
        $student['firstname'] = $_POST['firstname'] ?? '';
        $student['lastname']  = $_POST['lastname']  ?? '';
        $student['birthdate'] = $_POST['birthdate'] ?? '';

        
        $errors = StudentDAO::validateStudent($student);

        if ($errors) {
            return $twig->render('student_new.view.php', [
                'title' => 'New Student',
                'errors' => $errors
            ]);

        } else {
            StudentDAO::addNewStudent($student);
        }
    }

    public function doStudentEdit()
    {
        global $twig;
    
        $id                   = $_POST['id']        ?? '';
        $student['email']     = $_POST['email']     ?? '';
        $student['password']  = $_POST['password']  ?? '';
        $student['firstname'] = $_POST['firstname'] ?? '';
        $student['lastname']  = $_POST['lastname']  ?? '';
        $student['birthdate'] = $_POST['birthdate'] ?? '';
    
        $errors = StudentDAO::validateStudent($student);
    
        if ($errors) {
            return $twig->render('student_edit.view.php', [
                'title' => 'Edit Student',
                'studentById' => $student,
                'errors' => $errors
            ]);
            
        } else {
            StudentDAO::editStudent($id, $student);
        }
    }
    
    public function doStudentDelete($id)
    {
        if (StudentDAO::deleteStudent($id)) {
            return StudentController::showStudentOverview();
        }
    }
}
