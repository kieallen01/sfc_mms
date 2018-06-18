function fnGetProvinces(cmbProvince,cmbCityMun,cmbBrgy) {
	cmbProvince.html('<option value = "0" class = "default text">Select province</option>');
	cmbCityMun.html('<option value = "0" class = "default text">Select city/municipality</option>');
	cmbBrgy.html('<option value = "0" class = "default text">Select barangay</option>');

	cmbProvince.empty().dropdown('restore defaults');
	cmbCityMun.empty().dropdown('restore defaults');
	cmbBrgy.empty().dropdown('restore defaults');
	$.ajax({
		url: serverdir + '/process/getAddress.php?q=province',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function(result) {
			if (result !== undefined) {
				var array = [];
				array.push('<option value = "0" class = "default text">Select province</option>');
				for (var i = 0; i < result.length; i++) {
					array.push('<option value = "'+result[i]['provincecode']+'">'+result[i]['provincedesc']+'</option>');
					cmbProvince.html(array);
					// console.log(result[i]['provincecode']);
				}
			}
			else {

			}
			// console.log(result);
		}
	});
}

function fnGetCityMuns(cmbProvince,cmbCityMun,cmbBrgy) {
	cmbCityMun.html('<option value = "0" class = "default text">Select city/municipality</option>');
	cmbBrgy.html('<option value = "0" class = "default text">Select barangay</option>');

	cmbCityMun.empty().dropdown('restore defaults');
	cmbBrgy.empty().dropdown('restore defaults');
	
	$.ajax({
		url: serverdir + '/process/getAddress.php?q=citymun&code='+cmbProvince.val(),
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function(result) {
			if (result !== undefined) {
				var array = [];
				array.push('<option value = "0" class = "default text">Select city/municipality</option>');
				for (var i = 0; i < result.length; i++) {
					array.push('<option value = "'+result[i]['citymuncode']+'">'+result[i]['citymundesc']+'</option>');
					cmbCityMun.html(array);
					// console.log(result[i]['provincecode']);
				}
			}
			else {

			}
			// console.log(result);
		}
	});
}

function fnGetBrgys(cmbProvince,cmbCityMun,cmbBrgy) {
	cmbBrgy.html('<option value = "0" class = "default text">Select barangay</option>');
	cmbBrgy.empty().dropdown('restore defaults');

	$.ajax({
		url: serverdir + '/process/getAddress.php?q=brgy&code='+cmbCityMun.val(),
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function(result) {
			if (result !== undefined) {
				var array = [];
				array.push('<option value = "0" class = "default text">Select barangay</option>');
				for (var i = 0; i < result.length; i++) {
					array.push('<option value = "'+result[i]['brgycode']+'">'+result[i]['brgydesc']+'</option>');
					cmbBrgy.html(array);
				}
			}
			else {

			}
			// console.log(result);
		}
	});
}

function fnGetBrgysSFLU(cmbProvince,cmbCityMun,cmbBrgy) {
	cmbProvince.empty().dropdown('restore defaults');

	cmbProvince.html('<option value = "133" selected>La Union</option');
	cmbCityMun.html('<option value = "13314" selected>City of San Fernando</option>');

	$.ajax({
		url: serverdir + '/process/getAddress.php?q=brgy&code=13314',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function(result) {
			if (result !== undefined) {
				var array = [];
				array.push('<option value = "0" class = "default text">Select barangay</option>');
				for (var i = 0; i < result.length; i++) {
					array.push('<option value = "'+result[i]['brgycode']+'">'+result[i]['brgydesc']+'</option>');
					cmbBrgy.html(array);
				}
			}
			else {

			}
			// console.log(result);
		}
	});
}