<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flipkart_clone";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

    // Check if user already exists
    $checkEmail = $conn->prepare("SELECT * FROM users WHERE email=?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Insert new user into database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        
        if ($stmt->execute()) {
            echo "Sign-up successful! You can now login.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    
    $stmt->close();
}
$conn->close();
?>
