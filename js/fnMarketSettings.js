//START EEM SETTINGS
function fnGetBusinessClassifications() {
	var tblListOfBusinessClassifications = $('#tblListOfBusinessClassifications').DataTable({
		ajax:{
			url: serverdir + '/process/getBusinessClassifications.php',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'BCid'},
			{'data':'BCdesc'},
			{'data':'BCrange',
				render: function(data, type, BCrange, meta) {
					return BCrange.BCrangefrom + ' - ' + BCrange.BCrangeto;
				}
			},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditBusinessClassifications" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteBusinessClassifications" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$('#tblListOfBusinessClassifications tbody').on('click','#btnEditBusinessClassifications',function(event){
		var dataSelect = tblListOfBusinessClassifications.row( $(this).parents('tr') ).data();
		var BCid = dataSelect['BCid'];
		$('[data-remodal-id=modalEditBusinessClassifications]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(BCid);
		$.ajax({
			url: serverdir + '/process/selectBusinessClassification.php',
			type: 'post',
			data: {'BCid':BCid},
			dataType: 'json',
			success: function(result) {
				if (result !== undefined) {
					$('#strBCToUpdate').html(result[0]['BCdesc']);
					$('#txthiddenEditBusinessClassificationID').val(result[0]['BCid']);
					$('#txtEditBusinessClassificationDesc').val(result[0]['BCdesc']);
					$('#txtEditBusinessClassificationInvestmentFrom').val(result[0]['BCrangefrom']);
					$('#txtEditBusinessClassificationInvestmentTo').val(result[0]['BCrangeto']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfBusinessClassifications tbody').on('click','#btnDeleteBusinessClassifications',function(event){
		var dataSelect = tblListOfBusinessClassifications.row( $(this).parents('tr') ).data();
		var BCid = dataSelect['BCid'];

		if (confirm('Delete business classification: '+dataSelect['BCdesc']+'?') ==  true) {
			$.ajax({
				url: serverdir + '/process/deleteBusinessClassification.php',
				type: 'post',
				data: {'BCid':BCid},
				dataType: 'html',
				success: function (result) {
					if (result == true) {
						fnHistoryLog('DELETE BUSINESS CLASSIFICATION: '+dataSelect['BCdesc']);
						toastr.success('Business classification '+dataSelect['BCdesc']+' delete successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
					}
					else {
						toastr.error('Business classification '+dataSelect['BCdesc']+' delete failed.');
					}
				}
			});
		}
	});
}
function fnAddBusinessClassificationValidateRange() {
	var floatAddRangeFrom = parseFloat($('#txtAddBusinessClassificationInvestmentFrom').val());
	var floatAddRangeTo = parseFloat($('#txtAddBusinessClassificationInvestmentTo').val());

	if (floatAddRangeFrom >= floatAddRangeTo) {
		$('#strAddBusinessClassificationValidateNotif').html('Invalid range.');
		$('#btnAddBusinessClassification').prop('disabled',true);
	}
	else {
		$('#strAddBusinessClassificationValidateNotif').html('');
		$('#btnAddBusinessClassification').prop('disabled',false);
	}
}
function fnEditBusinessClassificationValidateRange() {
	var floatEditRangeFrom = parseFloat($('#txtEditBusinessClassificationInvestmentFrom').val());
	var floatEditRangeTo = parseFloat($('#txtEditBusinessClassificationInvestmentTo').val());

	if (floatEditRangeFrom >= floatEditRangeTo) {
		$('#strEditBusinessClassificationValidateNotif').html('Invalid range.');
		$('#btnEditBusinessClassification').prop('disabled',true);
	}
	else {
		$('#strEditBusinessClassificationValidateNotif').html('');
		$('#btnEditBusinessClassification').prop('disabled',false);
	}
}
function fnAddBusinessClassification() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addBusinessClassification.php',
		type: 'post',
		data: $('#frmAddBusinessClassification').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ADD BUSINESS CLASSIFICATION: '+$('#txtAddBusinessClassificationDesc').val());
				toastr.success('Business classification: '+$('#txtAddBusinessClassificationDesc').val()+' add successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddBusinessClassification')[0].reset();
				// console.log('1');
			}
			else {
				toastr.error('Business classification: '+$('#txtAddBusinessClassificationDesc').val()+' add failed.');
			}
		}
	});
}
function fnEditBusinessClassification() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editBusinessClassification.php',
		type: 'post',
		data: $('#frmEditBusinessClassification').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT BUSINESS CLASSIFICATION: '+$('#txtEditBusinessClassificationDesc').val());
				toastr.success('Business classification '+$('#txtEditBusinessClassificationDesc').val()+' edit successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditBusinessClassification')[0].reset();
				$('[data-remodal-id=modalEditBusinessClassifications]').remodal().close();
				// console.log('1');
			}
			else {
				toastr.error('Business classification '+$('#txtEditBusinessClassificationDesc').val()+' edit failed.');
				
    			// console.log('0');
			}
		}
	});
}
function fnGetBusinessTypes() {
	var tblListOfBusinessTypes = $('#tblListOfBusinessTypes').DataTable({
		ajax:{
			url: serverdir + '/process/getBusinessTypes.php',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'BTid'},
			{'data':'BTdesc'},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditBusinessType" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteBusinessType" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$.ajax({
		url: serverdir + '/process/getBusinessTypes.php',
		dataType: 'json',
		success: function (data) {
			if (data !== undefined) {
				$('#cmbAddGoodsCommoditiesBusinessTypeID,#cmbEditGoodsCommoditiesBusinessTypeID,#cmbAddMaintenanceFeeBusinessTypeID,#cmbEditMaintenanceFeeBusinessTypeID,#cmbEditNewApplicationBusinessType,#cmbAddNewApplicationBusinessType').empty();
				// $.each(data, function (i,val) {
				// 	$('#cmbAddGoodsCommoditiesBusinessTypeID').append('<option value = "'+val.BTid+'">'+val.BTdesc+'</option>');
				// 	$('#cmbEditGoodsCommoditiesBusinessTypeID').append('<option value = "'+val.BTid+'">'+val.BTdesc+'</option>');

				// 	$('#cmbAddMaintenanceFeeBusinessTypeID').append('<option value = "'+val.BTid+'">'+val.BTdesc+'</option>');
				// 	$('#cmbEditMaintenanceFeeBusinessTypeID').append('<option value = "'+val.BTid+'">'+val.BTdesc+'</option>');

				// 	$('#cmbEditNewApplicationBusinessType').append('<option value = '+val.BTid+'>'+val.BTdesc+'</option>');
				// 	$('#cmbAddNewApplicationBusinessType').append('<option value = '+val.BTid+'>'+val.BTdesc+'</option>');
				// });
				var array = [];
				for (var i = 0; i < data.length; i++) {
					array.push('<option value = "'+data[i]['BTid']+'">'+data[i]['BTdesc']+'</option>');
					$('#cmbAddGoodsCommoditiesBusinessTypeID,#cmbEditGoodsCommoditiesBusinessTypeID,#cmbAddMaintenanceFeeBusinessTypeID,#cmbEditMaintenanceFeeBusinessTypeID,#cmbEditNewApplicationBusinessType,#cmbAddNewApplicationBusinessType').html(array);
				}
			}
			else {
				toastr.error('An error occured. Please try again.');
				
				// console.log('0');
			}
		}
	});

	$('#tblListOfBusinessTypes tbody').on('click','#btnEditBusinessType',function(event){
		var dataSelect = tblListOfBusinessTypes.row( $(this).parents('tr') ).data();
		var BTid = dataSelect['BTid'];
		$('[data-remodal-id=modalEditBusinessTypes]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(BTid);
		$.ajax({
			url: serverdir + '/process/selectBusinessType.php',
			type: 'post',
			data: {'BTid':BTid},
			dataType: 'json',
			success: function(result) {
				if (result !== undefined) {
					$('#strBTToUpdate').html(result[0]['BTdesc']);
					$('#txthiddenEditBusinessTypeID').val(result[0]['BTid']);
					$('#txtEditBusinessTypeDesc').val(result[0]['BTdesc']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfBusinessTypes tbody').on('click','#btnDeleteBusinessType',function(event){
		var dataSelect = tblListOfBusinessTypes.row( $(this).parents('tr') ).data();
		var BTid = dataSelect['BTid'];

		if (confirm('Delete business type: '+dataSelect['BTdesc']+'?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteBusinessType.php',
				type: 'post',
				data: {'BTid':BTid},
				dataType: 'html',
				success: function(result) {
					if (result == true) {
						fnHistoryLog('DELETE BUSINESS TYPE: '+dataSelect['BTdesc']);
						toastr.success('Business type: '+dataSelect['BTdesc']+' delete successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
					}
					else {
						toastr.error('Business type: '+dataSelect['BTdesc']+' delete failed.');
					}
				}
			});
		}
	});
}
function fnAddBusinessType() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addBusinessType.php',
		type: 'post',
		data: $('#frmAddBusinessType').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('ADD BUSINESS TYPE: '+$('#txtAddBusinessTypeDesc').val());
				toastr.success('Business type: '+$('#txtAddBusinessTypeDesc').val()+' add successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddBusinessType')[0].reset();
				// console.log('1');
			}
			else {
				toastr.error('Business type: '+$('#txtAddBusinessTypeDesc').val()+' add failed.');
				
    			// console.log('0');
			}
		}
	});
}
function fnEditBusinessType() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editBusinessType.php',
		type: 'post',
		data: $('#frmEditBusinessType').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT BUSINESS TYPE: '+$('#txtEditBusinessTypeDesc').val());
				toastr.success('Edit business type successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditBusinessType')[0].reset();
				$('[data-remodal-id=modalEditBusinessTypes]').remodal().close();
				// console.log('1');
			}
			else {
				toastr.error('Edit business type failed.');
				
    			// console.log('0');
			}
		}
	});
}
function fnGetGoodsCommodities() {
	$.fn.DataTable.ext.pager.numbers_length = 3;
	var tblListOfGoodsCommodities = $('#tblListOfGoodsCommodities').DataTable({
		ajax:{
			url: serverdir + '/process/getGoodsCommodities.php?q=all',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'GCid'},
			{'data':'BTdesc'},
			{'data':'GCdesc'},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditGoodsCommodities" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteGoodsCommodities" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5,
		bInfo: false
	});

	$('#tblListOfGoodsCommodities tbody').on('click','#btnEditGoodsCommodities',function(event){
		var dataSelect = tblListOfGoodsCommodities.row( $(this).parents('tr') ).data();
		var GCid = dataSelect['GCid'];
		$('[data-remodal-id=modalEditGoodsCommodities]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(GCid);
		$.ajax({
			url: serverdir + '/process/selectGoodsCommodities.php',
			type: 'post',
			data: {'GCid':GCid},
			dataType: 'json',
			success: function(result) {
				if (result !== undefined) {
					$('#strGCToUpdate').html(result[0]['GCdesc']);
					$('#txthiddenEditGoodsCommoditiesID').val(result[0]['GCid']);
					$('#txtEditGoodsCommoditiesDesc').val(result[0]['GCdesc']);
					$('#cmbEditGoodsCommoditiesBusinessTypeID').dropdown('set selected',result[0]['BTid']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfGoodsCommodities tbody').on('click','#btnDeleteGoodsCommodities',function(event){
		var dataSelect = tblListOfGoodsCommodities.row( $(this).parents('tr') ).data();
		var GCid = dataSelect['GCid'];

		if (confirm('Delete good/commodity: '+dataSelect['GCdesc']+'?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteGoodsCommodities.php',
				type: 'post',
				data: {'GCid':GCid},
				dataType: 'html',
				success: function (result) {
					if (result == true) {
						fnHistoryLog('DELETE GOOD/COMMODITY: '+dataSelect['GCdesc']);
						toastr.success('Good/commodity: '+dataSelect['GCdesc']+' delete successful');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
					}
					else {
						toastr.error('Good/commodity: '+dataSelect['GCdesc']+' delete failed');
					}
				}
			});
		}
	});
}
function fnAddGoodsCommodities() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addGoodsCommodities.php',
		type: 'post',
		data: $('#frmAddGoodsCommodities').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ADD GOOD/COMMODITY: '+$('#txtAddGoodsCommoditiesDesc').val());
				toastr.success('Good/commodity: '+$('#txtAddGoodsCommoditiesDesc').val()+' add successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddGoodsCommodities')[0].reset();
				// console.log('1');
			}
			else {
				toastr.error('Good/commodity: '+$('#txtAddGoodsCommoditiesDesc').val()+' add failed.');
			}
		}
	});
}
function fnEditGoodsCommodities() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editGoodsCommodities.php',
		type: 'post',
		data: $('#frmEditGoodsCommodities').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT GOOD/COMMODITY: '+$('#txtEditGoodsCommoditiesDesc').val());
				toastr.success('Good/commodity: '+$('#txtEditGoodsCommoditiesDesc').val()+' add successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditGoodsCommodities')[0].reset();
				$('[data-remodal-id=modalEditGoodsCommodities]').remodal().close();
				// console.log('1');
			}
			else {
				toastr.error('Good/commodity: '+$('#txtEditGoodsCommoditiesDesc').val()+' add failed.');
				
    			// console.log('0');
			}
		}
	});
}
function fnGetOwnershipTypes() {
	var tblListOfOwnershipTypes = $('#tblListOfOwnershipTypes').DataTable({
		ajax:{
			url: serverdir + '/process/getOwnershipTypes.php',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'OTid'},
			{'data':'OTdesc'},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditOwnershipType" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteOwnershipType" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$.ajax({
		url: serverdir + '/process/getOwnershipTypes.php',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function(data) {
			if (data !== undefined) {
				$('#cmbAddNewApplicationOwnershipType').empty();
				$.each(data, function(i,val){
					$('#cmbAddNewApplicationOwnershipType').append('<option value = "'+val.OTid+'">'+val.OTdesc+'</option>')
				});
			}
		}
	});

	$('#tblListOfOwnershipTypes tbody').on('click','#btnEditOwnershipType',function(event){
		var dataSelect = tblListOfOwnershipTypes.row( $(this).parents('tr') ).data();
		var OTid = dataSelect['OTid'];
		$('[data-remodal-id=modalEditOwnershipTypes]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(OTid);
		$.ajax({
			url: serverdir + '/process/selectOwnershipType.php',
			type: 'post',
			data: {'OTid':OTid},
			dataType: 'json',
			success: function(result) {
				if (result !== undefined) {
					$('#strOTToUpdate').html(result[0]['OTdesc']);
					$('#txthiddenEditOwnershipTypeID').val(result[0]['OTid']);
					$('#txtEditOwnershipTypeDesc').val(result[0]['OTdesc']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfOwnershipTypes tbody').on('click','#btnDeleteOwnershipType',function(event){
		var dataSelect = tblListOfOwnershipTypes.row( $(this).parents('tr') ).data();
		var OTid = dataSelect['OTid'];

		if (confirm('Delete ownership type: '+dataSelect['OTdesc']+'?') ==  true) {
			$.ajax({
				url: serverdir + '/process/deleteOwnershipType.php',
				type: 'post',
				data: {'OTid':OTid},
				dataType: 'html',
				success: function (result) {
					if (result == true) {
						fnHistoryLog('DELETE OWNERSHIP TYPE: '+dataSelect['OTdesc']);
						toastr.success('Ownership type: '+dataSelect['OTdesc']+' delete successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
					}
					else {
						toastr.error('Ownership type: '+dataSelect['OTdesc']+' delete failed.');
					}
				}
			});
		}

	});
}
function fnAddOwnershipType() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addOwnershipType.php',
		type: 'post',
		data: $('#frmAddOwnershipType').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('ADD OWNERSHIP TYPE: '+$('#txtAddOwnershipTypeDesc').val());
				toastr.success('Ownership type: '+$('#txtAddOwnershipTypeDesc').val()+' add successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddOwnershipType')[0].reset();
				// console.log('1');
			}
			else {
				toastr.error('Ownership type: '+$('#txtAddOwnershipTypeDesc').val()+' add failed.');
				
    			// console.log('0');
			}
		}
	});
}
function fnEditOwnershipType() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editOwnershipType.php',
		type: 'post',
		data: $('#frmEditOwnershipType').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('EDIT OWNERSHIP TYPE: '+$('#txtEditOwnershipTypeDesc').val());
				toastr.success('Ownership type: '+$('#txtEditOwnershipTypeDesc').val()+' edit successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditOwnershipType')[0].reset();
				$('[data-remodal-id=modalEditOwnershipTypes]').remodal().close();
				// console.log('1');
			}
			else {
				toastr.error('Ownership type: '+$('#txtEditOwnershipTypeDesc').val()+' edit failed.');
				
    			// console.log('0');
			}
		}
	});
}
function fnGetSignatories() {
	var tblListOfSignatories = $('#tblListOfSignatories').DataTable({
		ajax:{
			url: serverdir + '/process/getSignatories.php',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'signatoryid'},
			{'data':'signatoryname'},
			{'data':'signatoryposition'},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditSignatory" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteSignatory" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$('#tblListOfSignatories tbody').on('click','#btnEditSignatory',function(event){
		var dataSelect = tblListOfSignatories.row( $(this).parents('tr') ).data();
		var signatoryid = dataSelect['signatoryid'];
		$('[data-remodal-id=modalEditSignatories]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(signatoryid);
		$.ajax({
			url: serverdir + '/process/selectSignatory.php',
			type: 'post',
			data: {'signatoryid':signatoryid},
			dataType: 'json',
			success: function(result) {
				if (result !== undefined) {
					$('#strSignatoryToUpdate').html(result[0]['signatoryname']+', '+result[0]['signatoryposition']);
					$('#txthiddenEditSignatoryID').val(result[0]['signatoryid']);
					$('#txtEditSignatoryName').val(result[0]['signatoryname']);
					$('#txtEditSignatoryPosition').val(result[0]['signatoryposition']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfSignatories tbody').on('click','#btnDeleteSignatory',function(event){
		var dataSelect = tblListOfSignatories.row( $(this).parents('tr') ).data();
		var signatoryid = dataSelect['signatoryid'];

		if (confirm('Delete signatory: '+dataSelect['signatoryname']+'?') ==  true) {
			$.ajax({
				url: serverdir + '/process/deleteSignatory.php',
				type: 'post',
				data: {'signatoryid':signatoryid},
				dataType: 'html',
				success: function(result) {
					if (result == true) {
						fnHistoryLog('DELETE SIGNATORY: '+dataSelect['signatoryname']);
						toastr.success('Signatory: '+dataSelect['signatoryname']+' delete successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
					}
					else {
						toastr.error('Signatory: '+dataSelect['signatoryname']+' delete failed.');
					}
				}
			});
		}
	});
}
function fnAddSignatory() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addSignatory.php',
		type: 'post',
		data: $('#frmAddSignatory').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ADD SIGNATORY: '+$('#txtAddSignatoryName').val());
				toastr.success('Signatory: '+$('#txtAddSignatoryName').val()+' add successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddSignatory')[0].reset();
				// console.log('1');
			}
			else {
				toastr.error('Signatory: '+$('#txtAddSignatoryName').val()+' add failed.');
				
    			// console.log('0');
			}
		}
	});
}
function fnEditSignatory() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editSignatory.php',
		type: 'post',
		data: $('#frmEditSignatory').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('EDIT SIGNATORY: '+$('#txtEditSignatoryName').val());
				toastr.success('Signatory: '+$('#txtEditSignatoryName').val()+' edit successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditSignatory')[0].reset();
				$('[data-remodal-id=modalEditSignatories]').remodal().close();
				// console.log('1');
			}
			else {
				toastr.error('Signatory: '+$('#txtEditSignatoryName').val()+' edit failed.');
				
    			// console.log('0');
			}
		}
	});
}
//END EEM SETTINGS

$('#btnDivBusinessClassifications').click(function(){
	$('.ui.container').not('#divBusinessClassifications').hide();
	$('#divBusinessClassifications').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivBusinessType').click(function(){
	$('.ui.container').not('#divBusinessType').hide();
	$('#divBusinessType').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivGoodsCommodities').click(function(){
	$('.ui.container').not('#divGoodsCommodities').hide();
	$('#divGoodsCommodities').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivOwnershipType').click(function(){
	$('.ui.container').not('#divOwnershipType').hide();
	$('#divOwnershipType').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivSignatories').click(function(){
	$('.ui.container').not('#divSignatories').hide();
	$('#divSignatories').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});

$('#frmAddBusinessClassification').submit(function(event){
	fnAddBusinessClassification();
});
$('#frmEditBusinessClassification').submit(function(event){
	fnEditBusinessClassification();
});
$('#frmAddBusinessType').submit(function(event){
	fnAddBusinessType();
});
$('#frmEditBusinessType').submit(function(event){
	fnEditBusinessType();
});
$('#frmAddGoodsCommodities').submit(function(event){
	fnAddGoodsCommodities();
});
$('#frmEditGoodsCommodities').submit(function(event){
	fnEditGoodsCommodities();
});
$('#frmAddOwnershipType').submit(function(event){
	fnAddOwnershipType();
});
$('#frmEditOwnershipType').submit(function(event){
	fnEditOwnershipType();
});
$('#frmAddSignatory').submit(function(event){
	fnAddSignatory();
});
$('#frmEditSignatory').submit(function(event){
	fnEditSignatory();
});

//START BUSINESS CLASSIFICATION INVESTMENT RANGE VALIDATION
$('#txtAddBusinessClassificationInvestmentFrom, #txtAddBusinessClassificationInvestmentTo').bind('keyup change click',function(event){
	fnAddBusinessClassificationValidateRange();
});
$('#txtEditBusinessClassificationInvestmentFrom, #txtEditBusinessClassificationInvestmentTo').bind('keyup change click',function(event){
	fnEditBusinessClassificationValidateRange();
});
//END BUSINESS CLASSIFICATION INVESTMENT RANGE VALIDATION

fnGetBusinessClassifications();
fnGetBusinessTypes();
fnGetGoodsCommodities();
fnGetOwnershipTypes();
fnGetSignatories();