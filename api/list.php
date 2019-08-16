<?php


require "../config.php";
require "../common.php";

try {

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM note_app_v2";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
