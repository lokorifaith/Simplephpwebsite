<?php
require_once 'db_connection.php'; // Connection to your database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_submissions (name, email, message,) VALUES ('$name', '$email', '$message')";
    mysqli_query($connection, $sql);

    header('Location: contact.php');
    exit();
}
?>
