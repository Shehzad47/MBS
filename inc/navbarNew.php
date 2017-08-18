<div class="w3-top w3-theme-d2">
	<div class="w3-row">
		<div class="w3-col l4 w3-left" style="width: 40">
			<ul class="w3-navbar w3-left-align w3-large">
				<!-- <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
					<a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" onclick="openNav()">
						<i class="fa fa-bars w3-large"></i>
					</a>
				</li> -->
				<li>
					<a href="profile" class="w3-padding-large w3-theme-d4">
						<i class="fa fa-home w3-margin-right w3-large"></i>Logo
					</a>
				</li>
				<li class="w3-hide-small">
					<a href="newsfeed" class="w3-padding-large w3-hover-white" title="Newsfeed">
						<i class="fa fa-newspaper-o w3-large"></i>
					</a>
				</li>
				<li class="w3-hide-small">
					<a href="#" class="w3-padding-large w3-hover-white" title="News">
						<i class="fa fa-globe w3-large"></i>
					</a>
				</li>
				<li class="w3-hide-small">
					<a href="#" class="w3-padding-large w3-hover-white" title="Messages">
						<i class="fa fa-envelope w3-large"></i>
					</a>
				</li>
				<li class="w3-hide-small w3-dropdown-hover">
					<a href="#" class="w3-padding-large w3-hover-white" title="Notifications">
						<i class="fa fa-bell w3-large"></i><span class="w3-badge w3-right w3-small w3-green">3</span>
					</a>
					<div class="w3-dropdown-content w3-white w3-card-4">
						<a href="#">One new friend request</a>
						<a href="#">John Doe posted on your wall</a>
						<a href="#">Jane likes your post</a>
					</div>
				</li>
				<!-- <li class="w3-hide-small w3-right w3-dropdown-click">
					<a href="#" class="w3-padding-large w3-hover-white" title="My Account" onclick="myFunction1()">
						<img src="<?php echo $_SESSION['user_dp']; ?>" class="w3-circle" style="height:25px;width:25px"
						alt="<?php echo $_SESSION['user_name'];?>">
						<span class="w3-small"><?php echo $_SESSION['user_name']; ?> <i class="fa fa-angle-down"></i></span>
					</a>
					<div id="demo" class="w3-dropdown-content w3-white w3-card-4">
						<a href="welcome">Logout</a>
					</div>
				</li> -->
			</ul>
		</div>
		<div class="w3-col l5" style="width: 40">
			<div>
			<input type="text" name="" class="w3-round w3-border-0 w3-paddin w3-animate-input" style="height: 27px; margin-top: 12px; width: 70% " >
				<!-- <span class="fa fa-search w3-margin"></span> -->
			</div>
		</div>
		<div class="w3-col l3 w3-righ" style="width: 20">
			<div class=" w3-right w3-padding-large w3-hover-whit w3-dropdown-click" title="My Account" onclick="myFunction1()">
				<img src="<?php echo $_SESSION['user_dp']; ?>" class="w3-circle" style="height:25px;width:25px"
				alt="<?php echo $_SESSION['user_name'];?>">
				<span class="w3-small"><?php echo $_SESSION['user_name']; ?> <i class="fa fa-angle-down"></i></span>
			</div>
			<div id="demo" class=" w3-dropdown-content w3-white w3-card-4">
				<a href="welcome">Logout</a>
			</div>
		</div>
	</div>

</div>
	<!-- Navbar on small screens -->
	<!-- <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
		<ul class="w3-navbar w3-left-align w3-large w3-theme">
			<li><a class="w3-padding-large" href="#">Link 1</a></li>
			<li><a class="w3-padding-large" href="#">Link 2</a></li>
			<li><a class="w3-padding-large" href="#">Link 3</a></li>
			<li><a class="w3-padding-large" href="#">My Profile</a></li>
		</ul>
	</div> -->