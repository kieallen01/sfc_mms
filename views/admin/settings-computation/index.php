<div id = "divAccountCodes" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditAccountCode" style = "width: 480px;">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit account code: <span id = "strAccountCodeToEdit" style = "font-style: italic;"></span></h5>

		<form id = "frmEditAccountCode" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditAccountCodeCode" name = "txthiddenEditAccountCodeCode" required>
			<div class = "field">
				<label>Code:</label>
				<input type = "text" id = "txtEditAccountCodeCode" name = "txtEditAccountCodeCode" data-mask = "000000" data-mask-reverse = "true" required>
			</div>

			<div class = "field">
				<label>Description</label>
				<input type = "text" id = "txtEditAccountCodeDesc" name = "txtEditAccountCodeDesc" required>
			</div>

			<button type = "submit" id = "btnEditAccountCode" name = "btnEditAccountCode" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add account code</h5>

					<form id = "frmAddAccountCode" class = "ui small form">
						<div class = "field">
							<label>Code:</label>
							<input type = "text" id = "txtAddAccountCodeCode" name = "txtAddAccountCodeCode" data-mask = "000000" data-mask-reverse = "true" required>
						</div>

						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddAccountCodeDesc" name = "txtAddAccountCodeDesc" required>
						</div>

						<button type = "submit" id = "btnAddAccountCode" name = "btnAddAccountCode" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfAccountCodes" class = "ui small text segment">
					<h5 class = "ui header">List of account codes</h5>

					<table id = "tblListOfAccountCodes" class = "ui small celled striped table" cellspacing = "0" width = "100%">
						<thead>
							<tr>
								<th>Code</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divTicketDenominations" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditTicketDenomination" style = "width: 480px;">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit ticket denomination: <span id = "strTicketDenominationToEdit" style = "font-style: italic;"></span></h5>

		<form id = "frmEditTicketDenomination" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditTicketDenominationID" name = "txthiddenEditTicketDenominationID" required>

			<div class = "field">
				<label>Description:</label>
				<input type = "text" id = "txtEditTicketDenominationDesc" name = "txtEditTicketDenominationDesc" required>
			</div>

			<div class = "field">
				<label>Value:</label>
				<input type = "number" id = "txtEditTicketDenominationValue" name = "txtEditTicketDenominationValue" required>
			</div>

			<button type = "submit" id = "btnEditTicketDenomination" name = "btnEditTicketDenomination" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add ticket denomination</h5>

					<form id = "frmAddTicketDenomination" class = "ui small form">
						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddTicketDenominationDesc" name = "txtAddTicketDenominationDesc" required>
						</div>

						<div class = "field">
							<label>Value:</label>
							<input type = "number" id = "txtAddTicketDenominationValue" name = "txtAddTicketDenominationValue" required>
						</div>

						<button type = "submit" id = "btnAddTicketDenomination" name = "btnAddTicketDenomination" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfTicketDenominations" class = "ui small text segment">
					<h5 class = "ui header">List of ticket denominations</h5>

					<table id="tblListOfTicketDenominations" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Description</th>
								<th>Value</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div id = "divRentalFees" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditRentalFee" style = "width: 480px;">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit rental fee: <span id = "strRentalFeeToEdit" style = "font-style: italic;"></span></h5>


		<form id = "frmEditRentalFee" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditRentalFeeID" name = "txthiddenEditRentalFeeID" required>

			<div class = "field">
				<label>Area:</label>
				<select id = "cmbEditRentalFeeAreaDesc" name = "cmbEditRentalFeeAreaDesc" class = "ui small fluid dropdown" required>

				</select>
			</div>

			<div class = "field">
				<label>Fee type:</label>
				<select id = "cmbEditRentalFeeType" name = "cmbEditRentalFeeType" class = "ui small fluid search dropdown" required>
					<option disabled selected>Select fee type</option>
					<option value = "Fixed">Fixed</option>
					<option value = "Dynamic">Dynamic</option>
				</select>
			</div>

			<div class = "field">
				<label>Amount:</label>
				<input type = "number" id = "nudEditRentalFeeFee" name = "nudEditRentalFeeFee" min = "0" step = "0.01" required>
			</div>

			<button type = "submit" id = "btnEditRentalFee" name = "btnEditRentalFee" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add rental fee</h5>
					<form id = "frmAddRentalFee" class = "ui small form">
						<div class = "field">
							<label>Area:</label>
							<select id = "cmbAddRentalFeeAreaDesc" name = "cmbAddRentalFeeAreaDesc" class = "ui small fluid search dropdown" required>

							</select>
						</div>

						<div class = "field">
							<label>Fee type:</label>
							<select id = "cmbAddRentalFeeType" name = "cmbAddRentalFeeType" class = "ui small fluid search dropdown" required>
								<option disabled selected>Select fee type</option>
								<option value = "Fixed">Fixed</option>
								<option value = "Dynamic">Dynamic</option>
							</select>
						</div>

						<div class = "field">
							<label>Value:</label>
							<input type = "number" id = "nudAddRentalFeeFee" name = "nudAddRentalFeeFee" min = "0" step = "0.01" required>
						</div>

						<button type = "submit" id = "btnAddRentalFee" name = "btnAddRentalFee" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfRentalFees" class = "ui small text segment">
					<h5 class = "ui header">List of rental fees</h5>

					<table id = "tblListOfRentalFees" class = "ui small celled striped table" cellspacing = "0" width = "100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Area description</th>
								<th>Fee type</th>
								<th>Fee</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divMaintenanceFees" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditMaintenanceFee" style = "width: 480px;">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit maintenance fee: <span id = "strMaintenanceFeeToEdit" style = "font-style: italic;"></span></h5>

		<form id = "frmEditMaintenanceFee" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditMaintenanceFeeID" required>

			<div class = "field">
				<label>Business type:</label>
				<select id = "cmbEditMaintenanceFeeBusinessTypeID" name = "cmbEditMaintenanceFeeBusinessTypeID" class = "ui small fluid search dropdown" required>

				</select>
			</div>

			<div class = "field">
				<label>Value:</label>
				<input type = "number" id = "nudEditMaintenanceFeeFee" name = "nudEditMaintenanceFeeFee" min = "0" step = "0.01" required>
			</div>

			<button type = "submit" id = "btnEditMaintenanceFee" name = "btnEditMaintenanceFee" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add maintenance fee</h5>

					<form id = "frmAddMaintenanceFee" class = "ui small form">
						<div class = "field">
							<label>Business type:</label>
							<select id = "cmbAddMaintenanceFeeBusinessTypeID" name = "cmbAddMaintenanceFeeBusinessTypeID" class = "ui small fluid search dropdown" required>

							</select>
						</div>

						<div class = "field">
							<label>Value:</label>
							<input type = "number" id = "nudAddMaintenanceFeeFee" name = "nudAddMaintenanceFeeFee" min = "0" step = "0.01" required>
						</div>

						<button type = "submit" id = "btnAddMaintenanceFee" name = "btnAddMaintenanceFee" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfMaintenanceFees" class = "ui small text segment">
					<h5 class = "ui header">List of maintenance fees</h5>

					<table id = "tblListOfMaintenanceFees" class = "ui small celled striped table" cellspacing = "0" width = "100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Business Type</th>
								<th>Fee (PHP)</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divOtherFees" class = "ui container" style = "padding-top: 6rem;">
	<div data-remodal-id="modalEditOtherFee" style = "width: 480px;">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit other fee: <span id = "strOtherFeeToEdit" style = "font-style: italic;"></span></h5>

		<form id = "frmEditOtherFee" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditOtherFeeID" name = "txthiddenEditOtherFeeID" required>

			<div class = "field">
				<label>Description:</label>
				<input type = "text" id = "txtEditOtherFeeDesc" name = "txtEditOtherFeeDesc" required>
			</div>

			<div class = "field">
				<label>Value:</label>
				<input type = "number" id = "nudEditOtherFeeValue" name = "nudEditOtherFeeValue" required>
			</div>

			<button type = "submit" id = "btnEditOtherFee" name = "btnEditOtheFee" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add other fees</h5>

					<form id = "frmAddOtherFee" class = "ui small form">
						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddOtherFeeDesc" name = "txtAddOtherFeeDesc" required>
						</div>

						<div class = "field">
							<label>Value:</label>
							<input type = "number" id = "nudAddOtherFeeValue" name = "nudAddOtherFeeValue" step = "0.01" min = "0" required>
						</div>

						<button type = "submit" id = "btnAddOtherFee" name = "btnAddOtherFee" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfOtherFees" class = "ui small text segment">
					<h5 class = "ui header">List of other fees</h5>

					<table id = "tblListOfOtherFees" class = "ui small fluid celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Description</th>
								<th>Value</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div> -->
<div id = "divServices" class = "ui container">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add service</h5>

					<form id = "frmAddService" class = "ui small equal width form">
						<div class = "fields">
							<div class = "field">
								<label>Type:</label>
								<select id = "cmbAddServiceType" name = "cmbAddServiceType" class = "ui small fluid search dropdown" required>
									<!-- <option value = "Rental">Rental</option> -->
									<option value = "Maintenance">Maintenance</option>
									<option value = "Other">Other</option>
								</select>
							</div>

							<div class = "field">
								<label>Fee type:</label>
								<select id = "cmbAddServiceFeeType" name = "cmbAddServiceFeeType" class = "ui small fluid search dropdown" required>
									<option value = "Dynamic">Dynamic</option>
									<option value = "Fixed">Fixed</option>
								</select>
							</div>
						</div>

						<div id = "divAddServiceToChange" class = "field">
							<!-- <label>Area:</label>
							<select id = "cmbAddServiceAreaID" name = "cmbAddServiceAreaID" class = "ui small fluid search dropdown" required>
								
							</select> -->
							<label>Description:</label>
							<input type = "text" id = "txtAddServiceDescription" name = "txtAddServiceDescription" required>
						</div>

						<div class = "field">
							<label>Value:</label>
							<input type = "number" id = "nudAddServiceValue" name = "nudAddServiceValue" min = "0" step = "0.01" disabled>
						</div>

						<button type = "submit" id = "btnAddService" name = "btnAddService" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">List of services</h5>

					<table id = "tblListOfServices" class = "ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Type</th>
								<th>Description</th>
								<th>Value</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divSurcharges" class = "ui container" style = "padding-top: 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add surcharge</h5>

					<form id = "frmAddSurcharge" class = "ui mini equal width form">
						<div class = "field">
							<label>Rate (%):</label>
							<input type = "number" id = "nudAddSurchargeRate" name = "nudAddSurchargeRate" min = "0" step = "0.01" required>
						</div>

						<div class = "ui divider"></div>

						<div class = "field">
							<label>January</label>
							<div class = "fields">
								<div class = "inline field">
									<label>From:</label>
									<input type = "date" id = "dtpAddSurchargeFromJanuary" name = "dtpAddSurchargeFromJanuary" required>
								</div>
								<div class = "inline field">
									<label>To:</label>
									<input type = "date" id = "dtpAddSurchargeToJanuary" name = "dtpAddSurchargeToJanuary" required>
								</div>
							</div>
						</div>
						<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
						<div class = "field">
							<label></label>
							<div class = "fields">
								<div class = "inline field">
									<label>From:</label>
									<input type = "date" id = "dtpAddSurchargeFrom" name = "dtpAddSurchargeFrom" required>
								</div>
								<div class = "inline field">
									<label>To:</label>
									<input type = "date" id = "dtpAddSurchargeTo" name = "dtpAddSurchargeTo" required>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">List of surcharges</h5>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divYearConfiguration" class = "ui container" style = "padding-top: 6rem;">
	<div data-remodal-id="modalEditYearConfiguration" style = "width: 360px;">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit year configuration: <span id = "strYearConfigurationToEdit" style = "font-style: italic;"></span></h5>

		<form id = "frmEditYearConfiguration" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditYearConfigurationYear" name = "txthiddenEditYearConfigurationYear" required>

			<div class = "field">
				<label>Year:</label>
				<input type = "text" id = "txtEditYearConfigurationYear" name = "txtEditYearConfigurationYear" readonly required>
			</div>

			<div class = "inline field">
				<div id = "chkEditYearConfigurationStatus" class = "ui toggle checkbox">
					<input type = "checkbox" name = "chkEditYearConfigurationStatus">
				</div>
			</div>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add year configuration</h5>

					<form id = "frmAddYearConfiguration" class = "ui small form">
						<div class = "field">
							<label>Migrate settings from:</label>
							<input type = "text" id = "txtAddYearConfigurationCurrent" name = "txtAddYearConfigurationCurrent" value = "<?php echo $_SESSION["yearconf"] ?>" readonly>
						</div>

						<div class = "field">
							<label>Year:</label>
							<input type = "text" id = "txtAddYearConfigurationYear" name = "txtAddYearConfigurationYear" data-mask = "9999" data-mask-reverse = "true" required>
						</div>

						<!-- <div class = "field">
							<label>Status:</label>
							<select id = "cmbAddYearConfigurationStatus" name = "cmbAddYearConfigurationStatus" class = "ui small fluid search dropdown" required>
								<option value = "Active" selected>Active</option>
								<option value = "Inactive">Inactive</option>
							</select>
						</div> -->

						<button type = "submit" id = "btnAddYearConfiguration" name = "btnAddYearConfiguration" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">List of year configurations</h5>

					<table id = "tblListOfYearConfigurations" class = "ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Year</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>