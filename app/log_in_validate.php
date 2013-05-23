<?php
      

	session_start();
	
	include "dao/UserDAO.php";
	$action = new UserDAO();

	if(isset($_SESSION['username'])){
		header('Location: home_index.php');
	}else{
		if(isset($_POST['username']) && isset($_POST['password'])){
			$val_admin = $action-> LogInAdmin($_POST['username'],$_POST['password']);
	
			if($val_admin){
			
				
					header('Location: Admin.php');
					$_SESSION['admin']=$_POST['username'];	
			

			}else{		
				$username = $_POST['username'];
				$password = $_POST['password'];
				$val_account = $action->login($username,$password);
				if($val_account){
					$_SESSION['username']=$_POST['username'];
					header('Location: home_index.php');
				}else{
					$errMsg = "<p class='alert alert-warning'>Unknown User  or Password</p>";			
				}
			
			}
		}
	}
	
	
?>
