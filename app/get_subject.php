<?php
   include 'dao/SubjectDAO.php';
   
  session_start();
  
  	$action = new SubjectDAO();

	$action->get_subject();
	
