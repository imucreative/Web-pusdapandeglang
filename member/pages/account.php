<?php
	include "../../attr/config/conn.php";
	include "../../attr/config/library.php";
	$idMember	= $_REQUEST['idMember'];
	
	$queryDetailMember = mysql_query("SELECT * FROM member WHERE member.idMember='$idMember' AND member.statusDelete='0'");
	$dataDetailMember = mysql_fetch_array($queryDetailMember);
?>
			<h2 class="title text-center">Account Member</h2>
				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#statusPeminjaman" data-toggle="tab">Status Peminjaman</a></li>
							<li ><a href="#detail" data-toggle="tab">Detail</a></li>
						</ul>
					</div>
						<div class="tab-content">
							
							<div class="tab-pane fade active in" id="statusPeminjaman" >
								<div class="col-sm-12">
									<div id="pernahMeminjam"></div>
								</div>
							</div>
							
							<div class="tab-pane fade " id="detail" >
								<div class="col-sm-12">
									<div id="detailAccount"></div>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
<script type="text/javascript">
	$(function(){
		var urlTampilBukuPernahDipinjam = "pages/accountMemberPernahMeminjamBuku.php?idMember="+'<?php echo $idMember;?>';
		$("#pernahMeminjam").html("<center><img src='../admin/dist/img/loading.gif'></center>");
		$("#pernahMeminjam").load(urlTampilBukuPernahDipinjam);
		
		var urlDetailAccount = "pages/accountDetail.php?idMember="+'<?php echo $idMember;?>';
		$("#detailAccount").html("<center><img src='../admin/dist/img/loading.gif'></center>");
		$("#detailAccount").load(urlDetailAccount);
	});
</script>