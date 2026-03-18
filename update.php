<?php
include "config.php";

$id = $_POST['id'];
$name = $_POST['product_name'];
$desc = $_POST['description'];
$old = $_POST['old_image'];

$image = $_FILES['picture']['name'];

if($image){

    move_uploaded_file($_FILES['picture']['tmp_name'], "uploads/".$image);

    if($old){
        unlink("uploads/".$old);
    }

    $sql = "UPDATE products 
            SET product_name='$name',
                description='$desc',
                picture='$image'
            WHERE id=$id";

}else{

    $sql = "UPDATE products 
            SET product_name='$name',
                description='$desc'
            WHERE id=$id";
}

mysqli_query($conn,$sql);

header("Location: index.php");
?>