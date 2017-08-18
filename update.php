<?php
if (isset($_POST['act']) AND $_POST['act'] == "rem-post") {

	include 'inc/connection.php';
	$id = $_POST['id'];
	$db->query("DELETE  FROM `mbs_posts` WHERE `post_id` = $id");
}
if (isset($_GET['act']) AND $_GET['act'] == "rem_comment") {

	include 'inc/connection.php';
	$id = $_GET['id'];
	$db->query("DELETE  FROM `mbs_comments` WHERE `comment_id` = $id");
}

if (isset($_GET['act']) AND $_GET['act'] == "update_ts") {

	require_once 'inc/functions.php';
	include 'inc/connection.php';
	if (isset($_GET['ts']) AND $_GET['ts'] == "p") {
		$table = 'mbs_posts';
		$time = 'post_time';
		$col_id = 'post_id';
	}
	if (isset($_GET['ts']) AND $_GET['ts'] == "c") {
		$table = 'mbs_comments';
		$time = 'comment_time';
		$col_id = 'comment_id';
	}

	$id = $_GET['id'];
	$query = "SELECT
	$time
	FROM
	$table
	WHERE
	$col_id = $id;";

	$result = $db->query($query);
	$row = $result->fetch_assoc();
	date_default_timezone_set('Asia/Karachi');
	$start = $row[$time];
	$end = date('Y-m-d H:i:s');
	$interval = time_elapsed($start,$end);
	echo $interval;
}

if (isset($_POST['act']) AND $_POST['act'] == "upload-post") {

	include 'inc/connection.php';
	session_start();
	$p_content = $_POST['content'];
	$time = date("Y:m:d ");
	$u_id = $_SESSION["user_id"];

	$query = "INSERT
	INTO
	`mbs_posts`(
	`post_content`,
	`user_id`
	)
	VALUES(
	'$p_content',
	'$u_id'
	)";

	$db->query($query);
}

if (isset($_POST['act']) AND $_POST['act'] == "add_cmnt") {
	include 'inc/connection.php';
	session_start();
	$u_id = $_SESSION["user_id"];
	$post_id = $_POST['id'];
	$c_content = $_POST['content'];

	$query = "INSERT
	INTO
	`mbs_comments`(
	`comment_content`,
	`user_id`,
	`post_id`
	)
	VALUES(
	'$c_content',
	'$u_id',
	'$post_id'
	);";

	$db->query($query);

}

if (isset($_POST['act']) AND $_POST['act'] == "add_like") {
	include 'inc/connection.php';
	include 'inc/functions.php';
	session_start();
	$u_id = $_SESSION["user_id"];
	$operand_id = $_POST['id'];
	$operand = $_POST['operand'];
	$state = add_like($u_id, $operand_id, $operand);
}

if (isset($_POST['act']) AND $_POST['act'] == "update_ca") {

	require_once 'inc/functions.php';
	require_once 'inc/ShowHtml.php';
	$post_id = $_POST['id'];
	show_comments($post_id);
}

?>

