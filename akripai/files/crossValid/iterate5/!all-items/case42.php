<?php
	session_start();
	$update = false;
	
	if(isset($_SESSION['role'])){
    	if($_SESSION['role'] != 'admin'){
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
			<h4>Employee List</h4>
		</div>

		<div id="main">
			
            <div id="searching2">
				<form action="employee.php?type=customerName" method="post">                   
                    <input type="text" id="key" name="key" placeholder = "Searching by Employee Name"/>
                    <input type="submit" value="Search"/>
                </form>
			</div>
            <br/>
			<table border="2" id="tblQueue" cellpadding="3" cellspacing = '0'>
            	<tr bgcolor="#7ff3ff">
                	<td>ID</td>
                	<td>Username</td>
                	<td>Name</td>
                	<td>Email</td>
                	<td>F/M</td>
                	<td>Role</td>
                	<td>Image</td>
                	<td>Action</td>
                </tr>
                
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
						
						$add = "WHERE employeeFullName LIKE '%$key%'";
					}          			
					
					// select products from database
					$rs = mysql_query("SELECT * FROM msemployee $add limit $offset, $rowperpage");
	
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
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                            <td><?php echo $row[4]; ?></td>
                            <td><?php echo $row[5]; ?></td>
                            <td><?php echo $row[7]; ?></td>
                            <td>
	                            <div id="clmEmployee">
                                    <img src="images/photo/<?php echo $row[6]; ?>" width="60" height="75">
                                </div>
							</td>
                            <td>
                            	<a style = 'width:70%;' class = 'btn' href="update_employee.php?ID=<?=$row[0]?>&page=<?=$page?>&key=<?=$key?>">Update</a><br/>
                            	<a style = 'width:70%;' class = 'btn' href="action/doDeleteEmployee.php?ID=<?=$row[0]?>&page=<?=$page?>&key=<?=$key?>">Delete</a>                                
                            </td>
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
                    $rs = mysql_query("SELECT COUNT(*) FROM msemployee $add");
                    
                    $jml = mysql_fetch_array($rs);
                ?>
                <?php					
                    // print "Prev" to jump to the prev page
                    if($page > 1)
                    {
                        $pagePrev = $page - 1;
                        if($key == "")
                            echo "<a href=\"employee.php?page=$pagePrev\">Prev</a> ";
                        else
                            echo "<a href=\"employee.php?page=$pagePrev&key=$key\">Prev</a> ";
                    }
                    
                    // print numbers to jump to the page number
                    for($i=1; $i<=ceil($jml[0]/$rowperpage); $i++)
                    {
                        if($key == "")
                            echo "<a href=\"employee.php?page=$i\">$i</a> ";
                        else
                            echo "<a href=\"employee.php?page=$i&key=$key\">$i</a> ";
                    }
                    
                    // print "Next" to jump to the next page
                    if($page < ceil($jml[0]/$rowperpage))
                    {
                        $pageNext = $page + 1;
                        if($key == "")
                            echo "<a href=\"employee.php?page=$pageNext\">Next</a>";
                        else
                            echo "<a href=\"employee.php?page=$pageNext&key=$key\">Next</a>";
                    }
				?>
			</div>
			<div id = 'insertBtn'>
				<a class = 'btn' href = 'insert_employee.php'>Insert Employee</a>
			</div>
		<div id="footer">
			<label>For Inquiries :</label>
			<label>Call (021) 500 600</label>
		</div>
	</div>

	
</body>
</html>