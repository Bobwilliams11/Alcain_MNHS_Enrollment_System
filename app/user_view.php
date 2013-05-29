<?php
   include 'dao/UserDAO.php';
   
  session_start();
 
 
 

	$action = new UserDAO();
	$action-> users_view ();
?>

