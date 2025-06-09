<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

echo "<h2>📚 บันทึกการทดสอบปริมาณเถ้า</h2>";

$sql = "SELECT a.*, u.u_email 
        FROM Ash a 
        JOIN users u ON a.u_id = u.u_id 
        ORDER BY a.Date_Time DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>รหัสพนักงาน</th>
            <th>เลขที่ตัวอย่างห้องปฏิบัติการ TD</th>
            <th>หมายเลขถ้วย</th>
            <th>ถ้วย+เถ้า (B)</th>
            <th>ถ้วย (A)</th>
            <th>ตัวอย่าง (W)</th>
            <th>หมายเหตุ</th>
            <th>วันที่ทดสอบ</th>
            <th>หมายเลขเครื่องชั่ง</th>
            <th>หมายเลขเตาเผาอุณหภูมิสูง</th>
            <th>ปริมาณเถ้า %</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['ash_id']}</td>
                <td>{$row['u_id']}</td>
                <td>{$row['td_name']}</td>
                <td>{$row['filter_number']}</td>
                <td>{$row['B_mass']}</td>
                <td>{$row['A_mass']}</td>
                <td>{$row['W_mass']}</td>
                <td>{$row['note']}</td>
                <td>{$row['Date_Time']}</td>
                <td>{$row['Scale_number']}</td>
                <td>{$row['Hotair_number']}</td>
                <td>" . number_format($row['percentage'], 2) . "%</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>⚠️ ยังไม่มีข้อมูลในระบบ</p>";
}

echo '<p><a href="ash.php">🔙 กลับหน้าแบบฟอร์ม</a></p>';
?>
