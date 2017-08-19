<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<title>Log In or Sign Up</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-indigo.css">
<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
<body class=" w3-theme-l4">
	<div class="w3-navbar w3-theme-l2 w3-container">
		<div class="w3-row">
			<div class="w3-half w3-hide-">
				<h4 class="w3-hide-small">Message BroadCasting Service</h4>
			</div>
			<div class="w3-half w3-right">
				<form action="signin.php" method="POST" accept-charset="utf-8" class="w3-form ">
					<div class="w3-row">
						<div class="w3-padding-left w3-col l5 s12 m12">
							<label class="w3-label w3-text-white w3-left">Username</label>
							<input class="w3-input w3-round w3-border" type="text" name="usr_name" required>
						</div>
						<div class="w3-padding-left w3-col l5 s12 m12">
							<label class="w3-label w3-text-white w3-left">Password</label>
							<input class="w3-input w3-round w3-border" type="password" name="usr_pswrd" required>
						</div>
						<div class="w3-padding-left w3-col l2 s12 m12">
							<label class="w3-label w3-left" style="visibility: hidden;">LogIn</label>
							<button class="w3-btn-block w3-input w3-blue w3-round" name="logIn">Log In</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="w3-container w3-padding-0">
		<div class="w3-row">

			<div class="w3-half w3-hide-small w3-content">
				<div class="w3-content" align="center">
					<img class="" src="img/welcome.png" alt="Get Connected" style="width:100%;max-width:400px">
				</div>
			</div>

			<div class="w3-half">
				<div class="w3-panel ">
					<div class="w3-hover-shadow">
						<div class="w3-container ">
							<h2>Sign Up For Free!</h2>
						</div>
						<form action="signup" method="POST">
							<div class="w3-row">
                        <div class="w3-col w3-padding w3-half">
                           <label>First Name</label>
                           <input class="w3-input w3-border w3-round" name="fname" type="text" required>
                        </div>
                        <div class="w3-col w3-padding w3-half">
                           <label>Last Name</label>
                           <input class="w3-input w3-border w3-round" name="lname" type="text" required>
                        </div>
                        <div class="col w3-padding">
                           <label>User Name</label>
                           <input class="w3-input w3-border w3-round" name="uname" type="text" required>
                        </div>
                        <div class="col w3-padding">
                           <label>Email</label>
                           <input class="w3-input w3-border w3-round" name="email" type="text" required>
                        </div>
                        <div class="col w3-padding">
                           <label>New Password</label>
                           <input class="w3-input w3-border w3-round" name="npassword" type="password" required>
                        </div>
                        <div class="col w3-padding">
                           <label>Confirm Password</label>
                           <input class="w3-input w3-border w3-round" name="cpassword" type="password" required>
                        </div>
                        <div class="col w3-padding">
                           <button class="w3-btn-block w3-input w3-blue w3-round" name="signUp">Sign Up</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>

      </div>
   </div>

</body>
</html>
