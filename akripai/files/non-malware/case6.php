<?php
include "koneksi.php";

if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
} else {
	die ("Error. ! ");	
}

$query = "SELECT  nip, no_surat, tgl_surat, utk_tgs, m_tgs, smp, bertempat FROM  spd WHERE nip='$nip'";
$sql = mysql_query ($query);
$hasil = mysql_fetch_array ($sql);
$nip = $hasil['nip'];
$no_surat = stripslashes ($hasil['no_surat']);
list($thn,$bln,$tgl) = explode ("-",$hasil['tgl_surat']);
$utk_tgs = stripslashes ($hasil['utk_tgs']);
list($thn,$bln,$tgl) = explode ("-",$hasil['m_tgs']);
list($thn,$bln,$tgl) = explode ("-",$hasil['smp']);
$bertempat = stripslashes ($hasil['bertempat']);

//proses edit 
if (isset($_POST['Edit'])) {
	$nip = $_POST['hnip'];
	$no_surat = addslashes (strip_tags ($_POST['no_surat']));
	$tgl_surat = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl_surat'];
	$utk_tgs= addslashes (strip_tags ($_POST['utk_tgs']));
	$m_tgs = $_POST['thn']."-".$_POST['bln']."-".$_POST['m_tgs'];
	$smp = $_POST['thn']."-".$_POST['bln']."-".$_POST['smp'];
	$bertempat= addslashes (strip_tags ($_POST['bertempat']));
	
	
	//update data
	$query = "UPDATE spd SET no_surat='$no_surat',tgl_surat='$tgl_surat',utk_tgs='$utk_tgs',m_tgs='$m_tgs',smp='$smp',bertempat='$bertempat' WHERE nip='$nip'";
	$sql = mysql_query ($query);
	if ($sql) {
		echo "<h2><font color=blue>Data  telah berhasil diedit</font></h2>";	
	} else {
		echo "<h2><font color=red>Data  gagal diedit</font></h2>";	
	}
}
?>
<div>
	<h2>Edit Data Anda</h2>
	<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" width="661">
			
			<tr>
				<td width="118">NIP</td>
				<td width="425">: <b><?=$nip?></b></td>
			</tr>
			<tr>
				<td>No Surat</td>
				<td>: <input type="text" name="no_surat" size="5" maxlength="5" value="<?=$no_surat?>"></td>
			</tr>
			<tr>	 
			<td>Tanggal Surat</td>
				<td>:
                
                <select name="tgl_surat">
				<?php
					for ($i=1; $i<=31; $i++) {
						$tg = ($i<10) ? "0$i" : $i;
						echo "<option value='$tg'>$tg</option>";	
					}
				?>
				</select> - 
				<select name="bln">
				<?php
					for ($i=1; $i<=12; $i++) {
						$bl = ($i<10) ? "0$i" : $i;
						echo "<option value='$bl'>$bl</option>";	
					}
				?>
				</select> - 
				<select name="thn">
				<?php
					for ($i=1965; $i<=2020; $i++) {
						echo "<option value='$i'>$i</option>";	
					}
				?>
				</select>
         
                </td>
			</tr>

			<td>Untuk Tugas</td>
				<td>: <input type="text" name="utk_tgs" size="40" maxlength="30" value="<?=$utk_tgs?>"></td>
			</tr>
            
            <td>Masa Tugas</td>
				<td>: <select name="m_tgs">
				<?php
					for ($i=1; $i<=31; $i++) {
						$tg = ($i<10) ? "0$i" : $i;
						echo "<option value='$tg'>$tg</option>";	
					}
				?>
				</select> - 
				<select name="bln">
				<?php
					for ($i=1; $i<=12; $i++) {
						$bl = ($i<10) ? "0$i" : $i;
						echo "<option value='$bl'>$bl</option>";	
					}
				?>
				</select> - 
				<select name="thn">
				<?php
					for ($i=1965; $i<=2020; $i++) {
						echo "<option value='$i'>$i</option>";	
					}
				?>
				</select> </td>
			</tr>
            
            <td>Sampai</td>
				<td>:
                
                <select name="smp">
				<?php
					for ($i=1; $i<=31; $i++) {
						$tg = ($i<10) ? "0$i" : $i;
						echo "<option value='$tg'>$tg</option>";	
					}
				?>
				</select> - 
				<select name="bln">
				<?php
					for ($i=1; $i<=12; $i++) {
						$bl = ($i<10) ? "0$i" : $i;
						echo "<option value='$bl'>$bl</option>";	
					}
				?>
				</select> - 
				<select name="thn">
				<?php
					for ($i=1965; $i<=2020; $i++) {
						echo "<option value='$i'>$i</option>";	
					}
				?>
				</select>
                
                </td>
			</tr>
            
            <td>Bertempat</td>
				<td>: <input type="text" name="bertempat" size="50" maxlength="50" value="<?=$bertempat?>"></td>
			</tr>
			
			
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;
				<input type="hidden" name="hnip" value="<?=$nip?>">
				<input type="submit" name="Edit" value="Edit Data">&nbsp;
				<input type="reset" name="reset" value="Reset"></td>
	  </table>
	</FORM>
</div>