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
        
            <!-- Mật khẩu -->
            <div class="form-group">          
                <label for="password">Mật khẩu:<span class="required">*</span></label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu">

                <!-- tạo eye icon ẩn/hiện mk người dùng (dùng boostrap css, gắn ở phần head html)-->
                <i class="bi bi-eye-slash toggle-password" data-target="password"></i>
                <div id="password-error" class="error-message"></div>
                <!-- Phần hiển thị điều kiện  -->
                <div id="password-message">
                    <h3>Mật khẩu phải bao gồm ít nhất:</h3>
                    <p id="length" class="invalid"> 8 chữ số</p>
                    <p id="letter" class="invalid"> 1 chữ thường</p>
                    <p id="capital" class="invalid"> 1 chữ in hoa</p>
                    <p id="number" class="invalid"> 1 ký tự số </p>
                </div>
            </div>

            <!-- Nhập lại mật khẩu -->
            <div class="form-group">
                <label for="confirm_password">Nhập lại mật khẩu:<span class="required">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu">

                <!-- tạo eye icon ẩn/hiện mk người dùng -->
                <i class="bi bi-eye-slash toggle-password" data-target="confirm_password"></i>
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
            <div id="error-message" class="error-message"></div>

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
        // Ẩn hiện con mắt ở mk và nhập lại mk
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

        // Check các error-message còn tồn tại hay ko để có thể submit form, hàm này sẽ dc gọi trong
        // hàm dưới validateForm()
        function checkErrorMessages() {
            // Lấy tất cả các error-message và password-message
            var errorMessages = document.querySelectorAll(".error-message");
            var passwordMessages = document.querySelectorAll("#password-message p");

            // Biến để kiểm tra xem có lỗi nào không
            var hasError = false;

            // Kiểm tra xem có bất kỳ error-message nào không rỗng không
            for (var i = 0; i < errorMessages.length; i++) {
                if (errorMessages[i].textContent.trim() !== "") {
                    // Nếu có, đặt hasError thành true và dừng vòng lặp để kiểm tra tiếp đk dưới
                    hasError = true;
                    break;
                }
            }
            // Kiểm tra xem có bất kỳ password-message nào không hợp lệ không
            for (var j = 0; j < passwordMessages.length; j++) {
                if (passwordMessages[j].classList.contains("invalid")) {
                    // Nếu có, đặt hasError thành true và dừng vòng lặp
                    hasError = true;
                    break;
                }
            }
            return hasError;
        }



        // Phần check chính để kiểm tra xem người dùng đã nhập hết các ô chưa và nhập đúng hết chưa 
        function validateForm() {
            var fullname = document.getElementById("fullname").value;
            var phone = document.getElementById("phone").value;
            var birthdate = document.getElementById("birthdate").value;
            var email = document.getElementById("email").value;
            var passwordInput = document.getElementById("password").value;
            var confirmPasswordInput = document.getElementById("confirm_password").value;
            var termCheckbox = document.getElementById("term_register");   

            // Kiểm tra các trường có trống không
            if (fullname === "" || phone === "" || birthdate === "" || email === "" || passwordInput === "" || confirmPasswordInput === "") {
                // Hiển thị thông báo lỗi
                document.getElementById("error-message").textContent = "Hãy điền đầy đủ thông tin!";
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

            // Nếu không có lỗi nào xảy ra, làm cho thông báo cuối cùng trở thành rỗng
            document.getElementById("error-message").textContent = "";

            // Kiêmr tra xem còn lỗi nào ở các ô khác hay ko
            if (checkErrorMessages()) {
                document.getElementById("error-message").textContent = "Vui lòng kiểm tra lại định dạng các ô dữ liệu!";
                document.getElementById("error-message").style.display = "block";
                return false;
            }

            // Người dùng submit thành công
            return true; 
        }

        // Phần kiểm tra input real-time
        document.addEventListener("DOMContentLoaded", function() {
            var fullnameInput = document.getElementById("fullname");
            var phoneInput = document.getElementById("phone");
            var birthdateInput = document.getElementById("birthdate");
            var emailInput = document.getElementById("email");
            var passwordInput = document.getElementById("password");
            var confirmPassInput = document.getElementById("confirm_password");

            var fullnameError = document.getElementById("fullname-error");
            var phoneError = document.getElementById("phone-error");
            var birthdateError = document.getElementById("birthdate-error");
            var emailError = document.getElementById("email-error");
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
                var birthdate = new Date(birthdateInput.value); // Chuyển đổi ngày sinh thành đối tượng Date
                var today = new Date(); // Ngày hiện tại

                if (birthdateInput.value.trim() === "") {
                    birthdateError.textContent = "Vui lòng chọn ngày sinh";
                } else if (birthdate > today) { // Kiểm tra xem ngày sinh có lớn hơn ngày hiện tại không
                    birthdateError.textContent = "Ngày sinh không thể lớn hơn ngày hiện tại";
                } else if (today.getFullYear() - birthdate.getFullYear() < 18) { // So sánh tuổi
                    birthdateError.textContent = "Bạn phải đủ 18 tuổi trở lên để đăng ký";
                } else if (today.getFullYear() - birthdate.getFullYear() > 80) { // Kiểm tra người dùng phải dưới 80 tuổi
                    birthdateError.textContent = "Vui lòng nhập ngày sinh hợp lệ!";
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

            // Hiện các điều kiện 8 ký tự, 1 chữ thường,...
            function checkPassword() {
                var letter = document.getElementById("letter");
                var capital = document.getElementById("capital");
                var number = document.getElementById("number");
                var length = document.getElementById("length");
                var password = passwordInput.value.trim();

                // Hiển thị hộp thông báo khi người dùng bắt đầu nhập
                document.getElementById("password-message").style.display = "block";

                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                if (password.match(lowerCaseLetters)) {  
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }
                
                // Validate capital letters
                var upperCaseLetters = /[A-Z]/g;
                if (password.match(upperCaseLetters)) {  
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }

                // Validate numbers
                var numbers = /[0-9]/g;
                if (password.match(numbers)) {  
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }
                
                // Validate length
                if (password.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }

            // Hiện nhắc nhở và ẩn điều kiện nếu thoả mãn 4 trường hợp
            function checkPasswordBlur() {
                var letter = document.getElementById("letter");
                var capital = document.getElementById("capital");
                var number = document.getElementById("number");
                var length = document.getElementById("length");
                var password = passwordInput.value.trim();

                // Kiểm tra xem tất cả các điều kiện đã thoả mãn hay không
                if (password !== "" &&
                    letter.classList.contains("valid") &&
                    capital.classList.contains("valid") &&
                    number.classList.contains("valid") &&
                    length.classList.contains("valid")) {
                    // Nếu tất cả các điều kiện đã thoả mãn, ẩn hộp điều kiện
                    document.getElementById("password-message").style.display = "none";
                    return true;
                } 
                
                else {
                    // Nếu mật khẩu trống, hiển thị thông báo lỗi
                    if (password === "") {
                        passwordError.textContent = "Password không được để trống";
                        document.getElementById("password-message").style.display = "none";
                    } 
                    // Nếu không, ẩn ô thông báo lỗi
                    else {
                        passwordError.textContent = ""; 
                    }
                    return false;
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

            // blur: Khi người dùng đã chọn 1 ô input và sau đó ấn ra ngoài
            // input: Khi người dùng nhập
            fullnameInput.addEventListener("blur", checkFullname);
            phoneInput.addEventListener("blur", checkPhone);
            birthdateInput.addEventListener("blur", checkBirthdate);
            emailInput.addEventListener("blur", checkEmail);
            passwordInput.addEventListener("input", checkPassword);
            passwordInput.addEventListener("blur", checkPasswordBlur);
            confirmPassInput.addEventListener("blur", checkConfirmPassword);
        });
    </script>

</body>
</html>
