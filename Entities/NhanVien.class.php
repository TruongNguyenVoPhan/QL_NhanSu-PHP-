<?php
require_once("config/db.class.php");

class NhanVien {
    public $Ma_NV;
    public $Ten_NV;
    public $Phai;
    public $Noi_Sinh;
    public $Ma_Phong;
    public $Luong;

    public function __construct($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong) {
        $this->Ma_NV = $ma_nv;
        $this->Ten_NV = $ten_nv;
        $this->Phai = $phai;
        $this->Noi_Sinh = $noi_sinh;
        $this->Ma_Phong = $ma_phong;
        $this->Luong = $luong;
    }

    public static function list_nhanvien() {
        $db = new Database();
        $sql = "SELECT * FROM NHANVIEN";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public function save() {
        $db = new Database();

        $sql = "INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES ('$this->Ma_NV', '$this->Ten_NV', '$this->Phai', '$this->Noi_Sinh', '$this->Ma_Phong', '$this->Luong')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function get_nhanvien($id) {
        $db = new Database();
    
        // Thực hiện truy vấn SQL để lấy thông tin nhân viên từ cơ sở dữ liệu
        $sql = "SELECT * FROM NHANVIEN WHERE Ma_NV = '$id'";
        $result = $db->query_execute($sql);
    
        // Kiểm tra xem có kết quả trả về hay không
        if ($result !== false && $result->num_rows > 0) {
            // Lấy thông tin nhân viên từ kết quả truy vấn
            $nhanvien = $result->fetch_assoc();
            return $nhanvien;
        } else {
            return null; // Không tìm thấy nhân viên với ID tương ứng
        }
    }

    public static function update_NhanVien($tenNV, $gioiTinh, $noiSinh, $maPhong, $luong, $maNV) {
        $db = new Database();
    
        $sql = "UPDATE NHANVIEN SET Ten_NV = '$tenNV', Phai = '$gioiTinh', Noi_Sinh = '$noiSinh', Ma_Phong = '$maPhong', Luong = '$luong' WHERE Ma_NV = '$maNV'";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function delete_NhanVien($maNV) {
        $db = new Database();
    
        $sql = "DELETE FROM NHANVIEN WHERE Ma_NV = '$maNV'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>