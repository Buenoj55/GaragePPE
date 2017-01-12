<?php
/**
 * Example of JSON data for calendar
 *
 * @package zabuto_calendar
 */
	
	include('AccesBDDReservation.php');

	$i = 0;

	$resultatsres = afficherReservationWhereOrder1();

    $dates = array();
    foreach ($resultatsres as $resultatres)
    {
    	$dates[$i] = array(
            'date' => $resultatres['DateReservation'],
            'badge' => true,
            'title' => dateFormatJJMMAAAA($resultatres['DateReservation']),
            'body' => '<p class="lead">Information for this date</p><p>You can add <strong>html</strong> in this block</p>',
            'footer' => 'Extra information',
        );
        $i++;
    }

    echo json_encode($dates);