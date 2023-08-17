<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}
?>
<h1>Welcome to your dashboard, <?php echo $_SESSION['user_id']; ?></h1>
<a href="logout.php">Logout</a>
