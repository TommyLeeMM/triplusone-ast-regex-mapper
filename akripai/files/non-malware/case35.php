<?php
	session_start();
	include "connect.php";
	if($_SESSION['login']==0)
	{
		header("Location:index.php");
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
			$sql = "select a.accessoryid as ac, qty, name, price from cart a, accessory b where username='".$_SESSION['user']."' and a.accessoryid=b.accessoryid";
			
			$result = mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($result)<=0)
			{
				echo "<font style='margin-left:50px' color='red'>Your cart is empty</font>";
			}
			else
			{
				
		?>
        <form id="form1" name="form1" method="post" action="doBuy.php" enctype="multipart/form-data">
          <table width="600" border="0" align="center">
            <tr>
              <td><strong>Name</strong></td>
              <td><strong>Qty</strong></td>
              <td><strong>Price</strong></td>
              <td><strong>Total</strong></td>
              <td><strong>Remove</strong></td>
            </tr>
            <?php
			while($row = mysql_fetch_array($result))
				{
					$tot=$row['price']*$row['qty'];
			?>
            <tr>
              <td><?=$row['name'];?></td>
              <td><?=$row['qty'];?></td>
              <td><?=$row['price'];?></td>
              <td><?=$tot;?></td>
              <td><a href="doRemoveCart.php?id=<?=$row['ac'];?>">
			  remove</a></td>
            </tr>
            <?php
					}
			?>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5"><div align="center">
                <input type="submit" name="btnBuy" id="btnBuy" value="Buy" />
              </div></td>
            </tr>
          </table>
        </form>
 	 <?php
       		
			}
       ?>
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
