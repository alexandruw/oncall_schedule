

<?php

/*
//Accessing single row values
$conn = mysql_connect("localhost","root","");
$seldb=mysql_select_db("on_call",$conn);
$retrive=mysql_query("select * from on_call_schedule where  Order_of_Call='1'",$conn);

//$result=mysql_fetch_row($retrive);

while ($row = mysql_fetch_array($retrive, MYSQL_BOTH)) {

//echo ($result[0]) . "\n";
//echo ($result[1]) . "\n";

echo ($row["Name"]  $row["On_Call_From"] $row["On_Call_To"]) . "\n";

}
*/

//echo $number_of_members;

	


include ('classes/db_connection.php');


function get_member($query) {

	$db = new dbConnection();
	$link = $db->getConnection();
    $result = $link->query($query);
    $row = $result->fetch_object();
    $member = $row->Name;
	return $member;

}

function get_start_date($query) {

    $result = $link->query($query);
    $row = $result->fetch_object();
    $start_date = $row->On_Call_From;
    $start_date = new DateTime($start_date);
    $start_date = $start_date->format('Y-m-d');
    return $start_date;
}

$query = "SELECT Name, On_Call_To FROM on_call_schedule WHERE Order_of_Call='1'";

function get_end_date($query) {
	$db = new dbConnection();
    $link = $db->getConnection();
    $result = $link->query($query);
    $row = $result->fetch_object();
    $end_date = $row->On_Call_To;
    $end_date = new DateTime($end_date);
    $end_date = $end_date->format('Y-m-d');
    return $end_date;

}
	$date = get_end_date($query);
	echo $date;



function get_members_phone($query) {
    $result = $link->query($query);
    $row = $result->fetch_object();
    $members_phone = $row->Cell_Phone;
    return $members_phone;

}

function get_members_email($query) {
    $result = $link->query($query);
    $row = $result->fetch_object();
    $members_email = $row->Email;
    return $members_email;

}

?>
