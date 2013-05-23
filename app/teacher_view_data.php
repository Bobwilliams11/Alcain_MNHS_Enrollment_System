<?php
      session_start();
      include 'dao/TeacherDAO.php';
   
      $username = $_SESSION['username'];
   	$teacher = $_POST['teacher_id'];
      $action= new TeacherDAO();
      
    
     $action->teacher_view_profile($username, $teacher);

   
?>
