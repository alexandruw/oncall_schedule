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
$members_inorder = array("Daniel Ward", "Eddie Rodriguez", "Placido Sanchez", "Alex Kim", "Rajesh Kunwar", "Raghu Aderapalli" );

$membersEmail = array("daniel.ward@disney.com", "eddie.rodriguez@disney.com", "placido.sanchez@disney.com", "alex.kim@disney.com", "rajesh.b.kunwar.-nd@disney.com", "raghavendra.x.aderapalli.-nd@disney.com");

$memberscellPhone = array("213-434-5272", "323-365-3822", "818-395-2472", "818-572-3401", "832-525-8676", "254-424-7589");

$membersworkPhone = array("818-955-4775", "818-973-4116", "818-955-4751", "818-569-7821", "818-973-2107", "818-973-3498");

//Creating the start date for the first member.
$start_date = "2016-08-26";

//Connecting to the database. The class is already written to connect to the database and located in ./classes/ directory.
include('classes/db_connection.php');

$db = new dbConnection();
$link = $db->getConnection();

//After the DB connection is established, the member's info and on_call_schedule tables are dropped and then recreated.

// Dropping on_call_schedule table
$drop_table_query = "DROP TABLE on_call_schedule";
$drop_table = $link->query($drop_table_query);

// Dropping members_info table
$drop_table_query = "DROP TABLE members_info";
$drop_table = $link->query($drop_table_query);

// Recreating the table

// Recreating on_call_schedule table
$create_table_query = "CREATE TABLE on_call_schedule(Name VARCHAR(100) NOT NULL, On_Call_From TIMESTAMP, On_Call_To TIMESTAMP, Order_of_Call INT NOT NULL AUTO_INCREMENT PRIMARY KEY)";
$create_table = $link->query($create_table_query);

// Recreating members_info table
$create_table_query = "CREATE TABLE members_info(Name VARCHAR(100) NOT NULL, Email varchar(50) NOT NULL, Cell_Phone VARCHAR(20), Work_Phone VARCHAR(20))";
$create_table = $link->query($create_table_query);
  

//Counting the number of members in the group that is stored in the above array $members_inorder.

$number_of_members = count($members_inorder);
$GLOBALS['number_of_members'];   //Declaring a superglobal variable so that the member count can be used in other files.

$i = 0;

while($i < $number_of_members) {   //Loops through each members and insert query to insert the values for both tables.
  	$j = 1 + $i;
		// Inserting into on_call_schedule table
	$insert_query = "INSERT INTO on_call_schedule VALUES('$members_inorder[$i]', '$start_date 06:30', '" . add_seven_days($start_date) . " 06:30', '$j')";  //calls the function add_seven_days inside the sql query
	$insert = $link->query($insert_query);
	$start_date = add_seven_days($start_date); // Calling the add_seven_days function again so that everytime it loops the start date also increases by seven days for each member.

// Inserting into members_info table
	$insert_query = "INSERT INTO members_info VALUES('$members_inorder[$i]', '$membersEmail[$i]', '$memberscellPhone[$i]', '$membersworkPhone[$i]')";
	$insert = $link->query($insert_query);
	$i++;
}

?>
