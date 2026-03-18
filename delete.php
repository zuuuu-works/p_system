<?php
include "config.php";

$id = $_GET['id'];

$res = mysqli_query($conn,"SELECT picture FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if($row['picture']){
    unlink("uploads/".$row['picture']);
}

mysqli_query($conn,"DELETE FROM products WHERE id=$id");

header("Location: index.php");
?>