$(function(){
//alert('dfsdfsf');
<<<<<<< HEAD
	//for datepicker
	 $('.datepicker').datepicker({
			  format: 'yyyy-mm-dd'
		});
	 //getting age
	 //student_birthday
=======
	
	//for datepicker
	$( ".bday" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:'yy-mm-dd',
   	 maxDate: "0M +0D "
    });
	 //getting age
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
	 $("input[name='birthday']").change(function(){
	 	var birthday= $("input[name='birthday']").val();
	 	var bdate= new Date(birthday);
	 	var dateToday=new Date();
	 	var byear=bdate.getFullYear();
	 	var thisyear=dateToday.getFullYear();
	 	var age=thisyear-byear;
<<<<<<< HEAD
	 
	 	$("input[name ='age']").val(age);
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
	 	
=======
	 	
	 	$("input[name ='age']").val(age);
	 	});
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
	//tooltip for guardian form
	    var tooltips = $( "[title]" ).tooltip();
	
	
	//for adding student
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
		height:700,
		buttons:{
			"Add":function(){
						var firstname = $("input[name='firstname']").val();
						var middlename = $("input[name='middlename']").val();
						var lastname = $("input[name='lastname']").val();
						var birthday = $("input[name='birthday']").val();
						var age = $("input[name='age']").val();
						var gender = $("select[name='gender']").val();
						var contact = $("input[name='contact']").val();
						
						var regint = /^[0-9]+/;
						var regexString = /^[a-zA-Z]+/;

						if(!regexString.test(firstname)){
								$('#student_status').html("Invalid Firstname ").effect("highlight", 2000).fadeOut(1000);
								$("#student_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
								return false;
						}
						else if(!regexString.test(middlename)){
								$('#student_status').html("Invalid Middlename").effect("highlight", 2000).fadeOut(1000);
								$("#student_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
								return false;
						}
						else if (!regexString.test(lastname)){
								$('#student_status').html("Invalid Lastname").effect("highlight", 2000).fadeOut(1000);
								$("#student_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
								return false;
						}
						else if(regexString.test(birthday)){
								$('#student_status').html("Invalid birthday (yyyy-mm-dd)").effect("highlight", 2000).fadeOut(1000);
								$("#student_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
								return false;
						}
						else if(regexString.test(age)){
								$('#student_status').html("Invalid Age").effect("highlight", 2000).fadeOut(1000);
								$("#student_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
								return false;
						}
						else if(!regint.test(contact)){
								$('#student_status').html("Invalid Contact").effect("highlight", 2000).fadeOut(1000);
								$("#student_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
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
									
								};
								
								$.ajax({
										type:"POST",
										url:"student_add.php",
										data:addObj,
										success:function(data){
												$("#view_students_table").append(data);
									
										},
										error:function(data){
													console.log(JSON.stringify(addobj));
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

	
	/*viewing the student*/
	 $.ajax({
		      type:"POST",
		      url:"students_view.php",
		      success: function(data){
			      $("#view_students_table").append(data);		
		      },
		      error: function(data){
			
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
<<<<<<< HEAD
	//view student sched
=======
	
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
	$.ajax({
		type:"POST",
		url:"student_view_sched.php",
		success:function(data){
			$("#student_sched_table").append(data);
		
		},
		alert:function(data){
			console.log(JSON.stringify(data));
		}
	});
	
	
	
});//<---end of document ready
function student_view_data(student_id){
		
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
				        console.lgo(JSON.stringify(data));
			        }
	        });	
	

}///end of student_edit function
function student_save(){

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
<<<<<<< HEAD
=======
						
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
							$.ajax({	
									type:"POST",
									url:"student_save.php",
									data:saveObj,
									success: function(data){
										    //$(document.getElementById(saveObj)).html(data);
										    $("#student_info").html(data);
<<<<<<< HEAD
										  
=======
										   alert( "Successfully Edited" );
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
										    //$(document.location.reload(true));
									 },
									 error: function(data){
									 	alert("Error in savisng file.."+ JSON.stringify(data));
									 }
	});	
	
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
									
									$("#parent_info").html(data);
									
								},
								error: function(data){
									
									console.log( "cant add" + JSON.stringify(data));
								}


							});
							
							$('#guardian_modal').modal('hide');		
				
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
				        console.log(JSON.stringify(data));
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
<<<<<<< HEAD
										
=======
											alert("Successfully Edited");
>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
									 },
									 error: function(data){
									 	alert("Error in savisng file.."+ JSON.stringify(data));
									 }
							});	
							
							$('#edit_guardian_modal').modal('hide');		
}
