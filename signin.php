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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check user credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome, " . $user['username'];
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }

    $stmt->close();
}
$conn->close();
?>
