<?php

	session_start();
	
	include 'dao/SubjectDAO.php';
    
	 $teacher_id = $_POST['teacher_id'];
    $room= $_POST['room_to_teach'];
    $subject= $_POST['subject'];
    $day_to_teach= $_POST['day_to_teach'];
    $time_to_teach= $_POST['time_to_teach'];

  
  
    
      
    $action = new SubjectDAO();
    $action -> add_teacher_sched($teacher_id, $room, $subject, $day_to_teach, $time_to_teach);

        
