<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "learnease";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = logInput($_POST['email']); // Change the variable name to $email
    $providedPassword = $_POST['password'];

    $query = "SELECT * FROM tbl_users WHERE email = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("s", $email);
    $statement->execute();

    $res = $statement->get_result();
    $user = $res->fetch_assoc();

    $response = array();

    if ($user) {
        if ($providedPassword === $user['password']) { // Compare plain text passwords
            $response['message'] = 'success';
            $response['id'] = $user['id'];
        } else {
            // Passwords don't match
            $response['message'] = 'failed';
        }
    } else {
        // User not found
        $response['message'] = 'failed';
    }

    // Set response content type to JSON
    header('Content-Type: application/json');

    // Encode the response as JSON
    $jsonResponse = json_encode($response);

    // Echo the response
    echo $jsonResponse;

    $statement->close();
    $conn->close();
}

function logInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
