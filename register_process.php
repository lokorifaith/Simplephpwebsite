<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection setup
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'contact_form_db';

    // Create the database connection
    $connection = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error() . " (Error number: " . mysqli_connect_errno() . ")");
    }

    // Get user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $Password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (username, email,password) VALUES ('$username', '$email','$Password_hash')";

    if (mysqli_query($connection, $sql)) {
        // Query executed successfully
        echo "User registered successfully, redirect in two seconds... !";
        
        header('refresh:2;url=/Back Office/back_office.php');
        die();

    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
