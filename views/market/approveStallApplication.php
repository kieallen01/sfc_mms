<div id = "divApproval" class = "ui container" style = "padding-top: 6rem;">
	<div class="remodal" data-remodal-id="modalApproveNewApplication">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Approve application: <span id = "strApplicationToApprove" style = "font-style: italic;"></span></h5>
		<form id="frmApproveNewApplication" class = "ui small equal width form">
			<input type = "hidden" id = "txthiddenApplicationId" name = "txthiddenApplicationId" required>

			<div class = "field">
				<label>Applicant name:</label>
				<input type = "text" id = "txtApproveApplicationName" name = "txtApproveApplicationName" class = "form-control form-control-sm"  readonly="">
			</div>

			<div class = "field">
				<div class = "fields">
					<div class = "field">
						<label>Business type:</label>
						<input type = "text" id = "txtApproveApplicationBusinessType" name = "txtApproveApplicationBusinessType" class = "form-control form-control-sm"  readonly="">
					</div>

					<div class = "field">
						<label>Capital:</label>
						<input type = "text" id = "txtApproveApplicationCapital" name = "txtApproveApplicationCapital" class = "form-control form-control-sm" readonly="">
					</div>
				</div>
			</div>

			<button type="submit" id="btnApproveApplication" name="btnApproveApplication" class="ui small fluid secondary button">Approve</button>
		</form>
	</div>


	<div class="remodal" data-remodal-id="modalViewNewApplication">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h4>Personal Information: <span id = "strViewApplicationToApprove" style = "font-style: italic;"></span></h4>
		<form class="ui small equal width form">
			<!-- <input type = "text" id="txtViewApplicationNo" name="txtViewHiddenApplicationNo"  readonly="">
			<div class="field">
				<label class="form-control-label">Photo:</label>
				<input id="txtViewNewApplicationPhoto" name="txtViewNewApplicationPhoto" type = "file" required>
			</div> -->
			<div class="ui divider"></div>

			<div class="field">
				<label class="form-control-label">Full Name:</label>
				<input id="txtViewNewApplicationFullName" name="txtViewNewApplicationFullName" readonly>
			</div>

			<div class="field">
				<label class="form-control-label">Province: </label>
				<input id="txtViewNewApplicationAddress" name="txtViewNewApplicationAddress" readonly>													
			</div>

			<div class="fields">
				<div class="field">		
					<label class="form-control-label">Date of Birth:</label>
					<input id="txtViewNewApplicationDOB" name="txtViewNewApplicationDOB" type="date" value="<?php echo date('Y-m-d');?>" class="ui small fluid search dropdown" readonly>
				</div>

				<div class="field">
					<label class="form-control-label">Citizenship:</label>
					<input id="txtViewNewApplicationCitizenship" name="txtViewNewApplicationCitizenship" type = "text" readonly>
				</div>

				<div class="field">
					<label class="form-control-label">Civil Status:</label>
					<input id="cmbViewNewApplicationCivilStatus" name="cmbViewNewApplicationCivilStatus" type = "text" readonly>
				</div>
			</div>

			<h4>Other Information: <span id = "strViewApplicationToApprove" style = "font-style: italic;"></span></h4>
			<div class="ui divider"></div>
			<div class="fields">
				<div class="field">
					<div class="field">
						<label>Spouse Fullname:</label>
						<input id="txtViewNewApplicationFullNameSpouse" name="txtViewNewApplicationFullNameSpouse" class="ui small fluid search dropdown" readonly>
					</div>
				</div>

				<div class="field">
					<div class="field">
						<label>Spouse Address:</label>
						<input id="txtViewNewApplicationAddressSpouse" name="txtViewNewApplicationAddressSpouse" type = "text" readonly>
					</div>
				</div>
			</div>

			<h4>Business Information: <span id = "strViewApplicationToApprove" style = "font-style: italic;"></span></h4>
			<div class="ui divider"></div>
			<div class="fields">
				<div class="field">
					<label>Business Type:</label>
					<input id="txtViewNewApplicationBusinessType" name="txtViewNewApplicationBusinessType" type = "text" readonly>					
				</div>	

				<div class="field">
					<label>Ownership Type:</label>
					<input id="txtViewNewApplicationOwnershipType" name="txtViewNewApplicationOwnershipType" type = "text" readonly>					
				</div>

				<div class="field">
					<label>Capital Investment(&#x20b1;) :</label>
					<input id="txtViewNewApplicationCapital" name="txtViewNewApplicationCapital" type="text" readonly>
				</div>
			</div>

			<div class="field">
				<label>Goods / Commodities:</label>
				<ul id="txtViewNewApplicationGoods" name="txtViewNewApplicationGoods">
				
				</ul>
			</div>
			
			<div class="fields">				
				<div class="field">
					<label>Employed:</label>
					<input id="txtViewNewApplicationEmployed" name="txtViewNewApplicationEmployed" type="text" readonly>
				</div>

				<div class="field">
				<label>Office/Firm:</label>
					<input id="txtViewNewApplicationOffice" name="txtViewNewApplicationOffice" type = "text" readonly>
				</div>
			</div>
			<div class="fields">
				<div class="field">
					<label>Other Businesses:</label>
					<input id="txtViewNewApplicationOtherBusinesses" name="txtViewNewApplicationOtherBusinesses" type = "text" readonly>
				</div>

				<div class="field">
				<label>Business Permit No:</label>
				<input id="txtViewNewApplicationBPermitNo" name="txtViewNewApplicationBPermitNo" type = "text" readonly>
				</div>
			</div>
			<div class="field">
				<label>Application Date: </label>
				<input id="txtViewNewApplicationDate" name="txtViewNewApplicationDate" type = "date" readonly>
			</div>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class= "row">
			<div class = "sixteen wide column">
				<div id = "divListOfPendingApplication" class = "ui small text segment">
					<h5 class = "ui header">List of pending applications</h5>

					<table id="tblListOfPendingApplication" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>