<style>
    .container {
  /* Set the background image and adjust its properties */
  background-image: url("/image/php.jpeg");
  background-size: cover; /* Adjust image size to cover the entire container */
  background-position: center; /* Center the image within the container */
  background-repeat: no-repeat; /* Prevent image repetition */
  min-height: 100vh; /* Set a minimum height to ensure the entire viewport is covered */
  display: flex; /* Optional: Use flexbox to center content vertically and horizontally */
  align-items: center; /* Optional: Center content vertically */
  justify-content: center; /* Optional: Center content horizontally */
}

.container h1 {
  font-size: 56px;
  color: yellow; /* Optional: Set font color for text */
}


</style>
    <?php
    
    require "../template/header.php"; ?>
    
    <div class="container">
    <h1>Hello faith welcome to PHP- BEGINNERS Test</h1>

    </div>
    <?php require "../template/footer.php";?>

