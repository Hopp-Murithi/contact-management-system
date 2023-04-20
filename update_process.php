

<?php
require_once './db_config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $contact_id = $_POST['contact_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update contact information in the database
    $sql = "UPDATE contacts SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone WHERE id = :contact_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':contact_id', $contact_id);
    $stmt->execute();

    // Redirect back to read.php with updated contact list
    header('Location: read.php');
    exit();
}
?>

