<?php

function time_elapsed($start, $end){
	// $start = '2017-02-24 00:00:00';
	// $end = '2017-02-24 00:01:59';

	// $interval = 0;
	$interval = (strtotime($end) - strtotime($start))/3600 ;
	// echo $interval;

	// If Interval Is Less Than 1 Hour
	if ($interval < 1) {
		//Converting Time Into Mins
		$interval = (strtotime($end) - strtotime($start)) / 60;
		if ($interval < 1) {
			$interval = "Just Now";
		}
		elseif ($interval < 2) {
			$interval = floor($interval)." min";
		}
		elseif ($interval < 60){
			$interval = floor($interval)." mins";
		}
	}
	else {
		if ($interval < 2) {
			$interval = floor($interval)." hr";
		}
		if ($interval >= 2) {

			$interval = floor($interval)." hrs";
		}
		if ($interval >= 24 and $interval < 48 ) {

			$start = new DateTime($start);
			$time = $start->format("h:ma");
			$interval = "Yesterday at ". $time;
		}
		if ($interval >= 48) {

			$start = new DateTime($start);
			$time = $start->format("g:ma");
			$date = $start->format("F j");
			$interval = $date." at ". $time;
		}
	}
	return $interval;
}

function likes($id, $operand){

	$operand_table = "mbs_pst_likes"; $operand_id_col = "post_id";

	if ($operand == "comment") {
		$operand_table = "mbs_cmt_likes"; $operand_id_col = "comment_id";
	}

	include 'connection.php';
	$query = "SELECT
	COUNT(`user_id`) AS tot_likes
	FROM
	$operand_table
	WHERE
	$operand_id_col = $id AND `like_state` = 1";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	return $row['tot_likes'];

}

function add_like($Uid, $operand_id, $operand){
	$operand_table = "mbs_pst_likes"; $operand_id_col = "post_id";

	if ($operand == "comment") {
		$operand_table = "mbs_cmt_likes"; $operand_id_col = "comment_id";
	}

	include 'connection.php';
	$like_state = validate_like($Uid, $operand_id, $operand);
	if (isset($like_state)) {
		$like_state = $like_state == 1 ? 0 : 1;
		$query = "UPDATE
		$operand_table
		SET
		`like_state` = $like_state
		WHERE
		`user_id` = $Uid AND $operand_id_col = $operand_id;";
	}
	else {
		$query = "INSERT
		INTO
		$operand_table(
		$operand_id_col,
		`user_id`,
		`like_state`
		)
		VALUES(
		$operand_id,
		$Uid,
		1
		);";
	}
	$result = $db->query($query);
	return $like_state;
}

function validate_like($Uid, $operand_id, $operand){
	$operand_table = "mbs_pst_likes"; $operand_id_col = "post_id";

	if ($operand == "comment") {
		$operand_table = "mbs_cmt_likes"; $operand_id_col = "comment_id";
	}
	include 'connection.php';
	$query = "SELECT
	`like_state`
	FROM
	$operand_table
	WHERE
	`user_id` = $Uid AND $operand_id_col = $operand_id";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	if ($row) return $row['like_state'];

}

?>
