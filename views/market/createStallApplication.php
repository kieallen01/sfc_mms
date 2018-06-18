<div id="divCreateApplication" class="ui container" style = "padding-top : 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "sixteen wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add new stall application</h5>

					<form id="frmAddNewApplication" class = "ui small equal width form">
					<!-- <form action="../../process/addNewApplication.php" method="post" class = "ui small equal width form"> -->
						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Given name:</label>
									<input id="txtAddNewApplicationFName" name="txtAddNewApplicationFName" placeholder="Given name" required>
								</div>

								<div class = "field">
									<label>Middle name:</label>
									<input id="txtAddNewApplicationMName" name="txtAddNewApplicationMName" placeholder="Middle name" required>
								</div>

								<div class = "field">
									<label>Last name:</label>
									<input id="txtAddNewApplicationLName" name="txtAddNewApplicationLName" placeholder="Last name" required>													
								</div>

								<div class = "field">
									<label>Sex:</label>
									<select id = "cmbAddNewApplicationSex" name = "cmbAddNewApplicationSex" class = "ui small search fluid dropdown" required>
										<option value = "MALE" selected>Male</option>
										<option value = "FEMALE">Female</option>
									</select>
								</div>

								<div class = "field">
									<label>Photo:</label>
									<input id="txtAddNewApplicationPhoto" name="txtAddNewApplicationPhoto" type = "file" accept = "image/x-png, image/jpeg, image/bmp">
								</div>
							</div>
						</div>

						<div class = "field">
							<div class = "fields">
								<!-- <div class = "ui calendar field">
									<label>Date of Birth:</label>
									<div class="ui input">
										<input id="txtAddNewApplicationDOB" name="txtAddNewApplicationDOB" type="text" value="<?php echo date('F j, Y');?>" required>
									</div>
								</div> -->
								<div class = "field">
									<label>Citizenship</label>
									<input id="txtAddNewApplicationCitizenship" name="txtAddNewApplicationCitizenship" type = "text" required>
								</div>

								<div class = "field">
									<label>Date of birth:</label>
									<input id="txtAddNewApplicationDOB" name="txtAddNewApplicationDOB" type="date" value="<?php echo date('Y-m-d');?>" required>
								</div>

								<div class = "field">
									<label>Age:</label>
									<input type = "number" id = "txtAddNewApplicationAge" name = "txtAddNewApplicationAge" min = "0" readonly>
								</div>

								<div class = "field">
									<label>Province:</label>
									<select id="cmbAddNewApplicationProvince" name="cmbAddNewApplicationProvince" class = "ui small fluid search dropdown" required>
										<option value = "0" class = "default text">Select province</option>
									</select>
								</div>

								<div class = "field">
									<label>City/municipality:</label>
									<select id="cmbAddNewApplicationMunicipality" name="cmbAddNewApplicationMunicipality" class = "ui small fluid search dropdown" required>
										<option value = "0" class = "default text">Select city/municipality</option>
									</select>
								</div>

								<div class = "field">
									<label>Barangay:</label>
									<select id="cmbAddNewApplicationBrgys" name="cmbAddNewApplicationBrgys" class = "ui small fluid search dropdown" required>
										<option value = "0" class = "default text">Select barangay</option>
									</select>
								</div>
							</div>
						</div>

					
						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Civil status:</label>
									<select id="cmbAddNewApplicationCivilStatus" name="cmbAddNewApplicationCivilStatus" class = "ui small fluid search dropdown" required>
										<option value = "Single" selected>Single</option>
										<option value = "Married">Married</option>
										<option value = "Widowed">Widowed</option>
										<option value = "Legally separated">Legally separated</option>
									</select>
								</div>

								<div class = "field">
									<label>Spouse's first name:</label>
									<input id="txtAddNewApplicationFNameSpouse" name="txtAddNewApplicationFNameSpouse" disabled>
								</div>

								<div class = "field">
									<label>Spouse's middle name:</label>
									<input id="txtAddNewApplicationMNameSpouse" name="txtAddNewApplicationMNameSpouse" disabled>
								</div>

								<div class = "field">
									<label>Spouse's last name:</label>
									<input id="txtAddNewApplicationLNameSpouse" name="txtAddNewApplicationLNameSpouse" disabled>
								</div>
							</div>
						</div>

						<!-- FOR TESTING PURPOSES: DISABLE/ENABLE DROPDOWNS -->
						<!-- <div class = "field">
							<button type = "button" class = "ui small fluid basic red button" onclick = "
								$('span .ui.small.fluid.search.dropdown').toggleClass('disabled');
								$(this).toggleClass('basic');
							">Disable dropdowns</button>
						</div> -->

						<!-- <fieldset id="fldSpouseAddress" disabled> -->
						<div class = "field">
							<div class = "fields">
								<section class = "field">
									<label>Spouse's province:</label>
									<select id="cmbAddNewApplicationProvinceSpouse" name="cmbAddNewApplicationProvinceSpouse" class = "ui disabled small fluid search dropdown">
										<option value = "0" class = "default text">Select province</option>
									</select>
								</section>

								<section class = "field">
									<label>Spouse's city/municipality:</label>
									<select id="cmbAddNewApplicationMunicipalitySpouse" name="cmbAddNewApplicationMunicipalitySpouse" class = "ui disabled small fluid search dropdown">
										<option value = "0" class = "default text">Select city/municipality</option>
									</select>
								</section>

								<section class = "field">
									<label>Spouse's barangay:</label>
									<select id="cmbAddNewApplicationBrgySpouse" name="cmbAddNewApplicationBrgySpouse" class = "ui disabled small fluid search dropdown">
										<option value = "0" class = "default text">Select barangay</option>
									</select>
								</section>
							</div>
						</div>
						<!-- </fieldset> -->

						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Business type:</label>
									<select id="cmbAddNewApplicationBusinessType" name="cmbAddNewApplicationBusinessType" class = "ui small fluid search dropdown" required>
														
									</select>
								</div>

								<div class = "field">
									<label>Ownership type:</label>
									<select id="cmbAddNewApplicationOwnershipType" name="cmbAddNewApplicationOwnershipType" class = "ui small fluid search dropdown" required>
														
									</select>
								</div>

								<div class = "field">
									<label>Capital:</label>
									<input id="txtAddNewApplicationCapital" name="txtAddNewApplicationCapital" type="text" required>
								</div>
							</div>
						</div>

						<div class = "field">
							<label>Goods/commodities:</label>
							<select class="ui small fluid search dropdown" id="cmbAddNewApplicationGoods" name="goods[]" multiple required>

							</select>
						</div>

						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Employed?</label>
									<select id="cmbAddNewApplicationEmployed" name="cmbAddNewApplicationEmployed" class = "ui small fluid search dropdown" required>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</div>

								<div class = "field">
									<label>Name of office/firm</label>
									<input id="txtAddNewApplicationOffice" name="txtAddNewApplicationOffice" type = "text">
								</div>

								<div class = "field">
									<label>Other business:</label>
									<input id="txtAddNewApplicationOtherBusinesses" name="txtAddNewApplicationOtherBusinesses" type = "text" class = "form-control form-control-sm">
								</div>

								<div class = "field">
									<label>Business permit no.:</label>
									<input id="txtAddNewApplicationBPermitNo" name="txtAddNewApplicationBPermitNo" type = "text" class = "form-control form-control-sm" readonly>
								</div>
							</div>
						</div>

						<button type="submit" class="ui small right secondary button" id="btnAddNewApplication" name="btnAddNewApplication">Submit</button>
						<button type="reset" class="ui small right secondary button" id="btnResetAddNewApplication" name="btnResetAddNewApplication">Reset</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>