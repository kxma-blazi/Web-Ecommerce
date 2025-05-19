<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "auth");

// เพิ่ม Tattoo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO tattoos (name, price) VALUES ('$name', '$price')");
}

// ลบ Tattoo
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM tattoos WHERE id = $id");
}

// อัปเดต Tattoo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $conn->query("UPDATE tattoos SET name = '$name', price = '$price' WHERE id = $id");
}

$result = $conn->query("SELECT * FROM tattoos");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Tattoo Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="mb-4">Welcome, <?= $_SESSION['username'] ?> 👋</h2>

        <form method="POST" class="mb-4 d-flex gap-2">
            <input type="text" name="name" placeholder="Tattoo Name" required class="form-control w-25">
            <input type="number" step="0.01" name="price" placeholder="Price" required class="form-control w-25">
            <button type="submit" name="add" class="btn btn-success">Add</button>
        </form>

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price (฿)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <form method="POST">
                            <td><?= $row['id'] ?></td>
                            <td><input type="text" name="name" value="<?= $row['name'] ?>" required class="form-control"></td>
                            <td><input type="number" step="0.01" name="price" value="<?= $row['price'] ?>" required class="form-control"></td>
                            <td>
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="edit" class="btn btn-primary btn-sm">Update</button>
                                <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>

</html>