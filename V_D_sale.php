<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Daily Record</title>
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
      <li class='active'><a href="V_D_sale.php"><span>Records</span></a></li>
      <li><a href="userinfo.php"><span>User Information</span></a></li>
      <li><a href="Update_Item.html"><span>Update Item</span></a></li>
      <li><a href="order_item.html"><span>Order Item</span></a></li>
      <li><a href="delete.html"><span>Delete Item</span></a></li>
	  <li><a href="pass_admin.php"><span>Change Password</span></a></li>
      <li class='last'><a href="Home.php"><span>Log Out</span></a></li>
    </ul>
  </div>
<div class="center"> <!--aligning the body to the center of the page-->
  <p>View Daily Record</p>

  <br><br>

  <form  method="post"> <!--using POST method-->
  Date:  <input type="text" name="day_D" maxlength="2" size="2"autofocus> / <!--creating inputs for search by date-->
  <input type="text" name="month_D" maxlength="5" size="2"> /
  <input type="text" name="year_D" maxlength="4" size="4"><br>
  <input type="submit" name="submit_D" value="Daily Record" style="margin-right:70px;">
  <input type="submit" name="submit_D_M" value="Monthly Record" style="margin-right:70px;">
<?php
error_reporting(E_ALL);
session_start();
include "conn.php"; //including the conn.php file for connectivity purposes

if (isset($_POST['submit_D']))
{
	// get form data, making sure it is valid

	$day = $_POST['day_D'];
	$month = $_POST['month_D'];
	$year = $_POST['year_D'];
	$query = "SELECT *
  FROM `sales`
  WHERE `day` = '$day' AND `month` = '$month' AND `year` = '$year'" ;
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) { //creating the table header
      echo "<table>
  		<tr>
		<th>UserName</th>
		<th>Staff_Id</th>
    <th>Item ID</th>
    <th>Item Issued</th>
    <th>Quantity Issued</th>
    <th>Day</th>
    <th>Month</th>
    <th>Year</th>
  </tr>";
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { //assigning the selected data from the database to a variable
      	                                                         //displaying the selected data into the table
      	echo "

  <tr>
    <td>{$row['username']}</td>
	<td>{$row['Staff_Id']}</td>
    <td>{$row['item_sold_id']}</td>
    <td>{$row['item_sold']}</td>
    <td>{$row['quantity_sold']}</td>
    <td>{$row['day']}</td>
    <td>{$row['month']}</td>
    <td>{$row['year']}</td>
  </tr>";

      }
      echo "</table>";  //closing table
    }
      else {    echo "<br><br>Fill all the fields";  //else condition if the query didn't return any result
        }
  }
elseif (isset($_POST['submit_D_M']))
{
	// get form data, making sure it is valid
	// selecting the data from the database
	$day = $_POST['day_D'];
	$month = $_POST['month_D'];
	$year = $_POST['year_D'];
	$query = "SELECT *
  FROM `sales`
  WHERE `month` = '$month' AND `year` = '$year'" ;
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) { //creating the table header
      echo "<table>
  		<tr>
		<th>UserName</th>
		<th>Staff_Id</th>
    <th>Item ID</th>
    <th>Item Issued</th>
    <th>Quantity Issued</th>
    <th>Day</th>
    <th>Month</th>
    <th>Year</th>
  </tr>";
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { //assigning the selected data from the database to a variable
      	                                                         //displaying the selected data into the table
      	echo "

  <tr>
    <td>{$row['username']}</td>
	<td>{$row['Staff_Id']}</td>
    <td>{$row['item_sold_id']}</td>
    <td>{$row['item_sold']}</td>
    <td>{$row['quantity_sold']}</td>
    <td>{$row['day']}</td>
    <td>{$row['month']}</td>
    <td>{$row['year']}</td>
  </tr>";

      }
      echo "</table>";  //closing table
    }
      else {    echo "<br><br>Fill all the fields";  //else condition if the query didn't return any result
        }
}

 mysqli_close($conn)  //closing connection
?>


</form>


</div>

</body>
</html>
