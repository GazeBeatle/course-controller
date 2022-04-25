<?php

namespace CourseControl\database\mysql;

class StudentDAO
{
    public static function getAllStudents()
    {
        global $conn;

        $query = "SELECT id, email, firstname, lastname, birthdate  
                FROM CCUser;";

        return $conn->query($query)->fetchAll();
    }

    public static function getStudentById(int $id)
    {
        global $conn;

        $query = "SELECT id, email, firstname, lastname, birthdate  
                FROM CCUser 
                WHERE id = :id 
                LIMIT 1;";

        $stmt = $conn->prepare($query);

        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function addNewStudent($student)
    {
        global $conn;

        $email = $student['email'];
        $password = $student['password'];
        $firstname = $student['firstname'];
        $lastname = $student['lastname'];
        $birthdate = $student['birthdate'];

        $query = "INSERT INTO CCUser(email, password, firstname, lastname, birthdate) 
                VALUES (:email, :password, :firstname, :lastname, :birthdate);";

        $stmt = $conn->prepare($query);

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':birthdate', $birthdate);

        return $stmt->execute();
    }

    public static function editStudent(int $id, $student)
    {
        global $conn;

        $email = $student['email'];
        $password = $student['password'];
        $firstname = $student['firstname'];
        $lastname = $student['lastname'];
        $birthdate = $student['birthdate'];

        $query = "UPDATE CCUser 
                SET email = :email, 
                    password = :password, 
                    firstname = :firstname, 
                    lastname = :lastname, 
                WHERE id = :id 
                LIMIT 1;";
        
        $stmt = $conn->prepare($query);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':birthdate', $birthdate);

        return $stmt->execute();
    }

    public static function deleteStudent(int $id)
    {
        global $conn;
        
        $query = "DELETE FROM CCUser 
                WHERE id = :id 
                LIMIT 1;";
        
        $stmt = $conn->prepare($query);

        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    public static function validateStudent($student) 
    {
        $errors = [];
        $fields = ['email', 'password', 'firstname', 'lastname', 'birthdate'];

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
