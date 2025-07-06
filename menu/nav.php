
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(0, 191, 255);">
    <div class="container">
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']) {  ?>
            <a class="navbar-brand fw-bold" href="../../admin/">My Pharmacy</a>
        <?php }else {  ?>
            <a class="navbar-brand fw-bold" href="/">My Pharmacy</a>
        <?php } ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-evenly; ">


            <ul class="navbar-nav ">

                <?php if(isset($_SESSION['admin']) && $_SESSION['admin']) {  ?>
                    <li class="nav-item"><a class="nav-link" href="./products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="./upload_product.php">New Product</a></li>
                <?php }else {  ?>
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="store_services.php">Store Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact Us</a></li>
                <?php } ?>
            </ul>
            <div class="d-flex ms-lg-3 gap-2 mt-3 mt-lg-0">



                <?php

                if (!empty($_SESSION['username'])): ?>
                    <span class="text-white fw-bold" style="display: flex;align-items: center;">Hello, <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin']) {  ?>
                        <a href="./../logout.php" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    <?php }else {  ?>
                        <a href="logout.php" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    <?php } ?>
                <?php else: ?>

                        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#authModal">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </button>

                <?php endif; ?>






                <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {  ?>
                    <button class="btn btn-warning btn-sm position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                        <i class="bi bi-cart"></i> Cart
                        <?php if($cart_count > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark text-white">
                                <?= $cart_count ?>
                            </span>
                        <?php endif; ?>
                    </button>
                <?php }  ?>

            </div>
        </div>
    </div>
</nav>
