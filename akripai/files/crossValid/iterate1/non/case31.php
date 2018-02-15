<?php
	session_start();
	$loggedIn = false;
	if(isset($_SESSION['user']) || isset($_COOKIE['user']))
	{
		$loggedIn = true;
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
               <?php
					if($loggedIn == true) include('static/menuAfterLogin.php'); 
					else include('static/menuBeforeLogin.php');
			   ?>
            </tr>
            <tr id="section" >
				<?php
					if($loggedIn == true) include('static/left.php'); 
					else include('static/leftBeforeLogin1.php');				
				?>
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
									else
										echo "Animal Lover";
							   ?></b>
							   <?php
									if($loggedIn == true)
									{
								?>
										| <a href="scripts/doLogout.php" id="tulisanLogout">Logout</a></label>
							   <?php
									}
								?>
                            </td>
                        </tr>
                        <tr id ="content" >
                        	<td>
								<h2><b>Price Drop</b></h2>
                            </td>
							<td>
								<form action="specials.php?type=ProductName" method="post">                   
									<label>Search based on ProductName: </label>
									<input type="text" id="key" name="key" />
									<input type="submit" value="Search"/>
								</form>
							</td>
                        </tr>
                        <tr id="content">
							<td colspan="2">
								<table id="list">
                                <tr>
									<?php
										// include the connect.php file
										include("scripts/connect.php");
										
										// initialize default values						
										$page = 1;
										$add = "";
										$type= "ProductType";
										$key ="";
										
										// for paging
										if(isset($_REQUEST['page']))
											$page = $_REQUEST['page'];						
										// set variable for paging
										$rowperpage = 3;
										$offset = ($page-1)*$rowperpage;


										// for searching
										if(isset($_REQUEST['type']))
										{
											$type = $_REQUEST['type'];
										}
										if(isset($_REQUEST['key']))
										{
											$key = $_REQUEST['key'];
											
											// search based on category or producttype?
											
											if($type == "ProductType")
												$add = "WHERE $type = '$key'";
											else
												$add = "WHERE $type LIKE '%$key%'";
										}          			
										
										// select products from database
										$rs = mysql_query("SELECT * FROM msproduct $add limit $offset, $rowperpage");
										
										// variable for changing rows
										$td = 0;
										
										while($row = mysql_fetch_array($rs))
										{
											if($td == 3)
											{
												echo "<tr>";
												$td = 0;
											}
									?>
											<td align="center"valign="top">
													<fieldset>
												<form action="scripts/doDelete.php" id="content1" method="post">
													<img src="<?php echo $row[4]; ?>"/><br/>
													 <div id="name" align="left"><a href="#"><?php echo $row[2]; ?></a></div>
													 <div id="price" align="left" style="margin-left:5px;" name="productNameDelete1" id="productNameDelete1"><span><b>Original : $<?php echo $row[3]; ?></b></span></div>
													 <div id="price" align="left" style="margin-left:5px;"><span><b>After Discount 30% : $<?php echo $row[3]*0.3; ?></b></span></div>
													 <!-- for transferring the id to -->
													 <input type="hidden" id="txtProductID" name="txtProductID" value ="<?php echo $row[0]; ?>"/>
													 <input style="margin-top:10px;width:170px;" type="submit" value="Delete"/>
												</form>
												 <form action="scripts/doAddCart.php?id=<?php echo $row[0]; ?>" method="post">
													<div id="qty"><span><b> Quantity: <input type="text" id="txtQuantity" name="txtQuantity"/></b></div>
													<div class="error">
														<?php
															if(isset($_REQUEST['errCart']))
															{
																echo $_REQUEST['errCart'];
															}
														?>
													</div>
													<input style="margin-top:10px;width:170px;" type="submit" value="Add to cart"/>
												 </form>
												 </fieldset>
											 </td>
									<?php
											if($td == 3)
											{
												echo "</tr>";
												$td = 0;
											}
											$td++;
										}
									?>
                                  </tr>
                                </table>
							</td>
						</tr>
						<tr id ="content1" >
							<td colspan="2">
								<?php
									// count users for paging
									$rs = mysql_query("SELECT COUNT(*) FROM msproduct $add");
									
									$jml = mysql_fetch_array($rs);
								?>
								<center>
									<?php
										
										// print "Prev" to jump to the prev page
										if($page > 1)
										{
											$pagePrev = $page - 1;
											if($key == "")
												echo "<a href=\"specials.php?page=$pagePrev\">Prev</a>";
											else
												echo "<a href=\"specials.php?page=$pagePrev&key=$key\">Prev</a>";
										}
										
										// print numbers to jump to the page number
										for($i=1; $i<=ceil($jml[0]/$rowperpage); $i++)
										{
											if($key == "")
												echo "<a href=\"specials.php?page=$i\">$i</a> ";
											else
												echo "<a href=\"specials.php?page=$i&key=$key\">$i</a> ";
										}
										
										// print "Next" to jump to the next page
										if($page < ceil($jml[0]/$rowperpage))
										{
											$pageNext = $page + 1;
											if($key == "")
												echo "<a href=\"specials.php?page=$pageNext\">Next</a>";
											else
												echo "<a href=\"specials.php?page=$pageNext&key=$key\">Next</a>";
										}
									?>
								</center>
							</td>
						</tr>
                        <tr id ="content1" >
                        	<td colspan="2">
								<hr />
								<h2><b>Insert</b></h2>
								
								<form action="scripts/doInsert.php" method="post" enctype="multipart/form-data">
									<table>
										<tr>
											<td>
												<label>Product Name:</label>
											</td>
											<td>
												<input type="text" id="txtProductName" name="txtProductName"/>
											</td>
										</tr>
										<tr>
											<td>
												<label>Product Type:</label>
											</td>
											<td>
												<select id="cmbProductType" name="cmbProductType">
													<option value="Dog">
														Dog
													</option>
													<option value="Cat">
														Cat
													</option>
													<option value="Fish">
														Fish
													</option>
													<option value="Others">
														Others
													</option>
													<option value="Dog Supplies">
														Dog Supplies
													</option>
													<option value="Cat Supplies">
														Cat Supplies
													</option>
													<option value="Fish Supplies">
														Fish Supplies
													</option>
													<option value="New Items">
														New Items
													</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label>Product Price:</label>
											</td>
											<td>
												<input type="text" id="txtProductPrice" name="txtProductPrice"/>							
											</td>
										</tr>
										<tr>
											<td>
												<label>Image:</label>
											</td>
											<td>
												<input type="file" name="uploadField" />
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<label class="error">
													<?php
														if(isset($_REQUEST['errInsert']))
														{
															echo $_REQUEST['errInsert'];
														}
													?>
												</label>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<input type="submit" value="Insert" />
											</td>
										</tr>
									</table>
								</form>
							</td>
						</tr>
						<tr id="content1">
							<td colspan ="2">
								<hr />
								<h2><b>Update</b></h2>
								
								<form action="scripts/doUpdate.php" method="post" enctype="multipart/form-data">
									<table>
										<tr>
											<td>
												<label>Product Name:</label>
											</td>
											<td>
												<select id="cmbProductName" name="cmbProductName">
												<?php
													
													// select products from database
													$rs = mysql_query("SELECT * FROM msproduct");												
													
													while($row = mysql_fetch_array($rs))
													{
												?>
														<option value="<?php echo $row[2]; ?>">
															<?php echo $row[2]; ?>
														</option>
												<?php
													}
												?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label>Product Type:</label>
											</td>
											<td>
												<select id="cmbProductType" name="cmbProductType">
													<option value="Dog">
														Dog
													</option>
													<option value="Cat">
														Cat
													</option>
													<option value="Fish">
														Fish
													</option>
													<option value="Others">
														Others
													</option>
													<option value="Dog Supplies">
														Dog Supplies
													</option>
													<option value="Cat Supplies">
														Cat Supplies
													</option>
													<option value="Fish Supplies">
														Fish Supplies
													</option>
													<option value="New Items">
														New Items
													</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label>Product Price:</label>
											</td>
											<td>
												<input type="text" id="txtProductPrice" name="txtProductPrice"/>							
											</td>
										</tr>
										</tr>
										<tr>
											<td>
												<label>Image:</label>
											</td>
											<td>
												<input type="file" name="uploadField" />
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<label class="error">
													<?php
														if(isset($_REQUEST['errUpdate']))
														{
															echo $_REQUEST['errUpdate'];
														}
													?>
												</label>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<input type="submit" value="Update" />
											</td>
										</tr>
									</table>
								</form>
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
