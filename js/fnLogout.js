function fnLogout() {
	event.preventDefault();
	$.ajax({
		url: serverdir + '/process/logout.php',
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				fnHistoryLog('USER LOGOUT');
				$('#btnLogout').prop("disabled",true);
				$('#btnLogout').html('<center>Logging out... <img id="load" src="../loader.gif" width="15px" height="15px"></center>');
				$('#load').attr('hidden',false);
				setTimeout(function(){self.location = serverdir;},1500);
			}
		}
	});
}

$('#btnLogout').click(function(event){
	if (confirm('This will log you out of your account. Are you sure?') == true) {
		$('#btnLogout').toggleClass('disabled',true);
		fnLogout();	
	}
});