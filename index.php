<?php

session_start();
require 'logout.php';

?>

<!DOCTYPE html>

<html>

<head>
    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129106910-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129106910-1');
</script>

    
<title>Home</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 


<link rel="stylesheet" type="text/css" href="prodlist.css">

</head>

<body>
    
<div class="alert alert-warning alert-dismissible fade show" role="alert" hidden>
  This site uses cookies & google analytics. Click <a href="privacypolicy.php">here</a> to view the privacy policy!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div id="login_div" class="m-3">

<?php require 'loginlinks.php'; ?>
<?php if (isset($_SESSION['username']) ) {echo '<a href="dashboard.php" class="btn btn-outline-primary">Dashboard</a>';
} 
?>

</div>


<div id="adminlinks" class="d-flex flex-row">

<?php if (isset($_SESSION['username']) ) {
echo '<a href="addprods.php" class="m-1 btn btn-outline-primary">Add Product</a>';
echo '<a href="addserv.php" class="m-1 btn btn-outline-primary">Add Service</a>';
echo '<a href="contactinfo.php" class="m-1 btn btn-outline-primary">Contact Info</a>';

} 
?>

</div>


<!--Search form-->
<div id="search">

<form action="search.php" class="form-inline" method="POST">

<div class="form-group mb-3">

  <input placeholder="Find" type="text" class="form-control" id="searchquery" name="searchquery" required>

</div>

<div class="input-group mb-3">
    <div class="input-group-append">
    <label class="input-group-text" for="inputGroupSelect02">Search In :</label>
  </div>
  <select class="custom-select" id="inputGroupSelect02" name="inputGroupSelect02">
    <option selected value="Products">Products</option>
    <option value="Services">Services</option>
  </select>
 
</div>

<button type="submit" class="btn btn-primary mb-3" name="search" id="search">Search</button>

</form>

</div>

<br>

<div class="bg-light">
<div id="4genbiz_advert" style="text-align:center;">
    <h2>Advertise your Products & Services on 4genBiz</h2>
    <p>Reach out to more customers by registering on 4genBiz. Once registered,<br> 
    upload your products, services & contact Information.<br>
    Enjoy free marketing on 4genBiz!</p>
</div>

<div id="4genbiz_advert" style="text-align:center;">
    <h2>Find products & services</h2>
    <p>Make 4genBiz your go-to place to find products and services.<br>
    </p>
</div>
</div>

<div id="quickaddiv">
  <p>
    You can still add products without registering<br>
    Click the link below to add products without registration!<br>
    <a href="quickad.php" class="btn btn-primary">Quick Ads</a>
  </p>
</div>

<div id="prodview" class="container-fluid">
<h2 class="text-center">Products</h2>
<div class="row">
<!--<ul style="list-style-type:none" class="prods">-->
<?php require 'prodview.php'; ?>
</div>

</div>


<!--<div id="testdiv" class="container-fluid">
<h1>TEST AREA</h1>
<div class="row">
    <?php //require 'prodview3.php'; ?>
</div>
</div>-->

<hr>

<div id="servicessection" class="container-fluid">
<h2 class="text-center">Services</h2>
    <div class="row">
<?php


$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

$sql1 = "SELECT * FROM services  ORDER BY RAND() LIMIT 20 ";
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

</body>

</html>