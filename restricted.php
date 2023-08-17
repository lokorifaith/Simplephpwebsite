<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<h1>This is a restricted page only accessible to logged-in users.</h1>
<a href="dashboard.php">Go back to dashboard</a>
