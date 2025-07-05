<?php
session_start();
require_once 'cart.php'; // Include cart handling logic
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
include './include/header.php';
include './menu/nav.php';
?>


<!-- Hero Section -->
<div class="hero">
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
        <div class="row">
            <!-- Product Card 1 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card product-card shadow-sm">
                    <img src="./assets/tablet1.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Short product description goes here.</p>
                        <button class="btn btn-primary">Shop Now</button>
                    </div>
                </div>
            </div>
            <!-- Product Card 2 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card product-card shadow-sm">
                    <img src="./assets/tablet2.jpg" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">Short product description goes here.</p>
                        <button class="btn btn-primary">Shop Now</button>
                    </div>
                </div>
            </div>
            <!-- Product Card 3 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card product-card shadow-sm">
                    <img src="./assets/tablet3.jpg" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">Short product description goes here.</p>
                        <button class="btn btn-primary">Shop Now</button>
                    </div>
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


<?php include './include/footer.php'; ?>