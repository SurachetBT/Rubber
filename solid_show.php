<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

echo "<h2>📚 ประวัติการทดสอบน้ำหนักตัวอย่าง (Solid)</h2>";

$sql = "SELECT s.*, u.u_email 
        FROM Solid s 
        JOIN users u ON s.u_id = u.u_id 
        ORDER BY s.Date_Time DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>รหัสพนักงาน</th>
            <th>เลขที่ TD</th>
            <th>ซ้ำที่</th>
            <th>ป/ด/ว</th>
            <th>น้ำหนักจานเเก้ว (A)</th>
            <th>ก่อนเท (W1)</th>
            <th>หลังเท (W2)</th>
            <th>น้ำหนักตัวอย่างทดสอบ (g)</th>
            <th>หมายเหตุ</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['solid_id']}</td>
                <td>{$row['u_id']}</td>
                <td>{$row['td_name']}</td>
                <td>{$row['Repeat_that']}</td>
                <td>{$row['Date_Time']}</td>
                <td>{$row['A_mass']}</td>
                <td>{$row['W1_mass']}</td>
                <td>{$row['W2_mass']}</td>
                <td>" . number_format($row['percentage'], 2) . "</td>
                <td>{$row['note']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>⚠️ ยังไม่มีข้อมูลในระบบ</p>";
}

echo '<p><a href="solid.php">🔙 กลับหน้าแบบฟอร์ม</a></p>';
?>
