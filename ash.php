<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>กรอกข้อมูล Ash</title>
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
        <h2>บันทึกการทดสอบปริมาณเถ้า</h2>
        <form action="ash_process.php" method="post">

            <label>วันที่ทดสอบ:</label>
            <input type="datetime-local" name="Date_Time" required>

            <label>หมายเลขเครื่องชั่ง:</label>
            <input type="text" name="Scale_number" required>

            <label>หมายเลขเตาเผาอุณหภูมิสูง:</label>
            <input type="text" name="Hotair_number" required>

            <label>เลขที่ตัวอย่างห้องปฏิบัติการ TD:</label>
            <input type="text" name="td_name" required>

            <label>หมายเลขถ้วย:</label>
            <input type="text" name="filter_number" required>

            <label>ถ้วย + เถ้า (B):</label>
            <input type="number" step="any" name="B_mass" required>

            <label>ถ้วย (A):</label>
            <input type="number" step="any" name="A_mass" required>

            <label>ตัวอย่าง (W):</label>
            <input type="number" step="any" name="W_mass" required>

            <label>หมายเหตุ:</label>
            <textarea name="note"></textarea>

            <input type="submit" name="submit" value="บันทึกข้อมูล">

            <div class="buttons">
                <a href="showash.php">แสดงประวัติทั้งหมด</a>
                <a href="menu.php">กลับสู่หน้าแรก</a>
            </div>

        </form>
    </div>
</body>
</html>
