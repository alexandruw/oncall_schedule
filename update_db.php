<?php

/*####################################################################################################################################
This code is ran every friday at 6:30 PM PST when the schedule changes through crontab. This updates the database to arrange the on call order. On every friday the first member on call is moved to last. It also queries the on call end date for the last member that is on call and assigns that value to the on call start date for the newly moved member from the first place and then calls theadd_seven_days function to create the on call end date for the same user.

Since the members are grabbed by the order of on call (starting at 1), the member from first place to last place changes the order of the table. So, the column is recreated and the order is auto incremented making sure that the order starts at 1.
######################################################################################################################################*/


//Connect to the database and grab the last members end date so that you can put that as the start date for the member that is dropping off for the  week.

include('classes/db_connection.php');

$db = new dbConnection();
$link = $db->getConnection();


$last_member_end_date = "SELECT On_Call_To FROM on_call_schedule ORDER BY Order_of_Call DESC LIMIT 1";
$result = $link->query($last_member_end_date);
$row = $result->fetch_object();
$start_date = $row->On_Call_To;
$start_date = new DateTime($start_date);
$start_date = $start_date->format('Y-m-d');


//Grab the member's name

$name = "SELECT Name FROM on_call_schedule WHERE Order_of_Call='1'";
$value = $link->query($name);
$value = $value->fetch_object();
$member_name = $value->Name;

//Now delete the first member

$delete_first_member =  "DELETE FROM on_call_schedule where Order_of_Call=1";
$link->query($delete_first_member);

//Function to add seven days to the start date.


//Drop the column so that we can recreate the order of on call in right order.

$drop = "ALTER TABLE on_call_schedule DROP COLUMN Order_of_Call";
$link->query($drop);

//After droping the column re-add it.

$add = "ALTER TABLE on_call_schedule ADD Order_Of_Call INT AUTO_INCREMENT PRIMARY KEY";
$link->query($add);

function add_seven_days($date) {
    $date = date('Y-m-d', strtotime($date. ' + 7 days'));
    return $date;
} 

//Now INSERTing the start date and the name in the table. End Date will be calculated using the add_seven_days function.

$insert = "INSERT INTO on_call_schedule (Name, On_Call_From, On_Call_To) VALUES('$member_name', '$start_date 06:30', '" . add_seven_days($start_date) . " 06:30')";
$link->query($insert);


?>
