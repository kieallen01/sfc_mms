<div id = "divChangePassword" class = "ui container" style = "padding-top: 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "four wide column"></div>

			<div class = "eight wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Change password</h5>
					<form id = "frmChangePassword" class = "ui small form">
						<div class = "field">
							<label>Current password:</label>
							<input type = "password" id = "txtChangePasswordCurrentPassword" name = "txtChangePasswordCurrentPassword" required>
						</div>

						<div class = "field">
							<label>New password:</label>
							<input type = "password" id = "txtChangePasswordNewPassword" name = "txtChangePasswordNewPassword" required>
						</div>

						<div class = "field">
							<label>Confirm new password:</label>
							<input type = "password" id = "txtChangePasswordNewPasswordConfirm" name = "txtChangePasswordNewPasswordConfirm" required>
						</div>

						<button type = "submit" id = "btnChangePassword" name = "btnChangePassword" class = "ui small fluid secondary button">Change</button>
					</form>
				</div>
			</div>

			<div class = "four wide column"></div>
		</div>
	</div>
</div>