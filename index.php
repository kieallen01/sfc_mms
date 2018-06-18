<?php
	session_start();
	include ("includes/connection.php");
	if (isset($_SESSION["started"])) {
		if ($_SESSION["started"]) {
			if ($_SESSION["userlevel"] == "System Administrator") {
				header("location: views/admin/");
			}
			else if ($_SESSION["userlevel"] == "Market") {
				header("location: views/market/");
			}
			else if ($_SESSION["userlevel"] == "Treasury") {
				header("location: views/treasury/");
			}
		}
		else {
			header("location:/");
		}
	}
	
	include ('includes/header.php');
?>
	<body style = "background-color : #f5f7f8;">
		<!-- <nav class="navbar navbar-expand-md navbar-dark fixed-top text-white justify-content-between" style = "background-color: #2e75a8; padding : 0px 10px 0px 0px;">
			<a id = "btnMMS" class="navbar-brand text-left" href="javascript:;" style = "background-color : #25618c; padding-left: 5px; padding-right : 5px;">
				<div style = "font-family: Impact; font-size: 18px;">MARKET MANAGEMENT SYSTEM</div>
				<div style = "font-size : 12px;">City of San Fernando, La Union</div>
			</a>
		</nav> -->
		<div class = "ui top fixed menu" style = "background-color: #2e75a8;">
			<a id = "btnMMS" class = "item" style = "background-color: #25618c; color: #fff; font-weight: bold; font-stretch: condensed;">
				<div class = "header">
					<div class = "content" style = "font-size: 18px;">MARKET MANAGEMENT SYSTEM</div>
					<div class = "sub header" style = "font-size: 12px;">City Governement of San Fernando, La Union</div>
				</div>
			</a>
		</div>

		<div class = "ui container" style = "width : 480px; padding-top: 10%;">
			<div class = "ui stackable equal width grid">
				<div class = "row">
					<div class = "column">
						<h4 class = "ui header" style = "color : #1f4e79;">Log-in:</h4>
						<div class = "ui segment" style = "background-color: #2b6b98;">
							<form id = "frmLogin" class = "ui small form">
								<div class = "inline fields">
									<div class = "three wide field">
										<label style = "color: #fff;">Username:</label>
									</div>
									<div class = "thirteen wide field">
										<input type = "text" name = "txtUser" id = "txtUser" placeholder = "Username" required autofocus>
									</div>
								</div>

								<div class = "inline fields">
									<div class = "three wide field">
										<label style = "color: #fff;">Password:</label>
									</div>
									<div class = "thirteen wide field">
										<input type = "password" name = "txtPass" id = "txtPass" placeholder = "Password" required>
									</div>
								</div>

								<input type = "submit" name = "btnLogin" id = "btnLogin" value = "Login" hidden>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include ("includes/footer.php"); ?>
		<script type = "text/javascript" src = "js/serverdir.js"></script>
		<script type = "text/javascript" src = "js/toastr.conf.js"></script>
		<script type = "text/javascript" src = "js/historylog.js"></script>
		<script type = "text/javascript" src = "js/fnLogin.js"></script>
	</body>
</html>