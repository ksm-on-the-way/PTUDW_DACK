<style>
    .create-movie__container {
        width: 100%;
        max-width: 1075px;
        margin: 0 auto;
        margin-top: 30px;
    }

    .create-movie__container .create-movie__form form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .create-movie__container .create-movie__form .form-input {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 5px;
    }

    .create-movie__container .create-movie__form .form-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    .create-movie__container .create-movie__form .form-btn button {
        width: 150px;
        border-radius: 8px;
        padding: 10px 0px;
        border: 1px solid #1A2C50;
    }

    .create-movie__container .create-movie__form .form-btn .btn-add {
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
$queryGenre = "SELECT movie_genre_id, movie_genre_name FROM movie_genres";
$queryRate = "SELECT movie_rate_id, movie_rate_name FROM movie_rates";
$resultGenre = chayTruyVanTraVeDL($link, $queryGenre);
$resultRate = chayTruyVanTraVeDL($link, $queryRate);

// Mảng để lưu trữ các tùy chọn thành phố
$optionsGenre = "";
$optionsRate = "";

// Kiểm tra xem truy vấn có thành công không
if ($resultGenre) {
    // Duyệt qua kết quả và tạo tùy chọn cho từng thành phố
    while ($row = mysqli_fetch_assoc($resultGenre)) {
        $genre_id = $row['movie_genre_id'];
        $genre_name = $row['movie_genre_name'];
        $optionsGenre .= "<option value='$genre_id'>$genre_name</option>";
    }
} else {
    echo "Không thể lấy dữ liệu từ cơ sở dữ liệu.";
}
if ($resultRate) {
    // Duyệt qua kết quả và tạo tùy chọn cho từng thành phố
    while ($row = mysqli_fetch_assoc($resultRate)) {
        $rate_id = $row['movie_rate_id'];
        $rate_name = $row['movie_rate_name'];
        $optionsRate .= "<option value='$rate_id'>$rate_name</option>";
    }
} else {
    echo "Không thể lấy dữ liệu từ cơ sở dữ liệu.";
}


// Giải phóng bộ nhớ sau khi sử dụng
giaiPhongBoNho($link, $resultRate);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $link = null;
    taoKetNoi($link);
    // Kiểm tra xem tên rạp và địa chỉ có được gửi không
    if (
        isset($_POST['name']) && isset($_POST['banner']) && isset($_POST['trailer']) && isset($_POST['genre']) && isset($_POST['description']) && isset($_POST['genre'])
        && isset($_POST['duration']) && isset($_POST['rate']) && isset($_POST['director']) && isset($_POST['release-date']) && isset($_POST['end-date'])
    ) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];

        // Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
        $query = "INSERT INTO theaters (theater_name, theater_address, city_id) VALUES ('$name', '$address', '$city')";
        $result = chayTruyVanKhongTraVeDL($link, $query);

        if ($result) {
            $_SESSION['success_message'] = "Thêm rạp thành công.";
            echo "<script> window.location.href='admin.php?handle-movie-management';</script>";
        } else {
            echo "<script>alert('Đã có lỗi xảy ra.');</script>";
        }
        giaiPhongBoNho($link, $result);
    }
}

?>
<div class='create-movie__container'>
    <div>
        <h3>Tạo phim mới</h3>
    </div>
    <div class='create-movie__form'>
        <form method="POST" action="admin.php?handle=create-movie">
            <div class='form-input'>
                <label>Tên phim</label>
                <input type="text" name="name" placeholder='Nhập tên phim'>
            </div>
            <div class="upload-file">
                <div class="form-input">
                    <label>Banner</label>
                    <input type="file" name="banner" placeholder="Tải tệp lên">
                </div>
                <div class="form-input">
                    <label>Trailer</label>
                    <input type="file" name="trailer" placeholder="Tải tệp lên">
                </div>
            </div>
            <div class='form-input'>
                <label>Thể loại</label>
                <select name='genre'>
                    <?php echo $optionsGenre; ?>
                </select>
            </div>
            <div class='form-input'>
                <label>mô tả</label>
                <textarea name="description" placeholder="Mô tả phim" cols="30" rows="10"></textarea>
            </div>
            <div class='form-input'>
                <label>Độ dài phim</label>
                <input type="file" name="duration" placeholder="Nhập độ dài phim">
            </div>
            <div class='form-input'>
                <label>Nhãn phim</label>
                <select name='rate'>
                    <?php echo $optionsRate; ?>
                </select>
            </div>
            <div class='form-input'>
                <label>Đạo diễn</label>
                <input type="file" name="director" placeholder="Nhập tên đạo diễn">
            </div>
            <div class="date">
                <div class='form-input'>
                    <label>Ngày phát hành</label>
                    <input type="date" name="release-date" placeholder="dd/mm/yy">
                </div>
                <div class='form-input'>
                    <label>Ngày kết thúc</label>
                    <input type="date" name="end-date" placeholder="dd/mm/yy">
                </div>
            </div>

            <div class='form-btn'>
                <button type="button" class='btn-cancel'>Hủy</button>
                <button type="submit" class='btn-add'>Tạo phim</button>
            </div>
        </form>
    </div>
</div>