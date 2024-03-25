<?php
// require_once("config/db.class.php");
require_once("Entities/NhanVien.class.php");
// Khởi tạo đối tượng Database
$db = new Database();

// Lấy danh sách các danh mục
$phongbans = $db->getphongbans();
if (isset($_POST["btnadd"])) {
    $ma_nv = $_POST["txtMaNV"];
    $ten_nv = $_POST["txtTenNV"];
    $phai = $_POST["txtPhai"];
    $noi_sinh = $_POST["txtNoiSinh"];
    $ma_phong = $_POST["txtMaPhong"];
    $luong = $_POST["txtLuong"];

    // Khởi tạo đối tượng NhanVien
    $newNhanVien = new NhanVien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong);
    $result = $newNhanVien->save();

    // Kiểm tra kết quả lưu vào CSDL
    if ($result) {
        header("Location: List_NhanVien.php?inserted");
        exit();
    } else {
        header("Location: add_nhanvien.php?failure");
        exit();
    }
}
?>

<?php
if (isset($_GET["inserted"])) {
    echo "Thêm nhân viên thành công";
}
?>

<form method="post">
    <!-- Mã nhân viên -->
    <div class="row">
        <div class="lbltitle">
            <label for="txtMaNV">Mã nhân viên:</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtMaNV" value="<?php echo isset($_POST["txtMaNV"]) ? $_POST["txtMaNV"] : ""; ?>">
        </div>
    </div>

    <!-- Tên nhân viên -->
    <div class="row">
        <div class="lbltitle">
            <label for="txtTenNV">Tên nhân viên:</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtTenNV" value="<?php echo isset($_POST["txtTenNV"]) ? $_POST["txtTenNV"] : ""; ?>">
        </div>
    </div>

    <!-- Giới tính -->
<div class="row">
    <div class="lbltitle">
        <label for="txtPhai">Giới tính:</label>
    </div>
    <div class="lblinput">
        <select name="txtPhai">
            <option value="NAM" <?php if (isset($_POST["txtPhai"]) && $_POST["txtPhai"] == "NAM") echo "selected"; ?>>NAM</option>
            <option value="NU" <?php if (isset($_POST["txtPhai"]) && $_POST["txtPhai"] == "NU") echo "selected"; ?>>NU</option>
            <option value="KHAC" <?php if (isset($_POST["txtPhai"]) && $_POST["txtPhai"] == "KHAC") echo "selected"; ?>>KHAC</option>
        </select>
    </div>
</div>

    <!-- Nơi sinh -->
    <div class="row">
        <div class="lbltitle">
            <label for="txtNoiSinh">Nơi sinh:</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtNoiSinh" value="<?php echo isset($_POST["txtNoiSinh"]) ? $_POST["txtNoiSinh"] : ""; ?>">
        </div>
    </div>

<!-- Mã phòng -->
<div class="row">
    <div class="lbltitle">
        <label for="txtMaPhong">Mã phòng:</label>
    </div>
    <div class="lblinput">
        <select name="txtMaPhong">
            <?php foreach ($phongbans as $phongban) { ?>
                <option value="<?php echo $phongban['Ma_Phong']; ?>"><?php echo $phongban['Ten_Phong']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

    <!-- Lương -->
    <div class="row">
        <div class="lbltitle">
            <label for="txtLuong">Lương:</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtLuong" value="<?php echo isset($_POST["txtLuong"]) ? $_POST["txtLuong"] : ""; ?>">
        </div>
    </div>

    <div class="row">
        <div class="submit">
            <input type="submit" name="btnadd" value="Thêm nhân viên">
        </div>
    </div>
</form>