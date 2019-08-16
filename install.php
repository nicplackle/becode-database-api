<?php 

// Open a connection via PDO to create a
// table with structure.

  require "config.php";

  try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);
  
    echo "Table note app v2 created successfully.";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
?>