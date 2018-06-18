<div id = "divBusinessClassifications" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditBusinessClassifications">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit business classification: <span id = "strBCToUpdate" style = "font-style: italic;"></span></h5>
		<form id = "frmEditBusinessClassification" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditBusinessClassificationID" name = "txthiddenEditBusinessClassificationID" required>

			<div class = "field">
				<label>Description:</label>
				<input type = "text" id="txtEditBusinessClassificationDesc" name="txtEditBusinessClassificationDesc" required>
			</div>

			<div class = "field">
				<label>Investment range: <span id = "strEditBusinessClassificationValidateNotif" style = "color: red; text-align: center;"></span></label>
				<div class = "fields">
					<div class = "eight wide field">
						<label>From</label>
						<input type = "number" id="txtEditBusinessClassificationInvestmentFrom" name="txtEditBusinessClassificationInvestmentFrom" min="0" required>
					</div>

					<div class = "eight wide field">
						<label>To</label>
						<input type = "number" id="txtEditBusinessClassificationInvestmentTo" name="txtEditBusinessClassificationInvestmentTo" min="0" required>
					</div>
				</div>
			</div>

			<button type = "submit" id = "btnEditBusinessClassification" name = "btnEditBusinessClassification" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add business classification</h5>

					<form id = "frmAddBusinessClassification" class = "ui small form">
						<div class = "field">
							<label>Description:</label>
							<input type = "text" id="txtAddBusinessClassificationDesc" name="txtAddBusinessClassificationDesc" required>
						</div>

						<div class = "field">
							<label>Investment range: <span id = "strAddBusinessClassificationValidateNotif" style = "color: red; text-align: center;"></span></label>
							<div class = "fields">
								<div class = "eight wide field">
									<label>From</label>
									<input type = "number" id="txtAddBusinessClassificationInvestmentFrom" name="txtAddBusinessClassificationInvestmentFrom" value="0" min="0" required>
								</div>

								<div class = "eight wide field">
									<label>To</label>
									<input type = "number" id="txtAddBusinessClassificationInvestmentTo" name="txtAddBusinessClassificationInvestmentTo" value="0" min="0" required>
								</div>
							</div>
						</div>

						<button type = "submit" id = "btnAddBusinessClassification" name = "btnAddBusinessClassification" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfBusinessClassifications" class = "ui small text segment">
					<h5 class = "ui header">List of business classifications</h5>

					<table id="tblListOfBusinessClassifications" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Business Classification</th>
								<th>Range (PHP) (from-to)</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divBusinessType" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditBusinessTypes" style = "width: 480px;">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit business type: <span id = "strBTToUpdate" style = "font-style: italic;"></span></h5>

		<form id = "frmEditBusinessType" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditBusinessTypeID" name = "txthiddenEditBusinessTypeID" required>
			<div class = "field">
				<label>Description:</label>
				<input type = "text" id = "txtEditBusinessTypeDesc" name = "txtEditBusinessTypeDesc" required>
			</div>

			<button type = "submit" id = "btnEditBusinessType" name = "btnEditBusinessType" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add business type</h5>

					<form id = "frmAddBusinessType" class = "ui small form">
						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddBusinessTypeDesc" name = "txtAddBusinessTypeDesc" required>
						</div>

						<button type = "submit" id = "btnAddBusinessType" name = "btnAddBusinessType" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfBusinessTypes" class = "ui small text segment">
					<h5 class = "ui header">List of business types</h5>

					<table id="tblListOfBusinessTypes" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
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

<div id = "divGoodsCommodities" class = "ui container" style = "padding-top: 6rem;">
	<div data-remodal-id="modalEditGoodsCommodities">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h4>Update good/commodity: <span id = "strGCToUpdate" style = "font-style: italic;"></span></h4>

		<form id = "frmEditGoodsCommodities" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditGoodsCommoditiesID" name = "txthiddenEditGoodsCommoditiesID" required>

			<div class = "field">
				<label>Business type:</label>
				<select id = "cmbEditGoodsCommoditiesBusinessTypeID" name = "cmbEditGoodsCommoditiesBusinessTypeID" class = "ui small fluid search dropdown" required>
					<!-- <option disabled selected>Business Type</option> -->
				</select>
			</div>

			<div class = "field">
				<label>Description:</label>
				<input type = "text" id = "txtEditGoodsCommoditiesDesc" name = "txtEditGoodsCommoditiesDesc" required>
			</div>

			<button type = "submit" id = "btnEditGoodsCommodities" name = "btnEditGoodsCommodities" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add goods/commodities</h5>

					<form id = "frmAddGoodsCommodities" class = "ui small form">
						<div class = "field">
							<label>Business type:</label>
							<select id = "cmbAddGoodsCommoditiesBusinessTypeID" name = "cmbAddGoodsCommoditiesBusinessTypeID" class = "ui small fluid search dropdown" required>
								<!-- <option disabled selected>Business Type</option> -->
							</select>
						</div>

						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddGoodsCommoditiesDesc" name = "txtAddGoodsCommoditiesDesc" required>
						</div>

						<button type = "submit" id = "btnAddGoodsCommodities" name = "btnAddGoodsCommodities" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfGoodsCommodities" class = "ui small text segment">
					<h5 class = "ui header">List of goods commodities</h5>

					<table id="tblListOfGoodsCommodities" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Business Type</th>
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

<div id = "divOwnershipType" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditOwnershipTypes">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit ownership type: <span id = "strOTToUpdate" style = "font-style: italic;"></span></h5>
		<form id = "frmEditOwnershipType" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditOwnershipTypeID" name = "txthiddenEditOwnershipTypeID" required>

			<div class = "field">
				<label>Description:</label>
				<input type = "text" id = "txtEditOwnershipTypeDesc" name = "txtEditOwnershipTypeDesc" required>
			</div>

			<button type = "submit" id = "btnEditOwnershipType" name = "btnEditOwnershipType" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui text segment">
					<h5 class = "ui header">Add ownership type</h5>

					<form id = "frmAddOwnershipType" class = "ui small form">
						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddOwnershipTypeDesc" name = "txtAddOwnershipTypeDesc" required>
						</div>

						<button type = "submit" id = "btnAddOwnershipType" name = "btnAddOwnershipType" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfOwnershipTypes" class = "ui text segment">
					<h5 class = "ui header">List of ownership types</h5>

					<table id="tblListOfOwnershipTypes" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
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

<div id = "divSignatories" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditSignatories">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit signatory: <span id = "strSignatoryToUpdate" style = "font-style: italic;"></span></h5>
		<form id = "frmEditSignatory" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditSignatoryID" name = "txthiddenEditSignatoryID" required>

			<div class = "field">
				<label>Name of signatory:</label>
				<input type = "text" id = "txtEditSignatoryName" name = "txtEditSignatoryName" required>
			</div>

			<div class = "field">
				<label>Position</label>
				<input type = "text" id = "txtEditSignatoryPosition" name = "txtEditSignatoryPosition" required>
			</div>

			<button type = "submit" id = "btnEditSignatory" name = "btnEditSignatory" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add signatory</h5>

					<form id = "frmAddSignatory" class = "ui small form">
						<div class = "field">
							<label>Name of signatory:</label>
							<input type = "text" id = "txtAddSignatoryName" name = "txtAddSignatoryName" required>
						</div>

						<div class = "field">
							<label>Position:</label>
							<input type = "text" id = "txtAddSignatoryPosition" name = "txtAddSignatoryPosition" required>
						</div>

						<button type = "submit" id = "btnAddSignatory" name = "btnAddSignatory" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfSignatories" class = "ui small text segment">
					<h5 class = "ui header">List of signatories</h5>

					<table id="tblListOfSignatories" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Position</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>