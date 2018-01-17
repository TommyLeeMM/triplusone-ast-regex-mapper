<?php
	session_start();
?>
<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Soal05</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="800" border="0" align="center" class="kotak">
  <tr>
    <td colspan="2"><img src="images/header.jpg" width="800" height="200" /></td>
  </tr>
  
  <tr>
    <td colspan="2"><?php include("listmenu.php"); ?></td>
  </tr>
  <tr>
  <?php
  	$userOnline = $_SESSION['user'];
  ?>
    <td class="isi"><p align="center">Welcome, <?= $userOnline ?> <!-- menampilkan nilai dari session user -->
        <?php
        	if(isset($_COOKIE['userCookie']))
			{
				echo "<br />You have visited this site";
			}
			else
			{
				setcookie("userCookie", $userOnline, time()+3600);
			}
		?></p></td>
    <td class="isi">
    <?php
    	echo date("d F Y");
	?>
    &nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="isi"><p align="center">
    <?php
    	$file = fopen("welcome.txt", "r") or exit("Unable to open file!");
		while(!feof($file))
		{
			echo fgets($file). "<br />";
		}
		fclose($file);
	?>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="footer"><hr />Copyright &copy; AmericanFootball 2011</td>
  </tr>
</table>
</body>
</html>
<? ob_flush(); ?> 