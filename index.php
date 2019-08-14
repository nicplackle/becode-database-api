<?php
//require 'db_connection.php';
//
// 
//// Attempt insert query execution
//try{
//// Prepare an insert statement
//    $sql = "INSERT INTO note_app (Title,// Note) VALUES (:Title, :Note)";
//    $stmt = $pdo->prepare($sql);
//    $title = filter_var(trim($_GET//['Title']), FILTER_SANITIZE_STRING);
//    $note = filter_var(trim($_POST//['Note']), FILTER_SANITIZE_STRING);
//
//// Bind parameters to statement
//    $stmt->bindParam(':Title', $title, //PDO::PARAM_STR);
//    $stmt->bindParam(':Note', $note, //PDO::PARAM_STR);
//
//
//// Execute the prepared statement
//    $stmt->execute();
//    echo "Records inserted //successfully.";
//    } catch(PDOException $e){
//        die("ERROR: Could not prepare///execute query: $sql. " . //$e->getMessage());
//    }
//
//    try {
//    $listNotes = "SELECT * FROM //`note_app`";
//    
//    $result = $pdo->query($listNotes);
//    
//    
//    if ($result->rowCount() > 0) {
//        
//        while($row = $result->fetch()) {
//            echo "<br>".$row["ID"]//."<br>".$row["Title"]//."<br>".$row["Note"]."<br>";
//        }
//        unset($result);
//    } else {
//        echo "0 results";
//    }
//    }
//
//    catch(PDOException $e){
//        die("ERROR: Could not prepare///execute query: $listNotes. " . //$e->getMessage());
//    }
//    unset($pdo);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Note App</title>

    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    
    <?php require "templates/header.php"; ?>
    <ul>
      <li>
        <a href="create.php"><strong>Create</strong></a> - Write a note
      </li>
      <li>
        <a href="read.php"><strong>Read</strong></a> - Find a note
      </li>
      <li><a             href="update.php"><strong>Update</strong></a> - Edit a note
      </li>
      <li><a       href="delete.php"><strong>Delete</strong></a> - Delete a note
      </li>
    </ul>
    <?php require "templates/footer.php"; ?>

  </body>
</html>
