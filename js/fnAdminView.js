$('.ui.container').not('#divUsersMgmt').hide();
$('#btnDivUsersMgmt').toggleClass('active',true);

toastr.info('Click the logo on the upper left of your screen to toggle the sidebar.', {timeOut: 5000});