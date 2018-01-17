<?php
	session_start();
	include "connect.php";
	if($_SESSION['login']==0)
	{
		header("Location:index.php");
	}
	
	$pos=$_REQUEST['pos'];
	if($pos=="")
	{
		header("Location:player.php");
	}
	else
	{
		$query = mysql_query("select * from player where position='".$pos."'");
		if(mysql_num_rows($query)==0)
		{
			header("Location:player.php");
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>American Football</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/header.jpg" width="800" height="200" /></td>
  </tr>
  <tr>
    <td><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="120"><div align="center"><a href="index.php">Home</a></div></td>
        <?php 
			if($_SESSION["login"] == 1)
			{
		?>
        <td width="120"><div align="center"><a href="player.php">Player</a></div></td>
        <td width="140"><div align="center"><a href="insert.php">New Player</a></div></td>
        <td width="120"><div align="center"><a href="accessory.php">Accessory</a></div></td>
        <td width="120"><div align="center"><a href="cart.php">Cart</a></div></td>
        <td width="120"><div align="center"><a href="history.php">History</a></div></td>
        <td width="120"><div align="center"><a href="doLogout.php">Logout</a></div></td>
        <?php
			}
		?>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    	<br />
        <?php
			$sql = "select position, description, image from player where position='".$pos."'";
			$res = mysql_query($sql) or die(mysql_error());		
			$rw = mysql_fetch_array($res);	
		?>
    	<form id="form1" name="form1" method="post" action="doUpdate.php?id=<?php echo $rw['position'];?>" enctype="multipart/form-data">
    	  <table width="320" border="0" align="center">
            <tr>
              <td width="115" class="c2">Position</td>
              <td width="155"><input name="txtPosition" type="text" id="txtPosition" size="32" value="<?=$rw['position'];?>" /></td>
            </tr>
            <tr>
              <td class="c2">Description</td>
              <td><textarea name="txtDescription" id="txtDescription" cols="27" rows="5"><?=$rw['description'];?></textarea></td>
            </tr>
            <tr>
              <td class="c2">Image</td>
              <td><input type="file" name="fileImage" id="fileImage" /></td>
            </tr>
            <tr>
              <td colspan="2">
              <div align="center" class="c2">
            	<?
					$eror = $_SESSION['err'];
					if($eror != "")
						echo $eror;
					
					unset($_SESSION['err']);
				?>
             </div>
              </td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                  <input name="btnSubmit" type="submit" class="c2" id="btnSubmit" value="Submit" />
              </div></td>
            </tr>
          </table>
      </form>
   	  <br />
    </td>
  </tr>
  <tr>
    <td>
    <div align="center" class="c1">
    	Copyright &copy;  EP 091    </div>
    </td>
  </tr>
</table>
</body>
</html>
