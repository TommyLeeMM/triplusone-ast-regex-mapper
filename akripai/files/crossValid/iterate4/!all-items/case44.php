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
			<h4>History</h4>
		</div>

		<div id="main">
        	
            <div id="searching2">
				<form action="view_history.php?type=customerName" method="post">                   
                    <input type="text" id="key" name="key" placeholder = "Searching by Customer Name"/>
                    <input type="submit" value="Search"/>
                </form>
			</div>
            <br/>
			<table border="1" id="tblQueue" cellpadding="0" cellspacing = "0">
            	<tr bgcolor="#7ff3ff">
                	<td>Transaction Date</td>
                	<td>Customer Name</td>
                	<td>Plate Number</td>
                	<td>Washing Product</td>
                	<td>Employee</td>
                	<td>Status</td>
                </tr>
                
                
                
                
                <?php
					// include the doConnect.php file
					include("action/connect.php");
					
					// initialize default values						
					$page = 1;
					$add = "WHERE tw.customerId = ".$_SESSION['id'];
					$type= "ProductType";
					$key="";
					
					// for paging
					if(isset($_REQUEST['page']))
						$page = $_REQUEST['page'];						
					// set variable for paging
					$rowperpage = 4;
					$offset = ($page-1)*$rowperpage;


					// for searching
					if(isset($_REQUEST['type']))
					{
						$type = $_REQUEST['type'];
					}
					if(isset($_REQUEST['key']))
					{
						$key = $_REQUEST['key'];
						
						$add = "WHERE customerFullName LIKE '%$key%' AND tw.customerId = ".$_SESSION['id'];
					}          			
					
					// select products from database
					$rs = mysql_query("SELECT DISTINCT transactionDate, customerFullName, plateNumber, employeeFullName, employeeImage, status, tw.trWashingId FROM trwashing tw JOIN mscustomer mc ON tw.customerId = mc.customerId JOIN trdetail td ON td.trWashingId = tw.trWashingId JOIN msemployee me ON tw.employeeId = me.employeeId $add ORDER BY transactionDate DESC limit $offset, $rowperpage");
														
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
                
                		<tr id="tblContent">
                        	<form action="action/doDelete.php" method="post">
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td>
                            <?php                	
								$res = mysql_query("SELECT washingTypeName FROM mswashingtype mwt JOIN trdetail td ON td.washingTypeId = mwt.washingTypeId WHERE trWashingId = " . $row[6]);
								while($row1 = mysql_fetch_array($res))
								{
							?>
                            
                            		<?php 
									echo '- ' . $row1[0] . '<br/>'; 
									
								}
									?>
                            </td>
                            <td>
                                <div id="clmEmployee">
                                    <img src="images/photo/<?php echo $row[4]; ?>" width="60" height="75">
                                    <div id="clmTextEmployee"><?php echo $row[3]; ?></div>
                                </div>
                            </td>
                            <td>
								<?php 
									if(isset($_SESSION['role'])){
										if($_SESSION['role'] == 'washer'){
											echo '<a href="action/doChangeStatus.php?ID='.$row[6].'">' . $row[5] . '</a>'; 
										}
										else
											echo $row[5];
									}
									else
										echo $row[5];
								?>
                            </td>
                            
								 <input type="hidden" id="txtProductID" name="txtProductID" value ="<?php echo $row[6]; ?>"/>
                            </form>
                        </tr>
                        
				<?php
						if($td == 3)
						{
							echo "</tr>";
							$td = 0;
						}
						$td++;
					}
				?>
                
            </table>
            
            
            
            <div id="page">
				<?php
                    // count users for paging
                    $rs = mysql_query("SELECT COUNT(DISTINCT transactionDate) FROM trwashing tw JOIN mscustomer mc ON tw.customerId = mc.customerId JOIN trdetail td ON td.trWashingId = tw.trWashingId JOIN msemployee me ON tw.employeeId = me.employeeId $add");
                    
                    $jml = mysql_fetch_array($rs);
                ?>
                <?php					
                    // print "Prev" to jump to the prev page
                    if($page > 1)
                    {
                        $pagePrev = $page - 1;
                        if($key == "")
                            echo "<a href=\"view_history.php?page=$pagePrev\">Prev</a> ";
                        else
                            echo "<a href=\"view_history.php?page=$pagePrev&key=$key\">Prev</a> ";
                    }
                    
                    // print numbers to jump to the page number
                    for($i=1; $i<=ceil($jml[0]/$rowperpage); $i++)
                    {
                        if($key == "")
                            echo "<a href=\"view_history.php?page=$i\">$i</a> ";
                        else
                            echo "<a href=\"view_history.php?page=$i&key=$key\">$i</a> ";
                    }
                    
                    // print "Next" to jump to the next page
                    if($page < ceil($jml[0]/$rowperpage))
                    {
                        $pageNext = $page + 1;
                        if($key == "")
                            echo "<a href=\"view_history.php?page=$pageNext\">Next</a>";
                        else
                            echo "<a href=\"view_history.php?page=$pageNext&key=$key\">Next</a>";
                    }
				?>
			</div>
		<div id="footer">
			<label>For Inquiries :</label>
			<label>Call (021) 500 600</label>
		</div>
	</div>

	
</body>
</html>