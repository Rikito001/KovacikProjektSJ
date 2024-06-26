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
      <div class="container mt-6"  style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        <div class="row">
          <div class="col-md-6">
            <img src="img/HomeOne.jpeg" alt="" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">Republic Home One</h2>
            <p>Modified MC80A Home One Type Heavy Star Cruiser of the Alliance Fleet.</p>
            <p>Price: 5.5 Million Credits</p>
          </div>
        </div>
      </div>

      <div class="container mt-6" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        <div class="row">
          <div class="col-md-6">
            <img src="img/Executor_BF2.png" alt="" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">Executor-class Star Dreadnought</h2>
            <p>Imperial Executor-class Star Dreadnought, flagship of Darth Vader.</p>
            <p>Price: 9 Million Credits</p>
          </div>
        </div>
      </div>

      <div class="container mt-6" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        <div class="row">
          <div class="col-md-6">
            <img src="img/ie5agdcmxkk81.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">Venator-class Cruiser</h2>
            <p>Venator-class Cruiser of the Galactic Republic.</p>
            <p>Price: 1.5 Million Credits</p>
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