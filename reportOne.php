<?php
//require('db.php');

$servername='localhost';
    $username='root';
    $password='';
    $dbname = "inventorymanagement";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    
      if(!$conn){
          die('Could not Connect MySql Server:' .mysqli_error());
        }


$dateOne=$_POST['dateOne'];
$dateTwo=$_POST['dateTwo'];

$query="Select itemName FROM inventory WHERE addedDate BETWEEN '$dateOne' AND '$dateTwo' order by addedDate ";
//$query = "DELETE FROM inventory WHERE itemCode=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());

$count=mysqli_num_rows($result);

echo 'The number of Item records added between the two dates are  :  ';
echo $count;


//header("Location: reportOne.php"); 
?>
<!DOCTYPE html >
<html >
<head>
	<title>Report</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <form action="" method="POST">
        <input type="date" name="dateOne" /><br>
        <input type="date" name="dateTwo" /><br>
        <input type="submit" value="Search" />


    </form>
</body>
</html>