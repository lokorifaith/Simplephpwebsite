
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
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
   
</head>

<body>
    <header>
    <?php 
        require "auth.php"; ?>
    <?php require "template/header.php"; ?>
    </header>

    <main>
        <h1>Register</h1>

<form action="register_process.php" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="email" placeholder="email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Register">
</form>
</main>

<?php require "template/footer.php";?>
</body>

</html>

