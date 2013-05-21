<?php

	
	include 'dao/GuardianStudentDAO.php';
    
 // $student_id = $_POST['student_id_for_view'];
   if (isset($_POST['student_id_for_view'])){
   	$student_id = $_POST['student_id_for_view'];
   	$guardian= $_POST['guardian'];
		 $guardian_bday= $_POST['guardian_bday'];
		 $guardian_age= $_POST['guardian_age'];
		 $guardian_work= $_POST['guardian_work'];
		 $guardian_contact= $_POST['guardian_contact'];
		 $guardian_address= $_POST['guardian_address'];
		 $guardian_religion= $_POST['guardian_religion'];
		 $guardian_rship= $_POST['guardian_rship'];
		
		$action = new GuardianStudentDAO();
		 $action -> guardian_add($student_id,$guardian, $guardian_bday,$guardian_age, $guardian_work, $guardian_contact, $guardian_address,$guardian_religion , $guardian_rship);

		}else{
			echo "no student_id";
		}
    
  
    
//echo $guardian;
      
    

