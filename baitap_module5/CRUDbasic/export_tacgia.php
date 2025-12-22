<?php
require_once "./connectdb.php";

header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=DSTacGia.csv");

// 👉 THÊM BOM để Excel đọc đúng tiếng Việt
echo "\xEF\xBB\xBF";

$output = fopen("php://output", "w");

// header (dùng ; )
fputcsv($output, [
    'matacgia','tentacgia','ngaysinh',
    'gioitinh','dienthoai','email','diachi'
], ';');

$sql = "SELECT * FROM tac_gia";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, [
        $row['matacgia'],
        $row['tentacgia'],
        $row['ngaysinh'],
        $row['gioitinh'],
        $row['dienthoai'],
        $row['email'],
        $row['diachi']
    ], ';');
}

fclose($output);
exit;
