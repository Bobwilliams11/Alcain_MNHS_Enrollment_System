<?php
   include 'dao/StudentDAO.php';
   
  // $student_id = $_POST['student_id2'];
	if (isset($_POST['student_id_for_view'])){
		$student_id = $_POST['student_id_for_view'];
<<<<<<< HEAD
		$action = new StudentDAO();

		$action->student_view2($student_id);
=======
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
	}
	else{
		echo "undefined index";
	}
<<<<<<< HEAD
	
=======
	$action = new StudentDAO();

	$action->student_view2($student_id);
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
	
   
