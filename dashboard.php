<?php
session_start();
//$username = $_SESSION["username"];
//$useremail = $_SESSION["email"];
require 'serviceedit.php';
?>
<!DOCTYPE html>

<head>
    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129106910-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129106910-1');
</script>

    
<meta name="viewport" content="width=device-width, initial-scale=1">
    
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
    
<title>Dashboard</title>
</head>

<body>

<div id="adminlinks">
<a class="btn btn-outline-primary" href="index.php">Home</a>
<a class="btn btn-outline-primary" href="addprods.php">Add Product</a>
<a class="btn btn-outline-primary" href="addserv.php">Add Services</a>
<a class="btn btn-outline-primary" href="contactinfo.php" class="p-1">Contact Info</a>
</div>

<div id="print_version">
    
    <p class="alert alert-info text-center">Click the 'Print Version' button to get a print version of your products & services. Use the print version for email or as a flyer!</p>
    <form method="POST" action="printversion.php">
        
        <button type="submit" class="btn btn-primary" name="printversion" id="printversion">Print Version</button>
        
    </form>
</div>


<div class="alert alert-info text-center text-danger">
  <p>Add your products and services, then update your contact info!</p>  
</div>

<div id="myserv">

<h3>My Services</h3>

<div class="container-fluid">
    <div class="row">
<?php

$username = $_SESSION['username'];
$useremail = $_SESSION['email'];

$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

$sql1 = "SELECT * FROM services WHERE useremail='$useremail' AND username='$username' ORDER BY RAND() LIMIT 20 ";
$result = $conn->query($sql1);

if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {
    	
echo "<div class=\"card w-30 border-info\" style=\"width: 18rem; col-4\">
<div class=\"card-body\">
<h3 class=\"font-weight-bold font-italic\">".$row["servname"]."</h3>

<p>Price: ".$row["currency"]." ".$row["price"]."<br>
Description: ".$row["description"]."<br>
Seller: ".$row["sellername"]."<br>
Email: ".$row["selleremail"]."<br>
Number: ".$row["sellernumber"]."<br>
City: ".$row["city"]."<br>
Country: ".$row["country"]."</p>

<div class=\"container-fluid card-footer text-center\">

    <form method=\"POST\" action=\"sellerprofile.php\">
        
    <input type=\"hidden\" class=\"form-control\" id=\"username\" name=\"username\" value=\"".$row["sellername"]."\">
    <input type=\"hidden\" class=\"form-control\" id=\"email\" name=\"email\" value=\"".$row["selleremail"]."\">
    <button type=\"submit\" class=\"btn btn-dark\" name=\"sellerprofile\" id=\"sellerprofile\">".$row["sellername"]."</button>
        
    </form>
</div>

</div>
</div>";

    }

  }

?>

</div>
</div>

<br>
<div id="editservices" class="container-fluid">
    
<!--form for editing services-->
<form method="POST">


<div class="input-group mb-3">
    <div class="input-group-append">
    <label class="input-group-text" for="inputGroupSelect02">Service to be edited :</label>
  </div>
  <select class="custom-select" id="inputGroupSelect02" name="inputGroupSelect02">
    
    <?php
    $username = $_SESSION['username'];
$useremail = $_SESSION['email'];

$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

$sql1 = "SELECT * FROM services WHERE useremail='$useremail' AND username='$username' ORDER BY RAND() LIMIT 20 ";
$result = $conn->query($sql1);

if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {
    	
echo "<option selected value=\"".$row["servname"]."\">".$row["servname"]."</option>";

    }

  }

?>
    
    
  </select>
 
</div>

<div class="form-group">

  <label for="servname">Name</label>
  <input type="text" class="form-control" id="servname" name="servname" >

</div>

<div class="form-group">

  <label for="servprice">Price</label>
  <input type="number" class="form-control" id="servprice" name="servprice" step="0.01" min="0">

</div>

<div class="form-group">

  <label for="currency">Currency</label>
  <input type="text" class="form-control" id="currency" name="currency">

</div>

<div class="form-group">

  <label for="servedescr">Description</label>
  <textarea class="form-control" id="servdescr" name="servdescr" size="20"></textarea>

</div>

<button type="submit" class="btn btn-primary mb-3" name="edit" id="edit">Update Service</button>

</form>
    
</div>

</div>

<hr>

<div id="myprods">
    
<h3>My Products</h3>

<div class="container-fluid">
    <div class="row">
<?php

$username = $_SESSION['username'];
$useremail = $_SESSION['email'];

//Select each product from the database
$sql = "SELECT * FROM products WHERE email='$useremail' AND user='$username' ";
$result = $conn->query($sql);


if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {


echo "<div class=\"card w-30 border-info\" style=\"width: 18rem; col-4\">

<img class=\"card-img-top\" src=".$row["prodlink"]." width='100px'></img>

<div class=\"card-body\">
<h3 class=\"card-title font-weight-bold font-italic\">".$row["prodname"]."</h3>
<h5>Price: ".$row["currency"]." ".$row["prodprice"]."</h5>
<p>Seller: ".$row["sellername"]."</p>
<p>Email: ".$row["selleremail"]."</p>
<p>Seller Number: ".$row["sellernumber"]."</p>
<p>City: ".$row["city"]."</p>
<p>Country: ".$row["country"]."</p>

<div class=\"container-fluid card-footer text-center\">

    <form method=\"POST\" action=\"sellerprofile.php\">
        
    <input type=\"hidden\" class=\"form-control\" id=\"username\" name=\"username\" value=\"".$row["sellername"]."\">
    <input type=\"hidden\" class=\"form-control\" id=\"email\" name=\"email\" value=\"".$row["selleremail"]."\">
    <button type=\"submit\" class=\"btn btn-dark\" name=\"sellerprofile\" id=\"sellerprofile\">".$row["sellername"]."</button>
        
    </form>
</div>

</div>

</div>";

    }


  }

?>
</div>
</div>

<br>

<!--edit products-->
<div id="editproducts" class="container-fluid">
    
<!--form for editing products-->
<form method="POST" action="productedit.php" enctype="multipart/form-data">


<div class="input-group mb-3">
    <div class="input-group-append">
    <label class="input-group-text" for="inputGroupSelect02">Product to be edited :</label>
  </div>
  <select class="custom-select" id="inputGroupSelect02" name="inputGroupSelect02">
    
    <?php
    $username = $_SESSION['username'];
$useremail = $_SESSION['email'];

$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

$sql1 = "SELECT * FROM products WHERE email='$useremail' AND user='$username' ";
$result = $conn->query($sql1);

if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {
    	
echo "<option selected value=\"".$row["prodname"]."\">".$row["prodname"]."</option>";

    }

  }

?>
    
    
  </select>
 
</div>

<div class="form-group">

  <label for="prodname">Product Name</label>
  <input type="text" class="form-control" id="prodname" name="prodname" >

</div>

<div class="form-group">

  <label for="prodprice">Product Price</label>
  <input type="number" class="form-control" id="prodprice" name="prodprice" step="0.01" min="0">

</div>

<div class="form-group">

  <label for="currency">Currency</label>
  <input type="text" class="form-control" id="currency" name="currency" >

</div>

<!--
<div class="form-group">

  <label for="prodpic">Image</label>
  <input type="file" class="form-control" id="prodpic" name="prodpic">

</div>
-->



<button type="submit" class="btn btn-primary" name="edit" id="edit">Update Product</button>

</form>
    
</div>
    
</div>

<hr>

<div id="deleteacc" class="container-fluid">
    
<p class="text-center font-weight-bold">If you click "Delete Account", all your products, sevices & contact info will also be deleted</p>
    
    <form method="POST" action="/deleteacc.php">
        
        <button type="submit" class="btn btn-primary" name="deleteacc" id="deleteacc">Delete Account</button>
        
    </form>
    
</div>

<br>

</body>