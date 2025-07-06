<?php
include './../sql/db.php';

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('Location: login.php');
    exit;
}
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    $stmt = $db->prepare("SELECT image FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    if ($product) {
        $imagePath = __DIR__ . "/../uploads/" . $product['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $stmt = $db->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: products.php?deleted=1");
        exit;
    }
}
$ps = $db->query("SELECT * FROM products order by id desc")->fetchAll();

include './../include/header.php';
include './../menu/nav.php';
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Products</h2>
        <a href="upload_product.php" class="btn btn-success">Add Product</a>
    </div>

    <div class="table-responsive">

        <?php if (isset($_GET['deleted'])): ?>
            <div class="alert alert-success">Product deleted successfully.</div>
        <?php endif; ?>

        <table class="table table-bordered table-hover bg-white">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price (&#8369;)</th>
                <th style="width: 121px;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ps as $key => $p): ?>
                <tr>
                    <td><? echo $key + 1 ?></td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><?= number_format($p['price'], 2) ?></td>
                    <td class="d-flex gap-1">
                        <a href="products.php?delete=<?= $p['id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this product?');">
                            Delete
                        </a>
<!--                        <a href="edit_product.php?id=--><?//= $p['id'] ?><!--" class="btn btn-secondary btn-sm">Edit</a>-->
                        <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php include './../include/footer-script.php'; ?>
<?php include './../include/footer.php'; ?>