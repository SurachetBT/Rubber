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
    $filternumber = mysqli_real_escape_string($conn, $_POST['filter_number']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $datetime = $_POST['Date_Time'];
    $Scalenumber = mysqli_real_escape_string($conn, $_POST['Scale_number']);
    $Hotairnumber = mysqli_real_escape_string($conn, $_POST['Hotair_number']);
    $Boilernumber = mysqli_real_escape_string($conn, $_POST['Boiler_number']);
    $Bmass = floatval($_POST['B_mass']);
    $Amass = floatval($_POST['A_mass']);
    $Wmass = floatval($_POST['W_mass']);

    $sql = "INSERT INTO Dirt (u_id, td_name, filter_number, note, Date_Time, Scale_number, Hotair_number, Boiler_number, B_mass, A_mass, W_mass)
            VALUES ('$u_id', '$TDname', '$filternumber', '$note', '$datetime', '$Scalenumber', '$Hotairnumber', '$Boilernumber', '$Bmass', '$Amass', '$Wmass')";

    if (mysqli_query($conn, $sql)) {
        $percentage = $Wmass != 0 ? (($Bmass - $Amass) / $Wmass) * 100 : 0;
        $dirt_id = mysqli_insert_id($conn);
        $update_sql = "UPDATE Dirt SET percentage = '$percentage' WHERE dirt_id = '$dirt_id'";
        mysqli_query($conn, $update_sql);

        // 🔍 ดึงข้อมูลแถวที่เพิ่งบันทึก
        $result = mysqli_query($conn, "SELECT * FROM Dirt WHERE dirt_id = '$dirt_id'");
        $row = mysqli_fetch_assoc($result);

        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        echo "<p>ค่า ปริมาณสิ่งสกปรก ที่ได้: " . number_format($percentage, 2) . "%</p>";

        // 📋 แสดงข้อมูลในตาราง
        echo "<h3>📄 ข้อมูลที่บันทึก</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>ID</th>
                <th>รหัสพนักงาน</th>
                <th>เลขที่ตัวอย่างห้องปฏิบัติการ TD</th>
                <th>หมายเลขตัวกรอง</th>
                <th>วันที่ทดสอบ</th>
                <th>หมายเลขเครื่องชั่ง</th>
                <th>หมายเลขตู้อบลมร้อน</th>
                <th>หมายเลขเตาต้มละลายยาง</th>
                <th>ตัวกรอง+สิ่งสกปรก(B)</th>
                <th>ตัวกรอง(A)</th>
                <th>ตัวอย่าง(W)</th>
                <th>ปริมาณสิ่งสกปรก % </th>
                <th>หมายเหตุ</th>
              </tr>";
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
        echo "</table>";

        echo '<p><a href="dirt.php">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }
}
?>

