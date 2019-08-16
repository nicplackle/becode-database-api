<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Note App</title>

    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    
    <?php require "templates/header.php"; ?>
    <ul>
      <li>
        <a href="create.php"><strong>Create</strong></a> - Write a note
      </li>
      <li>
        <a href="read.php"><strong>Read</strong></a> - Find a note
      </li>
      <li><a href="update.php"><strong>Update</strong></a> - Edit a note
      </li>
      <li><a href="delete.php"><strong>Delete</strong></a> - Delete a note
      </li>
    </ul>
    <?php require "templates/footer.php"; ?>

  </body>
</html>
