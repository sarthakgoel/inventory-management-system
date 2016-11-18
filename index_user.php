<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Main Menu</title>
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
       <li class='active'><a href="index_user.php"><span>Main Menu</span></a></li>
       <li><a href="add_entry1.php"><span>Order Item</span></a></li>
	   <li><a href="pass_user.php"><span>Change Password</span></a></li>
       <li><a href="logout.php"><span>Log Out</span></a></li>
    </ul>
  </div>
  <div class="center">
<br><br>
    <p>All Items List</p>
    <div>
 
      <table>
  <?php
error_reporting(E_ALL);
session_start();
include "conn.php";
if(isset($_SESSION["username"]))
{
	$query = "SELECT *
	FROM `item_pinms`";

	$result = mysqli_query($conn, $query);
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
				$quantity=$row['item_quantity'];
				if($quantity<=3)
				{
					$quantity = 0;
				}
				else
				{
					$quantity=$quantity-3;
				}
				echo "
				
			  <tr>
				<td>{$row['item_id']}</td>
				<td>{$row['item_name']}</td>
				<td>{$quantity}</td>
			  </tr>";

			}
		  echo "</table>";
		}	
	}
  ?>
  </table>
    </div>
  </div>
</body>
</html>
