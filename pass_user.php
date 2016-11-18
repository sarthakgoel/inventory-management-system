<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Change Password</title>
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
       <li><a href="add_entry1.php"><span>Order Item</span></a></li>
	  <li class='active'><a href="pass_user.php"><span>Change Password</span></a></li>
      <li class='last'><a href="logout.php"><span>Log Out</span></a></li>
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
		
		include "conn.php";
		if(isset($_SESSION["username"]))
		{
			if(isset($_POST['submit']))
			{
				$uname=$_SESSION['username'];
				$old=$_POST['old'];
				$new=$_POST['new'];
				$confirm=$_POST['confirm'];
				if($new == $confirm)
				{
					$query="UPDATE user SET password = '$new' WHERE user_name = '$uname' AND password = '$old'";
					$result = mysqli_query($conn, $query);
					if($result)
						echo 'Password Changed Successfully';
					else					
						echo 'Incorrect Data';
				}
				else 
					echo 'New and Confirm Password doesnt match';
			}
		}
	?>
</div>
 </body>
</html>