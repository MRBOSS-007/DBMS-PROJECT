
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
  <h2>Arts registration form </h2>
  <form action="arts_script.php" method="POST">
    <div>
      <label for="name">Dance </label>
      <input type="text" id="dance" name="dance" >
    </div>
    <div>
      <label for="email">Music</label>
      <input type="text" id="music" name="music">
    </div>
    <div>
      <label for="phone">Drama</label>
      <input type="text" id="drama" name="drama">
    </div>
    <div>
      <label for="class">Acting</label>
      <input type="text" id="class" name="acting">
    </div>
    <div>
      <label for="year">Other</label>
      <input type="text" id="other" name="Other">
    </div>
    <div>
      <label for="department">Achievements</label>
      <input type="text" id="Achievements" name="Achievements" required>
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