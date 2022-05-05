//first commit
<?php

    session_start();

    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "inventorymanagement";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    
      if(!$conn){
          die('Could not Connect MySql Server:' .mysqli_error());
        }
        
if(isset($_POST['insertMyValue']))
{    
     $itemNameOne = $_POST['item'];
     $catagoryOne = $_POST['cat'];
     $brandOne = $_POST['brand'];
     $quantityOne = $_POST['quantity'];
     $priceOne = $_POST['price'];
     

     $sql = "INSERT INTO inventory(itemName,itemCatagory,itemBrand,itemQuantity,itemPrice)VALUES ('{$itemNameOne}','{$catagoryOne}','{$brandOne}','{$quantityOne}','{$priceOne}')";
     




     mysqli_query($conn,$sql);
     $_SESSION['msg']="Item saved";
     header('location: indexThree.php');
     //$results=mysqli_query($conn,"select * from inventory");

}

  $results=mysqli_query($conn,"select * from inventory");

  //if you use mysql instead of mysqli error will come as  call to undefined function


    
?>



<!--php code for check availability-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventorymanagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['checkItemAvailability']))
{

//$sql="select * from inventory where itemCatagory='fried rice'";

$a=$_POST['catagory'];
$b=$_POST['brand'];
$c=$_POST['items'];
$sql="select * from inventory where itemCatagory = '$a' and itemBrand='$b' and itemName='$c';";
$result = $conn->query($sql);


if($result){



            if ($result->num_rows > 0) {
            // output data of each row
                      while($row = $result->fetch_assoc()) {
                      //echo "Hello, I am there";
                            echo '<script language="javascript">alert("Hello there! The item is available");window.location.href = "indexThree.php";</script>';
                            
                        }
            }
              else {
                echo '<script language="javascript">alert("Sorry to say that your item is not available");window.location.href = "indexThree.php";</script>';
                
                }
                
}}
//$conn->close();                      
?>
                      


                      <?php

// php code to search data in mysql database and set it in input text

if(isset($_POST['searchMyValue']))
{
    // id to search
    $s = $_POST['search'];
    $d = $_POST['searchKey'];
    // connect to mysql
    $connect = mysqli_connect("localhost", "root", "","inventorymanagement");
    
    // mysql search query
    $query = "SELECT `itemName','itemCatagory' FROM `inventory` WHERE $s = $d ";
    
    $result = mysqli_query($connect, $query);
    
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $a = $row['itemName'];
        $b=$row['itemCatagory'];
       
        
        //$lname = $row['lname'];
        //$age = $row['age'];
        echo($a);
        echo($b);
        
        
      }  
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
        echo "Undifined ID";
            $a = "";

           
    }
    
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
}

// in the first time inputs are empty
else{
    $fname = "";
    $lname = "";
    $age = "";
}


?>
