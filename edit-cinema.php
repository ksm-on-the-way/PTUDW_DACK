<style>
.edit-cinema__container {
    width: 100%;
    max-width: 1075px;
    margin: 0 auto;
    margin-top: 30px;
}

.edit-cinema__container .edit-cinema__form form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.edit-cinema__container .edit-cinema__form .form-input {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 5px;
}


.edit-cinema__container .edit-cinema__form .form-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}


.edit-cinema__container .edit-cinema__form .form-btn button {
    width: 150px;
    border-radius: 8px;
    padding: 10px 0px;
    border: 1px solid #1A2C50;
    cursor: pointer
}
.edit-cinema__container .edit-cinema__form .form-btn .btn-add {
    background-color: #1A2C50;
    color: white;
}

.edit-cinema__container .table-container {
    margin-top: 20px;
}

.edit-cinema__container table {
    width: 100%;
    border-collapse: collapse;
}

.edit-cinema__container th,
td {
    padding: 8px;
    text-align: center;

}

.edit-cinema__container th:not(:last-child),
td:not(:last-child) {


    border-right: 1px solid #ddd;
}

.edit-cinema__container th {
    background-color: #1A2C50;
    color: white;
}

.edit-cinema__container tr:nth-child(even) {
    background-color: #f2f2f2;
}

.input-cell {
    position: relative;
}

.input-cell input {
    width: calc(100% - 16px);
    box-sizing: border-box;
}

.input-cell .value {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 8px;
}
</style>
<?php
require_once './db_module.php';

// Kết nối đến cơ sở dữ liệu
$link = null;
taoKetNoi($link);

$theaterId = isset($_GET['theaterId']) ? $_GET['theaterId'] : null;

// Khởi tạo biến để lưu trữ thông tin rạp
$theaterName = "";
$theaterAddress = "";
$selectedCityId = "";

// Nếu theaterId tồn tại, thực hiện truy vấn để lấy thông tin rạp
if ($theaterId) {
    $query = "SELECT * FROM theaters WHERE theater_id = '$theaterId' ";
    $result = chayTruyVanTraVeDL($link, $query);

    // Kiểm tra xem có dữ liệu trả về không
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $theaterName = $row['theater_name'];
        $theaterAddress = $row['theater_address'];
        $selectedCityId = $row['city_id'];
    }
}

// Truy vấn để lấy dữ liệu từ bảng cities
$queryCity = "SELECT city_id, city_name FROM cities";
$resultCity = chayTruyVanTraVeDL($link, $queryCity);

// Mảng để lưu trữ các tùy chọn thành phố
$options = "";

// Kiểm tra xem truy vấn có thành công không
if ($resultCity) {
    // Duyệt qua kết quả và tạo tùy chọn cho từng thành phố
    while ($row = mysqli_fetch_assoc($resultCity)) {
        $city_id = $row['city_id'];
        $city_name = $row['city_name'];
        $selected = ($city_id == $selectedCityId) ? "selected" : "";
        $options .= "<option value='$city_id' $selected>$city_name</option>";
    }


} else {
    echo "Không thể lấy dữ liệu từ cơ sở dữ liệu.";
}

$queryRoom = "SELECT r.room_id, r.room_name, rt.room_type_name 
        FROM rooms r
        INNER JOIN room_types rt ON r.room_type_id = rt.room_type_id
        WHERE r.theater_id = $theaterId";
$resultRoom = chayTruyVanTraVeDL($link, $queryRoom);
$dataRoom = "";
if (mysqli_num_rows($resultRoom) > 0) {
    // In ra dữ liệu dưới dạng bảng HTML


    while ($row = $resultRoom->fetch_assoc()) {
        $dataRoom .= "<tr>";
        $dataRoom .= "<td>" . $row["room_id"] . "</td>";
        $dataRoom .= "<td>" . $row["room_name"] . "</td>";
        $dataRoom .= "<td>" . $row["room_type_name"] . "</td>";
        $dataRoom .= "<td><button onclick='editRoom(this)'>Sửa</button><button onclick='deleteRoom(this)'>Xóa</button></td>";
        $dataRoom .= "</tr>";

    }

} else {
    echo "Không có dữ liệu.";
}

if (isset($_POST['action']) && $_POST['action'] == 'saveChangeRoom') {
    // Lấy dữ liệu từ POST request
    $room_id = $_POST['roomId'];
    $room_name = $_POST['roomName'];

    // Prepare and execute the SQL query
    $queryRoomChange = "UPDATE rooms SET room_name='$room_name' WHERE room_id=$room_id";
    if (chayTruyVanKhongTraVeDL($link, $queryRoomChange)) {
        // Redirect or update page as needed
        echo "Data updated successfully";
    } else {
        echo "Failed to update data";
    }
}

// Truy vấn để lấy dữ liệu từ bảng cities
$queryRoomType = "SELECT room_type_id, room_type_name FROM room_types";
$resultRoomType = chayTruyVanTraVeDL($link, $queryRoomType);

// Mảng để lưu trữ các tùy chọn thành phố
$roomTypeOptions = "";

// Kiểm tra xem truy vấn có thành công không
if ($resultRoomType) {
    // Duyệt qua kết quả và tạo tùy chọn cho từng thành phố
    while ($row = mysqli_fetch_assoc($resultRoomType)) {
        $room_type_id = $row['room_type_id'];
        $room_type_name = $row['room_type_name'];
        // $selected = ($room_type_id == $selectedCityId) ? "selected" : "";
        $roomTypeOptions .= "<option value='$room_type_id' >$room_type_name</option>";
    }


} else {
    echo "Không thể lấy dữ liệu từ cơ sở dữ liệu.";
}

if (isset($_POST['action']) && $_POST['action'] == 'saveRoomToTheater') {
    // Lấy dữ liệu từ POST request
    $room_name = $_POST['room_name'];
    $room_type_id = $_POST['room_type_id'];

    // Prepare and execute the SQL query
    $queryRoomToTheater = "INSERT INTO rooms (room_name, room_type_id,theater_id) VALUES ('$room_name', '$room_type_id', '$theaterId')";
    $resultRoomToTheater = chayTruyVanKhongTraVeDL($link, $queryRoomToTheater);
    if ($resultRoomToTheater) {
        echo "<script> window.location.href='admin.php?handle=edit-cinema&theaterId=$theaterId';</script>";

    } else {
        echo "Failed to update data";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $link = null;
    taoKetNoi($link);
    // Kiểm tra xem tên rạp và địa chỉ có được gửi không
    if (isset($_POST['theater_name']) && isset($_POST['theater_address']) && $_POST['city_id']) {
        $name = $_POST['theater_name'];
        $address = $_POST['theater_address'];
        $city = $_POST['city_id'];

        // Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
        $querySaveTheater = "UPDATE theaters SET theater_name='$name', theater_address='$address', city_id='$city' WHERE theater_id = $theaterId";
        $resultSaveTheater = chayTruyVanKhongTraVeDL($link, $querySaveTheater);

        if ($resultSaveTheater) {
            $_SESSION['success_message'] = "Sửa thông tin rạp thành công.";
            echo "<script> window.location.href='admin.php?handle=cinema-management';</script>";
        } else {
            echo "<script>alert('Đã có lỗi xảy ra.');</script>";

        }
    }

}
if (isset($_POST['action']) && $_POST['action'] == 'deleteRoom') {
    // Lấy dữ liệu từ POST request
    $room_id = $_POST['roomId'];

    // Prepare and execute the SQL query
    $queryDeleteRoom = "DELETE FROM rooms WHERE room_id = $room_id";
    $resultDeleteRoom = chayTruyVanKhongTraVeDL($link, $queryDeleteRoom);
    if ($resultDeleteRoom) {
        echo "<script> window.location.href='admin.php?handle=edit-cinema&theaterId=$theaterId';</script>";

    } else {
        echo "Failed to update data";
    }
}

// Giải phóng bộ nhớ sau khi sử dụng
giaiPhongBoNho($link, $result);


?>
<div class='edit-cinema__container'>
    <div>
        <h3>Thông tin rạp</h3>
    </div>
    <div class='edit-cinema__form'>

        <form method="POST" action="admin.php?handle=edit-cinema&theaterId=<?php echo $theaterId; ?>"
            id='form-edit-cinema'>
            <div class='form-input'>
                <label>Tên rạp</label>
                <input placeholder='Nhập tên rạp' name='theater_name' value='<?php echo $theaterName; ?>'>
            </div>
            <div class='form-input'>
                <label>Địa chỉ</label>
                <input placeholder='Nhập địa chỉ' name='theater_address' value='<?php echo $theaterAddress; ?>'>
            </div>
            <div class='form-input'>
                <label>Thành phố</label>
                <select name='city_id'>
                    <?php echo $options; ?>
                </select>
            </div>

        <form>
            <div class='form-input'>
                <label>Tên rạp</label>
                <input placeholder='Nhập tên rạp' value='<?php echo $theaterName; ?>'>
            </div>
            <div class='form-input'>
                <label>Địa chỉ</label>
                <input placeholder='Nhập địa chỉ' value='<?php echo $theaterAddress; ?>'>
            </div>
            <div class='form-input'>
                <label>Thành phố</label>
                <select>
                    <?php echo $options; ?>
                </select>
            </div>


        </form>
    </div>
    <div class='table-container'>
        <table id='table'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên phòng</th>
                    <th>Loại phòng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $dataRoom; ?>
            </tbody>
        </table>

    </div>
    <div>
        <button onclick='addRoom()'>Thêm phòng</button>
        <button id='saveRoomButton' style='display:none;' onclick='saveRoom()'>Lưu phòng</button>
        <button id='cancelRoomButton' style='display:none;' onclick='cancelRoom()'>Hủy</button>

        <button id='saveRoomChange' style='display:none;'>Lưu phòng</button>
        <button id='cancelRoomChange' style='display:none;'>Hủy</button>
    </div>

    <div class='form-btn'>
        <button type="button" id='btn-cancel'>Hủy</button>
        <button type="submit" id='btn-add'>Lưu thông tin</button>
    </div>

</div>
<script>
function editRoom(button) {
    // Tìm phần tử tr (dòng) chứa nút Sửa được click
    var row = button.closest('tr');

    // Lấy các giá trị hiện tại của dòng đó
    var stt = row.querySelector('td:nth-child(1)').innerText;
    var tenPhong = row.querySelector('td:nth-child(2)').innerText;
    var loaiPhong = row.querySelector('td:nth-child(3)').innerText;

    // Thay thế nội dung của các cột bằng input
    row.querySelector('td:nth-child(1)').innerHTML = '<input type="text" value="' + stt + '">';
    row.querySelector('td:nth-child(2)').innerHTML = '<input type="text" value="' + tenPhong + '">';
    row.querySelector('td:nth-child(3)').innerHTML = '<input type="text" value="' + loaiPhong + '">';
    // Disable nút Thêm phòng

    document.querySelector('button[onclick="addRoom()"]').disabled = true;

    //disable input id
    row.querySelector('td:nth-child(1) input').disabled = true;

    //disable nut xoa va nut sua luon

    var table = getTableBody();
    var buttons = table.querySelectorAll('button');
    buttons.forEach(button => button.disabled = true);

    row.querySelector('td:nth-child(4) button:nth-child(2)').disabled = true;
    row.querySelector('td:nth-child(4) button:nth-child(1)').disabled = true;

    // Hiển thị nút Lưu thay đổi
    document.getElementById('saveRoomChange').style.display = 'block';
    // Hiển thị nút Hủy thay đổi
    document.getElementById('cancelRoomChange').style.display = 'block';

    // Đặt sự kiện cho nút Lưu thay đổi để lưu giá trị mới
    document.getElementById('saveRoomChange').onclick = function() {
        saveRoomChanges(row);
    };
    document.getElementById('cancelRoomChange').onclick = function() {
        cancelRoomChanges(row);
    };
}

function updateRowValues(row, stt, tenPhong, loaiPhong) {
    // Thay thế các input bằng giá trị mới
    row.querySelector('td:nth-child(1)').innerText = stt;
    row.querySelector('td:nth-child(2)').innerText = tenPhong;
    row.querySelector('td:nth-child(3)').innerText = loaiPhong;
    document.getElementById('cancelRoomChange').style.display = 'none';
    document.getElementById('saveRoomChange').style.display = 'none';

    // enable nút Thêm phòng
    document.querySelector('button[onclick="addRoom()"]').disabled = false;

    //enable nut xoa va nut sua luon


    var table = getTableBody();
    var buttons = table.querySelectorAll('button');
    buttons.forEach(button => button.disabled = false);

    row.querySelector('td:nth-child(4) button:nth-child(2)').disabled = false;
    row.querySelector('td:nth-child(4) button:nth-child(1)').disabled = false;

}

function cancelRoomChanges(row) {
    // Lấy các giá trị mới từ input
    var stt = row.querySelector('td:nth-child(1) input').value;
    var tenPhong = row.querySelector('td:nth-child(2) input').value;
    var loaiPhong = row.querySelector('td:nth-child(3) input').value;

    updateRowValues(row, stt, tenPhong, loaiPhong);
}

function saveRoomChanges(row) {
    // Lấy các giá trị mới từ input
    var stt = row.querySelector('td:nth-child(1) input').value;
    var tenPhong = row.querySelector('td:nth-child(2) input').value;
    var loaiPhong = row.querySelector('td:nth-child(3) input').value;

    updateRowValues(row, stt, tenPhong, loaiPhong);

    // Prepare data to be sent
    var formData = new FormData();
    formData.append('action', 'saveChangeRoom');
    formData.append('roomId', stt);
    formData.append('roomName', tenPhong);

    // AJAX request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", window.location.href, true);
    xhttp.send(formData); // Send form data
}

function deleteRoom(button) {
    // Tìm phần tử tr (dòng) chứa nút Xóa được click
    var row = button.closest('tr');

    var room_id = row.querySelector('td:nth-child(1)').innerText;
    if (confirm("Bạn có chắc chắn muốn xóa phòng này không?")) {
        var formData = new FormData();
        formData.append('action', 'deleteRoom');
        formData.append('roomId', room_id);

        // AJAX request
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        xhttp.open("POST", window.location.href, true);
        xhttp.send(formData); // Send form data

        // Xóa dòng đó
        row.remove();
    }

    // Xóa dòng đó
    row.remove();

}

function getTableBody() {
    return document.getElementById("table").getElementsByTagName('tbody')[0];
}

function updateButtonState(disableAdd, hideSaveCancel) {
    document.querySelector('button[onclick="addRoom()"]').disabled = disableAdd;
    document.getElementById('saveRoomButton').style.display = hideSaveCancel ? 'none' : 'inline-block';
    document.getElementById('cancelRoomButton').style.display = hideSaveCancel ? 'none' : 'inline-block';
}

function addRoom() {
    var table = getTableBody();
    var newRow = table.insertRow(table.rows.length);
    var cols = 3; // Số cột trong bảng

    for (var i = 0; i < cols; i++) {
        var cell = newRow.insertCell(i);
        cell.innerHTML = `<input type='text' />`;
        var options = <?php echo json_encode($roomTypeOptions); ?>;
        if (i == 2) {
            cell.innerHTML = `
            <select class='select-room-type'>
             ${options}
            </select>
            `
        }

    }
    updateButtonState(true, false);

}

function cancelRoom() {
    var table = getTableBody();
    table.deleteRow(table.rows.length - 1);
    updateButtonState(false, true); // enable addRoom button, hide save/cancel buttons
}

function saveRoom() {
    var table = getTableBody();
    var newRow = table.rows[table.rows.length - 1];

    var inputs = newRow.getElementsByTagName('input');
    var values = [];

    for (var i = 0; i < inputs.length; i++) {
        values.push(inputs[i].value);
    }
    var select = newRow.getElementsByTagName('select')[0]; // Truy cập phần tử select đầu tiên
    var selectedOptionText = select.options[select.selectedIndex].textContent;
    var selectedOptionValue = select.value;
    values.push(selectedOptionText)

    // Prepare data to be sent
    var formData = new FormData();
    formData.append('action', 'saveRoomToTheater');
    formData.append('room_name', inputs[1].value);
    formData.append('room_type_id', selectedOptionValue);

    // AJAX request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xhttp.open("POST", window.location.href, true);
    xhttp.send(formData); // Send form data

    for (var i = 0; i < values.length; i++) {
        newRow.cells[i].textContent = values[i];
    }

    var editCell = newRow.insertCell(3);
    var editButton = document.createElement('button');
    editButton.textContent = 'Sửa';
    editButton.onclick = function() {
        editRoom(newRow);
    };
    editCell.appendChild(editButton);

    var deleteButton = document.createElement('button');
    deleteButton.textContent = 'Xóa';
    deleteButton.onclick = function() {
        deleteRoom(newRow);
    };
    editCell.appendChild(deleteButton);

    updateButtonState(false, true); // enable addRoom button, hide save/cancel buttons
}

document.getElementById('btn-add').addEventListener('click', function() {
    var form = document.getElementById('form-edit-cinema');
    form.submit();
});
document.getElementById('btn-cancel').addEventListener('click', function() {
    window.location.href = 'admin.php?handle=cinema-management';

});
</script>