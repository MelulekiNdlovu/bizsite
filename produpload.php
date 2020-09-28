<?php

session_start();
require 'connection.php';


//Product upload workflow
if (file_exists('prodimages/'.$_SESSION["email"]) ) {

    echo "File exists"."<br>";

} else {

    mkdir('prodimages/'.$_SESSION["email"]);

}

  $target_dir = 'prodimages/'.$_SESSION["email"].'/';
$target_file = str_split( $target_dir.basename($_FILES["prodpic"]["name"]) );
$target_file2 = str_ireplace( " ","spc",$target_dir.basename($_FILES["prodpic"]["name"]) );
//$target_file3 = implode($target_file2);
$uploadOk = 1;
$imageFileType = pathinfo($target_file2,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["addprod"])) {
    $check = getimagesize($_FILES["prodpic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . "."."<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

//check if session is set
if ($_SESSION["email"]=="" OR $_SESSION['username']=="") {
    $uploadOk = 0;
    echo"You are not logged In"."<br>";
} else {
    $uploadOk = 1;
}

/* Check if file already exists
if (file_exists($target_file2)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
*/

 // Check file size
if ($_FILES["prodpic"]["size"] > 500000) {
    echo "Image must be smaller than 500kb";
    $uploadOk = 0;
 }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["prodpic"]["tmp_name"], $target_file2)) {
        echo "The file ". basename( $_FILES["prodpic"]["name"]). " has been uploaded"."<br>";

        $prodname = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["prodname"]) );
	$prodprice = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["prodprice"]) );
	$currency = mysqli_real_escape_string( $conn,htmlspecialchars($_POST["currency"]) );
	$email = mysqli_real_escape_string( $conn,htmlspecialchars($_SESSION['email']) );
	$user = $_SESSION['username'];
	$prodlink = mysqli_real_escape_string( $conn,htmlspecialchars($target_file2) );


	$sql = "INSERT INTO products (prodname, prodprice, currency, email, user, prodlink)
        VALUES ('$prodname', '$prodprice','$currency', '$email', '$user', '$prodlink')";
        $conn->query($sql);
        
        $_SESSION["prodname"] = $prodname;
        $prodname = $_SESSION["prodname"];
        
        $successmsg = "Product Added Successfully";
        
	echo '<a href="addprods.php" class="btn btn-outline-primary m-1">Add Product</a>';
	echo '<a href="index.php" class="btn btn-outline-primary m-1">Home</a>';
	
	
	


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>