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
                <tr>
                    <td>Rạp A</td>
                    <td>123 Đường ABC</td>
                    <td>Hồ Chí Minh</td>
                    <td>5</td>
                    <td>
                        <button class="edit-btn" onclick='redirectToEditCinema()'>Sửa</button>
                        <button class="delete-btn">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>Rạp B</td>
                    <td>456 Đường XYZ</td>
                    <td>Hà Nội</td>
                    <td>7</td>
                    <td>
                        <button class="edit-btn" onclick='redirectToEditCinema()'>Sửa</button>
                        <button class="delete-btn">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>Rạp C</td>
                    <td>789 Đường LMN</td>
                    <td>Đà Nẵng</td>
                    <td>4</td>
                    <td>
                        <button class="edit-btn" onclick='redirectToEditCinema()'>Sửa</button>
                        <button class="delete-btn">Xóa</button>
                    </td>
                </tr>
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

function redirectToEditCinema() {

    window.location.href = 'admin.php?handle=edit-cinema';
}
</script>