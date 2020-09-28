<?php

//User registration code
if ( isset($_POST["login"]) )  {

    $email = $_POST["email"];
    $pwd1 = md5 ($_POST["pwd1"]);


//Checking if the user exists exists
$sql = "SELECT * FROM users WHERE email = '$email' && password = '$pwd1' ";
$result = $conn->query($sql);

if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $row["username"];

    header("Location: index.php");

    }


  } else {
        echo "Login Failed"."<br>"."Email or Password is incorrect!";
        
  }


}

?>