<?php
// session_start();
if (isset($_POST['signUp'])) {
	include_once 'inc/connection.php';
	$u_fname = $_POST['fname'];
	$l_name = $_POST['lname'];
	$n_uname = $_POST['uname'];
	$n_email = $_POST['email'];
	$n_pswrd = $_POST['npassword'];
	$c_pswrd = $_POST['cpassword'];

	$query = "INSERT
	INTO
	`mbs_users`(
	`user_fname`,
	`user_lname`,
	`user_name`,
	`user_email`,
	`user_pswrd`,
	`user_dp`
	)
	VALUES(
	'$u_fname',
	'$l_name',
	'$n_uname',
	'$n_email',
	'$n_pswrd',
	'img/users/default.jpg'
	)";
	$result = $db->query($query);
	if ($query) {
		echo "Account Created Successfully.";
	}
	else {
		echo "Failed.";
	}
}
else {
	echo "Error";
}

?>