<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ฟอร์มทดสอบการบันทึกสี</title>
</head>
<body>
    <h2>กรอกข้อมูลเพื่อทดสอบการบันทึกสี</h2>
    <form action="color_process.php" method="post">
        <label for="td_name">ชื่อการทดลอง:</label><br>
        <input type="text" id="td_name" name="td_name" required><br><br>

        <label for="note">หมายเหตุ:</label><br>
        <textarea id="note" name="note" rows="3" cols="40"></textarea><br><br>

        <label for="Date_Time">วันที่และเวลา:</label><br>
        <input type="datetime-local" id="Date_Time" name="Date_Time" required><br><br>

        <label for="color_comparison_number">หมายเลขการเปรียบเทียบสี:</label><br>
        <input type="text" id="color_comparison_number" name="color_comparison_number" required><br><br>

        <label for="Density_measurement_number">หมายเลขการวัดความหนาแน่น:</label><br>
        <input type="text" id="Density_measurement_number" name="Density_measurement_number" required><br><br>

        <label for="read_color">ค่าที่อ่านได้ (Read Color):</label><br>
        <input type="number"step="any" id="read_color" name="read_color" required><br><br>

        <label for="Density_mm">ค่าความหนาแน่น (Density mm):</label><br>
        <input type="number"step="any" id="Density_mm" name="Density_mm" required><br><br>

        <input type="submit" name="submit" value="บันทึกข้อมูล">
    </form>
</body>
</html>
