<?php

	session_start();
	
	include 'dao/StudentDAO.php';
    
  	$username = $_SESSION[ 'username' ];
    $firstname= $_POST['firstname'];
    $middlename= $_POST['middlename'];
    $lastname= $_POST['lastname'];
    $birthday= $_POST['birthday'];
    $age= $_POST['age'];
    $gender= $_POST['gender'];
    $address= $_POST['address'];
    $religion= $_POST['religion'];
    $contact= $_POST['contact'];
  
  
    
      
    $action = new StudentDAO();
    $action -> add_student($username, $firstname, $middlename, $lastname, $birthday, $age,$gender, $address,$religion,$contact);

        
