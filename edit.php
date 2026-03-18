<?php include "config.php"; 

$id = $_GET['id'];
$res = mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Product</h2>

<form action="update.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $row['id']; ?>">
<input type="hidden" name="old_image" value="<?= $row['picture']; ?>">

<input type="text" name="product_name" value="<?= $row['product_name']; ?>">

<textarea name="description"><?= $row['description']; ?></textarea>

<?php if($row['picture']){ ?>
    <img src="uploads/<?= $row['picture']; ?>" width="100"><br><br>
<?php } ?>

<input type="file" name="picture">

<button type="submit">Update</button>

</form>

</body>
</html>