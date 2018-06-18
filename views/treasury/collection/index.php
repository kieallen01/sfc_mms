<div id = "divCollection" class = "ui container">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "column">
				<div class = "ui small text segment">
					<!-- <h5 class = "ui header">Collection</h5> -->

					<div class = "ui top attached center aligned tabular menu">
						<a id = "btnDivMarketCollection" class = "active item">Market Collections</a>
						<a id = "btnDivTreasuryCollection" class = "item">Treasury Collections</a>
					</div>

					<div class = "ui bottom attached active tab segment">
						<form id = "frmMarketCollection" class = "ui small equal width form">
							<div class = "ui stackable equal width grid">
								<div class = "row">
									<div class = "twelve wide column">
										<!-- <h5 class = "ui horizontal divider header">COLLECTOR DETAILS</h5> -->
										<div class = "fields">
											<div class = "seven wide field">
												<label>Collector:</label>
												<select id = "cmbMarketCollectionCollectors" name = "cmbMarketCollectionCollectors" class = "ui small search fluid dropdown" required>
													
												</select>
											</div>

											<div class = "field">
												<label>Assigned remittables:</label>
												<select id = "cmbMarketCollectionAssignedRemittables" name = "cmbMarketCollectionAssignedRemittables" class = "ui small search fluid dropdown" required>
													
												</select>
											</div>
										</div>

										<h5 class = "ui horizontal divider header">SERVICES</h5>
										<div class = "field">
											<table id = "tblListOfToCollects" class = "ui celled striped table" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>#</th>
														<th>Service</th>
														<th>Cost</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>

												</tbody>

												<tfoot>
													<tr>
														<td></td>

														<td>
															<select id = "cmbMarketCollectionServices" name = "cmbMarketCollectionServices" class = "ui small search fluid dropdown" required>

															</select>
														</td>

														<td>
															<input type = "number" id = "nudMarketCollectionCost" name = "nudMarketCollectionCost" min = "0" step = "0.01" readonly required>
														</td>

														<td>
															<button type = "button" id = "btnMarketCollectionAddToCollect" name = "btnMarketCollectionAddToCollect" class = "ui mini icon button">
																<i class = "plus icon"></i>
															</button>
														</td>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>

									<div class = "column">
										<h5 class = "ui horizontal divider header">OFFICIAL RECEIPT</h5>
										<div class = "field">
											<label>OR Number:</label>
											<input type = "text" id = "txtMarketCollectionORNumber" name = "txtMarketCollectionORNumber" required>
										</div>

										<div class = "field">
											<label>Amount due:</label>
											<input type = "number" id = "nudMarketCollectionAmountDue" name = "nudMarketCollectionAmountDue" min = "0" step = "0.01" readonly required>
										</div>

										<div class = "field">
											<div id = "market-hasCheck" class = "ui checkbox">
												<input type = "checkbox">
												<label>Pay via check</label>
											</div>
										</div>

										<section id = "market-payViaCheck" hidden>
											<div class = "field">
												<label>Bank name:</label>
												<input type = "text" id = "txtMarketCollectionBankName" name = "txtMarketCollectionBankName">
											</div>

											<div class = "field">
												<label>Check number:</label>
												<input type = "number" id = "txtMarketCollectionBankCheckNumber" name = "txtMarketCollectionBankCheckNumber" min = "0" step = "1">
											</div>

											<div class = "field">
												<label>Date:</label>
												<input type = "date" id = "txtMarketCollectionBankDate" name = "txtMarketCollectionBankDate">
											</div>

											<div class = "ui hidden divider"></div>
										</section>

										<div class = "field">
											<label>Amount paid:</label>
											<input type = "number" id = "nudMarketCollectionAmountPaid" name = "nudMarketCollectionAmountPaid" min = "0" step="0.01" required>
										</div>

										<div class = "field">
											<label>Change:</label>
											<input type = "number" id = "nudMarketCollectionAmountChange" name = "nudMarketCollectionAmountChange" min = "0" step="0.01" required>
										</div>
											

										<button type = "submit" id = "btnAddMarketCollection" name = "btnAddMarketCollection" class = "ui small right floated secondary button">Submit</button>
									</div>
								</div>
							</div>
						</form>

						<div id = "divTreasuryCollection">
							<h5 class = "ui header">Stall rental payment</h5>
							<form id = "frmTreasuryCollection" class = "ui small equal width form">
								<div class = "field">
									<label>Stall owner:</label>
									<select id = "cmbTreasuryCollectionStallOwner" name = "cmbTreasuryCollectionStallOwner" class = "ui small fluid search dropdown" required>

									</select>
								</div>

								<!-- <div class = "ui hidden divider"></div> -->

								<div class = "ui small fluid horizontal segments">
									<div class="ui segment">
										<div class = "field">
											<label>Name:</label>
											<input type = "text" id = "txtTreasuryCollectionStallOwnerName" readonly>
										</div>

										<div class = "field">
											<label>Address:</label>
											<input type = "text" id = "txtTreasuryCollectionStallOwnerAddress" readonly>
										</div>

										<div class = "field">
											<label>Stall/s owned:</label>
											<select id = "cmbTreasuryCollectionStallsOwned" name = "cmbTreasuryCollectionStallsOwned[]" class = "ui small fluid search dropdown" multiple required>
												
											</select>
										</div>
									</div>
									<div class="ui segment">
										<div class = "field">
											<label>OR number:</label>
											<input type = "text" id = "txtTreasuryCollectionStallOwnerPayment" name = "txtTreasuryCollectionStallOwnerPayment" readonly required>
										</div>

										<div class = "field">
											<div id = "treasury-hasCheck" class = "ui checkbox">
												<input type = "checkbox">
												<label>Pay via check</label>
											</div>
										</div>

										<section id = "treasury-payViaCheck" hidden>
											<div class = "field">
												<label>Bank name:</label>
												<input type = "text" id = "txtTreasuryCollectionBankName" name = "txtTreasuryCollectionBankName">
											</div>

											<div class = "field">
												<label>Check number:</label>
												<input type = "number" id = "txtTreasuryCollectionBankCheckNumber" name = "txtTreasuryCollectionBankCheckNumber" min = "0" step = "1">
											</div>

											<div class = "field">
												<label>Date:</label>
												<input type = "date" id = "txtTreasuryCollectionBankDate" name = "txtTreasuryCollectionBankDate">
											</div>
										</section>

										<div class = "field">
											<label>Amount due:</label>
											<input type = "number" id = "nudTreasuryCollectionStallAmountDue" name = "nudTreasuryCollectionStallAmountDue" value = "0" min = "0" step = "0.01" required readonly>
										</div>

										<div class = "fields">
											<div class = "field">
												<label>Amount paid:</label>
												<input type = "number" id = "nudTreasuryCollectionStallAmountPaid" name = "nudTreasuryCollectionStallAmountPaid" min = "0" step = "0.01" required>
											</div>

											<div class = "field">
												<label>Change:</label>
												<input type = "number" id = "nudTreasuryCollectionStallAmountChange" name = "nudTreasuryCollectionStallAmountChange" min = "0" step = "0.01" required readonly>
											</div>
										</div>

										<button type = "submit" id = "btnAddTreasuryCollectionStallPayment" name = "btnAddTreasuryCollectionStallPayment" class = "ui small right floated secondary button">Submit</button>
									</div>
								</div>

								<div class = "ui hidden divider"></div>

								<!-- <div class = "field">
									<table id = "tblListOfCollectibles" class = "ui celled striped form table" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Service/s</th>
												<th>Cost</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>

										</tbody>

										<tfoot>
											<td></td>
											<td>
												<select id = "cmbTreasuryCollectionFeeType" name = "cmbTreasuryCollectionFeeType" class = "ui small search dropdown" required>
													<option value = "Rental fee">Rental fee</option>
													<option value = "Maintenance fee">Maintenance fee</option>
													<option value = "Other fee">Other fee</option>
												</select>

												<select id = "cmbTreasuryCollectionServiceID" name = "cmbTreasuryCollectionServiceID" class = "ui small search dropdown" required>

												</select>
											</td>
											<td>
												<div class = "field">
													<input type = "number" id = "txtTreasuryCollectionCost" name = "txtTreasuryCollectionCost" required>
												<div class = "field">
											</td>
											<td>
												<button type = "button" id = "btnAddTreasuryCollection" name = "btnAddTreasuryCollection" class = "ui mini icon button">
													<i class = "plus icon"></i>
												</button>
											</td>
										</tfoot>
									</table>
								</div> -->
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
