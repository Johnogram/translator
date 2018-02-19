<?php
    require_once("includes/init.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Translator P.O.C</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script defer src="assets/js/main.min.js"></script>
    </head>
    <body>

        <!-- HERO -->
        <section class="hero is-primary is-medium">

            <!-- HERO BODY -->
            <div class="hero-body">
                <div class="container has-text-centred">
                    <h2 class="subtitle">
                        Select your language below
                    </h2>
                </div>
            </div>
            <!--/HERO BODY -->

            <!-- HERO FOOTER -->
            <div class="hero-foot">
                <nav class="tabs">
                    <div class="container">
                        <ul>
                            <li><a href="#">English</a></li>
                            <li><a href="#">Francais</a></li>
                            <li><a href="#">Deutsch</a></li>
                            <li><a href="#">Pirate, argh!</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!--/HERO FOOTER -->

        </section>
        <!--/HERO -->

        <!-- FORM -->
        <section class="section is-medium">
            <div class="container">
                <h1 class="title">Welcome to our app!</h1>
                <p style="margin-bottom: 1em;">Please fill in this form</p>
                <div class="field is-grouped">
                    <div class="control">
                        <a href="#" class="button is-success">Next</a>
                    </div>
                    <div class="control">
                        <a href="#" class="button is-warning">Submit</a>
                    </div>
                </div>
            </div>
        </section>
        <!--/FORM -->

    </body>
</html>