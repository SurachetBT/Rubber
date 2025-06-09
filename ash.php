
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>กรอกข้อมูล ash</title>
</head>
<body>
    <h2>กรอกข้อมูลการวัด Dirt</h2>
    <form action="ash_process.php" method="post">
        <label>TD Name:</label><br>
        <input type="text" name="td_name" required><br><br>

        <label>Filter Number:</label><br>
        <input type="text" name="filter_number" required><br><br>

        <label>Note:</label><br>
        <textarea name="note"></textarea><br><br>

        <label>Date Time:</label><br>
        <input type="datetime-local" name="Date_Time" required><br><br>

        <label>Scale Number:</label><br>
        <input type="text" name="Scale_number" required><br><br>

        <label>Hotair Number:</label><br>
        <input type="text" name="Hotair_number" required><br><br>

        <label>Boiler Number:</label><br>
        <input type="text" name="Boiler_number" required><br><br>

        <label>Before Mass (B_mass):</label><br>
        <input type="number" step="any" name="B_mass" required><br><br>

        <label>After Mass (A_mass):</label><br>
        <input type="number" step="any" name="A_mass" required><br><br>

        <label>Water Mass (W_mass):</label><br>
        <input type="number" step="any" name="W_mass" required><br><br>

        <input type="submit" name="submit" value="บันทึกข้อมูล">
    </form>
</body>
</html>
