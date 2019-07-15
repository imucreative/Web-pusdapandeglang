<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level		= $_SESSION['level'];
	$idPinjam	= $_REQUEST['idPinjam'];
	
	$queryCekPinjam = mysql_query("SELECT * FROM member, pinjam WHERE member.idMember=pinjam.idMember AND pinjam.idPinjam='$idPinjam'");
	$dataCekPinjam = mysql_fetch_array($queryCekPinjam);

				if($dataCekPinjam['keterangan']==''){
					$tglDikembalikan2	= $dataCekPinjam['tglDikembalikan'];
					$tglDikembalikan	= (Indonesia2Tgl($dataCekPinjam['tglDikembalikan']));
				}else{
					$tglDikembalikan2	= $dataCekPinjam['tglCancel'];
					$tglDikembalikan	= (Indonesia2Tgl($dataCekPinjam['tglCancel']));
				}
				
	if($tglDikembalikan2>$dataCekPinjam['tglPengembalian']){
		$warnaSelisihMinus	= "<div class='input-group-addon' style='background: red'></div>";
	}else{
		$warnaSelisihMinus	= "<div class='input-group-addon' style='background: green'></div>";
	}
?>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-3">
				<label for="tglDikembalikan">Tgl Dikembalikan</label>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<input readonly type="text" name="tglDikembalikan" id="tglDikembalikan" class="form-control input-field" placeholder="* Tgl Dikembalikan" value="<?php echo $tglDikembalikan; ?>">
					<?php echo $warnaSelisihMinus;?>
				</div>
			</div>
			<div class="col-xs-5">
				<input readonly type="text" name="denda" id="denda" class="form-control input-field" placeholder="* Denda Keterlambatan" value="<?php echo "Rp. ".(format_angka($dataCekPinjam['denda']));; ?>">
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