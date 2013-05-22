<?php

//echo '\'';
	include 'BaseDAO.php';
	class StudentDAO extends BaseDAO{
	

		function add_student($username, $firstname, $middlename, $lastname, $birthday, $age,$gender, $address,$religion, $contact){
				$this->openConn();
                  //setting the first letter of the word to uppercase and the kasunod na letter to lower case
						//if meada space the next letter will be uppercase :) gehap.... and then lower case liwat again...
                  $firstname = ucwords(strtolower($firstname));
                  $middlename = ucwords(strtolower($middlename));
                  $lastname = ucwords(strtolower($lastname));
                  $gender = ucwords(strtolower($gender));
                  $address = ucwords(strtolower($address));
                  $religion = ucwords(strtolower($religion));
                  
                  
                  //checking first the table Students_Profile  
						$stmt = $this ->dbh->prepare("SELECT * FROM Students_Profile WHERE Firstname = ? and Lastname = ?");
						$stmt->bindParam(1, $firstname);
						$stmt->bindParam(2, $lastname);
						$stmt->execute();
						
						if($row =$stmt->fetch()){
						  			//if students firstname, middlename, lastname, birthday is found
                            echo "<script>alert('Student Already Exist...')</script>";
                            
						}else{
	                    	//else insert datum	
	                    $teacher = $this ->dbh->prepare("SELECT * FROM Registered_User WHERE Username =?");
	                    $teacher ->bindParam(1, $username);
	                    $teacher->execute();
	                    
	                    
	                    if($row = $teacher ->fetch()){
	                    		
	                    		$teacher_id = $row[1];
	                    		
	                    		$stmt = $this->dbh->prepare("INSERT INTO Students_Profile(teacher_id, Firstname, Middlename, Lastname, Birthday, Age,Gender, Address,Religion,Contact) 
				          		values (?,?,?,?,?,?,?,?,?,?)");
				          		$stmt->bindParam(1, $teacher_id);
									$stmt->bindParam(2, $firstname);
									$stmt->bindParam(3, $middlename);
									$stmt->bindParam(4, $lastname);
									$stmt->bindParam(5, $birthday);
									$stmt->bindParam(6, $age);
									$stmt->bindParam(7, $gender);
									$stmt->bindParam(8, $address);
									$stmt->bindParam(9, $religion);
									$stmt->bindParam(10, $contact);
		                     $stmt->execute();
									$student_id = $this->dbh->lastInsertId();

									echo "<tr>";
									echo "<td>".$firstname."</td>";
									echo "<td>".$middlename."</td>";
									echo "<td>".$lastname."</td>";
									echo "</tr>";
									echo "<script>alert('".$firstname."  " .$lastname." Successfully Added...')</script>";
	                    }		 
	                    		 
							  
						}		  
				$this->closeConn();
		}
		
		function add_student_admin( $firstname, $middlename, $lastname, $birthday, $age,$gender, $address,$religion, $contact, $teacher){
			$this->openConn();
					 $firstname = ucwords(strtolower($firstname));
                  $middlename = ucwords(strtolower($middlename));
                  $lastname = ucwords(strtolower($lastname));
                  $gender = ucwords(strtolower($gender));
                  $address = ucwords(strtolower($address));
                  $religion = ucwords(strtolower($religion));
                  
                 
				
					$teacher_check = $this->dbh->prepare("SELECT * FROM Teachers_Table WHERE Teacher_Name =?");
					$teacher_check->bindParam(1, $teacher);
					$teacher_check->execute();
					
					if ($row = $teacher_check->fetch()){
						$teacher_id = $row[0];
						
						
							$student_check = $this ->dbh->prepare("SELECT * FROM Students_Profile WHERE Firstname =? AND Middlename =? AND Lastname =? AND Birthday =? ");
							$student_check ->bindParam(1, $firstname);
							$student_check ->bindParam(2, $middlename);
							$student_check ->bindParam(3, $lastname);
							$student_check ->bindParam(4, $birthday);
							$student_check ->execute();
							
							if ($row = $student_check ->fetch()){
									echo "Student Already Exist";
									return false;
							}
							else{
								$student_add = $this ->dbh->prepare("INSERT INTO Students_Profile 
									(teacher_id, Firstname, Middlename, Lastname, Birthday, Age,Gender, Address,Religion,Contact) 
									 values (?,?,?,?,?,?,?,?,?,?)");
								 $student_add->bindParam(1, $teacher_id);
								 $student_add->bindParam(2, $firstname);
								 $student_add->bindParam(3, $middlename);
								 $student_add->bindParam(4, $lastname);
								 $student_add->bindParam(5, $birthday);
								 $student_add->bindParam(6, $age);
								 $student_add->bindParam(7, $gender);
								 $student_add->bindParam(8, $address);
								 $student_add->bindParam(9, $religion);
								 $student_add->bindParam(10, $contact);
								 $student_add->execute();
								 $student_id = $this->dbh->lastInsertId();
								 
								echo "<tr  onclick='student_view_data(".$student_id.")' data-toggle='modal' href='#student_profile_modal'>";
								echo "<td>".$firstname."</td>";
								echo "<td>".$middlename."</td>";
								echo "<td>".$lastname."</td>";
								echo"</tr>";
							}
						
						
					}
					else {
						echo "teacher not found";
					}
				
			$this->closeConn();
		
		}
		
		function student_view($username){
					$this->openConn();
					
						$teacher = $this ->dbh->prepare("SELECT * FROM Registered_User WHERE Username =?");
	               $teacher ->bindParam(1, $username);
	               $teacher->execute();
	               
	               if ($row = $teacher->fetch()){
	               	$teacher_id = $row[1];
	               	
	               	$stmt = $this->dbh->prepare("SELECT * FROM Students_Profile WHERE teacher_id =? ");
	               	$stmt->bindParam(1, $teacher_id);
					     	$stmt->execute();
			       
			        		while($row = $stmt->fetch()){
			        		
								echo "<tr  onclick='student_view_data(".$row[0].")' data-toggle='modal' href='#student_profile_modal'>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."</td>";
								echo "<td>".$row[4]."</td>";
								echo"</tr>";
								
		        		 	}
	               }
	         	$this->closeConn();
	
		}
		
		function student_view_admin(){
			$this->openConn();
					
						
	               	
	               	$stmt = $this->dbh->prepare("SELECT * FROM Students_Profile  ");
					     	$stmt->execute();
			       
			        		while($row = $stmt->fetch()){
			        		
								echo "<tr  onclick='student_view_data(".$row[0].")' data-toggle='modal' href='#student_profile_modal'>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."</td>";
								echo "<td>".$row[4]."</td>";
								echo"</tr>";
								
		        		 	
	               }
	      $this->closeConn();
		}
		function student_view2($student_id){
				$this->openConn();
					     
					     $stmt = $this->dbh->prepare("SELECT * FROM Students_Profile WHERE student_id =?");
					     $stmt->bindParam(1, $student_id);
					     $stmt->execute();
			       
			        		while($row = $stmt->fetch()){
			        			echo "<labe>Name:</label> <input type='text' value='".$row[2]. "' readonly></br>";
			        			echo "<label>Middlename:</label> <input type ='text' value ='".$row[3]."'readonly></br>";
			        			echo "<label>Lastname:</label> <input type ='text' value='".$row[4]."' readonly></br>";
			        			echo "<label>Birthday:</label> <input type ='text' value='".$row[5]."' readonly></br>";
			        			echo "<label>Age:</label> <input type ='text' value='".$row[6]."' readonly></br>";
			        			echo "<label>Gender:</label>  <input type ='text' value='".$row[7]."' readonly></br>";
			        			echo "<label>Address:</label> <input type ='text' value='".$row[8]."' readonly></br>";
			        			echo "<label>Contact:</label> <input type ='text' value='".$row[10]."' readonly></br>";
			        			echo "<label>Religion:</label> <input type ='text' value= '".$row[9]."'  readonly></br>";
			        			echo "<br/>";
			        			echo "<br/>";
			        			echo "<button class='btn btn-primary' data-toggle='modal' href='#edit_student_modal' onclick ='student_edit(".$row[0].")'>Edit Profile</button>";
			        			
								
		        		 }
		        
           	$this->closeConn();
		
		}
	    
	    function student_save($edit_id, $edit_firstname, $edit_middlename, $edit_lastname, $edit_birthday, $edit_age,$edit_gender, $edit_address,
						$edit_religion, $edit_contact){
				$this->openConn();
						
						//setting the first letter of the word to uppercase and the kasunod na letter to lower case
						//if meada space the next letter will be uppercase :) gehap.... and then lower gihap again..
						$edit_firstname = ucwords(strtolower($edit_firstname));
						$edit_middlename = ucwords(strtolower($edit_middlename));
						$edit_lastname = ucwords(strtolower($edit_lastname));
						$edit_gender = ucwords(strtolower($edit_gender));
						$edit_address = ucwords(strtolower($edit_address));
		            $edit_religion = ucwords(strtolower($edit_religion));
                  $edit_contact = ucwords(strtolower($edit_contact));
		           
		       
						$stmt = $this->dbh->prepare("UPDATE Students_Profile as s
							   SET s.Firstname= ?, 
							   s.Middlename =?, 
							   s.Lastname=?, 
							   s.Birthday=?, 
							   s.Age=?, 
							   s.Gender=?, 
							   s.Address=?, 
							   s.Religion=?, 
							   s.Contact=?
							   WHERE s.student_id = ?");
						$stmt->bindParam(1, $edit_firstname);
		            $stmt->bindParam(2, $edit_middlename);
		            $stmt->bindParam(3, $edit_lastname);
		            $stmt->bindParam(4, $edit_birthday);
		            $stmt->bindParam(5, $edit_age);
		            $stmt->bindParam(6, $edit_gender);
		            $stmt->bindParam(7, $edit_address);
		            $stmt->bindParam(8, $edit_religion);
		            $stmt->bindParam(9, $edit_contact);
		            $stmt->bindParam(10 , $edit_id);
		            $stmt->execute();
		                 
		           echo "<p class='alert alert-success'>Successfully Edited..</p>";
		           echo "<labe>Name:</label> <input type='text' value='".$edit_firstname. "' readonly></br>";
			        echo "<label>Middlename:</label> <input type ='text' valu ='".$edit_middlename."'readonly></br>";
			        echo "<label>Lastname:</label> <input type ='text' value='".$edit_lastname."' readonly></br>";
			        echo "<label>Birthday:</label> <input type ='text' value='".$edit_birthday."' readonly></br>";
			        echo "<label>Age:</label> <input type ='text' value='".$edit_age."' readonly></br>";
			        echo "<label>Gender:</label>  <input type ='text' value='".$edit_gender."' readonly></br>";
			        echo "<label>Address:</label> <input type ='text' value='".$edit_address."' readonly></br>";
			        echo "<label>Contact:</label> <input type ='text' value='".$edit_religion."' readonly></br>";
			        echo "<label>Religion:</label> <input type ='text' value= '".$edit_contact."'  readonly></br>";
		           echo "<button class='btn btn-primary' data-toggle='modal' href='#edit_student_modal' onclick ='student_edit(".$edit_id.")'>Edit Profile</button>";
		           
		            
		         $this->closeConn();
		         
		                    

			} 
			
			function student_retrieve($edit_id){
				$this->openConn();
				            
		           $stmt = $this->dbh->prepare("SELECT s.student_id, s.Firstname, s.Middlename, s.Lastname, s.Birthday, s.Age, 
		                    s.Gender, s.Address, s.Religion, s.Contact
                            FROM Students_Profile as s
                            WHERE  s.student_id = ?
                        ");
		           $stmt->bindParam(1,$edit_id);
		           $stmt->execute();
		              
		           $record = $stmt->fetch();
			
			        $list = array("edit_id"=>$record[0],
					       "edit_firstname"=>$record[1], 
					       "edit_middlename"=>$record[2],
			               "edit_lastname"=>$record[3],
			               "edit_birthday"=>$record[4],
			               "edit_age"=>$record[5],
			               "edit_gender"=>$record[6],
			               "edit_address"=>$record[7],
			               "edit_religion"=>$record[8],
			               "edit_contact"=>$record[9]
			               
			              );
						 $json_string = json_encode($list);			
            		echo $json_string;
			
			   $this->closeConn();
		 }
		
		function student_view_sched($username){
				$this->openConn();
            	
            		$stmt = $this->dbh->prepare("SELECT * FROM Registered_User WHERE Username = ? ");
            		$stmt->bindParam(1, $username);
            		$stmt->execute();
            		
            		$row1= $stmt->fetch();
            		$teacher_id = $row1[1];
            		
            		$get_room = $this->dbh->prepare("SELECT * FROM Teachers_Room_Position wHERE teacher_id= ?");
            		$get_room->bindParam(1, $teacher_id);
            		$get_room->execute();
            		
            		$row2 = $get_room->fetch();
            		$room_id = $row2[2];
            		
            		$show_sched = $this->dbh->prepare("SELECT s.Subject_Name, t.Teacher_Name, st.Day, st.Time
            					FROM Subject as s, Teachers_Table as t, Subject_of_Teachers as st 
            					WHERE st.teacher_id = t.teacher_id
            					AND st.subject_id = s.subject
            					AND st.room_id = ?");
            		$show_sched ->bindParam(1, $room_id);
            		$show_sched->execute();
            		
            		while ($row3= $show_sched->fetch()){

            			echo "<tr id >";
		         		echo "<td>".$row3[0]."</td>";
		         		echo "<td>".$row3[1]."</td>";
		         		echo "<td>".$row3[2]."</td>";
		         		echo "<td>".$row3[3]."<i class='icon-edit'></i></td>";
		         		echo "</tr>";
            		}
            		
            	$this->closeConn();
		}
		
		function student_view_sched_admin($teacher_name){
				$this->openConn();
            	
            		$stmt = $this->dbh->prepare("SELECT * FROM Registered_User WHERE Username = ? ");
            		$stmt->bindParam(1, $username);
            		$stmt->execute();
            		
            		$row1= $stmt->fetch();
            		$teacher_id = $row1[1];
            		
            		$get_room = $this->dbh->prepare("SELECT * FROM Teachers_Room_Position wHERE teacher_id= ?");
            		$get_room->bindParam(1, $teacher_id);
            		$get_room->execute();
            		
            		$row2 = $get_room->fetch();
            		$room_id = $row2[2];
            		
            		$show_sched = $this->dbh->prepare("SELECT s.Subject_Name, t.Teacher_Name, st.Day, st.Time
            					FROM Subject as s, Teachers_Table as t, Subject_of_Teachers as st 
            					WHERE st.teacher_id = t.teacher_id
            					AND st.subject_id = s.subject
            					AND st.room_id = ?");
            		$show_sched ->bindParam(1, $room_id);
            		$show_sched->execute();
            		
            		while ($row3= $show_sched->fetch()){

            			echo "<tr id >";
		         		echo "<td>".$row3[0]."</td>";
		         		echo "<td>".$row3[1]."</td>";
		         		echo "<td>".$row3[2]."</td>";
		         		echo "<td>".$row3[3]."<i class='icon-edit'></i></td>";
		         		echo "</tr>";
            		}
            		
            	$this->closeConn();
		}
}


		    

