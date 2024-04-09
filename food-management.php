
<style>
.food_admin__container {
    width: 100%;
    max-width: 1075px;
    margin: 0 auto;
    margin-top: 30px;
}

.food_admin__container .food_admin__heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.food_admin__container .food_admin__heading .title {
    color: #4F4F4F;
}

.food_admin__container .food_admin__heading .button button {
    padding: 12px 14px;
    background-color: #FFBE00;  
    color: white;
    outline: none;
    border-radius: 8px;
    border: none;
    cursor: pointer;
}

.food_admin__container .table-container {
    margin-top: 20px;
}

.food_admin__container table {
    width: 100%;
    border-collapse: collapse;
}

.food_admin__container th,
td {
    padding: 8px;
    text-align: center;

}

.food_admin__container th:not(:last-child),
td:not(:last-child) {


    border-right: 1px solid #ddd;
}

.food_admin__container th {
    background-color: #1A2C50;
    color: white;
}

.food_admin__container tr:nth-child(even) {
    background-color: #f2f2f2;
}

.food_admin__container table .edit-btn,
.food_admin__container table .delete-btn {
    padding: 6px 10px;
    margin-right: 5px;
    border: none;
    cursor: pointer;
    border-radius: 3px;
    color: white;
}

.food_admin__container table .edit-btn {
    background-color: #1A2C50;
    color: white;
    border: solid 1px #1A2C50;
}

.food_admin__container table .delete-btn {
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
$query = "SELECT combo_id, combo_name, description, price, img_url
FROM combo_food
LIMIT $startRow, $rowsPerPage";

$queryCount = "SELECT COUNT(*) AS total FROM combo_food";
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
        $table_body .= "<td>" . $row['combo_name'] . "</td>";
        $table_body .= "<td>" . number_format($row['price'], 0, ',', '.') . " VNĐ</td>";
        $table_body .= "<td><img src='" . $row['img_url'] . "' alt='" . $row['combo_name'] . "' width='100px' height='100px'></td>";
        $table_body .= "<td style='display: flex; justify-content: center; align-items: center;'>
                        <button class='edit-btn' onclick='redirectToEditFood(" . $row['combo_id'] . ")'>Sửa</button>               
                        <form method='post' action='' id='form-delete-food'>
                            <input type='hidden' name='combo_id' value='" . $row['combo_id'] . "'>
                            <button type='button' onclick='handleClick()' class='delete-btn' >Xóa</button>
                        </form>       
                       </td>";
        $table_body .= "</tr>";
    }
} else {
    // Nếu không có dữ liệu, hiển thị dòng thông báo
    $table_body .= "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $combo_id = $_POST['combo_id'];
    $query = "UPDATE combo_food SET is_deleted = '1' WHERE combo_id = '$combo_id'";
    if (chayTruyVanKhongTraVeDL($link, $query)) {
        // Redirect hoặc cập nhật trang tại đây nếu cần thiết
        $_SESSION['success_message'] = "Xoá thành công.";
        echo "<script> window.location.href='admin.php?handle=food-management';</script>";
    } else {
        echo "Xóa dữ liệu thất bại: ";
    }
}

// Giải phóng bộ nhớ sau khi sử dụng
giaiPhongBoNho($link, $result);


?>

<div class='food_admin__container'>
    <div class='food_admin__heading'>
        <div class='title'>
            Danh sách Combo đồ ăn
        </div>
        <div class='button'>
            <button onclick='redirectToCreateFood()'>
                Tạo combo mới
            </button>
        </div>
    </div>
    <div class='table-container'>
        <table>
            <thead>
                <tr>
                    <th>Tên Combo</th>
                    <th>Giá</th>
                    <th>Banner</th>
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
    function redirectToCreateFood() {
        // Chuyển hướng đến URL chứa tham số "handle=create-cinema"
        window.location.href = 'admin.php?handle=create-food';
    }

    function redirectToEditFood(id) {

        window.location.href = 'admin.php?handle=edit-food&id='+id;
    }
    function handleClick() {
    if (confirm("Bạn có chắc chắn muốn xóa?")) {
        // Nếu người dùng xác nhận muốn xóa
        document.getElementById("form-delete-food").submit(); // Gửi form
    }
}
</script>
