<?php
	include 'BaseDAO.php';
	class UserDAO extends BaseDAO{
		  
		function logIn($username,$password){
		   	$this->openConn();
		               		
		           $stmt = $this->dbh->prepare(" select * from Registered_User where Username=? and Password =?");
				     $stmt->bindParam(1,$username);
				     $stmt->bindParam(2,$password);
		           $stmt->execute();
		               
				     if($row = $stmt->fetch()){
		                 return true;

		           }else{
					      return false;
					  }
					  
			
					
					/*$stmt= $this->dbh->prepare("Insert INTO Active_User (Username, Section) values(?,?)");
					$stmt->bindParam(1,$username);
					$stmt->bindParam(2,$section);
					$stmt->execute();
			
		
		               										
		      $this->closeConn();*/
		               
		}
		function getUser($username,$password){
		   	$this->openConn();
		               		
		           $stmt = $this->dbh->prepare(" select Username from Registered_User where Username=?and Password =? ");
				     $stmt->bindParam(1,$username);
				     $stmt->bindParam(2,$password);
		           $stmt->execute();
		               
				     $row = $stmt->fetch();
		           	return $row[0];

		               										
		      $this->closeConn();
		               
		}
		function register( $teacher_id, $username, $password, $confirm_pass){
		      $this->openConn();
		            
		             $teacher = $this ->dbh->prepare("SELECT * FROM Teachers_Table WHERE teacher_id=?");
						 $teacher->bindParam(1, $teacher_id);
		            $teacher->execute();
						
						if($row =$teacher->fetch()){
						    $stmt= $this->dbh->prepare("INSERT INTO Registered_User( teacher_id, Username, Password, Password2) VALUES (?,?,?,?)");
		            		$stmt->bindParam(1, $teacher_id);
				            $stmt->bindParam(2, $username);
						    $stmt->bindParam(3, $password);
						    $stmt->bindParam(4, $confirm_pass);
						    $stmt->execute();
						    $user_id = $this->dbh->lastInsertId();
                            
                            echo "Successfully Registered...";
						}
	                    else{
	                        echo"Teacher_ID not found.."; 
						}		  
		            
					
					             
				

		      $this->closeConn(); 
		 }
		 function LogInAdmin($username,$password){
				$this->openConn();
				
					$stmt = $this ->dbh->prepare("SELECT * FROM Admin where Admin_username=? and Password=?");
					$stmt->bindParam(1,$username);
					$stmt->bindParam(2,$password);
					$stmt->execute();
			
					$this->closeConn();
			
					while($row = $stmt->fetch()){
							if($row[0] == "" || $row[1] == null){
								return false;
							}else{
								return true;
							}
					}
				$this->closeConn();
		}
		function CheckSecurityPass($SecurityPass){
				$this->openConn();
				
					$stmt = $this ->dbh->prepare("Select * from Security_Password where Password = ?");
					$stmt->bindParam(1,$SecurityPass);
					$stmt->execute();
			
					$row = $stmt->fetch();
					if($row[0] != "" || $row[0] != null){
						return true;
					}
				
				$this->closeConn();
			
		}
       /* function users_view(){

			        $this->openConn();
			        $stmt = $this->dbh->prepare("SELECT * FROM Teachers_Table");
			        $stmt->execute();
			        
			        while($row = $stmt->fetch()){
				        echo "<tr id=".$row[0].">";
				    //    echo "<td><img src='css/images/user-icon.png'/></td>";
				        echo "<td>".$row[0]."</td>";
				        echo "<td>".$row[1]."</td>";
				       	echo "<td>".$row[2]."</td>";
				        
						echo "<td><button id='user_edit_btn' onclick='user_edit(".$row[0].")'>Edit</button></td>";
                  		echo "<td><button id='user_delete_btn' onclick='user_delete(".$row[0].")'>Delete</button></td>";
				        echo "</tr>"; 
		         }
		        
           		$this->closeConn();
		 
	        }
	          */
}
/* function user_delete($id){
                  $this->openConn();
                  $stmt = $this->dbh->prepare("DELETE FROM Registered_User WHERE user_id=?");
                  $stmt->bindParam(1, $id);
                  $stmt->execute();
                  
                  $this->closeConn();
            
            }
            
           
            function user_save($edit_user_id,$edit_username, $edit_position, $edit_password, $edit_password2 ){
		
		                $this->openConn();
		                $stmt = $this ->dbh->prepare("UPDATE Registered_User set Username= ?,  Position =?, Password=?, Password2=? where user_id=?");
		             
		                $stmt->bindParam(1, $edit_username);
		                $stmt->bindParam(2, $edit_position);
		                $stmt->bindParam(3, $edit_password);
		                $stmt->bindParam(4, $edit_password2);
		                $stmt->bindParam(5, $edit_user_id);
		                
		                
		                $stmt->execute();
		                echo "<tr id=".$edit_user_id.">";
		                echo "<td>".$edit_username."</td>";
		                echo "<td>".$edit_position."</td>";
		                echo "<td>".$edit_password."</td>";
		                echo "<td>".$edit_password2."</td>";
			            echo "<td><button id='user_edit_btn' onclick='user_edit(".$edit_user_id.")'>Edit</button></td>";
                  		echo "<td><button id='user_delete_btn' onclick='user_delete(".$edit_user_id.")'>Delete</button></td>";
		                echo "</tr>";
		                $this->closeConn();
		                
		       } 
		
	          function user_retrieve($edit_user_id){
		
		              $this->openConn();
		              
		              $stmt = $this->dbh->prepare("SELECT * FROM Registered_User WHERE user_id=?");
		              $stmt->bindParam(1,$edit_user_id);
		              $stmt->execute();
		              
		              $record = $stmt->fetch();
			
			           $list = array("edit_user_id"=>$record[0], "edit_username"=>$record[1], "edit_position"=>$record[2],"edit_password"=>$record[3], "edit_password2"=>$record[4]);

			           $json_string = json_encode($list);			
            
			           echo $json_string;
			
			           $this->closeConn();
		              
		              
	        }*/
	     
		

