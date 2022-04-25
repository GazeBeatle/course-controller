<?php

require_once 'dbconfig.inc.php';

// Initial database setup
try {
    $conn = new PDO('mysql:host=' . SERVER_NAME, DB_USR, DB_PWD, PDO_OPTIONS);
    $sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
    // Use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage() . "<br>";
}

// Establish database connection
try {
    $conn = new PDO(PDO_DSN, DB_USR, DB_PWD, PDO_OPTIONS);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

// Create User table
try {
    $sql = "CREATE TABLE IF NOT EXISTS CCUser (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL UNIQUE,
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        birthdate VARCHAR(10) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    $conn->exec($sql);
    echo "Table CCUser created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage() . "<br>";
}

// Create Course table
try {
    $sql = "CREATE TABLE IF NOT EXISTS Course (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        course_code VARCHAR(10) NOT NULL UNIQUE,
        course_name VARCHAR(255) NOT NULL,
        description VARCHAR(500),
        start_date VARCHAR(10) NOT NULL,
        end_date VARCHAR(10) NOT NULL
        )";
    $conn->exec($sql);
    echo "Table Course created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage() . "<br>";
}

$conn = null;
