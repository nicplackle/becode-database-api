<?php

require "config.php";
require "common.php";


// Use an HTML form to create a new entry in the users table

if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        // insert new user code will go here

        // here we can use regular POST variables without sanitization, because we're submitting to te database with 'prepared statements'

        $new_note = array(
        "title" => $_POST['title'],
        "note" => $_POST['note'],
        );

        // use sprint to insert data in x (y) and :z values

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "note_app",
            implode(", ", array_keys    ($new_note)),
            ":" . implode(", :", array_keys ($new_note))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_note);

}   catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
}

?>


<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?><?php echo $_POST['title']; ?> Note successfully added!
<?php } ?>

<h2>Create a Note</h2>

<form method="post">
<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    	<label for="title">Title</label>
    	<input type="text" name="title" id="title">
    	<label for="note">Note</label>
    	<input type="text" name="note" id="note">
    	<!--<label for="date">Date</label>-->
    	<!--<input type="text" name="date" id="date">-->
        <!-- button -->
    	<input type="submit" name="submit" value="submit">
    </form>

    <a href="index.php">Back to home</a>


<?php require "templates/footer.php"; ?>
