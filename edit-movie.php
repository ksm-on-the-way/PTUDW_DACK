<style>
    .edit-movie__container {
        width: 100%;
        max-width: 1075px;
        margin: 0 auto;
        margin-top: 30px;
    }

    .edit-movie__container .edit-movie__form form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .edit-movie__container .edit-movie__form .form-input {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 5px;
    }

    .edit-movie__container .edit-movie__form .form-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    .edit-movie__container .edit-movie__form .form-btn button {
        width: 150px;
        border-radius: 8px;
        padding: 10px 0px;
        border: 1px solid #1A2C50;
    }

    .edit-movie__container .edit-movie__form .form-btn .btn-add {
        background-color: #1A2C50;
        color: white;
    }
    .btn-add:hover {
        cursor: pointer;
    }
    .btn-cancel:hover{
        cursor: pointer;
    }
</style>
<?php
require_once './db_module.php';

// Kết nối đến cơ sở dữ liệu
$link = null;
taoKetNoi($link);
$movieId = isset($_GET['movieId']) ? $_GET['movieId'] : null;

$moviename = "";
$actorname = "";
$description= "";
$duration = "";
$releaseDate = "";
$endDate = "";
$trailer = "";
$director = "";
$genre = "";
$rate = "";
$optionsGenre = "";
$optionsRate = "";
$optionsDirector = "";

if ($movieId) {
    $query = "SELECT * FROM movies WHERE movie_id = '$movieId' ";
    $result = chayTruyVanTraVeDL($link, $query);

    // Kiểm tra xem có dữ liệu trả về không
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $moviename = $row['movie_name'];
        $actorname = $row['actor'];
        $description= $row['movie_description'];
        $duration = $row['movie_duration'];
        $releaseDate = $row['release_date'];
        $endDate = $row['end_date'];
        $trailer = $row['trailer_url'];
        $director = $row['movie_director_id'];
        $genre = $row['movie_genre_id'];
        $rate = $row['movie_rate_id'];

    }
}



// Truy vấn để lấy dữ liệu từ bảng cities
$queryGenre = "SELECT movie_genre_id, movie_genre_name FROM movie_genres";
$queryRate = "SELECT movie_rate_id, movie_rate_name FROM movie_rates";
$queryDirector = "SELECT movie_director_id, movie_director_name FROM movie_directors";
$resultGenre = chayTruyVanTraVeDL($link, $queryGenre);
$resultRate = chayTruyVanTraVeDL($link, $queryRate);
$resultDirector = chayTruyVanTraVeDL($link, $queryDirector);

// Mảng để lưu trữ các tùy chọn thành phố


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
if ($resultDirector) {
    // Duyệt qua kết quả và tạo tùy chọn cho từng thành phố
    while ($row = mysqli_fetch_assoc($resultDirector)) {
        $director_id = $row['movie_director_id'];
        $director_name = $row['movie_director_name'];
        $optionsDirector .= "<option value='$director_id'>$director_name</option>";
    }
} else {
    echo "Không thể lấy dữ liệu từ cơ sở dữ liệu.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $link = null;
    taoKetNoi($link);
    function uploadFileTo($uploadfile, $uploaddir, &$oldfilename)
    {
        $filetemp = $_FILES["$uploadfile"]['tmp_name'];
        $oldfilename = $_FILES["$uploadfile"]['name'];
        return move_uploaded_file($filetemp, $uploaddir . $oldfilename);
    }

    $folderSaveFileUpload = "./uploadFile/";
    $fileNameBanner = '';
    $fileNameTrailer = '';
    $result_upload_banner = uploadFileTo("banner", $folderSaveFileUpload, $fileNameBanner);
    $result_upload_trailer = uploadFileTo("trailer", $folderSaveFileUpload, $fileNameTrailer);
    // Kiểm tra xem tên rạp và địa chỉ có được gửi không
    if (isset($_POST['movie_name']) && isset($_POST['actor-name']) && isset($_POST['genre'])&& isset($_POST['description'])&& isset($_POST['duration'])&& isset($_POST['rate'])&& isset($_POST['director'])&& isset($_POST['release-date'])&& isset($_POST['end-date'])) {
        $moviename = $_POST['movie-name'];
        $actorname = $_POST['actor-name'];
        $banner = $folderSaveFileUpload . $fileNameBanner;
        $trailer = $folderSaveFileUpload . $fileNameTrailer;
        $genre = $_POST['genre'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $rate = $_POST['rate'];
        $director = $_POST['director'];
        $releaseDate = $_POST['release-date'];
        $endDate = $_POST['end-date'];

        // Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
        $querySaveMovie = "UPDATE movies SET movie_name='$moviename', actor='$actorname', movie_description='$description', movie_duration = '$duration', release_date = '$releaseDate', end_date = '$endDate', trailer_url = '$trailer', movie_director_id = '$director', movie_genre_id = '$genre', movie_rate_id = '$rate' WHERE theater_id = $theaterId";
        $resultSaveMovie = chayTruyVanKhongTraVeDL($link, $querySaveMovie);


        $query_movieid = "SELECT movie_id FROM movies WHERE movie_name = '$moviename'";
        $result_movieid = chayTruyVanTraVeDL($link, $query_movieid);
        $queryBanner = '';
        while ($row = mysqli_fetch_assoc($result_movieid)) {
            $movieid = $row['movie_id'];
            $queryBanner = "UPDATE movie_banner_images SET image_url = $banner WHERE movie_id = '$movieid'";
        }
        $resultQueryBanner = chayTruyVanKhongTraVeDL($link, $queryBanner);
        if ($querySaveMovie && $resultQueryBanner) {
            $_SESSION['success_message'] = "Sửa thông tin rạp thành công.";
            echo "<script> window.location.href='admin.php?handle=film-management';</script>";
        } else {
            echo "<script>alert('Đã có lỗi xảy ra.');</script>";

        }
        giaiPhongBoNho($link, $resultQueryBanner);
    }

}

?>
<div class='edit-movie__container'>
    <div>
        <h3>Tạo phim mới</h3>
    </div>
    <div class='edit-movie__form'>
        <form method="POST" action="admin.php?handle=edit-movie" enctype="multipart/form-data">
            <div class='form-input'>
                <label>Tên phim</label>
                <input type="text" name="movie-name" placeholder='Nhập tên phim' value="<?php echo $moviename?>">
            </div>
            <div class='form-input'>
                <label>Diễn viên</label>
                <input type="text" name="actor-name" placeholder='Nhập tên diễn viên' value="<?php echo $actorname?>">
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
                <textarea name="description" placeholder="Mô tả phim" cols="30" rows="10" value="<?php echo $description?>"></textarea>
            </div>
            <div class='form-input'>
                <label>Độ dài phim</label>
                <input type="text" name="duration" placeholder="Nhập độ dài phim" value="<?php echo $duration?>">
            </div>
            <div class='form-input'>
                <label>Nhãn phim</label>
                <select name='rate'>
                    <?php echo $optionsRate; ?>
                </select>
            </div>
            <div class='form-input'>
                <label>Đạo diễn</label>
                <select name='director' value="<?php echo $director?>">
                    <?php echo $optionsDirector; ?>
                </select>
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
                <button type="button" onclick="redirectToFilmManagement()" class='btn-cancel'>Hủy</button>
                <button type="submit" class='btn-add'>Sửa phim</button>
            </div>
        </form>
    </div>
</div>

<script>
    function redirectToFilmManagement() {
        window.location.href = 'admin.php?handle=film-management';
    }
</script>