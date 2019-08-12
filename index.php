<?php
    require 'db_connection.php';
    $conn = OpenCon();
    //echo "Connected Successfully";

    $title = $_GET["Title"];
    $note = $_GET["Note"];

    // echo $title, $note;

    $sql = "INSERT INTO note_app (Title, Note)
    VALUES ($title, $note)";

        if($title) {
        $conn->query($sql);
        }
        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
/*
    if ($title){
        $sql = INSERT INTO note_app (Title, Note) VALUES ($title, $note);

        if($conn->query($sql) === TRUE) {
            echo "New noooote!";
        }; 
        else{
            echo "baaaaaadd man";
        };
    }*/
    
   
    


    
     
    // CloseCon($conn);

     



?>
