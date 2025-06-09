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
    $Repeat_that = mysqli_real_escape_string($conn, $_POST['Repeat_that']);
    $A_mass = floatval($_POST['A_mass']);
    $W1_mass = floatval($_POST['W1_mass']);
    $W2_mass = floatval($_POST['W2_mass']);

    $sql = "INSERT INTO Solid (u_id, td_name, note, Date_Time, Repeat_that, A_mass, W1_mass, W2_mass)   
            VALUES ('$u_id', '$TDname', '$note', '$datetime', '$Repeat_that','$A_mass', '$W1_mass', '$W2_mass')";

    if (mysqli_query($conn, $sql)) {
        $percentage = $W1_mass- $W2_mass;
        $solid_id = mysqli_insert_id($conn);
        $update_sql = "UPDATE Solid SET percentage = '$percentage' WHERE solid_id = '$solid_id'";
        mysqli_query($conn, $update_sql);

         // 🔍 ดึงข้อมูลแถวที่เพิ่งบันทึก
        $result = mysqli_query($conn, "SELECT * FROM Solid WHERE solid_id = '$solid_id'");
        $row = mysqli_fetch_assoc($result);

        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        echo "<p>ค่า น้ำหนักตัวอย่างทดสอบ ที่ได้: " . number_format($percentage, 2) . "g</p>";

        // 📋 แสดงข้อมูลในตาราง
        echo "<h3>📄 ข้อมูลที่บันทึก</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>ID</th>
                <th>รหัสพนักงาน</th>
                <th>เลขที่ TD</th>
                <th>ซ้ำที่</th>
                <th>ป/ด/ว</th>
                <th>น้ำหนักจานเเก้ว(A)</th>
                <th>ก่อนเท(W1)</th>
                <th>หลังเท(W2)</th>
                <th>น้ำหนักตัวอย่างทดสอบ (g) </th>
                <th>หมายเหตุ</th>
              </tr>";
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
        echo "</table>";

        echo '<p><a href="solid.php">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }
}   

?>