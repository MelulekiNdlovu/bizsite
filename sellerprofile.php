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
    
<title>Profile</title>
</head>

<body>

<?php

$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

if (isset($_POST["sellerprofile"]) ) {
    
	 $username = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["username"]) );
    $email = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["email"]) );
	
echo "<div class=\"container-fluid\">
<h2 class=\"text-center alert alert-primary\">Seller Profile</h2><br>
<div class=\"row\">";

$sql1 = "SELECT * FROM contactinfo WHERE email='$email' AND name='$username' ";
$result = $conn->query($sql1);

if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {
    	
echo "<div class=\"card w-30 border-info\" style=\"width: 18rem; col-4\">
<div class=\"card-body\">
<h5 class=\"font-weight-bold font-italic\">".$row["name"]."</h5>
Email: ".$row["email"]."<br>
Number: ".$row["number"]."<br>
City: ".$row["city"]."<br>
Country: ".$row["country"]."</p>
</div>
</div>";

    }

  }


echo "</div>
</div>	
<br><hr><br>";
	
	
echo "<div class=\"container-fluid\">
<h3 class=\"text-center\">SERVICES</h3>
<div class=\"row\">
<br>";

$sql1 = "SELECT * FROM services WHERE selleremail='$email' AND sellername='$username' ";
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
</div>
</div>";

    }

  }


echo "</div>
</div>
<br><hr><br>";

echo "<div class=\"container-fluid\">
    <h3 class=\"text-center\">PRODUCTS</h3>
    <div class=\"row\">
    <br>";

//Select each product from the database
$sql = "SELECT * FROM products WHERE selleremail='$email' AND sellername='$username' ";
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
</div>

</div>";

    }


  }

echo "</div>
</div>";
	
}

?>

</body>
</html>