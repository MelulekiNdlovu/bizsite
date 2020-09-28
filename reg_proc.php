<?php

session_start();
require 'connection.php';

$username = "";
$email = "";
$pwd1 = "";
$pwd11 = "";
$pwd2 = "";
$regerr = "";
$successmsg = "";
$mailchecker = "";

//User registration code
if ( isset($_POST["register"]) )  {

    $username = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["username"]) );
    $email = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["email"]) );
    $pwd1 = mysqli_real_escape_string( $conn,htmlspecialchars(md5 ($_POST["pwd1"]) ) );
    $pwd11 = $_POST["pwd1"];
    //$pwd2 = mysqli_real_escape_string( $conn,htmlspecialchars(md5 ($_POST["pwd2"]) ) );


//Checking if the email exists
$sql = "SELECT email FROM users WHERE email = '$email' ";
$result = $conn->query($sql);

if ($result -> num_rows > 0) {
    
    while($row = $result->fetch_assoc() ) {
        $regerr = "Email already exists. Please use a different email";
        echo $regerr;
    }

} else {
        $sql2 = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$pwd1')";
        $conn->query($sql2);
        $successmsg = "Registered Successfully";

	//inserting into contactinfo
	$sql3 = "INSERT INTO contactinfo (username, useremail)
        VALUES ('$username', '$email')";
        $conn->query($sql3);

	$_SESSION['email'] = $email;
	$_SESSION['username'] = $username;
	
	echo "Email: "."$email"."<br>";
	echo "Password: "."$pwd11"."<br>";
	echo "<a href="."index.php".">Home</a>";
        
}


}

?>