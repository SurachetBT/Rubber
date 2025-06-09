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
    $Scalenumber = mysqli_real_escape_string($conn, $_POST['Scale_number']);
    $shreddernumber = mysqli_real_escape_string($conn, $_POST['shredder_number']);
    $temperaturenumber = floatval($_POST['temperature_number']);
    $C_concentration = floatval($_POST['C_concentration']);
    $B_nitrate = floatval($_POST['B_nitrate']);
    $A_nitrate = floatval($_POST['A_nitrate']);
    $V1_nitrate = floatval($_POST['V1_nitrate']);
    $V2_nitrate  = floatval($_POST['V2_nitrate']);
    $W_mass  = floatval($_POST['W_mass']);

    $sql = "INSERT INTO Nitrogen (u_id, td_name, note, Date_Time, Scale_number, shredder_number, temperature_number, C_concentration, B_nitrate, A_nitrate, V1_nitrate, V2_nitrate, W_mass)   
            VALUES ('$u_id', '$TDname', '$note', '$datetime', '$Scalenumber', '$shreddernumber', '$temperaturenumber', '$C_concentration', '$B_nitrate', '$A_nitrate', '$V1_nitrate', '$V2_nitrate', '$W_mass')";
        
        if (mysqli_query($conn, $sql)) {
        $percentage = $W_mass != 0 ? (($V1_nitrate - $V2_nitrate)* 2 * $C_concentration * 1.4/ $W_mass): 0;
        $nitrogen_id = mysqli_insert_id($conn);
        $update_sql = "UPDATE Nitrogen SET percentage = '$percentage' WHERE nitrogen_id = '$nitrogen_id'";
        mysqli_query($conn, $update_sql);

        // 🔍 ดึงข้อมูลแถวที่เพิ่งบันทึก
        $result = mysqli_query($conn, "SELECT * FROM Nitrogen WHERE nitrogen_id = '$nitrogen_id'");
        $row = mysqli_fetch_assoc($result);

        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        echo "<p>ค่า ปริมาณไนโตรเจน ที่ได้: " . number_format($percentage, 2) . "%</p>";

        // 📋 แสดงข้อมูลในตาราง
        echo "<h3>📄 ข้อมูลที่บันทึก</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>ID</th>
                <th>รหัสพนักงาน</th>
                <th>เลขที่ตัวอย่างห้องปฏิบัติการ TD</th>
                <th>วันที่ทดสอบ</th>
                <th>หมายเลขเครื่องชั่ง</th>
                <th>หมายเลขเครื่องย่อยตัวอย่าง</th>
                <th>อุณหภูมิขณะไตเตรท</th>
                <th>ความเข้มข้นของกรดซัลฟิวริกที่ใช้ไตเตรท</th>
                <th>หลังไตเตรท(B)</th>
                <th>ก่อนไตเตรท(A)</th>
                <th>V1 [B-A]</th>
                <th>V2 [B-A]</th>
                <th>น้ำหนักตัวอย่าง(W)</th>
                <th>ปริมาณไนโตรเจน % </th>
                <th>หมายเหตุ</th>
              </tr>";
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
        echo "</table>";

        echo '<p><a href="nitrogen.php">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }
}
?>