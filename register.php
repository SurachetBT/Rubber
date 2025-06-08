<!-- register.php -->
<?php 
include('db_connect.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- เปลี่ยนจาก UTF-16 เป็น UTF-8 เพื่อให้แสดงผลถูกต้อง -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-control {
            border-radius: 50px;
            padding-left: 45px;
        }

        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .register-btn {
            border-radius: 50px;
            font-weight: bold;
        }

        .icon-header {
            font-size: 50px;
            color: #198754;
            margin-bottom: 20px;
        }

        .position-relative {
            position: relative;
        }
    </style>
</head>
<body>

<div class="register-box text-center">
    <div class="icon-header">
        <i class="bi bi-person-plus-fill"></i>
    </div>
    <h2 class="mb-4">Register</h2>
    <form action="register_process.php" method="POST">
        <div class="mb-3 position-relative">
            <i class="bi bi-person form-icon"></i>
            <input type="text" id="u_name" name="u_name" class="form-control" placeholder="First Name" required>
        </div>
        <div class="mb-3 position-relative">
            <i class="bi bi-person form-icon"></i>
            <input type="text" id="u_lastname" name="u_lastname" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="mb-3 position-relative">
            <i class="bi bi-telephone form-icon"></i>
            <input type="text" id="U_phone" name="U_phone" class="form-control" placeholder="Phone Number" required>
        </div>
        <div class="mb-3 position-relative">
            <i class="bi bi-envelope form-icon"></i>
            <input type="email" id="u_email" name="u_email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3 position-relative">
            <i class="bi bi-lock form-icon"></i>
            <input type="password" id="u_pass" name="u_pass" class="form-control" placeholder="Password" required>
        </div>
        <div class="mb-3 position-relative">
            <i class="bi bi-lock-fill form-icon"></i>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-success w-100 register-btn">Register</button>
    </form>
    <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
