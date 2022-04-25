<?php

// require_once 'dbsetup.inc.php'; // Run ONCE on initial database setup
require_once './../vendor/autoload.php';
require_once 'dbconfig.inc.php';
require_once 'functions.inc.php';

// Establish database connection
try {
    $conn = new PDO(PDO_DSN, DB_USR, DB_PWD, PDO_OPTIONS);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

// Twig setup
$loader = new \Twig\Loader\FilesystemLoader('.\..\src\CourseControl\view');
$twig = new \Twig\Environment($loader, [
    'debug' => true,
    'cache' => './../src/CourseControl/view/view_cache'
]);

// CSRF token setup
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
