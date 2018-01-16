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
<style type="text/css">
<!--
.style1 {font-size: 13px}
-->
</style>
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
		<form id="formSearch" name="formSearch" method="post" action="player.php">             		
            <div align="center">
              <input type="text" name="txtSearch" id="txtSearch" />
              &nbsp;
              <input type="submit" value="Search" class="submit" />
                </div>
		</form>    
    <br />

        <?php
			$srch = $_REQUEST['txtSearch'];
			
			$n = 2;
	
			$halNo = 1;
			
			if(isset($_GET['page']))
			{
				$halNo = $_GET['page'];
			}
			if($halNo<1) $halNo = 1;
			
			$offset = ($halNo - 1) * $n;
			
			if($srch=="")
				$sql = "select * from player limit ".$offset.",".$n;
			else
				$sql = "select * from player where position like '%".$_REQUEST['txtSearch']."%' limit ".$offset.",".$n;
		
			$result = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_array($result))
			{
		?>
		<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2">
       	  <div align="center" class="c2" style="font-weight:bolder;">
					<?php echo $row['position']; ?>                 </div>
            </td>
          </tr>
          <tr>
            <td width="200"><div align="center"><img src="images/<?php echo $row['image']; ?>" width="200" height="200" /></div></td>
            <td width="194" >
		  <div align="justify" class="c2" style="font-weight:550">
				 	<?php echo $row['description']; ?>				</div>           	</td>
          </tr>
       
          <tr>
            <td colspan="2"><div align="center">
              <a href="update.php?pos=<?php echo $row['position']; ?>">Update</a>
              &nbsp;
              <a href="doDelete.php?pos=<?php echo $row['position']; ?>&img=<?php echo $row['image']; ?>">Delete</a>
            </div></td>
          </tr>
        </table>
   	  	<br />
        <?php
			}
		?>
       
	<?php
		
		if($srch=="")
			$sql = "select count(*) AS jum from player";
		else
			$sql = "select count(*) AS jum from player where position like '%".$_REQUEST['txtSearch']."%'";
			
		$result  = mysql_query($sql) or die('Error');
        $row     = mysql_fetch_array($result, MYSQL_ASSOC);
        $jum = $row['jum'];
        
        $maxPage = ceil($jum/$n);
        
        $self = $_SERVER['PHP_SELF'];
        $print  = '';
        
        for($page=1;$page<=$maxPage;$page++)
        {
           if ($page == $halNo)
           {
              $print .= " $page ";
           }
           else
           {
              $print .= " <a class=\"stylea\" href=\"$self?page=$page\">$page</a> ";
           }
        }
        
     ?>
    <div align="center"> 
     <?php   
        echo $print;
	?>
    </div>
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
