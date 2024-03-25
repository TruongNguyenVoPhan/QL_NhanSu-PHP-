<style>
    .registration-form {
        max-width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .registration-form label {
        display: block;
        margin-bottom: 10px;
    }

    .registration-form input[type="text"],
    .registration-form input[type="password"],
    .registration-form input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .registration-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .registration-form input[type="submit"]:hover {
        background-color: #45a049;
    }

    .registration-form .success-message {
        color: green;
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
    }
</style>

<div class="registration-form">
    <?php
    if (isset($_GET["registered"])) {
        echo '<div class="success-message">Đăng ký thành công</div>';
    }
    ?>
    <form method="post">
        <div class="row">
            <div class="lbltitle">
                <label for="txtusername">Tên đăng nhập:</label>
            </div>
            <div class="lblinput">
                <input type="text" name="txtusername" required>
            </div>
        </div>

        <div class="row">
            <div class="lbltitle">
                <label for="txtpassword">Mật khẩu:</label>
            </div>
            <div class="lblinput">
                <input type="password" name="txtpassword" required>
            </div>
        </div>

        <div class="row">
            <div class="lbltitle">
                <label for="txtfullname">Họ và tên:</label>
            </div>
            <div class="lblinput">
                <input type="text" name="txtfullname" required>
            </div>
        </div>

        <div class="row">
            <div class="lbltitle">
                <label for="txtemail">Email:</label>
            </div>
            <div class="lblinput">
                <input type="email" name="txtemail" required>
            </div>
        </div>

        <div class="row">
            <div class="submit">
                <input type="submit" name="btnregister" value="Đăng ký">
            </div>
        </div>
    </form>
</div>