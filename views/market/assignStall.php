<div id = "divAssignStall" class = "ui container" style = "padding-top: 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "six wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Assign stall/s</h5>

					<form id="frmAssignAStall" class = "ui small equal width form">
						<input id="txtHiddenApplicationId" name="txtHiddenApplicationId" type = "text" hidden readonly required>
						
						<div class = "field">
							<label>Name of owner:</label>
							<input id="txtAssignAStallOwner" type = "text" readonly required>
						</div>

						<div class = "field">
							<label>Address:</label>
							<textarea id="txtAssignAStallAddress" rows = "1" readonly required></textarea>
						</div>

						<div class = "field">
							<label>Business type:</label>
							<input id="txtAssignAStallBusinessType" type = "text" readonly required>
						</div>

						<!-- <div class = "field">
							<label>Business name:</label>
							<textarea id="txtAssignAStallBusinessName" rows = "1" disabled="" required></textarea>
						</div> -->
						<!-- CINOMMENT KO TO KUYA, BINALIK KO SA DATI NA STALLS NA LANG ANG ILOLOAD. ISEARCH NA LANG NUNG USER YUNG KUNG SAANG MF, BLDG, SECTION -->
						<!-- <div class="field">
							<div class="fields">
								<section class = "field">
									<label>Market facility:</label>
									<select id="cmbAssignAStallMarket" class = "ui small fluid search dropdown" required>
									
									</select>
								</section>
								
								<section class = "field">
									<label>Building</label>
									<select id="cmbAssignAStallBuilding" class = "ui small fluid search dropdown" required>
									
									</select>
								</section>
							</div>
						</div>

						<div class="field">
							<div class="fields">
								<section class = "field">
									<label>Section:</label>
									<select id="cmbAssignAStallSection" class = "ui small fluid search dropdown" required>
									
									</select>
								</section>

								<section class = "field">
									<label>Stall/s to assign:</label>
									<select class="ui small fluid search dropdown" id="cmbStallsToAssign" name="stalls[]" multiple="multiple" required>
														
									</select>
								</section>
							</div>
						</div> -->
						<div class = "field">
							<label>Stall/s to assign:</label>
							<select class="ui small fluid search dropdown" id="cmbStallsToAssign" name="stalls[]" multiple="multiple" required>
												
							</select>
						</div>

						<div class = "field">
							<label>Date of effectivity:</label>
							<input id="txtAssignAStallEffectivityDate" type = "date" value="<?php echo date('Y-m-d')?>" readonly required>
						</div>

						<div class = "field">
							<label>Note/s:</label>
							<textarea id = "txtAssignAStallNotes" name = "txtAssignAStallNotes" rows = "3"></textarea>
						</div>

						<button type = "submit" id = "btnAssignAStall" name = "btnAssignAStall" class = "ui small secondary button" disabled="">Submit</button>
						<button type = "reset" id = "btnAssignAStallReset" name = "btnAssignAStall" class = "ui small secondary button" disabled="">Reset</button>
					</form>
				</div>
			</div>
			
			<div class = "column">
				<div id = "divListOfUnassignedStall" class = "ui small text segment">
					<h5 class = "ui header">List of unassigned stall owners</h5>

					<table id="tblListOfUnassignedStall" class="ui small celled striped table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Address</th>
								<th>Business Type</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>