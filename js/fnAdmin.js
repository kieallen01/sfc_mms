//START ADMIN FUNCTIONS
//ADMIN MANAGEMENT
$('.ui .dropdown').dropdown();
function fnGetUsers() {
	var tblListOfUsers = $('#tblListOfUsers').DataTable({
		ajax:{
			url: serverdir + '/process/getUsers.php?q=all&type=all',
			dataSrc: '',
			processing: true,
			serverside: true
		},
		columns: [
			{'data':'userusername'},
			{'data':'userfullname',
				'render':function(data, type, userfullname, meta) {
					return $.trim(userfullname.userlname + ', ' +userfullname.userfname + ' ' +userfullname.usermname);
				}
			},
			{'data':'userlevel'},
			{'data':null}
		],
		columnDefs: [{
			targets: -1,
			data: null,
			defaultContent: '\
				<button id="btnEditUser" class="ui mini icon button"><i class = "fa fa-pencil"></i></button>\
				<button id = "btnDeactUser" class="ui mini icon button"><i class = "fa fa-ban"></i></button>\
				<button id = "btnDeleteUser" class="ui mini icon button"><i class = "fa fa-trash"></i></button>\
			',
			orderable: false
		},{
			searchable: true,
			orderable: true,
			targets: 0
		}],
		pageLength: 5
	});

	// $('#tblListOfUsers tbody').on('click','#btnEditUser',function(event){
	// 	event.preventDefault();
	// 	var data = tblListOfUsers.row( $(this).parents('tr') ).data();
	// 	console.log(data['userusername']);
	// });
	$('#tblListOfUsers tbody').on('click','#btnEditUser',function(event){
		var dataSelect = tblListOfUsers.row( $(this).parents('tr') ).data();
		var userusername = dataSelect['userusername'];
		$('[data-remodal-id=modalEditUsers]').remodal({
			closeOnOutsideClick: false
		}).open();

		$.ajax({
			url: serverdir + '/process/getUsers.php?q=search',
			type: 'post',
			data: {'userusername':userusername},
			dataType: 'json',
			success: function(result) {
				if (result !== undefined) {
					$('#txtEditUserUsername').val(result[0]['userusername']);
					$('#txtEditUserFName').val(result[0]['userfname']);
					$('#txtEditUserMName').val(result[0]['usermname']);
					$('#txtEditUserLName').val(result[0]['userlname']);

					$('#cmbEditUserDepartment').dropdown('set selected',result[0]['userdepartment']);
					$('#cmbEditUserLevel').dropdown('refresh');
					$('#cmbEditUserLevel').dropdown('set selected',result[0]['userlevel']);

					// $('#cmbEditUserStatus').dropdown('set selected',result[0]['userstatus']);
					// console.log(result[0]['userusername']);
				}
				else {
					toastr.error('An error occured. Please try again.');
					// console.log('0');
				}
			}
		});
	});
	$('#tblListOfUsers tbody').on('click','#btnDeactUser',function(event){
		event.preventDefault();
		var dataDeact = tblListOfUsers.row( $(this).parents('tr') ).data();
		var userusername = dataDeact['userusername'];

		if (confirm('Are you sure to deactivate user '+userusername+'?') === true) {
			$.ajax({
				url: serverdir + '/process/deactUser.php',
				type: 'post',
				data: {'userusername':userusername},
				dataType: 'html',
				success: function (result) {
					if (result == true) {
						fnHistoryLog('DEACTIVATE ADMIN: '+userusername);
						toastr.success('User deactivate successful.');
						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
						// location.reload(true);
						// console.log('1');
					}
					else {
						toastr.error("User deactivation failed. Please check if it's your account that you're deactivating.");
						// console.log('0');
					}
				}
			});
		}

		//GET CURRENTLY LOGGED USER
		// $.ajax({
		// 	url: serverdir + '/process/getSessionValues.php',
		// 	dataType: 'json',
		// 	success: function (result) {
		// 		var currentloggeduser = result['userusername'];

		// 		if (currentloggeduser == userusername) {
		// 			if (confirm('Are you sure to deactivate your account? This will log you out.') === true) {
		// 				$.ajax({
		// 					url: serverdir + '/process/deactUser.php',
		// 					type: 'post',
		// 					data: {'userusername':userusername},
		// 					dataType: 'html',
		// 					success: function (result) {
		// 						if (result == true) {
		// 							fnHistoryLog('DEACTIVATE ADMIN: '+userusername);
		// 							toastr.success('User deactivate successful.');
		// 							$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
		// 							fnLogout();
		// 							// console.log('1');
		// 						}
		// 						else {
		// 							toastr.error('User deactivate failed.');
		// 							// console.log('0');
		// 						}
		// 					}
		// 				});
		// 			}
		// 		}
		// 		else {
		// 			if (confirm('Are you sure to deactivate user '+userusername+'?') === true) {
		// 				$.ajax({
		// 					url: serverdir + '/process/deactUser.php',
		// 					type: 'post',
		// 					data: {'userusername':userusername},
		// 					dataType: 'html',
		// 					success: function (result) {
		// 						if (result == true) {
		// 							fnHistoryLog('DEACTIVATE ADMIN: '+userusername);
		// 							toastr.success('User deactivate successful.');
		// 							$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
		// 							// location.reload(true);
		// 							// console.log('1');
		// 						}
		// 						else {
		// 							toastr.error("User deletion failed. Please check if it's your account that you're deactivating.");
		// 							// console.log('0');
		// 						}
		// 					}
		// 				});
		// 			}
		// 		}
		// 	}
		// });
	});
	$('#tblListOfUsers tbody').on('click','#btnDeleteUser',function(event){
		var dataSelect = tblListOfUsers.row( $(this).parents('tr') ).data();
		var userusername = dataSelect['userusername'];

		if (confirm('Are you sure to delete user '+userusername+'? This action is not reversible.') === true) {
			$.ajax({
				url: serverdir + '/process/deleteUser.php',
				type: 'post',
				data: {'userusername':userusername},
				dataType: 'html',
				success: function(result) {
					if (result == true) {
						fnHistoryLog('DELETE ADMIN: '+userusername);
						toastr.success('User deletion successful.');
						$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
						// location.reload(true);
						// console.log('1');
					}
					else {
						toastr.error("User deletion failed. Please check if it's your account that you're deleting.");
						// console.log('0');
					}
				}
			});
		}

		// //GET CURRENTLY LOGGED USER
		// $.ajax({
		// 	url: serverdir + '/process/getSessionValues.php',
		// 	dataType: 'json',
		// 	success: function (result) {
		// 		var currentloggeduser = result['userusername'];

		// 		if (currentloggeduser == userusername) {
		// 			if (confirm('Are you sure to delete your account? This action is not reversible.') === true) {
		// 				//DELETE ADMIN
		// 				$.ajax({
		// 					url: serverdir + '/process/deleteUser.php',
		// 					type: 'post',
		// 					data: {'userusername':userusername},
		// 					dataType: 'html',
		// 					success: function(result) {
		// 						if (result == true) {
		// 							fnHistoryLog('DELETE ADMIN: '+userusername);
		// 							toastr.success('User deletion successful.');
		// 							fnLogout();
		// 							// location.reload(true);
		// 							// console.log('1');
		// 						}
		// 						else {
		// 							toastr.error('User deletion failed.');
		// 							// console.log('0');
		// 						}
		// 					}
		// 				});
		// 			}
		// 		}
		// 		else {
		// 			if (confirm('Are you sure to delete user '+userusername+'? This action is not reversible.') === true) {
		// 				//DELETE ADMIN
		// 				$.ajax({
		// 					url: serverdir + '/process/deleteUser.php',
		// 					type: 'post',
		// 					data: {'userusername':userusername},
		// 					dataType: 'html',
		// 					success: function(result) {
		// 						if (result == true) {
		// 							fnHistoryLog('DELETE ADMIN: '+userusername);
		// 							toastr.success('User deletion successful.');
		// 							$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
		// 							// location.reload(true);
		// 							// console.log('1');
		// 						}
		// 						else {
		// 							toastr.error('User deletion failed.');
		// 							// console.log('0');
		// 						}
		// 					}
		// 				});
		// 			}
		// 		}
		// 	}
		// });
	});
}
function fnAddUserValidationConfirmPassword() {
	if ($('#txtAddUserPassword').val() !== $('#txtAddUserConfirmPassword').val()) {
		$('#txtAddUserPassword, #txtAddUserConfirmPassword').css({'border-color':'red'});
		return false;
	}
	else {
		$('#txtAddUserPassword, #txtAddUserConfirmPassword').css({'border-color':''});
		return true;
	}
}
$('#txtAddUserPassword, #txtAddUserConfirmPassword').bind('change keyup',function(){
	fnAddUserValidationConfirmPassword();
});
$(document).on('change click','#cmbAddUserDepartment', function(){
	$('#cmbAddUserUserLevel').empty();
	$('#cmbAddUserUserLevel').dropdown('restore defaults');
	if ($(this).val() == "City Administrator") {
		$('#cmbAddUserUserLevel')
			.html(''+
				'<option class = "default text" value = "0">Select user level</option>'+
				'<option value = "System Administrator">System Administrator</option>'+
			'');
	}
	else if ($(this).val() == "Market") {
		$('#cmbAddUserUserLevel')
			.html(''+
				'<option class = "default text" value = "0">Select user level</option>'+
				'<option value = "Inspector">Inspector</option>'+
				'<option value = "Collector">Collector</option>'+
			'');
	}
	else if ($(this).val() == "City Treasury Office") {
		$('#cmbAddUserUserLevel')
			.html(''+
				'<option class = "default text" value = "0">Select user level</option>'+
				'<option value = "Treasury">Treasury</option>'+
			'');
	}
	else if ($(this).val() == "0") {
		$('#cmbAddUserUserLevel')
			.html(''+
				'<option class = "default text" value = "0">Select user level</option>'+
			'');
	}
});
function fnAddUser() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/addUser.php',
		type: 'POST',
		data: $('#frmAddUser').serialize(),
		dataType: 'html',
		beforeSend: function(xhr) {
			if (!fnAddUserValidationConfirmPassword()) {
				xhr.abort();
				toastr.error('Passwords do not match.');
			}
		},
		success: function(result) {
			console.log(result);
			if (result) {
				fnHistoryLog('ADD ADMIN: '+$('input[name="txtAddUserUsername"]').val()+'');
				toastr.success('Add user successful.');
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmAddUser')[0].reset();
				console.log(result);
			}
			else {
				toastr.error('Add user failed.');
    			console.log(result);
			}
		}
	});
}
function fnEditUser() {
	// var newuserdata = $('#frmEditUser').serialize();
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/editUser.php',
		type: 'POST',
		data: $('#frmEditUser').serialize(),
		dataType: 'html',
		success: function (result) {
			if (result == true) {
				fnHistoryLog('EDIT ADMIN: '+$('input[name="txthiddenEditUserUsername"]').val());
				toastr.success('Edit user successful.');
				$('.ui.celled.striped.table').not('#tbListOfRemittables').DataTable().ajax.reload();
				$('#frmEditUser')[0].reset();
				$('[data-remodal-id=modalEditUsers]').remodal().close();
				// console.log('1');
			}
			else {
				toastr.error('Edit user failed.');
				// console.log('0');
			}
		}
	});
}
//HISTORY LOG
function fnGetHistoryLogs() {
	var tblHistoryLog = $('#tblHistoryLog').DataTable({
		ajax:{
			url: serverdir + '/process/getHistoryLogs.php',
			dataSrc: '',
			processing: true,
			serverside: true,
		},
		columns: [
			{'data':'historylogid'},
			{'data':'historylogdesc'},
			{'data':'historylogdate'},
			{'data':'userusername'},
			{'data':'userlevel'},
			{'data':'userdepartment'}
		],
		// columnDefs: [ {
		// 	targets: -1,
		// 	data: null,
		// 	defaultContent: '<button id="" class="btn btn-secondary btn-sm"><i class = "fa fa-pencil"></i></button> <button id = "" class="btn btn-secondary btn-sm"><i class = "fa fa-ban"></i></button>',
		// 	orderable: false
		// },{
		// 	searchable: true
		// }],
		deferRender: true,
		pageLength: 5
	});

	// setInterval(function(){
	// 	$('#tblHistoryLog').DataTable().ajax.reload(null,false);
	// },1500);
}
//DATABASE
function fnBackupDB() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/backupDB.php',
		type: 'POST',
		data: $('#frmBackupDB').serialize(),
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				toastr.success('Database backup successful.');
				$('#frmBackupDB')[0].reset();
			}
			else {
				toastr.error('Database backup failed.');
			}
		}
	});
}
function fnRestoreDB() {
	$('#restore').toggleClass('disabled loading',true);
	var data = new FormData();
	$.each($('#sqlfile')[0].files, function (i, file) {
		data.append('file-'+i, file);
	});
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/restoreDB.php',
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		method: 'POST',
		success: function(result) {
			$('#restore').toggleClass('disabled loading',false);
			if (result == true) {
				fnHistoryLog('DATABASE RESTORE: SUCCESS');
				toastr.success('Database restoration successful.');

				$('#frmRestoreDB')[0].reset();
			}
			else {
				toastr.success('Database restoration failed.');
			}
		}
	});
}
//END ADMIN FUNCTIONS

//START WINDOW FUNCTIONS
$('#btnMMS').click(function(){
	$('#divSidebarAdmin').sidebar('toggle');
});
$('#btnMMS').popup({
	position: 'bottom right'
});
$('#btnLoggedUser').dropdown();
$('#btnDivUsersMgmt').click(function(){
	$('.ui.container').not('#divUsersMgmt').hide();
	$('#divUsersMgmt').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivHistoryLog').click(function(){
	$('.ui.container').not('#divHistoryLog').hide();
	$('#divHistoryLog').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivDBMgmt').click(function(){
	$('.ui.container').not('#divDBMgmt').hide();
	$('#divDBMgmt').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
$('#btnDivChangePassword').click(function(){
	$('.ui.container').not('#divChangePassword').hide();
	$('#divChangePassword').show();

	$(this).toggleClass('active',true);
	$('.item').not(this).toggleClass('active',false);
});
//END WINDOW FUNCTIONS

//START SUBMIT FUNCTIONS
$('#frmAddUser').submit(function(event){
	fnAddUser();
});
$('#frmEditUser').submit(function(event){
	fnEditUser();
});
$('#frmBackupDB').submit(function(event){
	fnBackupDB();
});
$('#frmRestoreDB').submit(function(event){
	fnRestoreDB();
});
//END MAIN FUNCTIONS

//LOAD ALL TABLES
fnGetUsers();

fnGetHistoryLogs();