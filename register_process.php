<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['u_name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['u_lastname']);
    $phone = mysqli_real_escape_string($conn, $_POST['u_phone']);
    $email = mysqli_real_escape_string($conn, $_POST['u_email']);
    $password = mysqli_real_escape_string($conn, $_POST['u_pass']); // ใช้ mysqli_real_escape_string สำหรับความปลอดภัย
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // ตรวจสอบว่ารหัสผ่านตรงกันหรือไม่
    if ($password != $confirm_password) {
        array_push($errors, "The two passwords do not match");
    }
 
    // ตรวจสอบว่ามีชื่อผู้ใช้หรืออีเมล์ซ้ำกันหรือไม่
    $user_check_query = "SELECT * FROM users WHERE u_name='$username' OR u_email='$email'";
    $result = mysqli_query($conn, $user_check_query);

    if (mysqli_num_rows($result) > 0) {
        array_push($errors, "Username or Email already exists");
    }

    // ถ้าไม่มีข้อผิดพลาด บันทึกข้อมูลในฐานข้อมูล
    if (count($errors) == 0) {
        // เข้ารหัสรหัสผ่านก่อนที่จะบันทึก (โดยใช้ md5)
        $password = md5($password);

        $sql = "INSERT INTO users (u_name,u_lastname,u_email,u_pass,U_phone)
         VALUES ('$username','$lastname','$email', '$password','$phone')";
        mysqli_query($conn, $sql);

        $_SESSION['u_name'] = $username;
        header('Location: login.php'); // หน้าที่จะเปลี่ยนไปหลังจากลงทะเบียนสำเร็จ
        exit();
    } else {
        // หากมีข้อผิดพลาด แสดงข้อผิดพลาดกลับไปยังหน้า register.php
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }
}
?>
