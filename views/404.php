<?php
	session_start();
	include ("../includes/connection.php");
	include ("../includes/header.php");
	include ("../includes/navbar.php");
?>
	<body>	
		<div class = "ui container" style = "padding-top: 6rem;">
			<div class = "ui stackable equal width grid">
				<div class = "row">
					<div class = "column">
						<div class="ui negative icon message">
							<i class="warning icon"></i>
							<div class="content">
								<div class="header">Error</div>
								<p>
									You are not allowed here. <a role = "button" onclick = "window.history.back();" style = "cursor: pointer;">Go back</a>, you must.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type = "text/javascript" src = "../packages/jquery/jquery-3.2.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script type = "text/javascript" src = "../packages/semantic-ui/dist/semantic.js"></script>
	</body>
</html>