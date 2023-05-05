<?php
// Start session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);

    // Validate form data
    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $_SESSION["error"] = "Username can only contain letters, numbers, and underscores.";
        header("Location: signup.html");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "Invalid email format.";
        header("Location: signup.html");
        exit();
    }
    if (strlen($password) < 8) {
        $_SESSION["error"] = "Password must be at least 8 characters long.";
        header("Location: signup.html");
        exit();
    }
    if ($password != $confirm_password) {
        $_SESSION["error"] = "Passwords do not match.";
        header("Location: signup.html");
        exit();
    }

    // Add user to database
    // ...
    
    // Set success message and redirect to login page
    $_SESSION["success"] = "Account created successfully. Please log in.";
    header("Location: login.html");
    exit();
}

// Redirect to signup page if form was not submitted
header("Location: signup.html");
exit();

// Function to validate form data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>  
   
