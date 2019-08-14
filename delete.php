<?php

// Delete a user

require "config.php";
require "common.php";

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $id = $_GET["id"];

    $sql = "DELETE FROM note_app_v2 WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "Note successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM note_app_v2";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<h2>Delete notes</h2>

<?php if ($success) echo $success; ?>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Note</th>
      <th>Date</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
      <td><?php echo escape($row["title"]); ?></td>
      <td><?php echo escape($row["note"]); ?></td>
      <td><?php echo escape($row["date"]); ?> </td>
      <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>




<?php
// old test
// $servername = "localhost";
// $username = "admin";
// $password = "ztm5lyen9Hkk";
// $dbname = "becode_database_api";
// 
// // require 'db_connection.php';
// 
// try {
//     $conn = new PDO// ("mysql:host=$servername;// dbname=$dbname",$username, // $password);
//     // set the PDO error mode to // exception
//     $conn->setAttribute// (PDO::ATTR_ERRMODE, // PDO::ERRMODE_EXCEPTION);
// 
//     // sql to delete a record
//     $sql = "DELETE FROM note_app WHERE // Title=' '";
// 
//     // use exec() because no results // are returned
//     $conn->exec($sql);
//     echo "Record deleted successfully";
//     }
// catch(PDOException $e)
//     {
//     echo $sql . "<br>" . $e->getMessage// ();
//     }
// 
// $conn = null;
