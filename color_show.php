<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

echo "<h2>🌈 ประวัติการทดสอบการเปรียบเทียบสี (Color Test)</h2>";

$sql = "SELECT c.*, u.u_email 
        FROM Color c 
        JOIN users u ON c.u_id = u.u_id 
        ORDER BY c.Date_Time DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>รหัสพนักงาน</th>
            <th>เลขที่ TD</th>
            <th>วันที่ทดสอบ</th>
            <th>หมายเลขเปรียบเทียบสี</th>
            <th>หมายเลขวัดความหนาแน่น</th>
            <th>ค่าที่อ่านได้ (สี)</th>
            <th>ค่าความหนาแน่น (mm)</th>
            <th>หมายเหตุ</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
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
    }

    echo "</table>";
} else {
    echo "<p>⚠️ ยังไม่มีข้อมูลในระบบ</p>";
}

echo '<p><a href="color.php">🔙 กลับหน้าแบบฟอร์ม</a></p>';
?>
