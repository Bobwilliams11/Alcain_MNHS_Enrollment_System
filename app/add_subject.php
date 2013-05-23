<?php
   include 'dao/SubjectDAO.php';
   
  session_start();
 	$subject = $_POST['subject'];
 	
	$action = new SubjectDAO();
	$action-> add_subject ($subject);
?>

