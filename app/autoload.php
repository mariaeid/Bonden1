<?php

declare(strict_types=1);

// Start the session engines.

if(!isset($_SESSION))
    {
        session_start();
    }

// Set the default timezone to Coordinated Universal Time.
date_default_timezone_set('UTC');

// Set the default character encoding to UTF-8.
mb_internal_encoding('UTF-8');

// Include the helper functions.
require __DIR__.'/functions.php';

// Fetch the global configuration array.
$config = require __DIR__.'/config.php';

// Setup the database connection.
$pdo = new PDO($config['database_path']);

// $host = 'bonden1.se.mysql';
// $db   = 'bonden1_se';
// $user = 'bonden1_se';
// $pass = 'Z2PfZAhKgchDGv6yxJN6idn2';
// $charset = 'utf8mb4';
//
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
//
// $pdo = new PDO($dsn, $user, $pass, $options);
//
// $servername = "bonden1.se.mysql";
// $database = "bonden1_se";
// $username = "bonden1_se";
// $password = "Z2PfZAhKgchDGv6yxJN6idn2";
//
// // Check connection
//
// if (!$pdo) {
//
//     die("Connection failed: " . mysqli_connect_error());
//
// }
// echo "Connected successfully";
