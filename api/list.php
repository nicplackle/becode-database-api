<?php


require "../config.php";
require "../common.php";

try {

  $connection = new PDO($dsn, $username, $password, $options);

  // display id and title with JSON request
  $sql = "SELECT id, title FROM note_app";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
