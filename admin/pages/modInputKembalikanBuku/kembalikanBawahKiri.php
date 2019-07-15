<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level			= $_SESSION['level'];
	$idPinjam	= $_REQUEST['idPinjam'];
	
	$queryCekPinjam = mysql_query("SELECT * FROM member, pinjam WHERE member.idMember=pinjam.idMember AND pinjam.idPinjam='$idPinjam'");
	$dataCekPinjam = mysql_fetch_array($queryCekPinjam);
	
	$sekarang	= date('Y-m-d');
	$selisih = ((abs(strtotime ($dataCekPinjam['tglPengembalian']) - strtotime ($sekarang)))/(60*60*24));
	
	if($sekarang>$dataCekPinjam['tglPengembalian']){
		$selisihMInus		= '-'.$selisih.' Hari';
		$dendaSelisihMinus	= "Denda(@Rp.5000*$selisih) = Rp. ". (format_angka($selisih * 5000));
		$warnaSelisihMinus	= "<div class='input-group-addon' style='background: red'></div>";
	}else{
		$selisihMInus		= $selisih.' Hari';
		$dendaSelisihMinus	= "-";
		$warnaSelisihMinus	= "<div class='input-group-addon' style='background: green'></div>";
	}
?>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="jangkaWaktu">Jangka Waktu Pinjam</label>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<input readonly type="text" name="jangkaWaktu" id="jangkaWaktu" class="form-control input-field" placeholder="* Jangka Waktu" value="<?php echo $selisihMInus; ?>">
					<?php echo $warnaSelisihMinus;?>
				</div>
			</div>
			<div class="col-xs-5">
				<input readonly type="text" name="dendaSelisihMinus" id="dendaSelisihMinus" class="form-control input-field" placeholder="* Denda Selisih Minus" value="<?php echo $dendaSelisihMinus; ?>">
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="tglPinjam">Tgl Pinjam</label>
			</div>
			<div class="col-xs-4">
				<input readonly type="text" name="tglPinjam" id="tglPinjam" class="form-control input-field" placeholder="* Tgl Pinjam" value="<?php echo (Indonesia2tgl($dataCekPinjam['tglPinjam']));?>">
			</div>
			<div class="col-xs-5">
				<input readonly type="text" class="form-control input-field" placeholder="* Tgl Pengembalian" value="<?php echo (Indonesia2tgl($dataCekPinjam['tglPengembalian']));?>">
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="jaminan">Jaminan</label>
			</div>
			<div class="col-xs-9">
				<input readonly type="text" name="jaminan" id="jaminan" class="form-control input-field" placeholder="* Jaminan" value="<?php echo $dataCekPinjam['jaminan'];?>">
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
					<input readonly type="text" name="tglPengembalian" id="tglPengembalian" class="form-control input-field" placeholder="* Tgl Pengembalian" value="<?php echo (Indonesia2Tgl($dataCekPinjam['tglPengembalian']));?>">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
