<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";

		$username		= '';
		$password		= '';
		$namaMember		= '';
		$alamatMember	= '';
		$tlpMember		= '';
		$pinBbm			= '';
		$facebook		= '';
		$twitter		= '';
		$noKtpMember	= '';
?>

	<div class="row">
		<div class="col-xs-6">
			<fieldset>
				<div class="form-group has-error">
					<label for="username">Username</label>&nbsp;
					<label for="username"><div id='usernameVal'></div></label>
					<input type="text" name="username" id="username" class="form-control input-field" placeholder="* Username" value='<?php echo $username; ?>'>
				</div>
				<div class="form-group has-error">
					<label for="password">Password <input id="tampil" type="checkbox" /></label>&nbsp;
					<label for="password"><div id='passwordVal'></div></label>
					<input type="password" name="password" id="password" class="form-control input-field" placeholder="* Password" value='<?php echo base64_decode(base64_decode(base64_decode($password))); ?>'>
				</div>
				<div class="form-group">
					<label for="namaMember">Nama Member</label>&nbsp;
					<label for="namaMember"><div id='namaMemberVal'></div></label>
					<input type="text" name="namaMember" id="namaMember" class="form-control input-field" placeholder="* Nama Member" value='<?php echo $namaMember; ?>'>
				</div>
				<div class="form-group">
					<label for="tlpMember">Telp. Member</label>&nbsp;
					<label for="tlpMember"><div id='tlpMemberVal'></div></label>
					<input type="text" name="tlpMember" id="tlpMember" class="form-control input-field" placeholder="* Telp. Member" value='<?php echo $tlpMember; ?>'>
				</div>
				<div class="form-group">
					<label for="alamatMember">Alamat Member</label>&nbsp;
					<label for="alamatMember"><div id='alamatMemberVal'></div></label>
					<textarea class="form-control input-field" name="alamatMember" id="alamatMember" placeholder="* Alamat Member" ><?php echo $alamatMember; ?></textarea>
				</div>
			</fieldset>
		</div>
		<div class="col-xs-6">
			<fieldset>
				<div class="form-group">
					<label for="noKtpMember">No. Kartu Identitas</label>&nbsp;
					<label for="noKtpMember"><div id='noKtpMemberVal'></div></label>
					<input type="text" name="noKtpMember" id="noKtpMember" class="form-control input-field" placeholder="* No. Kartu Identitas" value='<?php echo $noKtpMember; ?>'>
				</div>
				<div class="form-group">
					<label for="pinBbm">Pin BBM</label>&nbsp;
					<label for="pinBbm"><div id='pinBbmVal'></div></label>
					<input type="text" name="pinBbm" id="pinBbm" class="form-control input-field" placeholder="* Pin BBM" value='<?php echo $pinBbm; ?>'>
				</div>
				<div class="form-group">
					<label for="facebook">Facebook</label>&nbsp;
					<label for="facebook"><div id='facebookVal'></div></label>
					<input type="text" name="facebook" id="facebook" class="form-control input-field" placeholder="* Facebook" value='<?php echo $facebook; ?>'>
				</div>
				<div class="form-group">
					<label for="twitter">Twitter</label>&nbsp;
					<label for="twitter"><div id='twitterVal'></div></label>
					<input type="text" name="twitter" id="twitter" class="form-control input-field" placeholder="* Twitter" value='<?php echo $twitter; ?>'>
				</div>
			</fieldset>
		</div>
	</div>

<script>
	$(document).ready(function(){
		$.toggleShowPassword = function (options) {
			var settings = $.extend({
				field: "#password",
				control: "#toggle_show_password",
			}, options);
		
			var control = $(settings.control);
			var field = $(settings.field);
		
			control.bind('click', function () {
				if (control.is(':checked')) {
					field.attr('type', 'text');
				} else {
					field.attr('type', 'password');
				}
			})
		};
	}(jQuery));

	$.toggleShowPassword({
		field: '#password',
		control: '#tampil'
	});
	
	$('#noKtpMember').keypress(function(event){
		var charCode = (event.which) ? event.which : event.keyCode
			if ((charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9 || charCode == 45)
			return true;
			$("#noKtpMemberVal").html("<font color='red'> | * Mohon Input Number</font>").show().fadeOut(20000);
			noKtpMember.focus();
		return false;
	});
	
	$('#tlpMember').keypress(function(event){
		var charCode = (event.which) ? event.which : event.keyCode
			if ((charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9 || charCode == 45)
			return true;
			$("#tlpMemberVal").html("<font color='red'> | * Mohon Input Number</font>").show().fadeOut(20000);
			tlpMember.focus();
		return false;
	});
</script>