$(function(){

	//getting the subject in database...
	
		$.ajax({
			type:"GET",
			url:"get_subject.php",
			success:function(data){
				$("#for_subject").html(data);
				$("#subject_to_teach").html(data);
				
			},
			error:function(data){
				console.log(data);
			}
		});
		
		//getting teacher position for adding student schedule
		$.ajax({
			type:"GET",
			url:"get_teacher(Admin).php",
			success:function(data){
				$("#for_subj_teacher").html(data);
			},
			error:function(data){
				console.log(JSON.stringify(data));
			}
		});
		
		//getting room to teach
		$.ajax({
			type:"GET", 
			url:"get_room_to_teach.php",
			success:function(data){
				$("#room_to_teach").html(data);
			},
			error:function(){
			
			}		
		});
		
		//adding teachers subject sched...
		$("#add_teacher_sched_btn").click(function(){
				var addSchedObj={
						"teacher_id":$("input[name = 'teacher_id']").val(),
						"room_to_teach":$("select[name='room_to_teach']").val(),
						"subject":$("select[name='subject']").val(),
						"day_to_teach":$("input[name='day_to_teach']").val(),
						"time_to_teach":$("input[name='time_to_teach']").val()
				};
				alert(JSON.stringify(addSchedObj));
				$.ajax({
						type:"POST",
						url:"add_teacher_sched.php",
						data:addSchedObj,
						success:function(data){
								$("#teacher_sched_table").html(data);
									console.log(JSON.stringify(data));
						},
						error:function(data){
									console.log(JSON.stringify(data));
					 }
			});
			
				$('#add_teacher_sched').modal('hide');
		});
		
		

});//end of document onload

function selectTeacher(){
	
	var selected_teacher = $("select[name='teacher']").val();
	var teacher_name= $("#teacher_choice").val(selected_teacher);
	
	var teacher ={"teacher_choice": $("#teacher_choice").val()};
	
	console.log(JSON.stringify(teacher));
	
	

	$.ajax({
		type:"POST",
		url:"get_teachers_subject.php",
		data:teacher,
		success:function(data){
			
			$("#for_subject").html(data);
		},
		error:function(data){
			console.log(JSON.stringify(data));
		}
	});
}
