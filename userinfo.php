<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Monthly Record</title>
    <link rel="stylesheet" type="text/css" href="stylingpage.css"> <!-- linking to external css file -->
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
</head>

<body>
  <h3 class="skm"> <!-- calling identifier "skm" for image replacement -->
  CRL Inventory Management System
  </h3>
  <div id='cssmenu'> <!--calling identifier "cssmenu" for navigation bar-->
    <ul>
      <li><a href="index_admin.php"><span>Menu</span></a></li>
	  <li><a href="V_F_month.php"><span>Orders</span></a></li>
      <li><a href="Add_Item.html"><span>Add Item</span></a></li>
      <li><a href="V_D_sale.php"><span>Records</span></a></li>
      <li class='active'><a href="userinfo.php"><span>User Information</span></a></li>
      <li><a href="Update_Item.html"><span>Update Item</span></a></li>
      <li><a href="order_item.html"><span>Order Item</span></a></li>
      <li><a href="delete.html"><span>Delete Item</span></a></li>
	  <li><a href="pass_admin.php"><span>Change Password</span></a></li>
      <li class='last'><a href="Home.php"><span>Log Out</span></a></li>
    </ul>
  </div>
<div class="center">  <!--aligning the body to the center of the page-->
  <p>Registered User List</p>
  <br><br>
  <?php
error_reporting(E_ALL);
session_start();
include "conn.php";

if (isset($_POST['submit']))
{
	$Staff_id=$_POST['Staff_id'];
	$query="Delete FROM `user` where `staff_id`='$Staff_id'" ;
	$result = mysqli_query($conn, $query);
	if($result)
              echo 'User deleted';
          else
              echo 'Something went wrong';
} // selecting the data from the database
	$query = "SELECT *
  FROM `user`" ;

	$result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
      echo "<table>
    		<tr>
	<th>UserName</th>
	<th>Staff_Id</th>
  		</tr>";
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { //assigning the selected data from the database to a variable
      	                                                         //displaying the selected data into the table
      	echo "

  <tr>
	<td>{$row['user_name']}</td>
	<td>{$row['staff_id']}</td>
  </tr>";

      }
      echo "</table>";
    }
      else {    echo "<br><br>Query didnt return any result"; //else condition if the query didn't return any result
        }
 mysqli_close($conn)  //closing connection
?>
<form  method="post" >
	Staff_Id: <input type="text" name="Staff_id" maxlength="20" size="15" autofocus><br>
	Enter the Staff Id of the User which is to be Removed
	<input type="submit" name="submit" value="Remove User" style="margin-right:70px;">
  </form>
</div>
</body>
</html>
