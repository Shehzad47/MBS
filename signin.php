<?php
session_start();
include_once 'inc/connection.php';
$u_name = $_POST['usr_name'];
$u_pswrd = $_POST['usr_pswrd'];

$query = "SELECT
`user_id`,
`user_name`,
CONCAT(`user_fname`, ' ', `user_lname`) as full_name,
user_dp,
`user_pswrd`
FROM
`mbs_users`
WHERE
`user_name` = '$u_name' AND `user_pswrd` = '$u_pswrd';";
$result = $db->query($query);
$row = $result->fetch_assoc();
$count = $result->num_rows;
// echo $count;
if ($count>0) {
	$_SESSION['start'] = "true";
	$_SESSION["user_name"] = $row['user_name'];
	$_SESSION["full_name"] = $row['full_name'];
	$_SESSION["user_dp"] = $row['user_dp'];
	$_SESSION["user_id"] = $row['user_id'];
	header("location:newsfeed");
}
else {
	echo "Incorrect Password or Username";
}

?>