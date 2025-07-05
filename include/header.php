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
