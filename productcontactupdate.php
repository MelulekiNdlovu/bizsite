<?php

session_start();

$email = $_SESSION['email'];

$q = "SELECT * FROM contactinfo WHERE useremail = '$email' ";
    $res = mysqli_query($conn,$q);

if ($res -> num_rows > 0) {
    
    while ($r = $res->fetch_assoc() ) {

$sellername = $r["name"];
$selleremail = $r["email"];
$sellernumber = $r["number"];
$city = $r["city"];
$country = $r["country"];

$in = "UPDATE products SET name='$sellername', selleremail='$selleremail', number='$sellernumber',  city='$city', country='$country' WHERE prodname='$prodname' ";
    mysqli_query($conn,$in);


echo $city." ".$country;

        }
    
    }


?>