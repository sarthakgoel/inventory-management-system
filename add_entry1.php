<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order Item</title>
    <link rel="stylesheet" type="text/css" href="stylingpage.css">
     <script src="jquery.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
</head>


<body>			
			
	<h3 class="skm">
  CRL Inventory Management System
  </h3>
  <div id='cssmenu'>
    <ul>
       <li><a href="index_user.php"><span>Main Menu</span></a></li>
       <li class='active'><a href="add_entry1.php"><span>Order Item</span></a></li>
	   <li><a href="pass_user.php"><span>Change Password</span></a></li>
       <li><a href="logout.php"><span>Log Out</span></a></li>
    </ul>
  </div>
 <div class="center">

      
       <form  action="add_entry.php" method="post" >
	  <fieldset>
			<label for="uname">UserName :</label><input type="text" name="uname" size="20" value="<?php
		 echo $_SESSION['username']?>" readonly/>			
			<label for="name">Item Name :</label><input type="text" name="name" size="20"/>
			<label for="partno">BEL Part No. :</label><input type="text" name="partno" size="20"/>
			<label for="quantity">Quantity :</label><input type="text" name="quantity" size="20"/>
			<input type="submit" name="confirm" value="order" style="margin-right:100px;"/>
		</fieldset>
      </form>
</div>

    </body>
    </html>