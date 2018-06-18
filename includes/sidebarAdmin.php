<?php
	include("connection.php");
?>
<div id = "divSidebarAdmin" class = "ui inverted sidebar vertical menu" style = "/*background-color: #1a2126*/; max-width: auto; color: #fff; font-size : 12px;">
	<a id = "btnLogout" class="item" href="javascript:;" style = "text-align: center;">Logout</a>

	<div class = "disabled item" style = "background-color: #13191b; padding : 5px; color : #adb9ca; text-align: center;">MAIN NAVIGATION</div>

	<a id = "btnDivUsersMgmt" class="item" href="javascript:;">User management</a>

	<div class = "item">
		<div id = "btnMarketFacilitySettings" class = "ui accordion">
			<a class = "title" style = "color: #fff;">
				Market facility settings
				<i class = "dropdown icon"></i>
			</a>

			<div class = "content">
				<ul style = "list-style: none;">
					<li><a id = "btnDivMarketFacilities" 		class = "item" href="javascript:;">Market</a></li>
					<li><a id = "btnDivBuildings" 				class = "item" href="javascript:;">Buildings</a></li>
					<li><a id = "btnDivSections" 				class = "item" href="javascript:;">Sections</a></li>
					<li><a id = "btnDivGates" 					class = "item" href="javascript:;">Gates</a></li>
					<li><a id = "btnDivAreas" 					class = "item" href="javascript:;">Areas</a></li>
					<li><a id = "btnDivStalls" 					class = "item" href="javascript:;">Stalls</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class = "item">
		<div id = "btnEEMSettings" class = "ui accordion">
			<a class = "title" style = "color: #fff;">
				EEM Settings
				<i class = "dropdown icon"></i>
			</a>

			<div class = "content">
				<ul style = "list-style: none;">
					<li><a id = "btnDivBusinessClassifications" class="item" href="javascript:;">Business Classification</a></li>
					<li><a id = "btnDivBusinessType" 			class="item" href="javascript:;">Business Type</a></li>
					<li><a id = "btnDivGoodsCommodities" 		class="item" href="javascript:;">Goods/Commodities</a></li>
					<li><a id = "btnDivOwnershipType" 			class="item" href="javascript:;">Ownership Type</a></li>
					<li><a id = "btnDivSignatories" 			class="item" href="javascript:;">Signatories</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class = "item">
		<div id = "btnComputationSettings" class = "ui accordion">
			<a class = "title" style = "color: #fff;">
				Computation settings
				<i class = "dropdown icon"></i>
			</a>

			<div class = "content">
				<ul style = "list-style: none;">
					<li><a id = "btnDivAccountCodes" 			class="item" href="javascript:;">Account Codes</a></li>
					<li><a id = "btnDivTicketDenominations" 	class="item" href="javascript:;">Ticket Denomination</a></li>
					<!-- <li><a id = "btnDivRentalFees" 				class="item" href="javascript:;">Rental Fees</a></li>
					<li><a id = "btnDivMaintenanceFees" 		class="item" href="javascript:;">Maintenance Fees</a></li>
					<li><a id = "btnDivOtherFees" 				class="item" href="javascript:;">Other Fees</a></li> -->
					<li><a id = "btnDivServices" 				class="item" href="javascript:;">Services</a></li>
					<li><a id = "btnDivSurcharges" 				class="item" href="javascript:;">Surcharges</a></li>
					<li><a id = "btnDivYearConfiguration" 		class="item" href="javascript:;">Year Configuration</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class = "item">
		<div id = "btnRemittanceSettings" class = "ui accordion">
			<a class = "title" style = "color: #fff;">
				Remittance settings
				<i class = "dropdown icon"></i>
			</a>
			<div class = "content">
				<ul style = "list-style: none;">
					<li><a id = "btnDivAddAF" class="item" href="javascript:;">Accountable forms</a></li>
					<li><a id = "btnAssignAFCashTicket" class="item" href="javascript:;">Assign AF/cash ticket</a></li>
				</ul>
			</div>
		</div>
	</div>

	<a id = "btnDivHistoryLog" 		class="item" 	href="javascript:;" >History Log</a>
	<a id = "btnDivDBMgmt" 			class="item" 	href="javascript:;" >Database Management</a>
	<a id = "btnMarketModule" 		class="item" 	href="../market" 	>Market module</a>
	<a id = "btnTreasuryModule" 	class="item" 	href="../treasury" 	>Treasury module</a>

	<a id = "btnDivChangePassword" 	class="item"	href = "javascript:;" >Change password</a>
</div>