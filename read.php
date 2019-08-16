<?php

    require "config.php";
    require "common.php";

    // function to query information based on a parameter: in this case, 'title'

    if (isset($_POST['submit'])) {

    try {
      $connection = new PDO($dsn, $username, $password, $options);
        // fetch data code will go here  
        $sql = "SELECT * FROM note_app_v2 WHERE title = :title";   
        // put POST into a variable
        $title = $_POST['title'];

        // prepare, bind and execute the statement
        $statement = $connection->prepare($sql);
        $statement ->bindParam(':title', $title, PDO::PARAM_STR);
        $statement ->execute();

        // fetch the result
        $result = $statement->fetchAll();
              
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  }
?>

<?php require "templates/header.php"; ?>
    
<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { 
?>

<h2>Find note</h2>


<table>
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Note</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
<?php foreach ($result as $row) { ?>
        <tr>
          <td><?php echo escape($row["id"]); ?></td>
          <td><?php echo escape($row["title"]); ?><td>
          <td><?php echo escape($row["note"]); ?></td>
          <td><?php echo escape($row["date"]); ?></td>
        </tr>
<?php } ?>
        </tbody>
       </table>

<?php } else { ?>No results found for <?php echo escape($_POST['title']); ?>.
<?php }
} ?>

<h2>Find note by title</h2>
<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
<form method="post">
    <label for="title">Title</label>
    <input type="text" id="title" name="title">
    <input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>  
    
<?php require "templates/footer.php"; ?>