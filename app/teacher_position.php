<?php
      session_start();
      include 'dao/TeacherDAO.php';
   
   
      $action= new TeacherDAO();
      
    
     $action->get_teacher_position();

   
?>
