<?php
include_once "parts/header.php";
include_once "parts/navbar.php";
?>
<!-- DARK MODE PHP -->
<?php include_once "parts/DarkMode.php"; ?>
</head>

<body style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
  <main
    style="margin-bottom: 350px; margin-top: 350px; background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
    <div class="container mt-5" class="container my-5"
      style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
      <h2 style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">Register</h2>
      <br>
      <form action="classes/RegisterCode.php" method="POST">
        <div class="form-group">
          <label for="name">First Name:</label>
          <input type="text" class="form-control" id="name" name="name" required
            style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        </div>
        <br>
        <div class="form-group">
          <label for="surname">Surname:</label>
          <input type="text" class="form-control" id="surname" name="surname" required
            style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        </div>
        <br>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" id="email" name="email" required
            style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        </div>
        <br>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required
            style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Register</button>
        <p class="mt-2">Already have an account? <a href="login.php">Login here</a></p>
      </form>
    </div>
  </main>
</body>

<!-- DARK MODE SCRIPT -->
<?php
include_once "js/DarkMode.php";
include_once "parts/footer.php";
?>

</html>