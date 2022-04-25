<?php

namespace CourseControl\database\mysql;

class CourseDAO
{
    public static function getAllCourses()
    {
        global $conn;

        $query = "SELECT id, course_code, course_name, description, start_date, end_date  
                FROM Course;";

        return $conn->query($query)->fetchAll();
    }

}