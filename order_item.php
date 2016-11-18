<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Issue Item</title>
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
	  <li class='active'><a href="order_item.html"><span>Order Item</span></a></li>
      <li><a href="delete.html"><span>Delete Item</span></a></li>
	  <li><a href="pass_admin.php"><span>Change Password</span></a></li>
      <li class='last'><a href="Home.php"><span>Log Out</span></a></li>
    </ul>
  </div>

     
 <div class="center">    
<?php  
     error_reporting(E_ALL);
     
     include "conn.php";
      if (isset($_POST['confirm']))
{
	$quant=0;
	$sid = $_POST['sid'];
	$itemname = $_POST['name'];
	$item_sold_id = $_POST['partno'];
	$quantity=$_POST['quantity'];
	$day = date("d");
	$month = date("M");
	$year = date("Y");
	$uname = $_POST['uname'];
	
	 $update="select * from item_pinms where item_id = '$item_sold_id'";	
	 $result = mysqli_query($conn, $update);
	 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	 {
		 $quant=$row['item_quantity'];
		 $item_name = $row['item_name'];
	 }
	 if ($quantity<=$quant && $item_name == $itemname)
	{
	 $update = "UPDATE item_pinms SET item_quantity = item_quantity - $quantity WHERE item_name = '$itemname'";
	
	 $result = mysqli_query($conn, $update);
	
		// get form data, making sure it is valid

		
		
		
		$query4 = "INSERT INTO `sales` (`quantity_sold`,`day`,`item_sold`,`month`,`year`,`item_sold_id`,`username`,`Staff_Id`) 
		VALUES	
		('$quantity','$day','$itemname','$month','$year','$item_sold_id','$uname','$sid')";
		
		$result4 = mysqli_query($conn, $query4);
		if($result4)
		{
			echo "<p>Item added to Issue list</p>";
		}
		else
		{  
			echo "Item Not added";
		}
	}
	
	else 
		{ 
		//header("location:add_entry.php");
		echo '<p>Item not Available or Ordered quantity is greater than available quantity <br><br>
		Item Not Ordered </p>';
		}
}
	mysqli_close($conn);
?>

</div>
</body>
</html>
