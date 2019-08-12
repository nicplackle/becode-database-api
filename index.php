<?php

require 'db_connection.php';

 
// Attempt insert query execution
try{
// Prepare an insert statement
    $sql = "INSERT INTO note_app (Title, Note) VALUES (:Title, :Note)";
    $stmt = $pdo->prepare($sql);

// Bind parameters to statement
    $stmt->bindParam(':Title', $_GET['Title'], PDO::PARAM_STR);
    $stmt->bindParam(':Note', $_POST['Note'], PDO::PARAM_STR);


// Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
    } catch(PDOException $e){
        die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
    }
 
?>
