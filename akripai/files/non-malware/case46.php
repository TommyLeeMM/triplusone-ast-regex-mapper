<?php 
	session_start(); 
	
	if(isset($_SESSION['role'])){
    	if($_SESSION['role'] != 'customer'){
			header('location:index.php');
		}
	}
	else
	{
		header('location:index.php');
	}
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<div id="container">
		<div id="login">
            <?php
                if( !isset($_SESSION['username']) )
                {
            ?>
                <a href="login.php">Login</a> or 
                <a href="register.php">Register</a>

            <?php
                }
                else
                {
                    print('Welcome, ' . $_SESSION['username'] . 
                        '<br><a href="action/doLogout.php">logout</a>');
                }
            ?>
        </div>
		<h1 id="title">.CarWaz.</h1>
		
		<?php
			include("static/menu.php");
        ?>

		<div id="preface">
			<h4>View Services</h4>
		</div>

		<div id="main">
        	
            <div id="searching2">
				<form action="view_service.php?type=washingType" method="post">                   
                    <input type="text" id="key" name="key" placeholder = "Searching by Washing Type Name"/>
                    <input type="submit" value="Search"/>
                </form>
			</div>
			<br/>
            
			<table border="1" id="tblQueue" cellpadding="3" cellspacing = "0">
            	<tr>
                	<td>Id</td>
                	<td>Washing Type Name</td>
                	<td>Price</td>
                	<td>Action</td>
                </tr>

                <?php
                    if(isset($_REQUEST['errCart'])) {
                ?>
                    <div class = "err">
                       <?php echo $_REQUEST['errCart'] ?>
                    </div>
                <?php 
                    }
                ?>

                <?php
					// include the doConnect.php file
					include("action/connect.php");
					
					// initialize default values						
					$page = 1;
					$add = "";
					$type= "ProductType";
					$key="";
					
					// for paging
					if(isset($_REQUEST['page']))
						$page = $_REQUEST['page'];						
					// set variable for paging
					$rowperpage = 7;
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
						
						//if($type == "customerName")
							$add = "WHERE washingTypeName LIKE '%$key%'";
/*						else
							$add = "WHERE washingTypeName = '$key'";*/
					}          			
					
					// select products from database
					$rs = mysql_query("SELECT * FROM mswashingtype $add limit $offset, $rowperpage");
	
					
					// variable for changing rows
					$td = 0;
					



					while($row = mysql_fetch_array($rs))
					{
				?>
                
                		<tr id="tblContent">
                        	<form action="action/doAddCart.php" method="post">
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <input type="hidden" id="txtProductID" name="txtProductID" value ="<?php echo $row[0]; ?>"/>
                                <input type="hidden" id="txtProductName" name="txtProductName" value ="<?php echo $row[1]; ?>"/>
                                <input type="hidden" id="txtProductPrice" name="txtProductPrice" value ="<?php echo $row[2]; ?>"/>
                                <input type="hidden" id="txtPage" name="txtPage" value ="<?php echo $page; ?>"/>
                                <td style="text-align:left;">
                                    <input class = 'inputCart' type="text" name="txtPlate" size="7" placeholder="Plate Nbr..."> &ensp; 
								
                                    &ensp;<input type="submit" value="Add to Cart" class = 'btn'/></td>
                            </form>
                        </tr>
                        
				<?php
					}
				?>
                
            </table>
            
            
            
            <div id="page">
				<?php
                    // count users for paging
                    $rs = mysql_query("SELECT COUNT(*) FROM mswashingtype $add");
                    
                    $jml = mysql_fetch_array($rs);
                ?>
                <?php					
                    // print "Prev" to jump to the prev page
                    if($page > 1)
                    {
                        $pagePrev = $page - 1;
                        if($key == "")
                            echo "<a href=\"view_service.php?page=$pagePrev\">Prev</a> ";
                        else
                            echo "<a href=\"view_service.php?page=$pagePrev&key=$key\">Prev</a> ";
                    }
                    
                    // print numbers to jump to the page number
                    for($i=1; $i<=ceil($jml[0]/$rowperpage); $i++)
                    {
                        if($key == "")
                            echo "<a href=\"view_service.php?page=$i\">$i</a> ";
                        else
                            echo "<a href=\"view_service.php?page=$i&key=$key\">$i</a> ";
                    }
                    
                    // print "Next" to jump to the next page
                    if($page < ceil($jml[0]/$rowperpage))
                    {
                        $pageNext = $page + 1;
                        if($key == "")
                            echo "<a href=\"view_service.php?page=$pageNext\">Next</a>";
                        else
                            echo "<a href=\"view_service.php?page=$pageNext&key=$key\">Next</a>";
                    }
				?>
			</div>
            <div id="insertEmployee" style="margin-top:50px;">
            	<h2 id = 'cartTitle'><b>Your Cart</b></h2>
							
				<?php
					if(isset($_SESSION['cartProductId']) && $_SESSION['cartProductId'] != Array())
					{
                ?>	
                <table border="1" id="tblQueue" cellpadding="3" cellspacing = "0">
                    <tr>
                        <td>Plate Number</td>
                        <td>Washing Product</td>
                        <td>Price</td>
                        <td>Action</td>
                    </tr>
                    
                    
                     <?php
						$_SESSION['cartPriceTotal'] = array();
						$total = 0;
                    	foreach($_SESSION['cartPlate'] as $i => $value)
						{
							$subTotal = 0;
					?>
                    
                    
                    <form action="action/doRemoveCart.php" method="post" enctype="multipart/form-data">
                        <tr id="tblContent">
                            <td><?=$_SESSION['cartPlate'][$i]?></td>
                            <td><?php	
								foreach($_SESSION['cartProductName'][$_SESSION['cartPlate'][$i]] as $j => $value1)
								{
                            		echo $_SESSION['cartProductName'][$_SESSION['cartPlate'][$i]][$j] . '<br/>';
								}
								?>
                            </td>
                            <td>
								<?php
								foreach($_SESSION['cartPrice'][$_SESSION['cartPlate'][$i]] as $j => $value1)
								{
                                	$subTotal += $_SESSION['cartPrice'][$_SESSION['cartPlate'][$i]][$j];
								}
								echo $subTotal;
								array_push($_SESSION['cartPriceTotal'], $subTotal);
								
								$total += $subTotal;
								?>
                            </td>
                            <td style="text-align:center;"><input type="submit" value="Remove" class = 'btn'/></td>
                            <input type="hidden" id="txtPage" name="txtPage" value ="<?php echo $page; ?>"/>
							<input type="hidden" id="txtCartId" name="txtCartId" value ="<?php echo $i; ?>"/>
                        </tr>
                    </form>
                    <?php
                    	}
					?>
                </table>
                
                <div id = 'total'>
                	<div id = 'price'>Total : <?=$total?></div>
                    <a class = 'btn' href="action/doInsertCart.php?totalPrice=<?=$total?>">Checkout</a>
                </div>
                <?php
					}
					else
						echo " <div id = 'total'>
                                <div id = 'price'>No Cart Data</div>
                               </div>";
				?>
            </div>
        </div>
        

		<div id="footer">
			<label>For Inquiries :</label>
			<label>Call (021) 500 600</label>
		</div>
	</div>

	
</body>
</html>