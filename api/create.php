<?php

require "../config.php";
require "../common.php";

//header('Content: text/javascript');

// Use an HTML form to create a new entry in the users table

if (isset($_POST['title']) && isset($_POST['note'])) {
    
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        // insert new user code will go here

        // here we can use regular POST variables without sanitization, because we're submitting to the database with 'prepared statements'

        $new_note = array(
        "title" => $_POST['title'],
        "note" => $_POST['note'],
        );
        

        // use sprint to insert data in x (y) and :z values

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "note_app_v2",
            implode(", ", array_keys    ($new_note)),
            ":" . implode(", :", array_keys ($new_note))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_note);

        $stmt = $connection->prepare("SELECT id, title FROM note_app_v2 WHERE id=?");
        $stmt->execute([$connection->lastInsertId()]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result/*, JSON_PRETTY_PRINT*/);
        
}   catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
}

?>

