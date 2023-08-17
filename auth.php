<?php

// Start a session
session_start();

// Function to authenticate the user
function authenticate_user($username, $password) {
    // Replace the following lines with actual database queries
    // to check if the provided username exists and retrieve the stored hashed password
    $stored_username = "john_doe"; // Replace with the actual stored username
    $stored_hashed_password = '$2y$10$XrN6RLM4iGQkMwNjm9LbA.M79Qw5oahJ9fDQyAsZrGAt84jTqTIm'; // Replace with the actual stored hashed password

    // Verify the password
    if ($username === $stored_username && password_verify($password, $stored_hashed_password)) {
        // Authentication successful
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        return true;
    } else {
        // Authentication failed
        return false;
    }
}

// Function to check if the user is logged in
function is_user_authenticated() {
    return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
}

// Function to get the current logged-in username
function get_logged_in_username() {
    return $_SESSION['username'] ?? null;
}

// Function to log out the user
function logout_user() {
    session_unset();
    session_destroy();
}
