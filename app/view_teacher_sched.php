<?php
   include 'dao/TeacherDAO.php';
   	
   	session_start();
   	if( isset($_SESSION['admin'])){
  			 	$user_now = $_SESSION['admin'];
				$teacher_id = $_POST['teacher_id'];

				$action = new TeacherDAO();

			$action->view_teacher_sched($teacher_id, $user_now); 	
   	}else{
   		$user_now = $_SESSION['username'];
			$teacher_id = $_POST['teacher_id'];
	
			$action = new TeacherDAO();
			$action->view_teacher_sched($teacher_id, $user_now);
   	}
  

	
	
   
