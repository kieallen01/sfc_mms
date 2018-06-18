<div id = "divUsersMgmt" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditUsers">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "header">Edit user</h5>

		<form id = "frmEditUser" class = "ui small form">
			<div class = "ui small text">
				<input type = "hidden" id = "txthiddenEditUserUsername" name = "txthiddenEditUserUsername">
				<div class = "field">
					<label>Username:</label>
					<input type = "text" id = "txtEditUserUsername" name = "txtEditUserUsername" required>
				</div>

				<div class = "field">
					<div class = "fields">
						<div class = "six wide field">
							<label>First name:</label>
							<input type = "text" id = "txtEditUserFName" name = "txtEditUserFName" required>
						</div>

						<div class = "five wide field">
							<label>Middle name:</label>
							<input type = "text" id = "txtEditUserMName" name = "txtEditUserMName">
						</div>

						<div class = "five wide field">
							<label>Last name:</label>
							<input type = "text" id = "txtEditUserLName" name = "txtEditUserLName" required>
						</div>
					</div>
				</div>

				<div class = "field">
					<div class = "fields">
						<div class = "eight wide field">
							<label>Department:</label>
							<select id = "cmbEditUserDepartment" name = "cmbEditUserDepartment" class = "ui small fluid search dropdown" required>
								<option class = "default text">Select department</option>
								<option value = "City Administrator">City Administrator</option>
								<option value = "Market">Market</option>
								<option value = "City Treasury Office">City Treasury Office</option>
							</select>
						</div>

						<div class = "eight wide field">
							<label>User level:</label>
							<select id = "cmbEditUserLevel" name = "cmbEditUserLevel" class = "ui small fluid search dropdown" required>
								<option class = "default text">Select user level</option>
								<option value = "System Useristrator">System Administrator</option>
								<option value = "Market">Market</option>
								<option value = "Treasury">Treasury</option>
								<option value = "Collector">Collector</option>
								<option value = "Inspector">Inspector</option>
							</select>
						</div>
					</div>
				</div>

				<button type = "submit" id = "btnEditUser" name = "btnEditUser" class = "ui small secondary button">Submit</button>
			</div>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add new user</h5>

					<form id = "frmAddUser" class = "ui small form">
						<div class = "field">
							<label>Username:</label>
							<input type = "text" id = "txtAddUserUsername" name = "txtAddUserUsername" placeholder = "Username (16 characters)" maxlength = "16" autofocus required>
						</div>

						<div class = "field">
							<div class = "fields">
								<div class = "eight wide field">
									<label>Password:</label>
									<input type = "password" id = "txtAddUserPassword" name = "txtAddUserPassword" placeholder = "Password" required>
								</div>

								<div class = "eight wide field">
									<label>Confirm password:</label>
									<input type = "password" id = "txtAddUserConfirmPassword" name = "txtAddUserConfirmPassword" placeholder = "Confirm password" required>
								</div>
							</div>
						</div>

						<div class = "field">
							<label>First name:</label>
							<input type = "text" id = "txtAddUserFName" name = "txtAddUserFName" placeholder = "First name" required>
						</div>

						<div class = "field">
							<label>Middle name:</label>
							<input type = "text" id = "txtAddUserMName" name = "txtAddUserMName" placeholder = "Middle name">
						</div>

						<div class = "field">
							<label>Last name:</label>
							<input type = "text" id = "txtAddUserLName" name = "txtAddUserLName" placeholder = "Last name" required>
						</div>

						<div class = field>
							<div class = "fields">
								<div class = "eight wide field">
									<label>Department:</label>
									<select id = "cmbAddUserDepartment" name = "cmbAddUserDepartment" class = "ui small fluid search dropdown" required>
										<option class = "default text">Select department</option>
										<option value = "City Administrator">City Administrator</option>
										<option value = "Market">Market</option>
										<option value = "City Treasury Office">City Treasury Office</option>
									</select>
								</div>

								<div class = "eight wide field">
									<label>User level:</label>
									<select id = "cmbAddUserUserLevel" name = "cmbAddUserUserLevel" class = "ui small fluid search dropdown" required>
										<option class = "default text">Select user level</option>
										<!-- <option value = "System Administrator">System Administrator</option>
										<option value = "Market">Market</option>
										<option value = "Treasury">Treasury</option>
										<option value = "Collector">Collector</option>
										<option value = "Inspector">Inspector</option> -->
									</select>
								</div>
							</div>
						</div>

						<button type = "submit" id = "btnAddUser" name = "btnAddUser" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfUsers" class="ui small text segment">
					<h5 class = "ui header">List of system users</h5>
					<table id="tblListOfUsers" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Username</th>
								<th>Full Name</th>
								<th>User level</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>