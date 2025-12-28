<?php
include_once "./connectdb.php";

if (isset($_POST['btn_import'])) {

    if (!isset($_FILES['file_excel']) || $_FILES['file_excel']['error'] != 0) {
        die("File upload lỗi");
    }

    $file = $_FILES['file_excel']['tmp_name'];

    if (($handle = fopen($file, "r")) !== FALSE) {

        // bỏ header (dùng ; )
        fgetcsv($handle, 1000, ";");

        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

            if (count($data) < 7)
                continue;

            // xử lý BOM
            $data[0] = str_replace("\xEF\xBB\xBF", "", $data[0]);

            $matacgia = trim($data[0]);
            if ($matacgia == "")
                continue;

            $tentacgia = trim($data[1]);
            $ngaysinh = trim($data[2]);
            //sử lý lỗi ngày:
            // Nếu là số (Excel date)
            // xử lý ngày Excel
            // 🔥 THÊM NGAY SAU ĐÂY
            if (is_numeric($ngaysinh)) {
                $ngaysinh = date(
                    'Y-m-d',
                    strtotime('1899-12-30 +' . $ngaysinh . ' days')
                );
            }// Excel đổi sang dạng 21/02/2005
            elseif (strpos($ngaysinh, '/') !== false) {
                $dt = DateTime::createFromFormat('d/m/Y', $ngaysinh);
                if ($dt !== false) {
                    $ngaysinh = $dt->format('Y-m-d');
                }
            }


            $gioitinh = trim($data[3]);
            $dienthoai = trim($data[4]);
            $email = trim($data[5]);
            $diachi = trim($data[6]);

            // check trùng
            $check = mysqli_query(
                $conn,
                "SELECT 1 FROM tac_gia WHERE matacgia='$matacgia'"
            );
            if (mysqli_num_rows($check) > 0)
                continue;

            $sql = "INSERT INTO tac_gia VALUES (
                '$matacgia','$tentacgia','$ngaysinh',
                '$gioitinh','$dienthoai','$email','$diachi'
            )";

            mysqli_query($conn, $sql);
        }

        fclose($handle);
    }

    header("Location: tacgia.php?import=success");
    exit;
}
