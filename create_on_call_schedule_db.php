<?php

/*################################################################################################################

								!!!!!!!!!!!!!!!!!!WARNING !!!!!!!!!!!!!!!!!!!!!!!

1) Run this code only when there is a change in schedule or a member is added. Put the members in the array below in the order of the schedule. Also, the start date for the first member.
2) The code will calculate the start date and end date of call for rest of the members automatically.

##################################################################################################################*/

//Pass in the date with this format: Y-m-d (MYSQL WAY).

//Function to add 7 days to the start date.

function add_seven_days($date) {
	$date = date('Y-m-d', strtotime($date. ' + 7 days'));
	return $date;
}


//Array to store team members.

$members_inorder = array("Raghu Aderapalli", "Daniel Ward", "Eddie Rodriguez", "Placido Sanchez", "Alex Kim", "Rajesh Kunwar" );

//Creating the start date for the first member.

$start_date = "2016-08-19";


//Connecting to the database. The class is already written to connect to the database and located in ./classes/ directory.

include('classes/db_connection.php');

$db = new dbConnection();
$link = $db->getConnection();


//After the DB connection is established, the on_call_schedule is dropped and then recreated.

$drop_table_query = "DROP TABLE on_call_schedule";
$drop_table = $link->query($drop_table_query);

//Recreating the table
$create_table_query = "CREATE TABLE on_call_schedule(Name VARCHAR(100) NOT NULL, On_Call_From TIMESTAMP, On_Call_To TIMESTAMP, Order_of_Call INT NOT NULL AUTO_INCREMENT PRIMARY KEY)";
$create_table = $link->query($create_table_query);


//Counting the number of members in the group that is stored in the above array $members_inorder.

$number_of_members = count($members_inorder);
$GLOBALS['number_of_members'];   //Declaring a superglobal variable so that the member count can be accessed from another file.

$i = 0;

while($i < $number_of_members) {   //Loops through each members and insert query to insert the values.
  	$j = 1 + $i;
	$insert_query = "INSERT INTO on_call_schedule VALUES('$members_inorder[$i]', '$start_date 06:30', '" . add_seven_days($start_date) . " 06:30', '$j')";  //calls the function add_seven_days inside the sql query
	$insert = $link->query($insert_query);
	$start_date = add_seven_days($start_date);
	$i++;
}

?>
