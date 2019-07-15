<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level	= $_SESSION['level'];
?>

<table id="tabelMember" class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th width='20%'>Nama Member</th>
			<th width='20%'>Alamat</th>
			<th width='10%'>No. Telp</th>
			<th width='10%'>Pin BBM</th>
			<th width='10%'>Facebook</th>
			<th width='10%'>Twitter</th>
			<th width='3%'>#</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			$queryMember = mysql_query("SELECT * FROM member WHERE statusDelete='0' ORDER BY idMember DESC");
			while($dataMember = mysql_fetch_array($queryMember)){
		?>
			<tr>
				<td align='center'><?php echo $i; ?></td>
				<td>
					<a href="#" id="<?php echo $dataMember['idMember'] ?>" class="detailMember">
						<?php echo $dataMember['namaMember']; ?>
					</a>
				</td>
				<td><?php echo $dataMember['alamatMember']; ?></td>
				<td><?php echo $dataMember['tlpMember']; ?></td>
				<td><?php echo $dataMember['pinBbm']; ?></td>
				<td><?php echo $dataMember['facebook']; ?></td>
				<td><?php echo $dataMember['twitter']; ?></td>
				<td align='center'>
					<?php
						if($level=='Administrator'){
					?>
							<a class='btn btn-xs btn-danger btn-flat deleteMember' href='#' id="del" data-id='<?php echo $dataMember['idMember'];?>' ><i class='fa fa-trash' ></i></a>
					<?php
						}
					?>
				</td>
			</tr>
		<?php
			$i++;
			}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th width='5%'>No.</th>
			<th width='20%'>Nama Member</th>
			<th width='20%'>Alamat</th>
			<th width='10%'>No. Telp</th>
			<th width='10%'>Pin BBM</th>
			<th width='10%'>Facebook</th>
			<th width='10%'>Twitter</th>
			<th width='3%'>#</th>
		</tr>
	</tfoot>
</table>

<script>
	$(function(){
			$("#tabelMember").dataTable({
				"bPaginate": false,
				"bLengthChange": false,
				"bInfo": true,
				"bFilter": true,
				"bSort": true,
				"bAutoWidth": true
			});
			
			$('.detailMember').click(function(){
				var idMember = $(this).attr('id');
				var url = "pages/modInputMember/memberDetail.php?idMember="+idMember;
				$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
				$("#mainPage").load(url);
			});
			
			$('.deleteMember').click(function(){
				var idMember	= $(this).data('id');
				var del			= $(this).attr('id');
				
				if (confirm('Are you sure ?')){
					var DataFormDeleteItem = 'idMember='+idMember+'&del='+del;
					$.ajax({
						url: "pages/modInputMember/saveMember.php",
						method: 'GET',
						data: DataFormDeleteItem,
						success : function(){
							var urlTampilTabelMember = "pages/modInputMember/memberTabel.php";
							$("#tampilTabelMember").html("<center><img src='dist/img/loading.gif'></center>");
							$("#tampilTabelMember").load(urlTampilTabelMember);
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