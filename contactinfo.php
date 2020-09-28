<?php

session_start();
require 'contactupdate.php';

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

    
<meta name="viewport" content="width=device-width, initial-scale=1">
    
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
    
<title>Contact Info</title>
</head>

<body>

<div id="adminlinks">
<a href="index.php" class="btn btn-outline-primary">Home</a>
<a href="addprods.php" class="btn btn-outline-primary">Add Product</a>
<a href="addserv.php" class="btn btn-outline-primary">Add Service</a>
<a href="dashboard.php" class="btn btn-outline-primary">Dashboard</a>
</div>

<br>

<p class="alert alert-info text-center">
    Add the contact information that people can use to contact you about your business!
</p>

<br>

<div id="contactinfoform">

<form method="POST" enctype="multipart/form-data">

<div class="form-group">

  <label for="name">Seller Name</label>
  <input type="text" class="form-control" id="name" name="name" >

</div>


<div class="form-group">

<label for="email">Email Address</label>
<input type="email" class="form-control" id="email" name="email" >

</div>


<div class="form-group">

  <label for="number">Phone/Cell</label>
  <input type="text" class="form-control" id="number" name="number" >

</div>


<div class="form-group">

  <label for="city">City</label>
  <input type="text" class="form-control" id="city" name="city" >

</div>


<div class="form-group">

  <label for="country">Country</label>
  <input type="text" class="form-control" id="country" name="country" >

</div>


<button type="submit" class="btn btn-primary" name="contactupdate" id="contactupdate">Update Contact Info</button>

</form>

</div>

<hr>

<!--
<div class="jumbotron" id="prodcontactupdate">
    <p>Click this Button to add your seller info to your products</p>
<form method="GET">
<button type="submit" class="btn btn-primary mx-auto" style="width: 200px; name="produpdate" id="produpdate">Add Seller Info</button>
</form>
</div>
-->

</body>

</html>