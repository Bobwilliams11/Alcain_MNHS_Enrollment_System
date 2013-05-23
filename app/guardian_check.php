<?php
      
	 
      include 'dao/StudentDAO.php';
   
    
      $student_id= $_POST['student_id'];
      
      //secho "<script>alert(".$edit_student_id.")</script>";
      $action = new StudentDAO();
      
      $action->guardian_check($student_id);
	
?>
