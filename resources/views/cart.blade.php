<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: 'Edu SA Beginner', cursive;
        }

        h1 {
            color: #007bff;
            text-align: center;
            margin-top: 20px;
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

        .cart-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .cart-item {
            margin: 20px 0;
            padding: 20px;
            border-radius: 10px;
            background-color: #333;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .cart-item:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.4);
            transform: scale3d(1.05, 1.05, 1);
        }

        .cart-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            filter: brightness(80%); /* Add a filter for a dark effect */
        }

        .cart-item .card-body {
            padding: 15px;
        }

        .cart-item .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .cart-item hr {
            border-color: #007bff;
        }

        .cart-item p {
            margin-top: 10px;
            font-size: 16px;
        }

        .cart-total {
            font-weight: bold;
            font-size: 20px;
            margin-top: 20px;
        }

        /* Keyframe animation for the cart item */
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

        /* Media query for responsiveness */
        @media (max-width: 576px) {
            .cart-container {
                padding: 10px;
            }
            .cart-item img {
                height: 150px;
            }
            .cart-item .card-title {
                font-size: 20px;
            }
            .cart-item p {
                font-size: 14px;
            }
            .cart-total {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="cart-container ">
        <h1>Your Cart</h1>
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
        <p class="cart-total">Total: $<span>{{ $cartTotal }}</span></p>
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
