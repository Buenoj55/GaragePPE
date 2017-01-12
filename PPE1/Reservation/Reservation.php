<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Réservation</title>
<?php include("../head.php"); ?>

<body>
    <?php include("../header.php"); ?>

    <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                <form method="post">
                    <h2>Calendrier</h2>

                    <legend>Sélectionner la date de réservation : </legend>

                    <div class="datepicker-wrap">
                        <input name="DateReservation" class="input-text full-width hasDatepicker" type="text">
                    </div>

                    <input type="hidden" name="DateReservation">

                    <div id="my-calendar" class="my-calendar">
                        <!-- show date events with a modal window -->
                        <script type="application/javascript">
                            $(document).ready(function () {
                                $('.datepicker-wrap').click(function() {
                                    $('div[id*=zabuto_calendar]').fadeIn('400');
                                });

                            /*Hide if click outside */
                                $('body').click(function(e){
                                    if(!$(e.target).closest('.zabuto_calendar *,.datepicker-wrap,span[class*="glyphicon-chevron"],.calendar-month-navigation').length){
                                    }
                                })

                            /* Set the calendar */
                                $("#my-calendar").zabuto_calendar({
                                    show_next: true,
                                    show_previous: false,
                                    language: "fr",
                                    cell_border: false
                                });
                            /* Get date and Hide*/
                                $('.zabuto_calendar').delegate('.day','click',function(){
                                    var regExp = /\d*-\d+-\d+/;
                                    var date = regExp.exec($(this).attr('id'));
                                    var formatedDate = date[0].replace(/(\d*)-(\d+)-(\d+)/,"$3/$2/$1");
                                    $('.hasDatepicker').val(formatedDate);
                                    $('[name="DateReservation"]').val(formatedDate);
                                    $('[name="DateReservation"]').attr('value',formatedDate);
                                    Cookies.set('DateReservation',formatedDate)
                                })
                            });
                        </script>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" value="Valider" name='Valider'>Valider la réservation</button>
                </form>
            </div>
        </div><!--/.container-->
    </section><!--/#feature-->

    <?php
        if (isset($_POST['Valider']))
        {
            include('AccesBDDReservation.php');
            ValiderReservation();
        }
    ?>

    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">We are hiring</a></li>
                            <li><a href="#">Meet the team</a></li>
                            <li><a href="#">Copyright</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Refund policy</a></li>
                            <li><a href="#">Ticket system</a></li>
                            <li><a href="#">Billing system</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Developers</h3>
                        <ul>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">SEO Marketing</a></li>
                            <li><a href="#">Theme</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Email Marketing</a></li>
                            <li><a href="#">Plugin Development</a></li>
                            <li><a href="#">Article Writing</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Our Partners</h3>
                        <ul>
                            <li><a href="#">Adipisicing Elit</a></li>
                            <li><a href="#">Eiusmod</a></li>
                            <li><a href="#">Tempor</a></li>
                            <li><a href="#">Veniam</a></li>
                            <li><a href="#">Exercitation</a></li>
                            <li><a href="#">Ullamco</a></li>
                            <li><a href="#">Laboris</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
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
    <script src="/PPE1/js/main.js"></script>
    <script src="/PPE1/js/wow.min.js"></script>
</body>
</html>