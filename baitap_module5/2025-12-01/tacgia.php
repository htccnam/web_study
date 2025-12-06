<?php
include_once("./connectdb.php");
if (isset($_POST["buttonLuu"])) {
    $matacgia = $_POST["textMaTacGia"];
    $tentacgia = $_POST["textTenTacGia"];
    $ngaysinh = $_POST["textNgaySinh"];
    $gioitinh = $_POST["selectGioiTinh"];
    $dienthoai = $_POST["textDienThoai"];
    $email = $_POST["textEmail"];
    $diachi = $_POST["textDiaChi"];

    $sqlInsert = "INSERT INTO 1
                      VALUES ('$matacgia', '$tentacgia', '$ngaysinh', '$gioitinh', '$dienthoai', '$email', '$diachi')";
    $ketqua = mysqli_query($conn, $sqlInsert) or die("Lỗi truy vấn thêm tác giả!");
    if ($ketqua) {
        echo "<script>alert('Thêm tác giả thành công!')</script>";
    } else {
        echo "<script>alert('Thêm tác giả thất bại!')</script>";
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: greenyellow;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form method="post" class="form" style="width: 500px; height: auto;">
        <h1>Thông tin tác giả</h1>
        <input type="text" name="textMaTacGia" placeholder="Mã tác giả" required>
        <br><br>
        <input type="text" name="textTenTacGia" placeholder="Tên tác giả" required>
        <br><br>
        <input type="date" name="textNgaySinh" placeholder="Ngày sinh" required>
        <br><br>
        <label for="selectGioiTinh">Giới tính</label>
        <select name="selectGioiTinh" id="selectGioiTinh" required>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
        <br><br>
        <input type="tel" name="textDienThoai" placeholder="Điện thoại" required>
        <br><br>
        <input type="text" name="textEmail" placeholder="eMail">
        <br><br>
        <input type="text" name="textDiaChi" placeholder="Địa chỉ" required>
        <br><br>
        <button type="submit" name="buttonLuu">Lưu</button>
    </form>
</body>

</html>