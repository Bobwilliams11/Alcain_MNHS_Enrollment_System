<?php
   include 'dao/StudentDAO.php';
   
  // $student_id = $_POST['student_id2'];
	if (isset($_POST['student_id_for_view'])){
		$student_id = $_POST['student_id_for_view'];
		$action = new StudentDAO();

		$action->student_view2($student_id);
	}
	else{
		echo "undefined index";
	}
	
	
   
