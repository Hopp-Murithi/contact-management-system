<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once './db_config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert data into the database
    $sql = "INSERT INTO contacts (first_name, last_name, email, phone) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $email, $phone]);

    // Redirect to read.php to view the updated contact list
    header("Location: read.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Contact</title>
<link href="./styles.css" rel="stylesheet" type="stylesheet">
</head>
<body>
    <h1>Create Contact</h1>
    <form method="post" action="create.php">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>
        <input type="submit" value="Create Contact">
    </form>
  
</body>
</html>
