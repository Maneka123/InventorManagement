<?php
//require('db.php');
//include("auth.php");
$servername='localhost';
    $username='root';
    $password='';
    $dbname = "inventorymanagement";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    
      if(!$conn){
          die('Could not Connect MySql Server:' .mysqli_error());
        }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Item Name</strong></th>
<th><strong>Item Catagory</strong></th>
<th><strong>Item Brand</strong></th>
<th><strong>Item Quantity</strong></th>
<th><strong>Item Price</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from inventory ORDER BY itemCode desc;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["itemName"]; ?></td>
<td align="center"><?php echo $row["itemCatagory"]; ?></td>
<td align="center"><?php echo $row["itemBrand"]; ?></td>
<td align="center"><?php echo $row["itemQuantity"]; ?></td>
<td align="center"><?php echo $row["itemPrice"]; ?></td>
<td align="center"><?php echo $row["addedDate"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>