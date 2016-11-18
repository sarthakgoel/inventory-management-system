<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Item</title>
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
      <li><a href="index_admin.php"><span>Menu</span></a></li>
      <li><a href="V_F_month.php"><span>Orders</span></a></li>
      <li><a href="Add_Item.html"><span>Add Item</span></a></li>
	   <li><a href="V_D_sale.php"><span>Records</span></a></li>
      <li><a href="userinfo.php"><span>User Information</span></a></li>
      <li><a href="Update_Item.html"><span>Update Item</span></a></li>
      <li><a href="order_item.html"><span>Order Item</span></a></li>
      <li><a href="delete.html"><span>Delete Item</span></a></li>
	  <li class='active'><a href="pass_admin.php"><span>Change Password</span></a></li>
      <li class='last'><a href="Home.php"><span>Log Out</span></a></li>
    </ul>
  </div>
  <div class="center">
  <h2>Change Password</h2>
		<form method="post">
		<fieldset>
			<label for="old">Old Password :</label><input type="password" name="old" size="20" autofocus >
			<label for="new">New Password :</label><input type="password" name="new" size="20">
			<label for="confirm">Confirm Password:</label><input type="password" name="confirm" size="20"><br>
			<input type="submit" value="Update" name="submit">
		</fieldset>
	</form>
	<?php
		error_reporting(E_ALL);
		//session_start();
		include "conn.php";
		if(isset($_POST['submit']))
		{
			$old=$_POST['old'];
			$new=$_POST['new'];
			$confirm=$_POST['confirm'];
			if($new == $confirm)
			{
				$query="UPDATE user SET password = '$new' WHERE user_name = 'admin' AND password = '$old'";
				$result = mysqli_query($conn, $query);
				if($result)
					echo 'Password Changed Successfully';
				else					
					echo 'Incorrect Data';
			}
			else 
				echo 'New and Confirm Password doesnt match';
		}
	?>
</div>
 </body>
</html>