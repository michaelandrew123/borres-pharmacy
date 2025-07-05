<?php
session_start();

// Handle form submission
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Simple validation
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $message === "") {
        $error = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        // OPTIONAL: Email sending (uncomment to enable)
        /*
        $to = "your@email.com";
        $subject = "New Contact Message";
        $body = "From: $name <$email>\n\n$message";
        $headers = "From: $email";
        mail($to, $subject, $body, $headers);
        */
        $success = "Thank you for contacting us! We'll get back to you shortly.";
        // Clear form
        $name = $email = $message = "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Borres Pharmacy</title>
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
      background: url('assets/contact.jpg') center/cover no-repeat;
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

    /* Contact Form Styling */
    .contact-form {
      background: #fff;
      padding: 40px;
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
          <a class="nav-link" href="about_us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact_us.php">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Banner -->
<section class="hero-banner">
  <div class="content">
    <h1 class="display-4 fw-bold">Contact Us</h1>
    <p class="lead">We’re here to help. Get in touch anytime.</p>
  </div>
</section>

<!-- Contact Form -->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="contact-form">
        <h2 class="fw-bold mb-4">Send Us a Message</h2>
        <?php if ($success): ?>
          <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php elseif ($error): ?>
          <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post" novalidate>
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" rows="5" class="form-control" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
          </div>
          <button type="submit" class="btn btn-danger"><i class="bi bi-envelope-fill"></i> Send Message</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
