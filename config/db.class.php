<?php
class Database {
    protected static $connection;

    // Mở kết nối tới CSDL
    public function connect() {
        // Kiểm tra kết nối đã được khởi tạo chưa
        if(isset(self::$connection)){
            return self::$connection;
        }

        // Lấy thông tin kết nối CSDL từ file config.ini
        $config = parse_ini_file("config.ini");

        // Tạo kết nối tới CSDL
        self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);

        // Xử lý lỗi nếu không kết nối được tới CSDL
        if(self::$connection === false) {
            // Xử lý ghi log tại đây (ví dụ: ghi vào file log)
            return false;
        }

        return self::$connection;
    }

    // Phương thức thực hiện execute truy vấn
    public function query_execute($queryString) {
        // Khởi tạo kết nối
        $connection = $this->connect();

        // Thực hiện execute truy vấn
        $result = $connection->query($queryString);

        // Đóng kết nối
        // $connection->close();

        return $result;
    }

    // Phương thức thực hiện truy vấn và trả về một mảng danh sách kết quả
    public function select_to_array($queryString) {
        $rows = array();

        // Thực hiện query_execute để thực hiện truy vấn
        $result = $this->query_execute($queryString);

        if($result !== false) {
            while($item = $result->fetch_assoc()) {
                $rows[] = $item;
            }
        }

        return $rows;
    }

    // Phương thức lấy danh sách các danh mục
    public function getphongbans() {
        $queryString = "SELECT * FROM phongban";
        return $this->select_to_array($queryString);
    }
}
?>