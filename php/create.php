<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    

    <style>
      body {
    font-family: Arial, sans-serif;
    background-color: antiquewhite;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 100vh;
}

h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 95%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    width: 50%;
    padding: 10px;
    border: none;
    margin-left: 140px;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    align-items: center;
    text-align: center;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
.back-button {
            background-image: url(../assets/back.png);
            position: absolute;
            height: 6rem;
            width: 6rem;
            top: 10px;
            left: 10px;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

    </style>
</head>

<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$database = "learnease";

// Connect to the database
$con = mysqli_connect($servername, $username, $password, $database);
?>

<body>
<a href="../index.html" class="back-button"></a>
    <div class="container">
        <h2>Register</h2>
        <form action="createConfirmation.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" id="number" name="number" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
            <center>
            <a>You have already an Account?  </a><a href="login.php" class="button">Log in?</a></center>
        </form>
    </div>
</body>
</html>
