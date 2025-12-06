<?php
// Bắt đầu session ở đầu mỗi file PHP
session_start();

// Thiết lập thông tin đăng nhập giả định
$valid_username = "admin";
$valid_password = "password123";

$error = '';

// Kiểm tra nếu form đã được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Kiểm tra thông tin đăng nhập
    if ($username === $valid_username && $password === $valid_password) {
        // Đăng nhập thành công, thiết lập session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Chuyển hướng đến trang welcome
        header("location: welcome.php");
        exit;
    } else {
        // Đăng nhập thất bại
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}

// Nếu đã có session đang hoạt động, chuyển hướng về welcome.php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: welcome.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: white; padding: 20px 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn-login { background-color: #5cb85c; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        .btn-login:hover { background-color: #4cae4c; }
        .error-message { color: red; text-align: center; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>ĐĂNG NHẬP HỆ THỐNG</h2>
        <?php if (!empty($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Đăng nhập</button>
        </form>
    </div>
</body>
</html>