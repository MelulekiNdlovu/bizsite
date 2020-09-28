<?php

session_start();
require 'connection.php';
require 'loginproc.php';

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

    
<title>Login</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

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

<div id="login_div">


<!--Login Form-->
<form class="form-group" method="POST">

<div class="form-group">

  <label for="email">Email</label>
  <input type="email" class="form-control" id="email" name="email" required>

</div>

<div class="form-group">

  <label for="pwd1">Password</label>
  <input type="password" class="form-control" id="pwd1" name="pwd1" required>

</div>

<button type="submit" class="btn btn-primary" name="login" id="login">Login</button>

</form>

</div>

</body>

</html>