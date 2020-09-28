<?php

require 'connection.php';

//Select each product from the database
$sql = "SELECT * FROM products ORDER BY RAND() LIMIT 20 ";
$result = $conn->query($sql);


if ($result -> num_rows > 0) {
    
    while ($row = $result->fetch_assoc() ) {


echo "<div class=\"d-inline-flex\">

<img class=\"fixed-top\" src=".$row["prodlink"]." width='100px'></img>

<h3 class=\"card-title\">".$row["prodname"]."</h3>
<h5>Price: $ ".$row["prodprice"]."</h5>
<p>Seller: ".$row["sellername"]."</p>
<p>Email: ".$row["selleremail"]."</p>
<p>City: ".$row["city"]."</p>
<p>Country: ".$row["country"]."</p>

</div>";

    }


  }

?>