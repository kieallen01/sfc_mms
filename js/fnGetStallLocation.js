function fnMarketFacilities	(cmbMarketFacility, cmbBuilding, cmbSection, cmbStall) {
	cmbMarketFacility.empty();
	cmbBuilding.empty();
	cmbSection.empty();
	cmbStall.empty();
	$.ajax({
		url: serverdir + '/process/getStallLocation.php?q=marketfacility',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function (data) {
			if (data !== undefined) {
				// $.each(data, function(i,val){
				// 	cmbMarketFacility.append('<option value = "'+val.marketfacilityid+'">'+val.marketfacilityname+'</option>');
				// });
				var array = [];
				array.push('<option class = "default text" disabled selected>Select market facility</option>');
				for (var i = 0; i < data.length; i++) {
					array.push('<option value = "'+data[i]['marketfacilityid']+'">'+data[i]['marketfacilityname']+'</option>');
				}
				cmbMarketFacility.html(array);
				cmbMarketFacility.dropdown('clear');
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});
}

function fnBuildings		(cmbMarketFacility, cmbBuilding, cmbSection, cmbStall) {
	cmbBuilding.empty();
	cmbSection.empty();
	cmbStall.empty();
	$.ajax({
		url: serverdir + '/process/getStallLocation.php?q=building',
		type: 'post',
		data: {'marketfacilityid':cmbMarketFacility.val()},
		dataType: 'json',
		success: function (data) {
			if (data !== undefined) {
				// $.each(data, function(i,val){
				// 	cmbBuilding.append('<option value = "'+val.bldgid+'">'+val.bldgname+'</option>');
				// });
				var array = [];
				array.push('<option class = "default text" disabled selected>Select building</option>');
				for (var i = 0; i < data.length; i++) {
					array.push('<option value = "'+data[i]['bldgid']+'">'+data[i]['bldgname']+'</option>')
				}
				cmbBuilding.html(array);
				cmbBuilding.dropdown('clear');
			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});
}

function fnSections			(cmbMarketFacility, cmbBuilding, cmbSection, cmbStall) {
	cmbSection.empty();
	cmbStall.empty();
	cmbSection.append('<option value = "0" selected>Select section</option>');
	$.ajax({
		url: serverdir + '/process/getStallLocation.php?q=section',
		type: 'post',
		data: {'buildingid':cmbBuilding.val()},
		dataType: 'json',
		success: function (data) {
			if (data !== undefined) {
				// $.each(data, function(i,val){
				// 	cmbSection.append('<option value = "'+val.sectionid+'">'+val.sectionname+'</option>');
				// });
				var array = [];
				array.push('<option class = "default text" disabled selected>Select section</option>');
				for (var i = 0; i < data.length; i++) {
					array.push('<option value = "'+data[i]['sectionid']+'">'+data[i]['sectionname']+'</option>')
				}
				cmbSection.html(array);
				cmbSection.dropdown('clear');

			}
			else {
				toastr.error('Something went wrong.');
			}
		}
	});
}

function fnStalls			(cmbMarketFacility, cmbBuilding, cmbSection, cmbStall) {
	cmbStall.empty();
	$.ajax({
		url: serverdir + '/process/getStallLocation.php?q=stall',
		type: 'post',
		data: {'sectionid':cmbSection.val()},
		dataType: 'json',
		success: function (data) {
			if (data !== undefined) {
				// $.each(data, function(i,val){
				// 	cmbStall.append('<option value = "'+val.stallnumber+'">'+val.stallnumber+'</option>');
				// });
				var array = [];
				for (var i = 0; i < data.length; i++) {
					array.push('<option value = "'+data[i]['stallnumber']+'">'+data[i]['stallnumber']+'</option>')
				}
				cmbStall.html(array);
				cmbStall.dropdown('clear');
			}
			else {
				toastr.error('Something went wrong.');
			}
			// console.log(data);
		}
	});
}

function fnLoadAllStalls	(cmbStall) {
	cmbStall.empty();
	$.ajax({
		url: serverdir + '/process/getStallLocation.php?q=load_all_stalls',
		type: 'get',
		cache: false,
		dataType: 'json',
		success: function (data) {
			if (data !== undefined) {
				// $.each(data, function(i,val){
				// 	cmbStall.append('<option value = "'+val.stallnumber+'">'+val.stallnumber+'</option>');
				// });
				var array = [];
				for (var i = 0; i < data.length; i++) {
					array.push('<option value = "'+data[i]['stallnumber']+'">'+data[i]['marketfacilityname']+', '+data[i]['bldgname']+', '+data[i]['sectionname']+', Stall '+data[i]['bldgname']+data[i]['stallnumber']+'</option>');
				}
				cmbStall.html(array);
			}
			else {
				toastr.error('Something went wrong.');
			}
			// console.log(data);
		}
	});
}
