<?php

//echo '\'';
	include 'BaseDAO.php';
	class SubjectDAO extends BaseDAO{
	

			function get_subject(){
					$this->openConn();
						$stmt = $this->dbh->prepare("SELECT * FROM Subject");
						$stmt->execute();
						
						echo "<select name='subject'>";
						while($row= $stmt->fetch()){
							echo "<option value = ".$row[0].">".$row[1]."</option>";
						}
						echo "</select>";
					$this->closeConn();
			}
			
			function get_room_to_teach(){
				$this->openConn();
						$stmt = $this->dbh->prepare("SELECT * FROM Room_Table");
						$stmt->execute();
						
						echo "<select name ='room_to_teach'>";
							while ($row = $stmt->fetch()){
								echo "<option value = ".$row[0].">".$row[1]."</option>";
							}
						echo "<select>";
				$this->closeConn();
			}
	 		
	 		function get_teacher_subject($teacher_name){
				$this->openConn();
				
					$stmt = $this ->dbh->prepare("SELECT * FROM  Teachers_Table WHERE Teacher_Name = ?");
					$stmt->bindParam(1, $teacher_name);
					$stmt->execute();
					$row= $stmt->fetch();
					
					$teacher_id = $row[0];
					
					$stmt2 = $this->dbh->prepare("SELECT s.Subject_Name FROM Subject AS s, Subject_of_Teachers AS st
						WHERE st.subject_id = s.subject
						AND st.teacher_id= ? ");
					$stmt2 ->bindParam(1, $teacher_id);
					$stmt2->execute();
					
				
					echo "<select name='select_subject'>";
							while($row= $stmt2->fetch()){
								echo "<option value = ".$row[0].">".$row[0]."</option>";
								
							}
							
					echo "</select>";
				$this->closeConn();
		}
		
		function add_teacher_sched($teacher_id ,$room, $subject, $day_to_teach, $time_to_teach){
            	$this->openConn();
            	
            		$room_check = $this->dbh->prepare("SELECT COUNT(*) FROM Subject_of_Teachers 
            				WHERE room_id = ?");
            		$room_check ->bindParam(1, $room);
            		$room_check->execute();
            		$row = $room_check ->fetch();
            		$max_sched = 8;
            		
            		if ($row[0] <= $max_sched){
            			$sched_check = $this->dbh->prepare("SELECT * FROM Subject_of_Teachers 
            						WHERE room_id = ? AND subject_id = ?");
            			$sched_check ->bindParam(1, $room);
            			$sched_check ->bindParam(2, $subject);
            			$sched_check ->execute();
            			
            			if($sched_check->fetch()){
								echo "Already Scheduled...";            			
            			}
            			else{
            				$time_check = $this->dbh->prepare("SELECT * FROM Subject_of_Teachers
            						WHERE room_id = ? and Time  =?");
            				$time_check ->bindParam(1, $room);
            				$time_check ->bindParam(2, $time_to_teach);
            				$time_check->fetch();
            				
            				if($time_check->fetch()){
            					echo "Already Scheduled..";
            				}else{
            					$stmt3 = $this->dbh->prepare("INSERT INTO Subject_of_Teachers (teacher_id,subject_id, room_id, Day, Time) VALUES (?,?,?,?,?)");
						   		$stmt3->bindParam(1, $teacher_id);
						   		$stmt3->bindParam(2, $subject);
						   		$stmt3->bindParam(3, $room);
						   		$stmt3->bindParam(4, $day_to_teach);
						   		$stmt3->bindParam(5, $time_to_teach);
						   		$stmt3->execute();
						   		//echo "success";
						   		
						   		$stmt4 = $this->dbh->prepare("SELECT st.teacher_id , r.Room, s.Subject_Name, st.Day, st.Time 
						   				FROM Subject_of_Teachers as st, Subject as s, Room_Table as r
						   				WHERE	 st.room_id = r.room_id 
						   				AND st.subject_id = s.subject
						   				AND st.teacher_id = ?");
						   		$stmt4 ->bindParam(1, $teacher_id);
						   		$stmt4->execute();
						   		
						   			echo "<tr>";
						   			echo "<th>Room</th>";
						   			echo "<th>Subject</th>";
						   			echo "<th>Day</th>";
						   			echo "<th>Time</th>";
						   			echo"</tr>";
						   		while($row = $stmt4 ->fetch()){
										echo "<tr id=".$row[0].">";
										echo "<td>".$row[1]."</td>";
										echo "<td>".$row[2]."</td>";
										echo "<td>".$row[3]."</td>";
										echo "<td>".$row[4]."</td>";
										echo "</tr>";
						   		}
            				}
            			}
            			
            		}
            		else{
            			echo "Fully Scheduled...";
            		}

            	$this->closeConn();
            }
            
            function	add_room($room, $company, $constructed, $cost){
            	$this->openConn();
            		$room_check = $this->dbh->prepare("SELECT * FROM Room_Table WHERE Room = ?");
            		$room_check->bindParam(1, $room);
            		$room_check ->execute();
            		
            		if($room_check->fetch()){
							echo "".$room." Already Exist";
						}else{
 	          			$stmt =$this->dbh->prepare("INSERT INTO Room_Table VALUES (?,?,?,?)  ");
		         		$stmt->bindParam(1, $room);
		         		$stmt->bindParam(2, $company);
		         		$stmt->bindParam(3, $constructed);
		         		$stmt->bindParam(4, $cost);
		         		$stmt->execute();
		         		
		         		echo "".$room." Successfully Added";
            		
            		}
            	$this->closeConn();
            }
            
            function add_subject($subject){
            	$this->openConn();
            		 $subject = ucwords(strtolower($subject));
            		 
            			$subject_check = $this->dbh->prepare("SELECT * FROM Subject WHERE Subject_Name =?");
            			$subject_check->bindParam(1, $subject);
            			$subject_check->execute();
            			
            			if( $subject_check->fetch()){
            				echo "" .$subject. " Already Exist";
            			}else{
            				$subject_add = $this->dbh->prepare("INSERT INTO Subject (Subject_Name) VALUES (?)");
            				$subject_add ->bindParam(1, $subject);
            				$subject_add->execute();
            				
            				echo "".$subject." Successfully Added";
            			}
            	$this->closeConn();
            }
            
            function view_subject (){
            	$this->openConn();
            		
            		$view_subject = $this->dbh->prepare("SELECT * FROM Subject");
            		$view_subject->execute();
            		
            		echo "<tr><th class = 'alert alert-error'> Subject List</th>
            		</tr>";
            		while($row = $view_subject->fetch()){
            			echo "<tr  onclick='subject_view_data(".$row[0].")' data-toggle='modal' href='#subject_modal'>";
            			echo "<td>".$row[1]."</td>";
            			echo "</tr>";
            		}
            	$this->closeConn();
            	
            }
            
            function room_view(){
            	$this->openConn();
            		
            		$view_subject = $this->dbh->prepare("SELECT * FROM Room_Table ORDER BY Year_Constructed DESC");
            		$view_subject->execute();
            		
            		echo "<tr><th colspan= '4' class = 'alert alert-error'> Subject List</th>
            		</tr>";
            		echo "<tr><th>Room</th><th>Construction Company</th><th>Year Constructed </th><th> Construction Cost</th></tr>";
            		while($row = $view_subject->fetch()){
            			echo "<tr id = ".$row[0].">";
            			
            			echo "<td>".$row[1]."</td>";
            			echo "<td>".$row[3]."</td>";
            			echo "<td>".$row[2]."</td>";
            			echo "<td>".$row[4]."</td>";
            			
            			echo "</tr>";
            		}
            	$this->closeConn();
            
            }
            
            function teachers_to_subject_view($subject_id){
            	$this->openConn();
            			$stmt= $this->dbh->prepare("SELECT t.Teacher_Name from Teachers_Table as t, Subject_of_Teachers as st
								where t.teacher_id = st.teacher_id
								and st.subject_id = ?");
							$stmt->bindParam(1, $subject_id);
							$stmt->execute();
							
							while($row = $stmt->fetch()){
								echo "<tr id =".$row[0].">";
								echo "<td>".$row[1]."</td>";
								echo "</tr>";
							}
            	$this->closeConn();
            }
            
     }

		    

