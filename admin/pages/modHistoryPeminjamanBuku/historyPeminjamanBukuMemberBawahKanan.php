<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level			= $_SESSION['level'];
	$idPinjam	= $_REQUEST['idPinjam'];
	
	$queryCekMember = mysql_query("SELECT * FROM member, pinjam WHERE member.idMember=pinjam.idMember AND pinjam.idPinjam='$idPinjam'");
	$dataCekMember = mysql_fetch_array($queryCekMember);
?>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="namaMember">Nama Member</label>
			</div>
			<div class="col-xs-9">
				<input readonly type="text" name="namaMember" id="namaMember" class="form-control input-field" placeholder="* Nama Member" value="<?php echo $dataCekMember['namaMember']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="alamatMember">Alamat Member</label>
			</div>
			<div class="col-xs-9">
				<textarea readonly class="form-control input-field" name="alamatMember" id="alamatMember" placeholder="* Alamat Member" ><?php echo $dataCekMember['alamatMember']; ?></textarea>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="tlpMember">No. Telp Member</label>
			</div>
			<div class="col-xs-9">
				<input readonly type="text" name="tlpMember" id="tlpMember" class="form-control input-field" placeholder="* No. telp" value="<?php echo $dataCekMember['tlpMember']; ?>">
			</div>
		</div>
	</div>