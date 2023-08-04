<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Add custom CSS styles -->
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
        }

        .create-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #333;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .create-form label {
            font-weight: bold;
        }

        .create-form input[type="text"],
        .create-form input[type="number"],
        .create-form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: #444;
            color: #fff;
        }

        .create-form input[type="text"]:focus,
        .create-form input[type="number"]:focus,
        .create-form input[type="file"]:focus {
            outline: none;
            background-color: #555;
        }

        .create-form button[type="submit"] {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .create-form button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Keyframe animation for the form */
        @keyframes slideInDown {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(0); }
        }

        .slide-in {
            animation: slideInDown 0.5s forwards;
        }

        /* Hover effects */
        .create-form input[type="text"]:hover,
        .create-form input[type="number"]:hover,
        .create-form input[type="file"]:hover {
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .create-form button[type="submit"]:hover {
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3);
        }

        /* After/Before effects */
        .create-form::before,
        .create-form::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .create-form::before {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);
        }

        .create-form::after {
            background-image: linear-gradient(315deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);
        }
    </style>
</head>
<body>
    <div class="create-form slide-in">
        <h2>Create Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="price">Product Price:</label>
                <input type="number" name="price" id="price" required>
            </div>

            <div class="form-group">
                <label for="img">Product Image:</label>
                <input type="file" name="img" id="img">
            </div>

            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
