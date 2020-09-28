<?php

session_start();

$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

$username = "";
$useremail = "";
$servname = "";
$servprice = "";
$currency = "";
$servdescr = "";


if ( isset($_POST["addserv"]) ) {

	$servname = $_POST["servname"];
	$servprice = $_POST["servprice"];
	$currency = $_POST["currency"];
	$servdescr = $_POST["servdescr"];
	$username = $_SESSION['username'];
	$useremail = $_SESSION['email'];
	

$sql = "INSERT INTO services (useremail, username, servname, price, currency, description)
        VALUES ('$useremail', '$username', '$servname', '$servprice', '$currency', '$servdescr')";
        
        if ($conn->query($sql) === TRUE) {
    echo "Service Added"."<br>";
    echo "<a href=\"index.php\">Home</a>"."<br>";
    echo "<a href=\"addserv.php\">Add Service</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>