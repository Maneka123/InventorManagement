<?php

$servername='localhost';
    $username='root';
    $password='';
    $dbname = "inventorymanagement";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    
      if(!$conn){
          die('Could not Connect MySql Server:' .mysqli_error());
        }

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $trn_date = date("Y-m-d H:i:s");
    $name =$_REQUEST['name'];
    $catagory = $_REQUEST['catagory'];
    $brand =$_REQUEST['brand'];
    $quantity = $_REQUEST['quantity'];
    $price = $_REQUEST['price'];


    //$submittedby = $_SESSION["username"];
    $ins_query="insert into inventory
    (`itemName`,`itemCatagory`,`itemBrand`,`itemQuantity`,`itemPrice`,`addedDate`)values
    ('$name','$catagory','$brand','$quantity','$price','$trn_date')";
    mysqli_query($conn,$ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter item Name" required /></p>
<p><input type="text" name="catagory" placeholder="Enter Item Catagory" required /></p>

<p><input type="text" name="brand" placeholder="Enter Item Brand" required /></p>
<p><input type="text" name="quantity" placeholder="Enter Quantity" required /></p>
<p><input type="text" name="price" placeholder="Enter Item Price" required /></p>

<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>