<?php

require 'connection.php';

//Select each product from the database
$sql = "SELECT * FROM products ORDER BY RAND() LIMIT 20 ";
$result = $conn->query($sql);


if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {


echo "<div class=\"card w-30 border-info\" style=\"width: 18rem; col-4\">

<img class=\"card-img-top\" src=".$row["prodlink"]." width='100px'></img>

<div class=\"card-body\">
<h3 class=\"card-title font-weight-bold font-italic\">".$row["prodname"]."</h3>

<h5>Price: ".$row["currency"]." ".$row["prodprice"]."</h5>

<p>Email: ".$row["selleremail"]."</p>
<p>Seller Number: ".$row["sellernumber"]."</p>

<div class=\"container-fluid card-footer text-center\">

    <form method=\"POST\" action=\"sellerprofile.php\">
        
    <input type=\"hidden\" class=\"form-control\" id=\"username\" name=\"username\" value=\"".$row["sellername"]."\">
    <input type=\"hidden\" class=\"form-control\" id=\"email\" name=\"email\" value=\"".$row["selleremail"]."\">
    <button type=\"submit\" class=\"btn btn-dark\" name=\"sellerprofile\" id=\"sellerprofile\">".$row["sellername"]."</button>
        
    </form>
</div>

</div>

</div>";

    }


  }

?>