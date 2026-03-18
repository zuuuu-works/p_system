<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Product</h2>

<form action="save.php" method="POST" enctype="multipart/form-data">

<select name="product_type_id">
<?php
$types = mysqli_query($conn,"SELECT * FROM product_types");
while($t=mysqli_fetch_assoc($types)){
?>
<option value="<?= $t['id']; ?>"><?= $t['type_name']; ?></option>
<?php } ?>
</select>

<select name="brand_id">
<?php
$brands = mysqli_query($conn,"SELECT * FROM brands");
while($b=mysqli_fetch_assoc($brands)){
?>
<option value="<?= $b['id']; ?>"><?= $b['brand_name']; ?></option>
<?php } ?>
</select>

<input type="text" name="product_name" placeholder="Product Name">

<textarea name="description" placeholder="Description"></textarea>

<input type="file" name="picture">

<button type="submit">Save</button>

</form>

</body>
</html>