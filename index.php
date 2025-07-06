<?php
include './sql/db.php';
include './include/header.php';
include './menu/nav.php';
$featuredProducts = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 5")->fetchAll();
?>


<!-- Hero Section -->
<div class="hero" style="background-image: url('assets/doctor.jpg');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Welcome to My Pharmacy</h1>
        <p>Your Health is Our Priority!</p>
        <a href="shop.php" class="btn-shop">Shop Now</a>
    </div>
</div>

<<!-- Product Section -->
<section class="products-section">
    <div class="container">
        <h2 class="text-center mb-5">Featured Products</h2>
        <div class="row justify-content-center">
            <?php foreach ($featuredProducts as $product): ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card product-card shadow-sm">
                        <img src="./admin/uploads/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars(mb_strimwidth($product['description'], 0, 60, '...')) ?></p>
                            <p class="text-muted mb-2"><strong>&#8369;<?= number_format($product['price'], 2) ?></strong></p>
                            <a href="product_detail.php?id=<?= $product['id'] ?>" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Modal for Cart -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <?php if ($cart_count > 0): ?>
                        <!-- Dynamically display cart items here -->
                    <?php else: ?>
                        <li class="list-group-item">Your cart is empty.</li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Proceed to Checkout</button>
            </div>
        </div>
    </div>
</div>

<?php include './modal/login.php'; ?>
<?php include './modal/register.php'; ?>


<?php include './include/footer-script.php'; ?>
<?php include './include/footer.php'; ?>