<div id = "divAddVendor" class = "ui container" style = "padding-top : 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "sixteen wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add stall vendor</h5>

					<form id = "frmAddStallVendor" class = "ui small equal width form">
						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Given name:</label>
									<input type = "text" id = "txtAddVendorFName" name = "txtAddVendorFName" placeholder = "First name" required>
								</div>

								<div class = "field">
									<label>Middle name:</label>
									<input type = "text" id = "txtAddVendorMName" name = "txtAddVendorMName" placeholder = "Middle name">
								</div>

								<div class = "field">
									<label>Last name:</label>
									<input type = "text" id = "txtAddVendorLName" name = "txtAddVendorLName" placeholder = "Last name" required>
								</div>

								<div class = "field">
									<label>Taxpayer Identification Number (TIN):</label>
									<input type = "text" id = "txtAddVendorTIN" name = "txtAddVendorTIN" data-mask = "999-999-999" data-mask-reverse = "true" required>
								</div>
							</div>
						</div>

						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Date of birth:</label>
									<input type = "date" id = "dpAddVendorBirthdate" name = "dpAddVendorBirthdate" value="<?php echo date('Y-m-d')?>" required>
								</div>

								<div class = "field">
									<label>Age:</label>
									<input type = "text" id = "txtAddVendorAge" readonly>
								</div>

								<div class = "field">
									<label>Sex:</label>
									<select id = "cmbAddVendorSex" name = "cmbAddVendorSex" class = "ui small fluid search dropdown" required>
										<option value = "MALE">Male</option>
										<option value = "FEMALE">Female</option>
									</select>
								</div>

								<div class = "field">
									<label>Height (in meters):</label>
									<input type = "number" id = "nudAddVendorHeight" name = "nudAddVendorHeight" step = ".01" min = "0" required>
								</div>

								<div class = "field">
									<label>Weight (in kilograms):</label>
									<input type = "number" id = "nudAddVendorWeight" name = "nudAddVendorWeight" step = ".01" min = "0" required>
								</div>

								<div class = "field">
									<label>Blood type:</label>
									<select id = "cmbAddVendorBloodType" name = "cmbAddVendorBloodType" class = "ui small fluid search dropdown" required>
										<option value = "A">A</option>
										<option value = "A-">A-</option>
										<option value = "A+">A+</option>
										<option value = "B-">B-</option>
										<option value = "B+">B+</option>
										<option value = "AB">AB</option>
										<option value = "AB-">AB-</option>
										<option value = "AB+">AB+</option>
										<option value = "O">O</option>
									</select>
								</div>
							</div>
						</div>

						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Residential province:</label>
									<select id = "cmbAddVendorResidentialProvince" name = "cmbAddVendorResidentialProvince" class = "ui small fluid search dropdown" required>
													
									</select>
								</div>

								<div class = "field">
									<label>Residential city/municipality:</label>
									<select id = "cmbAddVendorResidentialCityMun" name = "cmbAddVendorResidentialCityMun" class = "ui small fluid search dropdown" required>
														
									</select>
								</div>

								<div class = "field">
									<label>Residential barangay:</label>
									<select id = "cmbAddVendorResidentialBrgy" name = "cmbAddVendorResidentialBrgy" class = "ui small fluid search dropdown" required>
														
									</select>
								</div>

							</div>
						</div>

						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Mobile number:</label>
									<input type = "text" id = "txtAddVendorMobileNumber" name = "txtAddVendorMobileNumber" placeholder = "e.g. +63-912-345-6789" required>
								</div>

								<div class = "field">
									<label>Telephone number:</label>
									<input type = "text" id = "txtAddVendorTelNo" name = "txtAddVendorTelNo" placeholder = "e.g. 123-4567">
								</div>

								<div class = "field">
									<label>Email address:</label>
									<input type = "email" id = "txtAddVendorEmailAddress" name = "txtAddVendorEmailAddress" placeholder = "e.g. testuser@testsite.com">
								</div>
							</div>
						</div>

						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Civil status:</label>
									<select id = "cmbAddVendorLegalStatus" name = "cmbAddVendorLegalStatus" class = "ui small fluid search dropdown" required>
										<option value = "Single">Single</option>
										<option value = "Married">Married</option>
										<option value = "Widowed">Widowed</option>
										<option value = "Legally separated">Legally separated</option>
									</select>
								</div>

								<div class = "field">
									<label>Spouse's given name:</label>
									<input type = "text" id = "txtAddVendorSpouseFName" name = "txtAddVendorSpouseFName">
								</div>

								<div class = "field">
									<label>Spouse's middle name:</label>
									<input type = "text" id = "txtAddVendorSpouseMName" name = "txtAddVendorSpouseMName">
								</div>

								<div class = "field">
									<label>Spouse's last name:</label>
									<input type = "text" id = "txtAddVendorSpouseLName" name = "txtAddVendorSpouseLName">
								</div>
							</div>
						</div>

						<button type = "submit" id = "btnAddVendor" name = "btnAddVendor" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divListOfVendors" class = "ui container" style = "padding-top: 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "six wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Assign stall vendor</h5>

					<form id = "frmAssignStallVendor" class = "ui small equal width form">
						<input type = "hidden" id = "txthiddenAssignStallVendorVendorID" name = "txthiddenAssignStallVendorVendorID" required>

						<!-- <div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Given name:</label>
									<input type = "text" id = "txtAssignStallVendorFName" name = "txtAssignStallVendorFName" required readonly>
								</div>

								<div class = "field">
									<label>Middle name:</label>
									<input type = "text" id = "txtAssignStallVendorMName" name = "txtAssignStallVendorMName" required readonly>
								</div>

								<div class = "field">
									<label>Last name:</label>
									<input type = "text" id = "txtAssignStallVendorLName" name = "txtAssignStallVendorLName" required readonly>
								</div>
							</div>
						</div> -->
						<div class = "field">
							<label>Given name:</label>
							<input type = "text" id = "txtAssignStallVendorFName" name = "txtAssignStallVendorFName" class = "readonly" required>
						</div>

						<div class = "field">
							<label>Middle name:</label>
							<input type = "text" id = "txtAssignStallVendorMName" name = "txtAssignStallVendorMName" class = "readonly" required>
						</div>

						<div class = "field">
							<label>Last name:</label>
							<input type = "text" id = "txtAssignStallVendorLName" name = "txtAssignStallVendorLName" class = "readonly" required>
						</div>

						<div class = "field">
							<label>Address:</label>
							<textarea id = "txtAssignStallVendorVendorAddress" name = "txtAssignStallVendorVendorAddress" rows = "1" class = "readonly" required></textarea>
						</div>

						<div class = "field">
							<label>Stalls:</label>
							<select id = "cmbAssignStallVendorStallNumber" name = "cmbAssignStallVendorStallNumber" class = "ui small search fluid dropdown" required>

							</select>
						</div>

						<div class = "ui two small buttons">
							<button type = "submit" id = "btnAssignStallVendor" name = "btnAssignStallVendor" class = "ui small secondary button">Submit</button>
							<button type = "reset" id = "btnAssignStallVendorResetFields" name = "btnAssignStallVendorResetFields" class = "ui small button">Reset</button>
						</div>
					</form>
				</div>
			</div>

			<div class = "ten wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">List of stall vendors</h5>

					<table id = "tblListOfStallVendors" class = "ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Address</th>
								<th>Stall assigned</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>