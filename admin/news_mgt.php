
<style>
.cinema-admin__container {
    width: 100%;
    max-width: 1075px;
    margin: 0 auto;
    margin-top: 30px;
}

.cinema-admin__container .cinema-admin__heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.cinema-admin__container .cinema-admin__heading .title {
    color: #4F4F4F;
}

.cinema-admin__container .cinema-admin__heading .button button {
    padding: 12px 14px;
    background-color: #FFBE00;
    color: white;
    outline: none;
    border-radius: 8px;
    border: none;
}

.cinema-admin__container .table-container {
    margin-top: 20px;
}

.cinema-admin__container table {
    width: 100%;
    border-collapse: collapse;
}

.cinema-admin__container th,
td {
    padding: 8px;
    text-align: center;

}

.cinema-admin__container th:not(:last-child),
td:not(:last-child) {


    border-right: 1px solid #ddd;
}

.cinema-admin__container th {
    background-color: #1A2C50;
    color: white;
}

.cinema-admin__container tr:nth-child(even) {
    background-color: #f2f2f2;
}

.cinema-admin__container table .edit-btn,
.cinema-admin__container table .delete-btn {
    padding: 6px 10px;
    margin-right: 5px;
    border: none;
    cursor: pointer;
    border-radius: 3px;
    color: white;
}

.cinema-admin__container table .edit-btn {
    background-color: #1A2C50;
    color: white;
    border: solid 1px #1A2C50;
}

.cinema-admin__container table .delete-btn {
    background-color: white;
    color: #1A2C50;
    border: solid 1px black;
}
</style>

<?php
require_once '../db_module.php';

// Kết nối đến cơ sở dữ liệu
$link = null;
taoKetNoi($link);

// Số lượng dòng trên mỗi trang
$rowsPerPage = 4;

// Lấy trang hiện tại từ biến currentPage
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startRow = ($currentPage - 1) * $rowsPerPage;

// Truy vấn để lấy dữ liệu từ bảng cities với phân trang
$query = "SELECT n.newsid, n.news_title, n.news_date, c.news_category_name
FROM news n
LEFT JOIN news_categories c ON n.news_category_id = c.news_category_id
ORDER BY n.news_date DESC
LIMIT $startRow, $rowsPerPage";

$queryCount = "SELECT COUNT(*) AS total FROM news";
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
        $table_body .= "<td>" . $row['news_title'] . "</td>";
        $table_body .= "<td>" . $row['news_date'] . "</td>";
        $table_body .= "<td>" . $row['news_category_name'] . "</td>";
        $table_body .= '<td>
                        <button class="edit-btn" onclick="redirectToEditNews('.$row['newsid'].')">Sửa</button>
                        <button class="delete-btn">Xóa</button>
                       </td>';
        $table_body .= "</tr>";
    }
} else {
    // Nếu không có dữ liệu, hiển thị dòng thông báo
    $table_body .= "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
}
// Giải phóng bộ nhớ sau khi sử dụng
giaiPhongBoNho($link, $result);


?>

<div class='cinema-admin__container'>
    <div class='cinema-admin__heading'>
        <div class='title'>
            Danh sách rạp
        </div>
        <div class='button'>
            <button onclick='redirectToCreateCinema()'>
                Tạo rạp mới
            </button>
        </div>
    </div>
    <div class='table-container'>
        <table>
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Ngày đăng</th>
                    <th>Phân loại</th>
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
function redirectToCreateNews() {
    // Chuyển hướng đến URL chứa tham số "handle=create-cinema"
    window.location.href = 'admin.php?handle=create-news';
}

function redirectToEditNews(id) {

    window.location.href = 'admin.php?handle=edit-news&id=id'+id;
}
</script>