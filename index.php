<?php
session_start();
require_once 'cart.php'; // Include cart handling logic
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borres Pharmacy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
        .navbar {
            background-color: rgb(0, 191, 255); /* Deep Sky Blue */
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-dark .navbar-nav .nav-link.active,
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #333;
        }

        /* Button Styling */
        .btn {
            background-color: rgb(0, 84, 180); /* Medium Blue */
            border-color: rgb(0, 84, 180); /* Medium Blue */
            color: white;
        }

        .btn:hover, .btn:focus {
            background-color: rgb(0, 70, 140); /* Darker Medium Blue on hover */
            border-color: rgb(0, 70, 140); /* Darker Medium Blue on hover */
        }

        /* Hero Section */
        .hero {
            height: 50vh;
            background-image: url('assets/doctor.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            filter: brightness(60%);
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            z-index: 1;
            max-width: 700px;
            padding: 1rem;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            letter-spacing: 2px;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .hero .btn-shop {
            padding: 15px 40px;
            font-size: 1.2rem;
            background-color: rgb(0, 191, 255); /* Deep Sky Blue */
            color: white;
            border: none;
            border-radius: 50px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .hero .btn-shop:hover {
            background-color: rgb(0, 160, 220); /* Darker Deep Sky Blue */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Product Section */
        .products-section {
            padding: 6rem 1rem;
            background-color: #f8f9fa;
        }

        .product-card {
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .product-card .card-body {
            padding: 2rem;
            background-color: #fff;
            text-align: center;
        }

        .product-card .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .product-card .card-text {
            font-size: 1.1rem;
            color: #6c757d;
        }

        .product-card .btn-primary {
            background-color: rgb(0, 191, 255); /* Deep Sky Blue */
            border-color: rgb(0, 191, 255); /* Deep Sky Blue */
            border-radius: 25px;
        }

        .product-card .btn-primary:hover {
            background-color: rgb(0, 160, 220); /* Darker Deep Sky Blue */
            border-color: rgb(0, 160, 220); /* Darker Deep Sky Blue */
        }

        /* Footer */
        footer {
            background-color: #343a40;
            color: white;
            padding: 4rem 0;
            text-align: center;
        }

        footer p {
            font-size: 1rem;
            font-weight: 300;
        }

        /* Modal Styles */
        .modal-header {
            background-color: #f8f9fa;
        }

        .modal-header .btn-close {
            color: #343a40;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .products-section {
                padding: 4rem 1rem;
            }

            .product-card img {
                height: 200px;
            }

            .product-card .card-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(0, 191, 255);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">My Pharmacy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-evenly; ">
            <ul class="navbar-nav ">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="store_services.php">Store Services</a></li>
                <li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact Us</a></li>
            </ul>
            <div class="d-flex ms-lg-3 gap-2 mt-3 mt-lg-0">



                <?php if (!empty($_SESSION['admin'])): ?>
                    <span class="text-white fw-bold" style="display: flex;align-items: center;">Hello, <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <a href="logout.php" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
                <?php else: ?>
                    <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#authModal">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                <?php endif; ?>






                <button class="btn btn-warning btn-sm position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="bi bi-cart"></i> Cart
                    <?php if($cart_count > 0): ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark text-white">
                            <?= $cart_count ?>
                        </span>
                    <?php endif; ?>
                </button>
            </div>
        </div>
    </div>
</nav>

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

<!-- Modal for Login -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true"  >
    <div class="modal-dialog" style="
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        width: 100%;
    ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loginError" class="alert alert-danger d-none"></div>
                <form id="loginForm" >
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>

                </form>
                <div class="mt-3 text-center">
                  <span>
                    Don't have an account? Sign up
                    <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">here</a>.
                  </span>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal for Registration -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        width: 100%;
        max-width: 400px;
    ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Admin Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Message Box -->
                <div id="registerMessage" class="alert d-none"></div>

                <form id="registerForm" novalidate>
                    <div class="mb-3">
                        <label for="user" class="form-label">Username</label>
                        <input type="text" id="user" name="user" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" id="pass" name="pass" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="pass_confirm" class="form-label">Confirm Password</label>
                        <input type="password" id="pass_confirm" name="pass_confirm" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>

                <div class="mt-3 text-center">
                    Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#authModal" data-bs-dismiss="modal">Login here</a>.
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function () {
        $("#loginForm").submit(function (e) {
            e.preventDefault();
            const $messageBox = $("#loginError");
            $.ajax({
                type: "POST",
                url: "./login.php",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $messageBox
                            .removeClass("d-none alert-danger")
                            .addClass("alert alert-success")
                            .text("Login successful! Redirecting...");
                            setTimeout(() => {
                                window.location.href = "index.php";
                            }, 1000);
                    } else {
                        $messageBox
                            .removeClass("d-none alert-success")
                            .addClass("alert alert-danger")
                            .text(response.message);
                    }
                },
                error: function () {
                    $messageBox
                        .removeClass("d-none alert-success")
                        .addClass("alert alert-danger")
                        .text("An unexpected error occurred. Please try again.");
                }
            });
        });


        $('#authModal').on('hidden.bs.modal', function () {
            $("#loginError")
                .addClass("d-none")
                .removeClass("alert-success alert-danger")
                .text('');
            $("#loginForm")[0].reset(); // optional: clear form
        });


        $("#registerForm").submit(function (e) {
            e.preventDefault();
            const $msg = $("#registerMessage");

            $.ajax({
                type: "POST",
                url: "register.php",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $msg
                            .removeClass("d-none alert-danger")
                            .addClass("alert alert-success")
                            .html(response.message);
                        $("#registerForm")[0].reset();
                    } else {
                        $msg
                            .removeClass("d-none alert-success")
                            .addClass("alert alert-danger")
                            .text(response.message);
                    }
                },
                error: function () {
                    $msg
                        .removeClass("d-none alert-success")
                        .addClass("alert alert-danger")
                        .text("Something went wrong. Please try again.");
                }
            });
        });

        // Reset message and form on modal close
        $('#registerModal').on('hidden.bs.modal', function () {
            $("#registerMessage")
                .addClass("d-none")
                .removeClass("alert-success alert-danger")
                .html('');
            $("#registerForm")[0].reset();
        });
    });
</script>

</body>
</html>
