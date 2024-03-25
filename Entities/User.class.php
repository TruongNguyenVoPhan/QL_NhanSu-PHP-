<?php
require_once("config/db.class.php");

class user {
    public $usernameID;
    public $username;
    public $password;
    public $fullname;
    public $email;
    public $role;

    public function __construct( $username, $password, $fullname, $email, $role) {
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->role = $role;
    }


    public function save() {
        $db = new Database();

        $sql = "INSERT INTO user (usernameID, username, password, fullname, email, role) VALUES ('$this->usernameID', '$this->username', '$this->password', '$this->fullname', '$this->email', '$this->role')";
        $result = $db->query_execute($sql);
        return $result;
    }
    
    public static function login($username, $password) {
        $db = new Database();
        $conn = $db->connect();
    
        $username = $conn->real_escape_string($username); // Tránh lỗi SQL Injection
        $password = $conn->real_escape_string($password); // Tránh lỗi SQL Injection
    
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $db->select_to_array($sql);
    
        if (!empty($result)) {
            // Đăng nhập thành công
            return $result[0];
        } else {
            // Đăng nhập thất bại
            return false;
        }
    }
}
?>