
<?php
include 'conn.php';
 session_start();
 if (isset($_POST['login'])){
	
	
		
	$_SESSION["username"] = $_POST['uname'];
	$pass = $_POST['pass'];
		if($_SESSION["username"] == null || $pass == null){
			echo "Please fill in the username and password.";
		}
		else{
				$uname=$_SESSION["username"];
				// $pass = $_POST['pass'];
				$query="SELECT * FROM `user` WHERE `user_name` = '$uname'";
				$result=mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					$_SESSION["Staff_id"]=$row['staff_id'];
					$username=$row['user_name'];
					$password=$row['password'];
				}
				
				if($_SESSION["username"] == 'admin' && $pass == $password)
				{
					header("location:index_admin.php");
				}		
				else if($_SESSION["username"] == $username && $pass == $password)
				{
					header("location:index_user.php");
				}
				else 
				{
					echo "Wrong User Name Or Password!!";
				}
			}
		
		}
?>