<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$idPinjamBuku		= $_REQUEST['idPinjamBuku'];
	$idPinjamBanyakBuku	= $_REQUEST['idPinjamBanyakBuku'];
	
		$queryEdit = mysql_query("SELECT * FROM pinjambanyakbuku, buku WHERE pinjambanyakbuku.idPinjamBanyakBuku='$idPinjamBanyakBuku' AND pinjambanyakbuku.idBuku=buku.idBuku");
		$dataEdit = mysql_fetch_array($queryEdit);
		
		if($idPinjamBanyakBuku=='0'){
			$idBuku		= '';
			$judulBuku	= '';
		}else{
			$idBuku		= $dataEdit['idBuku'];
			$judulBuku	= $dataEdit['judulBuku'];
		}
?>

<div class="row">
	<form method='POST' >
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-body">

					<fieldset>
						<div class="form-group">
							<label for="judulBuku">Judul Buku</label>&nbsp;
							<label for="judulBuku"><div id='judulBukuVal'></div></label>
							<div class="row">
								<div class="col-xs-2">
									<input readonly type="text" readonly name="idBuku" id="idBuku" class="form-control" placeholder="ID Buku" value="<?php echo $idBuku; ?>">
								</div>
								<div class="col-xs-10">
									<input type="text" name="judulBuku" id="judulBuku" class="form-control input-field" placeholder="* Judul Buku" value="<?php echo $judulBuku;?>">
								</div>
							</div>
						</div>
						<div class="form-group" align="right">
							<button type="button" class="btn btn-success btn-flat" id="saveTambahBuku"><i class="fa fa-save"></i> Save</button>
							<button type="button" class="btn btn-danger btn-flat" id="cancelTambahBuku"><i class="fa fa-close"></i> Cancel</button>
						</div>
					</fieldset>
					
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	$(document).ready(function(){
		$("#cancelTambahBuku").click(function(){
			$("#tambahPinjamBuku").slideUp();
		});
		
		$("#judulBuku").autocomplete({
			source: "dist/config/autoCompleteBuku.php", 
			minLength:1,
			select: function(event, ui) {
				event.preventDefault();
				$(this).val(ui.item.label);
				$("#idBuku").val(ui.item.value);
			}
		});
		
		$("#saveTambahBuku").click(function(){
			var idPinjamBanyakBuku	= '<?php echo $idPinjamBanyakBuku; ?>';
			var idPinjam			= '<?php echo $idPinjamBuku; ?>';
			var idBuku				= $('#idBuku');
			var judulBuku			= $('#judulBuku');
			
			if(idBuku.val()==''){
				$("#judulBukuVal").html("<font color='red'> | * Mohon Input Judul Buku</font>").show().fadeOut(20000);
				judulBuku.focus();
				return false;
			}
			
			var DataForm = "idPinjam="+idPinjam+"&idBuku="+idBuku.val()+"&idPinjamBanyakBuku="+idPinjamBanyakBuku;
			$.ajax({
				url: "pages/modInputPinjamBuku/savePinjamBanyakBuku.php",
				method: 'GET',
				data: DataForm,
				success : function(){
					var urlTabelPinjamBanyakBuku = "pages/modInputPinjamBuku/pinjamBukuDetail.php?idPinjamBuku="+"<?php echo $idPinjamBuku;?>";
					$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
					$("#mainPage").load(urlTabelPinjamBanyakBuku);
				},
				error: function(){
					alert("Input Gagal!");
				}
			});
			
		});
		
		
	}(jQuery));
</script>