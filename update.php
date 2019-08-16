<?php


require "config.php";
require "common.php";

// List all users with a link to edit

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

<!-- test melding -->
<?php if (isset($_POST['submit']) && $statement) { ?><?php echo $_POST['title']; ?> Note successfully edited!
<?php } ?>

<h2>Update users</h2>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
    
      <th>Date</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
      <td><?php echo escape($row["title"]); ?></td>
      <td><?php echo escape($row["note"]); ?></td>
      <td><?php echo escape($row["date"]); ?> </td>
      <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>

