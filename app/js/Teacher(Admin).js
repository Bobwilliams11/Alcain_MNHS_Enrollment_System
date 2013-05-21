$(document).ready(function(){

	//for age calculation
	 //getting age
		 $("input[name='teacher_bday']").change(function(){
		 	var birthday= $("input[name='teacher_bday']").val();
		 	var bdate= new Date(birthday);
		 	var dateToday=new Date();;
		 	var byear=bdate.getFullYear();
		 	var thisyear=dateToday.getFullYear();
		 	var age=thisyear-byear;
		 	
		 	$("input[name ='teacher_age']").val(age);
	});
	 	
	//viewing teachers list
		 $.ajax({
		      type:"POST",
		      url:"teacher_view.php",
		      success: function(data){
			
			      $("#teachers_table").append(data);		
		      },
		      error: function(data){
			
		      }
	   });

	//viewing teachers schedule
	$("#teacher_sched_li").click(function(){
		
		var teacher_id = { "teacher_id":$("input[name = 'teacher_id']").val()};
		
			
			$.ajax({
				type:"POST",
				data:teacher_id,
				url:"view_teacher_sched.php",
				success:function(data){
					$("#teacher_sched_table").html(data);
				},
				error:function(data){}
			});
	});
	
	

		//for adding teacher
		$("#add_teacher_btn").click(function(){
			$("#add_teacher_form").dialog( 'open' );
		
		});
		$("#add_teacher_form").dialog({
			autoOpen:false,
			resizable: false,
			modal:true,
			show:"clip",
			hide:"clip",
			width:500,
			height:600,
			buttons:{
				"Add":function(){
				
					var teacher_name =$("input[name = 'teacher_name']").val();
					var teacher_bday =$("input[name = 'teacher_bday']").val();
					var teacher_age =$("input[name = 'teacher_age']").val();
					var teacher_address =$("input[name = 'teacher_address']").val();

					
					var regexString = /^[a-zA-Z]+/;
		
					if(!regexString.test(teacher_name)){
						$('.teacher_status').html('Invalid Teacher Name!').effect("highlight", 2000).fadeOut(1000)
						$(".teacher_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
						return false;
					}
					else if (regexString.test(teacher_bday)){
						$('.teacher_status').html('Invalid Birthday!').effect("highlight", 2000).fadeOut(1000)
						$(".teacher_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
						return false;
					}
					else if (regexString.test(teacher_age)){
						$('.teacher_status').html('Invalid Age!').effect("highlight", 2000).fadeOut(1000)
						$(".teacher_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});	
						return false;
					}
					else if (!regexString.test(teacher_address)){
						$('.teacher_status').html('Invalid Address!').effect("highlight", 2000).fadeOut(1000)
						$(".teacher_status").css({"font-size":"20px","font-weight":"bold", "color":"blue"});
						return false;
					}
					
					else{
						var addObj={
									"teacher_name":$("input[name='teacher_name']").val(),
									"teacher_bday":$("input[name='teacher_bday']").val(),
									"teacher_age":$("input[name='teacher_age']").val(),
									"teacher_gender":$("select[name='teacher_gender']").val(),
									"teacher_address":$("input[name='teacher_address']").val(),
									"position":$("select[name='position']").val(),
									"room":$("select[name='room']").val()
						};
						
						$.ajax({
											type:"POST",
											url:"teacher_add.php",
											data:addObj,
											success:function(data){
									
												alert(data);
											//		alert('Successfully added..');
											//	$(document.location.reload(true));
											},
											error:function(data){
																alert(JSON.stringify(addobj));
			
											}
									});
				}
				},
				Cancel:function(){
					$( this ).dialog('close');
				}
			}
		});	
	//for register_form dialog
	$("#add_user_btn").click(function(){
		
		var registerObj={
						    "teacher_id":$("input[name='teacher_id']").val(),
						    "username":$("input[name='username']").val(),
						    "password":$("input[name='password']").val(),
						    "confirm_pass":$("input[name='confirm_pass']").val()
						    
			             };
			          
						$.ajax({
							type:"POST",
							url:"register.php",
							data: registerObj,
							success: function(data){
							   alert(JSON.stringify(data));
								//console.log(data)
							
							},
							error: function(data){
								alert("Cant add "+JSON.stringify(data));
					
							}	
				
						});
	});
		//getting teachers position
		  $.ajax({
				type :"GET",
				url:"teacher_position.php",
				success:function(data){
						$("#for_teacher_position2").html(data);
						$("#for_teacher_position").html(data);
				},
				error:function(data){
					alert(data);
				}
			});
	
		//getting rooms
		$.ajax({
			type:"GET",
			url:"teacher_room.php",
			success:function(data){
					$("#for_teacher_room").html(data);
					$("#for_teacher_room2").html(data);
			},
			error:function(data){
				console.log(data);
			}
		});


});

function teacher_view_data(teacher_id){
		
	
		var teacher = $("input[name='teacher_id']").val(teacher_id);
		
		$.ajax({
			type:"POST", 
			url:"teacher_view_data_admin.php",
			data:teacher, 
			success:function(data){
				$("#teacher_basic_info").html(data);
			},
			error:function(data){
				alert(data);
			}
		});
		
		$.ajax({
			type:"POST", 
			url:"teacher_get_name.php",
			data:teacher, 
			success:function(data){
			
				$("#teacher_name_header").html(data);
			},
			error:function(data){
				alert(data);
			}
			
		});
		
}
function teacher_edit(edit_teacher_id){
	var editTeacherObj={"edit_teacher_id":edit_teacher_id};

	   $.ajax({
			        type:"POST",
			        data:editTeacherObj,
			        url:"teacher_retrieve.php",
			        success: function(data){
			     			
                        var obj= JSON.parse(data);
				        	 $("input[name='edit_teacher_id']").val(obj.edit_teacher_id);
					        $("input[name='edit_teacher']").val(obj.edit_teacher);
					        $("input[name='edit_teacher_bday']").val(obj.edit_teacher_bday);
					        $("input[name='edit_teacher_age']").val(obj.edit_teacher_age);
					        $("select[name='edit_teacher_gender']").val(obj.edit_teacher_gender);
					        $("input[name='edit_teacher_address']").val(obj.edit_teacher_address);
					        $("select[name='position']").val(obj.position);
					        $("select[name='room']").val(obj.room);

					   //     alert(JSON.stringify(obj));
			
			        },
			        error: function(data){
				        console.log(JSON.stringify(data));
			        }
	        });	
}
function teacher_save(){
	var saveObj={
								 "edit_teacher_id":$("input[name='edit_teacher_id']").val(),
								 "edit_teacher":$("input[name='edit_teacher']").val(),
								 "edit_teacher_bday":$("input[name='edit_teacher_bday']").val(),
								 "edit_teacher_age":$("input[name='edit_teacher_age']").val(),
								 "edit_teacher_gender":$("select[name='edit_teacher_gender']").val(),
								 "edit_teacher_address":$("input[name='edit_teacher_address']").val(),
								 "position":$("select[name='position']").val(),
								 "room":$("select[name='room']").val()
					};
					
			
							$.ajax({	
									type:"POST",
									data:saveObj,
									url:"teacher_save.php",
									success: function(data){
										 $("#teacher_basic_info").html(data);
										  
										  // $(document.location.reload(true));
									 },
									 error: function(data){
									 	alert("Error in savisng file.."+ JSON.stringify(data));
									 }
							});
							var teacher_name = $("input[name ='edit_teacher']").val();
							var gender = $("select[name ='edit_teacher_gender']").val();
							
							if ( gender == 'Male'){
		                		alert("Sir "+teacher_name+" Successfully Editted...");
		                		
		                }
		                else{
		                	alert( "Ma'am "+ teacher_name +" Successfully Editted...");
		                	 	
		               }
		               	
						$('#edit_teacher_modal').modal('hide');		
							
}
