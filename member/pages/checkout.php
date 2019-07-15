<?php
	include "../../attr/config/conn.php";
	include "../../attr/config/library.php";
	$idMember	= $_SESSION['idMember'];
?>
<h2 class="title text-center">Checkout</h2>
<section id="cart_items">
	<div class="row">
		<div class="col-sm-12">
		
			<div class="table-responsive cart_info">
				<table class="table table-condensed table-hover">
					<thead>
						<tr class="cart_menu">
							<td width='20%' class="image"></td>
							<td width="75%" class="description">Daftar Buku yang ingin dipinjam!</td>
							<td width="5%"></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$queryDetailPinjamTemp = mysql_query("SELECT * FROM pinjamtemp, buku, kategoribuku WHERE pinjamtemp.idMember='$idMember' AND pinjamtemp.idBuku=buku.idBuku AND buku.idKategori=kategoribuku.idKategori");
							while($dataDetailPinjamTemp = mysql_fetch_array($queryDetailPinjamTemp)){
						?>
						<tr>
							<td class="cart_product">
								<a href="#" class='coverBuku' id="pages/bukuDetail.php?idBuku=<?php echo $dataDetailPinjamTemp['idBuku'];?>"><img src="../admin/dist/img/fotoBuku/<?php echo $dataDetailPinjamTemp['fotoCover'];?>" style="width:80px; height:120px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href="#" class='judulBuku' id="pages/bukuDetail.php?idBuku=<?php echo $dataDetailPinjamTemp['idBuku'];?>" ><?php echo $dataDetailPinjamTemp['judulBuku'];?></a></h4>
								<p>Kategori: <?php echo $dataDetailPinjamTemp['namaKategori'];?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;Stok Buku: <?php echo $dataDetailPinjamTemp['jumlahBuku'];?></p>
								<p>Deskripsi: <?php echo $dataDetailPinjamTemp['deskripsiBuku'];?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete deletePinjamTemp" data-id="del" id="<?php echo $dataDetailPinjamTemp['idPinjamTemp'];?>" href="#"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php
							}
						?>
						<tr>
							<td align="right" colspan="3"></td>
						</tr>
					</tbody>
				</table>
			</div>
			
				
			
		</div>
	</div>
</section>

<section id="do_action">
	<div class="row">
		<div class="col-sm-12">
			<div class="heading">
				<p>Jika sudah selesai memilih buku, silahkan Submit dan catat No. Pinjam untuk divalidasi oleh Admin Perpustakaan.</p>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>
								<div class="row">
									<div class="col-sm-3">
										<span>Jaminan</span>
									</div>
									<div class="col-sm-9">
										<input type="text" class='form-control' id="jaminan" placeholder="* Jaminan" />
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="col-sm-3">
										<span>Tanggal Pengembalian</span>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="text" class="form-control" id='tglPengembalian' placeholder="* Tanggal Pengembalian" readonly />
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
										</div>
									</div>
								</div>
								
							</li>
						</ul>
							<a class="btn btn-default update submitPinjamTemp" id="<?php echo $idMember;?>" href="#"><i class="fa fa-book"></i> Submit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

<?php
	$queryDetailPinjamTemp	= mysql_query("SELECT * FROM pinjamtemp WHERE idMember='$idMember'");
	$dataDetailPinjamTemp	= mysql_num_rows($queryDetailPinjamTemp);
	
	$queryDetailPinjamTempArray	= mysql_query("SELECT * FROM pinjam WHERE idMember='$idMember' ORDER BY idPinjam DESC");
	$dataDetailPinjamTempArray	= mysql_fetch_array($queryDetailPinjamTempArray);
	$statusPengembalian			= $dataDetailPinjamTempArray['statusPengembalian'];
	
	if(isset($statusPengembalian)){
		$adaDataDetailPinjamTempArray	= $statusPengembalian;
	}else{
		$adaDataDetailPinjamTempArray	= '2';
	}
?>

<script type="text/javascript">
	$(function(){
		$('#tglPengembalian').datepicker({
			autoclose:true,
			todayHighlight:true,
			format: "yyyy-mm-dd"
		});
		
		$(".judulBuku, .coverBuku").click(function(){
			var idBuku	= $(this).attr('id');
			$("#mainPage").html("<center><img src='../admin/dist/img/loading.gif'></center>");
			$("#mainPage").load(idBuku);
		});
		
		$(".deletePinjamTemp").click(function(){
			var idPinjamTemp	= $(this).attr("id");
			var del				= $(this).data('id');
			if (confirm('Are you sure ?')){
				var DataFormDeleteItem = 'idPinjamTemp='+idPinjamTemp+'&del='+del;
				$.ajax({
					url: "pages/checkoutSubmit.php",
					method: 'POST',
					data: DataFormDeleteItem,
					success : function(){
						var url	= "pages/checkout.php?idMember=<?php echo $idMember;?>";
						$("#mainPage").html("<center><img src='../admin/dist/img/loading.gif'></center>");
						$("#mainPage").load(url);
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}
		});
		
		$(".submitPinjamTemp").click(function(){
			var jaminan			= $("#jaminan");
			var tglPengembalian	= $("#tglPengembalian");
			var idMember		= '<?php echo $idMember;?>';
			
			var dataDetailPinjamTemp		= '<?php echo $dataDetailPinjamTemp;?>';
			var dataDetailPinjamTempArray	= "<?php echo $adaDataDetailPinjamTempArray;?>";
			
			if(dataDetailPinjamTemp=='0'){
				alert("Anda harus memilih buku terlebih dahulu");
				return false;
			} 
			
			if(dataDetailPinjamTempArray!='2'){
				alert("Status Peminjaman Anda Sebelumnya 'Belum Selesai', mohon kembalikan dahulu buku sebelumnya");
				return false;
			}
			
			if(jaminan.val()==''){
				alert("Mohon Input Jaminan Sebelum Submit");
				return false;
			}else if(tglPengembalian.val()==''){
				alert("Mohon Input Tanggal Pengembalian Sebelum Submit");
				return false;
			}
			
			if (confirm('Are you sure ?')){
				var DataForm = 'jaminan='+jaminan.val()+'&tglPengembalian='+tglPengembalian.val()+'&idMember='+idMember;
				$.ajax({
					url: "pages/checkoutSubmit.php",
					method: 'POST',
					data: DataForm,
					success : function(data){
						if(data==''){
							var url	= "pages/account.php?idMember=<?php echo $idMember;?>";
							$("#mainPage").html("<center><img src='../admin/dist/img/loading.gif'></center>");
							$("#mainPage").load(url);
						}else{
							alert(data);
						}
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}
		});
	});
</script>