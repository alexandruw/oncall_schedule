

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

echo $number_of_members;

	

?>

