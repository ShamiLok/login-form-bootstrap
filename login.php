<?php
$servername = "localhost";
$username = "root"; // Database username (default is "root" for OpenServer)
$password = ""; // Database password (default is empty for OpenServer)
$dbname = "users"; // Name of the database you created

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful authentication, perform necessary actions
        echo "Successful authentication!";
    } else {
        // Invalid credentials, perform necessary actions
        echo "Invalid username or password!";
    }
}

// Close the database connection
$conn->close();
?>
