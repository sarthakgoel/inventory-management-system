	<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="stylingpage.css">
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
</head>

<body>
  <?php
error_reporting(E_ALL);
include "conn.php";
session_start();
 
if (isset($_POST['submit']))
{
	// get form data, making sure it is valid

	$staff_id = $_POST['sid'];
	$name = $_POST['name'];
	$pass= $_POST['pass'];
	
	if($name == null || $pass == null || $staff_id == null){
			echo "Please fill All the fields";
		}
	else{// save the data to the database
	$query = "INSERT INTO `user` (`user_name`,`staff_id`,`password`)
	VALUES
	('$name','$staff_id','$pass')";

	$result = mysqli_query($conn, $query);
	if($result){
		header("location:home.php");
		echo "New User Added";
	}
	else{  echo "New User Not Added <br> UserName or Staff Id already in use";
	}
	}
}
 mysqli_close($conn);
?>
  
  </div>
</body>
</html>
