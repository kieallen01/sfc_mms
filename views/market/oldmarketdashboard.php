<?php
	session_start();
	include ("../../includes/connection.php");

	if (!($_SESSION["started"])) {
		// echo ('<script type = "text/javascript"> self.location = "'.$serverdir.'"; </script>');
		header("location: ".$serverdir);
	}
	else {
		if ($_SESSION["userlevelid"] == "3") {
			header ("location: ".$serverdir."/views/403.php");
		}
	}

	include ("../../includes/header.php");
	include ("../../includes/sidebarAdmin.php");
?>
	<body style = "font-family : Arial; background-color : #f5f7f8;">	
		<nav class="navbar navbar-expand-md navbar-dark fixed-top text-white justify-content-between" style = "background-color: #2e75a8; padding : 0px 10px 0px 0px;">
			<a id = "btnMMS" class="navbar-brand text-left" href="../market" style = "background-color : #25618c; padding-left: 5px; padding-right : 5px;">
				<div style = "font-family: Impact; font-size: 18px;">MARKET MANAGEMENT SYSTEM</div>
				<div style = "font-size : 12px;">City of San Fernando, La Union</div>
			</a>
			<div style = "text-align : right; font-size : 13px;">
				<div><?php echo strtoupper($_SESSION["adminfname"]); ?> <?php echo strtoupper($_SESSION["adminlname"]); ?></div>
				<div><?php echo ($_SESSION["userleveldesc"]); ?></div>
			</div>
		</nav>
		
		<div class="container-fluid"></div>
			<div class="row">
				<nav id = "navMarket" class="col-sm-3 col-md-2 d-none d-sm-block text-white sidebar" style = "background-color: #1a2126; overflow-y: auto;">
					<ul class="nav nav-pills flex-column">
						<li class="nav-item">
							<a id = "btnLogout" class="nav-link text-center" href="javascript:;" role="button" style = "color : #fff; font-size : 13px;">Logout </a>
						</li>
						<li class="nav-item">
							<div class = "text-center" style = "background-color: #13191b; font-size : 12px; padding : 5px; color : #adb9ca;">MAIN NAVIGATION</div>
						</li>

		                <!-- <li class="nav-item">
		                	<a class="nav-link accordion-toggle toggle-switch" data-toggle="collapse" href="#stall-mgmt-submenu" aria-expanded="false" style = "color : #8497b0; font-size : 12px;">
		                        <span class="sidebar-title">Stall management</span>
		                        <b class="caret"></b><i class = "fa fa-caret-down"></i>
		                    </a>
		                    <ul id="stall-mgmt-submenu" class="panel-collapse panel-switch collapse" role="menu" aria-expanded="false" style="list-style: none; height: 0px;">
		                    	
		                    </ul>
		                </li> -->

		                <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
							<a id = "btnDivCreateApplication" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Create Application</a>
						</li>
						<li class="nav-item" style = "color : #8497b0; font-size : 12px;">
							<a id = "btnDivApproval" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Approval</a>
						</li>
						<li class="nav-item" style = "color : #8497b0; font-size : 12px;">
							<a id = "btnDivAssignStall" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Assign Stall</a>
						</li>
						<li class="nav-item" style = "color : #8497b0; font-size : 12px;">
							<a id = "btnDivIssueStallAward" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Issue Stall Award</a>
						</li>
						<li class="nav-item" style = "color : #8497b0; font-size : 12px;">
							<a id = "btnDivStallClosure" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Stall Closure</a>
						</li>
						<li class="nav-item" style = "color : #8497b0; font-size : 12px;">
							<a id = "btnDivReAssignStall" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Reassign Stall</a>
						</li>
		                <li class="nav-item" style = "color : #8497b0; font-size : 12px;">
		                	<a id = "btnDivAddVendor" class="nav-link" href="javascript:;" role="button" style = "color : #8497b0; font-size : 12px;">Register vendor</a>
		                </li>
					</ul>
				</nav>

				<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
					<div id="divCreateApplication" class="container" style = "margin-top : 5px; max-height: 480px; overflow-y: auto;">
						<div class="row">
							<div class = "col-md-12">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>
										Add new application
										<!-- <div class="btn-group float-right" role="group" aria-label="Basic example">
											<button id="btnResident" type="button" class="btn btn-primary btn-sm" style="width: 100px;">Resident</button>
											<button id="btnNonResident" type="button" class="btn btn-secondary btn-sm" style="width: 100px;">Non-Resident</button>
										</div> -->
									</legend>
									<br>
									<form id="frmAddNewApplication">
										<div class="row">
											<div class="col-md-4">
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;">Full Name:</label>
													<input id="txtAddNewApplicationFName" name="txtAddNewApplicationFName" placeholder="First Name" class = "form-control form-control-sm" required>
												</div>
												
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"></label>
													<input id="txtAddNewApplicationMName" name="txtAddNewApplicationMName" placeholder="Middle Name" class = "form-control form-control-sm" required>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"></label>
													<input id="txtAddNewApplicationLName" name="txtAddNewApplicationLName" placeholder="Last Name" class = "form-control form-control-sm" required>													
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;padding-top: 5px;">Residence:</label>
													
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;padding-top: 5px;"></label>
													<select id="cmbAddNewApplicationMunicipality" name="cmbAddNewApplicationMunicipality" class = "form-control form-control-sm" required="required">
														<!-- <option value="13314">San Fernando</option> -->
													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;padding-top: 5px;"></label>
													<select id="cmbAddNewApplicationBrgys" name="cmbAddNewApplicationBrgys" class = "form-control form-control-sm" required="required">
														
													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">		
													<label class="form-control-label" style="width: 30%;">Date of Birth:</label>
													<input id="txtAddNewApplicationDOB" name="txtAddNewApplicationDOB" type="date" class = "form-control form-control-sm" value="<?php echo date('Y-m-d');?>" required>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;">Citizenship:</label>
													<input id="txtAddNewApplicationCitizenship" name="txtAddNewApplicationCitizenship" type = "text" class = "form-control form-control-sm" required>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;">Photo:</label>
													<input id="txtAddNewApplicationPhoto" name="txtAddNewApplicationPhoto" type = "file" accept = "image/x-png, image/jpeg, image/bmp" class = "form-control form-control-sm" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;">Civil Status:</label>
													<select id="cmbAddNewApplicationCivilStatus" name="cmbAddNewApplicationCivilStatus" class = "form-control form-control-sm" required>
														<option value = "Single">Single</option>
														<option value = "Married">Married</option>
														<option value = "Widowed">Widowed</option>
														<option value = "Legally separated">Legally separated</option>
													</select>	
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;padding-top: 5px;">Spouse:</label>
														<input id="txtAddNewApplicationFNameSpouse" name="txtAddNewApplicationFNameSpouse" placeholder="First Name" class = "form-control form-control-sm" disabled="">
												</div>
												<div class="input-group" style="padding-bottom: 5px;">	
													<label class="form-control-label" style="width: 30%;padding-top: 5px;"> </label>
														<input id="txtAddNewApplicationMNameSpouse" name="txtAddNewApplicationMNameSpouse" placeholder="Middle Name" class = "form-control form-control-sm" disabled="">
												</div>
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"> </label>
														<input id="txtAddNewApplicationLNameSpouse" name="txtAddNewApplicationLNameSpouse" placeholder="Last Name" class = "form-control form-control-sm" disabled="">													
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;">Address:</label>
													<select id="cmbAddNewApplicationProvinceSpouse" name="cmbAddNewApplicationProvinceSpouse" class = "form-control form-control-sm" disabled="" required>
														<!-- <option value = "0">La Union</option> -->
													</select>
												</div>
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"></label>
													<select id="cmbAddNewApplicationMunicipalitySpouse" name="cmbAddNewApplicationMunicipalitySpouse" class = "form-control form-control-sm" disabled="" required>
														<!-- <option value = "0">San  Fernando</option> -->
													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"></label>
													<select id="cmbAddNewApplicationBrgySpouse" name="cmbAddNewApplicationBrgySpouse" class = "form-control form-control-sm" disabled="" required>
														<!-- <option value = "0">Lingsat</option> -->
													</select>
												</div>

											</div>

											<div class="col-md-4">
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width:40%;">Business Type:</label>
													<select id="cmbAddNewApplicationBusinessType" name="cmbAddNewApplicationBusinessType" class = "form-control form-control-sm" required>
														
													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width:40%;">Goods/Commodities:</label>
													<select class="form-control small search dropdown" id="cmbAddNewApplicationGoods" name="goods[]" multiple="multiple" style="width: 60%; font-family: Arial; border-radius: 0px;">

													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width:40%;">Ownership Type:</label>
													<select id="cmbAddNewApplicationOwnershipType" name="cmbAddNewApplicationOwnershipType" class = "form-control form-control-sm" required>
														
													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width:40%;">Investment (&#x20b1;):</label>
													<input id="txtAddNewApplicationCapital" name="txtAddNewApplicationCapital" type="text" class = "form-control form-control-sm" placeholder="0" style="text-align: right;" required>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width:40%;">Employed:</label>
													<select id="cmbAddNewApplicationEmployed" name="cmbAddNewApplicationEmployed" class = "form-control form-control-sm" required>
														<option value="YES">Yes</option>
														<option value="NO">No</option>
													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width:40%;">Office/Firm:</label>
													<input id="txtAddNewApplicationOffice" name="txtAddNewApplicationOffice" type = "text" class = "form-control form-control-sm">
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width:40%;">Other Businesses:</label>
													<input id="txtAddNewApplicationOtherBusinesses" name="txtAddNewApplicationOtherBusinesses" type = "text" class = "form-control form-control-sm">
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width:40%;">Business Permit No:</label>
													<input id="txtAddNewApplicationBPermitNo" name="txtAddNewApplicationBPermitNo" type = "text" class = "form-control form-control-sm" readonly>
												</div>
											</div>	
										</div>

										<div class = "row">
											<div class = "col-md-4">

											</div>
											<div class = "col-md-4">

											</div>

											<div class = "col-md-4">
												<button type="submit" class="btn btn-secondary btn-sm" id="btnAddNewApplication" name="btnAddNewApplication" style = "width: 100%;">Submit</button>
											</div>

											<!-- <div class = "col-md-4">
												<button type="reset" class="btn btn-secondary btn-sm" id="btnResetAddNewApplication" name="btnResetAddNewApplication" style = "width: 100%;">Reset</button>
											</div> -->
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div id="divApproval" class="container">
						<div class = "jumbotron" style = "background-color: #fff; padding : 25px;">
							<legend>List of Pending Application</legend>
							<div id = "divListOfPendingApplication" style = "max-height: 480px; overflow-y: auto;">
								<table id="tblListOfPendingApplication" class="display" cellspacing="0" width="100%">
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

						<div class="remodal" data-remodal-id="modalApproveNewApplication">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Approve Application: <span id = "strApplicationToApprove" style = "font-style: italic;"></span></h4>
							<form id="frmApproveNewApplication">
								<input type = "hidden" id = "txthiddenApplicationId" name = "txthiddenApplicationId">
								<div class = "form-group">
									<label class="form-control-label">Name:</label>
									<input type = "text" id = "txtApproveApplicationName" name = "txtApproveApplicationName" class = "form-control form-control-sm"  readonly="">
								</div>
								<div class = "form-group">
									<label class="form-control-label">Business Type:</label>
									<input type = "text" id = "txtApproveApplicationBusinessType" name = "txtApproveApplicationBusinessType" class = "form-control form-control-sm"  readonly="">
								</div>
								<div class = "form-group">
									<label class="form-control-label">Capital Investment:</label>
									<input type = "text" id = "txtApproveApplicationCapital" name = "txtApproveApplicationCapital" class = "form-control form-control-sm" readonly="">
								</div>
								
								<button type="submit" id="btnApproveApplication" name="btnApproveApplication" class="btn btn-secondary">Approve</button>
							</form>
						</div>

						<!-- <div class="remodal" data-remodal-id="modalEditNewApplication">
							<button data-remodal-action="close" class="remodal-close"></button>
							<h4>Edit Application: <span id = "strEditApplicationToApprove" style = "font-style: italic;"></span></h4>
							<form id="frmEditNewApplication">
										<div class="row">
											<div class="col-md">
												<div class="input-group">
													<label class="form-control-label" style="width: 30%;padding-top: 5px;">Application No:</label>
													<input type = "text" id="txtEditNewApplicationNo" name="txtEditNewApplicationNo" class = "form-control form-control-sm" readonly="">
												</div><br>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;padding-top: 5px;">Full Name:</label>
													<input id="txtEditNewApplicationFName" name="txtEditNewApplicationFName" placeholder="First Name" class = "form-control form-control-sm" required>
												</div>
												
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"> </label>
													<input id="txtEditNewApplicationMName" name="txtEditNewApplicationMName" placeholder="Middle Name" class = "form-control form-control-sm" required>
												</div>

												<div class="input-group">
													<label class="form-control-label" style="width: 30%;"> </label>
													<input id="txtEditNewApplicationLName" name="txtEditNewApplicationLName" placeholder="Last Name" class = "form-control form-control-sm" required>													
												</div><br>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;">Residence:</label>
														<select id="cmbEditNewApplicationProvince" name="cmbEditNewApplicationProvince" class = "form-control form-control-sm" required>
														</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"></label>
													<select id="cmbEditNewApplicationMunicipality" name="cmbEditNewApplicationMunicipality" class = "form-control form-control-sm" required>
													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"></label>
													<select id="cmbEditNewApplicationBrgys" name="cmbEditNewApplicationBrgys" class = "form-control form-control-sm" required>
													</select>
												</div><br>

												<div class="input-group">		
													<label class="form-control-label" style="width: 30%;">Date of Birth:</label>
													<input id="txtEditNewApplicationDOB" name="txtEditNewApplicationDOB" type="date" class = "form-control form-control-sm" value="<?php echo date('Y-m-d');?>" required>
												</div><br>

												<div class="input-group">
													<label class="form-control-label" style="width: 30%;">Citizenship:</label>
													<input id="txtEditNewApplicationCitizenship" name="txtEditNewApplicationCitizenship" type = "text" class = "form-control form-control-sm" required>
												</div><br>

												<div class="input-group">
													<label class="form-control-label" style="width: 30%;">Photo:</label>
													<input id="txtEditNewApplicationPhoto" name="txtEditNewApplicationPhoto" type = "file" class = "form-control form-control-sm" required>
												</div><br>
											
												<div class="input-group">
													<label class="form-control-label" style="width: 30%;">Civil Status:</label>
													<select id="cmbEditNewApplicationCivilStatus" name="cmbEditNewApplicationCivilStatus" class = "form-control form-control-sm" required>
														<option value = "Single">Single</option>
														<option value = "Married">Married</option>
														<option value = "Widowed">Widowed</option>
														<option value = "Separated">Separated</option>
														<option value = "Divorced">Divorced</option>
													</select>	
												</div><br>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;">Spouse:</label>
														<input id="txtEditNewApplicationFNameSpouse" name="txtEditNewApplicationFNameSpouse" placeholder="First Name" class = "form-control form-control-sm" disabled="">
												</div>
												<div class="input-group" style="padding-bottom: 5px;">	
													<label class="form-control-label" style="width: 30%;"> </label>
														<input id="txtEditNewApplicationMNameSpouse" name="txtEditNewApplicationMNameSpouse" placeholder="Middle Name" class = "form-control form-control-sm" disabled="">
												</div>
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"> </label>
														<input id="txtEditNewApplicationLNameSpouse" name="txtEditNewApplicationLNameSpouse" placeholder="Last Name" class = "form-control form-control-sm" disabled="">													
												</div><br>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;">Address:</label>
													<select id="cmbEditNewApplicationProvinceSpouse" name="cmbEditNewApplicationProvinceSpouse" class = "form-control form-control-sm" disabled="" required>
														<option value = "0">La Union</option>
													</select>
												</div>
												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;padding-top: 5px;"></label>
													<select id="cmbEditNewApplicationMunicipalitySpouse" name="cmbEditNewApplicationMunicipalitySpouse" class = "form-control form-control-sm" disabled="" required>
														<option value = "0">San Fernando</option>
													</select>
												</div>

												<div class="input-group" style="padding-bottom: 5px;">
													<label class="form-control-label" style="width: 30%;"></label>
													<select id="cmbEditNewApplicationBrgySpouse" name="cmbEditNewApplicationBrgySpouse" class = "form-control form-control-sm" disabled="" required>
														<option value = "0">Lingsat</option>
													</select>
												</div>
											</div>

											<div class="col-md">
												<div class="input-group">
													<label class="form-control-label" style="width:40%;padding-top: 5px;">Business Type:</label>
														<select id="cmbEditNewApplicationBusinessType" name="cmbEditNewApplicationBusinessType" class = "form-control form-control-sm" required>
														</select>
												</div><br>	

												<div class="input-group">
													<label class="form-control-label" style="width:40%;padding-top: 5px;">Goods / Commodities:</label>
													<select class="js-example-basic-multiple" id="cmbEditNewApplicationGoods" name="goods[]" multiple="multiple" style="width: 60%;">
													</select>
												</div><br>

												<div class="input-group">
												<label class="form-control-label" style="width:40%;padding-top: 5px;">Ownership Type:</label>
													<select id="cmbEditNewApplicationOwnershipType" name="cmbEditNewApplicationOwnershipType" class = "form-control form-control-sm" required>
													</select>
												</div><br>

												<div class="input-group">
												<label class="form-control-label" style="width:40%;padding-top: 5px;">Capital Investment(&#x20b1;) :</label>
													<input id="txtEditNewApplicationCapital" name="txtEditNewApplicationCapital" type="text" class = "form-control form-control-sm" style="text-align: right;" required>
												</div><br>

												<div class="input-group">
												<label class="form-control-label" style="width:40%;padding-top: 5px;">Employed:</label>
													<select id="cmbEditNewApplicationEmployed" name="cmbEditNewApplicationEmployed" class = "form-control form-control-sm" required>
														<option value="1">Yes</option>
														<option value="0">No</option>
													</select>
												</div><br>

												<div class="input-group">
												<label class="form-control-label" style="width:40%;padding-top: 5px;">Office/Firm:</label>
													<input id="txtEditNewApplicationOffice" name="txtEditNewApplicationOffice" type = "text" class = "form-control form-control-sm" required>
												</div><br>

												<div class="input-group">
												<label class="form-control-label" style="width:40%;padding-top: 5px;">Other Businesses:</label>
													<input id="txtEditNewApplicationOtherBusinesses" name="txtEditNewApplicationOtherBusinesses" type = "text" class = "form-control form-control-sm">
												</div><br>

												<div class="input-group">
												<label class="form-control-label" style="width:40%;padding-top: 5px;">Business Permit No:</label>
													<input id="txtEditNewApplicationBPermitNo" name="txtEditNewApplicationBPermitNo" type = "text" class = "form-control form-control-sm" disabled="" required>
												</div><br>
											</div>

										</div><br>
								<center><button type="submit" id="btnApproveApplication" name="btnApproveApplication" class="btn btn-secondary" style="width: 100%;">Approve</button></center>
							</form>
						</div> -->
					</div>

					<div id="divAssignStall" class="container">
						<form id="frmAssignAStall">
							<div class="row">
								<div class="col-md-5">
									<div class = "jumbotron" style = "background-color: #fff; padding : 25px;">
										<legend>Assign a stall owner</legend>
											<input id="txtHiddenApplicationId" name="txtHiddenApplicationId" type = "text" class = "form-control form-control-sm" hidden readonly>
										<div class="input-group">
											<label class="form-control-label" style="width:30%;padding-top: 5px;">Owner:</label>
											<input id="txtAssignAStallOwner" type = "text" class = "form-control form-control-sm" readonly>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:30%;padding-top: 5px;">Address:</label>
											<textarea id="txtAssignAStallAddress" type = "text" class = "form-control form-control-sm" readonly></textarea>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:30%;padding-top: 5px;">Business Type:</label>
											<input id="txtAssignAStallBusinessType" type = "text" class = "form-control form-control-sm" readonly>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:30%;padding-top: 5px;">Business Name:</label>
											<textarea id="txtAssignAStallBusinessName" type = "text" class = "form-control form-control-sm" disabled="" required></textarea>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:30%;padding-top: 5px;">Effectivity Date:</label>
											<input id="txtAssignAStallEffectivityDate" type = "date" class = "form-control form-control-sm" value="<?php echo date('Y-m-d')?>" disabled required>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:30%;padding-top: 5px;">Stall/s to assign:</label>
											<select class="form-control small search dropdown" id="cmbStallsToAssign" name="stalls[]" multiple="multiple" style="width: 60%; font-family: Arial; border-radius: 0px;" required>
												
											</select>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Market:</label>
											<select id="cmbAssignAStallMarket" class = "form-control form-control-sm" disabled="" required>
												<option></option>
											</select>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Building:</label>
											<select id="cmbAssignAStallBuilding" class = "form-control form-control-sm" disabled="" required>
												<option></option>
											</select>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Section:</label>
											<select id="cmbAssignAStallSection" class = "form-control form-control-sm" disabled="" required>
												<option></option>
											</select>
										</div><br>

										<div class="input-group">
											<button type = "submit" id = "btnAssignAStall" name = "btnAssignAStall" class = "btn btn-secondary btn-sm" style = "width: 50%" disabled="">Submit</button>
											&nbsp;
											<button type = "reset" id = "btnAssignAStallReset" name = "btnAssignAStall" class = "btn btn-secondary btn-sm" style = "width: 50%" disabled="">Reset</button>
										</div>
									</div>
								</div>


								<div class="col-md-7">
									<div class = "jumbotron" style = "background-color: #fff; padding : 25px;">
										<legend>List of unassigned stall owners</legend>
										<div id = "divListOfUnassignedStall" style = "max-height: 480px; overflow-y: auto;">
											<table id="tblListOfUnassignedStall" class="display" cellspacing="0" width="100%">
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
						</form>
					</div>

					<div id="divIssueStallAward" class="container">
						<div class = "jumbotron" style = "background-color: #fff; padding : 25px;">
							<legend>Issue Stall Award</legend>
							<div id = "divListOfIssueStallAward" style = "max-height: 480px; overflow-y: auto;">
								<table id="tblListOfStallToBeAwarded" class="display" cellspacing="0" width="100%">
									<thead>
									    <tr>
									    	<th>ID</th>
									        <th>Name</th>
									        <th>Address</th>
									        <th>Business Type</th>
									        <th>Action</th>
									    </tr>
									</thead>

									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div id="divStallClosure" class="container">
						<div class="row">
							<div class="col-md-5">
								<div class = "jumbotron" style = "background-color: #fff; padding : 25px;">
									<legend>Stall Closure</legend>
									<form id="frmStallClosure">
										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Full Name:</label>
											<input id="txtStallClosureFullname" type = "text" class = "form-control form-control-sm" disabled="" required>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Address:</label>
											<textarea id="txtStallClosureAddress" type = "text" class = "form-control form-control-sm" disabled=""></textarea>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Business Type:</label>
											<input id="txtStallClosureBusinessType" type = "text" class = "form-control form-control-sm" disabled="" required>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Business Name:</label>
											<textarea id="txtStallClosureBusinessName" type = "text" class = "form-control form-control-sm" disabled="" required></textarea>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Status:</label>
											<select id="cmdStallClosureStatus" class = "form-control form-control-sm" disabled="">
												<option></option>
											</select>
										</div><br>
										<button type="submit" class="btn btn-secondary" id="btnStallClosure" name="btnStallClosure" style="width: 49%;"><i class="fa fa-paper-plane"></i> Submit</button> 	
										<button type="reset" class="btn btn-secondary" id="btnResetStallClosure" name="btnResetStallClosure" style="width: 49%;"><i class="fa fa-refresh"></i> Reset</button> 
									</form>
								</div>
							</div>

							<div class="col-md-7">
								<div class = "jumbotron" style = "background-color: #fff; padding : 25px;">
									<legend>List of Stalls</legend>
									<div id = "divListOfStall" style = "max-height: 480px; overflow-y: auto;">
										<table id="tblListOfStalls" class="display" cellspacing="0" width="100%">
											<thead>
											    <tr>
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

					<div id="divReAssignStall" class="container">
						<div class = "jumbotron" style = "background-color: #fff; padding : 25px;padding-bottom: 0px;">
							<form id="frmStallClosure">
								<div class="row">
									<div class="col">
										<legend>Previous User Info</legend>
										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Owner</label>
											<input id="txtStallClosureFullname" type = "text" class = "form-control form-control-sm" disabled="" required>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Address:</label>
											<textarea id="txtStallClosureAddress" type = "text" class = "form-control form-control-sm" disabled=""></textarea>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Business Type:</label>
											<input id="txtStallClosureBusinessType" type = "text" class = "form-control form-control-sm" disabled="" required>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Market:</label>
											<input id="txtStallClosureBusinessType" type = "text" class = "form-control form-control-sm" disabled="" required>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Section:</label>
											<input id="txtStallClosureBusinessType" type = "text" class = "form-control form-control-sm" disabled="" required>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Stall Number</label>
											<input id="txtStallClosureBusinessType" type = "text" class = "form-control form-control-sm" disabled="" required>
										</div><br>
									</div>

									<div class="col">
										<legend>Reassign Stall</legend>
										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Owner:</label>
											<select class = "form-control form-control-sm">
												<option></option>
											</select>												
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Address:</label>
											<textarea id="txtStallClosureAddress" type = "text" class = "form-control form-control-sm" disabled=""></textarea>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Business Name:</label>
											<textarea id="txtStallClosureAddress" type = "text" class = "form-control form-control-sm" ></textarea>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Effectivity Date:</label>
											<input id="txtStallClosureFullname" type = "date" class = "form-control form-control-sm" required>
										</div><br>

										<div class="input-group">
											<label class="form-control-label" style="width:40%;padding-top: 5px;">Relationship to Previous Owner:</label>
											<input id="txtStallClosureFullname" type = "text" class = "form-control form-control-sm">
										</div><br>
									</div>
								</div>
								<center>
									<button type="submit" class="btn btn-secondary" id="btnStallClosure" name="btnStallClosure" style="width: 20%;"><i class="fa fa-check"></i> Save</button> 	
								</center>
								<hr>
							</form>
						</div>

						<div class = "jumbotron" style = "background-color: #fff; padding : 25px;padding-top: 0px;">
							<legend>List of Stalls</legend>
							<div id = "divListOfStall" style = "max-height: 480px; overflow-y: auto;">
								<table id="tblListOfStalls" class="display" cellspacing="0" width="100%">
									<thead>
									    <tr>
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

					<div id = "divAddVendor" class = "container" style = "margin-top : 10px;">
						<div class = "row">
							<div class = "col-md-12">
								<div class = "jumbotron" style = "background-color: #fff; padding : 10px;">
									<legend>Add vendor</legend>
									<form id = "frmAddStallVendor" class = "form-group">
										<div class = "form-row">
											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "txtAddVendorFName">First name:</label>
												<input type = "text" id = "txtAddVendorFName" name = "txtAddVendorFName" class = "form-control form-control-sm" placeholder = "First name" required>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "txtAddVendorMName">Middle name:</label>
												<input type = "text" id = "txtAddVendorMName" name = "txtAddVendorMName" class = "form-control form-control-sm" placeholder = "Middle name">
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "txtAddVendorLName">Last name:</label>
												<input type = "text" id = "txtAddVendorLName" name = "txtAddVendorLName" class = "form-control form-control-sm" placeholder = "Last name" required>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "txtAddVendorTIN">TIN #</label>
												<input type = "text" id = "txtAddVendorTIN" name = "txtAddVendorTIN" class = "form-control form-control-sm" placeholder = "TIN #" required>
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "dpAddVendorBirthdate">Date of Birth:</label>
												<input type = "date" id = "dpAddVendorBirthdate" name = "dpAddVendorBirthdate" class = "form-control form-control-sm" required>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "cmbAddVendorBirthplaceProvince">Birth place (Province):</label>
												<select id = "cmbAddVendorBirthplaceProvince" name = "cmbAddVendorBirthplaceProvince" class = "form-control form-control-sm" required>
													
												</select>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "cmbAddVendorBirthplaceCityMun">Birth place (City/Municipality):</label>
												<select id = "cmbAddVendorBirthplaceCityMun" name = "cmbAddVendorBirthplaceCityMun" class = "form-control form-control-sm" required>
													
												</select>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "cmbAddVendorBirthplaceBrgy">Birth place (Barangay):</label>
												<select id = "cmbAddVendorBirthplaceBrgy" name = "cmbAddVendorBirthplaceBrgy" class = "form-control form-control-sm" required>
													
												</select>
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-4">
												<label class = "form-control-label" for = "cmbAddVendorResidentialProvince">Address (Province):</label>
												<select id = "cmbAddVendorResidentialProvince" name = "cmbAddVendorResidentialProvince" class = "form-control form-control-sm" required>
													
												</select>
											</div>

											<div class = "form-group col-md-4">
												<label class = "form-control-label" for = "cmbAddVendorResidentialCityMun">Address (City/Municipality):</label>
												<select id = "cmbAddVendorResidentialCityMun" name = "cmbAddVendorResidentialCityMun" class = "form-control form-control-sm" required>
													
												</select>
											</div>

											<div class = "form-group col-md-4">
												<label class = "form-control-label" for = "cmbAddVendorResidentialBrgy">Address (Barangay):</label>
												<select id = "cmbAddVendorResidentialBrgy" name = "cmbAddVendorResidentialBrgy" class = "form-control form-control-sm" required>
													
												</select>
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "cmbAddVendorSex">Sex:</label>
												<select id = "cmbAddVendorSex" name = "cmbAddVendorSex" class = "form-control form-control-sm" required>
													<option value = "M">Male</option>
													<option value = "F">Female</option>
												</select>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "nudAddVendorHeight">Height (in meters):</label>
												<input type = "number" id = "nudAddVendorHeight" name = "nudAddVendorHeight" step = ".01" min = "0" class = "form-control form-control-sm" placeholder = "meters" required>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "nudAddVendorWeight">Weight (in kilograms):</label>
												<input type = "number" id = "nudAddVendorWeight" name = "nudAddVendorWeight" step = ".01" min = "0" class = "form-control form-control-sm" placeholder = "kilograms" required>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "cmbAddVendorBloodType">Blood Type:</label>
												<select id = "cmbAddVendorBloodType" name = "cmbAddVendorBloodType" class = "form-control form-control-sm" required>
													<option value = "A">A</option>
													<option value = "A-">A-</option>
													<option value = "A+">A+</option>
													<option value = "B-">B-</option>
													<option value = "B+">B+</option>
													<option value = "AB">AB</option>
													<option value = "AB-">AB-</option>
													<option value = "AB+">AB+</option>
													<option value = "O">O</option>
												</select>
											</div>

											<!-- <div class = "form-group col-md-3">
												<div class = "form-check">
													<label class = "form-check-label" for = "chkAddVendorBloodTypeNotInChoices">
														<input type = "checkbox" id = "chkAddVendorBloodTypeNotInChoices" name = "chkAddVendorBloodTypeNotInChoices" class = "form-check-input">
														Not in the choices
													</label>
												</div>
											</div> -->
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-4">
												<label class = "form-control-label" for = "txtAddVendorMobileNumber">Mobile number:</label>
												<input type = "text" id = "txtAddVendorMobileNumber" name = "txtAddVendorMobileNumber" class = "form-control form-control-sm" placeholder = "+63-912-345-6789" required>
											</div>

											<div class = "form-group col-md-4">
												<label class = "form-control-label" for = "txtAddVendorTelNo">Telephone number:</label>
												<input type = "text" id = "txtAddVendorTelNo" name = "txtAddVendorTelNo" class = "form-control form-control-sm" placeholder = "123-4567">
											</div>

											<div class = "form-group col-md-4">
												<label class = "form-control-label" for = "txtAddVendorEmailAddress">E-mail address:</label>
												<input type = "email" id = "txtAddVendorEmailAddress" name = "txtAddVendorEmailAddress" class = "form-control form-control-sm" placeholder = "testuser@testsite.com">
											</div>
										</div>

										<div class = "form-row">
											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "cmbAddVendorLegalStatus">Civil status:</label>
												<select id = "cmbAddVendorLegalStatus" name = "cmbAddVendorLegalStatus" class = "form-control form-control-sm" required>
													<option value = "Single">Single</option>
													<option value = "Married">Married</option>
													<option value = "Widowed">Widowed</option>
													<option value = "Legally separated">Legally separated</option>
												</select>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "txtAddVendorSpouseFName">Spouse's first name:</label>
												<input type = "text" id = "txtAddVendorSpouseFName" name = "txtAddVendorSpouseFName" class = "form-control form-control-sm" placeholder = "First name" required>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "txtAddVendorSpouseMName">Middle name:</label>
												<input type = "text" id = "txtAddVendorSpouseMName" name = "txtAddVendorSpouseMName" class = "form-control form-control-sm" placeholder = "Middle name" required>
											</div>

											<div class = "form-group col-md-3">
												<label class = "form-control-label" for = "txtAddVendorSpouseLName">Last name:</label>
												<input type = "text" id = "txtAddVendorSpouseLName" name = "txtAddVendorSpouseLName" class = "form-control form-control-sm" placeholder = "Last name" required>
											</div>
										</div>
										<input type = "submit" id = "btnAddVendor" name = "btnAddVendor" class = "btn btn-secondary btn-sm" style = "width: 25%;">
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
		<script type = "text/javascript" src = "../../js/fnMarketView.js"></script>
		<script type = "text/javascript" src = "../../js/fnGetStallLocation.js"></script>
		<script type = "text/javascript" src = "../../js/fnMarket.js"></script>

		<script type = "text/javascript" src = "../../js/fnLogout.js"></script>
	</body>
</html>