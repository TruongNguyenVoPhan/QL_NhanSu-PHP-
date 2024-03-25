<?php
require_once("entities/NhanVien.class.php");

// Kiểm tra xem có tham số "id" được truyền vào không
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kiểm tra xem có dữ liệu được gửi từ form Sửa hay không
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Lấy dữ liệu từ form
        $tenNV = $_POST["tenNV"];
        $gioiTinh = $_POST["gioiTinh"];
        $noiSinh = $_POST["noiSinh"];
        $maPhong = $_POST["maPhong"];
        $luong = $_POST["luong"];

        // Thực hiện cập nhật thông tin nhân viên
        $result = NhanVien::update_NhanVien($tenNV, $gioiTinh, $noiSinh, $maPhong, $luong, $id);

        if ($result) {
            // Chuyển hướng người dùng về trang danh sách nhân viên
            header("Location: list_NhanVien.php");
            exit;
        } else {
            // Xử lý lỗi nếu không cập nhật thành công
            echo "Lỗi: Không thể cập nhật thông tin nhân viên.";
        }
    }

    // Lấy thông tin nhân viên hiện tại từ cơ sở dữ liệu
    $nhanvien = NhanVien::get_nhanvien($id);
} else {
    // Redirect người dùng về trang danh sách nhân viên nếu không có tham số "id"
    header("Location: list_NhanVien.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin nhân viên</title>
</head>
<body>
    <h1>Sửa thông tin nhân viên</h1>
    <form method="POST" action="">
        <label for="tenNV">Tên nhân viên:</label>
        <input type="text" id="tenNV" name="tenNV" value="<?php echo $nhanvien['Ten_NV']; ?>"><br>

        <label for="gioiTinh">Giới tính:</label>
        <input type="text" id="gioiTinh" name="gioiTinh" value="<?php echo $nhanvien['Phai']; ?>"><br>

        <label for="noiSinh">Nơi sinh:</label>
        <input type="text" id="noiSinh" name="noiSinh" value="<?php echo $nhanvien['Noi_Sinh']; ?>"><br>

        <label for="maPhong">Mã phòng:</label>
        <input type="text" id="maPhong" name="maPhong" value="<?php echo $nhanvien['Ma_Phong']; ?>"><br>

        <label for="luong">Lương:</label>
        <input type="text" id="luong" name="luong" value="<?php echo $nhanvien['Luong']; ?>"><br>

        <input type="submit" value="Lưu">
    </form>
</body>
</html>