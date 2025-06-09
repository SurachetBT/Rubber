<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>Menu</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: url('uploads/back.jpg');
      background-size: cover;
      background-position: center;
      font-family: 'Arial', sans-serif;
    }

    .menu-container {
      display: flex;
      flex-direction: column;
      gap: 15px;
      align-items: center;
      background-color: rgba(255, 255, 255, 0.85);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .menu-button {
      display: flex;
      align-items: center;
      padding: 10px 25px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 18px;
      color: #000;
      text-decoration: none;
      width: 300px;
      box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
      justify-content: flex-start;
      transition: transform 0.3s;
    }

    .menu-button:hover {
      transform: scale(1.05);
    }

    .circle {
      width: 30px;
      height: 30px;
      background: radial-gradient(circle, #ccc, #999);
      border-radius: 50%;
      margin-right: 15px;
    }

    .red-orange {
      background: linear-gradient(to right, #ff5f2e, #ffcc70);
      border: 3px solid #ff5f2e;
    }

    .purple {
      background: linear-gradient(to right, #c471f5, #fa71cd);
      border: 3px solid #a644e5;
    }

    .yellow {
      background: linear-gradient(to right, #ffe259, #ffa751);
      border: 3px solid #e7b500;
    }

    .blue {
      background: linear-gradient(to right, #74ebd5, #9face6);
      border: 3px solid #3db2ff;
    }

    .pink {
      background: linear-gradient(to right, #fbc2eb, #a6c1ee);
      border: 3px solid #e182e6;
    }

    .search-form {
      display: flex;
      flex-direction: row;
      gap: 10px;
      align-items: center;
      margin-top: 10px;
    }

    .search-form input[type="text"] {
      padding: 10px 15px;
      border-radius: 20px;
      border: 2px solid #ccc;
      width: 200px;
      transition: 0.3s;
    }

    .search-form input[type="text"]:focus {
      border-color: #ff5f2e;
      outline: none;
      box-shadow: 0 0 5px rgba(255, 95, 46, 0.5);
    }

    .search-form button {
      padding: 10px 20px;
      border: none;
      font-weight: bold;
      font-size: 16px;
      border-radius: 20px;
      cursor: pointer;
      background: linear-gradient(to right, #ff5f2e, #ffcc70);
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s;
    }

    .search-form button:hover {
      transform: scale(1.05);
    }

  </style>
</head>
<body>
      <div class="menu-container">
    <a href="dirt.php" class="menu-button blue"><div class="circle"></div>บันทึกการทดสอบปริมาณสิ่งสกปรก</a>
    <a href="nitrogen.php" class="menu-button purple"><div class="circle"></div>บันทึกการทดสอบไนโตรเจน</a>
    <a href="solid.php" class="menu-button yellow"><div class="circle"></div>บันทึกการทดสอบปริมาณของเเข็งทั้งหมด</a>
    <a href="volatile.php" class="menu-button blue"><div class="circle"></div>บันทึกการทดสอบปริมาณสิ่งระเหย</a>
    <a href="ash.php" class="menu-button red-orange"><div class="circle"></div>บันทึกการทดสอบปริมาณเถ้า</a>
    <a href="color.php" class="menu-button pink"><div class="circle"></div>กรอกข้อมูลเพื่อทดสอบการบันทึกสี</a>
    <a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่?');">🚪ออกจากระบบ</a>

  </div>
</body>
</html>
