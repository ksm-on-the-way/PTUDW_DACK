<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Kiểm tra nếu tồn tại thông tin người dùng trong session, gán giá trị cho các biến tương ứng
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    require_once "./db_module.php";
    $link = NULL;
    taoKetNoi($link);
    $sql = "SELECT fullname, email, phone, birth_date, gender FROM users WHERE user_id = ?";

    // Chuẩn bị và thực thi câu lệnh SQL
    $stmt = mysqli_prepare($link, $sql);
    $user_id = $_SESSION['userid']; // Thêm dòng này để khai báo biến $user_id
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    // Lấy kết quả
    $result = mysqli_stmt_get_result($stmt);

    // Kiểm tra xem có dữ liệu trả về hay không
    if (mysqli_num_rows($result) > 0) {
        // Lấy dữ liệu từ kết quả và gán cho các biế    n tương ứng
        $row = mysqli_fetch_assoc($result);
        $fullname = $row['fullname'];
        $email = $row['email'];
        $phone = $row['phone'];
        $birth_date = $row['birth_date'];
        $gender = $row['gender'];

        // Hiển thị form cập nhật thông tin cá nhân
        include "header.php";
        echo '
        <html>
        <head>
            <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
        </head>
        <body>
            <div class="container">
                <header>
                    <h1>Thông tin cá nhân</h1>
                </header>
            <div class="update-form">
                <form action="update_info.php" method="POST">
                    <div class="form-group">
                        <label for="fullname">Họ và tên:</label>
                        <input type="text" id="fullname" name="fullname" value="' . $fullname . '">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="' . $email . '">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="text" id="phone" name="phone" value="' . $phone . '">
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Ngày sinh:</label>
                        <input type="date" id="birth_date" name="birth_date" value="' . $birth_date . '">
                    </div>
                    <div class="form-group gender-group">
                        <label for="gender">Giới tính:</label>
                        <input type="radio" id="male" name="gender" value="1" ' . ($gender == 1 ? 'checked' : '') . '>
                        <label class="gender-label" for="male">Nam</label>
                        <input type="radio" id="female" name="gender" value="0" ' . ($gender == 0 ? 'checked' : '') . '>
                        <label class="gender-label" for="female">Nữ</label>
                </div>
                </form>
            </div>
                <div class ="button-update">
                    <button type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
        </div>
        </body>
        </html>';
        include "footer.php";



    } else {
        // Hiển thị thông báo nếu không tìm thấy thông tin người dùng
        echo "Không tìm thấy thông tin người dùng.";
    }
} else {
    // Hiển thị thông báo nếu không có thông tin người dùng trong session
    echo "Không có thông tin người dùng trong session.";
}

// Kiểm tra nếu form đã được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Yêu cầu file chứa module cơ sở dữ liệu
    require_once "./db_module.php";

    // Lấy dữ liệu từ form
    $user_id = $_SESSION["userid"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $birth_date = $_POST["birth_date"];
    $gender = $_POST["gender"];

    // Tạo kết nối tới cơ sở dữ liệu
    $link = NULL;
    taoKetNoi($link);

    // Chuẩn bị câu lệnh SQL để cập nhật dữ liệu vào cơ sở dữ liệu
    $sql = "UPDATE users SET fullname = ?, email = ?, phone = ?, birth_date = ?, gender = ? WHERE user_id = ?";

    $stmt = mysqli_prepare($link, $sql);

    // Liên kết các tham số với câu lệnh SQL đã chuẩn bị
    mysqli_stmt_bind_param($stmt, "sssssi", $fullname, $email, $phone, $birth_date, $gender, $user_id);

    // Thực thi câu lệnh
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['birth_date'] = $birth_date;
        $_SESSION['gender'] = $gender;

        echo "<script>alert('Cập nhật thông tin cá nhân thành công.');</script>";
        echo "<script>window.location.href='update_info.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($link);
    }

    mysqli_stmt_close($stmt);

    giaiPhongBoNho($link, $result);
} else {
    // Chuyển hướng về trang form nếu form chưa được gửi đi
}

?>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}


.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    text-align: center;
    margin-bottom: 20px;
}

header h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

.update-form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.gender-label {
    font-weight: normal;
    /* Loại bỏ đậm */
}


#email,
#phone {
    opacity: 0.5;
    /* Làm mờ */
    pointer-events: none;
    /* Ngăn người dùng tương tác */
    background-color: #808080;
}


input[type="text"],
input[type="email"],
input[type="date"],
input[type="file"],
input[type="radio"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="radio"] {
    width: auto;
    margin-right: 10px;
}

.gender-group label {
    display: inline-block;
    /* Đặt các label nằm cạnh nhau */
    margin-right: 10px;
    /* Khoảng cách giữa các label */
}


button {
    background-color: var(--Royal-Blue, #1a2c50);
    color: var(--Shade-100, #fff);
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

.button-update {
    display: flex;
    justify-content: center;
}

button:hover {
    background-color: var(--Royal-Blue, #1a1c50);
}
</style>