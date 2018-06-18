<?php
	session_start();
	include ("../../includes/connection.php");

	if (!($_SESSION["started"])) {
		header("location: ".$serverdir);
	}
	else {
		if ($_SESSION["userlevel"] != "System Administrator") {
			// header ("location: ".$serverdir."/views/403.php");
			header ("location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
		}
	}

	include ("../../includes/header.php");
	include ("../../includes/sidebarAdmin.php");
?>
	<body>
		<div class = "dimmed pusher">
			<?php
				include ("../../includes/navbar.php");

				include ("manage-admin/index.php");
				include ("settings-infrastructure/index.php");
				include ("settings-market/index.php");
				include ("settings-computation/index.php");
				include ("settings-remittance/index.php");
				include ("database/index.php");
				include ("history-log/index.php");
				include ("../changePassword.php");
			?>
			
		</div>

		<?php include ("../../includes/footer.php"); ?>
		<script type = "text/javascript" src = "../../js/toastr.conf.js"></script>
		<script type = "text/javascript" src = "../../js/accordion.init.js"></script>

		<script type = "text/javascript" src = "../../js/serverdir.js"></script>
		<script type = "text/javascript" src = "../../js/historylog.js"></script>

		<script type = "text/javascript" src = "../../js/fnGetAddress.js"></script>
		<script type = "text/javascript" src = "../../js/fnGetStallLocation.js"></script>

		<script type = "text/javascript" src = "../../js/fnAdminView.js"></script>
		<script type = "text/javascript" src = "../../js/fnAdmin.js"></script>
		<script type = "text/javascript" src = "../../js/fnInfrastructureSettings.js"></script>
		<script type = "text/javascript" src = "../../js/fnMarketSettings.js"></script>
		<script type = "text/javascript" src = "../../js/fnComputationSettings.js"></script>
		<script type = "text/javascript" src = "../../js/fnRemittanceSettings.js"></script>

		<script type = "text/javascript" src = "../../js/fnMarket.js"></script>
		<script type = "text/javascript" src = "../../js/fnTreasury.js"></script>

		<script type = "text/javascript" src = "../../js/fnChangePassword.js"></script>
		<script type = "text/javascript" src = "../../js/fnLogout.js"></script>
		
	</body>
</html>