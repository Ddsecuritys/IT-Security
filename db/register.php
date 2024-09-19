<?php
if (isset($_POST['submit'])) {
    // Include database connection
    include_once('db.php');

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if required fields are set
    if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['username'], $_POST['password'])) {
        // Only set $id if it's present in the POST data
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare and execute the query
        $query = "INSERT INTO user (id, fname, lname, email, username, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isssss", $id, $fname, $lname, $email, $username, $password);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            header("Location: ../index.php?register=success");
            exit(); // Always exit after a redirect
        } else {
            // Handle execution error
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please fill all required fields.";
    }
} else {
    echo "Invalid request.";
}
?>
