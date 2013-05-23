  $(function() {
  //for menu
	$("#add_student").hide();
	$("#student_parent").hide();
	$("#register").hide();
	$("#subject_div").hide();
	
	$("#add_student_link").click(function(){
		$("#add_student").show();
		$("#mission_vission").hide();
		$("#student_parent").hide();
		$("#register").hide();
		$("#subject_div").hide();
	});
	$("#home").click(function(){
		$("#mission_vission").show();
		$("#add_student").hide();
		$("#student_parent").hide();
		$("#register").hide();
		$("#subject_div").hide();
	});
		$("#student_list_link").click(function(){
		$("#mission_vission").hide();
		$("#add_student").hide();
		$("#student_parent").show();
		$("#register").hide();
		$("#subject_div").hide();
	});
	$("#register_li").click(function(){
		$("#mission_vission").hide();
		$("#add_student").hide();
		$("#student_parent").hide();
		$("#register").show();
		$("#subject_div").hide();

	});
	$("#subject_li").click(function(){
		$("#mission_vission").hide();
		$("#add_student").hide();
		$("#student_parent").hide();
		$("#register").hide();
		$("#subject_div").show();

	});
	
	

  });
