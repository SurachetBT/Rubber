<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

echo "<h2>📚 ประวัติการทดสอบปริมาณไนโตรเจน</h2>";

$sql = "SELECT n.*, u.u_email 
        FROM Nitrogen n 
        JOIN users u ON n.u_id = u.u_id 
        ORDER BY n.Date_Time DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>รหัสพนักงาน</th>
            <th>เลขที่ตัวอย่างห้องปฏิบัติการ TD</th>
            <th>วันที่ทดสอบ</th>
            <th>หมายเลขเครื่องชั่ง</th>
            <th>หมายเลขเครื่องย่อยตัวอย่าง</th>
            <th>อุณหภูมิขณะไตเตรท</th>
            <th>ความเข้มข้นของกรดซัลฟิวริก</th>
            <th>หลังไตเตรท (B)</th>
            <th>ก่อนไตเตรท (A)</th>
            <th>V1 [B-A]</th>
            <th>V2 [B-A]</th>
            <th>น้ำหนักตัวอย่าง (W)</th>
            <th>ปริมาณไนโตรเจน %</th>
            <th>หมายเหตุ</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['nitrogen_id']}</td>
                <td>{$row['u_id']}</td>
                <td>{$row['td_name']}</td>
                <td>{$row['Date_Time']}</td>
                <td>{$row['Scale_number']}</td>
                <td>{$row['shredder_number']}</td>
                <td>{$row['temperature_number']}</td>
                <td>{$row['C_concentration']}</td>
                <td>{$row['B_nitrate']}</td>
                <td>{$row['A_nitrate']}</td>
                <td>{$row['V1_nitrate']}</td>
                <td>{$row['V2_nitrate']}</td>
                <td>{$row['W_mass']}</td>
                <td>" . number_format($row['percentage'], 2) . "%</td>
                <td>{$row['note']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>⚠️ ยังไม่มีข้อมูลในระบบ</p>";
}

echo '<p><a href="nitrogen.php">🔙 กลับหน้าแบบฟอร์ม</a></p>';
?>
