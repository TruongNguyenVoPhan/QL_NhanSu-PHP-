<?php
class PhongBan {
   
    
    public static function getAllphongbanNames() {
        // Kết nối CSDL và truy vấn để lấy danh sách tên loại sản phẩm
        // Giả sử kết quả trả về là một mảng chứa các tên loại sản phẩm
        
        // Ví dụ:
        $phongbans = array();
        $query = "SELECT Name FROM phongbans";
        // Thực hiện truy vấn và lấy dữ liệu từ CSDL vào $categories
        
        return $phongbans;
    }
}
?>