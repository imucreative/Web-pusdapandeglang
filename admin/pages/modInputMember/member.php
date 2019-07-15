<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
?>
<h2 class="page-header">Data Member |
	<button data-toggle="modal" data-target="#modalMember" id='0' class="inputMember btn btn-flat btn-primary">
		<i class="fa fa-plus"></i> Input Member
	</button>
	<a class='btn btn-default btn-flat' href="index.php"><i class="fa fa-arrow-left"></i> Back</a>
</h2>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-body">
				<div id='tampilTabelMember'></div>
			</div>
		</div>
	</div>
</div>

	<div id="modalMember" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><div id='labelHeaderMember'></div></h4>
				</div>
				<div class="modal-body" id='bodyMember'></div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-flat" data-id="0" id="saveMember"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</div>
	</div>

<script>
	$(function(){
		var urlTampilTabelMember = "pages/modInputMember/memberTabel.php";
		$("#tampilTabelMember").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tampilTabelMember").load(urlTampilTabelMember);
	
		$('.inputMember').click(function(){
			var idMember = $(this).attr('id');
			var url = "pages/modInputMember/memberFormInput.php";
			$("#labelHeaderMember").html("Form Input Member");
			$("#bodyMember").load(url);
		});
		
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
			var idMember 		= $(this).data('id');
			
			if(username.val()==''){
				$("#usernameVal").html("<font color='red'> | * Mohon Input Username</font>").show().fadeOut(20000);
				username.focus();
				return false;
			}else if(password.val()==''){
				$("#passwordVal").html("<font color='red'> | * Mohon Input Password</font>").show().fadeOut(20000);
				password.focus();
				return false;
			}else if(namaMember.val()==''){
				$("#namaMemberVal").html("<font color='red'> | * Mohon Input Nama Member</font>").show().fadeOut(20000);
				namaMember.focus();
				return false;
			}else if(tlpMember.val()==''){
				$("#tlpMemberVal").html("<font color='red'> | * Mohon Input No. Telp. Member</font>").show().fadeOut(20000);
				tlpMember.focus();
				return false;
			}else if(alamatMember.val()==''){
				$("#alamatMemberVal").html("<font color='red'> | * Mohon Input Alamat Member</font>").show().fadeOut(20000);
				alamatMember.focus();
				return false;
			}else if(noKtpMember.val()==''){
				$("#noKtpMemberVal").html("<font color='red'> | * Mohon Input No. Kartu Identitas Member</font>").show().fadeOut(20000);
				noKtpMember.focus();
				return false;
			}else if(pinBbm.val()==''){
				$("#pinBbmVal").html("<font color='red'> | * Mohon Input PIN BBM</font>").show().fadeOut(20000);
				pinBbm.focus();
				return false;
			}else if(facebook.val()==''){
				$("#facebookVal").html("<font color='red'> | * Mohon Input Facebook</font>").show().fadeOut(20000);
				facebook.focus();
				return false;
			}else if(twitter.val()==''){
				$("#twitterVal").html("<font color='red'> | * Mohon Input Twitter</font>").show().fadeOut(20000);
				twitter.focus();
				return false;
			}
		
			var DataForm = "idMember="+idMember+"&username="+username.val()+"&password="+password.val()+"&namaMember="+namaMember.val()+"&tlpMember="+tlpMember.val()+"&alamatMember="+alamatMember.val()+"&noKtpMember="+noKtpMember.val()+"&pinBbm="+pinBbm.val()+"&facebook="+facebook.val()+"&twitter="+twitter.val();
			
			$.ajax({
				url: "pages/modInputMember/saveMember.php",
				method: 'GET',
				data: DataForm,
				success : function(){
					$("#modalMember").modal('hide');
					var urlTampilTabelMember = "pages/modInputMember/memberTabel.php";
					$("#tampilTabelMember").html("<center><img src='dist/img/loading.gif'></center>");
					$("#tampilTabelMember").load(urlTampilTabelMember);
				},
				error: function(){
					alert("Input Gagal!");
				}
			});
		});

	});
</script>