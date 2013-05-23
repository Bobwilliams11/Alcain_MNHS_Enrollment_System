<?php

	session_start();
	
	include 'dao/StudentDAO.php';
    
  
    $firstname= $_POST['firstname'];
    $middlename= $_POST['middlename'];
    $lastname= $_POST['lastname'];
    $birthday= $_POST['birthday'];
    $age= $_POST['age'];
    $gender= $_POST['gender'];
    $address= $_POST['address'];
    $religion= $_POST['religion'];
    $contact= $_POST['contact'];
  	 $teacher = $_POST['teacher'];
     
    $action = new StudentDAO();
    $action -> add_student_admin($firstname, $middlename, $lastname, $birthday, $age,$gender, $address,$religion,$contact, $teacher);

        
