<?php if (isset($_SESSION['username'])){ ?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Data Santri</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
	<?php include('header.php'); ?>
      <!-- Left side column. contains the logo and sidebar -->
	<?php include ('menu-left.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

		<!-- Main content -->
<?php
include ('koneksi/koneksi.php');
if(@$_SESSION['leveluser']==0){
//*********** Menampilkan Data dari tabel user ***********//
$daftar=mysql_query("select * from tb_siswa order by nama_siswa Asc");
}
//else if($_SESSION['leveluser']==1 OR $_SESSION['leveluser']==2) {
//$pengguna=$_SESSION['namauser'];
//*********** Menampilkan Data dari tabel user ***********//
//$daftar=mysql_query("select * from user where Username='$pengguna'order by Level Asc");
 //}
 ?>
 <?php
 if (@$_GET['id_siswa']){
 $id_siswa = $_GET['id_siswa'];
							$query=mysql_query("SELECT * FROM tb_siswa where id_siswa='$id_siswa'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id_siswa'];
							?>	
		 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Santri</a></li>
                </ul>
                <div class="tab-content">
				<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Edit Data Santri</h3>
                </div
				<!-- form start -->
                <form action="aksi-santri.php" enctype="multipart/form-data"  method="POST" role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIS</label>
					  <input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa'] ?>"  class="form-control" id="exampleInputUsername">
                      <input type="text" name="ednis" value="<?php echo $row['nis'] ?>" class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Nama Santri</label>
					  <input type="text" name="ednama_siswa" value="<?php echo $row['nama_siswa'] ?>"  class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Tempat Lahir</label>
					  <input type="text" name="edtempat_lahir" value="<?php echo $row['tempat_lahir'] ?>"  class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Lahir</label>
					  <input type="date" name="edtanggal_lahir" value="<?php echo $row['tanggal_lahir'] ?>"  class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="edjenis_kelamin" class="form-control select2" >
					<option value="">Pilihan</option>
					<?php 
					$jk=$row['jenis_kelamin'];
					if ($jk=='Laki-Laki'){echo"<option value='Laki-Laki' selected>Laki-Laki</option><option value='Perempuan'>Perempuan</option>"; }
					else {echo"<option value='Laki-Laki'>Laki-Laki</option><option value='Perempuan' selected>Perempuan</option>";}
					?>
                    </select>
                  </div>
				  <div class="form-group">
                      <label for="exampleInputPhone">Alamat</label>
					  <input type="text" name="edalamat" value="<?php echo $row['alamat'] ?>"  class="form-control" id="exampleInputPhone">
                    </div>
				    <div class="form-group">
                      <label for="exampleInputPhone">Nomor HP</label>
					  <input type="phone" name="ednomor_hp" value="<?php echo $row['nomor_hp'] ?>"  class="form-control" id="exampleInputPhone">
                    </div>
					<div class="form-group">
                    <label>Pilihan Instansi</label>
                    <select name="edinstansi" class="form-control select2" >
					<option value="">Pilihan</option>
					<?php $instansi=$row['instansi'];
					if ($instansi=='Takhosus') {echo"
					<option value='Takhosus' selected>Takhosus</option>
					<option value='SMK'>SMK</option>
					<option value='SMP'>SMP</option>
					<option value='MI'>MI</option>";}
					else if ($instansi=='SMK') {echo"
					<option value='SMK' selected>SMK</option>
					<option value='Takhosus'>Takhosus</option>
					<option value='SMP'>SMP</option>
					<option value='MI'>MI</option>";}
					else if ($instansi=='SMP') {echo"
					<option value='SMP' selected>SMP</option>
					<option value='Takhosus'>Takhosus</option>
					<option value='SMK'>SMK</option>
					<option value='MI'>MI</option>";}
					else if ($instansi=='MI') {echo"
					<option value='MI' selected>MI</option>
					<option value='Takhosus'>Takhosus</option>
					<option value='SMK'>SMK</option>
					<option value='SMP'>SMP</option>";}
					?>
                    </select>
                  </div>
					<div class="form-group">
                      <label for="exampleInputEmail">Keterangan</label>
					  <input type="text" name="edketerangan" value="<?php echo $row['keterangan'] ?>"  class="form-control" id="exampleInputEmail">
                    </div>
				  <div class="form-group">
                      <label for="exampleInputEmail">Nama Ayah</label>
					  <input type="text" name="ednama_ayah" value="<?php echo $row['nama_ayah'] ?>"  class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">Nama Ibu</label>
					  <input type="text" name="ednama_ibu" value="<?php echo $row['nama_ibu'] ?>"  class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                      <label for="exampleInputText">Photo</label>
					  <input type="file" name="edphoto" value="<?php echo $row['photo'] ?>"  class="form-control" id="exampleInputUsername">
                    </div>
					<hr>
				  <table width="100%">
                    <div class="form-group">
                    <label>Status</label>
                    <select name="edstatus" class="form-control select2" >
					<option value="">Pilihan</option>
						<?php 
					$sm=$row['status'];
					if ($sm=='status'){echo"<option value='santri' selected>Santri</option><option value='alumni'>Alumni</option>"; }
					else {echo"<option value='santri'>Santri</option><option value='alumni' selected>Alumni</option>";}
					?>
					</select>
                    </div>
				 </table>
                  <div class="box-footer">
                    <input type="submit" name="update" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" value="Update">
                  </div>
                </form>
                  </div><!-- /#ion-icons -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<?php } } else { ?>
		 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Santri</a></li>
                  <li><a href="#glyphicons" data-toggle="tab">Tambah Santri</a></li>
                </ul>
                <div class="tab-content">
                  <!-- Font Awesome Icons -->
                  <div class="tab-pane active" id="fa-icons">
               <div class="box">
                <div class="box-body scrolltable">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th width="100px">Nama Santri</th>
						<th>Alamat</th>
						<th>Instansi</th>
						<!--<th width="50px">Photo</th>-->
                        <?php if($_SESSION['lvl']==0){echo"<th>Aksi</th>";}?>
                      </tr>
                    </thead>
                    <tbody>
				<!--<td class='center'>".$dt['tempat_lahir'].",".date('d-m-Y',strtotime($dt['tanggal_lahir']))."</td>
				<td class='center'><img src='img/guru/".$dt['photo']."' width='100%' height='50px'></td>-->
<?php 
$counter = 1; 
while (@$dt=mysql_fetch_array($daftar)){
@$level_user=$dt['Level'];
echo "
			<tr>
				<td>$counter</td>
				<td class='center'>".$dt['nis']."</td>
				<td class='center'><a href='v_detail.php?id_siswa= ".$dt['id_siswa']."'>".$dt['nama_siswa']."</td>
				<td class='center'>".$dt['alamat']."</td>
				<td class='center'>".$dt['instansi']."</td>";
				if($_SESSION['lvl']==0){
				echo"<td class='center'><i class='glyphicon glyphicon-edit icon-white'></i><a href='page.php?id_siswa=".$dt['id_siswa']."'>Edit </a> <i class='glyphicon glyphicon-trash icon-white'>  </i>";?>
				<a onClick="return confirm('Apakah Anda yakin menghapus nama Santri ini ?')"<?php echo"href='aksi-santri.php?hapus=".$dt['id_siswa']."'>Hapus</a></td>";	} ?> 
			</tr>
<?php $counter ++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
              <div class="tab-pane" id="glyphicons">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Input Data Santri</h3>
                </div
				<!-- form start -->
                <form action="aksi-santri.php" enctype="multipart/form-data" method="POST" role="form">
                  <div class="box-body">
				  <table width="100%">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIS</label>
					  <input type="text" name="nis" value=""  class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Nama Santri</label>
					  <input type="text" name="nama_siswa" value=""  class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Tempat Lahir</label>
					  <input type="text" name="tempat_lahir" value="" class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Lahir</label>
					  <input type="date" name="tanggal_lahir" value=""  class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control select2" >
					<option value="">Pilihan</option>
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
				  <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
					  <input type="text" name="alamat" value="" class="form-control" id="exampleInputUsername">
                    </div>
				 <div class="form-group">
                      <label for="exampleInputEmail1">Nomor HP</label>
					  <input type="phone" name="nomor_hp" value=""  class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                    <label>Pilihan Instansi</label>
                    <select name="instansi" class="form-control select2" >
					<option value="">Pilihan</option>
					<option value="Takhosus">Takhosus</option>
					<option value="SMK">SMK</option>
					<option value="SMP">SMP</option>
					<option value="MI">MI</option>
                    </select>
                  </div>
				 <hr>
				  <div class="form-group">
                      <label for="exampleInputEmail">Nama Ayah</label>
					  <input type="text" name="nama_ayah" value="" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">Nama Ibu</label>
					  <input type="text" name="nama_ibu" value="" class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                      <label for="exampleInputText">Photo</label>
					  <input type="file" name="photo" value="" class="form-control" id="exampleInputUsername">
                    </div>
					<div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control select2">
					<option value="">Pilihan</option>
					<option value="0">Santri</option>
					<option value="1">Alumni</option>
					</select>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail">Keterangan</label>
					  <input type="text" name="keterangan" value="" class="form-control" id="exampleInputEmail">
                    </div>
				  </table>
                  <div class="box-footer">
                    <input type="submit" name="tambah" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" value="Simpan">
                  </div>
                </form>
                  </div><!-- /#ion-icons -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
	<?php } ?>
      </div><!-- /.content-wrapper -->
    <?php include ('foter.php'); ?>
      <!-- Control Sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
<?php } else  {
echo "<script language='javascript'>history.back();</script>"; }?>