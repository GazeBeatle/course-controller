<?php

namespace CourseControl\database\mysql;

use CourseControl\model\Student;

class StudentDAO
{
    public static function getAllStudents()
    {
        global $pdo;

        $query = "SELECT studentid, firstname, lastname, email 
                FROM student;";

        return $pdo->query($query)->fetchAll();
    }

    public static function getStudentById(int $id)
    {
        global $pdo;

        $query = "SELECT studentid, firstname, lastname, email 
                FROM student 
                WHERE studentid = :id 
                LIMIT 1;";

        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function addNewStudent($student)
    {
        global $pdo;

        $firstname = $student['firstname'];
        $lastname = $student['lastname'];
        $email = $student['email'];

        $query = "INSERT INTO student(firstname, lastname, email) 
                VALUES (:firstname, :lastname, :email);";

        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':email', $email);

        return $stmt->execute();
    }

    public static function editStudent(int $id, $student)
    {
        global $pdo;

        $firstname = $student['firstname'];
        $lastname = $student['lastname'];
        $email = $student['email'];

        $query = "UPDATE student 
                SET firstname = :firstname, 
                    lastname = :lastname, 
                    email = :email 
                WHERE studentid = :id 
                LIMIT 1;";
        
        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    public static function deleteStudent(int $id)
    {
        global $pdo;
        
        $query = "DELETE FROM student 
                WHERE studentid = :id 
                LIMIT 1;";
        
        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    public static function validateStudent($student) 
    {
        $errors = [];
        $fields = ['firstname', 'lastname', 'email'];

        foreach ($fields as $field) {
            if (empty($student[$field])) {
                $errors[$field] = ucfirst($field) . " is a required field";
            }
        }

        if (!filter_var($student['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please provide a valid email address';
        }

        return $errors;
    }

}
