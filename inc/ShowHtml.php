<?php
function show_comments($id){

	if (session_status() == PHP_SESSION_NONE) session_start();

	$u_id = $_SESSION["user_id"];

	include 'connection.php';

	$query = "
	SELECT
	c.comment_id,
	c.comment_content,
	c.comment_time,
	CONCAT(u.user_fname,
	' ',
	u.user_lname) AS name,
	u.user_dp,
	u.user_name,
	p.post_id
	FROM
	mbs_comments c
	JOIN
	mbs_users u ON u.user_id = c.user_id
	JOIN
	mbs_posts p ON c.post_id = p.post_id
	WHERE
	p.post_id = '$id'
	ORDER BY
	c.comment_time ASC;";


	$result = $db->query($query);

	while ($row = $result->fetch_assoc()) :

		date_default_timezone_set('Asia/Karachi');
	$start = $row["comment_time"];
	$end = date('Y-m-d H:i:s');
	$interval = time_elapsed($start,$end);?>

	<div class="w3-row" id="comment_<?php echo $row['comment_id']; ?>">
		<div class="w3-col w3-margin-top" style="width:50px">
			<img class=" w3-border cus-dp-comment" src="<?php echo $row["user_dp"]; ?>">
		</div>
		<div class="w3-rest">
			<p class="w3-margin-0 w3-margin-top">
				<strong class="w3-text-theme"><?php echo $row['name']; ?></strong>
				<?php echo $row['comment_content']; ?>
			</p>
			<span class="w3-opacity-min w3-small ts" id="c_ts_<?php echo $row['comment_id']; ?>" style="padding-right: 5px"><?php echo $interval; ?>
			</span>
			<span class="w3-text-theme w3-small cus-pointer delC" id="dlt_cmt_<?php echo $row['comment_id']; ?>" style="padding-right: 5px;">Delete</span>
			<?php
			$status = validate_like($_SESSION["user_id"], $row["comment_id"], "comment");
			$state = "Like";
			if ($status == 1) {
				$state = "Unlike";
			}
			?>
			<span class="w3-text-theme w3-small cus-pointer like comment" id="cmt_lk_<?php echo $row['comment_id']; ?>" style="padding-right: 5px"><?php echo $state; ?></span>
			<span id="cla_<?php echo $row['comment_id']; ?>">
				<?php
				if(likes($row["comment_id"],"comment")): ?>
				<span class="fa fa-thumbs-up w3-text-theme w3-circle">
					<?php echo likes($row["comment_id"],"comment"); ?>
				</span>
				<?php
				endif; ?>
			</span>
		</div>
	</div>
<?php endwhile; ?>
<div class="w3-row ">
	<div class="w3-col w3-margin-top" style="width:50px">
		<img class=" w3-border cus-dp-comment" src="<?php echo $_SESSION["user_dp"]; ?>" alt="" >
	</div>
	<div class="w3-rest">
		<p contenteditable="true" class=" addComment w3-border w3-padding w3-round-small w3-margin-top w3-margin-bottom" id="comment_box_<?php echo $id; ?>"></p>
	</div>
</div>
<?php } ?>
