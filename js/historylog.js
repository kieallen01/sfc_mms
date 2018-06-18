function fnHistoryLog(strHistoryLogDesc) {
	$.ajax({
		url: serverdir + '/process/historylog.php',
		type: 'post',
		data: {'strHistoryLogDesc':strHistoryLogDesc},
		dataType: 'html',
		success: function(result) {
			if (result == true) {
				strHistoryLogDesc = '';
				alert('recorded');
			}
			// console.log(result);
		}
	});
}