<?php
   

      session_start();
      if(isset($_SESSION['username'])){
            session_unset();
            session_destroy();
            header('Location:log_in_school_preview.php');
      }
      else{
      	 session_unset();
            session_destroy();
            header('Location:log_in_school_preview.php');
      }
?>
