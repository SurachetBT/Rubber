<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>กรอกข้อมูลการวัด Dirt</h2>
    <form action="volatile_process.php" method="post">
        <label>TD Name:</label><br>
        <input type="text" name="td_name" required><br><br>

        <label>Note:</label><br>
        <textarea name="note"></textarea><br><br>

        <label>Date Time:</label><br>
        <input type="datetime-local" name="Date_Time" required><br><br>

        <label>Scale Number:</label><br>
        <input type="text" name="Scale_number" required><br><br>

        <label>Hotair Number:</label><br>
        <input type="text" name="Hotair_number" required><br><br>

        <label>Thickness number:</label><br>
        <input type="text" name="Thickness_number" required><br><br>

        <label>Before Mass (M1_mass):</label><br>
        <input type="number" step="any" name="M1_mass" required><br><br>

        <label>After Mass (M2_mass):</label><br>
        <input type="number" step="any" name="M2_mass" required><br><br>

        <label>Water Mass (M3_mass):</label><br>
        <input type="number" step="any" name="M3_mass" required><br><br>

        <label>Water Mass (M4_mass):</label><br>
        <input type="number" step="any" name="M4_mass" required><br><br>

        <label>Water Mass (thickness_mm):</label><br>
        <input type="number" step="any" name="thickness_mm" required><br><br>


        <input type="submit" name="submit" value="บันทึกข้อมูล">
    </form>
</body>
</html>