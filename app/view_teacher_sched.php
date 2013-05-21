<?php
   include 'dao/TeacherDAO.php';
   
		$teacher_id = $_POST['teacher_id'];

		$action = new TeacherDAO();

	$action->view_teacher_sched($teacher_id);

	
	
   
