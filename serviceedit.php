<?php

$username = $_SESSION['username'];
$useremail = $_SESSION['email'];

$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");


$ogname = "";
$servname = "";
$servprice = "";
$currency = "";
$servdescr = "";


if ( isset($_POST["edit"]) ) {

	$ogname = $_POST["inputGroupSelect02"];
	$servname = $_POST["servname"];
	$servprice = $_POST["servprice"];
	$currency = $_POST["currency"];
	$servdescr = $_POST["servdescr"];
	

}

if ($servname == "") {


}else { $sql = "UPDATE services SET servname='$servname' WHERE useremail='$useremail' AND servname='$ogname'";
	//$conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
    echo "Service Name updated"."<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


if ($servprice == "") {


}else { $sql = "UPDATE services SET price='$servprice' WHERE username='$username' AND useremail='$useremail' AND servname='$ogname' ";
	$conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
    echo "Price updated"."<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


if ($currency == "") {


}else { $sql = "UPDATE services SET currency='$currency' WHERE username='$username' AND useremail='$useremail' AND servname='$ogname' ";
	$conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
    echo "Currency updated"."<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


if ($servdescr == "") {


}else { $sql = "UPDATE services SET description='$servdescr' WHERE username='$username' AND useremail='$useremail' AND servname='$ogname' ";
	$conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
    echo "Description updated"."<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>