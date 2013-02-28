var ajax = 'ajax/';
function updateUser() {
	//alert('hello'); return false;
	var password = jQuery('#password').val();
	var login = jQuery('#login').val();
	if(jQuery('#pw').val() == ''){
		alert('Please give the password');
		return false;
	}
	
	
	if(jQuery('#pw').val() == jQuery('#pw').val()){
		alert('Please enter a another password!!!');
		return false;
	}
	
	if(jQuery('#login').val() == ''){
		alert('Please add the user name or login before');
		return false;
	}
	var data = jQuery('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addUser.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('.notibar').html('<a class="close"></a><p>User successfully updated.</p>');
				jQuery('.notibar').fadeIn("slow");
				setTimeout(function() {
					jQuery('.notibar').fadeOut("slow");
				}, 2000);	
			} else {
				jQuery('.notibar').removeClass('green');
				jQuery('.notibar').addClass('red');
				jQuery('.notibar').html('<span></span>'+html);
				jQuery('.notibar').fadeIn("slow");
				setTimeout(function() {
					jQuery('.notibar').fadeOut("slow");
				}, 4000);	
			}
		}
	});
	//resetForm(jQuery('#userform'));	
}

function addUser() {
	//alert('hello'); return false;
	var password = jQuery('#password').val();
	var login = jQuery('#login').val();
	if(jQuery('#pw').val() == ''){
		alert('Please give the password');
		return false;
	}
	if(jQuery('#login').val() == ''){
		alert('Please add the user name or login before');
		return false;
	}
	var data = jQuery('#userform').serialize();
	//alert(data);
	jQuery.ajax({
		type: "POST",
		url: ajax+"addUser.php",
		data: data,
		cache: false,
		success: function(html){
			if(html==""){
				jQuery('.notibar').html('<a class="close"></a><p>User successfully added.</p>');
				jQuery('.notibar').fadeIn("slow");
				setTimeout(function() {
					jQuery('.notibar').fadeOut("slow");
				}, 2000);	
			} else {
				jQuery('.notibar').removeClass('green');
				jQuery('.notibar').addClass('red');
				jQuery('.notibar').html('<span></span>'+html);
				jQuery('.notibar').fadeIn("slow");
				setTimeout(function() {
					jQuery('.notibar').fadeOut("slow");
				}, 4000);	
			}
		}
	});
	resetForm(jQuery('#userform'));	
}

function resetForm(ele) {
	
    jQuery(ele).find(':input').each(function() {
        switch(this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                jQuery(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });

}
function deleteUser(id) {
	
	if (confirm("You want to delete the user?")) {
		
		jQuery.ajax({
		  type: "POST",
		  url: ajax+"delUser.php",
		  data: "login="+id,
		  cache: false,
		  success: function(html){
			//alert('succesfully');
			if(html==""){
				jQuery('.notibar').html('<a class="close"></a><p>User succesfully deleted.</p>');
				jQuery('.notibar').fadeIn("slow");
				jQuery('#'+id).fadeOut("slow");
				setTimeout(function() {
					jQuery('#'+id).remove();
				}, 1000);
				jQuery('.notibar').fadeOut("slow");
			} else {
				jQuery('.notibar').removeClass('green');
				jQuery('.notibar').addClass('red');
				jQuery('.notibar').html('<span></span>'+html);
				jQuery('.notibar').fadeIn("slow");
				setTimeout(function() {
					jQuery('.notibar').fadeOut("slow");
				}, 5000);	
			}
		  }
		});	
	} else {
			//alert('Non je supprime pas');
	}
	return false;
}