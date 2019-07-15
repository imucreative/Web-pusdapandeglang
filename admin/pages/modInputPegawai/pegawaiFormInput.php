<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	
	$attrIdPegawai = $_POST['id'];
	
		$queryEdit	= mysql_query("SELECT * FROM pegawai WHERE idPegawai='$attrIdPegawai'");
		$dataEdit	= mysql_fetch_array($queryEdit);
		
		if($attrIdPegawai=='0'){
			$username		= '';
			$password		= '';
			$namaPegawai	= '';
			$alamatPegawai	= '';
			$telpPegawai	= '';
		}else{
			$username		= $dataEdit['username'];
			$password		= $dataEdit['password'];
			$namaPegawai	= $dataEdit['namaPegawai'];
			$alamatPegawai	= $dataEdit['alamatPegawai'];
			$telpPegawai	= $dataEdit['telpPegawai'];
		}
?>
<form method='POST'>
	<fieldset>
		<input type="hidden" name="idPegawai" id="idPegawai" class="form-control input-field" value='<?php echo $attrIdPegawai; ?>'>
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
			<label for="namaPegawai">Nama Pegawai</label>&nbsp;
			<label for="namaPegawai"><div id='namaPegawaiVal'></div></label>
			<input type="text" name="namaPegawai" id="namaPegawai" class="form-control input-field" placeholder="* Nama Pegawai" value='<?php echo $namaPegawai; ?>'>
		</div>
		<div class="form-group">
			<label for="alamatPegawai">Alamat Pegawai</label>&nbsp;
			<label for="alamatPegawai"><div id='alamatPegawaiVal'></div></label>
			<input type="text" name="alamatPegawai" id="alamatPegawai" class="form-control input-field" placeholder="* Alamat Pegawai" value='<?php echo $alamatPegawai; ?>'>
		</div>
		<div class="form-group">
			<label for="telpPegawai">Telp. Pegawai</label>&nbsp;
			<label for="telpPegawai"><div id='telpPegawaiVal'></div></label>
			<input type="text" name="telpPegawai" id="telpPegawai" class="form-control input-field" placeholder="* Telp. Pegawai" value='<?php echo $telpPegawai; ?>'>
		</div>
	</fieldset>
</form>

<script>
	$('#namaPegawai, #username, #password, #alamatPegawai, #telpPegawai').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode
			if (charCode != 13)
			return true;
		return false;
	});
	
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
	
	$('#telpPegawai').keypress(function(event){
		var charCode = (event.which) ? event.which : event.keyCode
			if ((charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9 || charCode == 45)
			return true;
			$("#telpPegawaiVal").html("<font color='red'> | * Mohon Input Number</font>").show().fadeOut(20000);
			telpPegawai.focus();
		return false;
	});
</script>