<?php 
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

if (isset($_POST['submit'])) {
    $TDname = mysqli_real_escape_string($conn, $_POST['td_name']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $datetime = $_POST['Date_Time'];
    $Repeat_that = mysqli_real_escape_string($conn, $_POST['Repeat_that']);
    $A_mass = floatval($_POST['A_mass']);
    $W1_mass = floatval($_POST['W1_mass']);
    $W2_mass = floatval($_POST['W2_mass']);

    $sql = "INSERT INTO Solid (u_id, td_name, note, Date_Time, Repeat_that, A_mass, W1_mass, W2_mass)   
            VALUES (1, '$TDname', '$note', '$datetime', '$Repeat_that','$A_mass', '$W1_mass', '$W2_mass')";

    if (mysqli_query($conn, $sql)) {
        $percentage = $W1_mass- $W2_mass;
        $dirt_id = mysqli_insert_id($conn);
        $update_sql = "UPDATE Solid SET percentage = '$percentage' WHERE solid_id = '$dirt_id'";
        mysqli_query($conn, $update_sql);

        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        echo "<p>ค่า Percentage ที่ได้: " . number_format($percentage, 4) . "</p>";
        echo '<p><a href="form.html">กรอกใหม่อีกครั้ง</a></p>';
    } else {
        echo "<p>❌ เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</p>";
    }
}   

?>