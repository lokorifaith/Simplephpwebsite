
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
    <?php
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (Your existing code to process form data)

    // Save the contact form submission to the database
    $servername = "localhost";
    $dbUsername = "users";
    $dbPassword = "";
    $dbname = "contact_form_db";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO contact_submissions (fullname, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullname, $email, $message);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    // Redirect to the thank_you.php page with form data as query parameters
    header("Location: thank_you.php?name=" . urlencode($fullname) . "&email=" . urlencode($email) . "&message=" . urlencode($message));
    exit();
}
?>
<?php
 
 $name = $email = $message = "";
 $nameErr = $emailErr = $messageErr = "";
 
 function validate_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Validate Name field
     if (empty($_POST["name"])) {
         $nameErr = "Name is required";
     } else {
         $name = validate_input($_POST["name"]);
         // Check if name contains only letters and whitespace
         if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
             $nameErr = "Only letters and white space allowed";
         }
     }
 
     // Validate Email field
     if (empty($_POST["email"])) {
         $emailErr = "Email is required";
     } else {
         $email = validate_input($_POST["email"]);
         // Check if email address is well-formed
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailErr = "Invalid email format";
         }
     }
 
     // Validate Message field
     if (empty($_POST["message"])) {
         $messageErr = "Message is required";
     } else {
         $message = validate_input($_POST["message"]);
     }
 
     // If there are no validation errors, simulate processing and show the "Thank You" page
     if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
         // Simulate processing (you can perform database operations or send an email here)
         // For this example, we'll simply redirect to the thank you page with the user-submitted data
         header("Location: thank_you.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&message=" . urlencode($message));
         exit();
     }
 }
 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
     <title>Contact Us</title>
     <style>
         .error { color: red; }
     </style>
 </head>
 <body>
 <?php require "../template/header.php"; ?> 

    
         <h2>Contact Us</h2>
         <form method="post" action="../views/thank_you.php">
             <label for="name">Name:</label>
             <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            
             <br><br>
             <label for="email">Email:</label>
             <input type="email" id="email" name="email" value="<?php echo $email; ?>">
             
             <br><br>
             <label for="message">Message:</label>
             <textarea id="message" name="message"><?php echo $message; ?></textarea>
             
             <br><br>
             <input type="submit" value="Submit">
         </form>
         <?php require "../template/footer.php";?>

 
    
 </body>
 </html>
 