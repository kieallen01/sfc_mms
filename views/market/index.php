<?php
	session_start();
	include ("../../includes/connection.php");

	if (!($_SESSION["started"])) {
		header("location: ".$serverdir);
	}
	else {
		if ($_SESSION["userlevel"] == "Treasury") {
			header ("location: ".$serverdir."/views/market");
		}
	}

	include ("../../includes/header.php");
	include ("../../includes/sidebarMarket.php");
?>
	<body>
		<div class = "dimmed pusher">
			<?php
				include ("../../includes/navbar.php");

				include ("createStallApplication.php");
				include ("approveStallApplication.php");
				include ("assignStall.php");
				include ("manageStallVendor.php");
				include ("generateStallAward.php");
				include ("manageStallClosure.php");
				include ("manageReassignStall.php");
				include ("../changePassword.php");
			?>
		</div>

		<?php include ("../../includes/footer.php"); ?>
		<script type = "text/javascript" src = "../../js/toastr.conf.js"></script>
		<script type = "text/javascript" src = "../../js/accordion.init.js"></script>

		<script type = "text/javascript" src = "../../js/serverdir.js"></script>
		<script type = "text/javascript" src = "../../js/historylog.js"></script>

		<script type = "text/javascript" src = "../../js/fnGetAddress.js"></script>
		<script type = "text/javascript" src = "../../js/fnMarketView.js"></script>
		<script type = "text/javascript" src = "../../js/fnGetStallLocation.js"></script>
		<script type = "text/javascript" src = "../../js/fnMarket.js"></script>

		<script type = "text/javascript" src = "../../js/fnChangePassword.js"></script>
		<script type = "text/javascript" src = "../../js/fnLogout.js"></script>
	</body>
</html>