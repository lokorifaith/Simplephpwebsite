
 
 <?php

// Initialize variables
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $name = cleanInput($_POST['name']);
    $email = cleanInput($_POST['email']);
    $message = cleanInput($_POST['message']);

    // Validate name
    if (empty($name)) {
        $nameErr = "Name is required";
    }

    // Validate email
    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    // Validate message
    if (empty($message)) {
        $messageErr = "Message is required";
    }

    // If no validation errors, simulate processing and display thank you message
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        // Simulate processing (replace with actual processing logic)
        // You can send emails, store in database, etc.

        // Display thank you message
        $successMessage = "Thank you for your submission!<br>";
        $successMessage .= "Name: $name<br>";
        $successMessage .= "Email: $email<br>";
        $successMessage .= "Message: $message";
    }
}

function cleanInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>


<style>
    body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #007bff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label,
        input,
        textarea {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <?php require "../template/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Simple PHP Website</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>

    <div class="contact-form">
        <?php
        if (!empty($successMessage)) {
            echo "<div class='success'>$successMessage</div>";
        }
        ?>

        <form method="post" action="thank_you.php">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error"><?php echo $nameErr; ?></span><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span><br>

            <label for="message">Message:</label>
            <textarea name="message"><?php echo $message; ?></textarea>
            <span class="error"><?php echo $messageErr; ?></span><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php require "../template/footer.php";?>

</body>
</html>
