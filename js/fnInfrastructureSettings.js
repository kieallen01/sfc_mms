//START MARKET SETTINGS FUNCTIONS
//START MARKET FACILITIES
function fnGetMarketFacilities() {
	var tblListOfMarketFacilities = $('#tblListOfMarketFacilities').DataTable({
		ajax:{
			url: serverdir + '/process/getMarketFacilities.php',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns: [
			{'data':'marketfacilityid'},
			{'data':'marketfacilityname'},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditMarketFacility" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteMarketFacility" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$.ajax({
		url: serverdir + '/process/getMarketFacilities.php',
		dataType: 'json',
		success: function (data) {
			if (data != undefined) {
				$.each(data, function(i,val){
					$('#cmbAddBldgMarketFacilityID').append('<option value = "'+val.marketfacilityid+'">'+val.marketfacilityname+'</option>');
					// $('#cmbEditBuildingMarketFacilityID').append('<option value = "'+val.marketfacilityid+'">'+val.marketfacilityname+'</option>');
				});
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});

	$('#tblListOfMarketFacilities tbody').on('click','#btnEditMarketFacility',function(event){
		var dataSelect = tblListOfMarketFacilities.row( $(this).parents('tr') ).data();
		var marketfacilityid = dataSelect['marketfacilityid'];
		$('[data-remodal-id=modalEditMarketFacilities]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(marketfacilityid);

		$.ajax({
			url: serverdir + '/process/selectMarketFacility.php',
			type: 'post',
			data: {'marketfacilityid':marketfacilityid},
			dataType: 'json',
			success: function(result) {
				if (result != undefined) {
					$('#txthiddenEditMarketFacilityID').val(result[0]['marketfacilityid']);
					$('#txtEditMarketFacilityCode').val(result[0]['marketfacilitycode']);
					$('#txtEditMarketFacilityName').val(result[0]['marketfacilityname']);
					// console.log(result[0]);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfMarketFacilities tbody').on('click','#btnDeleteMarketFacility',function(event){
		var dataSelect = tblListOfMarketFacilities.row( $(this).parents('tr') ).data();
		var marketfacilityid = dataSelect['marketfacilityid'];

		if (confirm('Delete market facility: '+dataSelect['marketfacilityname']+'?') == true) {
			//DELETE MARKET FACILITY
			$.ajax({
				url: serverdir + '/process/deleteMarketFacility.php',
				type: 'post',
				data: {'marketfacilityid':marketfacilityid},
				dataType: 'html',
				success: function(result) {
					if (result == true) {
						fnHistoryLog('DELETE MARKET FACILITY: '+dataSelect['marketfacilityname']);

						toastr.success('Delete market facility '+dataSelect['marketfacilityname']+' successful.');
						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
						$('.ui.search.dropdown').dropdown('refresh');
						$('.ui.search.dropdown').dropdown('clear');
						// console.log('1');
					}
					else {
						toastr.error('An error occured. Please try again.');
						// console.log('0');
					}
				}
			});
		}
	});
}
function fnAddMarketFacility() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addMarketFacility.php',
		type: 'post',
		data: $('#frmAddMarketFacility').serialize(),
		dataType: 'html',
		success: function (result) {
			console.log(result);
			if (result == true) {
				fnHistoryLog('ADD MARKET FACILITY: '+$('#txtAddMarketFacilityName').val());

				toastr.success('Add market facility successful.');
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddMarketFacility')[0].reset();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Add market facility failed.');
    			// console.log('0');
			}
		}
	});
}
function fnEditMarketFacility() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editMarketFacility.php',
		type: 'post',
		data: $('#frmEditMarketFacility').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('EDIT MARKET FACILITY: '+$('#txtEditMarketFacilityName').val());
				toastr.success('Edit market facility successful.');
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditMarketFacility')[0].reset();
				$('[data-remodal-id=modalEditMarketFacilities]').remodal().close();

				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Edit market facility failed.');
				// console.log('0');
			}
		}
	});
}
//END MARKET FACILITIES
function fnGetBldgs() {
	var tblListOfBuildings = $('#tblListOfBuildings').DataTable({
		ajax:{
			url: serverdir + '/process/getBldgs.php',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns: [
			{'data':'bldgid'},
			{'data':'bldgname'},
			{'data':'marketfacilityname'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditBuilding" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteBuilding" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$.ajax({
		url: serverdir + '/process/getBldgs.php',
		dataType: 'json',
		success: function (data) {
			if (data != undefined) {
				$.each(data, function(i,val){
					$('#cmbAddSectionBuildingID').append('<option value = "'+val.bldgid+'">'+val.marketfacilityname+' - Building '+val.bldgname+'</option>');
					// $('#cmbEditSectionBldgID').append('<option value = "'+val.bldgid+'">'+val.bldgname+'</option>');
				});
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});

	$('#tblListOfBuildings tbody').on('click','#btnEditBuilding',function(event){
		var dataSelect = tblListOfBuildings.row( $(this).parents('tr') ).data();
		var bldgid = dataSelect['bldgid'];
		$('[data-remodal-id=modalEditBuildings]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(bldgid);

		$.ajax({
			url: serverdir + '/process/selectBldg.php',
			type: 'POST',
			data: {'bldgid':bldgid},
			dataType: 'json',
			success: function(result) {
				if (result != undefined) {
					$('#txthiddenEditBuildingID').val(result[0]['bldgid']);					
					// $('#txtEditBuildingMarketFacilityCode').val(result[0]['marketfacilitycode']);
					$('#txtEditBuildingName').val(result[0]['bldgname']);
					// console.log(result[0]);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfBuildings tbody').on('click','#btnDeleteBuilding',function(event){
		var dataSelect = tblListOfBuildings.row( $(this).parents('tr') ).data();
		var bldgid = dataSelect['bldgid'];

		if (confirm('Delete building: '+dataSelect['bldgname']+'?') == true) {
			//DELETE BUILDING
			$.ajax({
				url: serverdir + '/process/deleteBuilding.php',
				type: 'post',
				data: {'bldgid':bldgid},
				dataType: 'html',
				success: function (result) {
					if (result == true) {
						fnHistoryLog('DELETE BUILDING: '+dataSelect['bldgname']);
						toastr.success('Delete building '+dataSelect['bldgname']+' successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
						$('#frmAddBldg')[0].reset();
						$('.ui.search.dropdown').dropdown('refresh');
						$('.ui.search.dropdown').dropdown('clear');
						// console.log('1');
					}
					else {
						toastr.error('Delete building '+dataSelect['bldgname']+' failed.');
		    			// console.log('0');
					}
				}
			});
		}
	});
}
function fnAddBldg() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addBldg.php',
		type: 'post',
		data: $('#frmAddBldg').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('ADD BUILDING: '+$('#txtAddBldgName').val());
				toastr.success('Add building successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddBldg')[0].reset();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Add building failed.');
    			// console.log('0');
			}
		}
	});
}
function fnEditBldg() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editBldg.php',
		type: 'POST',
		data: $('#frmEditBuilding').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT BUILDING: '+$('#txtEditBuildingName').val());
				toastr.success('Edit building successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditBuilding')[0].reset();
				$('[data-remodal-id=modalEditBuildings]').remodal().close();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Edit building failed.');
				// console.log('0');
			}
		}
	});
}
function fnGetSections() {
	var tblListOfSections = $('#tblListOfSections').DataTable({
		ajax:{
			url: serverdir + '/process/getSections.php',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns: [
			{'data':'sectionid'},
			{'data':'sectionname'},
			{'data':'bldg',
				'render':function(data, type, bldg, meta) {
					return bldg.marketfacilityname + ' - Building ' + bldg.bldgname;
				}
			},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditSection" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteSection" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$.ajax({
		url: serverdir + '/process/getSections.php',
		dataType: 'json',
		success: function (data) {
			if (data != undefined) {
				$.each(data, function(i,val){
					$('#cmbAddGateSectionID').append('<option value = "'+val.sectionid+'">'+val.sectionname+'</option>');
					// $('#cmbAddStallSectionID').append('<option value = "'+val.sectionid+'">'+val.sectionname+'</option>');
				});
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});

	$('#tblListOfSections tbody').on('click','#btnEditSection',function(event){
		var dataSelect = tblListOfSections.row( $(this).parents('tr') ).data();
		var sectionid = dataSelect['sectionid'];
		$('[data-remodal-id=modalEditSections]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(sectionid);

		$.ajax({
			url: serverdir + '/process/selectSection.php',
			type: 'post',
			data: {'sectionid':sectionid},
			dataType: 'json',
			success: function(result) {
				if (result != undefined) {
					$('#txthiddenEditSectionID').val(result[0]['sectionid']);
					$('#txtEditSectionName').val(result[0]['sectionname']);
					// $('#cmbEditSectionMarketFacilityID').val(result[0]['marketfacilityid']);
					// console.log(result[0]);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfSections tbody').on('click','#btnDeleteSection',function(event){
		var dataSelect = tblListOfSections.row( $(this).parents('tr') ).data();
		var sectionid = dataSelect['sectionid'];

		if (confirm('Delete section: '+dataSelect['sectionname']+'?') == true) {
			//DELETE SECTION
			$.ajax({
				url: serverdir + '/process/deleteSection.php',
				type: 'post',
				data: {'sectionid':sectionid},
				dataType: 'html',
				success: function (result) {
					if (result == true) {
						fnHistoryLog('DELETE SECTION: '+dataSelect['sectionname']);
						toastr.success('Delete section '+dataSelect['sectionname']+' successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
						$('#frmAddSection')[0].reset();
						$('.ui.search.dropdown').dropdown('refresh');
						$('.ui.search.dropdown').dropdown('clear');
						// console.log('1');
					}
					else {
						toastr.error('Delete section '+dataSelect['sectionname']+' failed.');
		    			// console.log('0');
					}
				}
			});
		}
	});
}
function fnAddSection() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addSection.php',
		type: 'post',
		data: $('#frmAddSection').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('ADD SECTION: '+$('#txtAddSectionName').val());
				toastr.success('Add section successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddSection')[0].reset();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Add section failed.');
    			// console.log('0');
			}
		}
	});
}
function fnEditSection(){
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editSection.php',
		type: 'post',
		data: $('#frmEditSection').serialize(),
		dataType: 'html',
		success: function(result){
			if (result == true) {
				fnHistoryLog('EDIT SECTION: '+$('#txtEditSectionName').val());
				toastr.success('Edit section successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditSection')[0].reset();
				$('[data-remodal-id=modalEditSections]').remodal().close();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Edit section failed.');
				// console.log('0');
			}
		}
	});
}
function fnGetGates() {
	var tblListOfGates = $('#tblListOfGates').DataTable({
		ajax:{
				url: serverdir + '/process/getGates.php',
				dataSrc: '',
				processing: true,
				serverside: true,
			},
			columns: [
				{'data':'gateid'},
				{'data':'gatename'},
				{'data':'sectionname'},
				{'data':null}
			],
			columnDefs: [ {
				targets: -1,
				data: null,
				defaultContent: '<button id="btnEditGate" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteGate" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
				orderable: false
			},{
				searchable: true
			}],
			pageLength: 5
	});

	$.ajax({
		url: serverdir + '/process/getGates.php',
		dataType: 'json',
		success: function (data) {
			$.each(data, function(i,val){
				// $('#cmbAddGateSectionID').append('<option value = "'+val.gateid+'">'+val.gatename+' ('+val.marketfacilitycode+'-'+val.bldgcode+'-'+val.sectioncode+')</option>');
			});
		}
	});

	$('#tblListOfGates tbody').on('click','#btnEditGate',function(event){
		var dataSelect = tblListOfGates.row( $(this).parents('tr') ).data();
		var gateid = dataSelect['gateid'];
		$('[data-remodal-id=modalEditGates]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(gateid);

		$.ajax({
			url: serverdir + '/process/selectGate.php',
			type: 'post',
			data: {'gateid':gateid},
			dataType: 'json',
			success: function(result) {
				if (result != undefined) {
					$('#txthiddenEditGateID').val(result[0]['gateid']);
					$('#txtEditGateSectionCode').val(result[0]['marketfacilitycode']+'-'+result[0]['bldgcode']+'-'+result[0]['sectioncode']);
					$('#txtEditGateCode').val(result[0]['gatecode']);
					$('#txtEditGateName').val(result[0]['gatename']);
					// console.log(result[0]['bldgid']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfGates tbody').on('click','#btnDeleteGate',function(event){
		var dataSelect = tblListOfGates.row( $(this).parents('tr') ).data();
		var gateid = dataSelect['gateid'];

		if (confirm('Delete gate: '+dataSelect['gatename']+'?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteGate.php',
				type: 'post',
				data: {'gateid':gateid},
				dataType: 'html',
				success: function(result) {
					if (result == true) {
						fnHistoryLog('DELETE GATE: '+dataSelect['gatename']);
						toastr.success('Delete gate '+dataSelect['gatename']+' successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

						$('.ui.search.dropdown').dropdown('refresh');
						$('.ui.search.dropdown').dropdown('clear');
					}
					else {
						toastr.error('Delete gate '+dataSelect['gatename']+' failed.');
					}
				}
			});
		}
	});
}
function fnAddGate() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addGate.php',
		type: 'post',
		data: $('#frmAddGate').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('ADD GATE: '+$('#txtAddGateName').val());
				toastr.success('Add gate successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddGate')[0].reset();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Add gate failed.');
    			// console.log('0');
			}
		}
	});
}
function fnEditGate() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editGate.php',
		type: 'post',
		data: $('#frmEditGate').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('EDIT GATE: '+$('#txtEditGateName').val());
				toastr.success('Edit gate successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditGate')[0].reset();
				$('[data-remodal-id=modalEditGates]').remodal().close();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Edit gate failed.');
    			// console.log('0');
			}
		}
	});
}
function fnGetAreas() {
	var tblListOfAreas = $('#tblListOfAreas').DataTable({
		ajax:{
				url: serverdir + '/process/getAreas.php',
				dataSrc: '',
				processing: true,
				serverside: true,
			},
			columns: [
				{'data':'areaid'},
				{'data':'areadesc'},
				{'data':'areasize',
					'render':function(data, type, areasize, meta) {
						return areasize.areasize + ' ' + areasize.areaunit;
					}
				},
				{'data':null}
			],
			columnDefs: [ {
				targets: -1,
				data: null,
				defaultContent: '<button id="btnEditArea" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteArea" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
				orderable: false
			},{
				searchable: true
			}],
			pageLength: 5
	});

	$.ajax({
		url: serverdir + '/process/getAreas.php',
		dataType: 'json',
		success: function (data) {
			if (data != undefined) {
				$.each(data, function(i,val){
					$('#cmbAddStallAreaID').append('<option value = "'+val.areaid+'">'+val.areadesc+'</option>');

					$('#cmbAddRentalFeeAreaDesc').append('<option value = "'+val.areaid+'">'+val.areadesc+'</option>');
					$('#cmbEditRentalFeeAreaDesc').append('<option value = "'+val.areaid+'">'+val.areadesc+'</option>');
				});
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});

	$('#tblListOfAreas tbody').on('click','#btnEditArea',function(event){
		var dataSelect = tblListOfAreas.row( $(this).parents('tr') ).data();
		var areaid = dataSelect['areaid'];
		$('[data-remodal-id=modalEditAreas]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(areaid);

		$.ajax({
			url: serverdir + '/process/selectArea.php',
			type: 'post',
			data: {'areaid':areaid},
			dataType: 'json',
			success: function(result) {
				if (result != undefined) {
					$('#txthiddenEditAreaID').val(result[0]['areaid']);
					$('#txtEditAreaDesc').val(result[0]['areadesc']);
					$('#txtEditAreaSize').val(result[0]['areasize']);
					$('#cmbEditAreaUnit').dropdown('set selected',result[0]['areaunit']);
					// console.log(result[0]['']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfAreas tbody').on('click','#btnDeleteArea',function(event){
		var dataSelect = tblListOfAreas.row( $(this).parents('tr') ).data();
		var areaid = dataSelect['areaid'];

		if (confirm('Delete area: '+dataSelect['areadesc']+'?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteArea.php',
				type: 'post',
				data: {'areaid':areaid},
				dataType: 'html',
				success: function(result) {
					if (result == true) {
						fnHistoryLog('DELETE AREA: '+dataSelect['areadesc']);
						toastr.success('Area '+dataSelect['areadesc']+' delete successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

						$('.ui.search.dropdown').dropdown('refresh');
						$('.ui.search.dropdown').dropdown('clear');
					}
					else {
						toastr.error('Area '+dataSelect['areadesc']+' delete failed.');
					}
				}
			});
		}
	});
}
function fnAddArea() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addArea.php',
		type: 'post',
		data: $('#frmAddArea').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ADD AREA: '+$('#txtAddAreaDesc').val());
				toastr.success('Add area successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddArea')[0].reset();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Add area failed.');
    			// console.log('0');
			}
		}
	});
}
function fnEditArea() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editArea.php',
		type: 'post',
		data: $('#frmEditArea').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT AREA: '+$('#txtEditAreaDesc').val());
				toastr.success('Edit area successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditArea')[0].reset();
				$('[data-remodal-id=modalEditAreas]').remodal().close();

				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
				// console.log('1');
			}
			else {
				toastr.error('Edit area failed.');
    			// console.log('0');
			}
		}
	});
}
	fnMarketFacilities($('#cmbAddStallMarketFacilityID'),$('#cmbAddStallBldgID'),$('#cmbAddStallSectionID'),$('#cmbAddStallStallNumber'));
$('#cmbAddStallMarketFacilityID').on('click change',function(){
	fnBuildings($('#cmbAddStallMarketFacilityID'),$('#cmbAddStallBldgID'),$('#cmbAddStallSectionID'),$('#cmbAddStallStallNumber'));
});
$('#cmbAddStallBldgID').on('click change',function(){
	fnSections($('#cmbAddStallMarketFacilityID'),$('#cmbAddStallBldgID'),$('#cmbAddStallSectionID'),$('#cmbAddStallStallNumber'));
});
function fnGetStalls() {
	var tblListOfStalls = $('#tblListOfStalls').DataTable({
		ajax:{
			url: serverdir + '/process/getStalls.php?q=all',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'stallnumber'},
			{'data':'section',
				render: function(data, type, section, meta) {
					return section.marketfacilityname + ' - ' + section.bldgname + ' - ' + section.sectionname;
				}
			},
			{'data':'areadesc'},
			{'data':'stalllessee'},
			{'data':null}
		],
		columnDefs: [ {
			targets: -1,
			data: null,
			defaultContent: '<button id="btnEditStall" class="ui mini icon button"><i class = "fa fa-pencil"></i></button> <button id = "btnDeleteStall" class="ui mini icon button"><i class = "fa fa-trash"></i></button>',
			orderable: false
		},{
			searchable: true
		}],
		pageLength: 5
	});

	$('#tblListOfStalls tbody').on('click','#btnEditStall',function(event){
		var dataSelect = tblListOfStalls.row( $(this).parents('tr') ).data();
		var stallnumber = dataSelect['stallnumber'];
		$('[data-remodal-id=modalEditStalls]').remodal({
			closeOnOutsideClick: false
		}).open();
		// console.log(stallnumber);

		$.ajax({
			url: serverdir + '/process/selectStall.php',
			type: 'post',
			data: {'stallnumber':stallnumber},
			dataType: 'json',
			success: function(result) {
				if (result != undefined) {
					$('#txthiddenEditStallNumber').val(result[0]['stallnumber']);
					$('#txtEditStallAreaSize').val(result[0]['areasize']+' '+result[0]['areasizeunit']);
					$('#txtEditStallSectionCode').val(result[0]['marketfacilitycode']+'-'+result[0]['bldgcode']+'-'+result[0]['sectioncode']);
					$('#txtEditStallStallNumber').val(result[0]['stallnumber']);
					
					// console.log(result[0]['']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});

	$('#tblListOfStalls tbody').on('click','#btnDeleteStall',function(event){
		var dataSelect = tblListOfStalls.row( $(this).parents('tr') ).data();
		var stallnumber = dataSelect['stallnumber'];

		if (confirm('Delete stall number: '+stallnumber+'?') == true) {
			$.ajax({
				url: serverdir + '/process/deleteStall.php',
				type: 'post',
				data: {'stallnumber':stallnumber},
				dataType: 'html',
				success: function(result) {
					if (result == true) {
						fnHistoryLog('DELETE STALL: '+stallnumber);
						toastr.success('Stall number '+stallnumber+' delete successful.');

						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();

						$('.ui.search.dropdown').dropdown('refresh');
						$('.ui.search.dropdown').dropdown('clear');
					}
					else {
						toastr.error('Stall number '+stallnumber+' delete failed.');
					}
				}
			});
		}
	});
}
function fnGetStallCount() {
	$.ajax({
		url: serverdir + '/process/getStalls.php?q=count',
		dataType: 'json',
		success: function (data) {
			// console.log((data));
			if (data != undefined) {
				$('#txtAddStallNumber').val(parseInt(data[0]['stallnumber']) + 1);
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});
}
function fnAddStall() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addStall.php',
		type: 'post',
		data: $('#frmAddStall').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('ADD STALL: #'+$('#txtAddStallStallNumber').val());
				toastr.success('Add stall successful.');

				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddStall')[0].reset();
				$('.ui.search.dropdown').dropdown('refresh');
				$('.ui.search.dropdown').dropdown('clear');
			}
			else {
				toastr.error('Add stall failed.');
			}
			console.log(result);
		}
	});
}
function fnEditStall() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editStall.php',
		type: 'post',
		data: $('#frmEditStall').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT STALL: #'+$('#txtEditStallStallNumber').val());
				toastr.success('Edit stall successful.');
				
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditStall')[0].reset();
				fnGetStallCount();
				// console.log('1');
			}
			else {
				toastr.error('Edit stall failed.');
				// console.log('0');
			}
		}
	});
}
//END MARKET SETTINGS FUNCTIONS
$('#btnMarketFacilitySettings, #btnEEMSettings, #btnComputationSettings').accordion();
	$('#btnDivMarketFacilities').click(function(){
		$('.ui.container').not('#divMarketFacilities').hide();
		$('#divMarketFacilities').show();

		$('#btnDivMarketFacilities').toggleClass('active',true);
		$('.item').not('#btnDivMarketFacilities').toggleClass('active',false);
	});
	$('#btnDivBuildings').click(function(){
		$('.ui.container').not('#divBuildings').hide();
		$('#divBuildings').show();

		$('#btnDivBuildings').toggleClass('active',true);
		$('.item').not('#btnDivBuildings').toggleClass('active',false);
	});
	$('#btnDivSections').click(function(){
		$('.ui.container').not('#divSections').hide();
		$('#divSections').show();

		$('#btnDivSections').toggleClass('active',true);
		$('.item').not('#btnDivSections').toggleClass('active',false);
	});
	$('#btnDivGates').click(function(){
		$('.ui.container').not('#divGates').hide();
		$('#divGates').show();

		$('#btnDivGates').toggleClass('active',true);
		$('.item').not('#btnDivGates').toggleClass('active',false);
	});
	$('#btnDivAreas').click(function(){
		$('.ui.container').not('#divAreas').hide();
		$('#divAreas').show();

		$('#btnDivAreas').toggleClass('active',true);
		$('.item').not('#btnDivAreas').toggleClass('active',false);
	});
	$('#btnDivStalls').click(function(){
		$('.ui.container').not('#divStalls').hide();
		$('#divStalls').show();

		$('#btnDivStalls').toggleClass('active',true);
		$('.item').not('#btnDivStalls').toggleClass('active',false);
	});

$('#frmAddMarketFacility').submit(function(event){
	fnAddMarketFacility();
});
$('#frmEditMarketFacility').submit(function(event){
	fnEditMarketFacility();
});
$('#frmAddBldg').submit(function(event){
	fnAddBldg();
});
$('#frmEditBuilding').submit(function(event){
	fnEditBldg();
});
$('#frmAddSection').submit(function(event){
	fnAddSection();
});
$('#frmEditSection').submit(function(event){
	fnEditSection();
});
$('#frmAddGate').submit(function(event){
	fnAddGate();
});
$('#frmEditGate').submit(function(event){
	fnEditGate();
});
$('#frmAddArea').submit(function(event){
	fnAddArea();
});
$('#frmEditArea').submit(function(event){
	fnEditArea();
});
$('#frmAddStall').submit(function(event){
	fnAddStall();
});

fnGetMarketFacilities();
fnGetBldgs();
fnGetSections();
fnGetGates();
fnGetAreas();
fnGetStalls();
// fnGetStallCount();