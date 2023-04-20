<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./styles.css">
    <title>Update Contact</title>
</head>

<body>
    <h1>Update Contact</h1>
    <div class="container">
    <?php
    require_once './db_config.php';

    // Check if contact ID is passed in the query parameter
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $contact_id = $_GET['id'];

        // Retrieve contact information from the database based on contact ID
        $sql = "SELECT * FROM contacts WHERE id = :contact_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':contact_id', $contact_id, PDO::PARAM_INT);
        $stmt->execute();
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);

        

        // Populate form fields with retrieved contact data
        echo "<form action='update_process.php' method='post'>";
        echo "First Name: <input type='text' name='first_name' value='" . $contact['first_name'] . "'><br>";
        echo "Last Name: <input type='text' name='last_name' value='" . $contact['last_name'] . "'><br>";
        echo "Email: <input type='email' name='email' value='" . $contact['email'] . "'><br>";
        echo "Phone: <input type='text' name='phone' value='" . $contact['phone'] . "'><br>";
        echo "<input type='hidden' name='contact_id' value='" . $contact['id'] . "'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    }
    ?>
    </div>
  
</body>

</html>