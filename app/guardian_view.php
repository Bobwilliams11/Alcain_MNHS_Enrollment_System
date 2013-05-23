<?php
   include 'dao/GuardianStudentDAO.php';
   
 // 	$student_id = $_POST['student_id_for_view'];
  
	if (isset($_POST['student_id_for_view'])){
		$student_id = $_POST['student_id_for_view'];
		
		$action = new GuardianStudentDAO();

	$action->student_parent_view($student_id);
	}
	else{
		echo "enter student_id";
	}
	
	
   
