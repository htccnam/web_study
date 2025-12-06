<?php
  session_start();//Khởi tạo session
if(isset($_POST["btndn"])){
    $_SESSION["dangnhap"]=$_POST["txtdn"];
    header("location: welcome.php");//chuyển hướng trang web
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăg nhập</title>
    <style>
    *{
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body{
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg,#0f172a,#1e3a8a);
    }

    .login-box{
      width: 350px;
      padding: 30px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,.2);
    }

    h2{
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group{
      margin-bottom: 15px;
    }

    label{
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
    }

    input{
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      outline: none;
    }

    input:focus{
      border-color: #2563eb;
    }

    button{
      width: 100%;
      padding: 10px;
      background: #2563eb;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 15px;
      cursor: pointer;
    }

    button:hover{
      background: #1d4ed8;
    }

    .extra{
      text-align: center;
      margin-top: 10px;
      font-size: 14px;
    }

    .extra a{
      text-decoration: none;
      color: #2563eb;
    }
  </style>
</head>
<body>
     <div class="login-box">
    <h2>ĐĂNG NHẬP</h2>

    <form method="post">
      <div class="form-group">
        <label>Tên đăng nhập / Email</label>
        <input type="text" id="username" name="txtdn" placeholder="Nhập tên hoặc email">
      </div>

      <div class="form-group">
        <label>Mật khẩu</label>
        <input type="password" id="password"name="txtmk" placeholder="Nhập mật khẩu">
      </div>

      <button type="submit" name="btndn">Đăng nhập</button>

      <div class="extra">
        <p>Chưa có tài khoản? <a href="#">Đăng ký</a></p>
      </div>
    </form>
  </div>

  <script>
    function login(e){
      e.preventDefault();

      let user = document.getElementById("username").value;
      let pass = document.getElementById("password").value;

      if(user === "" || pass === ""){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return;
      }

      // Demo kiểm tra
      if(user === "admin" && pass === "123456"){
        alert("Đăng nhập thành công!");
      }else{
        alert("Sai tài khoản hoặc mật khẩu!");
      }
    }
  </script>
</body>
</html>