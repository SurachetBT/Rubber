<?php
// ตรวจสอบว่า session ยังไม่ได้เริ่มต้น
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// ลบข้อมูล session ทั้งหมด
session_unset();

// ทำลาย session
session_destroy();

// เปลี่ยนเส้นทางไปยังหน้าล็อกอิน
header('Location: login.php');
exit; // ป้องกันการทำงานต่อหลังจาก header
?>