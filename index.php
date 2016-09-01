<?php

require('classes/db_connection.php');
require('functions.php');

$query = "SELECT Name From on_call_schedule";

$db = new dbConnection();
$link = $db->getConnection();
$result = $link->query($query);
$numberofMembers = mysqli_num_rows($result); //count the number of members so that we can iterate over each member to generate the members information box.

?>

<!DOCTYPE html>
<html style="min-height:100%">

	<head>

		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

	</head>
	
	<body style="margin-left:45px; background:linear-gradient(rgba(43, 48, 52, 0.901961), rgba(16, 40, 60, 0.9))">
		<?php
			include 'includes/nav.php';
		?>
		
		<br><br><br>
	
		<?php 
			
			//This section if for on call member.
			$query = "SELECT * FROM on_call_schedule WHERE Order_of_Call='1'"; //on call member is ordered as number 1 in the database. 
			$memberName = get_member($query);
    		$end_date = get_end_date($query);
			//query to get the on call member info and call respective functions to grab the values from the database.
			$query = "SELECT * FROM members_info WHERE Name='$memberName'";
			$email = get_email($query);	
			$officePhone = get_office_phone($query);
			$cellPhone = get_cell_phone($query);

		?>
		
		<!-- HTML section for on call member -->
		<h2 style="margin-left:35px; color:rgb(1, 171, 108)">Currently On Call</h2><h5 style="margin-left:35px; color:rgba(234, 81, 92, 0.95)">(On Call Changes Every Friday at 6:30 PM PST)</h5>
		<div style="width: 90%; padding: 5px; border: 6px solid rgba(255, 255, 255, 1); margin: 5px; margin-left:35px" class="container-fluid1">
    		<div class="row">
        		<div class="column_oncall"><h4 style="color:white; font-size:20px"><?php echo $memberName; ?></h4></div>
            	<span><img style="float: right; margin-right: 25px; margin-top:10px" src="/images/oncall2.png"</span>

            	<div class="column_oncall">On Call Till: <?php echo $end_date; ?>

            		<hr style="width:141%; border-top: 2px solid rgba(1, 171, 108, 0.3);"></div>
            	<div class="column_oncall"><h4 style="color:white; font-size:20px">Contact Methods</h4></div>
            	<div class="column_oncall">Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
            	<div class="column_oncall">O: <?php echo $officePhone; ?> | C: <?php echo $cellPhone; ?></div>
    		</div>
		</div>
		
		<br>
	
	<!-- HTML AND PHP SECTION FOR OTHER MEMBERS -->
		<h3 style="margin-left:35px; color:rgba(38, 145, 165, 0.95)">Upcoming Weeks Schedule </h3>
	
		<?php
			
			$i = 1;
			$j = 2;
			while($i < $numberofMembers) { //while loop to iterate for each member
			
				$query = "SELECT * FROM on_call_schedule WHERE Order_of_Call='$j'";
				$memberName = get_member($query); 
				$start_date = get_start_date($query);
				$end_date = get_end_date($query);
				$query = "SELECT * FROM members_info WHERE Name='$memberName'";
				$email = get_email($query);
            	$officePhone = get_office_phone($query);
				$cellPhone = get_cell_phone($query);
		?>
			
			<div style="width: 90%; padding: 10px; border: 3px solid rgba(255,255,255,0.74); margin: 5px; margin-left:35px" class="grow"> 
    			<div id="parent">  
        			<div class="column_oncall"><h4 style="color:white"><?php echo $memberName; ?></h4></div>
            			<span style="color:wheat; margin-right:10px; margin-left:-20px">FROM: <?php echo $start_date; ?></span>
            			<span style="color:wheat">To: <?php echo $end_date; ?></span>
						<div class="column_oncall">
            				<div id="hover-content"><h4 style="color:white">Contact Methods</h4>
            					<div id="hover-content">Email: <?php echo $email; ?>
           							<div id="hover-content">O: <?php echo $officePhone; ?> | C: <?php echo $cellPhone; ?></div>
								</div>
							</div>
						</div>
				</div>
  			</div>		
			
		<?php $i++; $j++; } ?>


	</body>

</html>
