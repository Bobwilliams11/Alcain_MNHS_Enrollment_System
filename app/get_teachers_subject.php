<?php
   include 'dao/TeacherDAO.php';
   
 	//$teacher_name = $_POST['teacher_name'];
 	if(isset($_POST['teacher_choice'])){
		$teacher_name =  $_POST['teacher_choice'];
 		$action = new TeacherDAO();

	$action->get_teacher_subject($teacher_name);
 	
 	}else{
 		echo "undefined....";
 	}
  	
	
   
