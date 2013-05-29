<?php

//echo '\'';
	include 'BaseDAO.php';
	class GuardianStudentDAO extends BaseDAO{
	

	
		   function guardian_add($student_id,$guardian, $guardian_bday,$guardian_age, $guardian_work, $guardian_contact, $guardian_address,$guardian_religion , $guardian_rship){
		     	$this->openConn();
		     	        
		     	        //setting the first letter of the word to uppercase and the kasunod na letter to lower case
						//if meada space the next letter will be uppercase :) gehap.... and then lower gihap again..
						$guardian = ucwords(strtolower($guardian));
						$guardian_work = ucwords(strtolower($guardian_work));
						$guardian_address = ucwords(strtolower($guardian_address));
						$guardian_religion = ucwords(strtolower($guardian_religion));
						$guardian_rship = ucwords(strtolower($guardian_rship));

		     	        
		     	        
		             		 $stmt = $this->dbh->prepare("INSERT INTO Guardians 
		             			(Guardian_Name, Guardian_Birthday, Guardian_Age, Guardian_Occupation, Guardian_Contact,  Guardian_Address, Guardian_Religion, Guardian_Relationship)
		             			VALUES
		             			(?, ?, ?, ?, ?, ?, ?, ?)");
					        $stmt->bindParam(1, $guardian);
		             		$stmt->bindParam(2, $guardian_bday);
		             		$stmt->bindParam(3, $guardian_age);
		             		$stmt->bindParam(4, $guardian_work);
		             		$stmt->bindParam(5, $guardian_contact);
		             		$stmt->bindParam(6, $guardian_address);
		             		$stmt->bindParam(7, $guardian_religion);
		             		$stmt->bindParam(8, $guardian_rship);
		             		$stmt->execute();
		                	 $guardian_id = $this->dbh->lastInsertId();
				            
				          
				          echo "<label >Name:</label> <input type ='text' value = '".$guardian."' readonly>";
							echo "<label >Birthday:</label> <input type ='text' value = '".$guardian_bday."' readonly>";
							echo "<label >Age:</label> <input type ='text' value = '".$guardian_age."' readonly>";
							echo "<label >Occupation:</label> <input type ='text' value = '".$guardian_work."' readonly>";
							echo "<label >Contact:</label> <input type ='text' value = '".$guardian_contact."' readonly>";
							echo "<label >Address:</label> <input type ='text' value = '".$guardian_address."' readonly>";
							echo "<label >Religion:</label> <input type ='text' value = '".$guardian_religion."' readonly>";
							echo "<label >Relationship:</label> <input type ='text' value = '".$guardian_rship."' readonly>";
							echo "<button class='btn btn-primary' data-toggle='modal' href='#edit_guardian_modal' onclick='guardian_edit(".$guardian_id.")'>Edit Guardian</button>";
				          
				            
					        $stmt2 = $this->dbh->prepare("INSERT INTO Student_and_Parent (student_id, guardian_id) VALUES (?,?)"); 
					        $stmt2->bindParam(1, $student_id);
		             		$stmt2->bindParam(2, $guardian_id);
					        $stmt2->execute();
				
				       // echo "<script>alert('Successfully Added...')</script>";
		     	        
		     	        

		     	$this->closeConn();

		    }
		    
		   function guardian_retrieve($edit_student_id){
		        $this->openConn();
		        
		        $stmt = $this->dbh->prepare("SELECT  g.guardian_id , g.Guardian_Name, g.Guardian_Birthday, g.Guardian_Age, g.Guardian_Occupation, g.Guardian_Contact,
		                g.Guardian_Address, g.Guardian_Religion, g.Guardian_Relationship
		                FROM Guardians as g, Student_and_Parent as s_p
		                 WHERE s_p.guardian_id = g.guardian_id
		                 AND s_p.student_id = ?");
		          $stmt->bindParam(1, $edit_student_id);
		          $stmt->execute();
		          
		           $record = $stmt->fetch();
			
			        $list = array("edit_guardian_id"=>$record[0],
					   "edit_guardian"=>$record[1], 
					   "edit_guardian_bday"=>$record[2],
			           "edit_guardian_age"=>$record[3],
			           "edit_guardian_work"=>$record[4],
			           "edit_guardian_contact"=>$record[5],
			           "edit_guardian_address"=>$record[6],
			           "edit_guardian_religion"=>$record[7],
			           "edit_guardian_rship"=>$record[8]

			          
			        );
						 $json_string = json_encode($list);			
            			 echo $json_string;
            			 
            	$this->closeConn();
		    }
		    
		   function guardian_save($edit_guardian_id, $edit_guardian, $edit_guardian_bday, $edit_guardian_age, $edit_guardian_work, 
		     $edit_guardian_contact,$edit_guardian_address, $edit_guardian_religion,
						$edit_guardian_rship){
				$this->openConn();
						
						//setting the first letter of the word to uppercase and the kasunod na letter to lower case
						//if meada space the next letter will be uppercase :) gehap.... and then lower gihap again..
						$edit_guardian = ucwords(strtolower($edit_guardian));
						$edit_guardian_work = ucwords(strtolower($edit_guardian_work));
		            $edit_guardian_address = ucwords(strtolower($edit_guardian_address));
                  $edit_guardian_religion = ucwords(strtolower($edit_guardian_religion));
		            $edit_guardian_rship = ucwords(strtolower($edit_guardian_rship));

		
		                $stmt = $this->dbh->prepare("UPDATE Guardians
									Set  Guardian_Name  = ?,
		                            Guardian_Birthday = ?, 
		                            Guardian_Age = ?,
		                            Guardian_Occupation = ?, 
		                            Guardian_Contact= ?, 
		                            Guardian_Address =?, 
		                            Guardian_Religion = ?, 
		                            Guardian_Relationship=?
		                            WHERE  guardian_id= ?");
		             
		                $stmt->bindParam(1, $edit_guardian);
		                $stmt->bindParam(2, $edit_guardian_bday);
		                $stmt->bindParam(3, $edit_guardian_age);
		                $stmt->bindParam(4, $edit_guardian_work);
		                $stmt->bindParam(5, $edit_guardian_contact);
		                $stmt->bindParam(6, $edit_guardian_address);
		                $stmt->bindParam(7, $edit_guardian_religion);
		                $stmt->bindParam(8, $edit_guardian_rship);
		                $stmt->bindParam(9, $edit_guardian_id);
		              	$stmt->execute();
		              	
		              	echo "<p class='alert alert-success' >Successfully Edited...</p>";   
		              	echo "<input type ='hidden' value =".$edit_guardian_id."/>";
							echo "<label >Name:</label> <input type ='text' value = ".$edit_guardian." readonly>";
							echo "<label >Birthday:</label> <input type ='text' value = ".$edit_guardian_bday." readonly>";
							echo "<label >Age:</label> <input type ='text' value = ".$edit_guardian_age." readonly>";
							echo "<label >Occupation:</label> <input type ='text' value = ".$edit_guardian_work." readonly>";
							echo "<label >Contact:</label> <input type ='text' value = ".$edit_guardian_contact." readonly>";
							echo "<label >Address:</label> <input type ='text' value = ".$edit_guardian_address." readonly>";
							echo "<label >Religion:</label> <input type ='text' value = ".$edit_guardian_religion." readonly>";
							echo "<label >Relationship:</label> <input type ='text' value = ".$edit_guardian_rship." readonly>";
							echo "<br/>";
							echo "<br/>";
							echo "<button class='btn btn-primary' data-toggle='modal' href='#edit_guardian_modal' onclick='guardian_edit(".$edit_guardian_id.")'>Edit Guardian</button>";
							
		                 
		         $this->closeConn();
    	}

		   /* function guardian_check($student_id){
		            $this->openConn();
		                    $guardian_check = $this->dbh->prepare("SELECT * FROM Student_and_Parent WHERE student_id = ?");
		                    $guardian_check->bindParam(1, $student_id);
		                    $guardian_check->execute();
		                    
		                    if($row = $guardian_check->fetch()){
		                            echo "already have a guardian..";
		                    }
		                
		            $this->closeConn();
		    }
		    */
		   function student_parent_view($student_id){
		    	$this->openConn();
		    	
		    		$stmt = $this ->dbh->prepare("SELECT  DISTINCT g.guardian_id, g.Guardian_Name , g.Guardian_Birthday, g.Guardian_Age, g.Guardian_Occupation, 
		    		g.Guardian_Contact, g.Guardian_Address, g.Guardian_Religion, g.Guardian_Relationship 
		    		FROM Guardians as g, Student_and_Parent as sp 
		    		 WHERE g.guardian_id = sp.guardian_id 
		    		 AND sp.student_id =?");
		    		$stmt->bindParam(1,$student_id);
		    		$stmt->execute();
		    		
		    		$exist= false;
		    		while($row = $stmt->fetch()){
		    					echo "<input type ='hidden' value =".$row[0]."/>";
								 echo "<label >Name:</label> <input type ='text' value = ".$row[1]." readonly>";
								 echo "<label >Birthday:</label> <input type ='text' value = ".$row[2]." readonly>";
								 echo "<label >Age:</label> <input type ='text' value = ".$row[3]." readonly>";
								 echo "<label >Occupation:</label> <input type ='text' value = ".$row[4]." readonly>";
								 echo "<label >Contact:</label> <input type ='text' value = ".$row[5]." readonly>";
								 echo "<label >Address:</label> <input type ='text' value = ".$row[6]." readonly>";
								 echo "<label >Religion:</label> <input type ='text' value = ".$row[7]." readonly>";
								 echo "<label >Relationship:</label> <input type ='text' value = ".$row[8]." readonly>";
								  
								 echo "<br/>";
								 echo "<br/>";
								 echo "<button class='btn btn-primary' data-toggle='modal' href='#edit_guardian_modal' onclick='guardian_edit(".$row[0].")'>Edit Guardian</button>";
								
								$exist= true;
		        		 }
		        		if(! $exist){
		        		 	echo "<button class='btn btn-primary' data-toggle='modal' href='#guardian_modal'>Add Guardian</button>";
		        		 }

		    	$this->closeConn();
		  
		    }
		/*    function student_search_for_guardian($search){
		            $this->openConn();
		                //echo "<script>alert(".$search.")</script>";
		              
		              //set first letter of word to uppercase and next letters to lower case
		               $search = ucwords(strtolower($search));
		                 
		              	$stmt = $this->dbh->prepare("SELECT DISTINCT g.guardian_id, 
		              			s.Firstname, s.Lastname, g.Guardian_Name, 
		              			g.Guardian_Birthday, g.Guardian_Age, 
		              			g.Guardian_Occupation  , g.Guardian_Contact, 
		              			g.Guardian_Address, g.Guardian_Religion,
							 		g.Guardian_Relationship
							 		FROM Students_Profile as s, Guardians as g, Student_and_Parent as sp
									WHERE g.guardian_id = sp.guardian_id
									AND s.student_id = sp.student_id
									AND s.Lastname=?");
		                $stmt->bindParam(1, $search);
		            	 $stmt->execute();
		              
		              	$searched = false;
		              	echo "<tr>
								<th class='thead'>Student</th >
								<th colspan ='9' class='thead'><span>Guardian</span></th>
							</tr>
								<th class='name_th'>Name</th>
								<th class='name_th'> Name</th>
								<th id='bday_th'>Birthday</th>
								<th>Age</th>
								<th>Occupation</th>
								<th>Contact</th>
								<th>Address</th>
								<th>Religion</th>
								<th>Relationship</th>
								<th>Action</th>";
			         while($row=$stmt->fetch()){
				                $ctr=0;
				                while($ctr<2){
					                  if($row[$ctr] != "" || $row[$ctr] != ""){
						                  $searched = true;
					                  }
					                  $ctr++;
				                  }
				                  if($searched){
				                  	
									      echo "<tr id=".$row[0].">";
											echo "<td> ".$row[1]." ".$row[2]."</td>";
											echo "<td>".$row[3]."</td>";
											echo "<td>".$row[4]."</td>";
											echo "<td>".$row[5]."</td>";
											echo "<td>".$row[6]."</td>";
											echo "<td>".$row[7]."</td>";
											echo "<td>".$row[8]."</td>";
											echo "<td>".$row[9]."</td>";
											echo "<td>".$row[10]."</td>";
											echo "<td><button onclick ='guardian_edit(".$row[0].")' class='btn btn-info'>Edit</button></td>";
											
											echo "</tr>"; 	
									
				                  }
				                  
				                  
			         }
			         if(!$searched){
			                     echo"<tr><td colspan='10'> <p class='alert alert-warning'>No Matched Found </p></td></tr>";
			         }					
   					
		             $this->closeConn();
		            
		    }
		    function student_view(){
		    
		    $this->openConn();
		    	$stmt= $this ->dbh->prepare("SELECT DISTINCT s.student_id, s.Firstname, s.Lastname
					FROM Students_Profile AS s
					WHERE NOT 
					EXISTS (
						SELECT * 
						FROM Student_and_Parent AS sp
						WHERE sp.student_id = s.student_id
					)
				 ");
		    	$stmt->execute();
				
				while($row = $stmt->fetch()){
					
					
					echo "<tr id=".$row[0].">";
					echo "<td>".$row[1]." ".$row[2]."</td>";
					echo "<td><button class='btn btn-info' onclick ='guardian_add(".$row[0].")'>Add</button></td>";
					echo "</tr>";
					
					if ($row = $stmt->fetch() == null){
						echo "";
					}	
				
				}
				
					    	
		$this->closeConn();
		    }*/
    	
	}

		    

