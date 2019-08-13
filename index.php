<?php

require 'db_connection.php';

 
// Attempt insert query execution
try{
// Prepare an insert statement
    $sql = "INSERT INTO note_app (Title, Note) VALUES (:Title, :Note)";
    $stmt = $pdo->prepare($sql);
    $title = filter_var(trim($_GET['Title']), FILTER_SANITIZE_STRING);
    $note = filter_var(trim($_POST['Note']), FILTER_SANITIZE_STRING);

// Bind parameters to statement
    $stmt->bindParam(':Title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':Note', $note, PDO::PARAM_STR);


// Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
    } catch(PDOException $e){
        die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
    }

    try {
    $listNotes = "SELECT * FROM `note_app`";
    
    $result = $pdo->query($listNotes);
    
    if ($result->rowCount() > 0) {
        // output data of each row
        echo "if statement";
   
        while($row = $result->fetch()) {
            echo "<br>".$row["ID"]."<br>".$row["Title"]."<br>".$row["Note"]."<br>";
        }
        unset($result);
    } else {
        echo "0 results";
    }
    }

    catch(PDOException $e){
        die("ERROR: Could not prepare/execute query: $listNotes. " . $e->getMessage());
    }
    unset($pdo);
    

//  Return JSON

?>
