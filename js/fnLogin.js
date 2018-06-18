//START LOG FUNCTIONS
function fnLogin() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/login.php',
		type: 'post',
		data: $('#frmLogin').serialize(),
		dataType: 'json',
		success: function(result){
			if (result.length != 0) {
				fnHistoryLog('USER LOGIN: SUCCESSFUL');
				toastr.success('Login successful.');
				if (result[0]['userlevel'] == 'System Administrator') {
					setTimeout(function(){
						self.location = serverdir + '/views/admin';
					},1500);
				}
				else if (result[0]['userlevel'] == 'Market') {
					setTimeout(function(){
						self.location = serverdir + '/views/market';
					},1500);
				}
				else if (result[0]['userlevel'] == 'Treasury' || result[0]['userlevel'] == 'Inspector') {
					setTimeout(function(){
						self.location = serverdir + '/views/treasury';
					},1500);
				}
			}
			else {
				fnHistoryLog('USER LOGIN: FAILED');
				toastr.error('Login failed.');
			}
			// console.log(result);
		}
	});
}
//END LOG FUNCTIONS

$('#frmLogin').submit(function(event){
	fnLogin();
});