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
<style>.refOne {
    width:50%;
  background-color: blue;
  color: white;
  padding: 16px;
  border-radius: 50%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}


.refTwo {
    width:50%;
  background-color:red;
  color: white;
  padding: 16px;
  border-radius: 50%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}
th {background-color: yellow;}
tr:nth-child(even) {background-color: pink;}
tr:nth-child(odd) {background-color: tomato;}
</style>

<style>
body {
  background-image: url('b3.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style> 
<style>

    .myHeading{
        padding: 10px 16px;
  background: green;
  color: #f1f1f1;
  text-align: center;
  width : 50%;
  

    }
</style>

<style>
.footer {
  position : fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height:70px;
   background-color: red;
   color: white;
   text-align: center;
}
</style>

<style>
.header {
  padding: 10px 16px;
  background: #555;
  color: #f1f1f1;
  text-align: center;

}
</style>


<body>
<div class="header" id="myHeader">
  <h2>Inventory Management</h2>
</div>



<div class="form">
<p><a href="home.php">Home</a> 
| <a href="insert.php">Insert New Record</a> 

<a href="dashboard.php">Dashboard</a><p>
<h2 class="myHeading">View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Item Name</strong></th>
<th><strong>Item Catagory</strong></th>
<th><strong>Item Brand</strong></th>
<th><strong>Item Quantity</strong></th>
<th><strong>Item Price</strong></th>
<th><strong>Added Date</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
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
<a class="refOne"href="edit.php?id=<?php echo $row["itemCode"]; ?>">Edit</a>
</td>
<td align="center">
<a class="refTwo" href="delete.php?id=<?php echo $row["itemCode"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>

<div class="footer">
  <p></p>
</div>



</body>
</html>