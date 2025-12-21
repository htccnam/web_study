<?php 
include_once ("connect.php");


$sql = select * from where $tentacgia
$resultSelect = mysqli_select_db()

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 500px;
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

    </style>
</head>

<body>
    <form method="post" class="form" style="width: 500px; height: auto;">
        <h1>nhập tác giả</h1>
        
        <input type="text" name="matacgia" placeholder="mã tác giả" required>
        <br>
        <input type="text" name='tentacgia' placeholder="tên tác giả" required>
        <br>
        <input type="date" name='ngaysinh' required>
        <br>
        <label for="selectGioitinh">chọn giới tính</label>
        <select name="selectgioitinh" id="selectgioitinh">
            <option value="gioitinh">Nam</option>
            <option value="gioitinh">Nữ</option>
        </select>
        <input type="number" name="dienthoai" placeholder="điện thoại" required>
        <input type="text" name="email" placeholder="email" required>
        <input type="text" name="diachi" placeholder="diachi" required>
        <button id="button" name="buttonLuu">lưu</button>
    </form>
    <form method="get" style="display: flex;">
        <input type="text" name="txtTimkiem" placeholder="tìm kiếm theo mã">
        <button class="button" name="buttonTimkiem">tìm kiếm</button>
    </form>
    <br>
    <table>
        <thead>
            <th>mã tác giả</th>
            <th>tên tác giả</th>
            <th>ngày sinh</th>
            <th>giới tính</th>
            <th>điện thoại</th>
            <th>email</th>
            <th>địa chỉ</th>
        </thead>
        
    </table>
</body>

</html>