<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>แบบฟอร์มทดสอบไนโตรเจน</title>
</head>
<body>
  <h2>กรอกข้อมูลการวิเคราะห์ไนโตรเจน</h2>
  <form action="nitrogen_process.php" method="POST">
    <label>TD Name:</label><br>
    <input type="text" name="td_name" required><br><br>

    <label>Note:</label><br>
    <textarea name="note"></textarea><br><br>

    <label>Date & Time:</label><br>
    <input type="datetime-local" name="Date_Time" required><br><br>

    <label>Scale Number:</label><br>
    <input type="text" name="Scale_number"><br><br>

    <label>Shredder Number:</label><br>
    <input type="text" name="shredder_number"><br><br>

    <label>Temperature Number (°C):</label><br>
    <input type="number" step="any" name="temperature_number" required><br><br>

    <label>C Concentration:</label><br>
    <input type="number" step="any" name="C_concentration" required><br><br>

    <label>B Nitrate:</label><br>
    <input type="number" step="any" name="B_nitrate" required><br><br>

    <label>A Nitrate:</label><br>
    <input type="number" step="any" name="A_nitrate" required><br><br>

    <label>V1 Nitrate (mL):</label><br>
    <input type="number" step="any" name="V1_nitrate" required><br><br>

    <label>V2 Nitrate (mL):</label><br>
    <input type="number" step="any" name="V2_nitrate" required><br><br>

    <label>W Mass (g):</label><br>
    <input type="number" step="any" name="W_mass" required><br><br>

    <input type="submit" name="submit" value="บันทึกข้อมูล">
  </form>
</body>
</html>
