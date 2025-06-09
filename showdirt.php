<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

echo "<h2>📚 บันทึกการทดสอบปริมาณสิ่งสกปรก</h2>";

$sql = "SELECT d.*, u.u_email 
        FROM Dirt d 
        JOIN users u ON d.u_id = u.u_id 
        ORDER BY d.Date_Time DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>รหัสพนักงาน</th>
            <th>เลขที่ตัวอย่างห้องปฏิบัติการ TD</th>
            <th>หมายเลขตัวกรอง</th>
            <th>วันที่ทดสอบ</th>
            <th>หมายเลขเครื่องชั่ง</th>
            <th>หมายเลขตู้อบลมร้อน</th>
            <th>หมายเลขเตาต้มละลายยาง</th>
            <th>ตัวกรอง+สิ่งสกปรก (B)</th>
            <th>ตัวกรอง (A)</th>
            <th>ตัวอย่าง (W)</th>
            <th>ปริมาณสิ่งสกปรก %</th>
            <th>หมายเหตุ</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['dirt_id']}</td>
                <td>{$row['u_id']}</td>
                <td>{$row['td_name']}</td>
                <td>{$row['filter_number']}</td>
                <td>{$row['Date_Time']}</td>
                <td>{$row['Scale_number']}</td>
                <td>{$row['Hotair_number']}</td>
                <td>{$row['Boiler_number']}</td>
                <td>{$row['B_mass']}</td>
                <td>{$row['A_mass']}</td>
                <td>{$row['W_mass']}</td>
                <td>" . number_format($row['percentage'], 2) . "%</td>
                <td>{$row['note']}</td>
              </tr>";
    }

    // ✅ ปิด table หลังจากจบ loop แล้ว
    echo "</table>";
} else {
    echo "<p>⚠️ ยังไม่มีข้อมูลในระบบ</p>";
}

echo '<p><a href="dirt.php">🔙 กลับหน้าแบบฟอร์ม</a></p>';
?>
