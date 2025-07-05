<?php
session_start();

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart
if (isset($_POST['add_to_cart'])) {
    $product = [
        'id' => $_POST['product_id'],
        'name' => $_POST['product_name'],
        'price' => $_POST['product_price']
    ];
    $_SESSION['cart'][] = $product;
}

// Remove from cart
if (isset($_POST['remove_item'])) {
    $index = $_POST['index'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

$cart_count = count($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Borres Pharmacy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }

    /* Navbar Styling */
    .navbar {
      background-color: rgb(0, 191, 255); /* Deep Sky Blue */
    }

    .navbar .nav-link, .navbar-brand {
      color: #fff !important;
    }

    .navbar .nav-link:hover, .navbar .nav-link.active {
      color: #ffdede !important;
    }

    /* Product Card Styling */
    .product-card img { 
      height: 200px; 
      object-fit: cover; 
    }

    /* Cart Button Styling */
    .btn-outline-light {
      color: #fff;
      border-color: rgb(0, 191, 255); /* Deep Sky Blue */
    }

    .btn-outline-light:hover {
      background-color: rgb(0, 191, 255);
      color: #fff;
    }

    /* Updated Cart Button */
    .btn-cart {
      background-color: rgb(0, 191, 255); /* Deep Sky Blue */
      color: white;
      position: relative;
      border: none;
    }

    .btn-cart:hover {
      background-color: rgb(0, 160, 217); /* Darker Deep Sky Blue */
    }

    .btn-cart .cart-badge {
      position: absolute;
      top: 0;
      right: 0;
      background-color: #212529;
      color: white;
      font-size: 12px;
      padding: 5px 10px;
      border-radius: 50%;
    }

    /* Cart Modal */
    .modal-header.bg-danger {
      background-color: rgb(0, 191, 255); /* Deep Sky Blue */
      color: white;
    }

    /* Footer Styling */
    footer { 
      background: #212529; 
      color: #ccc; 
      text-align: center; 
      padding: 20px 0; 
    }

    /* Add to Cart Button Styling */
    .btn-add-to-cart {
      background-color: rgb(0, 191, 255); /* Deep Sky Blue */
      color: white;
      position: relative;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 16px;
    }

    .btn-add-to-cart:hover {
      background-color: rgb(0, 160, 217); /* Darker Deep Sky Blue */
      cursor: pointer;
    }
  </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">My Pharmacy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store_services.php">Store Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact_us.php">Contact Us</a>
        </li>
      </ul>
      <div class="d-flex align-items-center ms-lg-3 gap-2 mt-3 mt-lg-0">
        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#authModal">
          <i class="bi bi-box-arrow-in-right"></i> Login
        </button>
        <button class="btn btn-cart" data-bs-toggle="modal" data-bs-target="#cartModal">
          <i class="bi bi-cart"></i> Cart
          <?php if($cart_count > 0): ?>
          <span class="cart-badge">
            <?php echo $cart_count; ?>
          </span>
          <?php endif; ?>
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Shop Hero -->
<section class="py-5 text-center bg-light">
  <div class="container">
    <h1 class="fw-bold mb-3">Pharmacy Shop</h1>
    <p class="lead">Browse and order quality healthcare products online.</p>
  </div>
</section>

<!-- Products Grid -->
<section class="py-5">
  <div class="container">
    <div class="row g-4">
      <?php
      $products = [
        ['id'=>1, 'name'=>'Pain Relief Tablets', 'price'=>10.99, 'img'=>'https://via.placeholder.com/400x300?text=Pain+Relief'],
        ['id'=>2, 'name'=>'Vitamin C Supplements', 'price'=>8.50, 'img'=>'https://via.placeholder.com/400x300?text=Vitamin+C'],
        ['id'=>3, 'name'=>'Skin Care Cream', 'price'=>12.00, 'img'=>'https://via.placeholder.com/400x300?text=Skin+Care'],
        ['id'=>4, 'name'=>'Antibiotic Ointment', 'price'=>15.25, 'img'=>'https://via.placeholder.com/400x300?text=Antibiotic+Ointment'],
        ['id'=>5, 'name'=>'Cough Syrup', 'price'=>9.75, 'img'=>'https://via.placeholder.com/400x300?text=Cough+Syrup'],
        ['id'=>6, 'name'=>'Allergy Relief', 'price'=>11.40, 'img'=>'https://via.placeholder.com/400x300?text=Allergy+Relief']
      ];
      foreach($products as $p):
      ?>
      <div class="col-md-4">
        <div class="card h-100 product-card shadow-sm">
          <img src="<?php echo $p['img']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($p['name']); ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo $p['name']; ?></h5>
            <p class="card-text mb-4">$<?php echo number_format($p['price'],2); ?></p>
            <form method="post" class="mt-auto">
              <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $p['name']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $p['price']; ?>">
              <button type="submit" name="add_to_cart" class="btn-add-to-cart w-100">
                <i class="bi bi-cart-plus"></i> Add to Cart
              </button>
            </form>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title"><i class="bi bi-cart"></i> Your Cart</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <?php if ($cart_count > 0): ?>
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Product</th>
                <th>Price</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
              <?php $total = 0; foreach($_SESSION['cart'] as $i => $item): $total += $item['price']; ?>
              <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td>$<?php echo number_format($item['price'],2); ?></td>
                <td>
                  <form method="post">
                    <input type="hidden" name="index" value="<?php echo $i; ?>">
                    <button type="submit" name="remove_item" class="btn btn-sm btn-danger">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <th colspan="2">Total</th>
                <th colspan="2">$<?php echo number_format($total,2); ?></th>
              </tr>
            </tbody>
          </table>
        </div>
        <button class="btn btn-danger"><i class="bi bi-credit-card"></i> Proceed to Checkout</button>
        <?php else: ?>
        <p class="text-center">Your cart is empty.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
