<header>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                    <?php
                        if (isset($_SESSION['ID_Client']))
                        {                       
                            echo '<div class="top-number">
                                    <h7>Bienvenue '.$_SESSION['prenom_Particulier'].' '.$_SESSION['nom_Particulier'].'</h7>
                                    <a class="btn btn-primary btn-sm" class="navbar-form navbar-right inline-form" href="/PPE1/connexion/deconnexion.php" style="margin-top: 0.5%">Deconnexion</a>
                                </div>';
                            echo '<a href="/PPE1/Profil/Profil.php">Voir mon profil</a>';
                        }
                        else
                        {
                            echo '<div class="top-number">
                                    <a href="/PPE1/Connexion/Connexion.php">Connexion |</a>
                                    <a href="/PPE1/Connexion/Inscription.php">Inscription</a>
                                </div>';
                        }
                    ?>
                </div>
                <div class="col-sm-6 col-xs-8">
                   <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                       </div>
                   </div>
                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/PPE1/index.php"><img src="/PPE1/images/logo.png" alt="logo" width="35%" height="35%"></a>
            </div>
			
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="/PPE1/index.php">Accueil</a></li>
                    <li><a href="/PPE1/Reservation/Reservation.php">RDV</a></li>
                    <li><a href="/PPE1/portfolio.html">Portfolio</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/PPE1/blog-item.html">Blog Single</a></li>
                            <li><a href="/PPE1/pricing.html">Pricing</a></li>
                            <li><a href="/PPE1/404.html">404</a></li>
                            <li><a href="/PPE1/shortcodes.html">Shortcodes</a></li>
                        </ul>
                    </li>
                    <li><a href="/PPE1/blog.html">Blog</a></li> 
                    <li><a href="/PPE1/contact-us.html">Contact</a></li>
                    <li><a href="/PPE1/about-us.html">A propos</a></li>    
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->