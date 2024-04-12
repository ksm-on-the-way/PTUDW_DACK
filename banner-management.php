<style>
.banner-admin__container {
    width: 100%;
    max-width: 1075px;
    margin: 0 auto;
    margin-top: 30px;
}

.banner-admin__container .show-admin__heading {
    /* display: flex; */
    /* align-items: center; */
    justify-content: flex-start;
    font-family: Roboto, sans-serif;
    margin-top: 30px;
}

.banner-admin__container .banner-admin__heading .title {
    color: #4F4F4F;
    font-family: Roboto, sans-serif;
    font-size: 40;
}

.banner-admin__container .banner-admin__heading .button {
    padding: 12px 14px;
    background-color: #FFBE00;
    color: white;
    outline: none;
    border-radius: 8px;
    border: none;
    font-family: Roboto, sans-serif;
}

.banner-admin__container .banner-admin__heading .form_button {
    padding: 12px 14px;
    color: white;
    border-radius: 8px;
    border-style: dashed;
    border-color:#4F4F4F;
    border-width: 2px;
    font-family: Roboto, sans-serif;
}

.banner-admin__container .table-container {
    margin-top: 20px;
}

.banner-admin__container table {
    width: 100%;
    border-collapse: collapse;
}

.banner-admin__container th,
td {
    padding: 8px;
    text-align: center;
    font-family: Roboto, sans-serif;

}

.banner-admin__container th:not(:last-child),
td:not(:last-child) {
    border-right: 1px solid #ddd;
}

.banner-admin__container th {
    background-color: #1A2C50;
    color: white;
}

.banner-admin__container tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>

<?php
// Load the database configuration file
include_once './db_module.php';
$link = null;
taoKetNoi($link);
?>

<?php
// Số lượng dòng trên mỗi trang
$rowsPerPage = 4;

// Lấy trang hiện tại từ biến currentPage
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startRow = ($currentPage - 1) * $rowsPerPage;

// Truy vấn để lấy dữ liệu từ bảng cities với phân trang
$query = "SELECT  p.banner_id, s.start_time FROM promo_banners p
-- WHERE date > CURRENT_DATE()
ORDER BY show_id DESC
LIMIT $startRow, $rowsPerPage";

 $queryCount = "SELECT COUNT(*) AS total FROM shows";
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
        $table_body .= "<td>" . $row['movie_name'] . "</td>";
        $table_body .= "<td>" . $row['date'] . "</td>";
        $table_body .= "<td>" . $row['start_time'] . "</td>";
        $table_body .= "<td>" . $row['room_id'] . "</td>";
        $table_body .= "</tr>";
    }
} else {
    // Nếu không có dữ liệu, hiển thị dòng thông báo
    $table_body .= "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
}
?>

<div class='show-admin__container'>
    <div class='show-admin__heading'>
        <div class='title'>
            Lên lịch chiếu
        </div>
    </div>

    <div class='table-container'>
        <table>
            <thead>
                <tr>
                    <th>Tên phim</th>
                    <th>Ngày chiếu</th>
                    <th>Giờ chiếu</th>
                    <th>ID Phòng chiếu</th>
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