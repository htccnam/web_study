<?php
session_start(); // BẮT BUỘC CÓ
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>
        Chào mừng
        <?php
        if (isset($_SESSION["dangnhap"]))
            echo $_SESSION["dangnhap"];
        else
            echo "Khách";
        ?>
    </h1>

    <p>Bạn đã đăng nhập thành công!</p>

    <a href="./login.php">Đăng xuất</a>

</body>

</html>