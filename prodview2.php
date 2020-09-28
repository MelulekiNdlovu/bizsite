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
<p>Seller: ".$row["sellername"]."</p>
<p>Email: ".$row["selleremail"]."</p>
<p>Seller Number: ".$row["sellernumber"]."</p>
</div>

</div>";

    }


  }

?>