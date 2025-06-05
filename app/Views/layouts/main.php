<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="X-CSRF-TOKEN" content="<?= csrf_hash() ?>">
    <title>Welcome to Our Site</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4A90E2;  /* Sky blue */
            --primary-color-dark: #357ABD;  /* Darker sky blue for gradient */
            --secondary-color: #87CEEB;  /* Lighter sky blue */
            --accent-color: #1E90FF;
            --light-color: #F0F8FF;
        }

        .footer {
            padding: 20px 0;
            background: linear-gradient(to right, var(--primary-color), var(--primary-color-dark));
            margin-top: auto;
            color: white;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--light-color);
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: linear-gradient(to right, var(--primary-color), var(--primary-color-dark)) !important;
            min-height: 80px;
            padding: 15px 0;
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.2);
        }

        .navbar-brand {
            font-weight: 900;
            color: white !important;
            font-size: 28px;
            padding: 10px 15px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            letter-spacing: 1px;
        }

        .brand-logo {
            width: 40px;
            height: 24px;
            fill: white;
            margin-right: 5px;
        }

        .navbar-brand:hover {
            color: var(--light-color) !important;
            transform: translateY(-1px);
        }

        .utility-text {
            color: var(--light-color);
            margin-right: 15px;
            font-size: 16px;
        }

        .nav-link {
            color: var(--light-color) !important;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 20px !important;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--light-color);
            left: 20px;
            bottom: 5px;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: calc(100% - 40px);
        }

        .nav-link.active::after {
            width: calc(100% - 40px);
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .navbar-toggler {
            border-color: var(--light-color);
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .cart-icon-wrapper {
            position: relative;
            margin-left: 1rem;
        }

        .cart-icon {
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .cart-icon:hover {
            color: var(--light-color);
            transform: translateY(-2px);
        }

        .cart-counter {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: bold;
            min-width: 20px;
            text-align: center;
        }

        .footer h5 {
            color: var(--secondary-color);
        }

        /* Add a gradient background to the main content area */
        main {
            background: linear-gradient(135deg, #ffffff 0%, var(--light-color) 100%);
            padding: 30px 0;
            border-radius: 10px;
            margin: 20px auto;
        }

        .card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            height: 450px;
            display: flex;
            flex-direction: column;
            background: white;
            overflow: hidden;
        }

        .card-image-container {
            height: 250px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: #f8f9fa;
            overflow: hidden;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: all 0.3s ease;
        }

        .card:hover .card-image-container {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem;
            background: white;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--primary-color-dark);
        }

        .card-text {
            font-size: 1rem;
            line-height: 1.5;
            color: #666;
            margin-bottom: 1rem;
        }

        .btn-add-to-cart {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .btn-add-to-cart:hover {
            background: var(--primary-color-dark);
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            color: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <svg class="brand-logo" viewBox="0 0 30 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 0C20.4233 0.553097 10.9669 3.27613 3.6174 9.69731C-0.383532 13.1031 -1.03998 15.9671 0.94651 15.9975C2.93299 16.0279 6.35323 14.1797 9.95444 11.5451C13.5557 8.91056 27.5268 0.821436 30 0Z"/>
                </svg>
                NIKE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() == base_url() ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() == base_url('about') ? 'active' : '' ?>" href="<?= base_url('about') ?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() == base_url('contact') ? 'active' : '' ?>" href="<?= base_url('contact') ?>">Contact</a>
                    </li>
                </ul>
                <a href="<?= base_url('cart') ?>" class="cart-icon-wrapper">
                    <i class="fas fa-shopping-cart cart-icon"></i>
                    <span class="cart-counter">0</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-4">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>NIKE</h5>
                    <p>Making the world a better place through innovative solutions.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; <?= date('Y') ?> NIKE. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Update cart counter on page load
        fetch('<?= base_url('cart/count') ?>')
            .then(response => response.json())
            .then(data => {
                document.querySelector('.cart-counter').textContent = data.count;
            });

        // Add to cart functionality
        document.querySelectorAll('.btn-add-to-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const card = this.closest('.card');
                const productName = card.querySelector('.card-title').textContent;
                const productId = this.dataset.id || Math.random().toString(36).substr(2, 9);

                fetch('<?= base_url('cart/add') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `product_id=${productId}&name=${encodeURIComponent(productName)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector('.cart-counter').textContent = data.count;
                        // Optional: Show success message
                        alert('Product added to cart!');
                    }
                });
            });
        });
    </script>
</body>
</html> 