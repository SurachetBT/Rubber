<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

if (!isset($_SESSION['u_email'])) {
    echo "⛔ คุณยังไม่ได้เข้าสู่ระบบ";
    exit();
}

$logged_in_email = $_SESSION['u_email'];

// ดึง u_id จาก email
$user_query = "SELECT u_id FROM users WHERE u_email = '$logged_in_email'";
$user_result = mysqli_query($conn, $user_query);

if ($user_result && mysqli_num_rows($user_result) === 1) {
    $user_row = mysqli_fetch_assoc($user_result);
    $u_id = $user_row['u_id'];
} else {
    echo "⛔ ไม่พบผู้ใช้หรือเกิดข้อผิดพลาด";
    exit();
}

if (isset($_POST['submit'])) {
    $TDname = mysqli_real_escape_string($conn, $_POST['td_name']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $datetime = $_POST['Date_Time'];
    $color_comparison_number = mysqli_real_escape_string($conn, $_POST['color_comparison_number']);
    $Density_measurement_number = mysqli_real_escape_string($conn, $_POST['Density_measurement_number']);
    $read_color = floatval($_POST['read_color']);
    $Density_mm = floatval($_POST['Density_mm']);

    $sql = "INSERT INTO Color (u_id, td_name, note, Date_Time, color_comparison_number, Density_measurement_number, read_color, Density_mm)   
            VALUES ('$u_id', '$TDname', '$note', '$datetime', '$color_comparison_number', '$Density_measurement_number', '$read_color', '$Density_mm')";

    if (mysqli_query($conn, $sql)) {
        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";

        $color_id = mysqli_insert_id($conn);
        $result = mysqli_query($conn, "SELECT * FROM Color WHERE color_id = '$color_id'");
        $row = mysqli_fetch_assoc($result);

        echo "<h3>📄 ข้อมูลที่บันทึก</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>ID</th>
                <th>รหัสพนักงาน</th>
                <th>เลขที่ตัวอย่างห้องปฏิบัติการ TD</th>
                <th>วันที่ทดสอบ</th>
                <th>หมายเลขเปรียบเทียบสี</th>
                <th>หมายเลขวัดความหนาแน่น</th>
                <th>ค่าที่อ่านได้ (สี)</th>
                <th>ค่าความหนาแน่น (mm)</th>
                <th>หมายเหตุ</th>
              </tr>";
        echo "<tr>
                <td>{$row['color_id']}</td>
                <td>{$row['u_id']}</td>
                <td>{$row['td_name']}</td>
                <td>{$row['Date_Time']}</td>
                <td>{$row['color_comparison_number']}</td>
                <td>{$row['Density_measurement_number']}</td>
                <td>{$row['read_color']}</td>
                <td>{$row['Density_mm']}</td>
                <td>{$row['note']}</td>
              </tr>";
        echo "</table>";

        echo '<p><a href="color.php">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }
}
?>
