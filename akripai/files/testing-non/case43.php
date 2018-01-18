<?php
	session_start();
	$update = false;
	include('action/connect.php');
	
	
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
    <style>
        body {
            height: 160%;
        }
    </style>
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
			<h4>Update Employee</h4>
		</div>

		<div id="main">
            <?php
                $rs = mysql_query("SELECT * FROM msemployee WHERE employeeId = ".$_REQUEST['ID']);
                $row = mysql_fetch_array($rs)
            ?>
            <div id="UpdatePhoto">
                <img src="images/photo/<?php echo $row[6]; ?>" width="60" height="75">
            </div>
            <div class="manageBox" id = "updateEmpBox">
               
                
                <form action="action/doUpdateEmployee.php?ID=<?=$_REQUEST['ID']?>" method="post" enctype="multipart/form-data">

                        <input placeholder = "username" type="text" id="txtUsername" name="txtUsername" value="<?=$row['employeeUsername']?>"/>
                        <input placeholder = "full name" type="text" id="txtFullName" name="txtFullName" value="<?=$row['employeeFullName']?>"/>							
                        <input placeholder = "email" type="text" id="txtEmail" name="txtEmail" value="<?=$row['employeeEmail']?>"/>							

                        <select id="cmbRole" name="cmbRole">
                        	<?php if($row[7] == 'admin'){?>
                            <option value="admin" selected>
                                Administrator
                            </option>
                            <option value="employee">
                                Employee
                            </option>
                            <?php }?>
                            
                        	<?php if($row[7] == 'washer'){?>
                            <option value="admin">
                                Administrator
                            </option>
                            <option value="employee" selected>
                                Employee
                            </option>
                            <?php }?>                                    
                        </select>

                        <input type="file" name="uploadField"/>
                        <label id = 'msgText'>
                            <?php
                                if(isset($_REQUEST['errUpdate']))
                                {
                                    echo $_REQUEST['errUpdate'];
                                }
                            ?>
                        </label>
                        <input type="submit" value="Update" />
                </form>
            </div>
        </div>
        

		<div id="footer">
			<label>For Inquiries :</label>
			<label>Call (021) 500 600</label>
		</div>
	</div>

	
</body>
</html>