<?php
	session_start();
	include "connect.php";
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
    <td><div align="center"><img src="images/header.jpg" width="800" height="200" /></div></td>
  </tr>
  <tr>
    <td>
    <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
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
            if($_SESSION["login"] == 0)
            {
        ?>
      <form id="form1" name="form1" method="post" action="doLogin.php">
        <table width="211" border="0" align="center">
          <tr>
            <td width="111" class="c2">Username</td>
            <td width="90"><input name="txtUsername" type="text" id="txtUsername" size="15" maxlength="15" /></td>
          </tr>
          <tr>
            <td class="c2">Password</td>
            <td><input name="txtPassword" type="password" id="txtPassword" size="15" maxlength="15" /></td>
          </tr>
          <tr>
            <td colspan="2">
            <div align="center" class="c2">
            	<?
					$eror = $_SESSION['err'];
					if($eror == 1)
						echo "all fields must be filled!";
					else if($eror == 2)
						echo "wrong username or password!";
					else if($eror == 0)
						echo "&nbsp;";
					unset($_SESSION['err']);
				?>
             </div>
            </td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input name="btnLogin" type="submit" class="c2" id="btnLogin" value="Login" />
            </div></td>
          </tr>
        </table>
      </form>
		<?php 
            }
			else
			{
        ?>
        
        	<div class="c2" style="margin-left:25px; margin-right:25px;" align="justify">
			Welcome, <?php
						echo $_SESSION['user'];
						
						$sql = "select position from user a, position b where  a.username='".$_SESSION['user']."' and a.username=b.username";            
						$res = mysql_query($sql) or die(mysql_error());		
						$row = mysql_fetch_array($res);
						echo " ( ".$row['position']." )";
					?>
            <br />
			<br />
			American football, known in the United States simply as football and sometimes as gridiron outside the United States and Canada, is a sport played between two teams of eleven. The objective of the game is to score points by advancing the ball into the opposing team's end zone. The ball can be advanced by running with it or throwing it to a teammate. Points can be scored by carrying the ball over the opponent's goal line, catching a pass thrown over that goal line, kicking the ball through the opponent's goal posts or tackling an opposing ball carrier in his own end zone.
            </div>
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
