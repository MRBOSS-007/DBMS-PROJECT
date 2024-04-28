

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
  <h2>User Registration Form</h2>
  <form action="registor_script.php" method="POST">
    <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" >
    </div>
    <div>
      <label for="email">Email ID:</label>
      <input type="email" id="email" name="email">
    </div>
    <div>
      <label for="phone">Phone Number:</label>
      <input type="text" id="phone" name="phone" required>
    </div>
    <div>
      <label for="class">Class:</label>
      <input type="text" id="class" name="class" required>
    </div>
    <div>
      <label for="year">Year:</label>
      <input type="text" id="year" name="year" required>
    </div>
    <div>
      <label for="department">Department:</label>
      <input type="text" id="department" name="department" required>
    </div>
    <div>
      <label for="regno">Registration Number:</label>
      <input type="text" id="regno" name="regno" required>
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
