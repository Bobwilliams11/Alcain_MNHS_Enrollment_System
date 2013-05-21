$(document).ready(function(){
//alert('joanne');
	$("#security").hide();
	
	
});
function  classify(){
				var type=$('.login_as').val();
				if(type=='Member'){
					$('#security').hide();
				}else{
					$('#security').show();
				}
}
