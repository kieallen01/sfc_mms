function fnLaunchNanobar(intPercentage) {	
	const nanobar =  new Nanobar({
		classname	: 'my-class',
		id			: 'my-id',
		target		: document.getElementById('myDivId')
	});
	nanobar.go(intPercentage);
}