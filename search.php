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

    
<title>Search</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="prodlist.css">

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 

</head>

<body>


<div id="navlinks">

<a href="index.php" class="btn btn-outline-primary">Home</a>

</div>

<div id="search">

<form action="search.php" class="form-inline" method="POST">

<div class="form-group mb-3">

  <label for="searchquery">Find</label>
  <input type="text" class="form-control" id="searchquery" name="searchquery" required>

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

<button type="submit" class="btn btn-default mb-3" name="search" id="search">Search</button>

</form>

</div>


<div id="prodview" class="container-fluid">
<h2>Products</h2>
<div class="row">

<?php

//Database connection code
$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

if ( isset($_POST["search"]) && /*$_POST["searchquery"]!= ""*/ $_POST["inputGroupSelect02"]=="Products") {

	$query = htmlspecialchars($_POST["searchquery"]);
	$query2 = mysqli_real_escape_string($conn,$query);

	$sql = "SELECT * FROM products WHERE prodname LIKE '%$query2%' ";
	$result = $conn->query($sql);

	if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {
    	
	echo "<div class=\"card w-30 border-info\" style=\"width: 18rem; col-4\">

<img class=\"card-img-top\" src=".$row["prodlink"]." width='100px'></img>

<div class=\"card-body\">
<h3 class=\"card-title font-weight-bold font-italic\">".$row["prodname"]."</h3>
<h5>Price: $ ".$row["prodprice"]."</h5>
<p>Seller: ".$row["sellername"]."</p>
<p>Email: ".$row["selleremail"]."</p>
<p>Seller Number: ".$row["sellernumber"]."</p>
</div>

</div>";

    }

  }

} else {echo "";}

?>

</div>
</div>

<hr>

<div id="serviceview" class="container-fluid">
<h2>Services</h2>
    <div class="row">
    
<?php

//Database connection code
$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

if ( isset($_POST["search"]) && $_POST["searchquery"]!= "" && $_POST["inputGroupSelect02"]=="Services") {

	$query = htmlspecialchars($_POST["searchquery"]);
	$query2 = mysqli_real_escape_string($conn,$query);

	$sql = "SELECT * FROM services WHERE servname LIKE '%$query2%' ";
	$result = $conn->query($sql);

	if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {
    	
	echo "<div class=\"card w-30 border-info\" style=\"width: 18rem; col-4\">

<div class=\"card-body\">
<h3 class=\"card-title font-weight-bold font-italic\">".$row["servname"]."</h3>
<h5>Price: ".$row["currency"]." ".$row["price"]."</h5>
<p>Description: ".$row["description"]."<br>
Seller: ".$row["sellername"]."<br>
Email: ".$row["selleremail"]."<br>
Seller Number: ".$row["sellernumber"]."</p>
</div>

</div>";

    }

  }

} else {echo "";}

?>
  </div>  
</div>

</body>

</html>