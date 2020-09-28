<?php
session_start();

//check if session is set
if ($_SESSION["email"]=="" OR $_SESSION['username']=="") {
    $uploadOk = 0;
    exit("You are not logged In");
    
} else {
    $uploadOk = 1;
}

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
    
<title>Services</title>
</head>

<body>

<div id="adminlinks">
<a href="index.php" class="btn btn-outline-primary">Home</a>
<a href="addprods.php" class="btn btn-outline-primary">Add Product</a>
<a href="contactinfo.php" class="btn btn-outline-primary">Contact Info</a>
<a href="dashboard.php" class="btn btn-outline-primary">Dashboard</a>
</div>

<br>

<p class="alert alert-info text-center">
    Do not post any illegal items. They WILL be removed!
</p>

<div id="servuploadform">

<form method="POST" action="serveupload.php">

<div class="form-group">

  <label for="servname">Name</label>
  <input type="text" class="form-control" id="servname" name="servname" required>

</div>

<div class="form-group">

  <label for="servprice">Price</label>
  <input type="number" class="form-control" id="servprice" name="servprice" step="0.01" min="0">

</div>

<div class="form-group">

  <label for="currency">Currency</label>
  <input type="text" class="form-control" id="currency" name="currency" required>

</div>

<div class="form-group">

  <label for="servedescr">Description</label>
  <textarea class="form-control" id="servdescr" name="servdescr" size="20"></textarea>

</div>

<button type="submit" class="btn btn-primary" name="addserv" id="addserv">Add Service</button>

</form>

</div>


</body>