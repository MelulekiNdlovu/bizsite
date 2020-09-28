<?php


$name = "";
$email = "";
$number = "";
$city = "";
$country = "";
$username = "";
$useremail = "";
$conn = new mysqli ("localhost", "id7239312_lista", "4genbiz", "id7239312_lista");


if ( isset($_POST["contactupdate"]) )  {

	$name = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["name"]) );
	$email = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["email"]) );
	$number = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["number"]) );
	$city = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["city"]) );
	$country = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["country"]) );
	$username = mysqli_real_escape_string( $conn,htmlspecialchars($_SESSION['username']) );
	$useremail = mysqli_real_escape_string( $conn,htmlspecialchars($_SESSION['email']) );

}

if ($name == "") {


}else { $sql = "UPDATE contactinfo SET name='$name' WHERE username='$username' AND useremail='$useremail' ";
	$conn->query($sql);
	echo "Name has been updated"."<br>";

	$sql = "UPDATE products SET sellername='$name' WHERE user='$username' ";
	$conn->query($sql);
	
	$sql = "UPDATE services SET sellername='$name' WHERE username='$username' ";
	$conn->query($sql);

}



if ($email == "") {


}else { $sql1 = "UPDATE contactinfo SET email='$email' WHERE username='$username' AND useremail='$useremail' ";
	$conn->query($sql1);
	echo "Email has been updated"."<br>";

	$sql1 = "UPDATE products SET selleremail='$email' WHERE user='$username' ";
	$conn->query($sql1);
	
	$sql1 = "UPDATE services SET selleremail='$email' WHERE useremail='$useremail' ";
	$conn->query($sql1);

}


if ($number == "") {


}else {$sql2 = "UPDATE contactinfo SET number='$number' WHERE username='$username' AND useremail='$useremail' ";
	$conn->query($sql2);

	$sql20 = "UPDATE products SET sellernumber='$number' WHERE email='$useremail' ";
	$conn->query($sql20);
	
	$sql21 = "UPDATE services SET sellernumber='$number' WHERE useremail='$useremail' ";
	$conn->query($sql21);
	echo "Number has been updated"."<br>";

}


if ($city == "") {


}else { $sql3 = "UPDATE contactinfo SET city='$city' WHERE username='$username' AND useremail='$useremail' ";
	$conn->query($sql3);
	echo "City has been updated"."<br>";

	$sql3 = "UPDATE products SET city='$city' WHERE user='$username' ";
	$conn->query($sql3);
	
	$sql1 = "UPDATE services SET city='$city' WHERE useremail='$useremail' ";
	$conn->query($sql1);

}


if ($country == "") {


}else { $sql4 = "UPDATE contactinfo SET country='$country' WHERE username='$username' AND useremail='$useremail' ";
	$conn->query($sql4);
	echo "Country has been updated"."<br>";

	$sql4 = "UPDATE products SET country='$country' WHERE user='$username' ";
	$conn->query($sql4);
	
	$sql1 = "UPDATE services SET country='$country' WHERE useremail='$useremail' ";
	$conn->query($sql1);

}

?>