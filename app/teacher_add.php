<?php

	
	include 'dao/TeacherDAO.php';
    
  
    $teacher_name= $_POST['teacher_name'];
    $teacher_bday= $_POST['teacher_bday'];
    $teacher_age= $_POST['teacher_age'];
    $teacher_gender= $_POST['teacher_gender'];
    $teacher_address= $_POST['teacher_address'];
    $teacher_position= $_POST['position'];
    $teacher_room= $_POST['room'];
 
    
    
      
    $action = new TeacherDAO();
    $action -> teacher_add($teacher_name, $teacher_bday, $teacher_age, $teacher_gender, $teacher_address, $teacher_position, $teacher_room);


