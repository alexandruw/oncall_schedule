<?php

require('classes/db_connection.php');
require('functions.php');

$query = "SELECT Name From on_call_schedule";

$db = new dbConnection();
$link = $db->getConnection();
$result = $link->query($query);
$numberofMembers = mysqli_num_rows($result);

?>

<!DOCTTYPE html>
<html>

	<head>

		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

	</head>
	
	<body>
		<?php
			include 'includes/nav.php';
		?>
		
		<br><br><br>
	
		<?php
			$query = "SELECT * FROM on_call_schedule WHERE Order_of_Call='1'"; 
			$memberName = get_member($query);
			$query2 = "SELECT * FROM members_info WHERE Name='$memberName'";
    		$end_date = get_end_date($query);
			$email = get_members_email($query2);
			$phone = get_members_phone($query2);
			

		?>
		<h2 style="margin-left:35px; color:rgb(1, 171, 108)">Currently On Call</h2><h5 style="margin-left:35px; color:rgb(255, 0, 0)">(On Call Changes Every Friday at 6:30 PM PST)</h5>
		<div style="width: 90%; padding: 5px; border: 5px solid rgba(208, 24, 24, 0.53); margin: 5px; margin-left:35px" class="container-fluid1">
    		<div class="row">
        		<div class="column_oncall"><h4><?php echo $memberName; ?></h4></div>
            	<span><img style="float: right; margin-right: 16px" src="/images/oncall2.png"</span>

            	<div class="column_oncall">On Call Till: <?php echo $end_date; ?>

            		<hr style="border-top: 2px solid rgba(1, 171, 108, 0.3);"></div>
            	<div class="column_oncall"><h4>Contact Methods</h4></div>
            	<div class="column_oncall">Email: <?php echo $email; ?></div>
            	<div class="column_oncall">Phone: <?php echo $phone; ?></div>
    		</div>
		</div>
		
		<br>
	
		<h3 style="margin-left:35px; color:rgba(0, 140, 165, 0.82)">Coming Weeks On Calls</h3>
	
		<?php
			
			$i = 1;
			$j = 2;
			while($i < $numberofMembers) { 
			
				$query = "SELECT * FROM on_call_schedule WHERE Order_of_Call='$j'";
				$memberName = get_member($query); 
				$query2 = "SELECT * FROM members_info WHERE Name='$memberName'";
				$start_date = get_start_date($query);
				$end_date = get_end_date($query);
				$email = get_members_email($query2);
            	$phone = get_members_phone($query2);
		?>

			<div style="width: 90%; padding: 10px; border: 3px solid gray; margin: 5px; margin-left:35px" class="container-fluid1">
    			<div class="row"> -
        			<div class="column_oncall"><h4><?php echo $memberName; ?></h4></div>
            			<span>FROM: <?php echo $start_date; ?></span>
            			<span>To: <?php echo $end_date; ?></span>
            			<div class="column_oncall"><h4>Contact Methods</h4></div>
            			<div class="column_oncall">Email: <?php echo $email; ?></div>
           				<div class="column_oncall">Phone: <?php echo $phone; ?></div>
  				  </div>
			</div>
			
		<?php $i++; $j++; } ?>


	</body>

</html>
