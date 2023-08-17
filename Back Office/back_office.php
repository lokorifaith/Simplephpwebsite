<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Perform form validation here

    // Insert the new page into the database
    $sql = "INSERT INTO pages (title, content) VALUES ('$title', '$content')";
    mysqli_query($connection, $sql);

    header('Location: back_office.php');
    exit();
}

$sql = "SELECT * FROM pages";
$result = mysqli_query($connection, $sql);
$pages = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Back Office - Simple PHP Website</title>
</head>
<body>
    <header>
        <h1>Back Office</h1>
        <a href="logout.php">Logout</a>
    </header>

    <h2>Create New Page</h2>
    <form method="post">
        <label for="title">Page Title:</label>
        <input type="text" name="title" required><br>
        <label for="content">Page Content:</label>
        <textarea name="content" required></textarea><br>
        <input type="submit" value="Create Page">
    </form>

    <h2>Existing Pages</h2>
    <ul>
        <?php foreach ($pages as $page): ?>
            <li>
                <h3><?php echo $page['title']; ?></h3>
                <p><?php echo $page['content']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
