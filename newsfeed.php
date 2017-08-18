<?php include 'inc/header.php';?>
<!-- The Grid -->
<div class="w3-row">

	<!-- Middle Column -->
	<div class="w3-col m12">

		<div class="w3-row-padding">
			<div class="w3-col m12">
				<div class="w3-card-2 w3-round w3-white">
					<div class="w3-container w3-padding">
						<div class="w3-row ">
							<div class="w3-col w3-margin-top" style="width:50px">
								<img class="w3-image w3-round" src="<?php echo $_SESSION["user_dp"]; ?>" alt="" width="40px" >
							</div>
							<div class="w3-rest">
								<textarea class="w3-input w3-border w3-round-small w3-padding w3-margin-top w3-margin-bottom" name="msg" id="post_content" style="resize:none"></textarea>
								<button name="msg_post" class="w3-btn w3-theme w3-right" id="msg_post">
									<i class="fa fa-pencil"></i>  Post
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id= "post-area">
			<?php include 'post.php';?>
		</div>
		<!-- End Middle Column -->
	</div>

	<!-- End Grid -->
</div>
<?php include 'inc/footer.php';?>

