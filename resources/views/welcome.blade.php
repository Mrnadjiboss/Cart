<!DOCTYPE html>
<html>
<head>
    <title>Payment System</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&display=swap" rel="stylesheet">
    <!-- Add custom CSS styles -->
    <style>
        /* ... (existing CSS styles for the navbar and cards) ... */
        body {
            background-color: #1a1a1a;
            font-family: 'Edu SA Beginner', cursive;
            /* background-image: url("https://media.giphy.com/media/F5LQhVcDygI2t6k0DP/giphy.gif"); */
            background-attachment: fixed;
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
            text-decoration: none;
            padding: 10px;
            display: block;
            text-align: center;
            border-radius: 20px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out, filter 0.3s ease-in-out;
        }

        .nav-link:hover {
            background-color: #fff; /* Hover background color */
            color: #333; /* Hover text color */
            transform: scale3d(1.1, 1.1, 1);
            filter: brightness(1.2); /* Hover brightness effect */
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3); /* Hover box shadow */
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
        .btn-hover {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            color: #fff;
            text-decoration: none;
            border-radius: 1px;
            font-size: 18px;
            transition: transform 0.3s ease-in-out;
            font-style: italic;
            border:  0px white;

        }

        /* Hover effect with transform: scale3d */
        .btn-hover:hover {
            transform: scale3d(1.1, 1.1, 1);
        }

        /* 3D Keyframe Animation */
        @keyframes rotateAndScale {
            0% {
                transform: scale3d(1, 1, 1);
            }
            50% {
                transform: scale3d(1.2, 1.2, 1.2) rotateZ(45deg);
            }
            100% {
                transform: scale3d(1, 1, 1);
            }
        }

        /* Hover effect with 3D Keyframe Animation */
        .btn-hover:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 123, 255, 0.2);
            border-radius: 5px;
            /* animation: rotateAndScale 0.6s ease-in-out; */
            z-index: -1;
        }

        /* Hover effect with 3D Keyframe Animation */
        .hover-link:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 123, 255, 0.2);
            border-radius: 5px;
            animation: rotateAndScale 0.6s ease-in-out;
            z-index: -1;
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

<nav class="navbar navbar-expand-lg fixed-top">
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
                    <a class="nav-link" onclick="" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" onclick="toggleCart()">Open Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<hr>
<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-3 mx-2">
                <div class="card text-center" style="width: 18rem;">
    <img class="card-img-top" src="{{$product -> img }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$product -> name }}</h5>
        <hr>
        <h5 class="card-title">{{$product -> price }} $</h5>
        <hr class="bg-light">
    </div>

<form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn-hover btn btn-secondary " ><strong>Add To Cart</strong></button>
</form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="cart-container" id="cart">
    <span class="close-cart" onclick="toggleCart()">&times;</span>
    <h3>Your Cart</h3>

    <div id="cart-items">
    @foreach($cartItems as $cartItem)
            <div class="cart-item ">
                <img class="card-img-top" src="{{$cartItem->product->img }}" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">{{$cartItem->product->name }}</h5>
                    <hr>
                    <h5 class="card-title">{{$cartItem->product->price }} $</h5>
                    <hr class="bg-light">
                </div>
                <p>{{ $cartItem->product->name }} - ${{ $cartItem->product->price }} x {{ $cartItem->quantity }}</p>

                <form action="{{ route('cart.remove', ['product' => $cartItem->product->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
            </form>
            </div>
        @endforeach
    </div>

    <p class="cart-total">Total: $<span id="cart-total">0</span></p>
</div>


    <div class="cart-container" id="cart">
        <h1>Your Cart</h1>
        <!-- Sample cart items (replace with your dynamic data) -->

        <p>yes</p>
        </div>



<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</script>
<script>
        function toggleCart() {
            var cart = document.getElementById('cart');
            cart.classList.toggle('active');
        }
    </script>
</body>
</html>
