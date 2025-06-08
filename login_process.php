<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['u_email']);
    $password = mysqli_real_escape_string($conn, $_POST['u_pass']);

    // ค้นหาผู้ใช้ในฐานข้อมูลโดยใช้ email
    $sql = "SELECT * FROM users WHERE u_email='$username'";
    $result = mysqli_query($conn, $sql);

    // ตรวจสอบว่า query ทำงานสำเร็จหรือไม่
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // พบชื่อผู้ใช้ในฐานข้อมูล
            $row = mysqli_fetch_assoc($result);
            // เข้ารหัสรหัสผ่านด้วย md5 และเปรียบเทียบกับรหัสผ่านที่เข้ารหัสแล้วในฐานข้อมูล
            if (md5($password) === $row['u_pass']) {
                // รหัสผ่านถูกต้อง
                $_SESSION['u_email'] = $username;
                header('Location: dirt.php');
                exit();
            } else {
                // รหัสผ่านไม่ถูกต้อง
                array_push($errors, "Invalid password");
            }
        } else {
            // ไม่พบชื่อผู้ใช้ในฐานข้อมูล
            array_push($errors, "Invalid username");
        }
    } else {
        // query ล้มเหลว
        array_push($errors, "Database query failed: " . mysqli_error($conn));
    }

    // หากเกิดข้อผิดพลาด ให้ส่งกลับไปที่หน้า login.php พร้อมกับข้อผิดพลาด
    $_SESSION['errors'] = $errors;
    header('Location: login.php');
}
?>
