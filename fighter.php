<?php
include_once "parts/header.php"
  ?>

<body>
  <header>
    <?php
    include_once "parts/navbar.php"
      ?>
  </header>


  <!-- DARK MODE PHP -->
  <?php
  include_once "parts/DarkMode.php"
    ?>

  <main class="odsadenie" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
    <section class="">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="img/Star-Wars-TIE-Fighter-Hd-Wallpaper-4k-For-Pc.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">TIE Fighter</h2>
            <p>Mass produced Imperial TIE Fighter.</p>
            <p>Price: 180K Credits</p>
          </div>
        </div>
      </div>

      <div class="container mt-6">
        <div class="row">
          <div class="col-md-6">
            <img src="img/Star-Wars-TIE-Advanced.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">TIE Fighter Advanced</h2>
            <p>Imperial TIE Fighter Advanced, limited production.</p>
            <p>Price: 350K Credits</p>
          </div>
        </div>
      </div>

      <div class="container mt-6">
        <div class="row">
          <div class="col-md-6">
            <img src="img/Xwing.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">X-Wing</h2>
            <p>X-Wing Figther of the Galactic Republic and Alliance.</p>
            <p>Price: 100K Credits</p>
          </div>
        </div>
      </div>

    </section>
  </main>

    <!-- DARK MODE SCRIPT -->
    <?php
  include_once "js/DarkMode.php"
  ?>
  
</body>

</html>

<?php
include_once "parts/footer.php"
  ?>