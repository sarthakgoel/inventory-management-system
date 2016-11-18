<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order Item</title>
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
       <li class='active'><a href="add_entry1.php"><span>Order Item</span></a></li>
	   <li><a href="pass_user.php"><span>Change Password</span></a></li>
       <li><a href="logout.php"><span>Log Out</span></a></li>
    </ul>
  </div>

     
 <div class="center">    
<?php  
     error_reporting(E_ALL);
     
     include "conn.php";
      if(isset($_SESSION["username"]))
	{
	  if (isset($_POST['confirm']))
		{
			$quant=0;
			$itemname = $_POST['name'];
			$item_sold_id = $_POST['partno'];
			$quantity=$_POST['quantity'];
			$day = date("d");
			$month = date("M");
			$year = date("Y");
			$uname = $_POST['uname'];
			$staff_id=$_SESSION["Staff_id"];
			
			$update="select * from item_pinms where item_id = '$item_sold_id'";	
			$result = mysqli_query($conn, $update);
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				$quant=$row['item_quantity'];
				$item_name = $row['item_name'];
			}
			if ($quantity<=$quant-3 && $item_name == $itemname)
			{
				$update1 = "UPDATE item_pinms SET item_quantity = item_quantity - $quantity WHERE item_name = '$itemname'";
				
				$result2 = mysqli_query($conn, $update1);
				
				// get form data, making sure it is valid
				
					
				// $update2="select * from user where user_name = '$uname'";	
				// $result3 = mysqli_query($conn, $update2);
				// while ($row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC))
				// {
					// $Staff_id=$row2['staff_id'];
				// }
				
				
				
				
				$query4 = "INSERT INTO `order` (`quantity_sold`,`day`,`item_sold`,`month`,`year`,`item_sold_id`,`username`,`Staff_Id`) 
				VALUES	
				('$quantity','$day','$itemname','$month','$year','$item_sold_id','$uname','$staff_id')";
				
				$result4 = mysqli_query($conn, $query4);
				if($result4 && $result2){
					echo "<p>Item ordered</p>";
				}
				else{  echo "Item Not ordered";
				}
			}
				
			else{ if(!($quantity<=$quant-3 ))
				{ 
					echo '<p>Ordered quantity is greater than available quantity <br>Item Not Ordered</p>';
				}
				if(!($item_name == $itemname))
				{
					echo '<p><br> Item Name and BEL Part NO. did not matched.<br>
								Item Not Ordered </p>';
				}
				}
		}
	}
	mysqli_close($conn);
?>

</div>
</body>
</html>
