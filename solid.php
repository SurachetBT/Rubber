<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>แบบฟอร์มบันทึกการทดสอบปริมาณของแข็งทั้งหมด</title>
  <style>
    body {
      font-family: "Arial", sans-serif;
      background-color: #f0fff4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #d4f8e8;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #007f5f;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #004b23;
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
      background-color: #38b000;
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
      background-color: #2a8c00;
    }

    .buttons {
      margin-top: 20px;
      text-align: center;
    }

    .buttons a {
      display: inline-block;
      margin: 5px;
      padding: 10px 20px;
      background-color: #95d5b2;
      color: #1b4332;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .buttons a:hover {
      background-color: #74c69d;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>บันทึกการทดสอบปริมาณของแข็งทั้งหมด</h2>
    <form action="solid_process.php" method="post">
      <label for="Date_Time">วันที่และเวลา:</label>
      <input type="datetime-local" id="Date_Time" name="Date_Time" required>

      <label for="td_name">เลขที่ TD:</label>
      <input type="text" id="td_name" name="td_name" required>

      <label for="Repeat_that">ซ้ำที่:</label>
      <input type="number" id="Repeat_that" name="Repeat_that" required>

      <label for="A_mass">น้ำหนักจานแก้ว (A):</label>
      <input type="number" step="any" id="A_mass" name="A_mass" required>

      <label for="W1_mass">ก่อนเท (W1):</label>
      <input type="number" step="any" id="W1_mass" name="W1_mass" required>

      <label for="W2_mass">หลังเท (W2):</label>
      <input type="number" step="any" id="W2_mass" name="W2_mass" required>

      <label for="note">หมายเหตุ:</label>
      <textarea id="note" name="note"></textarea>

      <input type="submit" name="submit" value="บันทึกข้อมูล">

      <div class="buttons">
        <a href="solid_show.php">แสดงประวัติทั้งหมด</a>
        <a href="menu.php">กลับสู่หน้าแรก</a>
      </div>
    </form>
  </div>
</body>
</html>
