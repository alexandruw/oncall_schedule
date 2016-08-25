function get_member($query) {

    $result = $link->query($query);
    $row = $result->fetch_object();
    return $row->Name;
}

function get_start_date($query) {

    $result = $link->query($query);
    $row = $result->fetch_object();
    $start_date = $row->On_Call_From;
    $start_date = new DateTime($start_date);
    $start_date = $start_date->format('Y-m-d');
    return $start_date;
}

function get_end_date($query) {
    $result = $link->query($query);
    $row = $result->fetch_object();
    $end_date = $row->On_Call_To;
    $end_date = new DateTime($start_date);
    $end_date = $start_date->format('Y-m-d');
    return $end_date;
}

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

