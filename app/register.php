<?php
   include 'dao/UserDAO.php';
   
  session_start();
   
   $teacher_id=$_POST['reg_name'];
   $username=$_POST['username'];
   $password=$_POST['password'];
   $confirm_pass=$_POST['confirm_pass'];
   $reg_as = $_POST['reg_as'];
 
 

	$action = new UserDAO();
	$action-> register( $teacher_id,$username, $password, $confirm_pass, $reg_as);
?>

