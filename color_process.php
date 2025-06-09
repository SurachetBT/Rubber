<?php
session_start();
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

if (isset($_POST['submit'])) {
    $TDname = mysqli_real_escape_string($conn, $_POST['td_name']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $datetime = $_POST['Date_Time'];
    $color_comparison_number = mysqli_real_escape_string($conn, $_POST['color_comparison_number']);
    $Density_measurement_number = mysqli_real_escape_string($conn, $_POST['Density_measurement_number']);
    $read_color = floatval($_POST['read_color']);
    $Density_mm = floatval($_POST['Density_mm']);
    
    $sql = "INSERT INTO Color (u_id, td_name, note, Date_Time, color_comparison_number, Density_measurement_number, read_color, Density_mm)   
            VALUES (1, '$TDname', '$note', '$datetime', '$color_comparison_number', '$Density_measurement_number', '$read_color', '$Density_mm')";
       
       if (mysqli_query($conn, $sql)) {
        echo "<p>✅ บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        }
}
?>