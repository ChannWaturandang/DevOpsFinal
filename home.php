<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1496412705862-e0088f16f791');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(50%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn {
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #ffcc00;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            animation: slideIn 1s ease;
        }

        .btn:hover {
            background-color: #ff9933;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome Back, User!</h1>
        <a class="btn" href="makanan.php">Start Managing Data</>
    </div>
</body>
</html>
