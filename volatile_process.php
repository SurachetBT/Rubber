<?php 
session_start ();
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
    $Hotairnumber = mysqli_real_escape_string($conn, $_POST['Hotair_number']);
    $Thicknessnumber = mysqli_real_escape_string($conn, $_POST['Thickness_number']);
    $M1mass = floatval($_POST['M1_mass']);
    $M2mass = floatval($_POST['M2_mass']);
    $M3mass = floatval($_POST['M3_mass']);
    $M4mass = floatval($_POST['M4_mass']);
    $thickness_mm  = floatval($_POST['thickness_mm']);
    }

    $sql = "INSERT INTO Volatile_matter (u_id, td_name,note, Date_Time, Scale_number, Hotair_number, Thickness_number, M1_mass, M2_mass, M3_mass, M4_mass, thickness_mm)   
            VALUES ('$u_id','$TDname','$note', '$datetime', '$Scalenumber', '$Hotairnumber', '$Thicknessnumber', '$M1mass', '$M2mass', '$M3mass', '$M4mass', '$thickness_mm')";

    if (mysqli_query($conn, $sql)) {
        $percentage = $M1mass*$M3mass != 0 ? (($M2mass * $M4mass) / ($M1mass*$M3mass)-1) * 100 : 0;
        $volatile_id = mysqli_insert_id($conn);
        $update_sql = "UPDATE Volatile_matter SET percentage = '$percentage' WHERE volatile_id = '$volatile_id'";
        mysqli_query($conn, $update_sql);

        $result = mysqli_query($conn, "SELECT * FROM Volatile_matter WHERE volatile_id = '$volatile_id'");
        $row = mysqli_fetch_assoc($result);

        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        echo "<p>ค่า ปริมาณสิ่งระเหย ที่ได้: " . number_format($percentage, 2) . "%</p>";

        // 📋 แสดงข้อมูลในตาราง
        echo "<h3>📄 ข้อมูลที่บันทึก</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>ID</th>
                <th>รหัสพนักงาน</th>
                <th>เลขที่ตัวอย่างห้องปฏิบัติการ TD</th>
                <th>วันที่ทดสอบ</th>
                <th>หมายเลขเครื่องชั่ง</th>
                <th>หมายเลขตู้อบลมร้อน</th>
                <th>หมายเลขเครื่องวัดความหนา</th>
                <th>ก่อนบด (M1)</th>
                <th>หลังบด (M2)</th>
                <th>ก่อนอบ (M3)</th>
                <th>หลังอบ (M4)</th>
                <th>ความหนาหลังบด</th>
                <th>ปริมาณสิ่งระเหย % </th>
                <th>หมายเหตุ</th>
              </tr>";
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
                <td>" . number_format($row['percentage'], 2) . "%</td>
                <td>{$row['note']}</td>
              </tr>";
        echo "</table>";

        echo '<p><a href="volatile.php">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }

?>