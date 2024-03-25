<?php
session_start();
require_once("entities/NhanVien.class.php");

// Số nhân viên trên mỗi trang
$perPage = 5;

// Trang hiện tại (mặc định là trang 1)
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Lấy danh sách nhân viên
$nhanviens = NhanVien::list_nhanvien();

// Tính toán thông tin phân trang
$totalItems = count($nhanviens);
$totalPages = ceil($totalItems / $perPage);

// Lấy chỉ mục bắt đầu và kết thúc của danh sách nhân viên trên trang hiện tại
$startIndex = ($current_page - 1) * $perPage;
$endIndex = $startIndex + $perPage - 1;
$endIndex = min($endIndex, $totalItems - 1);

// Lấy các nhân viên cho trang hiện tại
$currentPageItems = array_slice($nhanviens, $startIndex, $perPage);
?>
<div class="page-header">
    <h1>Quản lý nhân viên</h1>
    <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === "admin") : ?>
        <a href="add_NhanVien.php" class="btn btn-primary">Thêm nhân viên</a>
    <?php endif; ?>
</div>
<div class="nhanvien-grid">
    <?php foreach ($currentPageItems as $nhanvien) : ?>
        <div class="nhanvien-item">
            <h3>Mã nhân viên: <?php echo $nhanvien["Ma_NV"]; ?></h3>
            <h3>Tên nhân viên: <?php echo $nhanvien["Ten_NV"]; ?></h3>
            <p>Giới tính: <?php echo $nhanvien["Phai"]; ?></p>
            <p>Nơi sinh: <?php echo $nhanvien["Noi_Sinh"]; ?></p>
            <p>Mã phòng: <?php echo $nhanvien["Ma_Phong"]; ?></p>
            <p>Lương: <?php echo $nhanvien["Luong"]; ?></p>
            <?php
            $genderImage = ($nhanvien["Phai"] === "NU") ? "woman.jpg" : "man.jpg";
            $imagePath = "images/" . $genderImage;
            ?>
            <img src="<?php echo $imagePath; ?>" alt="Hình ảnh nhân viên">

            <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === "admin") : ?>
                <!-- Thêm liên kết Sửa -->
                <a href="update_NhanVien.php?id=<?php echo $nhanvien['Ma_NV']; ?>">Sửa</a>

                <!-- Thêm liên kết Xóa -->
                <a href="delete_NhanVien.php?id=<?php echo $nhanvien['Ma_NV']; ?>">Xóa</a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <a href="?page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
    <?php endfor; ?>
</div>

<style>
.nhanvien-grid {
  display: flex;
  flex-wrap: wrap;
}

.nhanvien-item {
  width: 200px;
  margin-right: 20px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  padding: 10px;
}

.nhanvien-item h3, .nhanvien-item p {
  margin: 0;
}

.nhanvien-item img {
  width: 100%;
  height: auto;
  margin-top: 10px;
}
</style>