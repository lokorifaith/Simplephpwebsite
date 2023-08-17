<style>
/* Reset default list styles */
ul,
li {
    list-style: none;
    margin: 0;
    padding: 0;
}

/* Style the menu */
menu {
    display: flex;
    justify-content: space between;
    background-color: #333;
    padding: 20px 0;
}

menu a {
    text-decoration: none;
    color: #fff;
    padding: 2px 8px;
    border-radius: 2px;
    transition: background-color 0.2s;
}

menu a:hover {
    background-color: blue;
}
</style>
<?php 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Simple php website test</title>
    <style>
        body{
            background-color: yellow;
}
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #333;
  padding: 10px;
}

.menu-left a,
.menu-right a {
  padding: 10px;
  text-decoration: none;
  color: white;
}

.menu-right {
  margin-left: auto; /* This pushes the "Register" and "Login" links to the right */
}
        
        </style>
</head>

<body>
<nav>
  <div class="menu-left">
    <a href="/views/home.php">Home</a>
    <a href="/views/about.php">About</a>
    <a href="/views/contact.php">Contact</a>
  </div>
  <div class="menu-right">
    <a href="/register.php">Register</a>
    <a href="/login.php">Login</a>
  </div>
</nav>

</body>

</html>