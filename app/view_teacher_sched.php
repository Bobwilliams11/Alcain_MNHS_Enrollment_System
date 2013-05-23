<?php
   include 'dao/TeacherDAO.php';
<<<<<<< HEAD
   	
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
  
=======
   
		$teacher_id = $_POST['teacher_id'];

		$action = new TeacherDAO();

	$action->view_teacher_sched($teacher_id);
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678

	
	
   
