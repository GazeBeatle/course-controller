<?php

require_once './../vendor/autoload.php';
require_once 'dbconfig.inc.php';
require_once 'functions.inc.php';

// Establish database connection
$pdo = new PDO(PDO_DSN, DB_USR, DB_PWD, PDO_OPTIONS);

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
