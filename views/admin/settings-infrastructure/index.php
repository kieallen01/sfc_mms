<div id = "divMarketFacilities" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditMarketFacilities">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit market facility:</h5>
		<form id = "frmEditMarketFacility" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditMarketFacilityID" name = "txthiddenEditMarketFacilityID" required>
			<div class = "field">
				<label>Description:</label>
				<input type = "text" id = "txtEditMarketFacilityName" name = "txtEditMarketFacilityName" required>
			</div>

			<button type = "submit" id = "btnEditMarketFacility" name = "btnEditMarketFacility" class="ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add market facility</h5>

					<form id = "frmAddMarketFacility" class = "ui small form">
						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddMarketFacilityName" name = "txtAddMarketFacilityName" placeholder = "Description" required>
						</div>

						<button type = "submit" id = "btnAddMarketFacility" name = "btnAddMarketFacility" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfMarketFacilities" class = "ui small text segment">
					<h5 class = "ui header">List of market facilities</h5>

					<table id = "tblListOfMarketFacilities" class = "ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divBuildings" class = "ui container" style = "padding-top: 6rem;">
	<div data-remodal-id="modalEditBuildings">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit building:</h5>
		<form id = "frmEditBuilding" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditBuildingID" name = "txthiddenEditBuildingID" required>

			<!-- <div class = "field">
				<label>Market facility code:</label>
				<select id = "cmbEditBuildingMarketFacilityID" name = "cmbEditBuildingMarketFacilityID" class = "ui small fluid search dropdown" required>
					<option disabled selected>Market Facility ID</option>
				</select>
			</div> -->

			<div class = "field">
				<label>Building name:</label>
				<input type = "text" id = "txtEditBuildingName" name = "txtEditBuildingName" required>
			</div>

			<button type = "submit" id = "btnEditBuilding" name = "btnEditBuilding" class = "ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add building</h5>

					<form id = "frmAddBldg" class = "ui small form">
						<div class = "field">
							<label>Market facility:</label>
							<select id = "cmbAddBldgMarketFacilityID" name = "cmbAddBldgMarketFacilityID" class = "ui small fluid search dropdown" required>
								<!-- <option disabled selected>Market facility</option> -->
							</select>
						</div>

						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddBldgName" name = "txtAddBldgName" placeholder = "Building name" required autofocus>
						</div>

						<button type = "submit" id = "btnAddBldg" name = "btnAddBldg" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfBuildings" class = "ui small text segment">
					<h5 class = "ui header">List of EEM Buildings</h5>

					<table id = "tblListOfBuildings" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Building</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divSections" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditSections">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Update section:</h5>

		<form id = "frmEditSection" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditSectionID" name = "txthiddenEditSectionID" required>

			<div class = field>
				<label>Section name:</label>
				<input type = "text" id = "txtEditSectionName" name = "txtEditSectionName" required>
			</div>

			<button type = "submit" id = "btnEditSection" name = "btnEditSection" class="ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "six wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add section</h5>

					<form id = "frmAddSection" class = "ui small form">
						<div class = "field">
							<label>Building:</label>
							<select id = "cmbAddSectionBuildingID" name = "cmbAddSectionBuildingID" class = "ui small fluid search dropdown" required>
								<!-- <option disabled selected>Building name</option> -->
							</select>
						</div>

						<div class = "field">
							<label>Section name:</label>
							<input type = "text" id = "txtAddSectionName" name = "txtAddSectionName" required>
						</div>

						<button type = "submit" id = "btnAddSection" name = "btnAddSection" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "ten wide column">
				<div id = "divListOfSections" class = "ui small text segment">
					<h5 class = "ui header">List of sections</h5>

					<table id = "tblListOfSections" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Building</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divGates" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditGates">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit section:</h5>

		<form id = "frmEditGate" class = "ui small form">
			<input type = "hidden" id = "txthiddenEditGateID" name = "txthiddenEditGateID" required>

			<div class = "field">
				<label>Gate name:</label>
				<input type = "text" id = "txtEditGateName" name = "txtEditGateName" required>
			</div>

			<button type = "submit" id = "btnEditGate" name = "btnEditGate" class="ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add gate</h5>

					<form id = "frmAddGate" class = "ui small form">
						<div class = "field">
							<label>Section:</label>
							<div class = "field">
								<select id = "cmbAddGateSectionID" name = "cmbAddGateSectionID" class = "ui small fluid search dropdown" required>
									<!-- <option disabled selected>Section ID</option> -->
								</select>
							</div>
						</div>

						<div class = "field">
							<label>Gate name:</label>
							<p><input type = "text" id = "txtAddGateName" name = "txtAddGateName" required></p>
						</div>

						<button type = "submit" id = "btnAddGate" name = "btnAddGate" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfGates" class = "ui small text segment">
					<h5 class = "ui header">List of gates</h5>

					<table id="tblListOfGates" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Section</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divAreas" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditAreas">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Update stall area:</h5>

		<form id = "frmEditArea" class = "ui small equal width form">
			<input type = "hidden" id = "txthiddenEditAreaID" name = "txthiddenEditAreaID" required>
			<div class = "field">
				<label>Description:</label>
				<input type = "text" id = "txtEditAreaDesc" name = "txtEditAreaDesc" required>
			</div>

			<div class = "field">
				<div class = "fields">
					<div class = "field">
						<label>Size:</label>
						<input type = "number" min="0" step=".01" id = "txtEditAreaSize" name = "txtEditAreaSize" required>
					</div>

					<div class = "field">
						<label>Unit:</label>
						<select id = "cmbEditAreaUnit" name = "cmbEditAreaUnit" class = "ui small search fluid dropdown" required>
							<!-- <option disabled selected>Unit</option> -->
							<option value = "sq. m.">Square meters</option>
							<option value = "ha">Hectares</option>
						</select>
					</div>
				</div>
			</div>

			<button type = "submit" id = "btnEditArea" name = "btnEditArea" class="ui small secondary button">Submit</button>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "seven wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add stall area</h5>

					<form id = "frmAddArea" class = "ui small equal width form">
						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddAreaDesc" name = "txtAddAreaDesc" required>
						</div>

						<div class = "field">
							<div class = "fields">
								<div class = "field">
									<label>Size:</label>
									<input type="number" min="0" step=".01" id="txtAddAreaSize" name="txtAddAreaSize" required>
								</div>

								<div class = "field">
									<label>Unit:</label>
									<select id="cmbAddAreaUnit" name = "cmbAddAreaUnit" class = "ui small search fluid dropdown" required>
										<!-- <option disabled selected>Unit</option> -->
										<option value = "sq. m.">sq. m.</option>
										<option value = "ha">hectares</option>
									</select>
								</div>
							</div>
						</div>

						<button type = "submit" id = "btnAddArea" name = "btnAddArea" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "nine wide column">
				<div id = "divListOfAreas" class = "ui small text segment">
					<h5 class = "ui header">List of stall areas</h5>
					<table id="tblListOfAreas" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Description</th>
								<th>Area</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id = "divStalls" class = "ui container" style = "padding-top : 6rem;">
	<div data-remodal-id="modalEditStalls">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h5 class = "ui header">Edit stall:</h5>
		<form id = "frmEditStall" class = "ui form">
			<input type = "hidden" id = "txthiddenEditStallNumber" name = "txthiddenEditStallNumber" required>

			<div class = "field">
				<label>Area:</label>
				<input type = "text" id = "txtEditStallAreaSize" name = "txtEditStallAreaSize" class = "form-control form-control-sm" readonly>
			</div>

			<div class = "field">
				<label>Section:</label>
				<input type = "text" id = "txtEditStallSectionCode" name = "txtEditStallSectionCode" class = "form-control form-control-sm" readonly>
			</div>
		</form>
	</div>

	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "five wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add stall</h5>

					<form id = "frmAddStall" class = "ui small form">
						<div class = "field">
							<label>Market facility:</label>
							<select id = "cmbAddStallMarketFacilityID" name = "cmbAddStallMarketFacilityID" class = "ui small fluid search dropdown" required>

							</select>
						</div>

						<div class = "field">
							<label>Building:</label>
							<select id = "cmbAddStallBldgID" name = "cmbAddStallBldgID" class = "ui small fluid search dropdown" required>
								
							</select>
						</div>

						<div class = "field">
							<label>Section:</label>
							<select id = "cmbAddStallSectionID" name = "cmbAddStallSectionID" class = "ui small fluid search dropdown" required>
								
							</select>
						</div>

						<div class = "field">
							<label>Stall number:</label>
							<input type = "number" id = "txtAddStallStallNumber" name = "txtAddStallStallNumber" min = "0" required>
						</div>

						<div class = "field">
							<label>Area:</label>
							<select id = "cmbAddStallAreaID" name = "cmbAddStallAreaID" class = "ui small fluid search dropdown" required>

							</select>
						</div>

						<button type = "submit" id = "btnAddStall" name = "btnAddStall" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "eleven wide column">
				<div id = "divListOfStalls" class = "ui small text segment">
					<h5 class = "ui header">List of stalls</h5>

					<table id="tblListOfStalls" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Stall Number</th>
								<th>Section</th>
								<th>Area</th>
								<th>Lessee</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>