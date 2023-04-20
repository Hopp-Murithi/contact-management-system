<?php

require_once './db_config.php';

// Check if the contact ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Retrieve the contact ID from the URL
    $contact_id = $_GET['id'];

    // Delete the contact from the database
    $sql = "DELETE FROM contacts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$contact_id]);

    // Redirect to read.php to view the updated contact list
    header("Location: read.php");
    exit();
}

?>>


