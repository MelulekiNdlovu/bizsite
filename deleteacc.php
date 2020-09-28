<?php

session_start();

$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");

if (isset($_POST["deleteacc"]) ) {
    
    $username = $_SESSION['username'];
	$useremail = $_SESSION['email'];
	
	//Delete each product from the database
$sql = "DELETE FROM products WHERE email='$useremail' AND user='$username' ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Products deleted!"."<br>";
} else {
    echo "Error deleting products: " . $conn->error."<br>";
}

    //Delete each service from the database
$sql = "DELETE FROM services WHERE useremail='$useremail' AND username='$username' ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Services deleted successfully"."<br>";
} else {
    echo "Error deleting services: " . $conn->error."<br>";
}

    //Delete each service from the database
$sql = "DELETE FROM contactinfo WHERE useremail='$useremail' AND username='$username' ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Contact Information deleted successfully"."<br>";
} else {
    echo "Error deleting contact info: " . $conn->error."<br>";
}

    //Delete each service from the database
$sql = "DELETE FROM users WHERE email='$useremail' AND username='$username' ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    session_destroy();
    echo "Account deleted successfully"."<br>";
    echo "<a href=\"index.php\" class=\"btn btn-primary\">Home</a>";
} else {
    echo "Error deleting Account: " . $conn->error."<br>";
}

	
	/*echo $username."<br>";
    echo $useremail."<br>";
    echo "YEAH!!!";*/
    
} else {
    echo "";
}

?>