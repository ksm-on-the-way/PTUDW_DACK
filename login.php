<?php
require_once './db_module.php';

// Hàm check tài khoản, mật khẩu có trùng trong DB hay không
function authenticateUser($username, $password)
{
    // Kết nối đến cơ sở dữ liệu
    $link = NULL;
    taoKetNoi($link);

    // Sử dụng prepared statement để tránh SQL injection
    $query = "SELECT password FROM users WHERE (email = ? OR phone = ?)";

    if ($stmt = mysqli_prepare($link, $query)) {
        // Bind các biến vào statement
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        // Thực thi truy vấn
        mysqli_stmt_execute($stmt);
        // Lưu kết quả
        mysqli_stmt_store_result($stmt);
        // Kiểm tra xem có bản ghi nào trùng khớp không
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind kết quả vào các biến
            mysqli_stmt_bind_result($stmt, $db_password);
            // Fetch kết quả
            mysqli_stmt_fetch($stmt);
            // So sánh mật khẩu được cung cấp với mật khẩu trong cơ sở dữ liệu
            if (password_verify($password, $db_password)) {
                // Mật khẩu trùng khớp, trả về true
                return true;
            }
        }
    }

    // Đóng kết nối và giải phóng bộ nhớ
    giaiPhongBoNho($link, $stmt);

    // Nếu không có kết quả hoặc mật khẩu không trùng khớp, trả về false
    return false;
}
// Hàm lấy role của người dùng
function getUserRole($username)
{
    // Connect to the database
    $link = NULL;
    taoKetNoi($link);

    // Prepare SQL statement
    $query = "SELECT role_id FROM users WHERE (email = ? OR phone = ?)";

    // Execute SQL statement
    if ($stmt = mysqli_prepare($link, $query)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        // Execute query
        mysqli_stmt_execute($stmt);
        // Bind result variables
        mysqli_stmt_bind_result($stmt, $role_id);
        // Fetch result
        mysqli_stmt_fetch($stmt);
        // Close statement
        mysqli_stmt_close($stmt);
        // Close connection
        giaiPhongBoNho($link, $stmt);

        // Return role_id
        return $role_id;
    } else {
        // Handle error
        return null;
    }
}

// Hàm trả về thông tin của người dùng từ cơ sở dữ liệu
function getUserInfoFromDatabase($username)
{
    // Connect to the database
    $link = NULL;
    taoKetNoi($link);

    // Prepare SQL statement
    $query = "SELECT * FROM users WHERE (email = ? OR phone = ?)";

    // Execute SQL statement
    if ($stmt = mysqli_prepare($link, $query)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);

        // Execute query
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch user info
        $user_info = mysqli_fetch_assoc($result);

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        giaiPhongBoNho($link, $stmt);

        // Return user info
        return $user_info;
    } else {
        // Handle error
        return null;
    }
}


// Hàm tổng kiểm tra (gọi 3 hàm ở trên)
$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường đã được điền đầy đủ hay không
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error_message = "Vui lòng nhập đủ thông tin";
    } else {
        // Lấy dữ liệu từ ô input
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Thực hiện kiểm tra đăng nhập bằng hàm authenticateUser
        if (authenticateUser($username, $password)) {
            // Nếu đăng nhập thành công, lấy thông tin người dùng từ DB bằng hàm dưới  
            session_start();
            $userInfo = getUserInfoFromDatabase($username);
            // Lưu thông tin người dùng vào session
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['phone'] = $userInfo['phone'];
            $_SESSION['fullname'] = $userInfo['fullname'];
            $_SESSION['birth_date'] = $userInfo['birth_date'];
            $_SESSION['gender'] = $userInfo['gender'];

            // Lấy role của người dùng để xem là admin hay user
            $user_role_id = getUserRole($username);

            // Kiểm tra role_id của người dùng
            if ($user_role_id == 1) {
                // Lưu thông tin người dùng vào session
                $_SESSION['username'] = $username;

                // Đăng nhập thành công, chuyển hướng người dùng đến trang admin.php
                header("Location: ./admin.php");
                exit;
            } else {
                // Người dùng không có quyền admin, có thể chuyển hướng đến một trang thông báo hoặc trang khác
                header("Location: ./user.php");
                exit;
            }
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
</head>

<body>
    <style>
        body {
            font-family: "Roboto", sans-serif;
            margin: 30px 0 0;
            /* Đặt margin-top cho trang */
            padding: 0;
            /* Xóa padding mặc định của trang */
            background-image: url("./images/pic2.jfif");
            background-size: contain;
            background-position: center;
            overflow-x: hidden;
            /* Ẩn thanh cuộn trái phải */
            display: flex;
            align-items: center;
        }

        a {
            text-decoration: none;
        }

        .login-signup-container {
            margin-top: 10px;
            margin-right: 100px;
            margin-left: auto;
            /* Đảm bảo rằng phần tử được căn bên phải */
            width: 420px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            height: 440px;
        }

        .login-signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
            /* Thêm khoảng cách dưới tiêu đề */
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            padding: 0px 20px 10px;
            text-align: left;
        }

        .login-signup-container h2 span {
            color: #ddd;
            cursor: pointer;
            margin: 0 20px;
            padding: 20px 15px 8px;
            text-transform: uppercase;
        }

        .login-signup-container h2 span.active {
            border-bottom: 3px solid rgba(0, 0, 0, 0.212);
            color: black;
        }


        .login-signup-container h2 span.inactive a {
            color: rgba(0, 0, 0, 0.267);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {

            width: 100%;
            padding: 10px;
            border: none;
            background-color: #1A2C50;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        label {
            font-size: 14px;
            /* Điều chỉnh kích thước font cho các nhãn */
        }

        .forgot-password {
            /* text-align: left; */
            font-size: 14px;
            color: #555;
        }

        .error-message {
            color: red;
            /* Đặt màu chữ là đỏ */
            font-style: italic;
            /* In nghiêng */
            margin-top: 10px;
            /* Khoảng cách với các phần tử khác */
            margin-bottom: 10px;
            font-size: 13px;
        }


        .error-input {
            border: 1px solid red !important;
            /* Đặt màu đỏ cho viền của input */
        }
    </style>
    <div class="login-signup-container">
        <!-- Heaader chuyển đổi giữa đăng nhập và đăng ký -->
        <h2>
            <span id="login-header" class="active">Đăng nhập</span>
            <span id="signup-header" class="inactive">
                <a href="./signup.php">Đăng ký</a>
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
            <?php if (!empty($error_message)) : ?>
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