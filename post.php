<?php
if (session_status() == PHP_SESSION_NONE):
	session_start();
endif;
require_once 'inc/functions.php';
require_once 'inc/ShowHtml.php';

$u_id = $_SESSION["user_id"];
include 'inc/connection.php';
$query = "SELECT
  mbs_posts.post_id,
  mbs_posts.post_content,
  CONCAT(
    mbs_users.user_fname,
    ' ',
    mbs_users.user_lname
  ) AS name,
  mbs_posts.post_time,
  mbs_users.user_name,
  mbs_users.user_dp
FROM
  mbs_posts
INNER JOIN
  mbs_users ON mbs_posts.user_id = mbs_users.user_id
ORDER BY
  `post_time` DESC;";

$result = $db->query($query);

while ($row = $result->fetch_assoc()):

	date_default_timezone_set('Asia/Karachi');
	$start = $row["post_time"];
	$end = date('Y-m-d H:i:s');
	$interval = time_elapsed($start, $end);
	?>

	<div class="w3-container w3-card-2 w3-white w3-margin w3-margin-bottom-0" id="post_<?php echo $row["post_id"]; ?>">
		<div>
			<img src="<?php echo $row["user_dp"]; ?>" alt="Avatar" class="w3-left w3-circl w3-margin-right" style="width:50px">
			<p class="w3-margin-bottom w3-padding-top">
				<strong class="w3-text-theme"><?php echo $row["name"]; ?></strong>
				<span class="w3-opacity ts w3-small" id="p_ts_<?php echo $row["post_id"]; ?>" style="display: block;" >
					<?php echo $interval; ?>
				</span>
			</p>
		</div>
		<p><?php echo $row["post_content"]; ?></p>
		<hr class="w3-clear w3-margin-bottom-0">
		<?php
	$state = validate_like($_SESSION["user_id"], $row["post_id"], "post");
	$color = "w3-text-grey";
	if ($state == 1) {
		$color = "w3-text-theme";
	}
	?>
		<i class="fa fa-thumbs-up w3-xlarge <?php echo $color; ?> w3-padding w3-hover-text-theme post like cus-pointer" id="like_<?php echo $row["post_id"]; ?>"></i>
		<i class="fa fa-comment w3-xlarge w3-text-grey w3-padding w3-hover-text-blue-grey cus-pointer addCmnt"></i>
		<i class="fa fa-trash w3-xlarge w3-text-grey w3-padding w3-hover-text-red deleteButton cus-pointer" id="dlt_<?php echo $row["post_id"]; ?>"></i>
		<div class="w3-margin-top-0 w3-border-top">
			<div id="pla_<?php echo $row["post_id"]; ?>">
				<?php if (likes($row["post_id"], "post")): ?>
					<div class="w3-row w3-border-bottom">
						<p class="w3-small w3-text-theme">
							<i class="fa fa-thumbs-up w3-text-white w3-theme w3-circle w3-tiny" style="padding:4px 5px 5px 5px">
							</i>
							<?php echo likes($row["post_id"], "post"); ?>
						</p>
					</div>
				<?php endif;?>
		</div>
		<div id="comment_area_<?php echo $row["post_id"]; ?>" class="ca">
		<?php show_comments($row["post_id"])?>
		</div>
	</div>
</div>

<?php
endwhile;
// endif;
?>
