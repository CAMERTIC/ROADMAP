jQuery(document).ready(function(){
								
	///// TRANSFORM CHECKBOX /////							
	jQuery('input:checkbox').uniform();
	
	///// LOGIN FORM SUBMIT /////
	jQuery('#connexion').click(function(){
	
		if(jQuery('#username').val() == '' && jQuery('#password').val() == '') {
			jQuery('#message').html('The username you entered is incorrect.');
			jQuery('.nousername').fadeIn();
			jQuery('.nopassword').hide();
			return false;	
		}
		if(jQuery('#username').val() != '' && jQuery('#password').val() == '') {
			jQuery('.nopassword').fadeIn().find('.userlogged h4, .userlogged a span').text(jQuery('#username').val());
			jQuery('.nousername,.username').hide();
			return false;;
		}
		if(jQuery('#username').val() != '' && jQuery('#password').val() != '') {
			//alert(jQuery('#username').val());
			jQuery('#message').html('Authentification...');
			  jQuery.ajax({
				  type: "POST",
				  url: "./ajax/login.php",
				  data: "login="+jQuery('#username').val()+"&pw="+jQuery('#password').val(),
				  cache: false,
				  success: function(html){
					if(html == 'true') {
						// jQuery('#message').html('Authentication reussi! Redirection vers votre page...');
						// jQuery('#message').removeClass('error');
						// jQuery('#message').addClass('success');
						setTimeout(function() {
							window.location='./index.php'
						}, 2000);
					} else {
						//alert('Faux');
						jQuery('#message').html('The username or password is incorrect.');
						jQuery('.nousername').fadeIn();
						jQuery('.nopassword').hide();
									
					}
				  }
				});
		}
		return false;
	});
	
	///// ADD PLACEHOLDER /////
	jQuery('#username').attr('placeholder','Username');
	jQuery('#password').attr('placeholder','Password');
});
