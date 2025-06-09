<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แบบฟอร์มบันทึกข้อมูลการชั่งน้ำหนัก</title>
</head>
<body>
    <h2>กรอกข้อมูลตัวอย่าง</h2>
    <form action="dirt_process.php" method="post">
        <label for="td_name">ชื่อการทดลอง:</label><br>
        <input type="text" id="td_name" name="td_name" required><br><br>

        <label for="note">หมายเหตุ:</label><br>
        <textarea id="note" name="note"></textarea><br><br>

        <label for="Date_Time">วันที่และเวลา:</label><br>
        <input type="datetime-local" id="Date_Time" name="Date_Time" required><br><br>

        <label for="Repeat_that">ครั้งที่:</label><br>
        <input type="number" id="Repeat_that" name="Repeat_that" required><br><br>

        
        <label for="A_mass">มวล A (g):</label><br>
        <input type="number" step="any" id="A_mass" name="A_mass" required><br><br>

        <label for="W1_mass">มวล W1 (g):</label><br>
        <input type="number" step="any" id="W1_mass" name="W1_mass" required><br><br>

        <label for="W2_mass">มวล W2 (g):</label><br>
        <input type="number" step="any" id="W2_mass" name="W2_mass" required><br><br>

        <input type="submit" name="submit" value="บันทึกข้อมูล">
    </form>
</body>
</html>
