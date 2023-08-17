<?php
require "db_connection.php";

// Get the requested page from the URL
$request = $_SERVER['REQUEST_URI'];
$parts = explode('/', rtrim($request, '/'));

// Get the page identifier from the URL (assuming the identifier is in the first part of the URL)
$pageIdentifier = $parts[0];

// Query the database to fetch the page data based on the identifier
$sql = "SELECT title, content FROM pages WHERE id = ?"; // Replace "identifier" with the appropriate column name
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $pageIdentifier);
$stmt->execute();
$result = $stmt->get_result();

//Check if the page exists in the database
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $pageTitle = $row["title"];
    $pageContent = $row["content"];
} else {
    // Page not found, display a 404 error page or redirect to the home page
    header("Location: index.php"); // Redirect to the home page if the page doesn't exist
    exit();
}

// Close the database connection
$stmt->close();
$conn->close();
?>