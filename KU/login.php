<?php
session_start(); // Start the session
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
    $password = $conn->real_escape_string($_POST['password']);

    // Fetch user data
    $sql = "SELECT * FROM students WHERE rollnumber = '$rollnumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Store roll number in session
            $_SESSION['rollnumber'] = $rollnumber;
            // Display success message and redirect
            echo "<script>
                alert('Login successful! Welcome, $rollnumber');
                window.location.href = '1.html';
            </script>";
            exit();
        } else {
            // Invalid password popup
            echo "<script>
                alert('Invalid password!');
                window.history.back(); // Go back to login page
            </script>";
        }
    } else {
        // User not found popup
        echo "<script>
            alert('No user found with that roll number!');
            window.history.back(); // Go back to login page
        </script>";
    }
}

$conn->close();
?>
