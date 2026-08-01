<?php
//kết nối database
include_once("./connectdb.php");

//lấy data từ URL
$matacgia = $_GET['matacgia'];  

$sql = "SELECT * FROM tac_gia WHERE matacgia = '$matacgia'";
$resultSelect = mysqli_query($conn, $sql);
$rowresultCheck = mysqli_fetch_assoc($resultSelect);

if (isset($_POST['buttonCapnhat'])) {
    //lấy data từ bảng
    $matacgia = $_POST['textMaTacGia'];
    $tentacgia = $_POST["textTenTacGia"];
    $ngaysinh = $_POST["textNgaySinh"];
    $gioitinh = $_POST["selectGioiTinh"];
    $dienthoai = $_POST["textDienThoai"];
    $email = $_POST["textEmail"];
    $diachi = $_POST["textDiaChi"];

    $sql = "UPDATE tac_gia SET tentacgia = '$tentacgia' ,
                                ngaysinh='$ngaysinh' , 
                                gioitinh ='$gioitinh' , 
                                dienthoai = '$dienthoai' ,
                                 email='$email' , 
                                 diachi='$diachi' 
                                 WHERE matacgia='$matacgia';
                                 ";
    mysqli_query($conn , $sql);

    echo "<script>
        alert('cập nhật thành công');
        window.location='tacgia.php';
    </script>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sửa tác giả</title>
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
            border: 2px solid black;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            margin-top: 5px;
            /* chiều ngang 100% */
            width: 100%;
            /* Bo sát border như Excel */
            border-collapse: collapse;
            /* chỉnh font của chữ */
            font-family: Arial, Helvetica, sans-serif;
            /* làm border */
            border: 2px solid black;
            border-radius: 6px;
            overflow: visible;
            /* màu nền */
            background-color: #fff;
        }

        tr {
            border: 1px solid #ccc;
        }

        /* trỏ vào table sẽ hiện lên màu */
        td:hover {
            background-color: greenyellow;
        }

        /* code form */
        .formSearch {
            /* cho trong form search trình bày lần lượt theo chiều ngang */
            display: flex;
        }

        .button_sua {
            text-decoration: none;
            border: 1px solid black;
            border-radius: 3px;
            background-color: greenyellow;
            color: black;
        }

        .button_xoa {
            text-decoration: none;
            border: 1px solid black;
            border-radius: 3px;
            background-color: red;
            color: black;
        }
    </style>
</head>

<body>
    <form method="post" class="form" style="width: 500px; height: auto;">
        <h1>Thông tin tác giả</h1>
        <br>
        <input type="text" name="textMaTacGia" value="<?php echo $rowresultCheck['matacgia'] ?>" readonly>
        <br><br>
        <input type="text" name="textTenTacGia" placeholder="Tên tác giả"
            value="<?php echo $rowresultCheck['tentacgia'] ?>" required>
        <br><br>
        <input type="date" name="textNgaySinh" placeholder="Ngày sinh" value="<?php echo $rowresultCheck['ngaysinh'] ?>"
            required>
        <br><br>
        <label for="selectGioiTinh">Giới tính</label>
        <select name="selectGioiTinh" id="selectGioiTinh" required>
            <option value="Nam" <?php if ($rowresultCheck['gioitinh'] == 'Nam')
                echo 'selected'; ?>>Nam</option>
            <option value="Nữ" <?php if ($rowresultCheck['gioitinh'] == 'Nữ')
                echo 'selected'; ?>>Nữ</option>
        </select>
        <br><br>
        <input type="tel" name="textDienThoai" placeholder="Điện thoại"
            value="<?php echo $rowresultCheck['dienthoai'] ?>" required>
        <br><br>
        <input type="text" name="textEmail" placeholder="eMail" value="<?php echo $rowresultCheck['email'] ?>">
        <br><br>
        <input type="text" name="textDiaChi" placeholder="Địa chỉ" value="<?php echo $rowresultCheck['diachi'] ?>"
            required>
        <br><br>
        <button type="submit" name="buttonCapnhat">Cập nhật</button>
        <button type="button" onclick="window.location.href='../baitap_module5/CRUDbasic/tacgia.php'"> quay lại </button>
    </form>
</body>

</html>