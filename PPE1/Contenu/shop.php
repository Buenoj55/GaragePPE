<?php
    include('AccesBDDShop.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Profil</title>
<?php include("../head.php"); ?>

<body>
    <?php include("../header.php"); ?>

    <section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>Shop</h2>
               <p class="lead">Vous trouverez ici les différentes pièces dont nous disposons dans notre stock.</p>
            </div>
        

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" data-filter="*">Tout</a></li>
                <?php
                    $resultatCategorie = selectCategorie('categorie_Piece');

                    foreach ($resultatCategorie as $resultatCat)
                    {
                        echo '<li><a class="btn btn-default" data-filter=".'.$resultatCat['0'].'">'.$resultatCat['0'].'</a></li>';
                    }
                ?>
            </ul><!--/#portfolio-filter-->

            <div class="row">
                <div class="portfolio-items">
                    <?php
                        $nbPiece = selectNbPiece();
                        $resultatPiece = selectPiece();
                        for ($n = 0; $n < $nbPiece['nb'] ; $n++)
                        {
                            echo '<div class="portfolio-item '.$resultatPiece[$n]['4'].' col-xs-12 col-sm-4 col-md-3">
                                    <div class="recent-work-wrap">
                                        <img class="img-responsive" src="/PPE1/images/Shop/recent/'.$resultatPiece[$n]['0'].'.png" alt="" width="290" height="200">
                                        <div class="overlay">
                                            <div class="recent-work-inner">
                                                <h3><a href="#">'.$resultatPiece[$n]['1'].'</a></h3>
                                                <h4>'.$resultatPiece[$n]['4'].'</h4>
                                                <p>'.$resultatPiece[$n]['2'].' €</p>
                                                <a class="preview" href="/PPE1/images/Shop/full/'.$resultatPiece[$n]['0'].'.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                            </div> 
                                        </div>
                                    </div>
                                </div><!--/.portfolio-item-->';
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; Speedy
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="/PPE1/js/bootstrap.min.js"></script>
    <script src="/PPE1/js/jquery.prettyPhoto.js"></script>
    <script src="/PPE1/js/jquery.isotope.min.js"></script>
    <script src="/PPE1/js/wow.min.js"></script>
    <script src="/PPE1/js/main.js"></script>
    <script src="/PPE1/assets/js/zabuto_calendar.jquery.json"></script>
</body>
</html>