
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
a:link, a:visited {
    width:50%;
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
</style>
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
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
  background-image: url('b1.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style> 

<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="header" id="myHeader">
  <h2>Inventory Management</h2>
</div>


<div class="form" align="center">
<h1>Welcome to Dashboard.</h1>
<p><a href="index.php">Home</a><p>
<p><a href="insert.php">Insert New Item</a></p>
<p><a href="view.php">View Item Records</a><p>
<p><a href="mySearch.html">Search Item</a></p>
<p><a href="reportOne.php">Generate the quantity of items added between two dates</a></p>
<p><a href="graph.php">See the graph</a></p>
</div>

<div class="footer">
  <p>Footer</p>
</div>
</body>
</html>