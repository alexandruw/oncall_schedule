<?php

//connect to database

include('classes/db_connection.php');


$db = new dbConnection();
$link = $db->getConnection();


	
	function get_member($query) {

    $result = $link->query($query);
	$row = $result->fetch_object();

	return $row->Name;
}


?>


<html>
	
	<head>

		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	 
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

	</head>

	<body style="background-color: rgba(189, 189, 189, 0.49)">
		<div>
			<nav class="navbar navbar-inverse navbar-fixed-top">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a style="color:white" class="navbar-brand" href="#">DATG MEDIA IT</a>
				  
				</div>
				<div>
				<img src="images/logo.png" style="margin-right:45px; float:right"></img>
			  </div>
			</nav>
		</div>
		<br><br><br>

		<!-- Member 1 -->
			<?php 
				$query = "SELECT NAME FROM on_call_schedule WHERE Id='1'";
				$first_member = get_member($query);
			?>
		
	<h2 style="margin-left:35px; color:rgb(1, 171, 108)">Currently On Call</h2>
	<div style="width: 90%; padding: 5px; border: 5px solid rgba(208, 24, 24, 0.53); margin: 5px; margin-left:35px" class="container-fluid1">
		<div class="row">
		  <div class="column_oncall"><h4><?php echo $first_member; ?></h4></div>
			<span><img style="float: right; margin-right: 16px" src="/images/oncall2.png"</span>
			
			<div class="column_oncall">On Call Till: $sometimevariable	
			<hr style="border-top: 2px solid rgba(1, 171, 108, 0.3);"></div>		
			<div class="column_oncall"><h4>Contact Methods</h4></div>
			<div class="column_oncall">Email: $someemailvariable</div>
			<div class="column_oncall">Phone: $somephonevariable</div>
		</div>
		
	</div>	
	
	<br>
	
	<h3 style="margin-left:35px; color:rgba(0, 140, 165, 0.82)">Coming Weeks On Calls</h3>
	<div style="width: 90%; padding: 10px; border: 3px solid gray; margin: 5px; margin-left:35px" class="container-fluid1">
		<div class="row">
		  <div class="column_oncall"><h4>$SomeNameVariable</h4></div>
			<span>FROM: $fromTimeVariable  To: $toTimevariable</span>

			<div class="column_oncall"><h4>Contact Methods</h4></div>
			<div class="column_oncall">Email: $someemailvariable</div>
			<div class="column_oncall">Phone: $somephonevariable</div>
		</div>
		<
	</div>	
	
	<div style="width: 90%; padding: 10px; border: 3px solid gray; margin: 5px; margin-left:35px" class="container-fluid1">
		<div class="row">
		  <div class="column_oncall"><h4>$SomeNameVariable</h4></div>
			<span>FROM: $fromTimeVariable  To: $toTimevariable</span>
		
			<div class="column_oncall"><h4>Contact Methods</h4></div>
			<div class="column_oncall">Email: $someemailvariable</div>
			<div class="column_oncall">Phone: $somephonevariable</div>
		</div>
		
		
	</div>	

	<div style="width: 90%; padding: 10px; border: 3px solid gray; margin: 5px; margin-left:35px" class="container-fluid1">
		<div class="row">
		  <div class="column_oncall"><h4>$SomeNameVariable</h4></div>
			<span>FROM: $fromTimeVariable  To: $toTimevariable</span>
		
			<div class="column_oncall"><h4>Contact Methods</h4></div>
			<div class="column_oncall">Email: $someemailvariable</div>
			<div class="column_oncall">Phone: $somephonevariable</div>
		</div>
		
	</div>	
	<div style="width: 90%; padding: 10px; border: 3px solid gray; margin: 5px; margin-left:35px" class="container-fluid1">
		<div class="row">
		  <div class="column_oncall"><h4>$SomeNameVariable</h4></div>
			<span>FROM: $fromTimeVariable  To: $toTimevariable</span>
		
			<div class="column_oncall"><h4>Contact Methods</h4></div>
			<div class="column_oncall">Email: $someemailvariable</div>
			<div class="column_oncall">Phone: $somephonevariable</div>
		</div>
		
	</div>	
	
	<div style="width: 90%; padding: 10px; border: 3px solid gray; margin: 5px; margin-left:35px" class="container-fluid1">
		<div class="row">
		  <div class="column_oncall"><h4>$SomeNameVariable</h4></div>
			<span>FROM: $fromTimeVariable  To: $toTimevariable</span>
		
			<div class="column_oncall"><h4>Contact Methods</h4></div>
			<div class="column_oncall">Email: $someemailvariable</div>
			<div class="column_oncall">Phone: $somephonevariable</div>
		</div>
		
	</div>	
	
	
	
	</body>


</html>


