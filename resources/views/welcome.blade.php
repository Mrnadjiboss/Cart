<!DOCTYPE html>
<html>
<head>
    <title>Navbar and Card Styling Example</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Add custom CSS styles -->
    <style>
        /* ... (existing CSS styles for the navbar and cards) ... */
        body {
            background-color: #1a1a1a;
        }

        .navbar {
            background-color: #333;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 0px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .navbar:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.4);
        }

        .nav-link {
            color: #fff;
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 8px 16px;
            transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #fff;
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 8px 16px;
            transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        /* Keyframe animation for the navbar-brand */
        @keyframes fadeInOut {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }

        .navbar-brand {
            animation: fadeInOut 2s infinite;
        }

        /* Custom CSS styles for the card */
        .card {
            margin: 20px auto;
            background-color: #333;
            color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.4);
            transform: scale3d(1.05, 1.05, 1);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        /* Custom CSS styles for the cart */
        .cart-container {
            position: fixed;
            top: 60px;
            right: -300px;
            width: 300px;
            max-height: calc(100vh - 60px); /* Set the maximum height to fit the viewport minus the navbar height */
            background-color: #333;
            color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            transition: right 0.3s ease-in-out;
            z-index: 1000;
            padding: 20px;
            overflow-y: auto; /* Enable vertical scroll if content overflows */
        }

        .cart-container.active {
            right: 0;
        }

        /* ... (existing CSS styles for the cart) ... */

        @media (max-width: 767.98px) {
            /* Cart container will be full width when the screen size is smaller than 768px (i.e., mobile) */
            .cart-container {
                width: 100%;
                max-width: 300px;
            }

        }

        .cart-container.active {
            right: 0;
        }

        .cart-item {
            background-color: #444;
            color: #fff;
            padding: 10px;
            border-bottom: 1px solid #555;
            transition: transform 0.3s ease-in-out;
        }

        .cart-item:last-child {
            border-bottom: none;
        }
        .cart-item:hover {
            transform: scale3d(1.05, 1.05, 1);
        }

        .cart-total {
            font-weight: bold;
        }

        .close-cart {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Keyframe animation for the cart */
        @keyframes slideInRight {
            0% { transform: translateX(100%); }
            100% { transform: translateX(0); }
        }

        @keyframes slideOutRight {
            0% { transform: translateX(0); }
            100% { transform: translateX(100%); }
        }

        .slide-in {
            animation: slideInRight 0.3s forwards;
        }

        .slide-out {
            animation: slideOutRight 0.3s forwards;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-light" href="#">Payment System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Backoffice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="toggleCart()" href="">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-3 mx-2">
                <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{$product -> img }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$product -> name }}</h5>
        <h5 class="card-title">{{$product -> price }} $</h5>
    </div>
                    <a href="#" class="btn btn-primary btn-sm" onclick="addToCart('{{$product->name}}', '{{$product->price}}')">Add To Cart</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="cart-container" id="cart">
    <span class="close-cart" onclick="toggleCart()">&times;</span>
    <h3>Your Cart</h3>
    @foreach($products as $product)
    <div id="cart-items">
    </div>
    @endforeach
    <p class="cart-total">Total: $<span id="cart-total">0</span></p>
</div>


<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    function toggleCart() {
        var cart = document.getElementById('cart');
        cart.classList.toggle('active');
    }

    function addToCart(name, price) {
        var cartItems = document.getElementById('cart-items');
        var cartTotal = document.getElementById('cart-total');

        // Create a new cart item element
        var cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = '<span>' + name + '</span> - $' + price;

        // Add the cart item to the cart
        cartItems.appendChild(cartItem);

        // Calculate the new total
        var currentTotal = parseFloat(cartTotal.textContent);
        var itemPrice = parseFloat(price);
        var newTotal = currentTotal + itemPrice;
        cartTotal.textContent = newTotal.toFixed(2);
    }
</script>

</body>
</html>
