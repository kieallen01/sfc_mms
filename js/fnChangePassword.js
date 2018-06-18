$('#txtChangePasswordNewPassword,#txtChangePasswordNewPasswordConfirm').keyup(function() {
	if ($('#txtChangePasswordNewPassword').val() != $('#txtChangePasswordNewPasswordConfirm').val()) {
		$('#txtChangePasswordNewPassword,#txtChangePasswordNewPasswordConfirm').css('border-color','red');
	}
	else {
		$('#txtChangePasswordNewPassword,#txtChangePasswordNewPasswordConfirm').css('border-color','');
	}
});

$('#frmChangePassword').submit(function(event) {
	event.preventDefault();

	if (confirm('Changing your password will log you out of your account. Confirm this action?') == true) {
		$.ajax({
			url: serverdir + '/process/changePassword.php',
			type: 'post',
			data: {
				'txtChangePasswordCurrentPassword'	:$('#txtChangePasswordCurrentPassword').val(),
				'txtChangePasswordNewPassword'		:$('#txtChangePasswordNewPassword').val()
			},
			dataType: 'html',
			beforeSend: function (xhr) {
				if ($('#txtChangePasswordNewPassword').val() != $('#txtChangePasswordNewPasswordConfirm').val()) {
					xhr.abort();
					toastr.error('Passwords are not the same.');
				}
			},
			success: function (result) {
				if (result) {
					fnHistoryLog('CHANGED PASSWORD');
					toastr.success('Password change successful. Logging you out...');
					fnLogout();
				}
				else {
					toastr.error('Password change failed. Please check your old and new passwords then try again.');
				}
			}
		});
	}
});