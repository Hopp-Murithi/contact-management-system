<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Read.php - Handles retrieving and displaying contact information from the database
require_once './db_config.php';

// Fetch contacts from the database
$sql = "SELECT * FROM contacts";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact List</title>
    <link href="./styles.css" rel="stylesheet" type="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <h1>Contact List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>


        </tr>
        <?php foreach ($contacts as $contact) : ?>
            <tr>
                <td><?php echo $contact['id']; ?></td>
                <td><?php echo $contact['first_name']; ?></td>
                <td><?php echo $contact['last_name']; ?></td>
                <td><?php echo $contact['email']; ?></td>
                <td><?php echo $contact['phone']; ?></td>
                <td>
                    <form method="post" action="update.php">
                        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
                        <input type="submit" value="Update">
                    </form>
                </td>
                <td>
                    <form method="post" action="delete.php">
                        <input type="submit" name="submit" value="Delete">
                    </form>
                </td>
            </tr>
            </td>
        <?php endforeach; ?>
    </table>
</body>

</html>