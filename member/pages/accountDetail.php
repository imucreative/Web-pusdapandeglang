<?php
	include "../../attr/config/conn.php";
	include "../../attr/config/library.php";
	
	$idMember 	= $_REQUEST['idMember'];
	$queryEdit	= mysql_query("SELECT * FROM member WHERE idMember='$idMember'");
	$dataEdit	= mysql_fetch_array($queryEdit);
		
		$username		= $dataEdit['username'];
		$password		= $dataEdit['password'];
		$namaMember		= $dataEdit['namaMember'];
		$alamatMember	= $dataEdit['alamatMember'];
		$tlpMember		= $dataEdit['tlpMember'];
		$pinBbm			= $dataEdit['pinBbm'];
		$facebook		= $dataEdit['facebook'];
		$twitter		= $dataEdit['twitter'];
		$noKtpMember	= $dataEdit['noKtpMember'];
		$fotoMember		= $dataEdit['fotoMember'];
?>
	<div class="row">
		<div class="col-xs-8">
			<fieldset>
				<div class="form-group has-error">
					<div class="row">
						<div class="col-xs-3">
							<label for="username">Username</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="username" id="username" class="form-control input-field" placeholder="* Username" value='<?php echo $username; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group has-error">
					<div class="row">
						<div class="col-xs-3">
							<label for="password">Password <input id="tampil" type="checkbox" /></label>
						</div>
						<div class="col-xs-9">
							<input type="password" name="password" id="password" class="form-control input-field" placeholder="* Password" value='<?php echo base64_decode(base64_decode(base64_decode($password))); ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							<label for="namaMember">Nama</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="namaMember" id="namaMember" class="form-control input-field" placeholder="* Nama Member" value='<?php echo $namaMember; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							<label for="tlpMember">Telp.</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="tlpMember" id="tlpMember" class="form-control input-field" placeholder="* Telp. Member" value='<?php echo $tlpMember; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							<label for="alamatMember">Alamat</label>
						</div>
						<div class="col-xs-9">
							<textarea class="form-control input-field" name="alamatMember" id="alamatMember" placeholder="* Alamat Member" ><?php echo $alamatMember; ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							<label for="noKtpMember">No. KTP/ID</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="noKtpMember" id="noKtpMember" class="form-control input-field" placeholder="* No. Kartu Identitas" value='<?php echo $noKtpMember; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							<label for="pinBbm">Pin BBM</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="pinBbm" id="pinBbm" class="form-control input-field" placeholder="* Pin BBM" value='<?php echo $pinBbm; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							<label for="facebook">Facebook</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="facebook" id="facebook" class="form-control input-field" placeholder="* Facebook" value='<?php echo $facebook; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-3">
							<label for="twitter">Twitter</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="twitter" id="twitter" class="form-control input-field" placeholder="* Twitter" value='<?php echo $twitter; ?>'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-9">
							&nbsp;
						</div>
						<div class="col-xs-3" align='center'>
							<button type="submit" class="btn btn-success btn-flat" id="saveMember"><i class="fa fa-save"></i> Save</button>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	
		<div class="col-xs-4">
			<div id='tampilFotoMember' align='center'>
				<img src="../admin/dist/img/fotoMember/<?php if($fotoMember==''){ echo "default.jpg";}else{ echo $fotoMember; }?>" style="margin-top:5px; margin-left:5px; margin-right:5px; margin-bottom:5px; width:170px; height:220px; border:2px solid;">
			</div>
			<form id='uploadFotoMember' method='post'>
				<div class="row">
					<div class="col-xs-12" align='center'>
						<input type="file" name="fotoMember" />
						<button class="btn btn-info btn-flat" type="submit" id='tombolUploadFoto'><i class="fa fa-download"></i> Upload</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div class="modal fade" id="notifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog" >
			<div class="modal-content" >
				<div class="modal-header">
					<h4 class="modal-title">Attention</h4>
				</div>
				<div class="modal-body" id='isiNotif'></div>
			</div>
		</div>
	</div>
	
<script>
	$(function(){
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
		
		$('#noKtpMember, #tlpMember').keypress(function(event){
			var charCode = (event.which) ? event.which : event.keyCode
				if ((charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9 || charCode == 45)
				return true;
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Number</font></label>").show();
			return false;
		});
		
			$("#uploadFotoMember").on("submit", (function(e){
				if (confirm('Are you sure ?')){
					e.preventDefault();
					$.ajax({
						url: "pages/accountSaveFotoMember.php?idMember=<?php echo $idMember;?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data){
							$("#tampilFotoMember").html(data);
						},
						error: function(){}
					});
					return false;
				}else{
					return false;
				}
			}));
			
		$("#saveMember").click(function(){
			var username		= $('#username');
			var password		= $('#password');
			var namaMember		= $('#namaMember');
			var tlpMember		= $('#tlpMember');
			var alamatMember	= $('#alamatMember');
			var noKtpMember		= $('#noKtpMember');
			var pinBbm			= $('#pinBbm');
			var facebook		= $('#facebook');
			var twitter			= $('#twitter');
			var idMember		= '<?php echo $idMember; ?>';
			
			if(username.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Username</font></label>").show();
				return false;
			}else if(password.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Password</font></label>").show();
				return false;
			}else if(namaMember.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Nama Member</font></label>").show();
				return false;
			}else if(tlpMember.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input No. Telp. Member</font></label>").show();
				return false;
			}else if(alamatMember.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Alamat Member</font></label>").show();
				return false;
			}else if(noKtpMember.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input No. Kartu Identitas Member</font></label>").show();
				return false;
			}else if(pinBbm.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input PIN BBM</font></label>").show();
				return false;
			}else if(facebook.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Facebook</font></label>").show();
				return false;
			}else if(twitter.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Twitter</font></label>").show();
				return false;
			}
			
			if (confirm('Are you sure ?')){
				var DataForm = "idMember="+idMember+"&username="+username.val()+"&password="+password.val()+"&namaMember="+namaMember.val()+"&tlpMember="+tlpMember.val()+"&alamatMember="+alamatMember.val()+"&noKtpMember="+noKtpMember.val()+"&pinBbm="+pinBbm.val()+"&facebook="+facebook.val()+"&twitter="+twitter.val();
				
				$.ajax({
					url: "pages/accountSaveMember.php",
					method: 'GET',
					data: DataForm,
					success : function(){
						var idMember	= '<?php echo $idMember;?>';
						var url = "pages/account.php?idMember="+idMember;
						$("#mainPage").html("<center><img src='../admin/dist/img/loading.gif'></center>");
						$("#mainPage").load(url);
					},
					error: function(){
						alert("Input Gagal!");
					}
				});
				return false;
			}
		});
	});
</script>