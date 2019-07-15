<?php
	define('FPDF_FONTPATH','font/');
	include "../../plugins/mpdf/mpdf.php";
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	
	$idMember	= $_REQUEST['idMember'];
	
	$query = mysql_query("SELECT * FROM member WHERE idMember='$idMember'");
	$data = mysql_fetch_array($query);
	
$html	.="
	<table border='0' width='50%' cellpadding='0' cellspacing='0'>
		<tr>
			<td width='10%' class='garis' rowspan='4' ><img src='../../../attr/images/home/logoKabupatenPandeglang.png' width='100' height='70' /></td>
			<td width='50%' class='atas'><font color='orange'>PUSDA</font> Pandeglang</td>
		</tr>
		<tr>
			<td class='headerKecil' >JL. KH. Tb. Abdul Halim, No. 1, Pandeglang</td>
		</tr>
		<tr>
			<td class='headerKecil'>Phone & Fax. (0253) 202920 </td>
		</tr>
		<tr>
			<td class='headerKecil garis'>Indonesia, Email. pusdakab_pdg@yahoo.co.id</td>
		</tr>
	</table>

		<table border='0' width='50%' cellpadding='0' cellspacing='0'>
			<tr class='data' >
				<th colspan='2' width='80%'>".$data['idMember']."</th>
				<th rowspan='6' width='20%'><img src='../../dist/img/fotoMember/$data[fotoMember]' style='width:110px; height:160px; border:2px solid;'></th>
			</tr>
			<tr class='data'>
				<td colspan='2' align='left'>Nama: </td>
			</tr>
			<tr class='data' >
				<th colspan='2' align='left'>".$data['namaMember']."</th>
			</tr>
			<tr class='data' >
				<td colspan='2' align='left'>Alamat: </td>
			</tr>
			<tr class='data' >
				<th colspan='2' align='left'>".$data['alamatMember']."</th>
			</tr>
		</table>
	";
	
	$css = file_get_contents('../../dist/css/printPdf.css');
	$filepdf=new mPDF('utf-8','letter');
	$filepdf->SetDisplayMode('fullpage');
	$filepdf->WriteHTML($css,1);
	$filepdf->WriteHTML($html);
	$tgl = date("d-m-Y");
	$filepdf->Output("MEMBER ".$idMember." (".$tgl.").pdf" ,'I');
?>