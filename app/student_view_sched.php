<?php
   include 'dao/StudentDAO.php';
   
  session_start();
  $teacher = $_SESSION['username'];
  
	$action = new StudentDAO();

	$action->student_view_sched($teacher);
	
   
