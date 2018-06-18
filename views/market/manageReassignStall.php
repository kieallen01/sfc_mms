<div id = "divReAssignStall" class = "ui container" style = "padding-top: 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "column">
				<div class = "ui small text segment">
					<h5 class = "ui header">List of Assigned Stalls</h5>
					<table id="tblListOfStallsToReassign" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Owner</th>
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

		<div class = "row">
			<div class = "column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Previous User Info</h5>

					<div class = "ui small equal width form">
						<input id="txtHiddenApplicantId" name="txtHiddenApplicantId" type = "hidden" readonly>
						<div class="field">
							<label>Full Name:</label>
							<input id="txtStallReassignFullname" name="txtStallReassignFullname" type = "text" readonly="">
						</div>

						<div class="field">
							<label>Address:</label>
							<textarea id="txtStallReassignAddress" name="txtStallReassignAddress" rows= "1" type = "text" readonly=""></textarea>
						</div>

						<div class="field">
							<label>Area Info:</label>
							<input id="txtStallReassignAreaInfo" name="txtStallReassignAreaInfo" type = "text" readonly="">
						</div>

						<div class="field">
							<div class="fields">
								<div class="field">
									<label>Market Facility:</label>
									<input id="txtStallReassignMFacility" name="txtStallReassignMFacility"  type = "text" readonly="">
								</div>

								<div class="field">
									<label>Building:</label>
									<input id="txtStallReassignBuilding" name="txtStallReassignBuilding" type = "text" readonly="">
								</div>
							</div>
						</div>

						<div class="field">
							<div class="fields">
								<div class="field">
									<label>Section:</label>
									<input id="txtStallReassignSection" name="txtStallReassignSection" type = "text" readonly="">
								</div>

								<div class="field">
									<label>Stall Number:</label> 
									<input id="txtStallReassignStallNumber" name="txtStallReassignStallNumber" type = "text" readonly="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class = "column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Reassign Stall</h5>

					<form id="frmReassignStall" class = "ui small equal width form">
						<input id="txtHiddenStallNumberToReassign" name="txtHiddenStallNumberToReassign" type = "hidden" required readonly>
						<div class = "field">
							<label>New owner:</label>
							<select id="cmbStallReassignToOwner" name="cmbStallReassignToOwner" class = "ui small fluid search dropdown" placeholder required>
								<option disabled selected>Select Owner</option>
							</select>
						</div>
								
						<div class=field>
							<div class="ui grid">				
									<div class="field four wide column">
										<label>New Owner Id: </label>
										<input id="txtNewOwnerIdToReassign" name="txtNewOwnerIdToReassign" type = "text" required readonly>
									</div>

									<div class="field twelve wide column">
										<label>New Owner Address: </label>
										<input id="txtNewOwnerAddressToReassign" name="txtNewOwnerAddressToReassign" type = "text" required readonly>
									</div>
							</div>
						</div>

						<div class = "field">
							<label>Date of effectivity:</label>
							<input id="txtStallReassignToEffectivityDate" type = "date" value="<?php echo date('Y-m-d')?>">
						</div>

						<div class = "ui two small buttons">
							<button type="submit" class = "ui small secondary button" id="btnStallReassign" name="btnStallClosure">Submit</button> 	
							<button type="reset" class = "ui small button" id="btnResetStallReassign" name="btnResetStallClosure">Reset</button>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>