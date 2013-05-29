<?php
   include 'dao/StudentDAO.php';
   
  session_start();
 /* $teacher = $_SESSION['username'];
  */
  if (isset($_SESSION['username'])){
  	$teacher = $_SESSION['username'];
  	$action = new StudentDAO();

	$action->student_view_sched($teacher);
  }
  else if (isset($_SESSION['admin'])){
  	
  	 $action = new StudentDAO();
	$action->student_view_sched_admin($teacher);
  }
	
	
   
