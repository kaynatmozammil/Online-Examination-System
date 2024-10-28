<?php
session_start();

// Database connection details
$servername = "localhost"; // Your database server
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "registerform"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Store the result
    $stmt->store_result();

    // Check if the email exists
    if ($stmt->num_rows > 0) {
        // Bind the result
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['authenticated'] = true;
            $_SESSION['email'] = $email;

            // Redirect to the examination form
            header('Location: examinationForm.php');
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid email or password. Please try again.');</script>";
        }
    } else {
        // Email does not exist
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!-- Redirect back to the sign-in page if accessed directly -->
<script>
    window.location.href = "signin.html";
</script>
