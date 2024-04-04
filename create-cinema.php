<style>
.create-cinema__container {
    width: 100%;
    max-width: 1075px;
    margin: 0 auto;
    margin-top: 30px;
}

.create-cinema__container .create-cinema__form form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.create-cinema__container .create-cinema__form .form-input {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 5px;
}

.create-cinema__container .create-cinema__form .form-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.create-cinema__container .create-cinema__form .form-btn button {
    width: 150px;
    border-radius: 8px;
    padding: 10px 0px;
    border: 1px solid #1A2C50;
}

.create-cinema__container .create-cinema__form .form-btn .btn-add {
    background-color: #1A2C50;
    color: white;
}
</style>
<?php
require_once './db_module.php';

// Kết nối đến cơ sở dữ liệu
$link = null;
taoKetNoi($link);

// Truy vấn để lấy dữ liệu từ bảng cities
$query = "SELECT city_id, city_name FROM cities";
$result = chayTruyVanTraVeDL($link, $query);

// Mảng để lưu trữ các tùy chọn thành phố
$options = "";

// Kiểm tra xem truy vấn có thành công không
if ($result) {
    // Duyệt qua kết quả và tạo tùy chọn cho từng thành phố
    while ($row = mysqli_fetch_assoc($result)) {
        $city_id = $row['city_id'];
        $city_name = $row['city_name'];
        $options .= "<option value='$city_id'>$city_name</option>";
    }


} else {
    echo "Không thể lấy dữ liệu từ cơ sở dữ liệu.";
}
// Giải phóng bộ nhớ sau khi sử dụng
giaiPhongBoNho($link, $result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $link = null;
    taoKetNoi($link);
    // Kiểm tra xem tên rạp và địa chỉ có được gửi không
    if (isset($_POST['name']) && isset($_POST['address']) && $_POST['city']) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];

        // Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
        $query = "INSERT INTO theaters (theater_name, theater_address, city_id) VALUES ('$name', '$address', '$city')";
        $result = chayTruyVanKhongTraVeDL($link, $query);

        if ($result) {
            $_SESSION['success_message'] = "Thêm rạp thành công.";
            echo "<script> window.location.href='admin.php?handle=cinema-management';</script>";

        } else {
            echo "<script>alert('Đã có lỗi xảy ra.');</script>";

        }
        giaiPhongBoNho($link, $result);
    }

}

?>
<div class='create-cinema__container'>
    <div>
        <h3>Tạo rạp mới</h3>
    </div>
    <div class='create-cinema__form'>
        <form method="POST" action="admin.php?handle=create-cinema">
            <div class='form-input'>
                <label>Tên rạp</label>
                <input type="text" name="name" placeholder='Nhập tên rạp'>
            </div>
            <div class='form-input'>
                <label>Địa chỉ</label>
                <input type="text" name='address' placeholder='Nhập địa chỉ'>
            </div>
            <div class='form-input'>
                <label>Thành phố</label>
                <select name='city'>
                    <?php echo $options; ?>
                </select>
            </div>
            <div class='form-btn'>
                <button type="button" class='btn-cancel'>Hủy</button>
                <button type="submit" class='btn-add'>Tạo rạp</button>
            </div>
        </form>
    </div>
</div>