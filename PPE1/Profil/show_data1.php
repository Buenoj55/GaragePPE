<?php
/**
 * Example of JSON data for calendar
 *
 * @package zabuto_calendar
 */
	session_start();
	include('../Connexion/AccesBDDUser.php');

	$resultatrdv = selectRDV();
    $nbRDV = nbRDV();

    $dates = array();

    for ($n = 0; $n < $nbRDV['nb']; $n++)
    {
        $dates[$n] = array(
            'date' => $resultatrdv[$n]['5'],
            'badge' => true,
            'title' => dateFormatJJMMAAAA($resultatrdv[$n]['5']),
            'body' => '<p class="lead">Réservation validée pour <strong>'.timeFormatNh($resultatrdv[$n]['6']).'h</strong></p>',
            'footer' => '<form method="post">
                            <button type="submit" name="Supprimer'.$resultatrdv[$n]['0'].'" class="btn btn-danger">Annuler rendez-vous</button>
                        </form>',
        );
    }

    echo json_encode($dates);
?>