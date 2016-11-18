<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Main Menu</title>
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
       <li class='active'><a href="index_admin.php"><span>Menu</span></a></li>
	   <li><a href="V_F_month.php"><span>Orders</span></a></li>
       <li><a href="Add_Item.html"><span>Add Item</span></a></li>
	   <li><a href="V_D_sale.php"><span>Records</span></a></li>
      <li><a href="userinfo.php"><span>User Information</span></a></li>
       <li><a href="Update_Item.html"><span>Update Item</span></a></li>
      <li><a href="order_item.html"><span>Order Item</span></a></li>
       <li><a href="delete.html"><span>Delete Item</span></a></li>
	  <li><a href="pass_admin.php"><span>Change Password</span></a></li>
       <li class='last'><a href="Home.php"><span>Log Out</span></a></li>
    </ul>
  </div>
<div class="center">
  <h4>Welcome, ADMIN!</h4><br>
  <h3>This is the list of item you have in your Inventory</h3>
<?php
  error_reporting(E_ALL);
session_start();
include "conn.php";

$query = "SELECT *
FROM `item_pinms`";

$result = mysqli_query($conn, $query);
	   // print("<tr>");
		 // print("<th>BEL Part No.</th>");
		 // print("<th>Name</th>");
		 // print("<th>Quantity</th>");
		 // print("</tr>");
		 // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		//{
		  
		 // print("<tr>");
		  //foreach($row as $key => $value)
		  //  print("<td>$value</td>");

		  //print("</tr>");
		//}
 
  if (mysqli_num_rows($result) > 0) 
	{ //creating the table header
      echo "<table>
    		<tr>
			<th>BEL Part No.</th>
			<th>Name</th>
			<th>Quantity </th>
			</tr>";
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
		{ //assigning the selected data from the database to a variable
			//displaying the selected data into the table
			echo "

		  <tr>
			<td>{$row['item_id']}</td>
			<td>{$row['item_name']}</td>
			<td>{$row['item_quantity']}</td>
		  </tr>";

		}
      echo "</table>";
	}
?>
</div>

</body>
</html>