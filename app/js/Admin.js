$(function(){
	//for datepicker
		 $('.datepicker').datepicker({
			  format: 'yyyy-mm-dd'
		});
		 //getting age
		//student_birthday
	 $("input[name='birthday']").change(function(){
	 	var birthday= $("input[name='birthday']").val();
	 	var bdate= new Date(birthday);
	 	var dateToday=new Date();
	 	var byear=bdate.getFullYear();
	 	var thisyear=dateToday.getFullYear();
	 	var age=thisyear-byear;
	 
	 age= $("input[name ='age']").val(age);
	 	 

	 });
	 	//edit student_birthday
	 $("input[name='edit_birthday']").change(function(){
	 	var birthday= $("input[name='edit_birthday']").val();
	 	var bdate= new Date(birthday);
	 	var dateToday=new Date();
	 	var byear=bdate.getFullYear();
	 	var thisyear=dateToday.getFullYear();
	 	var age=thisyear-byear;
	 	
	 	$("input[name ='edit_age']").val(age);
	 });
	 	//edit teacher_bday
	 $("input[name='edit_teacher_birthday']").change(function(){
		 	var birthday= $("input[name='edit_teacher_birthday']").val();
		 	var bdate= new Date(birthday);
		 	var dateToday=new Date();
		 	var byear=bdate.getFullYear();
		 	var thisyear=dateToday.getFullYear();
		 	var age=thisyear-byear;
		 	
		 	$("input[name ='edit_teacher_age']").val(age);
	 });
	 	//guardian bday
	 $("input[name='guardian_bday']").change(function(){
		 	var birthday= $("input[name='guardian_bday']").val();
		 	var bdate= new Date(birthday);
		 	var dateToday=new Date();
		 	var byear=bdate.getFullYear();
		 	var thisyear=dateToday.getFullYear();
		 	var age=thisyear-byear;
		 	
		 	$("input[name ='guardian_age']").val(age);
	 });
	 	//edit guardian bday
	 $("input[name='edit_guardian_bday']").change(function(){
		 	var birthday= $("input[name='edit_guardian_bday']").val();
		 	var bdate= new Date(birthday);
		 	var dateToday=new Date();
		 	var byear=bdate.getFullYear();
		 	var thisyear=dateToday.getFullYear();
		 	var age=thisyear-byear;
		 	
		 	$("input[name ='edit_guardian_age']").val(age);
	 });
	
	//tooltip for guardian form
	    var tooltips = $( "[title]" ).tooltip();
	    
	//viewing all students
	$.ajax({
		type:"GET",
		url:"students_view(Admin).php",
		success:function(data){
		//alert(JSON.stringify(data));
			$("#view_students_table").append(data);
		},
		error:function(data){
		alert(JSON.stringify(data));
		}

	});
	//adding student
	$("#add_panel_btn").click(function(){
		$("#students_form").dialog( 'open' );
		
	});
	$("#students_form").dialog({
		autoOpen:false,
		resizable: false,
		modal:true,
		show:"clip",
		hide:"clip",
		width:500,
		buttons:{
			"Add":function(){
						var firstname = $("input[name='firstname']").val();
						var middlename = $("input[name='middlename']").val();
						var lastname = $("input[name='lastname']").val();
						var age = $("input[name='age']").val();
						var gender = $("input[name='gender']").val();
						var contact = $("input[name='contact']").val();
						var address= $("input[name='address']").val();
						var religion = $("input[name='religion']").val();
						var age = $("input[name = 'age']").val();
						var regint = /^[0-9]+/;
						var regexString = /^[a-zA-Z]+/;

						if(!regexString.test(firstname)){
								
								$("input[name = 'firstname']").css({"border":"1px solid red"});
								$("input[name = 'firstname']").focus();
								$("#error_mess").html("Invalid Firstname");
								$("#error_mess").show();
								return false;
						}
						else if(!regexString.test(middlename)){
								$("input[name = 'middlename']").focus();
								$("input[name = 'middlename']").css({"border":"1px solid red"});
								$("#error_mess").html("Invalid Middlename");
								$("#error_mess").show();
								return false;
						}
						else if (!regexString.test(lastname)){
								$("input[name = 'lastname']").focus();
								$("input[name = 'lastname']").css({"border":"1px solid red"});
								$("#error_mess").html("Invalid Lastname");
								$("#error_mess").show();
								return false;
						}
						else if((regexString.test(age)) || (age <= 10)){
								$("input[name = 'age']").focus();
								$("input[name = 'age']").css({"border":"1px solid red"});
								$("#error_mess").html("Invalid Age");
								$("#error_mess").show();
								return false;
						}
						else if(address == ""){
								$("input[name = 'address']").focus();
								$("input[name = 'address']").css({"border":"1px solid red"});
								$("#error_mess").html(" Address Need To Be Set");
								$("#error_mess").show();
								return false;
						}
						else if(regint.test(religion) || religion == ""){
								$("input[name = 'religion']").focus();
								$("input[name = 'religion']").css({"border":"1px solid red"});
								$("#error_mess").html("Invalid Religion");
								$("#error_mess").show();
								return false;
						}
						else if(!regint.test(contact) || contact == ""){
								$("input[name = 'contact']").focus();
								$("input[name = 'contact']").css({"border":"1px solid red"});
								$("#error_mess").html("Invalid Contact");
								$("#error_mess").show();
								return false;
						}
						
						else{
								var addObj={
									"firstname":$("input[name='firstname']").val(),
									"middlename":$("input[name='middlename']").val(),
									"lastname":$("input[name='lastname']").val(),
									"birthday":$("input[name='birthday']").val(),
									"age":$("input[name='age']").val(),
									"gender":$("select[name='gender']").val(),
									"address":$("input[name='address']").val(),
									"religion":$("input[name='religion']").val(),
									"contact":$("input[name='contact']").val(),
									"teacher":$("select[name='teacher']").val()
									
								};
								$.ajax({
										type:"POST",
										url:"student_add(Admin).php",
										data:addObj,
										success:function(data){
											
											$("#view_students_table").append(data);
											console.log(data);
																						
										},
										error:function(data){
													alert(JSON.stringify(addobj));
										}
								});
						
							}
							
				$(this).dialog( 'close' );
				},
				Cancel:function(){
					$( this ).dialog("close");
			
				}
			}
		});
		
		//retrieving teachers name and displaying it in select option tag
		$.ajax({
			type:"GET",
			url:"get_teacher(Admin).php",
			success:function(data){
				//alert(JSON.stringify(data));
				$("#teacher_list").html(data);
			},
			error:function(data){
				console.log(JSON.stringify(data));			
			}
		});
		
		//viewing the parent of the student
		$("#parent_info_li").click(function(){
		
			$student_id = $("input[name='student_id_for_view']").val();
			
			var viewObj={"student_id_for_view":$student_id};

			$.ajax({
				type :"POST",
				url:"guardian_view.php",
				data:viewObj,
				success:function(data){
					$("#parent_info").html(data);
				},
				error:function(data){
					console.log(JSON.stringify(data));
				}
			});
		});
		
		//register
		$("#register_btn").click(function(){
			$("#register_form").dialog( 'open' );
		});
		$("#register_form").dialog({
			autoOpen:false,
			width:500,
			show:"blind",
			hide:"blind",
			modal:true,
			buttons:{
				"Register":function(){
						var registerObj ={
							 	"reg_name":$("input[name='reg_name']").val(),
								 "username":$("input[name='username']").val(),
								 "password":$("input[name='password']").val(),
								 "confirm_pass":$("input[name='confirm_pass']").val(),
								 "reg_as":$("select[name='reg_as']").val()
						};
					
						$.ajax({
							type:"POST",
							url:"register.php",
							data:registerObj,
							success:function(data){
								alert(JSON.stringify(data));
							},
							error:function(data){
								console.log(JSON.stringify(data));
							}
						});
				},
				Cancel:function(){
					$( this ).dialog( 'close' );
				}
			}
		});
		
		
	//displaying users
	$("#view_user_btn").click(function(){
		
		$.ajax({
			type:"POST",
			url:"user_view.php",
			success:function(data){
				$("#view_table").html(data);
			},
			error:function(data){
				console.log(JSON.stringify(data));
			}
		});
	});
		
	//displaying room
	$("#view_room_btn").click(function(){
			
		$.ajax({
			type:"POST",
			url:"room_view.php",
			success:function(data){
				$("#view_table").html(data);
			},
			error:function(data){
				console.log(JSON.stringify(data));
			}
		});
		});
	//displaying subject
	$("#view_subject_btn").click(function(){
		$.ajax({
			type:"POST",
			url:"subject_view.php",
			success:function(data){
				$("#view_table").html(data);
			},
			error:function(data){
				console.log(JSON.stringify(data));
			}
		});
	});
		//adding room
		$("#room_btn").click(function(){
			$("#room_form").dialog( 'open' );
		});
		$("#room_form").dialog({
			autoOpen:false,
			width:450,
			show:"blind",
			hide:"blind",
			modal:true,
			buttons:{
				"Add ":function(){
						var roomObj ={
								 "room":$("input[name='room']").val(),
								 "construct_company":$("input[name ='construct_company']").val(),
								 "constructed":$("input[name ='constructed']").val(),
								 "cost":$("input[name ='cost']").val()
						};
				
					if (roomObj.room == "" || roomObj.construct_company == "" || roomObj.constructed == "" || roomObj.cost == ""){
						alert("Fill Up all Fields");
					}else{
						$.ajax({
							type:"POST",
							url:"add_room.php",
							data:roomObj,
							success:function(data){
								alert(JSON.stringify(data));
							},
							error:function(data){
								console.log(JSON.stringify(data));
							}
						});
						$( this ).dialog('close');
					}
				},
				Cancel:function(){
					$( this ).dialog( 'close' );
				}
			}
		});
	
		//add subject]
		$("#subject_btn").click(function(){
			$("#subject_form").dialog( "open" );
		});
		$("#subject_form").dialog({
			autoOpen:false,
			width:450,
			show:"blind",
			hide:"blind",
			modal:true,
			buttons:{
				"Add ":function(){
						var roomObj ={
						
								 "subject":$("input[name='subject']").val()
						};
					
						$.ajax({
							type:"POST",
							url:"add_subject.php",
							data:roomObj,
							success:function(data){
								alert(JSON.stringify(data));
							},
							error:function(data){
								console.log(JSON.stringify(data));
							}
						});
				},
				Cancel:function(){
					$( this ).dialog( 'close' );
				}
			}
		});
		
		//view student sched
		$("student_sched_li").click(function(){
		
			var student_id = $("input[name='student_id_for_view']").val();
				
			$.ajax({
				type:"POST",
				data:student_id,
				url:"student_view_sched.php",
				success:function(data){
					$("#student_sched_table").append(data);
		
				},
				alert:function(data){
					console.log(JSON.stringify(data));
				}
			});
		});
		
	
	
		
});//end of document on load

function student_view_data(student_id){
//alert(student_id);		
		var student_id = $("input[name='student_id_for_view']").val(student_id);
		
		$.ajax({
			type:"POST", 
			url:"student_view_profile.php",
			data:student_id, 
			success:function(data){
				$("#student_info").html(data);
			},
			error:function(){
			
			}
		});
		
}
function student_edit(edit_id){
	var editStudentObj={"edit_id":edit_id};

	   $.ajax({
			        type:"POST",
			        data:editStudentObj,
			        url:"students_edit.php",
			        success: function(data){
			   		  var obj= JSON.parse(data);
				        	 $("input[name='edit_id']").val(obj.edit_id);
					        $("input[name='edit_firstname']").val(obj.edit_firstname);
					        $("input[name='edit_middlename']").val(obj.edit_middlename);
					        $("input[name='edit_lastname']").val(obj.edit_lastname);
					        $("input[name='edit_birthday']").val(obj.edit_birthday);
					        $("input[name='edit_age']").val(obj.edit_age);
					        $("input[name='edit_gender']").val(obj.edit_gender);
					        $("input[name='edit_address']").val(obj.edit_address);
					        $("input[name='edit_religion']").val(obj.edit_religion);
					        $("input[name='edit_contact']").val(obj.edit_contact);

					   //     alert(JSON.stringify(obj));
			
			        },
			        error: function(data){
				        alert(JSON.stringify(data));
			        }
	        });	
	
		
		

}///end of student_edit function
function student_save(){
	
						var firstname = $("input[name='edit_firstname']").val();
						var middlename = $("input[name='edit_middlename']").val();
						var lastname = $("input[name='edit_lastname']").val();
						var age = $("input[name='edit_age']").val();
						var gender = $("input[name='edit_gender']").val();
						var contact = $("input[name='edit_contact']").val();
						var address= $("input[name='edit_address']").val();
						var religion = $("input[name='edit_religion']").val();
						var age = $("input[name = 'edit_age']").val();
						var regint = /^[0-9]+/;
						var regexString = /^[a-zA-Z]+/;

						if(!regexString.test(firstname)){
								
								$("input[name = 'edit_firstname']").css({"border":"1px solid red"});
								$("input[name = 'edit_firstname']").focus();
								$("#edit_error_mess").html("Invalid Firstname");
								$("#edit_error_mess").show();
								return false;
						}
						else if(!regexString.test(middlename)){
								$("input[name = 'edit_middlename']").focus();
								$("input[name = 'edit_middlename']").css({"border":"1px solid red"});
								$("#edit_error_mess").html("Invalid Middlename");
								$("#edit_error_mess").show();
								return false;
						}
						else if (!regexString.test(lastname)){
								$("input[name = 'edit_lastname']").focus();
								$("input[name = 'edit_lastname']").css({"border":"1px solid red"});
								$("#edit_error_mess").html("Invalid Lastname");
								$("#edit_error_mess").show();
								return false;
						}
						else if((regexString.test(age)) || (age <= 10)){
								$("input[name = 'edit_age']").focus();
								$("input[name = 'edit_age']").css({"border":"1px solid red"});
								$("#edit_error_mess").html("Invalid Age");
								$("#edit_error_mess").show();
								return false;
						}
						else if(address == ""){
								$("input[name = 'edit_address']").focus();
								$("input[name = 'edit_address']").css({"border":"1px solid red"});
								$("#edit_error_mess").html(" Address Need To Be Set");
								$("#edit_error_mess").show();
								return false;
						}
						else if(regint.test(religion) || religion == ""){
								$("input[name = 'edit_religion']").focus();
								$("input[name = 'edit_religion']").css({"border":"1px solid red"});
								$("#edit_error_mess").html("Invalid Religion");
								$("#edit_error_mess").show();
								return false;
						}
						else if(!regint.test(contact) || contact == ""){
								$("input[name = 'edit_contact']").focus();
								$("input[name = 'edit_contact']").css({"border":"1px solid red"});
								$("#edit_error_mess").html("Invalid Contact");
								$("#edit_error_mess").show();
								return false;
						}
						else{
							var saveObj={
									 "edit_id":$("input[name='edit_id']").val(),
									 "edit_firstname":$("input[name='edit_firstname']").val(),
									 "edit_middlename":$("input[name='edit_middlename']").val(),
									 "edit_lastname":$("input[name='edit_lastname']").val(),
									 "edit_birthday":$("input[name='edit_birthday']").val(),
									 "edit_age":$("input[name='edit_age']").val(),
									 "edit_gender":$("input[name='edit_gender']").val(),
									 "edit_address":$("input[name='edit_address']").val(),
									 "edit_religion":$("input[name='edit_religion']").val(),
									 "edit_contact":$("input[name='edit_contact']").val()
								};
						
								$.ajax({	
										type:"POST",
										url:"student_save.php",
										data:saveObj,
										success: function(data){
												 //$(document.getElementById(saveObj)).html(data);
												 $("#student_info").html(data);
											  
										 },
										 error: function(data){
										 	alert("Error in savisng file.."+ JSON.stringify(data));
										 }
							});
					}	
		$('#edit_student_modal').modal('hide');
}

function guardian_add(){
				
			        var addguardianObj={
								 "guardian":$("input[name='guardian']").val(),
								 "guardian_bday":$("input[name='guardian_bday']").val(),
								 "guardian_age":$("input[name='guardian_age']").val(),
								 "guardian_work":$("input[name='guardian_work']").val(),
								 "guardian_contact":$("input[name='guardian_contact']").val(),
								 "guardian_address":$("input[name='guardian_address']").val(),
								 "guardian_religion":$("input[name='guardian_religion']").val(),
								 "guardian_rship":$("input[name='guardian_rship']").val(),
                          "student_id_for_view":$("input[name ='student_id_for_view']").val()								 
								

							};
							  
							
						
							$.ajax({
								type:"POST",
								
								data:addguardianObj,
								url:"guardian_add.php",
								success: function(data){
									//alert(JSON.stringify(data));
									$("#parent_info").html(data);
								},
								error: function(data){
									
									alert( "cant add" + JSON.stringify(data));
								}


							});
							
					$("#guardian_modal").modal("hide");
				
}//end of guardian_add function

function guardian_edit (){

	  $student_id = $("input[name='student_id_for_view']").val();
		 
		 var retrieveObj={"student_id_for_view":$student_id};

	   $.ajax({
			        type:"POST",
			        data:retrieveObj,
			        url:"guardian_retrieve.php",
			        success: function(data){
			    
                        var obj= JSON.parse(data);
				        	 $("input[name='edit_guardian_id']").val(obj.edit_guardian_id);
					        $("input[name='edit_guardian']").val(obj.edit_guardian);
					        $("input[name='edit_guardian_bday']").val(obj.edit_guardian_bday);
					        $("input[name='edit_guardian_age']").val(obj.edit_guardian_age);
					        $("input[name='edit_guardian_work']").val(obj.edit_guardian_work);
					        $("input[name='edit_guardian_contact']").val(obj.edit_guardian_contact);
					        $("input[name='edit_guardian_address']").val(obj.edit_guardian_address);
					        $("input[name='edit_guardian_religion']").val(obj.edit_guardian_religion);
					        $("input[name='edit_guardian_rship']").val(obj.edit_guardian_rship);

					   //     alert(JSON.stringify(obj));
			
			        },
			        error: function(data){
				        alert(JSON.stringify(data));
			        }
	        });	
	

  
	
}//<----end of guardian_edit_function*/
function guardian_save(){
var saveObj={
								 "edit_guardian_id":$("input[name='edit_guardian_id']").val(),
								 "edit_guardian":$("input[name='edit_guardian']").val(),
								 "edit_guardian_bday":$("input[name='edit_guardian_bday']").val(),
								 "edit_guardian_age":$("input[name='edit_guardian_age']").val(),
								 "edit_guardian_work":$("input[name='edit_guardian_work']").val(),
								 "edit_guardian_contact":$("input[name='edit_guardian_contact']").val(),
								 "edit_guardian_address":$("input[name='edit_guardian_address']").val(),
								 "edit_guardian_religion":$("input[name='edit_guardian_religion']").val(),
								 "edit_guardian_rship":$("input[name='edit_guardian_rship']").val(),
								 "edit_student_id":$("input[name='edit_student_id']").val()
                        };
						
					//	alert($("input[name = 'edit_id']").val());
							$.ajax({	
									type:"POST",
									url:"guardian_save.php",
									data:saveObj,
									success: function(data){
									
											$("#parent_info").html(data);
											
									 },
									 error: function(data){
									 	alert("Error in savisng file.."+ JSON.stringify(data));
									 }
							});	
							$('#edit_guardian_modal').modal('hide');
}

function selectTeacher(teacher_id){
	
	var teacher = $("select[name = 'teacher']").val();

			
		
}
