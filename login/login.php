<?php
$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường đã được điền đầy đủ hay không
    if (empty($_POST['username']) || empty($_POST['password'])){
        $error_message = "Vui lòng nhập đủ thông tin";
    } else {
        // Xác thực và sạch sẽ hóa dữ liệu đầu vào
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        
        
        // Thực hiện các kiểm tra đăng nhập ở đây 
        if ($username === 'admin' && $password === 'admin123') {
            // Đăng nhập thành công, chuyển hướng người dùng đến trang chính sau khi đăng nhập thành công
            header("Location: dashboard.php");
            exit;
        } else {
            // Đăng nhập thất bại, hiển thị thông báo lỗi
            $error_message = "Thông tin đăng nhập không chính xác!";
        }
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Liên kết tệp CSS -->
</head>
<body>
    <div class="login-signup-container">
        <!-- Heaader chuyển đổi giữa đăng nhập và đăng ký -->
        <h2>
            <span id ="login-header" class="active">Đăng nhập</span>
            <span id ="signup-header" class="inactive">
                <a href="../signup/signup.php">Đăng ký</a>
            </span>
        </h2>

        <!-- Form login -->
        <form action="login.php" method="POST">
            <!-- Tên đăng nhập -->
            <div class="form-group">
                <label for="username">Email hoặc số điện thoại:</label>
                <input type="text" id="username" name="username" placeholder="Email hoặc SĐT" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                <div id="username-error" class="error-message"></div>
            </div>

            <!-- Mật khẩu -->
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu">
                <div id="password-error" class="error-message"></div>
            </div>

            <!-- Hiển thị lỗi (nếu có) -->
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <!-- Nút submit -->
            <div class="form-group">
                <button type="submit">Đăng nhập</button>
            </div>

        </form>

        <!-- Quên mật khẩu -->
        <div class="forgot-password">
            <a href="#">Quên mật khẩu?</a>
        </div>
    </div>

    <script>
        // Phần kiểm tra người dùng có nhập username or password chưa
        document.addEventListener("DOMContentLoaded", function() {
            var usernameInput = document.getElementById("username");
            var passwordInput = document.getElementById("password");
            var usernameError = document.getElementById("username-error");
            var passwordError = document.getElementById("password-error");

            function checkUsername() {
                if (usernameInput.value.trim() === "") {
                    usernameError.textContent = "Hãy nhập email hoặc số điện thoại";
                    usernameInput.classList.add("error-input"); // Thêm lớp error-input để biến ô input thành màu đỏ (hiệu ứng focus)
                } else {
                    usernameError.textContent = "";
                    usernameInput.classList.remove("error-input"); // Xóa lớp error-input nếu không có lỗi
                }
            }

            function checkPassword() {
                if (passwordInput.value.trim() === "") {
                    passwordError.textContent = "Hãy nhập mật khẩu";
                    passwordInput.classList.add("error-input"); // Thêm lớp error-input để biến ô input thành màu đỏ (hiệu ứng focus)
                } else {
                    passwordError.textContent = "";
                    passwordInput.classList.remove("error-input"); // Xóa lớp error-input nếu không có lỗi
                }
            }

            usernameInput.addEventListener("input", checkUsername);
            usernameInput.addEventListener("blur", checkUsername);

            passwordInput.addEventListener("input", checkPassword);
            passwordInput.addEventListener("blur", checkPassword);
        });
    </script>

</body>
</html>
