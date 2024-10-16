<?php
require 'config.php';

try {
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $PDO = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
    echo "Connection successful!";
    
} catch (PDOException $e) {
    echo "connection failled " . $e->getMessage();
 
}

