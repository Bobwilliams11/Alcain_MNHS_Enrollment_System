<?php
   include 'dao/SubjectDAO.php';
   
  session_start();
 	$room = $_POST['room'];
 	$company = $_POST['construct_company'];
 	$constructed = $_POST['constructed'];
 	$cost = $_POST['cost'];
 	
	$action = new SubjectDAO();
	$action-> add_room ($room, $company, $constructed, $cost);
?>

