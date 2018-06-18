<?php
	session_start();
	include ("../../includes/connection.php");

	if (!($_SESSION["started"])) {
		// echo ('<script type = "text/javascript"> self.location = "'.$serverdir.'"; </script>');
		header("location: ".$serverdir);
	}
	else {
		if ($_SESSION["userlevelid"] != "1") {
			header ("location: ".$serverdir."/views/403.php");
		}
	}

	include ("../../includes/header.php");
?>
	<body style = "font-family : Arial; background-color : #f5f7f8; overflow-y: hidden;">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top text-white justify-content-between" style = "background-color: #2e75a8; padding : 0px 10px 0px 0px;">
			<a id = "btnMMS" class="navbar-brand text-left" href="../admin" style = "background-color : #25618c; padding-left: 5px; padding-right : 5px;">
				<div style = "font-family: Impact; font-size: 18px;">MARKET MANAGEMENT SYSTEM</div>
				<div style = "font-size : 12px;">City of San Fernando, La Union</div>
			</a>
			<div style = "text-align : right; font-size : 13px;">
				<div><?php echo strtoupper($_SESSION["adminfname"]); ?> <?php echo strtoupper($_SESSION["adminlname"]); ?></div>
				<div><?php echo ($_SESSION["userleveldesc"]); ?></div>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<nav id = "navAdmin" class="col-sm-3 col-md-2 d-none d-sm-block text-white sidebar" style = "background-color: #1a2126; overflow-y: auto;">
					<ul class="nav nav-pills flex-column">
						<li class="nav-item">
							<a id = "btnLogout" class="nav-link text-center" href="javascript:;" role="button" style = "color : #fff; font-size : 13px;">Logout <span><!-- <img id='load' src="loader.gif" width="15px" height="15px"> --></span></a>
						</li>
						<li class="nav-item">
							<div class = "text-center" style = "background-color: #13191b; font-size : 12px; padding : 5px; color : #adb9ca;">MAIN NAVIGATION</div>
						</li>
						<li class="nav-item">
							<a id = "btnDivAdminsMgmt" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">User Management</a>
						</li>
						<li class="nav-item">
                        	<a class="nav-link accordion-toggle toggle-switch" data-toggle="collapse" href="#market-submenu" aria-expanded="false" style = "color : #8497b0; font-size : 12px;">
	                            <span class="sidebar-title">Market Facility Settings</span>
	                        </a>
	                        <ul id="market-submenu" class="panel-collapse panel-switch collapse" role="menu" aria-expanded="false" style="list-style: none; height: 0px;">
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivMarketFacilities" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Market</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivBuildings" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Buildings</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivSections" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Sections</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivGates" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Gates</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivAreas" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Areas</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivStalls" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Stalls</a>
	                            </li>
	                        </ul>
	                    </li>

	                    <li class="nav-item">
                        	<a class="nav-link accordion-toggle toggle-switch" data-toggle="collapse" href="#eem-settings-submenu" aria-expanded="false" style = "color : #8497b0; font-size : 12px;">
	                            <span class="sidebar-title">EEM Settings</span>
	                        </a>
	                        <ul id="eem-settings-submenu" class="panel-collapse panel-switch collapse" role="menu" aria-expanded="false" style="list-style: none; height: 0px;">
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivBusinessClassifications" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Business Classification</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivBusinessType" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Business Type</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivGoodsCommodities" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Goods/Commodities</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivOwnershipType" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Ownership Type</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivSignatories" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Signatories</a>
	                            </li>
	                        </ul>
	                    </li>

	                    <li class="nav-item">
                        	<a class="nav-link accordion-toggle toggle-switch" data-toggle="collapse" href="#computation-settings-submenu" aria-expanded="false" style = "color : #8497b0; font-size : 12px;">
	                            <span class="sidebar-title">Computation Settings</span>
	                        </a>
	                        <ul id="computation-settings-submenu" class="panel-collapse panel-switch collapse" role="menu" aria-expanded="false" style="list-style: none; height: 0px;">
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivAccountCodes" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Account Codes</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivTicketDenominations" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Ticket Denomination</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivRentalFees" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Rental Fees</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivMaintenanceFees" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Maintenance Fees</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivOtherFees" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Other Fees</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivSurcharges" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Surcharges</a>
	                            </li>
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivYearConfiguration" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Year Configuration</a>
	                            </li>
	                        </ul>

						<!-- <li class="nav-item">
							<a id = "btnDivComputationSettings" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Computation Settings</a>
						</li> -->
						<li class="nav-item">
							<a id = "btnDivHistoryLog" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">History Log</a>
						</li>
						<li class="nav-item">
							<a id = "btnDivDBMgmt" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Database Management</a>
						</li>

						<li class="nav-item">
                        	<!-- <a class="nav-link accordion-toggle toggle-switch" data-toggle="collapse" href="#market-module-submenu" aria-expanded="false" style = "color : #8497b0; font-size : 12px;">
	                            <span class="sidebar-title">Market Module</span>
	                            <b class="caret"></b><i class = "fa fa-caret-down"></i>
	                        </a>
	                        <ul id="market-module-submenu" class="panel-collapse panel-switch collapse" role="menu" aria-expanded="false" style="list-style: none; height: 0px;">
	                            <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
	                            	<a id = "btnDivAddVendor" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Register vendor</a>
	                            </li>
	                        </ul> -->
	                        <a id = "btnMarketModule" class="nav-link" href="../market/" role="button" style = "color : #8497b0; font-size : 12px;">Market Module</a>
						</li>

						<li class="nav-item">
							<a id = "btnTreasuryModule" class="nav-link" href="../treasury/" role="button" style = "color : #8497b0; font-size : 12px;">Treasury Module</a>
						</li>
					</ul>
				</nav>

				<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
					<div id = "divAdminsMgmt" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditUsers">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update user: <span id = "strUserToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditAdmin">
								<input type = "hidden" id = "txthiddenEditAdminUsername" name = "txthiddenEditAdminUsername">
								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class="form-control-label" for="txtEditAdminUsername">Username:</label>
										<input type = "text" id = "txtEditAdminUsername" name = "txtEditAdminUsername" class = "form-control form-control-sm" required>
									</div>
									<!-- <div class = "form-group col-md-4">
										<label class="form-control-label" for="cmbEditAdminUserStatus">User status:</label>
										<select id = "cmbEditAdminUserStatus" name = "cmbEditAdminUserStatus" class = "form-control form-control-sm" required>
											<option value = "1">Active</option>
											<option value = "0">Deactivated</option>
										</select>
									</div> -->
								</div>
								<div class = "form-row">
									<div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditAdminFName">First name:</label>
										<input type = "text" id = "txtEditAdminFName" name = "txtEditAdminFName" class = "form-control form-control-sm" required>
									</div>
									<div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditAdminMName">Middle name:</label>
										<input type = "text" id = "txtEditAdminMName" name = "txtEditAdminMName" class = "form-control form-control-sm">
									</div>
									<div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditAdminLName">Last name:</label>
										<input type = "text" id = "txtEditAdminLName" name = "txtEditAdminLName" class = "form-control form-control-sm" required>
									</div>
								</div>
								<div class = "form-row">
									<div class = "form-group col-md-6">
										<label class="form-control-label" for="cmbEditAdminDeptID">Department:</label>
										<select id = "cmbEditAdminDeptID" name = "cmbEditAdminDeptID" class = "form-control form-control-sm" required>
										<!-- <option id = "optDeptPlaceholder" disabled selected></option> -->
										</select>
									</div>
									<div class = "form-group col-md-6">
										<label class="form-control-label" for="cmbEditAdminUserLevel">User level:</label>
										<select id = "cmbEditAdminUserLevel" name = "cmbEditAdminUserLevel" class = "form-control form-control-sm" required>
											
										</select>
									</div>
								</div>
								<!-- <button data-remodal-action="confirm" class="remodal-confirm">OK</button> -->
								<input type = "submit" id = "btnEditAdmin" name = "btnEditAdmin" class="btn btn-secondary">
								<!-- <input type="checkbox" checked data-toggle="toggle"> -->
							</form>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Create User Account</legend>

									<form id = "frmAddAdmin">
										<p><input type = "text" id = "txtAddAdminUsername" name = "txtAddAdminUsername" placeholder = "Username (16 characters)" maxlength = "16" class = "form-control form-control-sm" required></p>
										<p><input type = "password" id = "txtAddAdminPassword" name = "txtAddAdminPassword" placeholder = "Password" class = "form-control form-control-sm" required></p>
										<p><input type = "password" id = "txtAddAdminConfirmPassword" name = "txtAddAdminConfirmPassword" placeholder = "Confirm password" class = "form-control form-control-sm" required></p>
										<p><input type = "text" id = "txtAddAdminFName" name = "txtAddAdminFName" placeholder = "First name" class = "form-control form-control-sm" required></p>
										<p><input type = "text" id = "txtAddAdminMName" name = "txtAddAdminMName" placeholder = "Middle name" class = "form-control form-control-sm"></p>
										<p><input type = "text" id = "txtAddAdminLName" name = "txtAddAdminLName" placeholder = "Last name" class = "form-control form-control-sm" required></p>
										<p>Department:
											<select id = "cmbAddAdminDeptID" name = "cmbAddAdminDeptID" class = "form-control form-control-sm" required>
												<!-- <option disabled selected>Department</option> -->
											</select>
										</p>

										<p>User level:
											<select id = "cmbAddAdminUserLevel" name = "cmbAddAdminUserLevel" class = "form-control form-control-sm" required>
												<!-- <option disabled selected>User level</option> -->
											</select>
										</p>
										<p><input type = "submit" id = "btnAddAdmin" name = "btnAddAdmin" class = "btn btn-secondary" style = "width : 100%"></p>
									</form>
								</div>
							</div>

							<div class="col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of System Users</legend>

									<div id = "divListOfAdmins" style = "max-height: 480px; overflow-y: auto;">
										<table id = "tblListOfAdmins" class="display" cellspacing="0" width="100%">
											<thead>
											    <tr>
											        <th>Username</th>
											        <th>Full Name</th>
											        <th>User level</th>
											        <th>Action</th>
											    </tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id = "divMarketFacilities" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditMarketFacilities">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update market facility: <span id = "strMarketFacilityToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditMarketFacility">
								<input type = "hidden" id = "txthiddenEditMarketFacilityID" name = "txthiddenEditMarketFacilityID">
								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class="form-control-label" for="txtEditMarketFacilityCode">Code:</label>
										<input type = "text" id = "txtEditMarketFacilityCode" name = "txtEditMarketFacilityCode" class = "form-control form-control-sm" required>
									</div>
								</div>

								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class="form-control-label" for="txtEditMarketFacilityName">Name:</label>
										<input type = "text" id = "txtEditMarketFacilityName" name = "txtEditMarketFacilityName" class = "form-control form-control-sm" required>
									</div>
								</div>

								<input type = "submit" id = "btnEditMarketFacility" name = "btnEditMarketFacility" class="btn btn-secondary">
							</form>
						</div>

						<div class="row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Market Facility</legend>
									<form id = "frmAddMarketFacility">
										<p><input type = "text" id = "txtAddMarketFacilityCode" name = "txtAddMarketFacilityCode" placeholder = "Market Facility ID" class = "form-control form-control-sm" style = "text-transform: uppercase;" required autofocus></p>
										<p><input type = "text" id = "txtAddMarketFacilityName" name = "txtAddMarketFacilityName" placeholder = "Market Facility Name" class = "form-control form-control-sm" required></p>
										<p><input type = "submit" id = "btnAddMarketFacility" name = "btnAddMarketFacility" class = "btn btn-secondary"></p>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of Market Facilities</legend>
									<div id = "divListOfMarketFacilities" style = "overflow: auto;" style = "max-height: 480px; overflow-y: auto;">
										<table id = "tblListOfMarketFacilities" class = "display" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Code</th>
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

					<div id = "divBuildings" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditBuildings">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update building: <span id = "strBuildingToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditBuilding">
								<input type = "hidden" id = "txthiddenEditBuildingID" name = "txthiddenEditBuildingID">
								<div class = "form-row">
									<!-- <div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditBuildingMarketFacilityCode">Market Facility Code:</label>
										<input type = "text" id = "txtEditBuildingMarketFacilityCode" name = "txtEditBuildingMarketFacilityCode" class = "form-control form-control-sm" required>
									</div> -->

									<div class = "form-group col-md-6">
										<label class="form-control-label" for="txtEditBuildingMarketFacilityCode">Market Facility ID:</label>
										<select id = "cmbEditBuildingMarketFacilityID" name = "cmbEditBuildingMarketFacilityID" class = "form-control form-control-sm">
											<option disabled selected>Market Facility ID</option>
										</select>
										<input type = "text" id = "txtEditBuildingMarketFacilityCode" name = "txtEditBuildingMarketFacilityCode" class = "form-control form-control-sm" readonly>
									</div>

									<div class = "form-group col-md-6">
										<label class="form-control-label" for="txtEditBuildingBldgCode">Building Code:</label>
										<input type = "text" id = "txtEditBuildingBldgCode" name = "txtEditBuildingBldgCode" class = "form-control form-control-sm" required>
									</div>
								</div>

								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class="form-control-label" for="txtEditBuildingName">Name:</label>
										<input type = "text" id = "txtEditBuildingName" name = "txtEditBuildingName" class = "form-control form-control-sm" required>
									</div>
								</div>

								<input type = "submit" id = "btnEditBuilding" name = "btnEditBuilding" class="btn btn-secondary">
							</form>
						</div>

						<div class="row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Building</legend>

									<form id = "frmAddBldg">
										<p>
											<select id = "cmbAddBldgMarketFacilityID" name = "cmbAddBldgMarketFacilityID" class = "form-control form-control-sm" required>
												<!-- <option disabled selected>Market facility</option> -->
											</select>
										</p>
										<p><input type = "text" id = "txtAddBldgMarketFacilityID" name = "txtAddBldgMarketFacilityID" class = "form-control form-control-sm" placeholder="Facility ID" style = "display: inline; width: 40%;" readonly required><input type = "text" id = "txtAddBldgCode" name = "txtAddBldgCode" placeholder = "Building ID" class = "form-control form-control-sm" style = "display: inline; width : 60%; text-transform: uppercase;" required></p> <!-- display: inline; -->
										<p><input type = "text" id = "txtAddBldgName" name = "txtAddBldgName" placeholder = "Building name" class = "form-control form-control-sm" required autofocus></p>
										<p><input type = "submit" id = "btnAddBldg" name = "btnAddBldg" class = "btn btn-secondary" style = "width : 100%;"><!-- <input type = "reset" id = "btnAddBldgClearFields" name = "btnAddBldgClearFields" class = "btn btn-danger" style = "width : 100%;"> --></p>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of EEM Buildings</legend>

									<div id = "divListOfBuildings" style = "max-height: 480px; overflow-y: auto;">
										<table id = "tblListOfBuildings" class="display" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Code</th>
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

					<div id = "divSections" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditSections">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update section: <span id = "strSectionToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditSection">
								<input type = "hidden" id = "txthiddenEditSectionID" name = "txthiddenEditSectionID">
								<div class = "form-row">
									<div class = "form-group col-md-4">
										<label class="form-control-label" for="cmbEditSectionMarketFacilityID">Market Facility ID:</label>
										<select id = "cmbEditSectionMarketFacilityID" name = "cmbEditSectionMarketFacilityID" class = "form-control form-control-sm">
											<option disabled selected>Market Facility ID</option>
										</select>
									</div>

									<div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditSectionBldgCode">Building Code:</label>
										<select id = "cmbEditSectionBldgID" name = "cmbEditSectionBldgID" class = "form-control form-control-sm">
											<option disabled selected>Building ID</option>
										</select>
										<input type = "text" id = "txtEditSectionBldgCode" name = "txtEditSectionBldgCode" class = "form-control form-control-sm" readonly>
									</div>

									<div class = "form-group col-md-8">
										<label class="form-control-label" for="txtEditSectionCode">Section Code:</label>
										<input type = "text" id = "txtEditSectionCode" name = "txtEditSectionCode" class = "form-control form-control-sm" required>
									</div>
								</div>

								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class="form-control-label" for="txtEditSectionName">Name:</label>
										<input type = "text" id = "txtEditSectionName" name = "txtEditSectionName" class = "form-control form-control-sm" required>
									</div>
								</div>

								<input type = "submit" id = "btnEditSection" name = "btnEditSection" class="btn btn-secondary">
							</form>
						</div>

						<div class="row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Section</legend>

									<form id = "frmAddSection">
										<p>
											<select id = "cmbAddSectionBuildingID" name = "cmbAddSectionBuildingID" class = "form-control form-control-sm" required>
												<!-- <option disabled selected>Building name</option> -->
											</select>
										</p>
										<p>
											<!-- <input type = "text" id = "txtAddSectionMarketFacilityID" name = "txtAddSectionMarketFacilityID" placeholder = "MF" class = "form-control form-control-sm" style = "display: inline; width: 20%;" required readonly><input type = "text" id = "txtAddSectionBldgID" name = "txtAddSectionBldgID" placeholder = "BLDG" class = "form-control form-control-sm" style = "display: inline; width: 20%;" required readonly><input type = "text" id = "txtAddSectionID" name = "txtAddSectionID" placeholder = "Section ID" class = "form-control form-control-sm" style = "display: inline; width: 60%;"> -->
											<input type = "text" id = "txtAddSectionBldgID" name = "txtAddSectionBldgID" placeholder = "Bldg. ID" class = "form-control form-control-sm" style = "display: inline; width: 40%;" required readonly><input type = "text" id = "txtAddSectionCode" name = "txtAddSectionCode" placeholder = "Section ID" class = "form-control form-control-sm" style = "display: inline; width: 60%; text-transform: uppercase;" required>
										</p>
										<p><input type = "text" id = "txtAddSectionName" name = "txtAddSectionName" placeholder = "Section name" class = "form-control form-control-sm" required></p>
										<p><input type = "submit" id = "btnAddSection" name = "btnAddSection" class = "btn btn-secondary" style = "width : 100%;"><!-- <input type = "reset" id = "btnAddSectionClearFields" name = "btnAddSectionClearFields" class = "btn btn-danger" style = "width : 100%;"> --></p>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<div id = "divListOfSections" style = "max-height: 480px; overflow-y: auto;">
										<legend>List of Building Sections</legend>

										<table id = "tblListOfSections" class="display" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Code</th>
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

					<div id = "divGates" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditGates">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update section: <span id = "strGateToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditGate">
								<input type = "hidden" id = "txthiddenEditGateID" name = "txthiddenEditGateID">
								<div class = "form-row">
									<div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditGateSectionCode">Section ID:</label>
										<select id = "cmbEditGateSectionID" name = "cmbEditGateSectionID" class = "form-control form-control-sm">
											<option disabled selected>Section ID</option>
										</select>
										<input type = "text" id = "txtEditGateSectionCode" name = "txtEditGateSectionCode" class = "form-control form-control-sm" readonly>
									</div>

									<div class = "form-group col-md-8">
										<label class="form-control-label" for="txtEditGateCode">Gate ID:</label>
										<input type = "text" id = "txtEditGateCode" name = "txtEditGateCode" class = "form-control form-control-sm" required>
									</div>
								</div>

								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class="form-control-label" for="txtEditGateName">Name:</label>
										<input type = "text" id = "txtEditGateName" name = "txtEditGateName" class = "form-control form-control-sm" required>
									</div>
								</div>

								<input type = "submit" id = "btnEditGate" name = "btnEditGate" class="btn btn-secondary">
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Building Gate</legend>

									<form id = "frmAddGate">
										<p>
											<select id = "cmbAddGateSectionID" name = "cmbAddGateSectionID" class = "form-control form-control-sm">
												<!-- <option disabled selected>Section ID</option> -->
											</select>
										</p>
										<p><input type = "text" id = "txtAddGateSectionCode" name = "txtAddGateSectionCode" placeholder = "Section ID" class = "form-control form-control-sm" style = "display: inline; width: 60%;" required readonly><input type = "text" id = "txtAddGateCode" name = "txtAddGateCode" placeholder = "Gate ID" class = "form-control form-control-sm" style = "display: inline; width: 40%;" required></p>
										<p><input type = "text" id = "txtAddGateName" name = "txtAddGateName" placeholder="Gate name" class = "form-control form-control-sm" required></p>
										<p><input type = "submit" id = "btnAddGate" name = "btnAddGate" class = "btn btn-secondary" style = "width : 100%;"><!-- <input type = "reset" id = "btnAddGateClearFields" name = "btnAddGateClearFields" class = "btn btn-danger" style = "width : 100%;"> --></p>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of Building Gates</legend>

									<div id = "divListOfGates" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfGates" class="display" cellspacing="0" width="100%">
											<thead>
											    <tr>
											    	<th>#</th>
											        <th>Code</th>
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

					<div id = "divAreas" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditAreas">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update area: <span id = "strAreaToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditArea">
								<input type = "hidden" id = "txthiddenEditAreaID" name = "txthiddenEditAreaID">
								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class="form-control-label" for="txtEditAreaDesc">Area ID:</label>
										<input type = "text" id = "txtEditAreaDesc" name = "txtEditAreaDesc" class = "form-control form-control-sm" required>
									</div>
								</div>

								<div class = "form-row">
									<div class = "form-group col-md-6">
										<label class="form-control-label" for="txtEditAreaSize">Size:</label>
										<input type = "number" id = "txtEditAreaSize" name = "txtEditAreaSize" class = "form-control form-control-sm" required>
									</div>

									<div class = "form-group col-md-6">
										<label class="form-control-label" for="txtEditAreaDesc">Unit:</label>
										<select id = "cmbEditAreaUnit" name = "cmbEditAreaUnit" class = "form-control form-control-sm">
											<!-- <option disabled selected>Unit</option> -->
											<option value = "sq. m.">Square meters</option>
											<option value = "ha">Hectares</option>
										</select>
									</div>
								</div>

								<input type = "submit" id = "btnEditArea" name = "btnEditArea" class="btn btn-secondary">
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Stall Area</legend>

									<form id = "frmAddArea">
										<p><input type = "text" id = "txtAddAreaDesc" name = "txtAddAreaDesc" placeholder="Area name" class = "form-control form-control-sm" required></p>
										<p>
											<input type="number" min="0" id="txtAddAreaSize" name="txtAddAreaSize" placeholder="Area size" class="form-control form-control-sm" style="display: inline; width: 60%;" required><select id="cmbAddAreaUnit" name = "cmbAddAreaUnit" class = "form-control form-control-sm" style = "display: inline; width: 40%" required>
												<!-- <option disabled selected>Unit</option> -->
												<option value = "sq. m.">sq. m.</option>
												<option value = "ha">hectares</option>
											</select>
										</p>
										<p><input type = "submit" id = "btnAddArea" name = "btnAddArea" class = "btn btn-secondary" style = "width : 100%;"><!-- <input type = "reset" id = "btnAddAreaClearFields" name = "btnAddAreaClearFields" class = "btn btn-danger" style = "width : 100%;"> --></p>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of Stall Area</legend>

									<div id = "divListOfAreas" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfAreas" class="display" cellspacing="0" width="100%">
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

					<div id = "divStalls" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditStalls">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update stall: #<span id = "strStallToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditStall">
								<input type = "text" id = "txthiddenEditStallNumber" name = "txthiddenEditStallNumber">
								<div class = "form-row">
									<div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditStallAreaSize">Area ID:</label>
										<input type = "text" id = "txtEditStallAreaSize" name = "txtEditStallAreaSize" class = "form-control form-control-sm" readonly>
									</div>

									<div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditStallSectionCode">Section code:</label>
										<input type = "text" id = "txtEditStallSectionCode" name = "txtEditStallSectionCode" class = "form-control form-control-sm" readonly>
									</div>

									<div class = "form-group col-md-4">
										<label class="form-control-label" for="txtEditStallStallNumber">Stall number:</label>
										<input type = "text" id = "txtEditStallStallNumber" name = "txtEditStallStallNumber" class = "form-control form-control-sm" readonly>
									</div>

								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add New Stall</legend>

									<form id = "frmAddStall">
										<p>Stall number: <input type = "text" id = "txtAddStallNumber" name = "txtAddStallNumber" class = "form-control form-control-sm" required readonly></p>
										<p>
											<select id = "cmbAddStallSectionID" name = "cmbAddStallSectionID" class = "form-control form-control-sm">
												<!-- <option disabled selected>Section ID</option> -->
											</select>
										</p>
										<p>
											<select id = "cmbAddStallAreaID" name = "cmbAddStallAreaID" class = "form-control form-control-sm">
												<!-- <option disabled selected>Area description</option> -->
											</select>
										</p>
										<p><input type = "submit" id = "btnAddStall" name = "btnAddStall" class = "btn btn-secondary" style = "width : 100%;"><!-- <input type = "reset" id = "btnAddStallClearFields" name = "btnAddStallClearFields" class = "btn btn-danger" style = "width : 100%;"> --></p>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of Stalls</legend>
									<div id = "divListOfStalls" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfStalls" class="display" cellspacing="0" width="100%">
											<thead>
											    <tr>
											        <th>Stall Number</th>
											        <th>Section Code</th>
											        <th>Area Description</th>
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

					<div id = "divBusinessClassifications" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditBusinessClassifications">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update business classification: <span id = "strBCToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditBusinessClassification">
								<input type = "hidden" id = "txthiddenEditBusinessClassificationID" name = "txthiddenEditBusinessClassificationID">
								<div class = "form-group">
									<div class = "form-row">
										<div class="form-group col-md-12">
											<label class="form-control-label" for="txtEditBusinessClassificationDesc">Classification name:</label>
											<input type = "text" id="txtEditBusinessClassificationDesc" name="txtEditBusinessClassificationDesc" placeholder="Classification name" class = "form-control form-control-sm" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label class="form-control-label" for="txtEditBusinessClassificationInvestmentFrom">Investment range from:</label>
											<input type = "number" id="txtEditBusinessClassificationInvestmentFrom" name="txtEditBusinessClassificationInvestmentFrom" placeholder="From" min="0" class = "form-control form-control-sm" required>
										</div>

										<div class="form-group col-md-6">
											<label class="form-control-label" for="txtEditBusinessClassificationInvestmentTo">To:</label>
											<input type = "number" id="txtEditBusinessClassificationInvestmentTo" name="txtEditBusinessClassificationInvestmentTo" placeholder="To" min="0" class = "form-control form-control-sm" required>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<span id = "strEditBusinessClassificationValidateNotif" style = "color: red; text-align: center;"></span>
										</div>
									</div>

									<div class = "form-row">
										<div class="form-group col-md-12">
											<input type = "submit" id = "btnEditBusinessClassification" name = "btnEditBusinessClassification" class = "btn btn-secondary btn-sm" style = "width: 100%;">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Business Classification</legend>

									<form id = "frmAddBusinessClassification">
										<div class = "form-group">
											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class="form-control-label" for="txtAddBusinessClassificationDesc">Classification name:</label>
													<input type = "text" id="txtAddBusinessClassificationDesc" name="txtAddBusinessClassificationDesc" placeholder="Classification name" class = "form-control form-control-sm" required>
												</div>
											</div>

											<label class="form-control-label" for="txtAddBusinessClassificationInvestmentFrom">Capital investment range:</label>
											<div class = "form-row">
												<div class = "form-group col-md-6">
													<label class="form-control-label" for="txtAddBusinessClassificationInvestmentFrom">From:</label>
													<input type = "number" id="txtAddBusinessClassificationInvestmentFrom" name="txtAddBusinessClassificationInvestmentFrom" value="0" min="0" class = "form-control form-control-sm" required>
												</div>

												<div class = "form-group col-md-6">
													<label class="form-control-label" for="txtAddBusinessClassificationInvestmentTo">To:</label>
													<input type = "number" id="txtAddBusinessClassificationInvestmentTo" name="txtAddBusinessClassificationInvestmentTo" value="0" min="0" class = "form-control form-control-sm" required>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<span id = "strAddBusinessClassificationValidateNotif" style = "color: red; text-align: center;"></span>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<input type = "submit" id = "btnAddBusinessClassification" name = "btnAddBusinessClassification" class = "btn btn-secondary btn-sm" style = "width: 100%;">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of Business Classification</legend>
									<div id = "divListOfBusinessClassifications" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfBusinessClassifications" class="display" cellspacing="0" width="100%">
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

					<div id = "divBusinessType" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditBusinessTypes" style = "width: 480px;">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update business type: <span id = "strBTToUpdate" style = "font-style: italic;"></span></h4>

							<form id = "frmEditBusinessType">
								<input type = "hidden" id = "txthiddenEditBusinessTypeID" name = "txthiddenEditBusinessTypeID">
								<div class = "form-group">
									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for="txtEditBusinessTypeDesc">Description:</label>
											<input type = "text" id = "txtEditBusinessTypeDesc" name = "txtEditBusinessTypeDesc" placeholder = "Business type" class = "form-control form-control-sm" required>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<input type = "submit" id = "btnEditBusinessType" name = "btnEditBusinessType" class = "btn btn-secondary btn-sm" style = "width: 100%;">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Business Type</legend>

									<form id = "frmAddBusinessType">
										<div class = "form-group">
											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class = "form-control-label" for="txtAddBusinessTypeDesc">Description:</label>
													<input type = "text" id = "txtAddBusinessTypeDesc" name = "txtAddBusinessTypeDesc" placeholder = "Business type" class = "form-control form-control-sm" required>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<input type = "submit" id = "btnAddBusinessType" name = "btnAddBusinessType" class = "btn btn-secondary btn-sm" style = "width: 100%;">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of Business Types</legend>
									<div id = "divListOfBusinessTypes" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfBusinessTypes" class="display" cellspacing="0" width="100%">
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

					<div id = "divGoodsCommodities" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditGoodsCommodities">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update good/commodity: <span id = "strGCToUpdate" style = "font-style: italic;"></span></h4>

							<form id = "frmEditGoodsCommodities">
								<input type = "hidden" id = "txthiddenEditGoodsCommoditiesID" name = "txthiddenEditGoodsCommoditiesID">
								<div class = "form-group">
									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for="cmbEditGoodsCommoditiesBusinessTypeID">Business Type</label>
											<select id = "cmbEditGoodsCommoditiesBusinessTypeID" name = "cmbEditGoodsCommoditiesBusinessTypeID" class = "form-control form-control-sm" required>
												<!-- <option disabled selected>Business Type</option> -->
											</select>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for="txtEditGoodsCommoditiesDesc">Description</label>
											<input type = "text" id = "txtEditGoodsCommoditiesDesc" name = "txtEditGoodsCommoditiesDesc" placeholder = "Description" class = "form-control form-control-sm" required>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<input type = "submit" id = "btnEditGoodsCommodities" name = "btnEditGoodsCommodities" class = "btn btn-secondary btn-sm" style = "width: 100%;">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Goods/Commodities</legend>

									<form id = "frmAddGoodsCommodities">
										<div class = "form-group">
											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class = "form-control-label" for="cmbAddGoodsCommoditiesBusinessTypeID">Business Type</label>
													<select id = "cmbAddGoodsCommoditiesBusinessTypeID" name = "cmbAddGoodsCommoditiesBusinessTypeID" class = "form-control form-control-sm" required>
														<!-- <option disabled selected>Business Type</option> -->
													</select>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class = "form-control-label" for="txtAddGoodsCommoditiesDesc">Description</label>
													<input type = "text" id = "txtAddGoodsCommoditiesDesc" name = "txtAddGoodsCommoditiesDesc" placeholder = "Description" class = "form-control form-control-sm" required>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<input type = "submit" id = "btnAddGoodsCommodities" name = "btnAddGoodsCommodities" class = "btn btn-secondary btn-sm" style = "width: 100%;">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of Goods/Commodities</legend>
									<div id = "divListOfGoodsCommodities" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfGoodsCommodities" class="display" cellspacing="0" width="100%">
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

					<div id = "divOwnershipType" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditOwnershipTypes">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update ownership type: <span id = "strOTToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditOwnershipType">
								<input type = "hidden" id = "txthiddenEditOwnershipTypeID" name = "txthiddenEditOwnershipTypeID">
								<div class = "form-group">
									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for="txtEditOwnershipTypeDesc">Description</label>
											<input type = "text" id = "txtEditOwnershipTypeDesc" name = "txtEditOwnershipTypeDesc" placeholder = "Description" class = "form-control form-control-sm" required>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<input type = "submit" id = "btnEditOwnershipType" name = "btnEditOwnershipType" class = "btn btn-secondary btn-sm" style = "width: 100%">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Ownership Type</legend>

									<form id = "frmAddOwnershipType">
										<div class = "form-group">
											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class = "form-control-label" for="txtAddOwnershipTypeDesc">Description</label>
													<input type = "text" id = "txtAddOwnershipTypeDesc" name = "txtAddOwnershipTypeDesc" placeholder = "Description" class = "form-control form-control-sm" required>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<input type = "submit" id = "btnAddOwnershipType" name = "btnAddOwnershipType" class = "btn btn-secondary btn-sm" style = "width: 100%">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Lis of Ownership Types</legend>
									<div id = "divListOfOwnershipTypes" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfOwnershipTypes" class="display" cellspacing="0" width="100%">
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

					<div id = "divSignatories" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditSignatories">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Update signatory: <span id = "strSignatoryToUpdate" style = "font-style: italic;"></span></h4>
							<form id = "frmEditSignatory">
								<input type = "hidden" id = "txthiddenEditSignatoryID" name = "txthiddenEditSignatoryID">
								<div class = "form-group">
									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for="txtEditSignatoryName">Name of signatory:</label>
											<input type = "text" id = "txtEditSignatoryName" name = "txtEditSignatoryName" placeholder = "Description" class = "form-control form-control-sm" required>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for="txtEditSignatoryPosition">Position:</label>
											<input type = "text" id = "txtEditSignatoryPosition" name = "txtEditSignatoryPosition" placeholder = "Description" class = "form-control form-control-sm" required>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<input type = "submit" id = "btnEditSignatory" name = "btnEditSignatory" class = "btn btn-secondary btn-sm" style = "width: 100%">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add Signatory</legend>

									<form id = "frmAddSignatory">
										<div class = "form-group">
											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class = "form-control-label" for="txtAddSignatoryName">Name of signatory</label>
													<input type = "text" id = "txtAddSignatoryName" name = "txtAddSignatoryName" placeholder = "Name of signatory" class = "form-control form-control-sm" required>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class = "form-control-label" for="txtAddSignatoryPosition">Position</label>
													<input type = "text" id = "txtAddSignatoryPosition" name = "txtAddSignatoryPosition" placeholder = "Position" class = "form-control form-control-sm" required>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<input type = "submit" id = "btnAddSignatory" name = "btnAddSignatory" class = "btn btn-secondary" style = "width: 100%;">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of Signatories</legend>
									<div id = "divListOfSignatories" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfSignatories" class="display" cellspacing="0" width="100%">
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

					<div id = "divAccountCodes" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditAccountCode" style = "width: 480px;">
							<button data-remodal-action="close" class="remodal-close"></button>
							<legend>Edit account code: <span id = "strAccountCodeToEdit" style = "font-style: italic;"></span></legend>

							<form id = "frmEditAccountCode">
								<input type = "hidden" id = "txthiddenEditAccountCodeCode" name = "txthiddenEditAccountCodeCode" class = "form-control form-control-sm" placeholder = "Account code" data-mask = "000000" data-mask-reverse = "true" required>
								<div class = "form-group">
									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for = "">Code:</label>
											<input type = "text" id = "txtEditAccountCodeCode" name = "txtEditAccountCodeCode" class = "form-control form-control-sm" placeholder = "Account code" data-mask = "000000" data-mask-reverse = "true" required>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for = "">Description:</label>
											<input type = "text" id = "txtEditAccountCodeDesc" name = "txtEditAccountCodeDesc" class = "form-control form-control-sm" placeholder = "Description" required>
										</div>
									</div>

									<button type = "submit" id = "btnEditAccountCode" name = "btnEditAccountCode" class = "btn btn-secondary btn-sm" style = "width: 100%;">Submit</button>
								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-5">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add account code</legend>
									<form id = "frmAddAccountCode">
										<div class = "form-group">
											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class = "form-control-label" for = "">Code:</label>
													<input type = "text" id = "txtAddAccountCodeCode" name = "txtAddAccountCodeCode" class = "form-control form-control-sm" placeholder = "Account code" data-mask = "000000" data-mask-reverse = "true" required>
												</div>
											</div>

											<div class = "form-row">
												<div class = "form-group col-md-12">
													<label class = "form-control-label" for = "">Description:</label>
													<input type = "text" id = "txtAddAccountCodeDesc" name = "txtAddAccountCodeDesc" class = "form-control form-control-sm" placeholder = "Description" required>
												</div>
											</div>

											<button type = "submit" id = "btnAddAccountCode" name = "btnAddAccountCode" class = "btn btn-secondary btn-sm" style = "width: 100%;">Submit</button>
										</div>
									</form>
								</div>
							</div>

							<div class = "col-md-7">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of account codes</legend>
									<div id = "divListOfAccountCodes">
										<table id = "tblListOfAccountCodes" class = "display" cellspacing = "0" width = "100%">
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

					<div id = "divTicketDenominations" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditTicketDenomination" style = "width: 480px;">
							<button data-remodal-action="close" class="remodal-close"></button>
							<legend>Edit ticket denomination: <span id = "strTicketDenominationToEdit" style = "font-style: italic;"></span></legend>

							<form id = "frmEditTicketDenomination">
								<input type = "hidden" id = "txthiddenEditTicketDenominationID" name = "txthiddenEditTicketDenominationID">
								<div class = "form-group">
									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for = "txtEditTicketDenominationDesc">Description:</label>
											<input type = "text" id = "txtEditTicketDenominationDesc" name = "txtEditTicketDenominationDesc" placeholder = "Description" class = "form-control form-control-sm" required autofocus>
										</div>
									</div>

									<div class = "form-row">
										<div class = "form-group col-md-12">
											<label class = "form-control-label" for = "txtEditTicketDenominationValue">Value:</label>
											<input type = "number" id = "txtEditTicketDenominationValue" name = "txtEditTicketDenominationValue" placeholder = "Value" class = "form-control form-control-sm" required>
										</div>
									</div>

									<button type = "submit" id = "btnEditTicketDenomination" name = "btnEditTicketDenomination" style = "width : 100%;" class = "btn btn-secondary btn-sm">Submit</button>
								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-4">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add ticket denomination</legend>

									<form id = "frmAddTicketDenomination">
										<div class = "form-row">
											<div class = "form-group col-md-12">
												<label class = "form-control-label" for = "txtAddTicketDenominationDesc">Description:</label>
												<input type = "text" id = "txtAddTicketDenominationDesc" name = "txtAddTicketDenominationDesc" placeholder = "Denomination description" class = "form-control form-control-sm" required autofocus>
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-12">
												<label class = "form-control-label" for = "txtAddTicketDenominationValue">Value:</label>
												<input type = "number" id = "txtAddTicketDenominationValue" name = "txtAddTicketDenominationValue" placeholder = "Denomination value" class = "form-control form-control-sm" required>
											</div>
										</div>

										<button type = "submit" id = "btnAddTicketDenomination" name = "btnAddTicketDenomination" style = "width : 100%;" class = "btn btn-secondary btn-sm">Submit</button>
									</form>
								</div>
							</div>

							<div class = "col-md-8">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of ticket denominations</legend>

									<div id = "divListOfTicketDenominations">
										<table id="tblListOfTicketDenominations" class="display" cellspacing="0" width="100%">
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

					<div id = "divRentalFees" class = "container" style = "margin-top : 10px;">
						<div data-remodal-id="modalEditRentalFee" style = "width: 480px;">
							<button data-remodal-action="close" class="remodal-close"></button>
							<legend>Edit rental fee: <span id = "strRentalFeeToEdit" style = "font-style: italic;"></span></legend>


							<form id = "frmEditRentalFee">
								<input type = "hidden" id = "txthiddenEditRentalFeeID" name = "txthiddenEditRentalFeeID">
								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class = "form-control-label" for = "cmbEditRentalFeeAreaDesc">Area description:</label>
										<select id = "cmbEditRentalFeeAreaDesc" name = "cmbEditRentalFeeAreaDesc" class = "form-control form-control-sm" required>

										</select>
									</div>
								</div>

								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class = "form-control-label" for = "cmbEditRentalFeeType">Fee type:</label>
										<select id = "cmbEditRentalFeeType" name = "cmbEditRentalFeeType" class = "form-control form-control-sm" required>
											<option disabled selected>Select fee type</option>
											<option value = "Fixed">Fixed</option>
											<option value = "Dynamic">Dynamic</option>
										</select>
									</div>
								</div>

								<div class = "form-row">
									<div class = "form-group col-md-12">
										<label class = "form-control-label" for = "nudEditRentalFeeFee">Value:</label>
										<input type = "number" id = "nudEditRentalFeeFee" name = "nudEditRentalFeeFee" class = "form-control form-control-sm" min = "0" step = "0.01" required>
									</div>
								</div>

								<div class = "form-row">
									<div class = "form-group col-md-12">
										<button type = "submit" id = "btnEditRentalFee" name = "btnEditRentalFee" class = "btn btn-secondary btn-sm" style = "width: 100%">Submit</button>
									</div>
								</div>
							</form>
						</div>

						<div class = "row">
							<div class = "col-md-5">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add rental fee</legend>

									<form id = "frmAddRentalFee">
										<div class = "form-row">
											<div class = "form-group col-md-12">
												<label class = "form-control-label" for = "cmbAddRentalFeeAreaDesc">Area description:</label>
												<select id = "cmbAddRentalFeeAreaDesc" name = "cmbAddRentalFeeAreaDesc" class = "form-control form-control-sm" required>

												</select>
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-12">
												<label class = "form-control-label" for = "cmbAddRentalFeeType">Fee type:</label>
												<select id = "cmbAddRentalFeeType" name = "cmbAddRentalFeeType" class = "form-control form-control-sm" required>
													<option disabled selected>Select fee type</option>
													<option value = "Fixed">Fixed</option>
													<option value = "Dynamic">Dynamic</option>
												</select>
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-12">
												<label class = "form-control-label" for = "nudAddRentalFeeFee">Value:</label>
												<input type = "number" id = "nudAddRentalFeeFee" name = "nudAddRentalFeeFee" class = "form-control form-control-sm" min = "0" step = "0.01" required>
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-12">
												<button type = "submit" id = "btnAddRentalFee" name = "btnAddRentalFee" class = "btn btn-secondary btn-sm" style = "width: 100%">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class = "col-md-7">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of rental fees</legend>

									<table id = "tblListOfRentalFees" class = "display" cellspacing = "0" width = "100%">
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

					<div id = "divMaintenanceFees" class = "container" style = "margin-top : 10px;">
						<div class = "row">
							<div class = "col-md-5">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add maintenance fee</legend>

									<form id = "frmAddMaintenanceFee">
										<div class = "form-row">
											<div class = "form-group col-md-12">
												<label class = "form-control-label" for = "cmbAddMaintenanceFeeBusinessTypeID">Business type:</label>
												<select id = "cmbAddMaintenanceFeeBusinessTypeID" name = "cmbAddMaintenanceFeeBusinessTypeID" class = "form-control form-control-sm" required>

												</select>
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-12">
												<label class = "form-control-label" for = "nudAddMaintenanceFeeFee">Fee (PHP):</label>
												<input type = "number" id = "nudAddMaintenanceFeeFee" name = "nudAddMaintenanceFeeFee" min = "0" step = "0.01" class = "form-control form-control-sm" required>
											</div>
										</div>

										<button type = "submit" id = "btnAddMaintenanceFee" name = "btnAddMaintenanceFee" class = "btn btn-secondary btn-sm" style = "width: 100%;">Submit</button>
									</form>
								</div>
							</div>

							<div class = "col-md-7">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>List of maintenance fees</legend>

									<div id = "divListOfMaintenanceFees">
										<table id = "tblListOfMaintenanceFees" class = "display" cellspacing = "0" width = "100%">
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

					<div id = "divOtherFees" class = "container" style = "margin-top : 10px;">
						<div class = "row">
							<div class = "col-md-12">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Other Fees</legend>
								</div>
							</div>
						</div>
					</div>

					<div id = "divSurcharges" class = "container" style = "margin-top : 10px;">
						<div class = "row">
							<div class = "col-md-12">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Surcharges</legend>
								</div>
							</div>
						</div>
					</div>

					<div id = "divYearConfiguration" class = "container" style = "margin-top : 10px;">
						<div class = "row">
							<div class = "col-md-12">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Year Configuration</legend>
								</div>
							</div>
						</div>
					</div>

					<div id = "divHistoryLog" class = "container" style = "margin-top : 10px;">
						<div class = "row">
							<div class = "col-md-12">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>History log</legend>
									<div id = "divListOfHistoryLogs" style = "max-height: 480px; overflow-y: auto;">
										<table id = "tblHistoryLog" class = "display" cellspacing="0" width = "100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Action made</th>
													<th>Date</th>
													<th>User logged in</th>
													<th>User level</th>
													<th>Department</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id = "divDBMgmt" class = "container" style = "margin-top : 10px;">
						<div class = "row">
							<div class = "col-md-6">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Backup database</legend>
									<form id = "frmBackupDB" class = "form-group">
										<div class = "form-row">
											<div class = "form-group col-md-6">
												<label class="form-control-label" for="txtBackupDBFileDir">Save to directory:</label>
												<input type = "text" id = "txtBackupDBFileDir" name = "txtBackupDBFileDir" placeholder = "Database file directory" class = "form-control form-control-sm" required>
											</div>

											<div class = "form-group col-md-6">
												<label class="form-control-label" for="txtBackupDBFileName">SQL File name:</label>
												<input type = "text" id = "txtBackupDBFileName" name = "txtBackupDBFileName" placeholder = "Database file name" class = "form-control form-control-sm">
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-12">
												<input type = "submit" id = "btnBackupDB" name = "btnBackupDB" value = "Backup database" class = "btn btn-secondary" style = "width : 100%;">
											</div>
										</div>
										<small class="text-muted" style = "font-style : italic;">NOTE:<br>- Please use '/' instead of '\' for your file directory.<br>- Do not include the file extension .sql anymore for your file name.</small>

									</form>
								</div>
							</div>
						</div>
					</div>

				</main>
			</div>
		</div>

		<?php include ("../../includes/footer.php"); ?>
		<script type = "text/javascript" src = "../../js/toastr.conf.js"></script>

		<script type = "text/javascript" src = "../../js/serverdir.js"></script>
		<script type = "text/javascript" src = "../../js/historylog.js"></script>

		<script type = "text/javascript" src = "../../js/fnGetAddress.js"></script>

		<script type = "text/javascript" src = "../../js/fnAdminView.js"></script>
		<script type = "text/javascript" src = "../../js/fnAdmin.js"></script>
		<script type = "text/javascript" src = "../../js/fnInfrastructureSettings.js"></script>
		<script type = "text/javascript" src = "../../js/fnMarketSettings.js"></script>
		<script type = "text/javascript" src = "../../js/fnComputationSettings.js"></script>

		<script type = "text/javascript" src = "../../js/fnMarket.js"></script>
		<script type = "text/javascript" src = "../../js/fnTreasury.js"></script>

		<script type = "text/javascript" src = "../../js/fnLogout.js"></script>
	</body>
</html>