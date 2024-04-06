<style>
    .movie-admin__container {
        width: 100%;
        max-width: 1075px;
        margin: 0 auto;
        margin-top: 30px;
    }

    .movie-admin__container .movie-admin__heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .movie-admin__container .movie-admin__heading .title {
        color: #4F4F4F;
    }

    .movie-admin__container .movie-admin__heading .button button {
        padding: 12px 14px;
        background-color: #FFBE00;
        color: white;
        outline: none;
        border-radius: 8px;
        border: none;
    }

    .movie-admin__container .table-container {
        margin-top: 20px;
    }

    .movie-admin__container table {
        width: 100%;
        border-collapse: collapse;
    }

    .movie-admin__container th,
    td {
        padding: 8px;
        text-align: center;

    }

    .movie-admin__container th:not(:last-child),
    td:not(:last-child) {


        border-right: 1px solid #ddd;
    }

    .movie-admin__container th {
        background-color: #1A2C50;
        color: white;
    }

    .movie-admin__container tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .movie-admin__container table .edit-btn,
    .movie-admin__container table .delete-btn {
        padding: 6px 10px;
        margin-right: 5px;
        border: none;
        cursor: pointer;
        border-radius: 3px;
        color: white;
    }

    .movie-admin__container table .edit-btn {
        background-color: #1A2C50;
        color: white;
        border: solid 1px #1A2C50;
    }

    .movie-admin__container table .delete-btn {
        background-color: white;
        color: #1A2C50;
        border: solid 1px black;
    }
</style>
<?php



// Kiểm tra xem có thông báo thành công được lưu trong session không
if (isset($_SESSION['success_message'])) {
    // Hiển thị thông báo và xóa nó khỏi session
    echo "<script>alert('" . $_SESSION['success_message'] . "');</script>";
    unset($_SESSION['success_message']);
}
?>
<?php
require_once './db_module.php';

// Kết nối đến cơ sở dữ liệu
$link = null;
taoKetNoi($link);

// Số lượng dòng trên mỗi trang
$rowsPerPage = 4;

// Lấy trang hiện tại từ biến currentPage
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startRow = ($currentPage - 1) * $rowsPerPage;

// Truy vấn để lấy dữ liệu từ bảng cities với phân trang
$query = "SELECT m.movie_id, m.movie_name, m.release_date, m.end_date
FROM movies m
ORDER BY m.movie_id DESC
LIMIT $startRow, $rowsPerPage";

$queryCount = "SELECT COUNT(*) AS total FROM movies";
$resultCount = chayTruyVanTraVeDL($link, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalPages = ceil($rowCount['total'] / $rowsPerPage);


$result = chayTruyVanTraVeDL($link, $query);

$table_body = "";

// Kiểm tra xem truy vấn có thành công không
if (mysqli_num_rows($result) > 0) {
    // Bắt đầu vòng lặp để xây dựng chuỗi HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $table_body .= "<tr>";
        $table_body .= "<td>" . $row['movie_id'] . "</td>";
        $table_body .= "<td>" . $row['movie_name'] . "</td>";
        $table_body .= "<td>" . $row['release_date'] . "</td>";
        $table_body .= "<td>" . $row['end_date'] . "</td>";
        $table_body .= "<td>
                        <button class='edit-btn' onclick='redirectToEditMovie(" . $row['movie_id'] . ")'>Sửa</button>
                        <form method='post' action=''>
                        <input type='hidden' name='movie_id' value='" . $row['movie_id'] . "'>
                        <button type='submit' class='delete-btn' >Xóa</button>
                        </form>
                       </td>";
        $table_body .= "</tr>";
    }
} else {
    // Nếu không có dữ liệu, hiển thị dòng thông báo
    $table_body .= "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST['movie_id'];
    $query = "DELETE FROM theaters WHERE movie_id = '$movie_id'";
    if (chayTruyVanKhongTraVeDL($link, $query)) {
        // Redirect hoặc cập nhật trang tại đây nếu cần thiết
        echo "<script> window.location.href='admin.php?handle=movie-management';</script>";
    } else {
        echo "Xóa dữ liệu thất bại: ";
    }
}
// Giải phóng bộ nhớ sau khi sử dụng
giaiPhongBoNho($link, $result);


?>
<div class='movie-admin__container'>
    <div class='movie-admin__heading'>
        <div class='title'>
            Danh sách phim
        </div>
        <div class='button'>
            <button onclick='redirectToCreateMovie()'>
                Tạo phim
            </button>
        </div>
    </div>
    <div class='table-container'>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên phim</th>
                    <th>Ngày phát hành</th>
                    <th>Ngày kết thúc</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $table_body; ?>
            </tbody>
        </table>
        <div>
            <?php
            include 'pagination.php'; // Trang mặc định khi không có tham số trong URL
            ?>
        </div>
    </div>
</div>
<script>
    function redirectToCreateMovie() {
        // Chuyển hướng đến URL chứa tham số "handle=create-movie"
        window.location.href = 'admin.php?handle=create-movie';
    }

    function redirectToEditMovie(movieId) {

        window.location.href = `admin.php?handle=edit-movie&movieId=${movieId}`;
    }
</script>