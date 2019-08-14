<?php

// Use an HTML form to edit an entry in the
// users table.


require "config.php";
require "common.php";

if (isset($_GET['id'])) {
    try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];

    $sql = "SELECT * FROM note_app_v2 WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $note = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    } 
    } else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<h2>Edit a note</h2>

<form method="post">
  <?php foreach ($note as $key => $value) : ?>
  <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <!--print data here-->
  <?php endforeach; ?>
  <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
