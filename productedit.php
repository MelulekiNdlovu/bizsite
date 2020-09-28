<?php

session_start();
require 'connection.php';

//$username = $_SESSION['username'];
//$useremail = $_SESSION['email'];

echo "<a href=\"index.php\" class=\"btn btn-outline-primary m-1\">Home</a>
<a href=\"addprods.php\" class=\"btn btn-outline-primary m-1\">Add Product</a>
<a href=\"dashboard.php\" class=\"btn btn-outline-primary m-1\">Dashboard</a>";

echo "<br>";
	
if (isset($_POST["edit"]) ) {

    $ogname = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["inputGroupSelect02"]) );
    $prodname = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["prodname"]) );
	$prodprice = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["prodprice"]) );
	$currency = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["currency"]) );
	$email = mysqli_real_escape_string( $conn,htmlspecialchars($_SESSION['email']) );
	$user = $_SESSION['username'];

}

//product name update
if ($prodname == "") {


}else { $sql = "UPDATE products SET prodname='$prodname' WHERE email='$email' AND prodname='$ogname'";
	//$conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
    echo "Product Name updated"."<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


//product price update
if ($prodprice == "") {


}else { $sql = "UPDATE products SET prodprice='$prodprice' WHERE email='$email' AND prodname='$ogname'";
	//$conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
    echo "Price updated"."<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


//currency update
if ($currency == "") {


}else { $sql = "UPDATE products SET currency='$currency' WHERE email='$email' AND prodname='$ogname'";
	//$conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
    echo "Currency updated"."<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}



?>