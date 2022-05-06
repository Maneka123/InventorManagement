<?php
//require('db.php');
if(isset($_POST["search"])){
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

echo "<h1>The number of Item records added between the two dates are  : {$count} </h1>";

    }

//header("Location: reportOne.php"); 
?>
<!DOCTYPE html >
<html >
<head>
	<title>Report</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<style> 
    input[type=date] {
      width: 500px;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      background-color: white;
      background-image: url('searchicon.png');
      background-position: 10px 10px; 
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      transition: width 0.1s ease-in-out;
    }
    
    
    </style>

<style>.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }</style>

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
<style>
    body {
      background-image: url('b4.png');
      background-repeat: no-repeat;
      background-size: cover;
    }</style>
<body>

<div class="header" id="myHeader">
        <h2>Inventory Management</h2>
      </div>
 
      <p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
| <a href="logout.php">Logout</a></p>


<br>
    <div align="center">
    <form action="" method="POST">
        <input type="date" name="dateOne" /><br>
        <input type="date" name="dateTwo" /><br><br>
        <input class="button" type="submit" value="Search" name="search" />


    </form>
</div>


<div class="footer">
        <p></p>
      </div>


</body>
</html>