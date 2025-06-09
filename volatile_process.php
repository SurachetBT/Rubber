<?php 
session_start ();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

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
            VALUES (1, '$TDname','$note', '$datetime', '$Scalenumber', '$Hotairnumber', '$Thicknessnumber', '$M1mass', '$M2mass', '$M3mass', '$M4mass', '$thickness_mm')";

    if (mysqli_query($conn, $sql)) {
        $percentage = $M1mass*$M3mass != 0 ? (($M2mass * $M4mass) / ($M1mass*$M3mass)-1) * 100 : 0;
        $volatile_id = mysqli_insert_id($conn);
        $update_sql = "UPDATE Volatile_matter SET percentage = '$percentage' WHERE volatile_id = '$volatile_id'";
        mysqli_query($conn, $update_sql);

        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        echo "<p>ค่า Percentage ที่ได้: " . number_format($percentage, 2) . "%</p>";
        echo '<p><a href="form.html">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }

?>