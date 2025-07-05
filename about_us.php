<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - Borres Pharmacy</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
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

    /* Hero Banner Styling */
    .hero-banner {
      background: url('assets/medi.jpg') center/cover no-repeat;
      color: #fff;
      text-align: center;
      padding: 120px 20px;
      position: relative;
    }

    .hero-banner::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.5);
    }

    .hero-banner .content {
      position: relative;
      z-index: 1;
    }

    /* Section Content Styling */
    .section-content {
      background: #fff;
      padding: 60px 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    /* Footer Styling */
    footer {
      background-color: #212529;
      color: #ccc;
      text-align: center;
      padding: 20px 0;
      margin-top: 60px;
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

  </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">My Pharmacy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store_services.php">Store Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about_us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact_us.php">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Banner -->
<section class="hero-banner">
  <div class="content">
    <h1 class="display-4 fw-bold">About Our Pharmacy</h1>
    <p class="lead">Trusted care for your health and wellness.</p>
  </div>
</section>

<!-- About Content -->
<div class="container my-5">
  <div class="section-content">
    <h2 class="fw-bold mb-4 text-center">Our Story</h2>
    <p>
      My Pharmacy was founded with a simple mission: to make healthcare accessible, reliable, and personalized. For over a decade, we have proudly served our community by providing high-quality medications, wellness products, and expert advice from caring professionals.
    </p>
    <p>
      From our convenient online ordering platform to our friendly in-store experience, we are committed to delivering exceptional service and support every step of the way.
    </p>
    <h3 class="fw-bold mt-5">Why Choose Us?</h3>
    <ul class="list-unstyled">
      <li><i class="bi bi-check-circle-fill text-success me-2"></i>Licensed pharmacists available for consultations</li>
      <li><i class="bi bi-check-circle-fill text-success me-2"></i>Fast and secure home delivery</li>
      <li><i class="bi bi-check-circle-fill text-success me-2"></i>Wide selection of prescription and OTC products</li>
      <li><i class="bi bi-check-circle-fill text-success me-2"></i>Commitment to customer privacy and safety</li>
    </ul>
    <h3 class="fw-bold mt-5">Our Vision</h3>
    <p>
      We believe that every person deserves accessible, compassionate healthcare. Our vision is to empower individuals to take control of their health through trustworthy products and dedicated support.
    </p>
  </div>
</div>



<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
