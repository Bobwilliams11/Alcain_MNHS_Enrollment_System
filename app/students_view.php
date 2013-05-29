<?php
   include 'dao/StudentDAO.php';
   
  session_start();
  $username = $_SESSION['username'];
  	$action = new StudentDAO();

	$action->student_view($username);
	
   
