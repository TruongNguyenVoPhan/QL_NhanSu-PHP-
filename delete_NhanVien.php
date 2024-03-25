<?php
require_once("entities/NhanVien.class.php");

// Kiểm tra xem có tham số "id" được truyền vào không
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa nhân viên
    $result = NhanVien::delete_NhanVien($id);

    if ($result) {
        // Chuyển hướng người dùng về trang danh sách nhân viên
        header("Location: list_NhanVien.php");
        exit;
    } else {
        // Xử lý lỗi nếu không xóa thành công
        echo "Lỗi: Không thể xóa nhân viên.";
    }
} else {
    // Redirect người dùng về trang danh sách nhân viên nếu không có tham số "id"
    header("Location: list_NhanVien.php");
    exit;
}
?>