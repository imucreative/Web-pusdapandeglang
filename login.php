<?php
	include "attr/config/conn.php";
	include "attr/config/library.php";
?>
	<h2 class="title text-center">Login Member</h2>
	<div class="col-sm-5">
		<div class="login-form"><!--login form-->
			<h2>Login to your account</h2>
			<form>
				<input type="text" placeholder="* Isikan Username" id='username'/>
				<input type="password" placeholder="* Password" id='password'/>
				<button id="tombolLogin" type="button" class="btn btn-default"><i class="fa fa-sign-in"></i> Login</button>
			</form>
		</div><!--/login form-->
	</div>
	<div class="col-sm-1">
		<h2 class="or">OR</h2>
	</div>
	<div class="col-sm-5">
		<div class="signup-form"><!--sign up form-->
			<h2>New Member Signup!</h2>
			<form action="#">
				<input type="text" placeholder="* Username" id='username2'/>
				<input type="password" placeholder="* Password" id='password2'/>
				<input type="text" placeholder="* Nama Lengkap" id="namaMember2"/>
				<button id="tombolSignup" type="button" class="btn btn-default"><i class="fa fa-lock"></i> Signup</button>
			</form>
		</div><!--/sign up form-->
	</div>

<script type="text/javascript">
	$(function(){
		$("#tombolLogin").click(function(){
			var user	= $("#username");
			var pass	= $("#password");
			
			if (user.val() == ""){
				alert("* Please Input Username!");
				user.focus();
				return (false);
			}else if (pass.val() == ""){
				alert("* Please Input Password!");
				pass.focus();
				return (false);
			}
			
			if(user.val() != '' && pass.val() != ''){
				var UrlToPass = 'username='+user.val()+'&password='+pass.val();
				$.ajax({
					type	: 'POST',
					data	: UrlToPass,
					url		: 'attr/config/cekLoginMember.php',
					success	: function(response){
						if(response == 2){
							alert("* Username OR Password Fail");
							user.focus();
							return (false);
						}else if(response == 1){
							window.location = 'member/index.php';
							return (false);
						}else{
							alert("Problem with sql query");
							return (false);
						}
					}
				});
			}
		});
		
		$("#tombolSignup").click(function(){
			var user2		= $("#username2");
			var pass2		= $("#password2");
			var namaMember2	= $("#namaMember2");
			
			if (user2.val() == ""){
				alert("* Please Input Username!");
				user2.focus();
				return (false);
			}else if (pass2.val() == ""){
				alert("* Please Input Password!");
				pass2.focus();
				return (false);
			}else if (namaMember2.val() == ""){
				alert("* Please Input Nama Lengkap Member!");
				namaMember2.focus();
				return (false);
			}
			
			if(user2.val() != '' && pass2.val() != '' && namaMember2.val() != ''){
				var data = 'username='+user2.val()+'&password='+pass2.val()+'&namaMember='+namaMember2.val();
				$.ajax({
					type	: 'POST',
					data	: data,
					url		: 'attr/config/saveMemberBaru.php',
					success	: function(){
						window.location = 'member/index.php';
					}
				});
			}
		});


		
	});
</script>