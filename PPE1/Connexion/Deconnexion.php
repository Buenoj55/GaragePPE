<?php
	session_start();
	session_destroy();

	header('Location: /PPE1/index.php');
?>