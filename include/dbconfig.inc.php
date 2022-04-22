<?php

const DB_NAME = 'coursecontroller';
const DB_SRV = 'localhost';
const DB_USR = 'dictuphpUser';
const DB_PWD = 'dictuphp';
const DB_CHARSET = 'utf8mb4';

const PDO_DSN = 'mysql:host=' . DB_SRV . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;

const PDO_OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
