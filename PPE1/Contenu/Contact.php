<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Inscription</title>
<?php include("../head.php"); ?>

<body>
    <?php include("../header.php"); ?>

    <section id="feature" class="transparent-bg">
        <div class="container">
            <h2>Contactez-nous</h2>
            <p>Afin de nous contacter, veuillez nous joindre à cette adresse : <a href="mailto: lamine_78@live.fr">ContactSpeedy@hotmail.fr</a></p>
            <form method="post" action="">
            <p>
                <label for="nom"> Votre Nom : </label>
                <input type = "text" name ="nom" value="" /><br/><br/>
                <label for="prenom"> Votre Prénom : </label>
                <input type = "text" name ="prenom" value="" /><br/><br/>
                <label for="email"> Email : </label>
                <input type = "text" name ="email" value="" /><br/><br/>
                <label for="message"> Votre Message : </label>
                <input type = "textarea" name ="message" value="Envoyer" /><br/><br/>

                

            <p>
            </form>
        </div><!--/.container-->
    </section><!--/#contact-page-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy;2017 SPEEDY, Tous Droits Réservés.
                </div>
                <!-- <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>  -->
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="/PPE1/js/bootstrap.min.js"></script>
    <script src="/PPE1/js/jquery.prettyPhoto.js"></script>
    <script src="/PPE1/js/jquery.isotope.min.js"></script>
    <script src="/PPE1/js/wow.min.js"></script>
    <script src="/PPE1/assets/js/zabuto_calendar.jquery.json"></script>
</body>
</html>
