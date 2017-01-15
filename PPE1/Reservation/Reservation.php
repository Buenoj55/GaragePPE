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
                <div class="col-lg-12">
                    <form method="post" class="col-lg-8">
                        <h2>Prendre rendez-vous</h2>

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

                        <button type="submit" class="btn btn-primary btn-lg" value="SelectionDate" name="SelectionDate">Sélectionner la date</button>
                    </form>

                    <?php
                        if (isset($_POST['SelectionDate']))
                        {
                            include('AccesBDDReservation.php');
                            
                            echo '<div class="col-lg-4">';
                            echo '<h2>'.$_POST['DateReservation'].'</h2>';
                            echo '<legend>Sélectionner une horaire :</legend>';
                            echo '<select class="form-control">';
                            for ($i = 8; $i < 19 ; $i++)
                            {                                 
                                echo '<option value="'.$i.'">'.$i.':00</option>';
                            }
                            echo '</select>';
                            echo '<button type="submit" class="btn btn-primary btn-lg" value="Valider" name="Valider">Valider la Réservation</button>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div><!--/.container-->
    </section><!--/#feature-->

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
</body>
</html>