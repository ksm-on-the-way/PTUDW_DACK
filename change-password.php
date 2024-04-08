<style>
.change-password__container {
    width: 100%;
    max-width: 50%;
    margin-left: 60px;
    margin-top: 60px;
}

.change-password__container .change-password__form form {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.change-password__container .change-password__form .form-input {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 5px;
}

.change-password__container .change-password__form .form-input input {
    height: 30px; /* Điều chỉnh chiều rộng của ô input */
    border-radius: 8px;
    border: 1px solid #1A2C50;
}

.change-password__container .change-password__form .form-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.change-password__container .change-password__form .form-btn button {
    width: 150px;
    border-radius: 8px;
    padding: 10px 0px;
    border: 1px solid #1A2C50;
    cursor: pointer;
    background-color: #1A2C50;
    color: white;
}


.change-password__container .change-password__form .form-btn button:hover {
    background-color: #0056b3;
}

.error-message {
    display:none;
    color: red; 
    font-style: italic; 
    font-size: 15px;
}
/* Ẩn eye icon chỗ mật khẩu */
input::-ms-reveal, input::-ms-clear {
    display: none;
}
/* Tạo 1 eye icon mới */
i {
    margin-left: -200px;
    cursor: pointer;
}

.change-password__container .change-password__form .form-input .input-with-icon {
    display: flex;
    align-items: center; /* Đảm bảo các phần tử con được căn chỉnh theo trục dọc */
}

.change-password__container .change-password__form .form-input .input-with-icon input {
    flex: 1; /* Chia sẻ không gian trong container */
}

.change-password__container .change-password__form .form-input .input-with-icon i {
    margin-left: -30px; /* Điều chỉnh khoảng cách giữa ô input và biểu tượng mắt */
    cursor: pointer;
}


</style>

<?php
    require_once './db_module.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {           

        // Lấy dữ liệu từ form
        $presentPassword = $_POST['present-password'];
        $newPassword = $_POST['new-password'];
        $confirmNewPassword = $_POST['confirm-new-password'];

        if(isset($_SESSION['username'])) {
            // Thực hiện kiểm tra mật khẩu hiện tại
        if (!authenticateUser($_SESSION['username'], $presentPassword)) {
            
            echo '<script>alert("Mật khẩu hiện tại không chính xác!");</script>';
            echo '<script>window.location.href = "admin.php?handle=change-password";</script>';
            //header("Location: c.php")
        } else {
            echo '<script>alert("Đổi mật khẩu thành công!");</script>';
            // Thực hiện lưu mật khẩu mới vào cơ sở dữ liệu và chuyển hướng người dùng đến trang thông báo thành công
            changePassword($_SESSION['username'], $newPassword);
            echo '<script>window.location.href = "admin.php?handle=change-password";</script>';
            exit;
        }
        }
    }

    // Hàm kiểm tra mật khẩu hiện tại có khớp với mật khẩu trong cơ sở dữ liệu của người dùng đang đăng nhập hay không
    function authenticateUser($username, $password) {
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

    // Hàm thay đổi mật khẩu trong cơ sở dữ liệu
    function changePassword($username, $newPassword) {
        // Kết nối đến cơ sở dữ liệu
        $link = NULL;
        taoKetNoi($link);

        // Hash mật khẩu mới
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Sử dụng prepared statement để tránh SQL injection
        $query = "UPDATE users SET password = ? WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $query)) {
            // Bind các biến vào statement
            mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $username);

            // Thực thi truy vấn
            mysqli_stmt_execute($stmt);
        }

        // Đóng kết nối và giải phóng bộ nhớ
        giaiPhongBoNho($link, $stmt);

    }
?>


<!-- phần HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<div class='change-password__container'>
    <div class='change-password__form'>
        <form action="admin.php?handle=change-password" method="POST" onsubmit="return validateForm()">
            <div class='form-input'>
                 <!-- nhớ bỏ -->
                <label for="present-password">Mật khẩu hiện tại:</label>
                <div class="input-with-icon">
                    <input type="password" id="present-password" name="present-password" placeholder='Nhập mật khẩu cũ'>
                    <i class="bi bi-eye-slash toggle-password" data-target="present-password"></i>
                </div>
                <div id="present-password-error" class="error-message"></div>

            </div>

            <div class='form-input'>
                <label for="new-password">Mật khẩu mới:</label>
                <div class="input-with-icon">
                    <input type="password" id="new-password" name="new-password" placeholder='Nhập mật khẩu mới'>
                    <i class="bi bi-eye-slash toggle-password" data-target="new-password"></i>
                </div>
                <div id="new-password-error" class="error-message"></div>
            </div>


            <div class='form-input'>
                <label for="confirm-new-password">Nhập lại mật khẩu mới:</label>
                <div class="input-with-icon">
                    <input type="password" id="confirm-new-password" name="confirm-new-password" placeholder='Nhập lại mật khẩu mới'>
                    <i class="bi bi-eye-slash toggle-password" data-target="confirm-new-password"></i>
                </div>
                <div id="confirmed-password-error" class="error-message"></div>
            </div>

            <!-- Hiển thị thông báo lỗi -->
            <div id="error-message" class="error-message"></div>

            <div class='form-btn'>
                <button type = "submit" class='btn-add'>Lưu</button>
            </div>

        </form>
    </div>
</div>




<script>
    // Hiện con mắt mật khẩu
    const togglePasswords = document.querySelectorAll(".toggle-password");
        togglePasswords.forEach(togglePassword => {
            togglePassword.addEventListener("click", function () {
                const targetId = this.getAttribute("data-target");
                const targetInput = document.getElementById(targetId);

                // toggle the type attribute
                const type = targetInput.getAttribute("type") === "password" ? "text" : "password";
                targetInput.setAttribute("type", type);
                
                // toggle the icon
                this.classList.toggle("bi-eye");
            });
        });


    function validateForm() {
        var presentPasswordInput = document.getElementById("present-password").value.trim();
        var newpasswordInput = document.getElementById("new-password").value.trim();
        var confirmPasswordInput = document.getElementById("confirm-new-password").value.trim();

        // Kiểm tra mật khẩu hiện tại nhập chưa 
        if (presentPasswordInput === "") {
            document.getElementById("error-message").textContent ="Vui lòng nhập mật khẩu hiện tại!";
            document.getElementById("error-message").style.display = "block";
            return false;
        } else {
            document.getElementById("error-message").textContent = "";
        }

        // Kiểm tra xem mật khẩu mới đã được nhập chưa
        if (newpasswordInput === "") {
            document.getElementById("error-message").textContent = "Vui lòng nhập mật khẩu mới!";
            document.getElementById("error-message").style.display = "block";
            return false;
        } else {
            document.getElementById("error-message").textContent = "";
        }

        // Kiểm tra mật khẩu mới có mạnh không
        if (!/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(newpasswordInput)) {
            document.getElementById("error-message").textContent = "Mật khẩu mới phải gồm ít nhất: 8 ký tự, 1 chữ thường, 1 chữ in hoa và 1 ký tự số!";
            document.getElementById("error-message").style.display = "block";
            return false;
        } else if (presentPasswordInput === newpasswordInput) { 
            document.getElementById("error-message").textContent = "Mật khẩu mới phải khác mật khẩu hiện tại!";
            document.getElementById("error-message").style.display = "block";
            return false;
        } else {
            document.getElementById("error-message").textContent = "";
        }

        // Kiểm tra xem mật khẩu mới có trùng khớp với xác nhận mật khẩu không
        if (confirmPasswordInput === "") {
            document.getElementById("error-message").textContent = "Vui lòng xác nhận mật khẩu mới!";
            document.getElementById("error-message").style.display = "block";
            return false;
        } else if (confirmPasswordInput !== newpasswordInput) { // Sử dụng newpasswordInput thay vì passwordInput
            document.getElementById("error-message").textContent = "Mật khẩu xác nhận không khớp!";
            document.getElementById("error-message").style.display = "block";
            return false;
        } else {
            document.getElementById("error-message").textContent = "";
        }
        
        return true;

    }

</script>

