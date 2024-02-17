<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$database = "learnease";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $location = $_POST['location'];// Remember to hash the password before storing in the database
    $number = $_POST['number'];
    // $role = $_POST['txtrole'];

    // SQL injection prevention - escape special characters in input fields
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $location = mysqli_real_escape_string($conn, $location);
    $number = mysqli_real_escape_string($conn, $number);
    // $role = mysqli_real_escape_string($conn, $role);

    // Check if email already exists
    $check_query = "SELECT * FROM tbl_users WHERE email = '$email'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Insert user data into the database
        $insert_query = "INSERT INTO tbl_users (name, email, password, location, number) VALUES ('$name', '$email', '$password', '$location', '$number')";
        if ($conn->query($insert_query) === TRUE) {
            echo "Registration successful!";
            header("Location: login.php");
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
