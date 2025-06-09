<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ฟอร์มทดสอบการบันทึกสี</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #fffbe6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff3b0;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #b58900;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #7a5900;
        }

        input[type="text"],
        input[type="datetime-local"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 80px;
        }

        input[type="submit"] {
            background-color: #ffcc00;
            color: #333;
            border: none;
            padding: 12px 20px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #f0b400;
        }

        .buttons {
            margin-top: 20px;
            text-align: center;
        }

        .buttons a {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            background-color: #ffd966;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>กรอกข้อมูลเพื่อทดสอบการบันทึกสี</h2>
        <form action="color_process.php" method="post">
            <label for="Date_Time">วันที่ทดสอบ:</label>
            <input type="datetime-local" id="Date_Time" name="Date_Time" required>

            <label for="td_name">เลขที่ตัวอย่างห้องปฏิบัติการ TD:</label>
            <input type="text" id="td_name" name="td_name" required>

            <label for="color_comparison_number">หมายเลขเครื่องอัดเทียบสี:</label>
            <input type="text" id="color_comparison_number" name="color_comparison_number" required>

            <label for="Density_measurement_number">หมายเลขเครื่องวัดความหนา:</label>
            <input type="text" id="Density_measurement_number" name="Density_measurement_number" required>

            <label for="read_color">ค่าสีที่อ่านได้:</label>
            <input type="number" step="any" id="read_color" name="read_color" required>

            <label for="Density_mm">ความหนาแน่น (ก่อนอัด/หลังอัด):</label>
            <input type="number" step="any" id="Density_mm" name="Density_mm" required>

            <label for="note">หมายเหตุ:</label>
            <textarea id="note" name="note" rows="3" cols="40"></textarea>

            <input type="submit" name="submit" value="บันทึกข้อมูล">

            <div class="buttons">
                <a href="color_show.php">แสดงประวัติทั้งหมด</a>
                <a href="menu.php">กลับสู่หน้าแรก</a>
            </div>
        </form>
    </div>
</body>
</html>
