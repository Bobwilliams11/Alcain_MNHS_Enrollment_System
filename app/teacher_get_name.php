<?php
      
      include 'dao/TeacherDAO.php';
   session_start();
   	$teacher = $_POST['teacher_id'];
      $action= new TeacherDAO();
      
    
    
     
     $action->get_teacher_name( $teacher);

   
?>
