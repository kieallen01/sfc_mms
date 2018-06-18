<?php
	session_start();
	include ("../../includes/connection.php");

	if (!($_SESSION["started"])) {
		header("location: ".$serverdir);
	}
	else {
		if ($_SESSION["userlevel"] == "Market") {
			header ("location: ".$serverdir."/views/treasury");
		}
	}

	include ("../../includes/header.php");
	include ("../../includes/sidebarTreasury.php");
?>
	<body>
		<div class = "dimmed pusher">
			<?php
				include ("../../includes/navbar.php");

				include ("collection/index.php");
			?>
		</div>

		<?php include ("../../includes/footer.php"); ?>
		<script type = "text/javascript" src = "../../js/toastr.conf.js"></script>
		<script type = "text/javascript" src = "../../js/accordion.init.js"></script>
		
		<script type = "text/javascript" src = "../../js/serverdir.js"></script>
		<script type = "text/javascript" src = "../../js/historylog.js"></script>

		<script type = "text/javascript" src = "../../js/fnGetAddress.js"></script>
		<script type = "text/javascript" src = "../../js/fnGetStallLocation.js"></script>
		<script type = "text/javascript" src = "../../js/fnTreasuryView.js"></script>
		<script type = "text/javascript" src = "../../js/fnTreasury.js"></script>

		<script type = "text/javascript" src = "../../js/fnLogout.js"></script>
	</body>
</html>