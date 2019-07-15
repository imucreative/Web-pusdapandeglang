$(document).ready(function(){
	var res		= $('#res');
	var user	= $("#username");
	var pass	= $("#password");

	res.hide();
	user.focus();
	$('#submit').click(function(){
		if (user.val() == ""){
			res.fadeOut("slow");
			res.html('<font color="red"><b>* Please Input Username</b></font>').fadeTo(3000, 500).fadeOut("slow");
			user.focus();
			return (false);
		}

		if (pass.val() == ""){
			res.fadeOut("slow");
			res.html('<font color="red"><b>* Please Input Password</b></font>').fadeTo(3000, 500).fadeOut("slow");
			pass.focus();
			return (false);
		}

		if(user.val() != '' && pass.val() != ''){
			var UrlToPass = 'username='+user.val()+'&password='+pass.val();
			$.ajax({
				type	: 'POST',
				data	: UrlToPass,
				url		: 'cek_login.php',
				success	: function(response){
					if(response == 2){
						res.fadeOut("slow");
						res.html('<font color="red"><b>* Username & Password Fail</b></font>').fadeTo(3000, 500).fadeOut("slow");
						user.focus();
						return (false);
					}else if(response == 1){
						window.location = 'index.php';
					}else{
						alert("Problem with sql query");
					}
				}
			});
		}
	return (false);
	});
});