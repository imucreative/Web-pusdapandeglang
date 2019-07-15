<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level			= $_SESSION['level'];
	$idPinjamBuku	= $_REQUEST['idPinjamBuku'];
	
	$queryCekPinjam = mysql_query("SELECT * FROM member, pinjam WHERE member.idMember=pinjam.idMember AND pinjam.idPinjam='$idPinjamBuku'");
	$dataCekPinjam = mysql_fetch_array($queryCekPinjam);
	
	$sekarang	= date('Y-m-d');
	$selisih = ((abs(strtotime ($dataCekPinjam['tglPengembalian']) - strtotime ($sekarang)))/(60*60*24));
?>
	
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="tglPinjam">Tgl Pinjam</label>
			</div>
			<div class="col-xs-4">
				<input readonly type="text" name="tglPinjam" id="tglPinjam" class="form-control input-field" placeholder="* Tgl Pinjam" value="<?php echo (Indonesia2tgl($dataCekPinjam['tglPinjam']));?>">
			</div>
			<div class="col-xs-1" align='center'>-</div>
			<div class="col-xs-4">
				<input readonly type="text" class="form-control input-field" placeholder="* Tgl Pengembalian" value="<?php echo (Indonesia2tgl($dataCekPinjam['tglPengembalian']));?>">
			</div>
		</div>
	</div>
	<?php
		if($level=='Administrator'){
	?>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="namaMember">Nama Member</label>
			</div>
			<div class="col-xs-9">
				<div class="row">
					<div class="col-xs-4">
						<input type="text" readonly name="idMember" id="idMember" class="form-control" placeholder="ID Member" value="<?php echo $dataCekPinjam['idMember'];?>">
					</div>
					<div class="col-xs-8">
						<input type="text" name="namaMember" id="namaMember" class="form-control input-field" placeholder="* Nama Member" value="<?php echo $dataCekPinjam['namaMember'];?>">
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<?php
		}
	?>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="jaminan">Jaminan</label>
			</div>
			<div class="col-xs-9">
				<input type="text" name="jaminan" id="jaminan" class="form-control input-field" placeholder="* Jaminan" value="<?php echo $dataCekPinjam['jaminan'];?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="tglPengembalian">Tgl Pengembalian</label>
			</div>
			<div class="col-xs-9">
				<div class="input-group">
					<input readonly type="text" name="tglPengembalian" id="tglPengembalian" class="form-control input-field" placeholder="* Tgl Pengembalian" value="<?php echo $dataCekPinjam['tglPengembalian'];?>">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group" align="right">
		<button type="button" class="btn btn-success btn-flat" id="savePinjamBuku"><i class="fa fa-save"></i> Save</button>
	</div>
	
<script>
	$(document).ready(function(){
		$('#tglPengembalian').datepicker({
			autoclose:true,
			todayHighlight:true,
			format: "yyyy-mm-dd"
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
		
		$("#savePinjamBuku").click(function(){
			var idPinjamBuku	= '<?php echo $idPinjamBuku;?>';
			var jaminan			= $('#jaminan');
			var idMember		= $('#idMember');
			var namaMember		= $('#namaMember');
			var tglPengembalian	= $('#tglPengembalian');
			
			if(jaminan.val()==''){
				$("#jaminanVal").html("<font color='red'> | * Mohon Input Jaminan</font>").show().fadeOut(20000);
				jaminan.focus();
				return false;
			}else if(idMember.val()==''){
				$("#namaMemberVal").html("<font color='red'> | * Mohon Input Nama Member</font>").show().fadeOut(20000);
				namaMember.focus();
				return false;
			}
			
			var level = '<?php echo $level;?>';
			if(level=='Administrator'){
				var DataForm = "idPinjam="+idPinjamBuku+"&jaminan="+jaminan.val()+"&idMember="+idMember.val()+"&tglPengembalian="+tglPengembalian.val();
			}else{
				var DataForm = "idPinjam="+idPinjamBuku+"&jaminan="+jaminan.val()+"&tglPengembalian="+tglPengembalian.val();
			}
			
			if (confirm('Are you sure ?')){
				$.ajax({
					url: "pages/modInputPinjamBuku/savePinjamBuku.php",
					method: 'GET',
					data: DataForm,
					success : function(){
						var urlEditPinjam = "pages/modInputPinjamBuku/pinjamBukuDetail.php?idPinjamBuku="+"<?php echo $idPinjamBuku;?>";
						$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
						$("#mainPage").load(urlEditPinjam);
					},
					error: function(){
						alert("Input Gagal!");
					}
				});
				return false;
			}
			
		});

	}(jQuery));
</script>