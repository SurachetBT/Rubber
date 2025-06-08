<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #dce35b, #45b649);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-box .form-control {
            border-radius: 50px;
            padding-left: 40px;
        }

        .login-box .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .login-box .login-btn {
            border-radius: 50px;
            font-weight: bold;
        }

        .options {
            font-size: 0.9rem;
        }

        .options a {
            text-decoration: none;
        }

        .login-box .icon-header {
            font-size: 60px;
            color: #0d6efd;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="login-box text-center">
    <div class="icon-header">
        <i class="bi bi-people-fill"></i>
    </div>
    <form action="login_process.php" method="POST">
        <div class="mb-3 position-relative">
            <i class="bi bi-person form-icon"></i>
            <input type="text" name="u_email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3 position-relative">
            <i class="bi bi-lock form-icon"></i>
            <input type="password" name="u_pass" class="form-control" placeholder="Password" required>
        </div>
        <div class="d-flex justify-content-between options mb-3">
            <div>
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            <a href="#">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100 login-btn">LOGIN</button>
        <a href="register.php" class="btn btn-outline-secondary w-100 mt-2 login-btn">SIGN UP</a>
    </form>
</div>

</body>
</html>
