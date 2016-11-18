<!doctype html>
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
      <li class='active'><a href="Update_Item.html"><span>Update Item</span></a></li>
      <li><a href="order_item.html"><span>Order Item</span></a></li>
      <li><a href="delete.html"><span>Delete Item</span></a></li>
	  <li><a href="pass_admin.php"><span>Change Password</span></a></li>
      <li class='last'><a href="Home.php"><span>Log Out</span></a></li>
    </ul>
  </div>
  <div class="center">
    <p>Update Item</p>
  <br>
  <?php
  error_reporting(E_ALL);
  session_start();
  include "conn.php";
  
	if(isset($_POST['submit'])){
		//if the submit button is clicked
		
		$item_name = $_POST['name'];
		$quantity = $_POST['quantity'];
		$id = $_POST['partno'];

	$query="UPDATE item_pinms SET item_quantity = item_quantity + $quantity WHERE item_id = '$id'";
	$result = mysqli_query($conn, $query);
	}
	
	
	elseif(isset($_POST['Subtract'])){
		//if the subtract button is clicked
		
		$item_name = $_POST['name'];
		$quantity = $_POST['quantity'];
		$id = $_POST['partno'];

	$query="UPDATE item_pinms SET item_quantity = item_quantity - $quantity WHERE item_id = '$id'";
	$result = mysqli_query($conn, $query);
	}
	
	
	if($result ){
		echo "Item have been Updated";
	}
	else{  echo "Item not have been Updated";
	}
	
	mysqli_close($conn);
?>
  
</div>
</body>
</html>
