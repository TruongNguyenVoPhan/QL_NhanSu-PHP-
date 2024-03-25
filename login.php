<?php
require_once("entities/user.class.php");

// Kiểm tra xem người dùng đã gửi dữ liệu đăng nhập chưa
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    $user = user::login($username, $password);

    if ($user) {
        // Đăng nhập thành công, lưu thông tin người dùng vào session
        session_start();
        $_SESSION['user'] = $user;

        // Chuyển hướng người dùng đến trang chính phù hợp với vai trò
        if ($user['role'] === "admin") {
            header("Location: list_NhanVien.php");
        } else {
            header("Location: list_NhanVien.php");
        }
        exit;
    } else {
        // Đăng nhập thất bại, hiển thị thông báo lỗi
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>

<style>
    .login-form {
        max-width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .login-form label {
        display: block;
        margin-bottom: 10px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .login-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-form input[type="submit"]:hover {
        background-color: #45a049;
    }

    .login-form .register-link {
        text-align: center;
        margin-top: 10px;
    }
</style>

<div class="login-form">
    <form method="POST" action="login.php">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="submit" value="Đăng nhập">

        <div class="register-link">
            <a href="register.php">Đăng ký</a>
        </div>
    </form>
</div>
</form>