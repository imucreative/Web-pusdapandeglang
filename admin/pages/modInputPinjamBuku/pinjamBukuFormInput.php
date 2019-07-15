<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
?>

<div class="row">
	<form method='POST' >
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-body">

					<fieldset>
						<div class="form-group">
							<label for="namaMember">Nama Member</label>&nbsp;
							<label for="namaMember"><div id='namaMemberVal'></div></label>
							<div class="row">
								<div class="col-xs-2">
									<input type="text" readonly name="idMember" id="idMember" class="form-control" placeholder="ID Member">
								</div>
								<div class="col-xs-10">
									<input type="text" name="namaMember" id="namaMember" class="form-control input-field" placeholder="* Nama Member" >
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="jaminan">Jaminan </label>&nbsp;
							<label for="jaminan"><div id='jaminanVal'></div></label>
							<input type="text" name="jaminan" id="jaminan" class="form-control input-field" placeholder="* Jaminan" >
						</div>
						<div class="form-group">
							<label for="tglPengembalian">Tgl Pengembalian</label>&nbsp;
							<label for="tglPengembalian"><div id='tglPengembalianVal'></div></label>
							<div class="input-group">
								<input type="text" class="form-control" name='tglPengembalian' id='tglPengembalian' readonly />
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
							</div>
						</div>
						<div class="form-group" align="right">
							<button type="button" class="btn btn-success btn-flat" data-id="0" id="savePinjamBuku"><i class="fa fa-save"></i> Save</button>
							<button type="button" class="btn btn-danger btn-flat" id="cancelPinjamBuku"><i class="fa fa-close"></i> Cancel</button>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	$(document).ready(function(){
		$("#cancelPinjamBuku").click(function(){
			$("#tampilInputPinjamBuku").slideUp();
		});
		
		$("#namaMember").autocomplete({
			source: "dist/config/autoCompleteMember.php", 
			minLength:1,
			select: function(event, ui) {
				event.preventDefault();
				$(this).val(ui.item.label);
				$("#idMember").val(ui.item.value);
			}
		});
		
		$('#tglPengembalian').datepicker({
			autoclose:true,
			todayHighlight:true,
			format: "yyyy-mm-dd"
		});

		$("#savePinjamBuku").click(function(){
			var idPinjamBuku	= $(this).data('id');
			var idMember		= $('#idMember');
			var namaMember		= $('#namaMember');
			var jaminan			= $('#jaminan');
			var tglPengembalian	= $('#tglPengembalian');
			
			if(idMember.val()==''){
				$("#namaMemberVal").html("<font color='red'> | * Mohon Input Nama Member</font>").show().fadeOut(20000);
				namaMember.focus();
				return false;
			}else if(jaminan.val()==''){
				$("#jaminanVal").html("<font color='red'> | * Mohon Input Jaminan</font>").show().fadeOut(20000);
				jaminan.focus();
				return false;
			}else if(tglPengembalian.val()==''){
				$("#tglPengembalianVal").html("<font color='red'> | * Mohon Input Tanggal Pengembalian</font>").show().fadeOut(20000);
				tglPengembalian.focus();
				return false;
			}
			
			var DataForm = "idPinjam="+idPinjamBuku+"&idMember="+idMember.val()+"&jaminan="+jaminan.val()+"&tglPengembalian="+tglPengembalian.val();
			$.ajax({
				url: "pages/modInputPinjamBuku/savePinjamBuku.php",
				method: 'GET',
				data: DataForm,
				success : function(){
					$("#tampilInputPinjamBuku").slideUp();
					var urlTampilTabelPinjamBuku = "pages/modInputPinjamBuku/pinjamBukuTabel.php";
					$("#tampilTabelPinjamBuku").html("<center><img src='dist/img/loading.gif'></center>");
					$("#tampilTabelPinjamBuku").load(urlTampilTabelPinjamBuku);
				},
				error: function(){
					alert("Input Gagal!");
				}
			});
		});
		
	}(jQuery));
</script>