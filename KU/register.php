<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollnumber = $conn->real_escape_string($_POST['rollnumber']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Hash the password

    // Insert data into the table
    $sql = "INSERT INTO students (rollnumber, password) VALUES ('$rollnumber', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login.html if registration is successful
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
