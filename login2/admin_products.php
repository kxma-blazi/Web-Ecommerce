<?php
$conn = new mysqli("localhost", "root", "", "auth");

// เพิ่มสินค้า
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $desc = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image_url"];
    $conn->query("INSERT INTO products (name, description, price, image_url) VALUES ('$name', '$desc', '$price', '$image')");
    header("Location: admin_products.php");
}

// ลบสินค้า
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: admin_products.php");
}

$products = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="mb-4">Add New Tattoo Product</h2>
        <form method="POST" class="mb-5">
            <input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>
            <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
            <input type="number" name="price" class="form-control mb-2" step="0.01" placeholder="Price" required>
            <input type="url" name="image_url" class="form-control mb-2" placeholder="Image URL">
            <button type="submit" class="btn btn-success">Add Product</button>
        </form>

        <h2 class="mb-4">All Tattoo Products</h2>
        <table class="table table-bordered text-white">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $products->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td>$<?= $row['price'] ?></td>
                    <td><img src="<?= htmlspecialchars($row['image_url']) ?>" width="60"></td>
                    <td><a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>