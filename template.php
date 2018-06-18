<?php
	session_start();
	include ("../../../../includes/connection.php");

	if (!($_SESSION["started"])) {
		header("location: ".$serverdir);
	}
	else {
		if ($_SESSION["adminuserlevel"] != "System Administrator") {
			header ("location: ".$serverdir."/views/403.php");
		}
	}

	include ("../../../../includes/header.php");
	include ("../../../../includes/sidebarAdmin.php");
?>
	<body>
		<div class = "dimmed pusher">
			<?php include ("../../../../includes/navbar.php"); ?>

			
		</div>

		<?php include ("../../../../includes/footer.php"); ?>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/toastr.conf.js"></script>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/accordion.init.js"></script>

		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/serverdir.js"></script>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/historylog.js"></script>

		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnGetAddress.js"></script>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnGetStallLocation.js"></script>

		<!-- <script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnAdminView.js"></script> -->
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnAdmin.js"></script>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnInfrastructureSettings.js"></script>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnMarketSettings.js"></script>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnComputationSettings.js"></script>

		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnMarket.js"></script>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnTreasury.js"></script>

		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnChangePassword.js"></script>
		<script type = "text/javascript" src = "<?php echo $serverdir ?>/js/fnLogout.js"></script>
		
	</body>
</html>