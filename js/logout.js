var ajax = 'ajax/';
function logout() {
	jQuery.ajax({
		type: "POST",
		url: ajax+"deconnexion.php",
		cache: false,
		success: function(html){
			window.location.reload();
		},
		statusCode: {
			404: function() {
				alert('Check you internet connection!')
			}
		}
	});
}