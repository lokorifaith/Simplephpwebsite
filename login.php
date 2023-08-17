<style>


.hide {
    display: none;
}
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

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        header('Location: /Back Office/back_office.php');
        exit();
    } else {
        $loginError = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Simple PHP Website</title>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>

    <div class="login-form">
        <?php
        if (isset($loginError)) {
            echo "<div class='error'>$loginError</div>";
        }
        ?>

        <form action="login_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username"><br>
            <label for="password">Password:</label>
            <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
    </div>


</body>
</html>
