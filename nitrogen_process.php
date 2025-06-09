<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

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
            VALUES (1, '$TDname', '$note', '$datetime', '$Scalenumber', '$shreddernumber', '$temperaturenumber', '$C_concentration', '$B_nitrate', '$A_nitrate', '$V1_nitrate', '$V2_nitrate', '$W_mass')";
            if (mysqli_query($conn, $sql)) {
        $percentage = $Wmass != 0 ? (($V1_nitrate - $V2_nitrate)* 2 * $C_concentration * 1.4/ $Wmass): 0;
        $dirt_id = mysqli_insert_id($conn);
        $update_sql = "UPDATE Nitrogen SET percentage = '$percentage' WHERE nitrogen_id = '$dirt_id'";
        mysqli_query($conn, $update_sql);

        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        echo "<p>ค่า Percentage ที่ได้: " . number_format($percentage, 2) . "%</p>";
        echo '<p><a href="form.html">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }
}
?>