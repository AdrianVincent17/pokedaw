<?php
	session_start();
	if (!isset($_SESSION['nif'])){
		header("LOCATION:../index.php");
		exit();
		
	}

?>