<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$database = "learnease";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $password = $error = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Sanitize and validate user input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to select user from the database based on email
    $query = "SELECT * FROM tbl_users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Check if password matches
        if ($password === $user['password']) {
            // Password matches, set session and redirect
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            // Password doesn't match, set error message
            $error = "Invalid email or password. Please try again.";
        }
    } else {
        // User doesn't exist, set error message
        $error = "User not found. Please try again or sign up.";
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    
    <style>
        body, html {
            background-color: antiquewhite;
            height: 100%;
            object-fit: cover;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: #ffffff;
            box-shadow: #721c24;
            max-width: 550px;
            height: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            width: 30px;
            height: 30px;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
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

<body>
<a href="../index.html" class="back-button"></a>
<div class="card ">
    <div class="card-header">
        <div class="container">
            <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>Log in</h3>
            <div class="card-body">
                <div style="width:450px; margin:0px auto">
                    <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-success">Login</button>
                        </div>
                        <a>You Don't have an Account?  </a><a href="create.php" class="button">Sign up?</a>
                        <?php
                        // Display error message if exists
                        if (!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
