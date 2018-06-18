<div id = "divStallClosure" class = "ui container" style = "padding-top: 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "six wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Stall Closure</h5>
					<form id="frmStallClosure" class = "ui small equal width form">
						<input id="txtHiddenApplicantId" name="txtHiddenApplicantId" type = "text" readonly>
						<div class="field">
							<label>Full Name:</label>
							<input id="txtStallClosureFullname" name="txtStallClosureFullname" type = "text" readonly="">
						</div>

						<div class="field">
							<label>Address:</label>
							<textarea id="txtStallClosureAddress" name="txtStallClosureAddress" rows= "1" type = "text" readonly=""></textarea>
						</div>

						<div class="field">
							<label>Area Info:</label>
							<input id="txtStallClosureAreaInfo" name="txtStallClosureAreaInfo" type = "text" readonly="">
						</div>

						<div class="field">
							<div class="fields">
								<div class="field">
									<label>Market Facility:</label>
									<input id="txtStallClosureMFacility" name="txtStallClosureMFacility" rows= "1" type = "text" readonly=""></input>
								</div>

								<div class="field">
									<label>Building:</label>
									<input id="txtStallClosureBuilding" name="txtStallClosureBuilding" rows= "1" type = "text" readonly=""></input>
								</div>
							</div>
						</div>

						<div class="field">
							<div class="fields">
								<div class="field">
									<label>Section</label>
									<input id="txtStallClosureSection" name="txtStallClosureSection" rows= "1" type = "text" readonly=""></input>
								</div>

								<div class="field">
									<label>Stall Number</label> 
									<input id="txtStallClosureNumber" name="txtStallClosureNumber" rows= "1" type = "text" readonly=""></input>
								</div>
							</div>
						</div>
					<div class="ui two small buttons">
						<button type="submit" class = "ui small secondary button" id="btnStallClosure" name="btnStallClosure" disabled="">Submit</button> 	
						<button type="reset" class = "ui small button" id="btnResetStallClosure" name="btnResetStallClosure" disabled="">Reset</button>
					</div>
					</form>
				</div>
			</div>
			
			<div class = "ten wide column">
				<div id = "divListOfUnassignedStall" class = "ui small text segment">
					<h5 class = "ui header">List of Stalls</h5>

					<table id="tblListOfStallsToClose" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Address</th>
								<th>Stall Information</th>
								<th>Stall # </th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>