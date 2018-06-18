$('.ui.dropdown').dropdown();
$('#txtAddNewApplicationCapital').mask("#,##0", {reverse: true,removeMaskOnSubmit: true});
$('.readonly').keydown(function(event){
	event.preventDefault();
});

//START STALL APPLICATION FUNCTIONS
//LOAD ALL BUSINESS TYPES
$.ajax({
	url: serverdir + '/process/getBusinessTypes.php',
	dataType: 'json',
	success: function(data){
		$.each(data, function(i,val){
			$('#cmbEditNewApplicationBusinessType').append('<option value = '+val.BTid+'>'+val.BTdesc+'</option>');
			$('#cmbAddNewApplicationBusinessType').append('<option value = '+val.BTid+'>'+val.BTdesc+'</option>');
		});
	}
});

//LOAD ALL OWNERSHIP TYPES
$.ajax({
	url: serverdir + '/process/getOwnershipTypes.php',
	type: 'get',
	cache: false,
	dataType: 'json',
	success: function(data) {
		if (data != undefined) {
			$('#cmbAddNewApplicationOwnershipType').empty();
			$.each(data, function(i,val){
				$('#cmbAddNewApplicationOwnershipType').append('<option value = "'+val.OTid+'">'+val.OTdesc+'</option>');
				$('#cmbEditNewApplicationOwnershipType').append('<option value = "'+val.OTid+'">'+val.OTdesc+'</option>');
			});
		}
	}
});

//load signatories in dropdown in generate stall award module
$.ajax({
	url: serverdir + '/process/getSignatories.php',
	type: 'get',
	cache: false,
	dataType: 'json',
	success: function (data) {
		if (data !== undefined) {
			var array = [];
			$.each(data, function(i,val){
				array.push('<option value = "'+data[i]['signatoryid']+'">'+data[i]['signatoryname']+', '+data[i]['signatoryposition']+'</option>');
			});
			$('#signatories').html(array);
		}
		else {
			toastr.error('Something went wrong.');
		}
		// console.log(data);
	}
});

function fnResetNewApplicationAddress() {
	fnGetApplicationApplicantProvinces();
	fnGetApplicationApplicantSpouseProvinces();
}

function fnCivilStatusEvent() {
	$('#cmbAddNewApplicationCivilStatus').change(function(){
		if ($(this).val() == 'Married') {
			$('#txtAddNewApplicationFNameSpouse, #txtAddNewApplicationMNameSpouse, #txtAddNewApplicationLNameSpouse').prop('disabled',false);
			// $('#fldSpouseAddress').prop('disabled',false);
			$('section .ui.small.fluid.search.dropdown').toggleClass('disabled',false);
		}
		else {
			$('section .ui.small.fluid.search.dropdown').dropdown('clear');
			// $('#cmbAddNewApplicationProvince, #cmbAddNewApplicationMunicipalitySpouse, #cmbAddNewApplicationBrgySpouse').empty();
			// $('#txtAddNewApplicationFNameSpouse, #txtAddNewApplicationMNameSpouse, #txtAddNewApplicationLNameSpouse, #cmbAddNewApplicationProvinceSpouse, #cmbAddNewApplicationMunicipalitySpouse, #cmbAddNewApplicationBrgySpouse').prop('disabled',true);
			$('section .ui.small.fluid.search.dropdown').toggleClass('disabled',true);

		}
	});
}
fnCivilStatusEvent();
$('#cmbAddNewApplicationCivilStatus').on('keyup change click',function(){
	if ($(this).val() == 'Married') {
		$('#txtAddNewApplicationFNameSpouse, #txtAddNewApplicationMNameSpouse, #txtAddNewApplicationLNameSpouse, #cmbAddNewApplicationProvinceSpouse, #cmbAddNewApplicationMunicipalitySpouse, #cmbAddNewApplicationBrgySpouse').prop('disabled',false);
	}
	else {
		$('#txtAddNewApplicationFNameSpouse, #txtAddNewApplicationMNameSpouse, #txtAddNewApplicationLNameSpouse, #cmbAddNewApplicationProvinceSpouse, #cmbAddNewApplicationMunicipalitySpouse, #cmbAddNewApplicationBrgySpouse').prop('disabled',true);
	}
});

function fnAddNewApplicationValidationsLegalAge() {
	var dateBirth 	= new Date($('#txtAddNewApplicationDOB').val());
	var dateNow 	= new Date(Date.now());
	var intAge 		= Math.floor((parseInt(Date.parse(dateNow)) - parseInt(Date.parse(dateBirth))) / (1000*60*60*24*365));
	
	return (intAge);
}
$('#txtAddNewApplicationDOB').on('change click',function(){
	var dateBirth 	= new Date($('#txtAddNewApplicationDOB').val());
	var dateNow 	= new Date(Date.now());

	if (dateBirth>=dateNow){
		$('#txtAddNewApplicationAge').val(0);
	}
	else{
		$('#txtAddNewApplicationAge').val(fnAddNewApplicationValidationsLegalAge());
		if (fnAddNewApplicationValidationsLegalAge() < 18) {
			$('#txtAddNewApplicationDOB').css({'border-color':'red'});
		}
		else{
			$('#txtAddNewApplicationDOB').css({'border-color':''});
		}
	}
});

function fnAddNewApplicationGetGoodsCommodities(BTid) {
	// $('#cmbAddNewApplicationGoods').find('option').remove().end(); // == empty()
	$('#cmbAddNewApplicationGoods').empty();
	$('#cmbAddNewApplicationGoods').dropdown('clear');
	// var BTid = $('#cmbAddNewApplicationBusinessType').val();
	$.ajax({
		type: 'post',
		url: serverdir + '/process/getGoodsCommodities.php?q=search',
		data: {'BTid':BTid},
		dataType:'json',
		success : function(data){
			if (data != undefined) {
				// $.each(data, function(i,val){
				// 	$('#cmbAddNewApplicationGoods').append('<option value = '+val.GCid+'>'+val.GCdesc+'</option>');
				// });
				var array = [];
				for (var i = 0; i < data.length; i++) {
					array.push('<option value = '+data[i]['GCid']+'>'+data[i]['GCdesc']+ '</option>' );
					$('#cmbAddNewApplicationGoods').html(array);
				}
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});
}

$('#cmbAddNewApplicationBusinessType').change(function(){
	fnAddNewApplicationGetGoodsCommodities($(this).val());
});
$(document).ready(function(){
	fnAddNewApplicationGetGoodsCommodities($('#cmbAddNewApplicationBusinessType').val());
});

$('#cmbAddNewApplicationEmployed').bind('change click',function(){
	if ($(this).val() == 'YES') {
		$('#txtAddNewApplicationOffice').prop('readonly',false);
	}
	else if($(this).val() == 'NO') {
		$('#txtAddNewApplicationOffice').val('');
		$('#txtAddNewApplicationOffice').prop('readonly',true);
	}
});

$('#txtAddNewApplicationOtherBusinesses').keyup(function() {
	if ($(this).val().length == 0) {
		$('#txtAddNewApplicationBPermitNo').prop('readonly',true);
	}
	else {
		$('#txtAddNewApplicationBPermitNo').prop('readonly',false);
	}
});

//APPLICATION ADDRESS: RESIDENTIAL
	fnGetProvinces($('#cmbAddNewApplicationProvince'),$('#cmbAddNewApplicationMunicipality'),$('#cmbAddNewApplicationBrgys'));
$('#cmbAddNewApplicationProvince').change(function(){
	fnGetCityMuns($('#cmbAddNewApplicationProvince'),$('#cmbAddNewApplicationMunicipality'),$('#cmbAddNewApplicationBrgys'));
});
$('#cmbAddNewApplicationMunicipality').change(function(){
	fnGetBrgys($('#cmbAddNewApplicationProvince'),$('#cmbAddNewApplicationMunicipality'),$('#cmbAddNewApplicationBrgys'));
});

//APPLICATION ADDRESS: SPOUSE
	fnGetProvinces($('#cmbAddNewApplicationProvinceSpouse'),$('#cmbAddNewApplicationMunicipalitySpouse'),$('#cmbAddNewApplicationBrgySpouse'));
$('#cmbAddNewApplicationProvinceSpouse').change(function(){
	fnGetCityMuns($('#cmbAddNewApplicationProvinceSpouse'),$('#cmbAddNewApplicationMunicipalitySpouse'),$('#cmbAddNewApplicationBrgySpouse'));
});
$('#cmbAddNewApplicationMunicipalitySpouse').change(function(){
	fnGetBrgys($('#cmbAddNewApplicationProvinceSpouse'),$('#cmbAddNewApplicationMunicipalitySpouse'),$('#cmbAddNewApplicationBrgySpouse'));
});

function fnAddNewApplication() {
	event.preventDefault();
	//unmask capital
	$('#txtAddNewApplicationCapital').unmask();

	var addP = $('#cmbAddNewApplicationProvince').val();
	var addM = $('#cmbAddNewApplicationMunicipality').val();
	var addB = $('#cmbAddNewApplicationBrgys').val();

		$.ajax({
		url: serverdir + '/process/addNewApplication.php',
		type: 'post',
		data: $('#frmAddNewApplication').serialize(),
		dataType: 'html',
		beforeSend: function(xhr){
			if(addP == '0' || addM == '0' || addB == '0'){
				if (addP =='0') {
					$('#cmbAddNewApplicationProvince').css('border-color','red');
				}
				else if(addM =='0') {
					$('#cmbAddNewApplicationMunicipality').css('border-color','red');
				}
				else if(addB =='0') {
					$('#cmbAddNewApplicationBrgys').css('border-color','red');
				}
				$('#txtAddNewApplicationDOB').css('border-color','');
				toastr.error('Please input your address.');
				xhr.abort();	
			}
			
			if (fnAddNewApplicationValidationsLegalAge() < 18) {
				toastr.error('Applicant must be at least 18 years of age.');
				$('#txtAddNewApplicationDOB').css('border-color','red');
				xhr.abort();
			}
		},
		success: function(result){
			if (result == true) {
				fnHistoryLog('ADD NEW APPLICATION');

				$('#frmAddNewApplication')[0].reset();
				fnGetProvinces($('#cmbAddNewApplicationProvince'),$('#cmbAddNewApplicationMunicipality'),$('#cmbAddNewApplicationBrgys'));
				fnGetProvinces($('#cmbAddNewApplicationProvinceSpouse'),$('#cmbAddNewApplicationMunicipalitySpouse'),$('#cmbAddNewApplicationBrgySpouse'));
				$('#cmbAddNewApplicationGoods').dropdown('clear');
				
				$('section .ui.small.fluid.search.dropdown').dropdown('clear');
				$('section .ui.small.fluid.search.dropdown').toggleClass('disabled', true);
				$('#txtAddNewApplicationFNameSpouse, #txtAddNewApplicationMNameSpouse, #txtAddNewApplicationLNameSpouse').prop('disabled', true);

				fnAddNewApplicationGetGoodsCommodities();
				fnRefreshAllTables();

				toastr.success('Stall application successful.');

				$('#txtAddNewApplicationDOB,#cmbAddNewApplicationProvince,#cmbAddNewApplicationMunicipality,#cmbAddNewApplicationBrgys').css('border-color','');
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
			}else{
				toastr.error('Something went wrong.');
			}
		}
	});
}
//END STALL APPLICATION FUNCTIONS

//START STALL APPLICATION APPROVAL
function fnGetNewApplicants() {
	var tblListOfPendingApplication = $('#tblListOfPendingApplication').DataTable({
		ajax:{
			url: serverdir + '/process/getNewApplications.php',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns:[
			{'data':'applicantid'},
			{'data':'fullname'},
			{'data':'address'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id = "btnApproveNewApplication" class="ui mini icon button" data-toggle="modal"><i class = "fa fa-check"></i></button> <button id = "btnViewNewApplication" class="ui mini icon button" data-toggle="modal"><i class = "fa fa-eye"></i></button> <button id = "btnDeleteNewApplication" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			// defaultContent: '<button id = "btnApproveNewApplication" class="ui mini icon button" data-toggle="modal"><i class = "fa fa-check"></i></button> <button id = "btnDeleteNewApplication" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true,
			orderable: false,
			targets: 0
		}],
		pageLength:5
	});


	//APPROVE NEW STALL APPLICATION
	$('#tblListOfPendingApplication tbody').on('click','#btnApproveNewApplication', function(event){
		var dataSelect = tblListOfPendingApplication.row( $(this).parents('tr') ).data();
		var applicantid = dataSelect['applicantid'];
		$('[data-remodal-id=modalApproveNewApplication]').remodal({closeOnOutsideClick: false}).open();

		$.ajax({
			url: serverdir + '/process/selectApproveApplication.php',
			type: 'post',
			data: {'applicantid':applicantid},
			dataType: 'json',
			success: function(result){
				if (result !==null) {
					$('#txthiddenApplicationId').val(result[0]['applicationid']);
					$('#txtApproveApplicationName').val(result[0]['fullname']);
					$('#txtApproveApplicationBusinessType').val(result[0]['BTdesc']);
					$('#txtApproveApplicationCapital').val(result[0]['capital']);
					fnRefreshAllTables();
				}
			}
		});
	});

	//EDIT NEW STALL APPLICATION
	$('#tblListOfPendingApplication tbody').on('click','#btnViewNewApplication', function(event){
		var dataSelect = tblListOfPendingApplication.row( $(this).parents('tr') ).data();
		var applicantid = dataSelect['applicantid'];
		$('[data-remodal-id=modalViewNewApplication]').remodal({closeOnOutsideClick: false}).open();

		$.ajax({
			url: serverdir + '/process/selectViewNewApplication.php',
			type: 'post',
			data: {'applicantid':applicantid},
			dataType: 'json',
			success: function(result){
				if(result!==undefined){
					$('#txtViewNewApplicationFullName').val(result[0]['fullname']);
					$('#txtViewNewApplicationAddress').val(result[0]['address']);
					$('#txtViewNewApplicationDOB').val(result[0]['dob']);
					$('#txtViewNewApplicationCitizenship').val(result[0]['citizenship']);
					$('#cmbViewNewApplicationCivilStatus').val(result[0]['cstatus']);

					$('#txtViewNewApplicationBusinessType').val(result[0]['businesstype']);
					$('#txtViewNewApplicationOwnershipType').val(result[0]['ownershiptype']);
					$('#txtViewNewApplicationCapital').val(result[0]['capital']);

					$('#txtViewNewApplicationEmployed').val(result[0]['employed']);
					$('#txtViewNewApplicationOffice').val(result[0]['office']);
					$('#txtViewNewApplicationOtherBusinesses').val(result[0]['otherbusiness']);
					$('#txtViewNewApplicationBPermitNo').val(result[0]['businesspermit']);
					$('#txtViewNewApplicationDate').val(result[0]['date']);
				
					//functions
					//ajax on spouse
					var applicantid = result[0]['applicantid'];

					$.ajax({
						url: serverdir + '/process/selectSpouseInfo.php',
						type: 'post',
						data: {'applicantid':applicantid},
						dataType: 'json',
						success: function(result){
							if (result!==undefined) {
								$('#txtViewNewApplicationFullNameSpouse').val(result[0]['sfullname']);
								$('#txtViewNewApplicationAddressSpouse').val(result[0]['saddress']);
							}
						}
					});
				}
			}
		});
	});

	//DELETE NEW STALL APLLICATION
	$('#tblListOfPendingApplication tbody').on('click','#btnDeleteNewApplication', function(event){
		var dataSelect = tblListOfPendingApplication.row( $(this).parents('tr') ).data();
		var applicantid = dataSelect['applicantid'];

		$.ajax({
			url: serverdir + '/process/deleteNewApplication.php',
			type: 'post',
			data: {'applicantid':applicantid},
			dataType: 'json',
			success: function(result){
				if (result == true) {
					toastr.success("New pending application successfully deleted!");
					fnRefreshAllTables();
					$('#frmAddNewApplication')[0].reset();
				}else{
					toastr.warning("Ooops! Something went wrong.");
				}
			}
		});
	});
}
function fnApprovedApplication(){
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editApproveApplicationStatus.php',
		type: 'post',
		data: $('#frmApproveNewApplication').serialize(),
		dataType: 'html',
		success: function(approved){
			if (approved) {
				fnHistoryLog('APPROVED APPLICATION: '+$('#txtApproveApplicationName').val());
				toastr.success('Application approval successful.');
				$('[data-remodal-id=modalApproveNewApplication]').remodal().close();
				fnRefreshAllTables();
			}
			else {
				toastr.warning('Application approval failed.');	
			}	
		}
	});
}
//END STALL APPLICATION APPROVAL

//START STALL ASSIGNMENT FUNCTIONS
function fnGetUnassignedStall(){
	var tblListOfUnassignedStall = $('#tblListOfUnassignedStall').DataTable({
		ajax:{
			url: serverdir + '/process/getUnassignedStall.php',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns:[
			{'data':'applicantid'},
			{'data':'fullname'},
			{'data':'address'},
			{'data':'businesstype'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button type = "button" id = "btnAssignStall" class="ui mini icon button"><i class = "fa fa-check"></i></button>',
			orderable: false
		},{
			searchable: true,
			orderable: false,
			targets: 0
		}],
		pageLength:5
	});	

	$('#tblListOfUnassignedStall tbody').on('click','#btnAssignStall', function(event){
		var dataSelect = tblListOfUnassignedStall.row( $(this).parents('tr') ).data();
		var applicantid = dataSelect['applicantid'];
		$.ajax({
			url: serverdir + '/process/selectUnassignedStall.php',
			type: 'post',
			data: {'applicantid':applicantid},
			dataType: 'json',
			success: function(result){
				console.log(result);
				if (result!==null) {
					$('#txtAssignAStallBusinessName').prop('disabled',false);
					$('#txtAssignAStallEffectivityDate').prop('disabled',false);
					// $('#cmbStallsToAssign').prop('disabled',false);
					$('#btnAssignAStall').removeAttr('disabled');
					$('#btnAssignAStallReset').removeAttr('disabled');
					$('#cmbAssignAStallMarket,#cmbAssignAStallBuilding,#cmbAssignAStallSection,#cmbStallsToAssign').dropdown('clear');

					$('#frmAssignAStall')[0].reset();
					$('#txtHiddenApplicationId').val(result[0]['applicantid']);
					$('#txtAssignAStallOwner').val(result[0]['fullname']);
					$('#txtAssignAStallAddress').val(result[0]['address']);
					$('#txtAssignAStallBusinessType').val(result[0]['businesstype']);
					// fnGetStallsToAssign();
				}
			}
		}); 
	});
}
fnLoadAllStalls($('#cmbStallsToAssign'));
// 	fnMarketFacilities($('#cmbAssignAStallMarket'),$('#cmbAssignAStallBuilding'),$('#cmbAssignAStallSection'),$('#cmbStallsToAssign'));
// $('#cmbAssignAStallMarket').change(function(){
// 	fnBuildings($('#cmbAssignAStallMarket'),$('#cmbAssignAStallBuilding'),$('#cmbAssignAStallSection'),$('#cmbStallsToAssign'));
// });
// $('#cmbAssignAStallBuilding').change(function(){
// 	fnSections($('#cmbAssignAStallMarket'),$('#cmbAssignAStallBuilding'),$('#cmbAssignAStallSection'),$('#cmbStallsToAssign'));
// });
// $('#cmbAssignAStallSection').change(function(){
// 	fnStalls($('#cmbAssignAStallMarket'),$('#cmbAssignAStallBuilding'),$('#cmbAssignAStallSection'),$('#cmbStallsToAssign'));
// });

// function fnAppendStallToAssignValidateIfStallSelected() {
// 	return ($('#cmbAssignAStallMarket').val() 		== 0 	|| 
// 			$('#cmbAssignAStallBuilding').val() 	== 0 	|| 
// 			$('#cmbAssignAStallSection').val() 		== 0 	|| 
// 			$('#cmbAssignAStallStallNumber').val() 	== 0);
// }
// var tblListOfStallsToAssign = $('#tblListOfStallsToAssign').DataTable({
// 	columns: [
// 		{'data' : 'chosenstallmarketfacility'},
// 		{'data' : 'chosenstallbuilding'},
// 		{'data' : 'chosenstallsection'},
// 		{'data' : 'chosenstallstallnumber'},
// 		{'data' : 'chosenstallaction'}
// 	],
// 	lengthChange: false,
// 	paginate: false,
// 	info: false,
// 	language: {
// 		zeroRecords:'',
// 		emptyTable:''
// 	}
// });
function fnAssignAStallOwner(){
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addAssignStallOwner.php',
		type: 'post',
		data: $('#frmAssignAStall').serialize(),
		dataType: 'html',
		success: function(result){
			if (result) {
				fnHistoryLog('ASSIGN STALL/S TO APPLICANT: '+$('#txtAssignAStallOwner').val());

				toastr.success('Owner successfully assigned into a stall.');
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				// fnGetStallsToAssign();
				// $('#cmbStallsToAssign').dropdown('refresh');

				//print le stall award
				window.open(serverdir + '/process/generateStallAward.php?id='+$('#txtHiddenApplicationId').val());

				$('#frmAssignAStall')[0].reset();
				fnMarketFacilities($('#cmbAssignAStallMarket'),$('#cmbAssignAStallBuilding'),$('#cmbAssignAStallSection'),$('#cmbStallsToAssign'));
				
			}else{
				toastr.error('Something went wrong.');
			}
		}
	});

}
//END STALL ASSIGNMENT FUNCTIONS

$('#btnAssignAStallReset').click(function (event){
	$('#btnAssignAStall').prop('disabled',true);
	$('#btnAssignAStallReset').prop('disabled',true);
	$('#cmbStallsToAssign').dropdown('clear');
	$('#frmAssignAStall')[0].reset();
	$('#txtAssignAStallBusinessName').prop('disabled',true);
	$('#cmbAssignAStallBuilding').dropdown('clear');
	$('#cmbAssignAStallMarket').dropdown('clear');
	$('#cmbAssignAStallSection').dropdown('clear');
	$('#txtAssignAStallEffectivityDate').prop('disabled',true);
});


function fnGetListOfStallToBeAwarded(){
	var tblListOfStallToBeAwarded = $('#tblListOfStallToBeAwarded').DataTable({
		ajax:{
			url: serverdir + '/process/getListOfStallsToBeAwarded.php',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns:[
			{'data':'applicantid'},
			{'data':'fullname'},
			{'data':'address'},
			{'data':'businesstype'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id = "btnPrintStallAward" class="ui mini icon button"><i class = "fa fa-print"></i></button>',
			orderable: false
		},{
			searchable: true,
			orderable: false,
			targets: 0
		}],
		pageLength:5
	});

	$('#tblListOfStallToBeAwarded tbody').on('click','#btnPrintStallAward', function(event){
		var dataSelect = tblListOfStallToBeAwarded.row( $(this).parents('tr')).data();
		var applicantid = dataSelect['applicantid'];
		console.log(applicantid);

		fnHistoryLog('PRINTED STALL AWARD FOR APPLICANT '+applicantid);
		window.open(serverdir + '/process/generateStallAward.php?id='+applicantid);
	});
}

//START VALIDATIONS: VENDORS
//START INPUT MASKS
$('#txtAddVendorTIN').mask('999-999-999',{placeholder: '___-___-___'});
$('#txtAddVendorMobileNumber').mask('+63-999-999-9999',{placeholder: ''});
$('#txtAddVendorTelNo').mask('999-9999',{placeholder: ''});
//END INPUT MASKS
function fnAddStallVendorValidationsLegalAge() {
	var dateBirth 	= new Date($('#dpAddVendorBirthdate').val());
	var dateNow 	= new Date(Date.now());
	var intAge 		= Math.floor((parseInt(Date.parse(dateNow)) - parseInt(Date.parse(dateBirth))) / (1000*60*60*24*365));
	
	return (parseInt(intAge));
}
$('#dpAddVendorBirthdate').on('click change keyup',function(){
	$('#txtAddVendorAge').val(fnAddStallVendorValidationsLegalAge());

	if (fnAddStallVendorValidationsLegalAge() < 18) {
		$('#dpAddVendorBirthdate').css({'border-color':'red'});
	}
	else {
		$('#dpAddVendorBirthdate').css({'border-color':''});
	}
});
function fnValidateAddVendorCivilStatus() {
	if ($('#cmbAddVendorLegalStatus').val() === 'Single' || $('#cmbAddVendorLegalStatus').val() === 'Widowed' || $('#cmbAddVendorLegalStatus').val() === 'Legally separated') {
		$('#txtAddVendorSpouseFName, #txtAddVendorSpouseMName, #txtAddVendorSpouseLName').prop('disabled',true);
	}
	else if ($('#cmbAddVendorLegalStatus').val() === 'Married') {
		$('#txtAddVendorSpouseFName, #txtAddVendorSpouseMName, #txtAddVendorSpouseLName').prop('disabled',false);
	}
}
fnValidateAddVendorCivilStatus();
$('#cmbAddVendorLegalStatus').change('keyup change click',function(){
	fnValidateAddVendorCivilStatus();
});

// //VENDOR ADDRESS: BIRTHPLACE
// 	fnGetProvinces($('#cmbAddVendorBirthplaceProvince'),$('#cmbAddVendorBirthplaceCityMun'),$('#cmbAddVendorBirthplaceBrgy'));
// $('#cmbAddVendorBirthplaceProvince').change(function(){
// 	fnGetCityMuns($('#cmbAddVendorBirthplaceProvince'),$('#cmbAddVendorBirthplaceCityMun'),$('#cmbAddVendorBirthplaceBrgy'));
// });
// $('#cmbAddVendorBirthplaceCityMun').change(function(){
// 	fnGetBrgys($('#cmbAddVendorBirthplaceProvince'),$('#cmbAddVendorBirthplaceCityMun'),$('#cmbAddVendorBirthplaceBrgy'));
// });

//VENDOR ADDRESS: RESIDENTIAL
	fnGetProvinces($('#cmbAddVendorResidentialProvince'),$('#cmbAddVendorResidentialCityMun'),$('#cmbAddVendorResidentialBrgy'));
$('#cmbAddVendorResidentialProvince').change(function(){
	fnGetCityMuns($('#cmbAddVendorResidentialProvince'),$('#cmbAddVendorResidentialCityMun'),$('#cmbAddVendorResidentialBrgy'));
});
$('#cmbAddVendorResidentialCityMun').change(function(){
	fnGetBrgys($('#cmbAddVendorResidentialProvince'),$('#cmbAddVendorResidentialCityMun'),$('#cmbAddVendorResidentialBrgy'));
});
//END VALIDATIONS: VENDORS

//EDIT APPLICATION
	fnGetProvinces($('#cmbEditNewApplicationProvince'),$('#cmbEditNewApplicationMunicipality'),$('#cmbEditNewApplicationBrgys'));
$('#cmbEditNewApplicationProvince').change(function(){
	fnGetCityMuns($('#cmbEditNewApplicationProvince'),$('#cmbEditNewApplicationMunicipality'),$('#cmbEditNewApplicationBrgys'));
});
$('#cmbEditNewApplicationMunicipality').change(function(){
	fnGetBrgys($('#cmbEditNewApplicationProvince'),$('#cmbEditNewApplicationMunicipality'),$('#cmbEditNewApplicationBrgys'));
});

//END VALIDATIONS: 

//START STALL MANAGEMENT FUNCTIONS
//Stall Closure

function fnGetStallToClose(){
	var tblListOfStallsToClose = $('#tblListOfStallsToClose').DataTable({		
		ajax:{
			url: serverdir + '/process/getStallsToClose.php',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns:[
			{'data':'applicantid'},
			{'data':'fullname'},
			{'data':'address'},
			{'data':'stallinfo'},
			{'data':'stallnumber'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id = "btnApproveClosure" class="ui mini icon button" data-toggle="modal"><i class = "fa fa-check"></i></button>',
			orderable: false
		},{
			searchable: true,
			orderable: false,
			targets: 0
		}],
		pageLength:5
	});

	$('#tblListOfStallsToClose tbody').on('click','#btnApproveClosure',function(event){
		var dataSelect = tblListOfStallsToClose.row( $(this).parents('tr') ).data();
		var applicantid = dataSelect['applicantid'];
		var stallnumber = dataSelect['stallnumber'];

		$.ajax({
			url: serverdir + '/process/getStallForClosure.php',
			type: 'post',
			data: {'applicantid':applicantid,'stallnumber':stallnumber},
			dataType: 'json',
			success: function(result){
				$('#txtHiddenApplicantId').val(result[0]['applicantid']);
				$('#txtStallClosureFullname').val(result[0]['fullname']);
				$('#txtStallClosureAddress').val(result[0]['address']);
				$('#txtStallClosureAreaInfo').val(result[0]['area']);
				$('#txtStallClosureMFacility').val(result[0]['marketfacilityname']);
				$('#txtStallClosureBuilding').val(result[0]['building']);
				$('#txtStallClosureSection').val(result[0]['section']);
				$('#txtStallClosureNumber').val(result[0]['stallnumber']);
				$('#btnStallClosure,#btnResetStallClosure').attr('disabled',false);
			}
		});
	});
}
fnGetStallToClose();

function fnCloseStall(){
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editStallToClose.php',
		type: 'post',
		data: $('#frmStallClosure').serialize(),
		dataType: 'html',
		success: function(result){
			if (result) {
				toastr.success('Stall successfully closed.');
				$('#frmStallClosure')[0].reset();
				$('#btnResetStallClosure').prop('disabled',true);
				$('#btnStallClosure').prop('disabled',true);
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
			}else{
				toastr.danger('Something went wrong.');
			}
		}
	});
}

// Reassign Stall

function fnGetStallsToReassign(){
	var tblListOfStallsToReassign = $('#tblListOfStallsToReassign').DataTable({
		ajax:{
			url: serverdir + '/process/getStallsToReassign.php',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns:[
			{'data':'applicantid'},
			{'data':'fullname'},
			{'data':'address'},
			{'data':'stallinfo'},
			{'data':'stallnumber'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id = "btnActivateInfo" class="ui mini icon button"><i class = "fa fa-check"></i></button>',
			orderable: false
		},{
			searchable: true,
			orderable: false,
			targets: 0
		}],
		pageLength:5
	});


	$('#tblListOfStallsToReassign tbody').on('click','#btnActivateInfo', function(){
		var dataSelect = tblListOfStallsToReassign.row( $(this).parents('tr') ).data();
		var applicantid = dataSelect['applicantid'];
		var stallnumber = dataSelect['stallnumber'];

		$.ajax({
			url: serverdir + '/process/getStallToReassignInfo.php',
			type: 'post',
			data: {'applicantid':applicantid,'stallnumber':stallnumber},
			dataType: 'json',
			success: function(result){
				$('#fldReassignStall').prop('disabled',false);
				$('#txtHiddenApplicantId').val(result[0]['applicantid']);
				$('#txtStallReassignFullname').val(result[0]['fullname']);
				$('#txtStallReassignAddress').val(result[0]['address']);
				$('#txtStallReassignAreaInfo').val(result[0]['area']);
				$('#txtStallReassignMFacility').val(result[0]['marketfacilityname']);
				$('#txtStallReassignBuilding').val(result[0]['building']);
				$('#txtStallReassignSection').val(result[0]['section']);
				$('#txtStallReassignStallNumber').val(result[0]['stallnumber']);
				$('#txtHiddenStallNumberToReassign').val(result[0]['stallnumber']);
			}
		});
	});

	$('#btnResetStallReassign').on('click', function(){
		$('#frmReassignStall')[0].reset();
		$('#cmbStallReassignToOwner').dropdown('clear');
		$('#fldReassignStall').prop('disabled',true);
	});
}
fnGetStallsToReassign();

function fnGetOwnersForReassignment(){
	$.ajax({
		url: serverdir + '/process/getOwnersForReassignment.php',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function(data){
			if (data !== undefined) {
				$.each(data, function(i, val) {
					$('#cmbStallReassignToOwner').append('<option value = '+val.applicantid+'>'+val.fullname+'</option>');
				});
			}
		}
	});
}
fnGetOwnersForReassignment();

function fnReassignStall(){
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editReassignStallOwner.php',
		type: 'post',
		data: $('#frmReassignStall').serialize(),
		dataType: 'html',
		success: function(result){
			if(success){
				toastr.success("Reassign stall successful.");
			}else{
				toastr.error("Something went wrong.");
			}
		}
	});
}

function fnSelectOwnerToReassign(){
	$('#cmbStallReassignToOwner').on('change', function(event){

		var applicantid = $(this).val()
		$('#txtNewOwnerIdToReassign').val(applicantid);

		$.ajax({
			url: serverdir + '/process/getOwnerAddress.php',
			type: 'post',
			data: {'applicantid':applicantid},
			dataType: 'json',
			success: function(result){
				$('#txtNewOwnerAddressToReassign').val($.trim(result[0]['brgydesc']+', '+result[0]['citymundesc']+', '+result[0]['provincedesc']));
				// console.log(result);
			}
		});
	});
}
fnSelectOwnerToReassign();

//End Reassign Stall Function

function fnGetStallVendors() {
	var tblListOfStallVendors = $('#tblListOfStallVendors').DataTable({		
		ajax:{
			url: serverdir + '/process/getStallVendors.php?q=all',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns:[
			{'data':'vendorid'},
			{'data':'vendorfullname',
				'render':function(data, type, vendorfullname, meta) {
					return $.trim(vendorfullname.vendorlname + ', ' +vendorfullname.vendorfname + ' ' +vendorfullname.vendormname);
				}
			},
			{'data':'vendoraddress',
				'render':function(data, type, vendoraddress, meta) {
					return $.trim(vendoraddress.vendorbrgydesc + ', ' +vendoraddress.vendorcitymundesc + ', ' +vendoraddress.vendorprovdesc);
				}
			},
			{'data':'stallnumber'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id = "btnVerifyAssignStallVendor" class="ui mini icon button" data-toggle="modal"><i class = "fa fa-check"></i></button>',
			orderable: false
		},{
			searchable: true,
			orderable: false,
			targets: 0
		}],
		pageLength:5
	});

	$('#tblListOfStallVendors tbody').on('click','#btnVerifyAssignStallVendor',function(event){
		var dataSelect = tblListOfStallVendors.row( $(this).parents('tr') ).data();
		var vendorid = dataSelect['vendorid'];

		console.log(vendorid);
		$.ajax({
			url: serverdir + '/process/getStallVendors.php?q=search',
			type: 'post',
			data: {'vendorid':vendorid},
			dataType: 'json',
			success: function(data) {
				if (data != undefined) {
					$('#txthiddenAssignStallVendorVendorID').val(data[0]['vendorid']);
					$('#txtAssignStallVendorFName').val(data[0]['vendorfname']);
					$('#txtAssignStallVendorMName').val(data[0]['vendormname']);
					$('#txtAssignStallVendorLName').val(data[0]['vendorlname']);
					$('#txtAssignStallVendorVendorAddress').val($.trim(data[0]['vendorbrgydesc'] + ', ' + data[0]['vendorcitymundesc'] + ', ' + data[0]['vendorprovdesc']));
				}
				else {
					toastr.error('Something went wrong.');
				}
			}
		});
	});
}


fnLoadAllStalls($('#cmbAssignStallVendorStallNumber'));
function fnAddStallVendor() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addStallVendor.php',
		type: 'post',
		data: $('#frmAddStallVendor').serialize(),
		dataType: 'html',
		beforeSend: function(xhr){
			if (fnAddStallVendorValidationsLegalAge() < 18) {
				toastr.error('Applicant must be at least 18 years of age.');
				xhr.abort();
			}

			if (
				$('#cmbAddVendorResidentialProvince').val() == "0" ||
				$('#cmbAddVendorResidentialCityMun').val() 	== "0" ||
				$('#cmbAddVendorResidentialBrgy').val() 	== "0"
			) {
				toastr.error('Please input your address.');
				xhr.abort();
			}
		},
		complete: function (result) {
			console.log(result);
			if (result) {
				fnHistoryLog('ADD STALL VENDOR: '+$('#txtAddVendorFName').val()+' '+$('#txtAddVendorLName').val());
				$('#frmAddStallVendor')[0].reset();
				fnGetProvinces($('#cmbAddVendorResidentialProvince'),$('#cmbAddVendorResidentialCityMun'),$('#cmbAddVendorResidentialBrgy'));
				fnRefreshAllTables();

				toastr.success('Stall vendor '+$('#txtAddVendorFName').val()+' '+$('#txtAddVendorLName').val()+' add successful.');
			}
			else {
				toastr.error('Stall vendor '+$('#txtAddVendorFName').val()+' '+$('#txtAddVendorLName').val()+' add failed.');
			}
		}
	});
}
function fnAssignStallVendor() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/assignStallVendor.php',
		type: 'post',
		data: {
			'txthiddenAssignStallVendorVendorID':$('#txthiddenAssignStallVendorVendorID').val(),
			'cmbAssignStallVendorStallNumber'	:$('#cmbAssignStallVendorStallNumber').val()
		},
		dataType: 'json',
		success: function (result) {
			if (result) {
				var vendorname = ($.trim($('#txtAssignStallVendorVendorFName').val() + ' ' +$('#txtAssignStallVendorVendorLName').val())).toUpperCase();
				var vendoraddress = $('#txtAssignStallVendorVendorAddress').val();
				fnHistoryLog('ASSIGNED STALL VENDOR '+vendorname+' TO STALL #'+$('#cmbAssignStallVendorStallNumber').val());
				toastr.success('Stall vendor assignment successful.');
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAssignStallVendor')[0].reset();
				$('#cmbAssignStallVendorStallNumber').dropdown('clear');
			}
			else {
				toastr.error('Stall vendor assignment successful.');
			}
		}
	});
}
//END STALL MANAGEMENT FUNCTIONS


//START WINDOW FUNCTIONS
$('#btnResetStallClosure').on('click',function(){
	$('#frmStallClosure')[0].reset();
	$(this).prop('disabled',true);
	$('#btnStallClosure').prop('disabled',true);
});
$('#btnMMS').click(function(){
	$('#divSidebarMarket').sidebar('toggle');
});
$('#btnDivCreateApplication').click(function(){
	$('.ui.container').not('#divCreateApplication').hide();
	$('#divCreateApplication').show();

	$('#btnDivCreateApplication').toggleClass('active',true);
	$('.item').not('#btnDivCreateApplication').toggleClass('active',false);
});
$('#btnDivApproval').click(function(){
	$('.ui.container').not('#divApproval').hide();
	$('#divApproval').show();

	$('#btnDivApproval').toggleClass('active',true);
	$('.item').not('#btnDivApproval').toggleClass('active',false);
});
$('#btnDivAssignStall').click(function(){
	$('.ui.container').not('#divDivAssignStall').hide();
	$('#divAssignStall').show();

	$('#btnDivAssignStall').toggleClass('active',true);
	$('.item').not('#btnDivAssignStall').toggleClass('active',false);
});
$('#btnDivIssueStallAward').click(function(){
	$('.ui.container').not('#divIssueStallAward').hide();
	$('#divIssueStallAward').show();

	$('#btnDivIssueStallAward').toggleClass('active',true);
	$('.item').not('#btnDivIssueStallAward').toggleClass('active',false);
});
$('#btnDivStallClosure').click(function(){
	$('.ui.container').not('#divStallClosure').hide();
	$('#divStallClosure').show();

	$('#btnDivStallClosure').toggleClass('active',true);
	$('.item').not('#btnDivStallClosure').toggleClass('active',false);
});
$('#btnDivReAssignStall').click(function(){
	$('.ui.container').not('#divReAssignStall').hide();
	$('#divReAssignStall').show();

	$('#btnDivReAssignStall').toggleClass('active',true);
	$('.item').not('#btnDivReAssignStall').toggleClass('active',false);
});

$('#btnDivAddVendor').click(function(){
	$('.ui.container').not('#divAddVendor').hide();
	$('#divAddVendor').show();

	$('#btnDivAddVendor').toggleClass('active',true);
	$('.item').not('#btnDivAddVendor').toggleClass('active',false);
});
$('#btnDivListOfVendors').click(function(){
	$('.ui.container').not('#divListOfVendors').hide();
	$('#divListOfVendors').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivChangePassword').click(function(){
	$('.ui.container').not('#divChangePassword').hide();
	$('#divChangePassword').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
// END WINDOW FUNCTIONS

// START SUBMIT FUNCTIONS
$('#frmAddNewApplication').submit(function(event){
	fnAddNewApplication();
});
$('#frmApproveNewApplication').submit(function(event){
	fnApprovedApplication();
});

$('#frmAddStallVendor').submit(function(event){
	fnAddStallVendor();
});
$('#frmAssignAStall').submit(function(event) {
	fnAssignAStallOwner();
});
$('#frmStallClosure').submit(function(event) {
	fnCloseStall();
});
$('#frmAssignStallVendor').submit(function(event) {
	fnAssignStallVendor();
});

$('#frmReassignStall').submit(function(event) {
	fnReassignStall();
});
// END SUBMIT FUNCTIONS

// LOAD ALL TABLES
fnGetNewApplicants();
fnGetUnassignedStall();
fnGetListOfStallToBeAwarded();
fnGetStallVendors();

//REFRESH TABLES EVERY CRUD
function fnRefreshAllTables() {
	$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
}