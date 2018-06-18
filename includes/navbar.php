<div class = "ui fixed top menu" style = "background-color: #2e75a8;">
	<a data-content = "Click to toggle sidebar" id = "btnMMS" class = "item" style = "background-color: #25618c; color: #fff; font-weight: bold; font-stretch: condensed;">
		<div class = "header">
			<div class = "content" style = "font-size: 18px;">MARKET MANAGEMENT SYSTEM</div>
			<div class = "sub header" style = "font-size: 12px;">City Governement of San Fernando, La Union</div>
		</div>
	</a>

	<a class = "right item" onclick = "self.location = serverdir+'/views/admin';" style = "text-align: right; color: #fff;">
		<span class = "header">
			<div class = "content"><?php echo strtoupper($_SESSION["userfname"]); ?> <?php echo strtoupper($_SESSION["userlname"]); ?></div>
			<div class = "sub header"><?php echo ($_SESSION["userlevel"]); ?></div>
		</span>
	</a>
</div>