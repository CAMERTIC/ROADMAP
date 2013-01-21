var ajax = 'ajax/';
function logout() {
	jQuery.ajax({
		type: "POST",
		url: ajax+"deconnexion.php",
		cache: false,
		success: function(html){
			window.location = './index.php';
		},
		statusCode: {
			404: function() {
				alert('Check you internet connection!')
			}
		}
	});
}