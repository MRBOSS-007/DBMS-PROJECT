<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <link rel="stylesheet" href="registor.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<div class="username-display">
    <?php
    session_start(); // Start the session to access session variables

    // Check if the session variable exists and echo the username
    if (isset($_SESSION['username'])) {
      echo 'Logged in as: ' . $_SESSION['username'];
    }
    ?>
  </div>
  <h2> Sports Activity </h2>
  <form action="sports_script.php" method="POST">
    <div>
      <label for="name">Outdoor</label>
      <input type="text" id="name" name="outdoor" >
    </div>
    <div>
      <label for="email">Indoor:</label>
      <input type="text" id="text" name="indoor">
    </div>
    <div>
      <label for="">Atheletic</label>
      <input type="text" id="Atheletic" name="Atheletic" required>
    </div>
    <div>
      <label for="class">throw events </label>
      <input type="text" id=" throw" name="throw" required>
    </div>
    <button type="submit"name="reg">Register</button>
  </form>
  <?php
session_start(); // Start the session to access session variables

// Check if the signMessage session variable is set and not empty
if (isset($_SESSION['signMessage']) && !empty($_SESSION['signMessage'])) {
    echo '<div class="sign-message">' . $_SESSION['signMessage'] . '</div>'; // Display the message inside a div
    unset($_SESSION['signMessage']); // Clear the message after displaying it
}
?>
</body>
</html> 
