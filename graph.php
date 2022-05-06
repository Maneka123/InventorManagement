<?php
    $con  = mysqli_connect("localhost","root","","inventorymanagement");
     if (!$con) {
         # code...
        echo "Problem in database connection! Contact administrator!" . mysqli_error();
     }else{
             $sql ="SELECT * FROM inventory";
             $result = mysqli_query($con,$sql);
             $chart_data="";
             while ($row = mysqli_fetch_array($result)) { 
     
                $productname[]  = $row['addedDate']  ;
                $sales[] = $row['itemQuantity'];
            }
     
     
     }
     
     
    ?>
    <!DOCTYPE html>
    <html lang="en"> 
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Graph</title> 
        </head>

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
    </style>
<style>
    body {
      background-color: white;
      background-repeat: no-repeat;
      background-size: cover;
    }</style>
<body>

        <body>
        

        <div class="header" id="myHeader">
        <h2>Inventory Management</h2>
      </div>

      <p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
| </p>

            <div style="width:60%;hieght:20%;text-align:center">
                <h2 class="page-header" >Analytics Reports </h2>
                <h3>The following graph has the date in the x - axis and the number of items in the y - axis.</h3>
                <h3>It shows number of items modified each day</h3>
                <div>Product </div>
                <canvas  id="chartjs_bar"></canvas> 
            </div>    

            <div class="footer">
        <p></p>
      </div>


        </body>
      <script src="//code.jquery.com/jquery-1.9.1.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
          var ctx = document.getElementById("chartjs_bar").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels:<?php echo json_encode($productname); ?>,
                            datasets: [{
                                backgroundColor: [
                                   "#5969ff",
                                    "#ff407b",
                                    "#25d5f2",
                                    "#ffc750",
                                    "#2ec551",
                                    "#7040fa",
                                    "#ff004e"
                                ],
                                data:<?php echo json_encode($sales); ?>,
                            }]
                        },
                        options: {
                               legend: {
                            display: true,
                            position: 'bottom',
     
                            labels: {
                                fontColor: '#71748d',
                                fontFamily: 'Circular Std Book',
                                fontSize: 14,
                            }
                        },
     
     
                    }
                    });
        </script>
    </html>