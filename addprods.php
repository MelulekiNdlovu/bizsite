<?php

session_start();
require 'connection.php';
require 'logout.php';
//require 'produpload.php';


?>

<!DOCTYPE html>

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
    Your product MUST have an image to show what you are selling.<br>
    Do not post any illegal items. They WILL be removed!
</p>

<br>

<div id="produploadform">

<form action="produpload.php" method="POST" enctype="multipart/form-data">

<div class="form-group">

  <label for="prodname">Product Name</label>
  <input type="text" class="form-control" id="prodname" name="prodname" required>

</div>

<div class="form-group">

  <label for="prodprice">Product Price</label>
  <input type="number" class="form-control" id="prodprice" name="prodprice" step="0.01" min="0">

</div>

<div class="form-group">

  <label for="currency">Currency</label>
  <input type="text" class="form-control" id="currency" name="currency" required>

</div>

<div class="form-group">

  <label for="prodpic">Image</label>
  <input type="file" class="form-control" id="prodpic" name="prodpic">

</div>

<button type="submit" class="btn btn-primary" name="addprod" id="addprod">Add Product</button>

</form>

</div>



<div id="myprods">
</div>

</body>