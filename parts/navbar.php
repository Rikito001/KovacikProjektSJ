<nav class="navbar navbar-expand-lg bg-transparent fixed-top fs-5">
  <div class="container-fluid">
    <div>
      <a href="domov.php">
        <div class="obrazok">
        </div>
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-danger" href="domov.php" style="margin-right: 15px">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-danger" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 15px">
            Products
          </a>
          <ul class="dropdown-menu fs-5">
            <li><a class="dropdown-item" href="cruiser.php">Cruisers</a></li>
            <li><a class="dropdown-item" href="fighter.php">Fighters</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="kontakt.php" style="margin-right: 15px">Contact</a>
        </li>
        <!-- LOGIN LINK -->
        <li class="nav-item">
          
          <?php
                session_start();
                if(isset($_SESSION['user_id'])) {
                  echo '<a class="nav-link text-danger" href="logout.php" style="margin-right: 70px">Log Out</a>';
                } else {
                  echo '<a class="nav-link text-danger" href="login.php" style="margin-right: 70px">Login</a>';
                }
              ?>
        </li>
        <!-- DARK MODE SWITCH -->
        <li>
          <label class="switch" style="margin-top: 6px; margin-left: -60px">
            <input type="checkbox" id="toggleTheme" <?php if(isset($_COOKIE["theme"]) && $_COOKIE["theme"] == "dark") { echo "checked"; }?>>
            <span class="slider round"></span>
          </label>
        </li>
      </ul>
    </div>
  </div>
</nav>