<?php
  include "log_in_validate.php";
	
	
?>
<!DOCTYPE html>
<html>
	<head>
	
	<link rel = "stylesheet" href = "css/jquery-ui-1.10.1.custom.min.css"/>
	<!---<link rel="stylesheet" href="css/home_index.css">-->
	<link rel="stylesheet" href="css/log_in_preview.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<meta charset= 'utf-8'>
	<title>SEES</title>
	</head>
	<body id="login_body">
		
			<div id="log_in_div" >
			
				
				<form id ='loginForm'  method="POST">
				<p id="status">
				<?php 
				    if(isset($errMsg)){
					    echo $errMsg;
				    }
			    ?>
			   </p>
				  
				<form id='loginForm'  class="form-horizontal" method='POST'>
					<div class="control-group">
					
						<label class="control-label" for='username'>Username:</label><br/>
						<div class="controls">
							<input type='text' id='username' name='username' placeholder="Username"/><br/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for='password'>Password:</label><br/>
						<div class="controls">
							<input type='password' id='password' name='password' placeholder="Password"/><br/>
						</div>
					</div>
					
					<label for = 'login_as'>Login As:</label>		
					<select class='login_as' onchange = 'classify()'>
						<option value='Member'>Member/User</option>
						<option value='Admin'>Administrator</option>
					</select><br/>
					<p id="security">
						<label for='SecurityPass'>SecurityPassword</label><br>
						<input type='password' id='SecurityPass' name='SecurityPass' /><br/>
					</p>
					<input type='submit' value="Sign in" id="log_in_btn" class="btn btn-primary" />	
				</form>
				
			</div><!--log_in_div-->
			
			
		</div><!--body_container-->
		
		
	
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src = "js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/home_index.js"></script>
	<script src="js/log_in_preview.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/bootstrap.js"></script>
	</body>
</html>
