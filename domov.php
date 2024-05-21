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
    <?php
    include_once "parts/carousel.php";
    include_once "parts/description.php";
    ?>

    <section>
      <?php
      include_once "classes/QnA.php";
      use otazkyodpovede\QnA;

      $qna = new QnA();
      $qna->insertQnA();
      ?>
    </section>


    <section>
      <div class="accordion boky" id="accordionExample">
        <h3 class="text-center" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">F&Q
        </h3>
        <?php
        $qna = new QnA();
        $questionsAndAnswers = $qna->getQnAFromDB();

        if ($questionsAndAnswers) {
          foreach ($questionsAndAnswers as $index => $qnaItem) {
            $question = htmlspecialchars($qnaItem['otazka']);
            $answer = htmlspecialchars($qnaItem['odpoved']);
            $collapseId = "collapse" . $index;
            ?>
            <div class="accordion-item" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#<?php echo $collapseId; ?>" aria-expanded="false"
                  aria-controls="<?php echo $collapseId; ?>">
                  <?php echo $question; ?>
                </button>
              </h2>
              <div id="<?php echo $collapseId; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php echo $answer; ?>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          echo '<p>Nenašli sa žiadne otázky a odpovede.</p>';
        }
        ?>
      </div>
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