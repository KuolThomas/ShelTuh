<?php
// Start session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    // Validate form data
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "Invalid email format.";
        header("Location: login.html");
        exit();
    }
    if ($email != "user@example.com" || $password != "password") {
        $_SESSION["error"] = "Incorrect email or password.";
        header("Location: login.html");
        exit();
    }

    // Set success message and redirect to home page
    $_SESSION["success"] = "Logged in successfully.";
    header("Location: index.html");
    exit();
}

// Show error message if there is one
if (isset($_SESSION["error"])) {
    echo "<p class='error'>" . $_SESSION["error"] . "</p>";
    unset($_SESSION["error"]);
}
?>
