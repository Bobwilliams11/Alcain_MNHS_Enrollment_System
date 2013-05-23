<?php
      
	 
      include 'dao/StudentDAO.php';
   
    
      $edit_id= $_POST['edit_id'];
      
      //secho "<script>alert(".$edit_student_id.")</script>";
      $action = new StudentDAO();
      
      $action->student_retrieve($edit_id);
	
?>
