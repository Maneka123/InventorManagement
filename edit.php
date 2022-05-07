<?php

$servername='localhost';
    $username='root';
    $password='';
    $dbname = "inventorymanagement";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    
      if(!$conn){
          die('Could not Connect MySql Server:' .mysqli_error());
        }

$id=$_REQUEST['id'];
$query = "SELECT * from inventory where itemCode='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<style> 
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

body {
  background-image: url('b5.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}


</style>
<style>
.footer {
  position : sticky;
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
h1,div{
  text-align:center;
}
</style>
<body>

<div class="header" id="myHeader">
  <h2>Inventory Management</h2>
</div>

<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1 >Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$cat =$_REQUEST['cat'];

$brand =$_REQUEST['brand'];
$quantity =$_REQUEST['quantity'];
$price =$_REQUEST['price'];



$update="update inventory set addedDate='".$trn_date."',
itemName='".$name."', itemCatagory='".$cat."',itemBrand='".$brand."',itemQuantity='".$quantity."',itemPrice='".$price."'
 where itemCode='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div >
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['itemCode'];?>" />
<p><input type="text" name="name" placeholder="Enter Item Name" 
required value="<?php echo $row['itemName'];?>" /></p>
<p><input type="text" name="cat" placeholder="Enter Item Catagory" 
required value="<?php echo $row['itemCatagory'];?>" /></p>

<p><input type="text" name="brand" placeholder="Enter Item Brand" 
required value="<?php echo $row['itemBrand'];?>" /></p>

<p><input type="text" name="quantity" placeholder="Enter Item Quantity" 
required value="<?php echo $row['itemQuantity'];?>" /></p>

<p><input type="text" name="price" placeholder="Enter Item Price" 
required value="<?php echo $row['itemPrice'];?>" /></p>

<p><input class="button" name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>

<div class="footer">
  <p></p>
</div>


</body>
</html>