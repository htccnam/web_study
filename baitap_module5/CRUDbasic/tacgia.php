<?php
include_once("./connectdb.php");
//sử lý nút lưu
if (isset($_POST["buttonLuu"])) {
    //isset kiểm tra dữ liệu hay là nút có tồn tại không
    //$_POST["buttonLuu"] là dữ liệu gửi từ form khi nhấn nút
    $matacgia = $_POST["textMaTacGia"];
    $tentacgia = $_POST["textTenTacGia"];
    $ngaysinh = $_POST["textNgaySinh"];
    $gioitinh = $_POST["selectGioiTinh"];
    $dienthoai = $_POST["textDienThoai"];
    $email = $_POST["textEmail"];
    $diachi = $_POST["textDiaChi"];

    $sqlInsert = "INSERT INTO tac_gia
                      VALUES ('$matacgia', '$tentacgia', '$ngaysinh', '$gioitinh', '$dienthoai', '$email', '$diachi')";
    $ketqua = mysqli_query($conn, $sqlInsert) or die("Lỗi truy vấn thêm tác giả!");
    if ($ketqua) {
        echo "<script>alert('Thêm tác giả thành công!')</script>";
    } else {
        echo "<script>alert('Thêm tác giả thất bại!')</script>";
    }
}

//sử lý nút tìm kiếm
$text_timkiem = "";
if (isset($_GET['btn_timkiem'])) {    //isset là tồn tại 
    $text_timkiem = $_GET["txt_timkiem"];
}
$sqlSelect = "SELECT * FROM tac_gia WHERE matacgia LIKE '%$text_timkiem%'";
$resultSelect = mysqli_query($conn, $sqlSelect);
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
        .button_mini{
            text-decoration: none;
            border: 1px solid black;
            border-radius: 3px;
            background-color: greenyellow; 
            color: black;
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

    <form method="GET" class="formSearch">
        <!-- 
            id	:JavaScript, CSS → KHÔNG gửi lên server
            name :CODE php , Gửi dữ liệu lên server, backend mapping (bắt buộc) -->
        <input type="text" name="txt_timkiem" value="<?php echo $text_timkiem ?>">
        <!-- vì button không gửi dữ liệu gì cả nên ta chỉ khai báo id để JavaScript và CSS làm việc thôi -->
        <button name="btn_timkiem">Tìm kiếm</button>
    </form>

    <table>
        <thead>
            <th>MÃ TÁC GIẢ</th>
            <th>TÊN TÁC GIẢ</th>
            <th>NGÀY SINH</th>
            <th>GIỚI TÍNH</th>
            <th>ĐIỆN THOẠI</th>
            <th>EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>HÀNH ĐỘNG</th>
        </thead>
        <tbody>
            <!-- kiểm tra kết quả truy vấn -->
            <?php
            if ($resultSelect && mysqli_num_rows($resultSelect) > 0) {
                while ($row = mysqli_fetch_row($resultSelect)) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3] . "</td>";
                    echo "<td>" . $row[4] . "</td>";
                    echo "<td>" . $row[5] . "</td>";
                    echo "<td>" . $row[6] . "</td>";
                    // Thêm nút Sửa, truyền mã tác giả qua URL param ?id_sua=...
                    //chạy sẽ ra : <a href='?id_button=TG01' class='button_mini'>Sửa</a>
                    echo "<td><a href='?id_button= ".$row[0]."'class=button_mini>Sửa</a></td>";
                    echo "<td><a href='?id_button=".$row[0]. "'class=button_mini>Xóa</a></td>";
                }
            }
            ?>

        </tbody>
    </table>
</body>

</html>