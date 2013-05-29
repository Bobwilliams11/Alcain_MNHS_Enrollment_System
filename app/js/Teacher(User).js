$(document).ready(function(){

	//viewing teachers list
	$.ajax({
		      type:"GET",
		      url:"teacher_view.php",
		      success: function(data){
			 //    alert(data);
			      $("#teachers_table").append(data);		
		      },
		      error: function(data){
					console.log(data);
		      }
	   });
	   //getting teachers position
	  $.ajax({
	   	type :"GET",
	   	url:"teacher_position.php",
	   	success:function(data){
	   
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
				
		},
		error:function(data){
			console.log(data);
		}
	});
	
<<<<<<< HEAD
	//viewing teacher sched
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

	

=======
	



>>>>>>> 898af78d12fecc6b7bf4b96d3e3ad6f6a3593678
});//end of document on load


function teacher_view_data(teacher_id){
		
	
		var teacher = $("input[name='teacher_id']").val(teacher_id);
		
		$.ajax({
			type:"POST", 
			url:"teacher_view_data.php",
			data:teacher, 
			success:function(data){
				$("#teacher_basic_info").html(data);
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
										var gender = $("select[name ='edit_teacher_gender']").val();
										var teacher = $("input[name = 'edit_teacher']").val();
							
										if ( gender == 'Male'){
								       		alert("Sir "+teacher+" Successfully Editted...");
								       		
								       }
								       else{
								       	alert( "Ma'am "+ teacher +" Successfully Editted...");
								       	 	
								      }
								    
									 
									 },
									 error: function(data){
									 	alert("Error in savisng file.."+ JSON.stringify(data));
									 }
							});
							 
							
		               	
						$('#edit_teacher_modal').modal('hide');		
							
}

