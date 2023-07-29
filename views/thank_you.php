<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $message = $_POST["message"] ?? '';
} else {
    header("Location: /views/contact.php");
    exit();
}
?>

<?php include_once("../template/header.php"); ?>

<h1>Thank You</h1>
<p>Thank you for contacting us, !</p>



<ul>
        <li>Name: <?php echo $name; ?></li>
        <li>Email: <?php echo $email; ?></li>
        <li>Message: <?php echo $message; ?></li>
    </ul>


<?php include_once("../template/footer.php"); ?>