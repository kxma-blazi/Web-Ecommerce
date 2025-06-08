<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <title>Tattoo Shop</title>
       <link rel="stylesheet" href="assets/css/style.css">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

       <div class="container py-5">
              <h2 class="text-center mb-4">Tattoo Catalog</h2>
              <div class="row">
                     <?php
      $stmt = $pdo->query("SELECT * FROM tattoos");
      while ($row = $stmt->fetch()):
    ?>
                     <div class="col-md-3 mb-4">
                            <div class="card h-100 text-center border-0 shadow-sm">
                                   <img src="assets/imgs/<?= htmlspecialchars($row['image']) ?>"
                                          class="card-img-top img-fluid" alt="<?= htmlspecialchars($row['name']) ?>">
                                   <div class="card-body">
                                          <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                                          <p class="text-muted fw-bold"><?= number_format($row['price'], 2) ?> ฿</p>
                                          <button class="btn btn-dark w-100">BUY NOW</button>
                                   </div>
                            </div>
                     </div>
                     <?php endwhile; ?>
              </div>
       </div>

</body>

</html>