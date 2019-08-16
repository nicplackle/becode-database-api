<?php

require "config.php";
require "common.php";

$success = null;

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

// Delete a user

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $id = $_POST["submit"];

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
<form method="post">
  <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
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
      <td><?php echo escape($row["date"]); ?></td>
      <td><button type="submit" name="submit" value="<?php echo escape($row["id"]); ?>">Delete</button></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>



