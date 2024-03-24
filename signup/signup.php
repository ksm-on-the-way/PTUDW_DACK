<?php
        // Chuyển hướng ng dùng sau khi đăng ký thành công
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Chuyển hướng người dùng đến trang đăng nhập sau khi đăng ký thành công
        echo '<script>window.location.href = "../login/login.php";</script>';
            
    }

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Liên kết tệp CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<body>
    <div class="login-signup-container">
        <!-- Header chuyển đổi giữa đăng ký và đăng nhập  -->
        <h2>
            <span id ="login-header" class="inactive">
                <a href="../login/login.php">Đăng nhập</a>
            </span>
            <span id ="signup-header" class="active">Đăng ký</span>
        </h2>

        <!-- Form đăng ký -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
            <!-- Dưới mỗi ô input đều có 1 chỗ dành cho error-message -->
            <!-- Họ tên -->
            <div class="form-group">
                <label for="fullname">Họ và tên:<span class="required">*</span></label>
                <input type="text" id="fullname" name="fullname" placeholder="Họ và tên" value="">
                <div id="fullname-error" class="error-message"></div>
            </div>

            <!-- Số điện thoại -->
            <div class="form-group">
                <label for="phone">Số điện thoại:<span class="required">*</span></label>
                <input type="text" id="phone" name="phone" placeholder="Số điện thoại" value="">
                <div id="phone-error" class="error-message"></div>
            </div>

            <!-- Ngày sinh -->
            <div class="form-group">
                <label for="birthdate">Ngày sinh:<span class="required">*</span></label>
                <input type="date" id="birthdate" name="birthdate" value="">
                <div id="birthdate-error" class="error-message"></div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:<span class="required">*</span></label>
                <input type="email" id="email" name="email" placeholder="Email" value="">
                <div id="email-error" class="error-message"></div>
            </div>

            <!-- Giới tính -->
            <div class="form-group">
                <label for="gender">Giới tính:<span class="required">*</span></label>
                <div class="radio-group">
                    <label for="male">Nam</label>
                    <input type="radio" id="male" name="gender" value="male" >
                    <label for="female">Nữ</label>
                    <input type="radio" id="female" name="gender" value="female" >
                    <label for="other">Khác</label>
                    <input type="radio" id="other" name="gender" value="other">
                </div>
            </div>

            <!-- Khu vực -->
            <div class="form-group">
                <label for="region">Khu vực:<span class="required">*</span></label>
                <select class="require" id="city" name="city" aria-label=".form-select-sm">
                    <option value="">Chọn khu vực</option>
                    <?php 
                    // Lấy dữ liệu từ API
                    $json = file_get_contents('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json');
                    $data = json_decode($json, true);

                    // Duyệt qua danh sách các tỉnh thành và hiển thị trong dropdown
                    foreach ($data as $city) {
                        $selected = ($selected_city == $city['Name']) ? "selected" : "";
                        echo "<option value='" . $city['Name'] . "' $selected>" . $city['Name'] . "</option>";
                    }
                    ?>
                </select>
                <div id="city-error" class="error-message"></div>
            </div>
        
            <!-- Mật khẩu -->
            <div class="form-group">          
                <label for="password">Mật khẩu:<span class="required">*</span></label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu">

                <!-- tạo eye icon ẩn/hiện mk người dùng (dùng boostrap css, gắn ở phần head html)-->
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <div id="password-error" class="error-message"></div>
            </div>

            <!-- Nhập lại mật khẩu -->
            <div class="form-group">
                <label for="confirm_password">Nhập lại mật khẩu:<span class="required">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu">

                <!-- tạo eye icon ẩn/hiện mk người dùng -->
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <div id="confirm_password-error" class="error-message"></div>
            </div>

            <!-- Điều khoản sử dụng dịch vụ -->
            <div class="form-group">
                <label for="term-register" class="term_register">
                    <input type="checkbox" id="term_register" name="term_register"> 
                    Tôi đồng ý và tuân theo các <a href="">&nbsp Điều khoản sử dụng của TIX ID</a>
                </label> 
            </div>


            <!-- Lỗi chưa điền full thông tin -->
            <div id="error-message" class="error-message" style="display: none;">Hãy điền đầy đủ thông tin!</div>

            <!-- Nút submit -->
            <div class="form-group">
                <button id="submit-btn" type="submit">Đăng ký</button>
            </div>
        </form>
        <!-- Quên mật khẩu -->
        <div class="forgot-password">
            <a href="#">Quên mật khẩu?</a>
        </div>
    </div>


    <script>  
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });



        // Kiểm tra xem người dùng đã nhập hết các ô chưa
        function validateForm() {
            var fullname = document.getElementById("fullname").value;
            var phone = document.getElementById("phone").value;
            var birthdate = document.getElementById("birthdate").value;
            var email = document.getElementById("email").value;
            var city = document.getElementById("city").value;
            var passwordInput = document.getElementById("password").value;
            var confirmPasswordInput = document.getElementById("confirm_password").value;
            var termCheckbox = document.getElementById("term_register");   

            // Kiểm tra các trường có trống không
            if (fullname === "" || phone === "" || birthdate === "" || email === "" || city === "" || passwordInput === "" || confirmPasswordInput === "") {
                // Hiển thị thông báo lỗi
                document.getElementById("error-message").style.display = "block";
                // Ngăn chặn việc submit form
                return false;
            }
            // Kiểm tra xem checkbox đã được chọn chưa
            if (!termCheckbox.checked) {
                document.getElementById("error-message").textContent = "Bạn phải đồng ý với Điều khoản sử dụng!";
                document.getElementById("error-message").style.display = "block";
                return false;
            }

            // Người dùng submit thành công
            return true;
        }

        // Phần kiểm tra real-time
        document.addEventListener("DOMContentLoaded", function() {
            var fullnameInput = document.getElementById("fullname");
            var phoneInput = document.getElementById("phone");
            var birthdateInput = document.getElementById("birthdate");
            var emailInput = document.getElementById("email");
            var cityInput = document.getElementById("city");
            var passwordInput = document.getElementById("password");
            var confirmPassInput = document.getElementById("confirm_password");

            var fullnameError = document.getElementById("fullname-error");
            var phoneError = document.getElementById("phone-error");
            var birthdateError = document.getElementById("birthdate-error");
            var emailError = document.getElementById("email-error");
            var cityError = document.getElementById("city-error");
            var passwordError = document.getElementById("password-error");
            var confirmPassError = document.getElementById("confirm_password-error");

            function checkFullname() {
                var fullname = fullnameInput.value.trim();
                if (fullname === "") {
                    fullnameError.textContent = "Họ và tên không được để trống";
                } else if (fullname.split(' ').length < 2 || !fullname.match(/^[a-zA-Z\sÀ-Ỹà-ỹ]*$/)) {
                    fullnameError.textContent = "Họ và tên phải có ít nhất 2 từ và không chứa số hoặc ký tự đặc biệt";
                } else {
                    fullnameError.textContent = "";
                }
            }


            function checkPhone() {
                var phone = phoneInput.value.trim();
                if (phone === "") {
                    phoneError.textContent = "Số điện thoại không được để trống";
                } else if (!phone.match(/^0\d{9,}$/)) {
                    phoneError.textContent = "Số điện thoại phải có ít nhất 10 số và bắt đầu bằng số 0";
                } else {
                    phoneError.textContent = "";
                }
            }

            function checkBirthdate() {
                if (birthdateInput.value.trim() === "") {
                    birthdateError.textContent = "Vui lòng chọn ngày sinh";
                } else {
                    birthdateError.textContent = "";
                }
            }

            function checkEmail() {
                var email = emailInput.value.trim();
                if (email === "") {
                    emailError.textContent = "Email không được để trống";
                } else if (!email.match(/@gmail\.com$/)) {
                    emailError.textContent = "Email phải có định dạng đuôi @gmail.com";
                } else {
                    emailError.textContent = "";
                }
            }

            function checkCity() {
                if (cityInput.value === "") {
                    cityError.textContent = "Vui lòng chọn khu vực";
                } else {
                    cityError.textContent = "";
                }
            }

            function checkPassword() {
                var password = passwordInput.value.trim();
                if (password === "") {
                    passwordError.textContent = "Mật khẩu không được để trống";
                } else if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/)) {
                    passwordError.textContent = "Mật khẩu phải có ít nhất 8 ký tự và bao gồm ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt";
                } else {
                    passwordError.textContent = "";
                }
            }

            function checkConfirmPassword() {
                var password = passwordInput.value.trim();
                var confirmPass = confirmPassInput.value.trim();
                if (confirmPass === "") {
                    confirmPassError.textContent = "Vui lòng xác nhận mật khẩu";
                } else if (confirmPass !== password) {
                    confirmPassError.textContent = "Mật khẩu không khớp";
                } else {
                    confirmPassError.textContent = "";
                }
            }
                    // Khi người dùng đã chọn 1 ô input và sau đó ấn ra ngoài ô input thì báo lỗi "không dc để trống"
                    fullnameInput.addEventListener("blur", checkFullname);
                    phoneInput.addEventListener("blur", checkPhone);
                    birthdateInput.addEventListener("blur", checkBirthdate);
                    emailInput.addEventListener("blur", checkEmail);
                    cityInput.addEventListener("blur", checkCity);
                    passwordInput.addEventListener("blur", checkPassword);
                    confirmPassInput.addEventListener("blur", checkConfirmPassword);
                });
    </script>

</body>
</html>
