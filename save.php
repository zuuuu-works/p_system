<?php
include "config.php";

$type = $_POST['product_type_id'];
$brand = $_POST['brand_id'];
$name = $_POST['product_name'];
$desc = $_POST['description'];

$image = $_FILES['picture']['name'];

if($image){
    move_uploaded_file($_FILES['picture']['tmp_name'], "uploads/".$image);
}

$sql = "INSERT INTO products(product_type_id,brand_id,product_name,description,picture)
        VALUES('$type','$brand','$name','$desc','$image')";

mysqli_query($conn,$sql);

header("Location: index.php");
?>