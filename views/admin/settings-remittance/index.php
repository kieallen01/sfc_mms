<div data-remodal-id="modalEditAF" style = "width: 480px;">
	<button data-remodal-action="close" class="remodal-close"></button>
	<h5 class = "ui header">Edit accountable form:</h5>

	<form id = "frmEditAF" class = "ui small equal width form">
		<input type = "hidden" id = "txthiddenEditAFID" name = "txthiddenEditAFID" required>

		<div class = "field">
			<label>Description:</label>
			<input type = "text" id = "txtEditAFDesc" name = "txtEditAFDesc" required>
		</div>

		<button type = "submit" id = "btnEditAF" name = "btnEditAF" class = "ui small secondary button">Submit</button>
	</form>
</div>

<div id = "divAddAF" class = "ui container">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "six wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Add accountable form</h5>

					<form id = "frmAddAF" class = "ui small equal width form">
						<div class = "field">
							<label>Description:</label>
							<input type = "text" id = "txtAddAFDesc" name = "txtAddAFDesc" required>
						</div>

						<button type = "submit" id = "btnAddAF" name = "btnAddAF" class = "ui small secondary button">Submit</button>
					</form>
				</div>
			</div>

			<div class = "ten wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">List of accountable forms</h5>

					<table id = "tblListOfAFs" class = "ui small celled striped table" cellspacing="0" width="100%">
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

<div id = "divAssignAFCashTicket" class = "ui container">
	<div class = "ui stackable equal width grid">
		<!-- <div class = "row">
			<div class = "six wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Assign accountable form/cash ticket to collector</h5>

					<div class = "ui small equal width form">
						<div class = "field">
							<label>Name of collector</label>
							<select id = "cmbAssignAFCashTicketCollectorName" name = "cmbAssignAFCashTicketCollectorName" class = "ui small fluid search dropdown" required>

							</select>
						</div>

						<div class = "field">
							<label>AF/Cash ticket to assign</label>
							<select id = "cmbAssignAFCashTicketToAssign" name = "cmbAssignAFCashTicketToAssign" class = "ui small fluid search dropdown" multiple required>

							</select>
						</div>

						
					</div>
				</div>
			</div>

			<div class = "column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Designate AF/cash ticket series</h5>

					<form id  = "frmAssignAFCashTicket" class = "ui small equal width form" target="_new">
						<div class = "field">
							<label>Collector:</label>
							<input type = "text" id = "txtAssignAFCashTicketCollectorUsername" name = "txtAssignAFCashTicketCollectorUsername" required>
							<input type = "text" id = "txtAssignAFCashTicketCollectorName" name = "txtAssignAFCashTicketCollectorName" required readonly>
						</div>

						<div class = "ui divider"></div>

						<div id = "divChosenToAssign">
							
						</div>

						<button type = "submit" id = "btnAssignAFCashTicket" name = "btnAssignAFCashTicket" class = "ui small primary button">Submit</button>
					</form>
				</div>
			</div>
		</div> -->
		<div class = "row">
			<div class = "column">
				<div class = "ui small clearing text segment">
					<h5 class = "ui header">Assign remittables</h5>

					<form id = "frmAssignRemittable" class = "ui small equal width form">
						<table id = "tblListOfRemittables" class = "ui table" cellspacing="100%" width="0">
							<thead>
								<tr>
									<th>#</th>
									<th>Collector</th>
									<th>Remittable</th>
									<th>Series from</th>
									<th>Series to</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>

							</tbody>

							<tfoot>
								<tr>
									<td>

									</td>

									<td>
										<select id = "cmbAssignAFCashTicketCollectorName" name = "cmbAssignAFCashTicketCollectorName" class = "ui small fluid search dropdown" required>

										</select>
									</td>

									<td>
										<select id = "cmbAssignAFCashTicketToAssign" name = "cmbAssignAFCashTicketToAssign" class = "ui small fluid search dropdown" required>

										</select>
									</td>

									<td>
										<input type = "number" id = "nudAFCashTicketToAssignSeriesFrom" name = "nudAFCashTicketToAssignSeriesFrom" min = "0">
									</td>

									<td>
										<input type = "number" id = "nudAFCashTicketToAssignSeriesTo" name = "nudAFCashTicketToAssignSeriesTo" min = "0">
									</td>

									<td>
										<button type = "button" id = "btnAFCashTicketToAssignAction" name = "btnAFCashTicketToAssignAction" class = "ui mini icon button">
											<i class = "plus icon"></i>
										</button>
									</td>
								</tr>
							</tfoot>
						</table>

						<div class = "four wide field">
							<label>Date assigned:</label>
							<input type = "date" id = "dtpAFCashTicketAssignDateAssigned" name = "dtpAFCashTicketAssignDateAssigned" value = "<?php echo (date("Y-m-d")); ?>" required>
						</div>

						<!-- <div id = "finish" class = "ui checkbox">
							<input type = "checkbox">
							<label>Finish assigning?</label>
						</div> -->
						<button type = "submit" id = "btnAssignAFCashTicket" name = "btnAssignAFCashTicket" class = "ui small right floated primary button">Submit</button>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>