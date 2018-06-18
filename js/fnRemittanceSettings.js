$('.ui.checkbox').checkbox();
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ticket denominations
function fnGetTicketDenominations() {
	var tblListOfTicketDenominations = $('#tblListOfTicketDenominations').DataTable({
		ajax:{
			url: serverdir + '/process/getRemittables.php?q=all&type=CT',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'remittableid'},
			{'data':'remittabledesc'},
			{'data':'remittablevalue'},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditTicketDenomination" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteTicketDenomination" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	//select ticket denomination for edit
	$('#tblListOfTicketDenominations tbody').on('click','#btnEditTicketDenomination', function(event){
		var dataSelect = tblListOfTicketDenominations.row( $(this).parents('tr') ).data();
		var remittableid = dataSelect['remittableid'];

		$.ajax({
			url: serverdir + '/process/getRemittables.php?q=search&type=CT',
			type: 'post',
			data: {'remittableid':remittableid},
			dataType: 'json',
			success: function(data) {
				// console.log(data);
				if (data != undefined) {
					$('#strTicketDenominationToEdit').html(data[0]['remittabledesc']);
					$('#txthiddenEditTicketDenominationID').val(data[0]['remittableid']);
					$('#txtEditTicketDenominationDesc').val(data[0]['remittabledesc']);
					$('#txtEditTicketDenominationValue').val(data[0]['remittablevalue']);

					$('[data-remodal-id=modalEditTicketDenomination]').remodal({
						closeOnOutsideClick: false
					}).open();
				}
				else {
					toastr.error('Something went wrong.');
				}
			}
		});
	});

	//delete ticket denomination
	$('#tblListOfTicketDenominations tbody').on('click','#btnDeleteTicketDenomination', function(event){
		var dataSelect = tblListOfTicketDenominations.row( $(this).parents('tr') ).data();
		var remittableid = dataSelect['remittableid'];

		if (confirm('Confirm delete?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteRemittable.php',
				type: 'post',
				data: {'remittableid':remittableid},
				dataType: 'html',
				success: function(result){
					if (result == true) {
						fnHistoryLog('DELETE TICKET DENOMINATION CODE: '+remittableid);
						toastr.success('Ticket denomination: '+dataSelect['remittabledesc']+' delete successful.');
						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
					}
					else {
						toastr.error('Ticket denomination: '+dataSelect['remittabledesc']+' delete failed.');
					}
				}
			});
		}
	});
}
fnGetTicketDenominations();
function fnAddTicketDenomination() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addRemittable.php?type=CT',
		type: 'post',
		data: {
			'txtAddRemittableDesc'	: $('#txtAddTicketDenominationDesc').val(),
			'txtAddRemittableValue'	: $('#txtAddTicketDenominationValue').val()
		},
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ADD TICKET DENOMINATION: '+$('#txtAddTicketDenominationDesc').val());
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				toastr.success('Ticket denomination: '+$('#txtAddTicketDenominationDesc').val()+' add successful.');

				$('#frmAddTicketDenomination')[0].reset();
			}
			else {
				toastr.error('Ticket denomination: '+$('#txtAddTicketDenominationDesc').val()+' add failed.');
			}
		}
	});
}
$('#frmAddTicketDenomination').submit(function(event){
	fnAddTicketDenomination();
});
function fnEditTicketDenomination() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editTicketDenomination.php',
		type: 'post',
		data: {
			'txthiddenEditRemittableID'	:$('#txthiddenEditTicketDenominationID').val(),
			'txtEditRemittableDesc'		:$('#txtEditTicketDenominationDesc').val(),
			'txtEditRemittableValue'	:$('#txtEditTicketDenominationValue').val()
		},
		dataType: 'html',
		success: function(result) {
			console.log(result);
			if (result == true) {
				fnHistoryLog('EDIT TICKET DENOMINATION: '+$('#txthiddenTicketDenominationID').val());
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				toastr.success('Ticket denomination: '+$('#txthiddenTicketDenominationID').val()+' edit successful.');

				$('#frmEditTicketDenomination')[0].reset();
				$('[data-remodal-id=modalEditTicketDenomination]').remodal().close();
			}
			else {
				toastr.error('Ticket denomination: '+$('#txthiddenTicketDenominationID').val()+' edit failed.');
			}
		}
	});
}
$('#frmEditTicketDenomination').submit(function(event){
	fnEditTicketDenomination();
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//accountable forms
function fnGetAFs() {
	var tblListOfAFs = $('#tblListOfAFs').DataTable({
		ajax:{
			url: serverdir + '/process/getRemittables.php?q=all&type=AF',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'remittableid'},
			{'data':'remittabledesc'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditAF" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteAF" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},
		{
			searchable: false
		}],
		deferRender: true,
		pageLength: 5
	});

	$('#tblListOfAFs tbody').on('click','#btnEditAF', function(event){
		var dataSelect = tblListOfAFs.row( $(this).parents('tr') ).data();
		var remittableid = dataSelect['remittableid'];

		$.ajax({
			url: serverdir + '/process/getRemittables.php?q=search&type=AF',
			type: 'post',
			data: {'remittableid':remittableid},
			dataType: 'json',
			success: function (data) {
				if (data != undefined) {
					$('#txthiddenEditAFID').val(data[0]['remittableid']);
					$('#txtEditAFDesc').val(data[0]['remittabledesc']);
				}
				else {
					toastr.error('Something went wrong.');
				}
			}
		});

		$('[data-remodal-id=modalEditAF]').remodal({
			closeOnOutsideClick: false
		}).open();
	});

	$('#tblListOfAFs tbody').on('click','#btnDeleteAF', function(event){
		var dataSelect = tblListOfAFs.row( $(this).parents('tr') ).data();
		var remittableid = dataSelect['remittableid'];

		if (confirm('Confirm delete?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteRemittable.php',
				type: 'post',
				data: {
					'remittableid':remittableid
				},
				dataType: 'html',
				success: function (result) {
					if (result == true) {
						fnHistoryLog('DELETE ACCOUNTABLE FORM: '+dataSelect['remittabledesc']);
						toastr.success('Delete accountable form successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
					}
				}
			});
		}
	});
}
fnGetAFs();

function fnAddAF() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addRemittable.php?type=AF',
		type: 'post',
		data: {
			'txtAddRemittableDesc':$('#txtAddAFDesc').val(),
			'txtAddRemittableValue':'NULL'
		},
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ADD ACCOUNTABLE FORM: '+$('#txtAddRemittableDesc').val());
				toastr.success('Accontable form add successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddAF')[0].reset();
			}
			else {
				toastr.error('Accontable form add failed.');
			}
			// console.log(result);
		}
	});
}
$('#frmAddAF').submit(function(event){
	fnAddAF();
});

function fnEditAF() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editRemittable.php',
		type: 'post',
		data: $('#frmEditAF').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT ACCOUNTABLE FORM: '+$('#txtEditAFDesc').val());
				toastr.success('Edit accountable form successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditAF')[0].reset();

				$('[data-remodal-id=modalEditAF]').remodal().close();
			}
			else {
				toastr.error('Edit accountable form edit failed.');
			}
		}
	});
}
$('#frmEditAF').submit(function(event){
	fnEditAF();
});

function fnGetCollectors() {
	$.ajax({
		url: serverdir + '/process/getUsers.php?q=all&type=Collector',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function (data) {
			// console.log(data);
			if (data.length > 0) {
				var array = [];
				for (var i = 0; i < data.length; i++) {
					array.push('<option value = "'+data[i]['userusername']+'">'+data[i]['userfname']+' '+data[i]['userlname']+' ('+data[i]['userusername']+')</option>');
				}
				$('#cmbAssignAFCashTicketCollectorName').html(array);
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});
}
fnGetCollectors();

function fnGetRemittables() {
	$.ajax({
		url: serverdir + '/process/getRemittables.php?q=load_all',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function (data) {
			if (data.length > 0 ) {
				var array = [];
				$.each(data, function(i,val){
					array.push('<option value = "'+data[i]['remittableid']+'">'+data[i]['remittabledesc']+'</option>');
				});
				$('#cmbAssignAFCashTicketToAssign').html(array);
			}
			else {
				toastr.error('Something went wrong.');
			}
			// console.log(data);
		}
	});
}
fnGetRemittables();

//append row to tbody tbllistofremittables
var toassign = [];
var tempID = 0;
$('#tblListOfRemittables tfoot').on('click','#btnAFCashTicketToAssignAction', function(event){
	$('#tblListOfRemittables tbody').empty();
	var collector 		= $(this).closest('tr').find('#cmbAssignAFCashTicketCollectorName').val();
	var collectorname 	= $(this).closest('tr').find('#cmbAssignAFCashTicketCollectorName option:selected').text();
	var remittableid 	= $(this).closest('tr').find('#cmbAssignAFCashTicketToAssign').val();
	var remittabledesc 	= $(this).closest('tr').find('#cmbAssignAFCashTicketToAssign option:selected').text();
	var seriesfrom 		= parseInt($(this).closest('tr').find('#nudAFCashTicketToAssignSeriesFrom').val());
	var seriesto 		= parseInt($(this).closest('tr').find('#nudAFCashTicketToAssignSeriesTo').val());

	//validations
	var checkIfEmpty = collector && remittableid && seriesfrom && seriesto;
	var checkIfFromLessThanTo = seriesfrom < seriesto;

	if (!checkIfEmpty) {
		toastr.error('All fields are required.');
	}

	if (!checkIfFromLessThanTo) {
		toastr.error('Series from must be lesser than series to.');
	}

	if (checkIfEmpty && checkIfFromLessThanTo) {
		// var dataSelect = tblListOfRemittables.row( $(this).parents('tr') ).data();
		tempID++;
		selected = {
			'tempID'			: tempID,
			'collector'			: collector,
			'collectorname'		: collectorname,
			'remittableid'		: remittableid,
			'remittabledesc'	: remittabledesc,
			'seriesfrom'		: seriesfrom,
			'seriesto'			: seriesto
		};
		toassign.push(selected);
		$.each(toassign, function(i,val){
			$('#tblListOfRemittables tbody').append(
				'<tr>'+
					'<td>'+val.tempID+'</td>'+
					'<td>'+val.collectorname+'</td>'+
					'<td>'+val.remittabledesc+'</td>'+
					'<td>'+val.seriesfrom+'</td>'+
					'<td>'+val.seriesto+'</td>'+
					'<td><button id = "btnAFCashTicketToAssignDelete" class = "ui mini icon button"><i class = "trash icon"></i></button></td>'+
				'</tr>'
			);
		});

		//reset everything
		$(this).closest('tr').find('#cmbAssignAFCashTicketCollectorName').dropdown('refresh');
		$(this).closest('tr').find('#cmbAssignAFCashTicketToAssign').dropdown('refresh');
		$(this).closest('tr').find('#nudAFCashTicketToAssignSeriesFrom').val('');
		$(this).closest('tr').find('#nudAFCashTicketToAssignSeriesTo').val('');
	}
});

//delete appended row to tbllistofremittables
$('#tblListOfRemittables tbody').on('click','#btnAFCashTicketToAssignDelete', function(event){
	console.log(toassign);
	var todelete = $(this).closest('tr').remove();
	$.each(toassign,function(i,val){
		if (toassign[i].tempID == val.tempID) {
			toassign.splice(i,1);
			return false;
		}
	});
	console.log(toassign);
	// toassign.splice(id,1);
});

$('#frmAssignRemittable').submit(function(event){
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/assignRemittable.php',
		method: 'post',
		data: {
			'toassign':toassign,
			'dtpAFCashTicketAssignDateAssigned':$('#dtpAFCashTicketAssignDateAssigned').val()
		},
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ASSIGNED REMITTABLE/S TO COLLECTOR: '+$('#cmbAssignAFCashTicketCollectorName option:selected').text());
				//reset everything
				$(this).closest('tr').find('#cmbAssignAFCashTicketCollectorName').dropdown('restore defaults');
				$(this).closest('tr').find('#cmbAssignAFCashTicketToAssign').dropdown('restore defaults');
				$(this).closest('tr').find('#nudAFCashTicketToAssignSeriesFrom').val('');
				$(this).closest('tr').find('#nudAFCashTicketToAssignSeriesTo').val('');
				$('#tblListOfRemittables tbody').empty();
				$('#frmAssignRemittable')[0].reset();
				toassign = [];

				toastr.success('Assignment successful.');
			}
			else {
				toastr.error('Assignment failed.');
			}
		}
	});
});

$('#finish').checkbox({
	onChecked: function(){
		alert('I was checked.');
		// $('#btnAssignAFCashTicket').toggleClass('disabled',false);
	},
	onUnchecked: function(){
		alert('I was unchecked.');
		// $('#btnAssignAFCashTicket').toggleClass('disabled',true);
	}
});


$('#btnDivAddAF').click(function(){
	$('.ui.container').not('#divAddAF').hide();
	$('#divAddAF').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnAssignAFCashTicket').click(function(){
	$('.ui.container').not('#divAssignAFCashTicket').hide();
	$('#divAssignAFCashTicket').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});