<?php

// Configuration for database connection

$host       = "localhost";
$username   = "admin";
$password   = "7ELkW3j4H2s4zwgk"/*"ztm5lyen9Hkk"*/;
$dbname     = "note_app";
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
?>              
