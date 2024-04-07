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
.cinema-admin__container table #delete-btn {
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

.cinema-admin__container table #delete-btn {
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
$query = "SELECT t.theater_id, t.theater_name, t.theater_address, c.city_name, COUNT(r.room_id) AS room_count
FROM theaters t
LEFT JOIN cities c ON t.city_id = c.city_id
LEFT JOIN rooms r ON t.theater_id = r.theater_id
WHERE is_deleted = '0'
GROUP BY t.theater_id
ORDER BY t.theater_id DESC
LIMIT $startRow, $rowsPerPage";

$queryCount = "SELECT COUNT(*) AS total FROM theaters WHERE is_deleted = '0'";
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
        $table_body .= "<td>" . $row['theater_name'] . "</td>";
        $table_body .= "<td>" . $row['theater_address'] . "</td>";
        $table_body .= "<td>" . $row['city_name'] . "</td>";
        $table_body .= "<td>" . $row['room_count'] . "</td>";
        $table_body .= "<td>
                        <button class='edit-btn' onclick='redirectToEditCinema(" . $row['theater_id'] . ")'>Sửa</button>
                        <form method='post' action='' id='form-delete-theater'>
                        <input type='hidden' name='theater_id' value='" . $row['theater_id'] . "'>
                        <button type='button' onclick='handleClick()' id='delete-btn' >Xóa</button>
                    </form>
                       </td>";
        $table_body .= "</tr>";
    }
} else {
    // Nếu không có dữ liệu, hiển thị dòng thông báo
    $table_body .= "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theater_id = $_POST['theater_id'];
    $query = "UPDATE theaters SET is_deleted = '1' WHERE theater_id = '$theater_id'";
    if (chayTruyVanKhongTraVeDL($link, $query)) {
        // Redirect hoặc cập nhật trang tại đây nếu cần thiết
        echo "<script> window.location.href='admin.php?handle=cinema-management';</script>";
    } else {
        echo "Xóa dữ liệu thất bại: ";
    }
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
                    <th>Tên rạp</th>
                    <th>Địa chỉ</th>
                    <th>Thành phố</th>
                    <th>Số lượng phòng chiếu</th>
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
function redirectToCreateCinema() {
    // Chuyển hướng đến URL chứa tham số "handle=create-cinema"
    window.location.href = 'admin.php?handle=create-cinema';
}

function redirectToEditCinema(theaterId) {

    window.location.href = `admin.php?handle=edit-cinema&theaterId=${theaterId}`;
}

function handleClick() {
    if (confirm("Bạn có chắc chắn muốn xóa?")) {
        // Nếu người dùng xác nhận muốn xóa
        document.getElementById("form-delete-theater").submit(); // Gửi form
    }
}
</script>