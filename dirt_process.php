<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

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
        VALUES (1, '$TDname', '$filternumber', '$note', '$datetime', '$Scalenumber', '$Hotairnumber', '$Boilernumber', '$Bmass', '$Amass', '$Wmass')";

    if (mysqli_query($conn, $sql)) {
        $percentage = $Wmass != 0 ? (($Bmass - $Amass) / $Wmass) * 100 : 0;
        $dirt_id = mysqli_insert_id($conn);
        $update_sql = "UPDATE Dirt SET percentage = '$percentage' WHERE dirt_id = '$dirt_id'";
        mysqli_query($conn, $update_sql);

        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        echo "<p>ค่า Percentage ที่ได้: " . number_format($percentage, 2) . "%</p>";
        echo '<p><a href="form.html">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }
}
?>
