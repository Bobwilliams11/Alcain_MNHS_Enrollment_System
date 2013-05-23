<?php


      include 'dao/StudentDAO.php';
      
      $id=$_POST['id'];
      
      $action = new StudentDAO();
      
     
      $action->students_delete($id);
      
?>
