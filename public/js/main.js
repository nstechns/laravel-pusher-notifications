(function(){
$('#_markasread').click(function(event) {
	$.get('/admin/markasread', function(data, textStatus, xhr) {
	  //optional stuff to do after success
	});
	
});

})();

function markNotificationAsRead(notifcationCount){
	if(notifcationCount>0){
	$.get('/admin/markasread', function(data, textStatus, xhr) {
	  //optional stuff to do after success
	});
    }
}