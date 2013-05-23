<?php
      
	 
      include 'dao/TeacherDAO.php';
   
    
      $edit_id= $_POST['edit_teacher_id'];
      
      //secho "<script>alert(".$edit_student_id.")</script>";
      $action = new TeacherDAO();
      
      $action->teacher_retrieve($edit_id);
	
?>
