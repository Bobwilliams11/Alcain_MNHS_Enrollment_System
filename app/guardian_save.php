<?php
    
     include 'dao/GuardianStudentDAO.php';
 
        $edit_guardian_id=$_POST['edit_guardian_id'];
        $edit_guardian=$_POST['edit_guardian'];
        $edit_guardian_bday=$_POST['edit_guardian_bday'];
        $edit_guardian_age=$_POST['edit_guardian_age'];    
        $edit_guardian_work =$_POST['edit_guardian_work'];
        $edit_guardian_contact=$_POST['edit_guardian_contact'];
        $edit_guardian_address=$_POST['edit_guardian_address'];
        $edit_guardian_religion=$_POST['edit_guardian_religion'];
        $edit_guardian_rship=$_POST['edit_guardian_rship'];


        $action = new GuardianStudentDAO();
        
        $action -> guardian_save($edit_guardian_id, $edit_guardian, $edit_guardian_bday, $edit_guardian_age, $edit_guardian_work, 
            $edit_guardian_contact, $edit_guardian_address, $edit_guardian_religion, $edit_guardian_rship);
?>
