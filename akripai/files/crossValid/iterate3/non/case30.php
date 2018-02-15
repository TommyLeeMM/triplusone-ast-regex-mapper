<?php	
	session_start();
	if(!isset($_SESSION['user']) && !isset($_COOKIE['user']))
	{
		header('location:login.php');
	}
	
	$userID="";
	if(isset($_SESSION['userID']))
	{
		$userID = $_SESSION['userID'];
	}
	else if(isset($_COOKIE['userID']))
	{
		$userID = $_COOKIE['userID'];
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="../style.css" type="text/css" rel="stylesheet"/>
<title>All About Pets</title>

</head>


<body>
<center>
	<div id="wrapper">
		<table id="isi" width="100%" style="padding :10px; border:10px solid #EDB253;">
        	<tr id="header" height="160px">
            	<td colspan="2"><img src="../image/Background/header.jpg" style="width:100%; max-height:230px"/></td>
            </tr>
            <tr id="menuS" >
               <?php include('static/menuAfterLogin.php'); ?>
            </tr>
            <tr id="section" >
            	<?php include('static/left.php'); ?>
            	<td style="min-width:80%;vertical-align:top; " id="waw">
                	<table width="100%">
                        <tr id ="content" >
                        	<td align="left" style="padding:20px; ">
                               <label>Welcome, <b>
							   <?php
									if(isset($_SESSION['user']))
										echo $_SESSION['user'];
									else if(isset($_COOKIE['user']))
										echo $_COOKIE['user'];
							   ?></b> | <a href="scripts/doLogout.php" id="tulisanLogout">Logout</a></label>
                            </td>
                        </tr>
                        <tr id ="content" >
                        	<td colspan="2">
								<h2><b>Shopping Cart</b></h2>
                        </tr><tr id="content">
							<td colspan="2">
								<table id="list">
                                <tr>
									<td>
									<?php
										// include the connect.php file
										include("scripts/connect.php");
										
										// select products from database
										$rs = mysql_query("SELECT * FROM shoppingcart a JOIN msproduct b ON a.ProductID = b.ProductID WHERE UserID = '".$userID."'");
										
									?>
									<table id="shoppingcart">
										<tr>
											<td class="title"> Product Name </td>
											<td class="title"> Product Type </td>
											<td class="title"> Price </td>
											<td class="title"> Quantity </td>
											<td class="title"> Subtotal </td>
											<td class="title"> </td>
										</tr>
									<?php
										$total = 0;
										while($row = mysql_fetch_array($rs))
										{
									?>
											<tr>
												<td> <?php echo $row[6]; ?> </td>
												<td> <?php echo $row[5]; ?> </td>
												<td> $<?php echo $row[7]*0.30; ?> </td>
												<td> <?php echo $row[3]; ?> </td>
												<td> $<?php echo (($row[7]*0.30))*$row[3]; $total += (($row[7]*0.30)*$row[3]); ?> </td>
												<td> 
													<a href="scripts/doRemoveCart.php?id=<?php echo $row[0] ?>"> Remove </a>
												</td>
											</tr>
									<?php
										}
									?>
									</table>
									<td>
                                  </tr>
								  <tr>
									<td>
										<b>Grand Total:</b> $<?php echo $total; ?>. <a href="scripts/doDeleteCart.php">Checkout</a>
									</td>
								  <tr>
                                </table>
							</td>
						</tr>						
                    </table>
                </td>
                
            </tr>
            <tr id="footer">
            	<td colspan="2" align="center">Copyright &copy All About Pets</td>
            </tr>
        </table>
	</div>
</center>
</body>

</html>
