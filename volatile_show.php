<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

echo "<h2>🧪 ประวัติการทดสอบปริมาณสิ่งระเหย (Volatile Matter)</h2>";

$sql = "SELECT v.*, u.u_email 
        FROM Volatile_matter v 
        JOIN users u ON v.u_id = u.u_id 
        ORDER BY v.Date_Time DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>รหัสพนักงาน</th>
            <th>เลขที่ TD</th>
            <th>วันที่ทดสอบ</th>
            <th>หมายเลขเครื่องชั่ง</th>
            <th>หมายเลขตู้อบลมร้อน</th>
            <th>หมายเลขเครื่องวัดความหนา</th>
            <th>ก่อนบด (M1)</th>
            <th>หลังบด (M2)</th>
            <th>ก่อนอบ (M3)</th>
            <th>หลังอบ (M4)</th>
            <th>ความหนาหลังบด</th>
            <th>ปริมาณสิ่งระเหย (%)</th>
            <th>หมายเหตุ</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['volatile_id']}</td>
                <td>{$row['u_id']}</td>
                <td>{$row['td_name']}</td>
                <td>{$row['Date_Time']}</td>
                <td>{$row['Scale_number']}</td>
                <td>{$row['Hotair_number']}</td>
                <td>{$row['Thickness_number']}</td>
                <td>{$row['M1_mass']}</td>
                <td>{$row['M2_mass']}</td>
                <td>{$row['M3_mass']}</td>
                <td>{$row['M4_mass']}</td>
                <td>{$row['thickness_mm']}</td>
                <td>" . number_format($row['percentage'], 2) . "</td>
                <td>{$row['note']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>⚠️ ยังไม่มีข้อมูลในระบบ</p>";
}

echo '<p><a href="volatile.php">🔙 กลับหน้าแบบฟอร์ม</a></p>';
?>
