<?php
   include 'dao/SubjectDAO.php';
   
  session_start();
 
 
 

	$action = new SubjectDAO();
	$action-> room_view();
?>

