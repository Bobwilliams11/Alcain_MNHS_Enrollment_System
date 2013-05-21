<?php
      
      include 'dao/TeacherDAO.php';
   session_start();
   	$teacher = $_POST['teacher_id'];
      $action= new TeacherDAO();
      
    
     $action->teacher_view_profile_via_admin( $teacher);
     
     
   
?>
