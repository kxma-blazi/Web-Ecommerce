<?php
$conn = new mysqli("localhost", "root", "", "auth");
$products = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tattoo Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Tattoo Designs</h2>
        <div class="row">
            <?php while ($row = $products->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-secondary text-white">
                        <img src="<?= htmlspecialchars($row['image_url']) ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                            <p><strong>$<?= $row['price'] ?></strong></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>