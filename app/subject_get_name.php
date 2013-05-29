<?php
   include 'dao/SubjectDAO.php';
   
  // $student_id = $_POST['student_id2'];
	if (isset($_POST['subject_id'])){
		$subject_id = $_POST['subject_id'];
		$action = new SubjectDAO();
		$action->get_subject_name($subject_id);
		
		
	}
	else{
		echo "undefined index";
	}
	
   
