<?php
require_once "./connectdb.php";

header("Content-Type: text/csv; charset=UTF-8");
// Thông báo cho trình duyệt:
// Đây là file CSV
// Mã hóa UTF-8
header("Content-Disposition: attachment; filename=DSTacGia.csv");
//Bắt trình duyệt tải file
// Tên file tải về là: DSTacGia.csv
// 👉 Nếu thiếu Content-Disposition → CSV sẽ hiển thị text trên trình duyệt, không tải.

// 👉 THÊM BOM để Excel đọc đúng tiếng Việt
echo "\xEF\xBB\xBF";

$output = fopen("php://output", "w");
//php://output = ghi trực tiếp ra trình duyệt
// "w" = chế độ ghi

// header (dùng ; )
fputcsv($output, [
    'matacgia','tentacgia','ngaysinh',
    'gioitinh','dienthoai','email','diachi'
], ';');
// Giải thích:
// fputcsv():
// Chuyển mảng → 1 dòng CSV
// $output → nơi ghi
// Mảng → tiêu đề cột
// ';' → dùng dấu chấm phẩy (Excel VN đọc đúng)


$sql = "SELECT * FROM tac_gia";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) { //mysqli_fetch_assoc():Lấy từng dòng
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
