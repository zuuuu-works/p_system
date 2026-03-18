<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Product List</h2>

<a href="add.php" class="btn btn-add">+ Add Product</a>

<?php
$query = "SELECT products.*, product_types.type_name, brands.brand_name
          FROM products
          JOIN product_types ON products.product_type_id = product_types.id
          JOIN brands ON products.brand_id = brands.id";

$result = mysqli_query($conn, $query);
?>

<table>
<tr>
    <th>ID</th>
    <th>Type</th>
    <th>Brand</th>
    <th>Name</th>
    <th>Description</th>
    <th>Picture</th>
    <th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['type_name']; ?></td>
    <td><?= $row['brand_name']; ?></td>
    <td><?= $row['product_name']; ?></td>
    <td><?= $row['description']; ?></td>

    <td>
    <?php if($row['picture']){ ?>
        <img src="uploads/<?= $row['picture']; ?>" width="80">
    <?php } ?>
    </td>

    <td>
        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-edit">Edit</a>
        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-delete">Delete</a>
    </td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>