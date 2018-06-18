//start computation settings
//account codes
$('#chkEditYearConfigurationStatus').checkbox();
// $('#chkEditYearConfigurationStatus').checkbox({
// 	onChecked: function(){
// 		alert('Hey!');
// 	}
// });
function fnGetAccountCodes() {
	var tblListOfAccountCodes = $('#tblListOfAccountCodes').DataTable({
		ajax:{
			url: serverdir + '/process/getAccountCodes.php?q=all',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'accountcodecode'},
			{'data':'accountcodedesc'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditAccountCode" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteAccountCode" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},
		{
			searchable: false
		}],
		deferRender: true,
		pageLength: 5
	});

	//select account code for edit
	$('#tblListOfAccountCodes tbody').on('click','#btnEditAccountCode', function(event){
		var dataSelect = tblListOfAccountCodes.row( $(this).parents('tr') ).data();
		var accountcodecode = dataSelect['accountcodecode'];

		$.ajax({
			url: serverdir + '/process/getAccountCodes.php?q=search',
			type: 'post',
			data: {'accountcodecode':accountcodecode},
			dataType: 'json',
			success: function (data) {
				if (data != undefined) {
					$('#strAccountCodeToEdit').html(data[0]['accountcodedesc']);
					$('#txthiddenEditAccountCodeCode').val(data[0]['accountcodecode']);
					$('#txtEditAccountCodeCode').val(data[0]['accountcodecode']);
					$('#txtEditAccountCodeDesc').val(data[0]['accountcodedesc']);
				}
				else {
					toastr.error('Something went wrong.');
				}
			}
		});

		$('[data-remodal-id=modalEditAccountCode]').remodal({
			closeOnOutsideClick: false
		}).open();
	});

	//delete account code
	$('#tblListOfAccountCodes tbody').on('click','#btnDeleteAccountCode', function(event){
		var dataSelect = tblListOfAccountCodes.row( $(this).parents('tr') ).data();
		var accountcodecode = dataSelect['accountcodecode'];

		if (confirm('Confirm delete?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteAccountCode.php',
				type: 'post',
				data: {'accountcodecode':accountcodecode},
				dataType: 'html',
				success: function(result){
					if (result == true) {
						fnHistoryLog('DELETE ACCOUNT CODE: '+accountcodecode);
						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
						toastr.success('Account code: '+accountcodecode+' delete successful.');
					}
					else {
						toastr.error('Account code: '+accountcodecode+' delete failed.');
					}
				}
			});
		}
	});
}
fnGetAccountCodes();
function fnAddAccountCode() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addAccountCode.php',
		type: 'post',
		data: {
			'txtAddAccountCodeCode':$('#txtAddAccountCodeCode').val(),
			'txtAddAccountCodeDesc':$('#txtAddAccountCodeDesc').val()
		},
		success: function(result) {
			if (result == true) {
				fnHistoryLog('ADD ACCOUNT CODE: '+$('#txtAddAccountCodeCode').val());
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				toastr.success('Account code: '+$('#txtAddAccountCodeCode').val()+' add successful.');

				$('#frmAddAccountCode')[0].reset();
			}
			else {
				toastr.error('Account code: '+$('#txtAddAccountCodeCode').val()+' add failed.');
			}
		}
	});
}
$('#frmAddAccountCode').submit(function(event){
	fnAddAccountCode();
});
function fnEditAccountCode() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editAccountCode.php',
		type: 'post',
		data: {
			'txthiddenEditAccountCodeCode'	:$('#txthiddenEditAccountCodeCode').val(),
			'txtEditAccountCodeCode'		:$('#txtEditAccountCodeCode').val(),
			'txtEditAccountCodeDesc'		:$('#txtEditAccountCodeDesc').val()
		},
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT ACCOUNT CODE: '+$('#txthiddenEditAccountCodeCode').val());
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				toastr.success('Account code: '+$('#txthiddenEditAccountCodeCode').val()+' edit successful.');

				$('#frmEditAccountCode')[0].reset();

				$('[data-remodal-id=modalEditAccountCode]').remodal().close();
			}
			else {
				toastr.error('Account code: '+$('#txtEditAccountCodeCode').val()+' edit failed.');
			}
		}
	});
}
$('#frmEditAccountCode').submit(function(event){
	fnEditAccountCode();
});
function fnGetServices() {
	var tblListOfServices = $('#tblListOfServices').DataTable({
		ajax:{
			url: serverdir + '/process/getServices.php?q=all',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'serviceid'},
			{'data':'servicetype'},
			{'data':'servicedesc'},
			{'data':'servicevalue'},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditRentalFee" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteRentalFee" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});
}
fnGetServices();
// //initialize get areas for fee type rental first
// $.ajax({
// 	url: serverdir + '/process/getAreas.php',
// 	method: 'get',
// 	cache: false,
// 	dataType: 'json',
// 	success: function (data) {
// 		if (data != undefined) {
// 			var array = [];
// 			$.each(data, function(i,val){
// 				array.push('<option value = "'+val.areaid+'">'+val.areadesc+'</option>');
// 			});
// 			$('#cmbAddServiceAreaID').html(array);
// 		}
// 		else {
// 			toastr.error('Something went wrong.');
// 		}
// 	}
// });
// $(document).on('click change', '#cmbAddServiceType', function(){
// 	$('#divAddServiceToChange').empty();
// 	if ($(this).val() == "Rental") {
// 		$('#divAddServiceToChange').html('<label>Area:</label><select id = "cmbAddServiceAreaID" name = "cmbAddServiceAreaID" class = "ui small fluid search dropdown" required></select>');
// 		$('#cmbAddServiceAreaID').dropdown();
// 		$.ajax({
// 			url: serverdir + '/process/getAreas.php',
// 			method: 'get',
// 			cache: false,
// 			dataType: 'json',
// 			success: function (data) {
// 				if (data != undefined) {
// 					var array = [];
// 					$.each(data, function(i,val){
// 						array.push('<option value = "'+val.areaid+'">'+val.areadesc+'</option>');
// 					});
// 					$('#cmbAddServiceAreaID').html(array);
// 				}
// 				else {
// 					toastr.error('Something went wrong.');
// 				}
// 			}
// 		});
// 	}
// 	else if ($(this).val() == "Maintenance") {
// 		$('#divAddServiceToChange').html('<label>Business type:</label><select id = "cmbAddServiceBTid" name = "cmbAddServiceBTid" class = "ui small fluid search dropdown" required></select>');
// 		$('#cmbAddServiceBTid').dropdown();
// 		$.ajax({
// 			url: serverdir + '/process/getBusinessType.php',
// 			method: 'get',
// 			cache: false,
// 			dataType: 'json',
// 			success: function (data) {
// 				if (data != undefined) {
// 					var array = [];
// 					$.each(data, function(i,val){
// 						array.push('<option value = "'+val.businessid+'">'+val.businessdesc+'</option>');
// 					});
// 					$('#cmbAddServiceBTid').html(array);
// 				}
// 				else {
// 					toastr.error('Something went wrong.');
// 				}
// 			}
// 		});
// 	}
// 	else if ($(this).val() == "Other") {
// 		$('#divAddServiceToChange').html('<label>Description:</label><input id = "txtAddServiceDescription" name = "txtAddServiceDescription" required>');
// 	}
// });
$('#cmbAddServiceFeeType').on('change click', function(){
	if ($(this).val() == "Dynamic") {
		$('#nudAddServiceValue').prop('disabled',true);
	}
	else if ($(this).val() == "Fixed") {
		$('#nudAddServiceValue').prop('disabled',false);
	}
});
function fnAddService() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addService.php',
		method: 'post',
		data: $('#frmAddService').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ADD SERVICE: '+$('#cmbAddServiceType').val());
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddService')[0].reset();
				toastr.success('Service add successful.');
			}
			else {
				toastr.error('Service add failed.');
			}
		}
	});
}
$('#frmAddService').submit(function(event){
	fnAddService();
});
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// //rental fees
// function fnGetRentalFees() {
// 	var tblListOfRentalFees = $('#tblListOfRentalFees').DataTable({
// 		ajax:{
// 			url: serverdir + '/process/getRentalFees.php?q=all',
// 			dataSrc: '',
// 			processing: true,
// 			serverside: true,
// 		},
// 		columns: [
// 			{'data':'areaid'},
// 			{'data':'areadesc'},
// 			{'data':'rentalfeetype'},
// 			{'data':'rentalfeefee'},
// 			{'data':null}
// 		],
// 		columnDefs: [ {
// 			targets: -1,
// 			data: null,
// 			defaultContent: '<button id="btnEditRentalFee" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteRentalFee" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
// 			orderable: false
// 		},{
// 			searchable: true
// 		}],
// 		pageLength: 5
// 	});

// 	//select rental fee
// 	$('#tblListOfRentalFees tbody').on('click','#btnEditRentalFee', function(event){
// 		var dataSelect = tblListOfRentalFees.row( $(this).parents('tr') ).data();
// 		var areaid = dataSelect['areaid'];

// 		event.preventDefault();
// 		$.ajax({
// 			url: serverdir + '/process/getRentalFees.php?q=search',
// 			type: 'post',
// 			data: {'areaid':areaid},
// 			dataType: 'json',
// 			success: function(data) {
// 				if (data != undefined) {
// 					$('#txthiddenEditRentalFeeID').val(data[0]['areaid']);
// 					$('#strRentalFeeToEdit').html(data[0]['areaid']);
// 					$('#cmbEditRentalFeeAreaDesc').val(data[0]['areaid']);
// 					$('#cmbEditRentalFeeType').val(data[0]['rentalfeetype']);
// 					$('#nudEditRentalFeeFee').val(data[0]['rentalfeefee']);

// 					$('[data-remodal-id=modalEditRentalFee]').remodal({
// 						closeOnOutsideClick: false
// 					}).open();
// 				}
// 				else {
// 					toastr.error('Something went wrong.');
// 				}
// 			}
// 		});
// 	});

// 	//delete rental fee
// 	$('#tblListOfRentalFees tbody').on('click','#btnDeleteRentalFee', function(event){
// 		var dataSelect = tblListOfRentalFees.row( $(this).parents('tr') ).data();
// 		var areaid = dataSelect['areaid'];

// 		if (confirm('Confirm delete?') == true) {
// 			$.ajax({
// 				url: serverdir + '/process/deleteRentalFee.php',
// 				type: 'post',
// 				data: {'areaid':areaid},
// 				dataType: 'html',
// 				success: function (result) {
// 					if (result == true) {
// 						fnHistoryLog('DELETE RENTAL FEE FOR '+dataSelect['areadesc']);
// 						toastr.success('Rental fee for '+dataSelect['areadesc']+' delete successful.');

// 						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
// 					}
// 					else {
// 						toastr.error('Rental fee for '+dataSelect['areadesc']+' delete failed.');
// 					}
// 				}
// 			});
// 		}
// 	});
// }
// fnGetRentalFees();
// $('#cmbAddRentalFeeType').change(function(){
// 	if ($('#cmbAddRentalFeeType').val() == 'Fixed') {
// 		$('#nudAddRentalFeeFee').prop('disabled',false);
// 	}
// 	else if ($('#cmbAddRentalFeeType').val() == 'Dynamic') {
// 		$('#nudAddRentalFeeFee').prop('disabled',true);
// 	}
// });
// function fnAddRentalFee() {
// 	event.preventDefault();
// 	$.ajax({
// 		url: serverdir + '/process/addRentalFee.php',
// 		type: 'post',
// 		data: {
// 			'cmbAddRentalFeeAreaDesc'	: $('#cmbAddRentalFeeAreaDesc').val(),
// 			'cmbAddRentalFeeType'		: $('#cmbAddRentalFeeType').val(),
// 			'nudAddRentalFeeFee'		: $('#nudAddRentalFeeFee').val(),
// 		},
// 		dataType: 'html',
// 		success: function (result) {
// 			if (result == true) {
// 				fnHistoryLog('ADD RENTAL FEE: ' + $('#cmbAddRentalFeeType').val() + '('+$('#nudAddRentalFeeFee').val()+' PHP)');
// 				toastr.success('Rental fee: ' + $('#cmbAddRentalFeeType').val() + '('+$('#nudAddRentalFeeFee').val()+' PHP) add successful.');
// 				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
// 				$('#cmbAddRentalFeeType').dropdown('clear');

// 				$('#frmAddRentalFee')[0].reset();
// 			}
// 			else {
// 				toastr.error('Rental fee: ' + $('#cmbAddRentalFeeType').val() + '('+$('#nudAddRentalFeeFee').val()+' PHP) add failed.');
// 			}
// 		}
// 	});
// }
// $('#frmAddRentalFee').submit(function(event){
// 	fnAddRentalFee();
// });
// function fnEditRentalFee() {
// 	event.preventDefault();
// 	$.ajax({
// 		url: serverdir + '/process/editRentalFee.php',
// 		type: 'post',
// 		data: {
// 			'txthiddenEditRentalFeeID'	:$('#txthiddenEditRentalFeeID').val(),
// 			'cmbEditRentalFeeAreaDesc'	:$('#cmbEditRentalFeeAreaDesc').val(),
// 			'cmbEditRentalFeeType'		:$('#cmbEditRentalFeeType').val(),
// 			'nudEditRentalFeeFee'		:$('#nudEditRentalFeeFee').val()
// 		},
// 		dataType: 'html',
// 		success: function(result) {
// 			if (result == true) {
// 				fnHistoryLog('EDIT RENTAL FEE ('+$('#txthiddenEditRentalFeeID').val()+'): ' + $('#cmbEditRentalFeeType').val() + '('+$('#nudEditRentalFeeFee').val()+' PHP)');
// 				toastr.success('Rental fee ('+$('#txthiddenEditRentalFeeID').val()+'): ' + $('#cmbEditRentalFeeType').val() + '('+$('#nudEditRentalFeeFee').val()+' PHP) edit successful.');

// 				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

// 				$('#frmEditRentalFee')[0].reset();
// 				$('[data-remodal-id=modalEditRentalFee]').remodal().close();
// 			}
// 			else {
// 				toastr.error('Rental fee ('+$('#txthiddenEditRentalFeeID').val()+'): ' + $('#cmbEditRentalFeeType').val() + '('+$('#nudEditRentalFeeFee').val()+' PHP) edit failed.');
// 			}
// 		}
// 	});
// }
// $('#frmEditRentalFee').submit(function(event){
// 	fnEditRentalFee();
// });
// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// //maintenance fees
// function fnGetMaintenanceFees() {
// 	var tblListOfMaintenanceFees = $('#tblListOfMaintenanceFees').DataTable({
// 		ajax:{
// 			url: serverdir + '/process/getMaintenanceFees.php?q=all',
// 			dataSrc: '',
// 			processing: true,
// 			serverside: true,
// 		},
// 		columns: [
// 			{'data':'maintenancefeeid'},
// 			{'data':'maintenancefeefee'},
// 			{'data':'BTdesc'},
// 			{'data':null}
// 		],
// 		columnDefs: [ {
// 			targets: -1,
// 			data: null,
// 			defaultContent: '<button id="btnEditMaintenanceFee" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteMaintenanceFee" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
// 			orderable: false
// 		},{
// 			searchable: true
// 		}],
// 		pageLength: 5
// 	});

// 	$('#tblListOfMaintenanceFees tbody').on('click','#btnEditMaintenanceFee', function(event){
// 		var dataSelect = tblListOfMaintenanceFees.row( $(this).parents('tr') ).data();
// 		var maintenancefeeid = dataSelect['maintenancefeeid'];

// 		event.preventDefault();
// 		$.ajax({
// 			url: serverdir + '/process/getMaintenanceFees.php?q=search',
// 			type: 'post',
// 			data: {'maintenancefeeid':maintenancefeeid},
// 			dataType: 'json',
// 			success: function (data) {
// 				if (data != undefined) {
// 					$('#strMaintenanceFeeToEdit').html(data[0]['maintenancefeeid']);
// 					$('#txthiddenEditMaintenanceFeeID').val(data[0]['maintenancefeeid']);
// 					$('#cmbEditMaintenanceFeeBusinessTypeID').dropdown('set selected',data[0]['BTid']);
// 					$('#nudEditMaintenanceFeeFee').val(data[0]['maintenancefeefee'])

// 					$('[data-remodal-id=modalEditMaintenanceFee]').remodal({
// 						closeOnOutsideClick: false
// 					}).open();
// 				}
// 				else {
// 					toastr.error('Something went wrong.');
// 				}
// 			}
// 		});
// 	});

// 	$('#tblListOfMaintenanceFees tbody').on('click','#btnDeleteMaintenanceFee', function(event){
// 		var dataSelect = tblListOfMaintenanceFees.row( $(this).parents('tr') ).data();
// 		var maintenancefeeid = dataSelect['maintenancefeeid'];

// 		if (confirm('Confirm delete?') == true) {
// 			$.ajax({
// 				url: serverdir + '/process/deleteMaintenanceFee.php',
// 				type: 'post',
// 				data: {
// 					'maintenancefeeid':maintenancefeeid
// 				},
// 				dataType: 'html',
// 				success: function (result) {
// 					console.log(result);
// 					if (result == true) {
// 						fnHistoryLog('DELETE MAINTENANCE FEE: '+maintenancefeeid);
// 						toastr.success('Maintenance fee: '+maintenancefeeid+' delete successful.');

// 						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
// 					}
// 					else {
// 						toastr.error('Maintenance fee: '+maintenancefeeid+' delete failed.');
// 					}
// 				}
// 			});
// 		}
// 	});
// }
// fnGetMaintenanceFees();
// function fnAddMaintenanceFee() {
// 	event.preventDefault();
// 	$.ajax({
// 		url: serverdir + '/process/addMaintenanceFee.php',
// 		type: 'post',
// 		data: {
// 			'cmbAddMaintenanceFeeBusinessTypeID':$('#cmbAddMaintenanceFeeBusinessTypeID').val(),
// 			'nudAddMaintenanceFeeFee'			:$('#nudAddMaintenanceFeeFee').val()
// 		},
// 		dataType: 'html',
// 		success: function (result) {
// 			if (result == true) {
// 				fnHistoryLog('ADD MAINTENANCE FEE (VALUE: '+$('#nudAddMaintenanceFeeFee').val()+' PHP) FOR BUSINESS TYPE '+$('#cmbAddMaintenanceFeeBusinessTypeID').val());
// 				toastr.success('Maintenance fee (VALUE: '+$('#nudAddMaintenanceFeeFee').val()+' PHP) for business type '+$('#cmbAddMaintenanceFeeBusinessTypeID').val()+' add successful.');

// 				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
// 				$('#frmAddMaintenanceFee')[0].reset();
// 			}
// 			else {
// 				toastr.error('Maintenance fee (VALUE: '+$('#nudAddMaintenanceFeeFee').val()+' PHP) for business type '+$('#cmbAddMaintenanceFeeBusinessTypeID').val()+' add failed.');
// 			}
// 		}
// 	});
// }
// $('#frmAddMaintenanceFee').submit(function(event){
// 	fnAddMaintenanceFee();
// });
// function fnEditMaintenanceFee() {
// 	event.preventDefault();
// 	$.ajax({
// 		url: serverdir + '/process/editMaintenanceFee.php',
// 		type: 'post',
// 		data: {
// 			'txthiddenEditMaintenanceFeeID'			:$('#txthiddenEditMaintenanceFeeID').val(),
// 			'cmbEditMaintenanceFeeBusinessTypeID'	:$('#cmbEditMaintenanceFeeBusinessTypeID').val(),
// 			'nudEditMaintenanceFeeFee'				:$('#nudEditMaintenanceFeeFee').val(),
// 		},
// 		dataType: 'html',
// 		success: function (result) {
// 			if (result) {
// 				fnHistoryLog('EDIT MAINTENANCE FEE: '+$('#cmbEditMaintenanceFeeBusinessTypeID').val());
// 				toastr.success('Maintenance fee: '+$('#cmbEditMaintenanceFeeBusinessTypeID').val()+' edit successful.');
// 				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

// 				$('#frmEditMaintenanceFee')[0].reset();

// 				$('[data-remodal-id=modalEditMaintenanceFee]').remodal().close();
// 			}
// 			else {
// 				toastr.error('Maintenance fee: '+$('#cmbEditMaintenanceFeeBusinessTypeID').val()+' edit failed.');
// 			}
// 		}
// 	});
// }
// $('#frmEditMaintenanceFee').submit(function(event) {
// 	fnEditMaintenanceFee();
// });
// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// function fnGetOtherFees() {
// 	var tblListOfOtherFees = $('#tblListOfOtherFees').DataTable({
// 		ajax:{
// 			url: serverdir + '/process/getOtherFees.php?q=all',
// 			dataSrc: '',
// 			processing: true,
// 			serverside: true,
// 		},
// 		columns: [
// 			{'data':'otherfeeid'},
// 			{'data':'otherfeedesc'},
// 			{'data':'otherfeevalue'},
// 			{'data':null}
// 		],
// 		columnDefs: [ {
// 			targets: -1,
// 			data: null,
// 			defaultContent: '<button id="btnEditOtherFee" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteOtherFee" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
// 			orderable: false
// 		},{
// 			searchable: true
// 		}],
// 		pageLength: 5
// 	});

// 	$('#tblListOfOtherFees tbody').on('click','#btnEditOtherFee', function(event){
// 		var dataSelect = tblListOfOtherFees.row( $(this).parents('tr') ).data();
// 		var otherfeeid = dataSelect['otherfeeid'];

// 		$.ajax({
// 			url: serverdir + '/process/getOtherFees.php?q=search',
// 			type: 'post',
// 			data: {'otherfeeid':otherfeeid},
// 			dataType: 'json',
// 			success: function (data) {
// 				if (data != undefined) {
// 					$('#strOtherFeeToEdit').html(data[0]['otherfeedesc']);
// 					$('#txthiddenEditOtherFeeID').val(data[0]['otherfeeid']);
// 					$('#txtEditOtherFeeDesc').val(data[0]['otherfeedesc']);
// 					$('#nudEditOtherFeeValue').val(data[0]['otherfeevalue']);

// 					$('[data-remodal-id=modalEditOtherFee]').remodal({
// 						closeOnOutsideClick: false
// 					}).open();
// 				}
// 				else {
// 					toastr.error('Something went wrong.');
// 				}
// 			}
// 		});
// 	});

// 	$('#tblListOfOtherFees tbody').on('click','#btnDeleteOtherFee', function(event){
// 		var dataSelect = tblListOfOtherFees.row( $(this).parents('tr') ).data();
// 		var otherfeeid = dataSelect['otherfeeid'];

// 		if (confirm('Confirm delete?') == true) {
// 			$.ajax({
// 				url: serverdir + '/process/deleteOtherFee.php',
// 				type: 'post',
// 				data: {'otherfeeid':otherfeeid},
// 				dataType: 'html',
// 				success: function (result) {
// 					if (result) {
// 						fnHistoryLog('DELETE OTHER FEE: '+$('#txtAddOtherFeeDesc').val()+' (PHP '+$('#nudAddOtherFeeValue').val()+')');
// 						toastr.success('Other fee: '+$('#txtAddOtherFeeDesc').val()+' (PHP '+$('#nudAddOtherFeeValue').val()+') delete successful.');
// 						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
// 					}
// 					else {
// 						toastr.error('Other fee: '+dataSelect['otherfeedesc']+' (PHP '+dataSelect['otherfeevalue']+') delete failed.');
// 					}
// 				}
// 			});
// 		}
// 	});
// }
// fnGetOtherFees();
// function fnAddOtherFee() {
// 	event.preventDefault();
// 	$.ajax({
// 		url: serverdir + '/process/addOtherFee.php',
// 		type: 'post',
// 		data: {
// 			'txtAddOtherFeeDesc'	:$('#txtAddOtherFeeDesc').val(),
// 			'nudAddOtherFeeValue'	:$('#nudAddOtherFeeValue').val()
// 		},
// 		dataType: 'html',
// 		success: function (result) {
// 			if (result) {
// 				fnHistoryLog('ADD OTHER FEE: '+$('#txtAddOtherFeeDesc').val()+' (PHP '+$('#nudAddOtherFeeValue').val()+')');
// 				toastr.success('Other fee: '+$('#txtAddOtherFeeDesc').val()+' (PHP '+$('#nudAddOtherFeeValue').val()+') add successful.');
// 				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

// 				$('#frmAddOtherFee')[0].reset();
// 			}
// 			else {
// 				toastr.error('Other fee: '+$('#txtAddOtherFeeDesc').val()+' ('+$('#nudAddOtherFeeValue').val()+') add failed.');
// 			}
// 		}
// 	});
// }
// $('#frmAddOtherFee').submit(function(event) {
// 	fnAddOtherFee();
// });
// function fnEditOtherFee() {
// 	event.preventDefault();
// 	$.ajax({
// 		url: serverdir + '/process/editOtherFee.php',
// 		type: 'post',
// 		data: {
// 			'txthiddenEditOtherFeeID'	:$('#txthiddenEditOtherFeeID').val(),
// 			'txtEditOtherFeeDesc'		:$('#txtEditOtherFeeDesc').val(),
// 			'nudEditOtherFeeValue'		:$('#nudEditOtherFeeValue').val()
// 		},
// 		dataType: 'html',
// 		success: function (result) {
// 			if (result) {
// 				fnHistoryLog('EDIT OTHER FEE: '+$('#txtEditOtherFeeDesc').val()+' ('+$('#nudEditOtherFeeValue').val()+')');
// 				toastr.success('Other fee: '+$('#txtEditOtherFeeDesc').val()+' (PHP '+$('#nudEditOtherFeeValue').val()+') edit successful.');
// 				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

// 				$('#frmEditOtherFee')[0].reset();

// 				$('[data-remodal-id=modalEditOtherFee]').remodal().close();
// 			}
// 			else {
// 				toastr.error('Other fee: '+$('#txtEditOtherFeeDesc').val()+' (PHP '+$('#nudEditOtherFeeValue').val()+') edit failed.');
// 			}
// 		}
// 	});
// }
// $('#frmEditOtherFee').submit(function(event) {
// 	fnEditOtherFee();
// });
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function fnGetActiveYearConfiguration() {
	$.ajax({
		url: serverdir + '/process/getYearConfigurations.php?q=active',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function (data) {
			if (data.length <= 0) {
				toastr.warning('No year configuration set.');
			}
			else {
				// $('#txtAddYearConfigurationCurrent').val(data[0]['yearconfyear']);
				toastr.info('Year configuration is set to '+data[0]['yearconfyear']+'.');
			}
		}
	});
}
fnGetActiveYearConfiguration();
function fnGetYearConfigurations() {
	var tblListOfYearConfigurations = $('#tblListOfYearConfigurations').DataTable({
		ajax:{
			url: serverdir + '/process/getYearConfigurations.php?q=all',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'yearconfyear'},
			{'data':'yearconfstatus'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id = "btnChangeYearConfigurationStatus" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteYearConfiguration" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$('#tblListOfYearConfigurations tbody').on('click','#btnChangeYearConfigurationStatus', function(event){
		var dataSelect = tblListOfYearConfigurations.row( $(this).parents('tr') ).data();
		var yearconfyear = dataSelect['yearconfyear'];

		$.ajax({
			url: serverdir + '/process/getYearConfigurations.php?q=search',
			type: 'post',
			data: {'yearconfyear':yearconfyear},
			dataType: 'json',
			success: function (data) {
				if (data != undefined) {
					$('#txthiddenEditYearConfigurationYear,#txtEditYearConfigurationYear').val(data[0]['yearconfyear']);
					$('#strYearConfigurationToEdit').html(data[0]['yearconfyear']);

					if (data[0]['yearconfstatus'] == 'Active') {
						$('#chkEditYearConfigurationStatus').checkbox('check');
					}
					else if (data[0]['yearconfstatus'] == 'Inactive') {
						$('#chkEditYearConfigurationStatus').checkbox('uncheck');
					}

					$('[data-remodal-id=modalEditYearConfiguration]').remodal({
						closeOnOutsideClick: false
					}).open();
				}
				else {
					toastr.error('Something went wrong.');
				}
				// console.log(data);
			}
		});
	});

	$('#tblListOfYearConfigurations tbody').on('click','#btnDeleteYearConfiguration', function(event){
		var dataSelect = tblListOfYearConfigurations.row( $(this).parents('tr') ).data();
		var yearconfyear = dataSelect['yearconfyear'];

		if (confirm('Confirm delete?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteYearConfiguration.php',
				type: 'post',
				data: {'yearconfyear':yearconfyear},
				dataType: 'html',
				success: function (result) {
					if (result) {
						fnHistoryLog('DELETE YEAR CONFIGURATION: '+yearconfyear);
						toastr.success('Year configuration: '+yearconfyear+' delete successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

						$('#frmAddYearConfiguration')[0].reset();

						fnGetActiveYearConfiguration();
					}
					else {

					}
				}
			});
		}
	});

	$('#chkEditYearConfigurationStatus').checkbox({
		onChecked: function() {
			if (confirm('Confirm change status of year configuration: '+$('#txthiddenEditYearConfigurationYear').val()+'?') == true) {
				$.ajax({
					url: serverdir + '/process/editYearConfiguration.php?q=change_status&to=active',
					type: 'post',
					data: {'yearconfyear':$('#txthiddenEditYearConfigurationYear').val()},
					dataType: 'html',
					success: function (result) {
						if (result) {
							fnHistoryLog('CHANGE YEAR CONFIGURATION TO '+$('#txthiddenEditYearConfigurationYear').val());
							toastr.success('Year configuration change successful');

							$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

							$('[data-remodal-id=modalEditYearConfiguration]').remodal().close();
						}
						else {

						}
						fnGetActiveYearConfiguration();
					}
				});
			}
			else {
				$('#chkEditYearConfigurationStatus').checkbox('set unchecked');
			}
		},
		onUnchecked: function() {
			if (confirm('Confirm change status of year configuration: '+$('#txthiddenEditYearConfigurationYear').val()+'?') == true) {
				$.ajax({
					url: serverdir + '/process/editYearConfiguration.php?q=change_status&to=inactive',
					type: 'post',
					data: {'yearconfyear':$('#txthiddenEditYearConfigurationYear').val()},
					dataType: 'html',
					success: function (result) {
						if (result) {
							fnHistoryLog('CHANGE YEAR CONFIGURATION TO '+$('#txthiddenEditYearConfigurationYear').val());
							toastr.success('Year configuration change successful');

							$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

							$('[data-remodal-id=modalEditYearConfiguration]').remodal().close();
						}
						else {

						}
						fnGetActiveYearConfiguration();
					}
				});
			}
			else {
				$('#chkEditYearConfigurationStatus').checkbox('set checked');
			}
		}
	});
}
fnGetYearConfigurations();
function fnAddYearConfiguration() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addYearConfiguration.php',
		type: 'post',
		data: {
			'txtAddYearConfigurationYear'	: $('#txtAddYearConfigurationYear').val(),
			'cmbAddYearConfigurationStatus'	: $('#cmbAddYearConfigurationStatus').val(),
		},
		dataType: 'html',
		success: function (result) {
			console.log(result);
			if (result) {
				fnHistoryLog('ADD YEAR CONFIGURATION: '+$('#txtAddYearConfigurationYear').val());
				toastr.success('Year configuration: '+$('#txtAddYearConfigurationYear').val()+' add successful.');
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

				$('#frmAddYearConfiguration')[0].reset();

				fnGetActiveYearConfiguration();
			}
			else {

			}
		}
	});
}
$('#frmAddYearConfiguration').submit(function(event){
	fnAddYearConfiguration();
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('#btnDivAccountCodes').click(function(){
	$('.ui.container').not('#divAccountCodes').hide();
	$('#divAccountCodes').show();

	$('#btnDivAccountCodes').toggleClass('active',true);
	$('.item').not('#btnDivAccountCodes').toggleClass('active',false);
});
$('#btnDivTicketDenominations').click(function(){
	$('.ui.container').not('#divTicketDenominations').hide();
	$('#divTicketDenominations').show();

	$('#btnDivTicketDenominations').toggleClass('active',true);
	$('.item').not('#btnDivTicketDenominations').toggleClass('active',false);
});
// $('#btnDivRentalFees').click(function(){
// 	$('.ui.container').not('#divRentalFees').hide();
// 	$('#divRentalFees').show();

// 	$('#btnDivRentalFees').toggleClass('active',true);
// 	$('.item').not('#btnDivRentalFees').toggleClass('active',false);
// });
// $('#btnDivMaintenanceFees').click(function(){
// 	$('.ui.container').not('#divMaintenanceFees').hide();
// 	$('#divMaintenanceFees').show();

// 	$('#btnDivMaintenanceFees').toggleClass('active',true);
// 	$('.item').not('#btnDivMaintenanceFees').toggleClass('active',false);
// });
// $('#btnDivOtherFees').click(function(){
// 	$('.ui.container').not('#divOtherFees').hide();
// 	$('#divOtherFees').show();

// 	$('#btnDivOtherFees').toggleClass('active',true);
// 	$('.item').not('#btnDivOtherFees').toggleClass('active',false);
// });
$('#btnDivServices').click(function(){
	$('.ui.container').not('#divServices').hide();
	$('#divServices').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivSurcharges').click(function(){
	$('.ui.container').not('#divSurcharges').hide();
	$('#divSurcharges').show();

	$('#btnDivSurcharges').toggleClass('active',true);
	$('.item').not('#btnDivSurcharges').toggleClass('active',false);
});
$('#btnDivYearConfiguration').click(function(){
	$('.ui.container').not('#divYearConfiguration').hide();
	$('#divYearConfiguration').show();

	$('#btnDivYearConfiguration').toggleClass('active',true);
	$('.item').not('#btnDivYearConfiguration').toggleClass('active',false);
});