<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Store Services - Borres Pharmacy</title>
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
      background: url('assets/banner.jpg') center/cover no-repeat;
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

    /* Service Card Icons */
    .service-card i {
      font-size: 2.5rem;
      color: rgb(0, 191, 255); /* Deep Sky Blue */
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

    /* Footer Styling */
    footer {
      background-color: #212529;
      color: #ccc;
      text-align: center;
      padding: 20px 0;
      margin-top: 60px;
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
          <a class="nav-link active" href="store_services.php">Store Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">About Us</a>
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
    <h1 class="display-4 fw-bold">Our Pharmacy Services</h1>
    <p class="lead">Committed to your health and well-being.</p>
  </div>
</section>

<!-- Services -->
<div class="container my-5">
  <h2 class="text-center mb-4 fw-bold">What We Offer</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card text-center shadow-sm h-100 service-card">
        <div class="card-body">
          <i class="bi bi-capsule"></i>
          <h5 class="card-title mt-3">Prescription Refills</h5>
          <p class="card-text">Easily refill your prescriptions online or in-store with fast processing and reminders.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center shadow-sm h-100 service-card">
        <div class="card-body">
          <i class="bi bi-truck"></i>
          <h5 class="card-title mt-3">Home Delivery</h5>
          <p class="card-text">Get your medications delivered directly to your door for convenience and peace of mind.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center shadow-sm h-100 service-card">
        <div class="card-body">
          <i class="bi bi-heart-pulse"></i>
          <h5 class="card-title mt-3">Health Consultations</h5>
          <p class="card-text">Speak with our pharmacists for personalized advice on your medications and wellness goals.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center shadow-sm h-100 service-card">
        <div class="card-body">
          <i class="bi bi-shield-check"></i>
          <h5 class="card-title mt-3">Immunizations</h5>
          <p class="card-text">Protect yourself with vaccinations administered by our certified healthcare professionals.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center shadow-sm h-100 service-card">
        <div class="card-body">
          <i class="bi bi-bag-heart"></i>
          <h5 class="card-title mt-3">Wellness Products</h5>
          <p class="card-text">Explore a wide range of vitamins, supplements, and over-the-counter health essentials.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center shadow-sm h-100 service-card">
        <div class="card-body">
          <i class="bi bi-chat-square-text"></i>
          <h5 class="card-title mt-3">Medication Counseling</h5>
          <p class="card-text">Understand your medications with detailed counseling and support from our team.</p>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
