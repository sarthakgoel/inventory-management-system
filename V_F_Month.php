<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Orders</title>
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
	  <li class='active'><a href="V_F_month.php"><span>Orders</span></a></li>
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
<div class="center"> <!--aligning the body to the center of the page-->
  <p>Ordered Items</p>

  <br><br>
  

  <?php
error_reporting(E_ALL);
session_start();
include "conn.php"; //including the conn.php file for connectivity purposes

	// get form data, making sure it is valid
	
      
      if (isset($_POST['submit']) )
      {
          $S_No = $_POST['S_No'];
          if($S_No == '')
            echo 'no value inserted';
          else
          {
            $query = "UPDATE `order` SET `Status`= 'Issued' WHERE `S_No.` = '$S_No' ";
            $result = mysqli_query($conn, $query);
            $query2 = "INSERT INTO `sales`(`username`,`Staff_Id`, `item_sold_id`, `item_sold`, `quantity_sold`, `day`, `month`, `year`) 
			Select `username`,`Staff_Id`, `item_sold_id`, `item_sold`, `quantity_sold`, `day`, `month`, `year` 
			FROM `order` 
			WHERE `S_No.` = '$S_No' ";
			$result2 = mysqli_query($conn, $query2);
			
          }
      }
      if (isset($_POST['delete']) )
      {
          $query = "DELETE FROM `order` WHERE `Status` = 'Issued'";
          $query2 = "ALTER TABLE `order` DROP `S_No.`;";
          $query3 = "ALTER TABLE `order` ADD `S_No.` INT(20) NOT NULL AUTO_INCREMENT FIRST , ADD PRIMARY KEY (`S_No.`)";
          $result = mysqli_query($conn, $query);
		  $result2 = mysqli_query($conn, $query2);
		  $result3 = mysqli_query($conn, $query3);
          if($result && $result2 && $result3)
              echo 'Item deleted';
          else
              echo 'Something went wrong';
      }
          

 // selecting the data from the database
	$query = "SELECT * FROM `order`";
 
	$result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) { //creating the table header
      echo "<table>
    		<tr>
	<th>S_No.</th>
    <th>UserName</th>
	<th>Staff Id</th>
	<th>Item ID</th>
    <th>Item Name</th>
    <th>Quantity </th>
    <th>Day</th>
    <th>Month</th>
    <th>Year</th>
    <th>Status</th>
  		</tr>";
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { //assigning the selected data from the database to a variable
      	                                                         //displaying the selected data into the table
      	echo "

  <tr>
	<td>{$row['S_No.']}</td>
	<td>{$row['username']}</td>
	<td>{$row['Staff_Id']}</td>
    <td>{$row['item_sold_id']}</td>
    <td>{$row['item_sold']}</td>
    <td>{$row['quantity_sold']}</td>
    <td>{$row['day']}</td>
    <td>{$row['month']}</td>
    <td>{$row['year']}</td>
    <td>{$row['Status']}</td>
  </tr>";

      }
      echo "</table>"; //closing table
    }
      else {    echo "<br><br>No items Ordered Yet"; //else condition if the query didn't return any result
        }
	

?>
<div>
	<form  method="post" action="V_F_Month.php">
		S_No.<input type="text" name="S_No" maxlength="20" size="15" autofocus><br>
		Enter the serial no. of the item which is to be issued<br>
		<input type= "submit" name="submit" value="Issue" >
		<input type= "submit" name="delete" value="Delete issued items"  >
	</form>
</div>

  
</div>
</body>
</html>
