<?php
include_once "parts/header.php"
    ?>

<body class="cierna">
    <header>
        <?php
        include_once "parts/navbar.php"
            ?>
    </header>

    <main>

        <section class="mt-6">
            <div>
                <h1 class="h1nefunguje">How to contact us</h1>
                <div class="HlavnyText">
                    <div>
                        <h3>Contacts</h3>
                        <p>Commlink Number:<a href="tel: 66 5555 501 312" class="KontaktyText"> 66 5555 501 312</a></p>
                        <p>Holonet ID: <a href="mailto: darth.sidious@azet.sk"
                                class="KontaktyText">sheev.palpatine@azet.sk</a> </p>
                        <p>Adress: Palace Court, Federal District, Imperial City; Coruscant [0,0,0]</p>
                    </div>

                    <div>
                        <br>
                        <h3>Where are we?</h3>
                        <img class="rounded-4" src="img/CoruscantMap.jpg" alt="" width="500px">
                    </div>

                    <div>
                        <br>
                        <div class="Formular">
                            <form action="thankyou.html">
                                <h3>Direct e-mail</h3>
                                <input type="text" id="" placeholder="Vaše meno"
                                    style="border-radius: 15px; text-align: center;">
                                <br>
                                <br><input type="email" id="" placeholder="Váš email" class="FormInput"
                                    style="border-radius: 15px; text-align: center;">
                                <br>
                                <br><textarea name="" id="" cols="30" rows="10"
                                    style="border-radius: 15px; text-align: center;">
                                </textarea>
                                <br>
                                <br><input type="submit" value="Odoslať"
                                    style="border-radius: 15px; text-align: center;">
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </main>
</body>

</html>
<?php
include_once "parts/footer.php"
    ?>