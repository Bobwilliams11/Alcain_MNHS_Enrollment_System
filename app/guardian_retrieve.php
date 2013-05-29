<?php
      
	 
      include 'dao/GuardianStudentDAO.php';
   
    
      $edit_student_id= $_POST['student_id_for_view'];
      
      //secho "<script>alert(".$edit_student_id.")</script>";
      $action = new GuardianStudentDAO();
      
      $action->guardian_retrieve($edit_student_id);
	
?>
