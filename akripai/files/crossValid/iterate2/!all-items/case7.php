<?php
include 'koneksi.php';
if(isset($_POST['submit']) !="" and $_POST['absen']!="" and $_POST['nama']!=""){
	$absen=$_POST['absen'];//*absen
	$nama=$_POST['nama'];	//*nama
	$kelas=$_POST['kelas']; //*kelas
	$angkatan=$_POST['angkatan'];  //*angkatan
	$foto = $_POST['foto'];
			$lokasi_file = $_FILES['foto']['tmp_name'];
			$tipe_file = $_FILES['foto']['type'];
			$nama_file = $_FILES['foto']['name'];
			echo $nama_file;
			if (!empty($lokasi_file)) {
			$acak = rand(1,99);
			$unik = $acak.$nama.'_'.$nama_file;
			move_uploaded_file($lokasi_file,'fotosiswa/'.$unik);
	$kelamin=$_POST['kelamin'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$bulan_lahir=$_POST['bulan_lahir'];
	$tahun_lahir=$_POST['tahun_lahir'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$hp=$_POST['hp'];
	$facebook=$_POST['facebook'];
	$bbm=$_POST['bbm'];
	$line=$_POST['line'];
	$instagram=$_POST['instagram'];
	$twitter=$_POST['twitter'];
	$alamat=$_POST['alamat'];
	$tentang=$_POST['tentang'];

	$sql=mysql_query("INSERT INTO siswa(nama_siswa,absen_siswa,kelas_siswa,angkatan_siswa,foto,kelamin_siswa,tanggal_lahir,bulan_lahir,tahun_lahir,tempat_lahir,no_hp,facebook_siswa,bbm_siswa,line_siswa,instagram_siswa,twitter_siswa,alamat,tentang) VALUES('$nama','$absen','$kelas','$angkatan','$unik','$kelamin','$tanggal_lahir','$bulan_lahir','$tahun_lahir','$tempat_lahir','$hp','$facebook','$bbm','$line','$instagram','$twitter','$alamat','$tentang')"); 
   mysql_query($sql);
   header("location:home.php?page=daftar_siswa&kelas=$kelas&angkatan=$angkatan&info=tambah siswa berhasil");

}elseif(isset($_POST['usubmit']) !="" and $_POST['uabsen']!="" and $_POST['unama']!=""){
    $uabsen=$_POST['uabsen'];
	$unama=$_POST['unama'];
	$ukelas=$_POST['ukelas'];
	$uangkatan=$_POST['uangkatan'];
	$ukelamin=$_POST['ukelamin'];
	$utanggal_lahir=$_POST['utanggal_lahir'];
	$ubulan_lahir=$_POST['ubulan_lahir'];
	$utahun_lahir=$_POST['utahun_lahir'];
	$utempat_lahir=$_POST['utempat_lahir'];
	$uhp=$_POST['uhp'];
	$ufacebook=$_POST['ufacebook'];
	$ubbm=$_POST['ubbm'];
	$uline=$_POST['uline'];
	$uinstagram=$_POST['uinstagram'];
	$utwitter=$_POST['utwitter'];
	$ualamat=$_POST['ualamat'];
	$utentang=$_POST['utentang'];
	$uid=$_POST['uid'];
	$foto = $_POST['foto'];
			$lokasi_file = $_FILES['foto']['tmp_name'];
			$tipe_file = $_FILES['foto']['type'];
			$nama_file = $_FILES['foto']['name'];
			if (!empty($lokasi_file)) {
			unlink ('fotosiswa/'.$data ['foto']);
			$acak = rand(1,99);
			$uunik = $acak.$nama.'_'.$nama_file;
			move_uploaded_file($lokasi_file,'fotosiswa/'.$uunik);

    $sql=mysql_query("UPDATE siswa SET nama_siswa='$unama',absen_siswa='$uabsen',kelas_siswa='$ukelas',angkatan_siswa='$uangkatan',kelamin_siswa='$ukelamin',tanggal_lahir='$utanggal_lahir',bulan_lahir='$ubulan_lahir',tahun_lahir='$utahun_lahir',tempat_lahir='$utempat_lahir',no_hp='$uhp',facebook_siswa='$ufacebook',bbm_siswa='$ubbm',line_siswa='$uline',instagram_siswa='$uinstagram',twitter_siswa='$utwitter',alamat_siswa='$ualamat',tentang='$utentang',foto='$uunik' WHERE id_siswa='$uid'");
   	mysql_query($sql);
    header("location:home.php?page=daftar_siswa&kelas=$ukelas&angkatan=$uangkatan&info=update siswa berhasil");
    }else{	
	$kelas=$_POST['kelas'];
	$angkatan=$_POST['angkatan'];
		header("location:home.php?page=daftar_siswa&kelas=$kelas&angkatan=$angkatan&info=tambah siswa atau update siswa gagal");
	}
?>
<?php
}
}
 ?>

