
<?php include('server.php');

error_reporting(~E_NOTICE);
ini_set('display_errors','1'); ?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>jQuery Show Hide Elements Using Select Box</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .box {
      color: #fff;
      padding: 20px;
      display: none;
      margin-top: 20px;
    }

    .insert {
      background: #ff0000;
    }

    .availabilityOne {
      background: #228B22;
    }

    .reportOne {
      background: #ff000d;
    }

    .searchOne {
      background: #ff000d;
    }




caption {
  font-weight: bold;
  font-size: 24px;
  text-align: left;
  color: #333;
}

.content-table{
    border-collapse:collapse;
    margin:25px 0;
    font-size:1.0em;
    min-width:600px;

}

.content-table thead tr{
  background-color : #009879;
  color:#ffffff;
  text-align:left;
  font-weight : bold;

}

.content-table th,
.content-table td{
  padding : 12px 15px;
}

.content-tabletbody tr{
  border-bottom:1px solid #dddddd;
}

.content-table tbody tr :nth-of-type(even){
  background-color : #f3f3f3;
}

.content-table tbody tr :last-of-type{
  border-bottom : 2px solid #009879;
}

  </style>




  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function () {
      $("select").change(function () {
        $(this).find("option:selected").each(function () {
          var optionValue = $(this).attr("value");
          if (optionValue) {
            $(".box").not("." + optionValue).hide();
            $("." + optionValue).show();
          } else {
            $(".box").hide();
          }
        });
      }).change();
    });
  </script>
</head>

<body>

<h1 >INVENTORY MANAGEMENT</h1>

<?php if(isset($_SESSION['msg']));?>

    <div class="msg">
      <?php
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
      ?>
    </div>



<?php if(isset($_SESSION['msg'])): ?>

      <div class="msg">

          <?php
          
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
          
          ?>

      </div>

<?php endif ?>


  <div  >
    <select >
      <option selected>Choose Option</option>
      <option value="insert" >Insert Item to Inventory</option>
      <option value="availabilityOne">Check Availability</option>
      <option value="reportOne">Generate Report</option>
      <option value="searchOne">Filter and Search</option>
      <option value="editOne">Update/Delete</option>
    </select>
  </div>
<table class="content-table" border=7>
<caption>Inventory details</caption>
<tbody>
<thead>
<tr>
          
        <td>itemName</td>
        <td>itemCatagory</td>
        <td>itemBrand</td>
        <td>itemQuantity</td>
        <td>itemPrice</td>
        <td>'itemCode</td>
        <td href=#>Edit</td>
        <td href=#>Delete</td>

        </tr></thead>

<?php while($row = mysqli_fetch_array($results)){ ?>

        <tr>
          
        <td><?php echo $row['itemName']; ?></td>
        <td><?php echo $row['itemCatagory']; ?></td>
        <td><?php echo $row['itemBrand']; ?></td>
        <td><?php echo $row['itemQuantity']; ?></td>
        <td><?php echo $row['itemPrice']; ?></td>
        <td><?php echo $row['itemCode']; ?></td>
        <td href=#>Edit</td>
        <td href=#>Delete</td>

        </tr>


<?php }?>
</tbody>

<center><img src="2a.jpg" width=200 height=200></center>

</table>


  
  <form  method="post"  action="server.php">


  <div class="insert box">
    
      <h1>Insert Items to Inventory</h1>
      Item Code : <input type="number" name="a" ><br>
      Item Name : <input name="item" type="text" name="item" required><br>
      Catagory : <input  name="cat" type="text" required><br>
      Brand : <input  name="brand"type="text"required ><br>
      Quantity : <input  name="quantity" type="number" required><br>
      Price : <input  name="price" type="number" required><br>
      <input  type="submit" name="insertMyValue" value="Insert" >

    
  </div>
  </form>


  <!--<div id="availabilityOne" class="availabilityOne box">-->


<!--when I click on one option the whole select UI disappears-->
<!--solved the problem by removing div-->

   

<form  method="post" action="server.php">
<h1>Check Whether Item is Available</h1>
    <label for="cars"style="font-size: 25px" >Choose a catagory:</label>

    <!--id of catagory dropdown list is mySelectOne-->
    <select name="catagory" id="cars" id="mySelectOne" >
      <option value="beverages">Beverages</option>
      <option value="saab">Biscuit</option>
      <option value="mercedes">Frozen Food</option>
      <option value="audi">Audi</option>
    </select>
    <br>
    <label for="item"style="font-size: 25px" >Choose a brand:</label>

    <!--id of brand dropdown list is mySelectTwo-->
    <select name="brand" id="mySelectTwo">
      <option value="smartwater">smartwater</option>
      <option value="saab">horlicks</option>
      <option value="mercedes">Pepsi</option>
      <option value="audi">Red Bull</option>
    </select>
    <br>

    <label for="item"style="font-size: 25px" >Choose an item:</label>

    <!--id of items dropdown list is mySelectThree-->
    <select name="items" id="mySelectThree">
      <option value="bottled water">Bottled water</option>
      <option value="saab">nutritional drinks</option>
      <option value="mercedes">ice cream</option>
      <option value="audi">energy bars</option>
    </select>
    <br>

    

    <input  type="submit" name="checkItemAvailability" value="Check" >
  
</form><br><br><br>



  <div id="reportOne" class="reportOne box">
    <h1>Generate Report</h1>

    <form>

      <form action="/action_page.php">
        <label for="cars">Choose a method to generate Report:</label>
        <select name="report" id="reportOne">
          <optgroup label="INS">
            <option value="inweek">Per Week</option>
            <option value="inmonth">Per Month</option>
            <option value="inyear">Per Year</option>
          </optgroup>
          <optgroup label="OUTS">
            <option value="outweek">Per Week</option>
            <option value="outmonth">Per Month</option>
            <option value="outyear">Per Year</option>
          </optgroup>
        </select>
        <br><br>
        <input type="submit" value="Submit">
      </form>


      <button>Generate Report</button>
    </form>
  </div>



  <!--code to search function-->
    <form action="server.php" method="post">

      <h1  >Search Item According to any attribute</h1>
      <label for="item"style="font-size: 25px" >Search item according to :</label>
      <select name="search" id="search">
        <option value="itemCode">itemCode</option>
        <option value="itemName">itemName</option>
        <option value="itemCatagory">itemCatagory</option>
        <option value="itemBrand">itemBrand</option>
        <!--<option value="addedDate">Added Date</option>-->
      </select>
      <input type=text name="searchKey" placeholder="Enter value">
      <input  type="submit" name="searchMyValue" value="Search" >
      

    <?php
    
    
    ?>
    
    </form>
 




  <div class="green box">You have selected <strong>green option</strong> so i am here</div>
  <div class="blue box">You have selected <strong>blue option</strong> so i am here</div>

  



<!--print output to page(Search Function)-->


</body>

</html>