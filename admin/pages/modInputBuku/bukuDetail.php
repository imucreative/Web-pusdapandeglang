<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	
	$attrIdBuku = $_REQUEST['idBuku'];
	$level		= $_SESSION['level'];
	$queryEdit	= mysql_query("SELECT * FROM buku, kategoribuku WHERE buku.idKategori=kategoribuku.idKategori AND idBuku='$attrIdBuku'");
	$dataEdit	= mysql_fetch_array($queryEdit);
	
		$judulBuku		= $dataEdit['judulBuku'];
		$deskripsiBuku	= $dataEdit['deskripsiBuku'];
		$pengarang		= $dataEdit['pengarang'];
		$penerbit		= $dataEdit['penerbit'];
		$kategori		= $dataEdit['namaKategori'];
		$jumlahBuku		= $dataEdit['jumlahBuku'];
		$rak			= $dataEdit['rak'];
		$fotoBuku		= $dataEdit['fotoCover'];
?>
<h2 class="page-header">Detail Buku |
	<a class='btn btn-default btn-flat' id="back" href="#"><i class="fa fa-arrow-left"></i> Back</a>
	<button type="submit" class="btn btn-success btn-flat" id="saveBuku"><i class="fa fa-save"></i> Save</button>
	<button id="showTombolLihatLampiran" type="button" class="btn btn-flat btn-info" data-toggle="modal" data-target="#tampilLampiran">
		<i class="fa fa-paperclip"></i> View Book
	</button>
</h2>
	<div class="row">
		<div class="col-xs-10">
			<div class="box box-info">
				<div class="box-body">
					<div class="row">
						<div class="col-xs-6">
							<fieldset>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-3">
											<label for="judulBuku">Judul Buku</label>
										</div>
										<div class="col-xs-9">
											<input type="text" name="judulBuku" id="judulBuku" class="form-control input-field" placeholder="* Judul Buku" value='<?php echo $judulBuku; ?>'>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-3">
											<label for="deskripsiBuku">Deskripsi Buku</label>
										</div>
										<div class="col-xs-9">
											<textarea class="form-control input-field" name="deskripsiBuku" id="deskripsiBuku" placeholder="* Deskripsi Buku" ><?php echo $deskripsiBuku; ?></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-3">
											<label for="pengarang">Pengarang</label>
										</div>
										<div class="col-xs-9">
											<input type="text" name="pengarang" id="pengarang" class="form-control input-field" placeholder="* Pengarang" value='<?php echo $pengarang; ?>'>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-3">
											<label for="penerbit">Penerbit</label>
										</div>
										<div class="col-xs-9">
											<input type="text" name="penerbit" id="penerbit" class="form-control input-field" placeholder="* Penerbit" value='<?php echo $penerbit; ?>'>
										</div>
									</div>
								</div>
								
							</fieldset>
						</div>
					
					
						<div class="col-xs-6">
							<fieldset>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-4">
											<label for="kategori">Kategori Buku</label>
										</div>
										<div class="col-xs-8">
											<div class="input-group">
												<select name="kategori" id="kategori" class="form-control">
													<option value='<?php echo $kategori;?>' selected><?php echo $kategori;?></option>
													<?php
														$queryKategori=mysql_query("SELECT * FROM buku WHERE idBuku='$attrIdBuku'");
														$dataKategori=mysql_fetch_array($queryKategori);
															$queryKategori2=mysql_query("SELECT * FROM kategoribuku WHERE statusDelete='0'");
															while($dataKategori2=mysql_fetch_array($queryKategori2)){
																if($dataKategori['idKategori']==$dataKategori2['idKategori']){
																	echo "<option value='$dataKategori2[idKategori]' selected>$dataKategori2[namaKategori]</option>";
																}else{
																	echo "<option value='$dataKategori2[idKategori]'>$dataKategori2[namaKategori]</option>";
																}
															}
													?>
												</select>
												<span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-4">
											<label for="jumlahBuku">Jumlah Buku</label>
										</div>
										<div class="col-xs-8">
											<?php
												if($level=='Administrator'){
											?>
													<input  type="text" name="jumlahBuku" id="jumlahBuku" class="form-control input-field" placeholder="* Jumlah Buku" value='<?php echo $jumlahBuku; ?>'>
											<?php
												}else{
											?>
													<input readonly type="text" name="jumlahBuku" id="jumlahBuku" class="form-control input-field" placeholder="* Jumlah Buku" value='<?php echo $jumlahBuku; ?>'>
											<?php
												}
											?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-4">
											<label for="rak">Rak</label>
										</div>
										<div class="col-xs-8">
											<input type="text" name="rak" id="rak" class="form-control input-field" placeholder="* Rak" value='<?php echo $rak; ?>'>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-4">
											<label for="foto">Foto Buku (500Kb)</label>
										</div>
										<div class="col-xs-8">
											<form id='uploadFotoBuku' method='post'>
												<div class="row">
													<div class="col-xs-9">
														<input type="file" name="fotoBuku" />
													</div>
													<div class="col-xs-2">
														<button class="btn btn-info btn-flat" type="submit" id='tombol'><i class="fa fa-download"></i></button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-4">
											<label for="softBuku">SoftCopy Buku</label>
										</div>
										<div class="col-xs-8">
											<form id='uploadSoftBuku' method='post'>
												<div class="row">
													<div class="col-xs-9">
														<input type="file" name="softBuku" />
													</div>
													<div class="col-xs-2">
														<button class="btn btn-info btn-flat" type="submit" id='tombolSoftBuku'><i class="fa fa-download"></i></button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-2">
			<div class="box box-info">
				<div class="box-body">
					<div id='tampilFotoBuku'>
						<img src="dist/img/fotoBuku/<?php if($fotoBuku==''){ echo "default.jpg";}else{ echo $fotoBuku; }?>" style="margin-top:5px; margin-left:5px; margin-right:5px; margin-bottom:5px; width:170px; height:220px; border:2px solid;">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header">
                  <h3 class="box-title">Buku Pernah Dipinjam Oleh:</h3>
                </div>
				<div class="box-body">
					<div id="pernahDipinjam"></div>
				</div>
			</div>
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
	
	<div class="modal fade" id="tampilLampiran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog" >
			<div class="modal-content" >
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Lihat Buku</h4>
				</div>
				<div class="modal-body" >
				<?php
					$queryListLampiran	= mysql_query("SELECT * FROM buku WHERE idBuku='$attrIdBuku'");
					$lampiranData		= mysql_fetch_array($queryListLampiran);
					$fileSoftBuku		= $lampiranData['softBuku'];
				?>
					<a href="dist/img/softBuku/<?php echo $fileSoftBuku;?>" target="_blank"><?php echo $fileSoftBuku;?></a>
				</div>
			</div>
		</div>
	</div>
		
<script>
	$(function(){
		var tampil = '<?php echo $fileSoftBuku; ?>';
		if(tampil!=''){
			$("#showTombolLihatLampiran").show();
		}else{
			$("#showTombolLihatLampiran").hide();
		}
		
		$('#back').click(function(){
			var url = "pages/modInputBuku/buku.php";
			$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
			$("#mainPage").load(url);
		});
		
		var urlTampilBukuPernahDipinjam = "pages/modInputBuku/bukuPernahDipinjam.php?idBuku="+'<?php echo $attrIdBuku;?>';
		$("#pernahDipinjam").html("<center><img src='dist/img/loading.gif'></center>");
		$("#pernahDipinjam").load(urlTampilBukuPernahDipinjam);
		
		$('#jumlahBuku').keypress(function(event){
			var charCode = (event.which) ? event.which : event.keyCode
				if ((charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9)
				return true;
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Number</font></label>").show();
			return false;
		});
		
			$("#uploadFotoBuku").on("submit", (function(e){
				if (confirm('Are you sure ?')){
					e.preventDefault();
					$.ajax({
						url: "pages/modInputBuku/saveFotoBuku.php?idBuku="+'<?php echo $attrIdBuku;?>',
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data){
							$('#tampilFotoBuku').html(data);
						},
						error: function(){}
					});
					return false;
				}else{
					return false;
				}
			}));
			
			$("#uploadSoftBuku").on("submit", (function(e){
				if (confirm('Are you sure ?')){
					e.preventDefault();
					$.ajax({
						url: "pages/modInputBuku/saveSoftBuku.php?idBuku="+'<?php echo $attrIdBuku;?>',
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data){
							if(data==''){
								var ambilIdBuku	= '<?php echo $attrIdBuku;?>';
								var url = "pages/modInputBuku/bukuDetail.php?idBuku="+ambilIdBuku;
								$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
								$("#mainPage").load(url);
							}else{
								alert(data);
							}
						},
						error: function(){}
					});
					return false;
				}else{
					return false;
				}
			}));
		
		$("#saveBuku").click(function(){
			var judulBuku		= $('#judulBuku');
			var deskripsiBuku	= $('#deskripsiBuku');
			var pengarang		= $('#pengarang');
			var penerbit		= $('#penerbit');
			var kategori		= $('#kategori');
			var jumlahBuku		= $('#jumlahBuku');
			var rak				= $('#rak');
			var idBuku			= '<?php echo $attrIdBuku; ?>';
			
			if(judulBuku.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Judul Buku</font></label>").show();
				return false;
			}else if(deskripsiBuku.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Deskripsi Buku</font></label>").show();
				return false;
			}else if(pengarang.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Pengarang</font></label>").show();
				return false;
			}else if(penerbit.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Penerbit</font></label>").show();
				return false;
			}else if(kategori.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Kategori</font></label>").show();
				return false;
			}else if(jumlahBuku.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Jumlah Buku</font></label>").show();
				return false;
			}else if(rak.val()==''){
				$("#notifikasi").modal('show');
				$("#isiNotif").html("<label><font color='red'> * Please Input Rak</font></label>").show();
				return false;
			}
			
			if (confirm('Are you sure ?')){
				var DataForm = "idBuku="+idBuku+"&judulBuku="+judulBuku.val()+"&deskripsiBuku="+deskripsiBuku.val()+"&pengarang="+pengarang.val()+"&penerbit="+penerbit.val()+"&kategori="+kategori.val()+"&jumlahBuku="+jumlahBuku.val()+"&rak="+rak.val();
				
				$.ajax({
					url: "pages/modInputBuku/saveBuku.php",
					method: 'GET',
					data: DataForm,
					success : function(){
						var ambilIdBuku	= '<?php echo $attrIdBuku;?>';
						var url = "pages/modInputBuku/bukuDetail.php?idBuku="+ambilIdBuku;
						$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
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