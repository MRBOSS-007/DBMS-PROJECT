<?php
session_start();

// Check if the session message is set and not empty
if (isset($_SESSION['signMessage']) && !empty($_SESSION['signMessage'])) {
    // Display the session message
    echo "<div class='alert alert-info'>{$_SESSION['signMessage']}</div>";

    // Unset the session message to clear it after displaying
    unset($_SESSION['signMessage']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Union MEC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Admissions</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary" href="login.php">Log in</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid p-0">
  <div class="image-container">
    <img src="images/5853.jpg" class="img-fluid" alt="Image">
    <div class="image-text">
      <label>"Discover Your Inner Star: Register Your Talents in Arts and Sports, Unleash Your Potential Today!"</label>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-4"> <!-- Each card occupies 4 columns -->
      <div class="card custom-card">
        <img src="images/5853.jpg" class="card-img-top" alt="Image">
        <div class="card-text">
          <p class="hover-text">Card 1 Hover Text</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card custom-card">
        <img src="images/5853.jpg" class="card-img-top" alt="Image">
        <div class="card-text">
          <p class="hover-text">Card 2 Hover Text</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card custom-card">
        <img src="images/5853.jpg" class="card-img-top" alt="Image">
        <div class="card-text">
          <p class="hover-text">Card 3 Hover Text</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <div class="side-image-container">
        <img src="images/5853.jpg" class="side-img" alt="Side Image">
      </div>
    </div>
    <div class="col-md-6">
      <div class="side-text-container">
        <p>This is some text on the right side.</p>
      </div>
    </div>
  </div>
</div>

<div class="contact-form-container">
  <div class="contact-form">
    <h2>Sign up</h2>  
    <form action="signUP.php" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <input type="text" class="form-control" id="name" name="username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <?php 
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['signMessage']
             ?>
      </div>
      <button type="submit" class="btn btn-primary" name="signup">Sign up</button>
    </form>
  </div>
</div>


<footer class="footer mt-5" style="background-color: black; color: white;"> <!-- Changed background color to black -->
  <div class="container">
    <span>Made with ❤️ by Vishnu</span> <!-- Added text with heart emoji -->
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>
