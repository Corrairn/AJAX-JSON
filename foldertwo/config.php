<?php

$db_host = '127.0.0.1'; 	// или localohst
$db_name   = 'session16'; 	// Име на базата данни
$db_user = 'root';			// MySQL потребител
$db_pass = '';			// MySQL парола
$charset = 'utf8';

$dsn = "mysql:host=" . $db_host . ";dbname={$db_name};charset={$charset}";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $db_user, $db_pass, $opt);
