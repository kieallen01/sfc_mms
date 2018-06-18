$('.ui.tabular.menu .item').tab();
$('.ui.dropdown').dropdown();
$('.ui.checkbox').checkbox();
$('#txtMarketCollectionMobileNumber').mask('+63-999-999-9999',{placeholder: ''});

$('#residence').checkbox({
	onChecked: function() {
		fnGetBrgysSFLU($('#cmbMarketCollectionAddressProvince'),$('#cmbMarketCollectionAddressCityMun'),$('#cmbMarketCollectionAddressBrgy'));
		$('#cmbMarketCollectionAddressProvince').addClass('disabled');
		$('#cmbMarketCollectionAddressCityMun').addClass('disabled');
	},
	onUnchecked: function() {
		fnGetProvinces($('#cmbMarketCollectionAddressProvince'),$('#cmbMarketCollectionAddressCityMun'),$('#cmbMarketCollectionAddressBrgy'));
	}
});
fnGetProvinces($('#cmbMarketCollectionAddressProvince'),$('#cmbMarketCollectionAddressCityMun'),$('#cmbMarketCollectionAddressBrgy'));
$('#cmbMarketCollectionAddressProvince').on('change click',function(){
	fnGetCityMuns($('#cmbMarketCollectionAddressProvince'),$('#cmbMarketCollectionAddressCityMun'),$('#cmbMarketCollectionAddressBrgy'));
});
$('#cmbMarketCollectionAddressCityMun').on('change click',function(){
	fnGetBrgys($('#cmbMarketCollectionAddressProvince'),$('#cmbMarketCollectionAddressCityMun'),$('#cmbMarketCollectionAddressBrgy'));
});

$("#market-hasCheck").checkbox({
	onChecked: function() {
		$('#market-payViaCheck').prop('hidden',false);
	},
	onUnchecked: function() {
		$('#market-payViaCheck').prop('hidden',true);
	}
});

$("#treasury-hasCheck").checkbox({
	onChecked: function() {
		$('#treasury-payViaCheck').prop('hidden',false);
	},
	onUnchecked: function() {
		$('#treasury-payViaCheck').prop('hidden',true);
	}
});
//load collectors to collectors dropdown
$.ajax({
	url: serverdir + '/process/getUsers.php?q=all&type=Collector',
	type: 'get',
	cache: false,
	dataType: 'json',
	success: function (data) {
		// console.log(data);
		if (data.length > 0) {
			var array = [];
			array.push('<option class = "default text" value = "0">Select collector</option>');
			// for (var i = 0; i < data.length; i++) {
			// 	array.push('<option value = "'+data[i]['userusername']+'">'+data[i]['userfname']+' '+data[i]['userlname']+' ('+data[i]['userusername']+')</option>');
			// }
			$.each(data, function(i,val){
				array.push('<option value = "'+val.userusername+'">'+val.userfname+' '+val.userlname+' ('+val.userusername+')</option>');
			});
			$('#cmbMarketCollectionCollectors').html(array);
		}
		else {
			toastr.error('Something went wrong.');
		}
	}
});
$(document).on('change', '#cmbMarketCollectionCollectors', function(){
	$('#cmbMarketCollectionAssignedRemittables').empty().dropdown('restore defaults');
	$.ajax({
		url: serverdir + '/process/getAssignedRemittables.php',
		method: 'post',
		data: {'collector':$(this).val()},
		dataType: 'json',
		success: function (data) {
			if (data != undefined) {
				var array = [];
				array.push('<option class = "default text" value = "0">Select assigned remittable</option>');
				$.each(data, function(i,val){
					array.push('<option value = "'+val.assignid+'">'+val.remittabledesc+' (Series '+val.remittablefrom+' - '+val.remittableto+')</option>');
				});
				$('#cmbMarketCollectionAssignedRemittables').html(array);
			}
			else {
				toastr.error('Something went wrong.');
			}
			console.log(data);
		}
	});
	console.log("YOU'VE CHANGED");
});
//load services to dropdown in market collections
$.ajax({
	url: serverdir + '/process/getServices.php?q=all',
	method: 'get',
	cache: false,
	dataType: 'json',
	success: function (data) {
		if (data != undefined) {
			var array = [];
			array.push('<option>Select service</option>');
			$.each(data, function(i,val){
				array.push('<option data-fee = "'+val.servicevalue+'">'+val.servicedesc+'</option>');
			});
			$('#cmbMarketCollectionServices').html(array);
		}
		else {
			toastr.error('Something went wrong.');
		}
	}
});

$(document).on('click change', '#cmbMarketCollectionServices', function(){
	$('#nudMarketCollectionCost').val('');
	if (parseFloat($('#cmbMarketCollectionServices option:selected').data('fee')) != 0) {
		$('#nudMarketCollectionCost').val($('#cmbMarketCollectionServices option:selected').data('fee')).prop('readonly',true);
	}
	else {
		$('#nudMarketCollectionCost').prop({
			'placeholder':$('#cmbMarketCollectionServices option:selected').data('fee'),
			'readonly':false
		});
	}
});

function arrSum(array) {
	var sum = 0;
	for (var i = 0; i < array.length; i++) {
		if (typeof array[i]['servicevaluedynamic'] == 'object') {
			sum += arrSum(parseFloat(array[i]['servicevaluedynamic']));
		}
		else {
			sum += parseFloat(array[i]['servicevaluedynamic']);
		}
	}
	return sum;
}

//now add selected values to an array and the table's tbody
var tocollect = [];
var tempID = 0;
$('#tblListOfToCollects tfoot').on('click', '#btnMarketCollectionAddToCollect', function(){
	$('#tblListOfToCollects tbody').empty();
	var servicevaluefixed 	= $(this).closest('tr').find('#cmbMarketCollectionServices option:selected').data('fee');
	var servicedesc 		= $(this).closest('tr').find('#cmbMarketCollectionServices option:selected').text();
	var servicevaluedynamic = $(this).closest('tr').find('#nudMarketCollectionCost').val();

	var checkIfEmpty = servicevaluefixed && servicevaluedynamic;
	console.log(servicevaluedynamic);
	// if (!checkIfEmpty) {
	// 	toastr.error('All fields are required.');
	// }
	// else {
		tempID++;
		selected = {
			'tempID'				: tempID,
			'servicevaluefixed'		: servicevaluefixed,
			'servicedesc'			: servicedesc,
			'servicevaluedynamic'	: servicevaluedynamic
		};
		tocollect.push(selected);
		$.each(tocollect, function(i,val){
			$('#tblListOfToCollects tbody').append(
				'<tr>'+
					'<td>'+val.tempID+'</td>'+
					'<td>'+val.servicedesc+'</td>'+
					'<td>'+val.servicevaluedynamic+'</td>'+
					'<td><button type = "button" id = "btnMarketCollectionDelete" class = "ui mini icon button"><i class = "trash icon"></i></button></td>'+
				'</tr>'
			);
		});
		console.log(tocollect);
		console.log(arrSum(tocollect));
		$('#nudMarketCollectionAmountDue').val(arrSum(tocollect));

		//reset everything
		$(this).closest('tr').find('#cmbMarketCollectionServices').dropdown('restore defaults');
		$(this).closest('tr').find('#nudMarketCollectionCost').val('');
	// }
});
//delete appended row to tblListOfToCollects
$('#tblListOfToCollects tbody').on('click','#btnMarketCollectionDelete', function(event){
	var todelete = $(this).closest('tr').remove();
	$.each(tocollect,function(i,val){
		if (tocollect[i].tempID == val.tempID) {
			tocollect.splice(i,1);
			return false;
		}
	});
	$('#nudMarketCollectionAmountDue').val(arrSum(tocollect));
	// toassign.splice(id,1);
});

$(document).on('keyup', '#nudMarketCollectionAmountPaid', function(){
	var amountpaid = parseFloat($(this).val());
	var amountdue = parseFloat($('#nudMarketCollectionAmountDue').val());
	var amountchange = amountpaid-amountdue;

	$('#nudMarketCollectionAmountChange').val(amountchange);
});

function fnGetStallOwners() {
	$.ajax({
		url: serverdir + '/process/getStallOwners.php',
		type: 'get',
		cache: false,
		success: function (data){
			if (data != undefined) {
				var array = [];
				array.push('<option class = "default selected text" value = "0">Select stall owner</option>');
				$.each(data, function(i,val){
					array.push('<option value = "'+val.applicationid+'">'+$.trim(val.applicantfname+' '+val.applicantmname+' '+val.applicantlname)+' ('+$.trim(val.applicantprovdesc+', '+val.applicantcitymundesc+', '+val.applicantbrgydesc)+')</option>');
				});
				$('#cmbTreasuryCollectionStallOwner').html(array);
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});
}
fnGetStallOwners();
$('#cmbTreasuryCollectionStallOwner').on('click change', function(){
	$('#cmbTreasuryCollectionStallsOwned').empty();
	$('#cmbTreasuryCollectionStallsOwned').dropdown('restore defaults');
	// event.preventDefault();
	$.ajax({
		url: serverdir + '/process/getStallsOwned.php',
		type: 'post',
		data: {'applicationid':$(this).val()},
		dataType: 'json',
		success: function (data) {
			if (data != undefined) {
				var array = [];
				$.each(data, function(i,val){
					array.push('<option data-fee = "'+parseFloat(val.rentalfee)+'">'+(val.marketfacilityname+', '+val.sectionname+' Section, '+val.bldgname+val.stallnumber)+'</option>');
					// array.push('<option>'+$.trim(data[i].bldgname+data[i].stallnumber)+'</option>');
				});
				$('#cmbTreasuryCollectionStallsOwned').html(array);
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});
});
$(document).on('change', '#cmbTreasuryCollectionStallsOwned', function(){
	// var amountdue = 0;
	// for (var i = 0; i < $(this).val().length; i++) {
	// 	total += $('#cmbTreasuryCollectionStallsOwned option:selected').data('fee')[i] << 0;
	// }
	// var array = [];
	// $.each($(this).val(), function(i,val){
	// 	array.push()
	// });
	// console.log($('#cmbTreasuryCollectionStallsOwned option:selected').data('fee'));
	// console.log($(this).val());
	// var fee = $('#cmbTreasuryCollectionStallsOwned option:selected').data('fee');
	// console.log(fee);
});

$('#btnMMS').click(function(){
	$('#divSidebarTreasury').sidebar('toggle');
});
	$('#btnDivMarketCollection').click(function(){
		$('#frmMarketCollection, #frmTreasuryCollection').not('#frmMarketCollection').hide();
		$('#frmMarketCollection').show();

		$('.item').not(this).toggleClass('active',false);
		$(this).toggleClass('active',true);
	});
	$('#btnDivTreasuryCollection').click(function(){
		$('#frmMarketCollection, #frmTreasuryCollection').not('#frmTreasuryCollection').hide();
		$('#frmTreasuryCollection').show();

		$('.item').not(this).toggleClass('active',false);
		$(this).toggleClass('active',true);
	});
//LOAD ALL TABLES