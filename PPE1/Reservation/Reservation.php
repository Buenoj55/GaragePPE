<?php
    session_start();
    include('AccesBDDReservation.php');
?>

<!DOCTYPE html>
<html lang="fr">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Réservation</title>
<?php include("../head.php"); ?>

<body>
    <?php include("../header.php"); ?>

    <section>
        <div class="container">
            <div class="center wow fadeInDown">
                <div class="col-lg-12">
                    <form method="post">
                        <h2 class="animation animated-item-1">Prendre rendez-vous</h2>

                        <div class="col-lg-6">
                            <legend>Sélectionner la date de réservation : </legend>

                            <div class="datepicker-wrap col-lg-6">
                                <input name="DateReservation" class="input-text full-width hasDatepicker form-control" type="text">
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
                        </div>


                        <div class="col-lg-6">
                            <legend>Sélectionner un véhicule :</legend>

                            <?php
                                $resultatVehicules = vehiculeClient($_SESSION['ID_Client']);
                                $nbVehicules = nbVehicule();

                                if ($nbVehicules['nb'] != 0) 
                                {                           
                                    echo '<select name="ID_Vehicule" class="form-control">';

                                    for ($n = 0 ; $n < $nbVehicules['0'] ; $n++)
                                    {
                                        echo '<option value="'.$resultatVehicules[$n]['0'].'">'.$resultatVehicules[$n]['1'].' '.$resultatVehicules[$n]['2'].' - '.$resultatVehicules[$n]['3'].'</option>';
                                    }

                                    echo '</select>';
                                }
                                else { echo '<h3>Vous n\'avez pas enregistré de véhicule.</h3>
                                                <h4><span class="label label-warning">Veuillez en enresgistrer sur votre profil <a href="../Profil/Profil.php">ici</a></span></h4>'; }
                            ?>

                            <button type="submit" class="btn btn-primary btn-lg" value="SelectionDate" name="SelectionDate">Vérifier les disponibilités</button>
                        </div>
                    </form>

                    <form method="post">
                        <?php
                            if (isset($_POST['SelectionDate']) && !empty($_POST['DateReservation']))
                            {
                                $resultVehicule = selectionVehicule($_POST['ID_Vehicule']);

                                $resultatrdv = selectRDVDate();
                                $nbRDV = nbRDVDate();

                                echo '<input type="hidden" name="date_RDV" value="'.dateFormatAAAAMMJJ($_POST['DateReservation']).'">';
                                echo '<input type="hidden" name="ID_Vehicule" value="'.$resultVehicule['0'].'">';

                                echo '<div class="col-lg-6 margin-top">';
                                echo '<h2>'.$_POST['DateReservation'].'</h2>';
                                echo '<h3>'.$resultVehicule['1'].' '.$resultVehicule['2'].' - '.$resultVehicule['3'].'</h3>';
                                echo '<legend>Sélectionner une horaire :</legend>';
                                echo '<select class="form-control" name="heure_RDV">';

                                for ($i = 8; $i < 19 ; $i++)
                                {
                                    $j = 0;
                                    $rdv = 0;

                                    while ($rdv == 0 && $j < $nbRDV['nb'])
                                    { 

                                        if($i == timeFormatNh($resultatrdv[$j]['6'])) { $rdv = 1; }

                                        $j++;
                                    }

                                    if ($rdv == 1) { echo '<option value="'.$i.':00:00" disabled>'.$i.':00 Réservé</option>'; }
                                    else { echo '<option value="'.$i.':00:00">'.$i.':00</option>'; }                                 
                                }

                                echo '</select>';

                                echo '<legend class="margin-top">Ajouter un commentaire :</legend>';
                                echo '<textarea class="form-control col-lg-4" rows="4" name="raison_RDV" placeholder="Ajouter un commentaire si necessaire"></textarea>';

                                echo '<button type="submit" class="btn btn-primary btn-lg" value="ValiderDate" name="ValiderDate">Valider la Réservation</button>';
                                echo '</div>';
                            }

                            if (isset($_POST['ValiderDate']))
                            {
                                ValiderReservation();

                                $resultVehicule2 = selectionVehicule($_POST['ID_Vehicule']);

                                echo '<h2 class="col-lg-8"><span class="label label-success">Réservation validée en date du '.dateFormatJJMMAAAA($_POST['date_RDV']).' à '.timeFormatNh($_POST['heure_RDV']).'h pour la '.$resultVehicule2['1'].' '.$resultVehicule2['2'].' - '.$resultVehicule2['3'].'</span></h3>';

                                echo '<script language="Javascript">
                                <!--
                                document.location.replace("../Profil/Profil.php");
                                // -->
                                </script>';
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div><!--/.container-->
    </section><!--/#feature-->

    <?php include('../footer.php'); ?>
</body>
</html>