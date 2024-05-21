<?php 
include_once "parts/header.php";
include_once "functions.php";
?>

<body>
  <header>
    <?php include_once "parts/navbar.php" ?>
  </header>

  <!-- DARK MODE PHP -->
  <?php include_once "parts/DarkMode.php" ?>

  <main style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
    <section>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active Images">
            <img src="img/StarWarsBanner.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item Images">
            <img src="img/Executor_BF2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item Images">
            <img src="img/HomeOne.jpeg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div>
        <h1 class="h1nefunguje" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">Black
          Market of the Empire</h1>
        <div class="HlavnyText" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
          <p>Welcome to the <strong>totally</strong> legal market with decomissioned equipment of the Empire and
            everything that came before it.</p>
          <p>Looking for a ship? Why not a whole cruiser! <br>Looking for a blaster? Why not a handheld cannon!</p>
          <p>We have everything you are looking for and even more! And what's more, it's affordable (mostly)!</p>
          <p>Did you ever hear the Tragedy of Darth Plagueis the Wise? If not, click <a
              href="https://starwars.fandom.com/wiki/The_Tragedy_of_Darth_Plagueis_the_Wise" target="_blank"
              class="Prekliky">here.</a><br>
            If you want to see further details about our goods and their prices, click <a href="cennik.html"
              class="Prekliky">here.</a><br>
            If you have any futher questions, feel free to contact us <a href="kontakt.html" class="Prekliky">here.</a>
        </div>
      </div>

      <!--<div class="accordion" id="accordionExample">
        <h3 class="text-center" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">F&Q
        </h3>
        <div class="accordion-item" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne">
              Do you ship galaxy-wide?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Yes, we do!
            </div>
          </div>
        </div>
        <div class="accordion-item" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Are there any hidden fees?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              There aren't, if you know how to deal.
            </div>
          </div>
        </div>
        <div class="accordion-item" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Can I get in trouble for owning any of your products?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              We aren't legally allowed to answer this.
            </div>
          </div>
        </div>
      </div> -->
    </section>

    <section>
      <?php
        include_once "classes/QnA.php";
        use otazkyodpovede\QnA;

        $qna = new QnA();
        $qna->insertQnA();
      ?>
    </section>


    <section> 
      <?php
        $qna->displayQnA(); 
      ?>
    </section>


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