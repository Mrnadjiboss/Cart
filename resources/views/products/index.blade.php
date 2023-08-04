<!DOCTYPE html>
<html>
<head>
    <title>Back Office Side Nav</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Add custom CSS styles -->
    <style>

      body {
            margin: 0;
            padding: 0;
            background-color: #1a1a1a; /* Dark background color */
            color: #fff; /* Text color */
        }

        .side-nav {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
            transition: width 0.3s ease-in-out;
            overflow: hidden;
        }

        .side-nav.active {
            width: 70px;
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

        /* Keyframe animation for the retract button */
        @keyframes rotateButton {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(180deg); }
        }

        .retract-button {
            position: absolute;
            top: 20px;
            right: -20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            padding: 8px;
            cursor: pointer;
            animation: rotateButton 0.3s linear;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .retract-button.active {
            animation: rotateButton 0.3s linear reverse;
        }

        .container {
            margin-top: 50px; /* Add space below the fixed side-nav */
        }

        .card {
            background-color: #333; /* Card background color */
            color: #fff; /* Card text color */
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

        .btn-edit {
            background-color: #007bff; /* Edit button background color */
            border-color: #007bff;
        }

        .btn-edit:hover {
            background-color: #0056b3; /* Edit button hover background color */
            border-color: #0056b3;
        }

        /* Additional CSS for responsiveness */
        @media (max-width: 576px) {
            .side-nav {
                width: 70px;
            }

            .side-nav.active {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .card {
                margin-bottom: 15px;
            }
        }

        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-delete:active {
            background-color: #b21f2d;
            border-color: #b21f2d;
        }

        .btn-delete:focus {
            box-shadow: 0 0 0 0.2rem rgba(225, 83, 97, 0.5);
        }
    </style>
</head>
<body>

<div class="side-nav">
    <a class="nav-link" href="{{route('products.create')}}">Create</a>
    <a class="nav-link" href="/">Home</a>
</div>

<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$product -> img }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$product -> name }}</h5>
                        <h5 class="card-title">{{$product -> price }}</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="retract-button" onclick="toggleSideNav()">
    <span>&#8249;</span>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    function toggleSideNav() {
        var sideNav = document.querySelector('.side-nav');
        var retractButton = document.querySelector('.retract-button');

        sideNav.classList.toggle('active');
        retractButton.classList.toggle('active');
    }
</script>

</body>
</html>
