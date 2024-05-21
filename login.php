<?php
include_once "parts/header.php";
include_once "parts/navbar.php";
?>
<!-- DARK MODE PHP -->
<?php include_once "parts/DarkMode.php" ?>
</head>

<body style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
    <main
        style="margin-bottom: 350px; margin-top: 350px; background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        <div class="container my-5" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
            <h2 style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">Login</h2>
            <br>
            <form action="authenticate.php" method="POST">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password" required
                        style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Login</button>
                <p class="mt-2">Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </main>
</body>

<!-- DARK MODE SCRIPT -->
<?php
include_once "js/DarkMode.php"
    ?>
<?php
include_once "parts/footer.php";
?>

</html>