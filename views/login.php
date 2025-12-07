<?php
include '../connection/connectdb.php';
include '../layout/nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Sancreek&family=Vollkorn:wght@400;600&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body { 
            font-family: 'Vollkorn', serif;
        }

        .login-container {
            max-width: 420px;
            margin: auto;
            margin-top: 60px;
            padding: 20px;
        }

        .login-header {
            background: #004D40 ;
            padding: 20px;
            text-align: center;
            color: white;
            border-radius: 8px 8px 0 0;
            font-size: 28px;
            letter-spacing: 2px;
            font-family: 'Sancreek', cursive;
        }

        .login-box {
            font-family: 'Vollkorn', serif;
            background: white;
            padding: 30px;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .login-btn {
            width: 100%;
            background: linear-gradient(to right, #003c1f, #00c167);
            border: none;
            padding: 12px;
            border-radius: 6px;
            color: white;
            font-size: 18px;
        }

        .login-btn:hover {
            opacity: 0.95;
        }

        input {
            margin-bottom: 15px;
        }

        @media (max-width: 576px) {
            .login-container {
                margin-top: 20px;
                padding: 10px;
            }

            .login-header {
                font-size: 24px;
            }
        }
            @media (min-width: 992px) { .login-container { max-width: 600px; } }
    </style>
</head>

<body>
    <div class='login-container'>
        <div class='login-header'>Login</div>

        <div class='login-box'>
            <form>
                <input type="text" class='form-control' placeholder="Username or email address *" required />
                <input type="password" class='form-control' placeholder="Password *" required />

                <div class='d-flex justify-content-between align-items-center mb-3'>
                    <div>
                        <input type="checkbox" id='remember' />
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#">Forgot password?</a>
                </div>

                <button class='login-btn' type="submit">Log in</button>
            </form>

            <div class='text-center mt-3'>
                Not a member?
                <a href="#">Register</a>
            </div>
        </div>
    </div>

    
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>

<?php include '../layout/footer.php'; ?>