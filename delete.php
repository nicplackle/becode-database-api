<?php
$servername = "localhost";
$username = "admin";
$password = "ztm5lyen9Hkk";
$dbname = "becode_database_api";

// require 'db_connection.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM note_app WHERE Title=' '";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>