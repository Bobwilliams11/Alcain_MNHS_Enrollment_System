<?php
    
     include 'dao/TeacherDAO.php';
 
        $edit_teacher_id=$_POST['edit_teacher_id'];
        $edit_teacher=$_POST['edit_teacher'];
        $edit_teacher_bday=$_POST['edit_teacher_bday'];
        $edit_teacher_age=$_POST['edit_teacher_age'];    
        $edit_teacher_gender=$_POST['edit_teacher_gender'];
        $edit_teacher_address=$_POST['edit_teacher_address'];
        $position=$_POST['position'];
        $room=$_POST['room'];

        $action = new TeacherDAO();
        
        $action -> teacher_save($edit_teacher_id, $edit_teacher, $edit_teacher_bday, $edit_teacher_age, $edit_teacher_gender, 
            $edit_teacher_address, $position, $room);
?>
