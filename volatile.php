<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>บันทึกการทดสอบปริมาณสิ่งระเหย</title>
  <style>
    body {
      font-family: "Arial", sans-serif;
      background-color: #f0f8ff;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 700px;
      margin: 40px auto;
      background-color: #e0f2ff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #005792;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #003b73;
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
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 12px 20px;
      margin-top: 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .buttons {
      margin-top: 20px;
      text-align: center;
    }

    .buttons a {
      display: inline-block;
      margin: 5px;
      padding: 10px 20px;
      background-color: #a2d2ff;
      color: #003049;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .buttons a:hover {
      background-color: #90cdf4;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>บันทึกการทดสอบปริมาณสิ่งระเหย</h2>
    <form action="volatile_process.php" method="post">

      <label>วันที่ทดสอบ:</label>
      <input type="datetime-local" name="Date_Time" required>

      <label>หมายเลขเครื่องชั่ง:</label>
      <input type="text" name="Scale_number" required>

      <label>หมายเลขตู้อบลมร้อน:</label>
      <input type="text" name="Hotair_number" required>

      <label>หมายเลขเครื่องวัดความหนา:</label>
      <input type="text" name="Thickness_number" required>

      <label>เลขที่ตัวอย่างห้องปฏิบัติการ TD:</label>
      <input type="text" name="td_name" required>

      <label>ก่อนบด (M1):</label>
      <input type="number" step="any" name="M1_mass" required>

      <label>หลังบด (M2):</label>
      <input type="number" step="any" name="M2_mass" required>

      <label>ก่อนอบ (M3):</label>
      <input type="number" step="any" name="M3_mass" required>

      <label>หลังอบ (M4):</label>
      <input type="number" step="any" name="M4_mass" required>

      <label>ความหนาหลังบด (มม.):</label>
      <input type="number" step="any" name="thickness_mm" required>

      <label>หมายเหตุ:</label>
      <textarea name="note"></textarea>

      <input type="submit" name="submit" value="บันทึกข้อมูล">

      <div class="buttons">
        <a href="volatile_show.php">แสดงประวัติทั้งหมด</a>
        <a href="menu.php">กลับสู่หน้าแรก</a>
      </div>
    </form>
  </div>
</body>
</html>
