<?php
    
     include 'dao/StudentDAO.php';
 
        $edit_id=$_POST['edit_id'];
        $edit_firstname=$_POST['edit_firstname'];
        $edit_middlename=$_POST['edit_middlename'];
        $edit_lastname=$_POST['edit_lastname'];    
        $edit_birthday=$_POST['edit_birthday'];
        $edit_age=$_POST['edit_age'];
        $edit_gender=$_POST['edit_gender'];
        $edit_address=$_POST['edit_address'];
        $edit_religion=$_POST['edit_religion'];
        $edit_contact=$_POST['edit_contact'];
    
        
        $action = new StudentDAO();
        
        $action -> student_save($edit_id, $edit_firstname, $edit_middlename, $edit_lastname, $edit_birthday, 
            $edit_age, $edit_gender, $edit_address, $edit_religion, $edit_contact);
?>
