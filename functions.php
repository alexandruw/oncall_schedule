<?php


function get_member($query) {

	$db = new dbConnection();
	$link = $db->getConnection();
    $result = $link->query($query);
    $row = $result->fetch_object();
    $member = $row->Name;
	return $member;

}

function get_start_date($query) {

	$db = new dbConnection();
	$link = $db->getConnection();
    $result = $link->query($query);
    $row = $result->fetch_object();
    $start_date = $row->On_Call_From;
    return $start_date;
}

function get_end_date($query) {

	$db = new dbConnection();
    $link = $db->getConnection();
    $result = $link->query($query);
    $row = $result->fetch_object();
    $end_date = $row->On_Call_To;
    return $end_date;
}

function get_office_phone($query) {

	$db = new dbConnection();
	$link = $db->getConnection();
    $result = $link->query($query);
    $row = $result->fetch_object();
    $members_phone = $row->Work_Phone;
    return $members_phone;

}

function get_cell_phone($query) {

	$db = new dbConnection();
	$link = $db->getConnection();
    $result = $link->query($query);
    $row = $result->fetch_object();
    $members_phone = $row->Cell_Phone;
    return $members_phone;

}

function get_email($query) {

	$db = new dbConnection();
 	$link = $db->getConnection();
    $result = $link->query($query);
    $row = $result->fetch_object();
    $members_email = $row->Email;
    return $members_email;

}

?>
