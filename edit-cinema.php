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
<div class='edit-cinema__container'>
    <div>
        <h3>Thông tin rạp</h3>
    </div>
    <div class='edit-cinema__form'>
        <form>
            <div class='form-input'>
                <label>Tên rạp</label>
                <input placeholder='Nhập tên rạp'>
            </div>
            <div class='form-input'>
                <label>Địa chỉ</label>
                <input placeholder='Nhập địa chỉ'>
            </div>
            <div class='form-input'>
                <label>Thành phố</label>
                <select></select>
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
                <tr>
                    <td>1</td>
                    <td>Phòng 1</td>
                    <td>A1</td>
                    <td>
                        <button onclick='editRoom(this)'>Sửa</button>
                        <button onclick='deleteRoom(this)'>Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Phòng 2</td>
                    <td>A2</td>
                    <td>
                        <button onclick='editRoom(this)'>Sửa</button>
                        <button onclick='deleteRoom(this)'>Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Phòng 3</td>
                    <td>A3</td>
                    <td>
                        <button onclick='editRoom(this)'>Sửa</button>
                        <button onclick='deleteRoom(this)'>Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    <div>
        <button onclick='addRoom()'>Thêm phòng</button>
        <button id='saveRoomButton' style='display:none;' onclick='saveRoomOutsideTable()'>Lưu phòng</button>
        <button id='saveRoomChange' style='display:none;' onclick='saveRoomChanges()'>Lưu phòng</button>
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

    // Hiển thị nút Lưu thay đổi
    document.getElementById('saveRoomChange').style.display = 'block';

    // Đặt sự kiện cho nút Lưu thay đổi để lưu giá trị mới
    document.getElementById('saveRoomChange').onclick = function() {
        saveRoomChanges(row);
    };
}

function saveRoomChanges(row) {
    // Lấy các giá trị mới từ input
    var stt = row.querySelector('td:nth-child(1) input').value;
    var tenPhong = row.querySelector('td:nth-child(2) input').value;
    var loaiPhong = row.querySelector('td:nth-child(3) input').value;

    // Thay thế các input bằng giá trị mới
    row.querySelector('td:nth-child(1)').innerText = stt;
    row.querySelector('td:nth-child(2)').innerText = tenPhong;
    row.querySelector('td:nth-child(3)').innerText = loaiPhong;

    // Ẩn nút Lưu thay đổi
    document.getElementById('saveRoomChange').style.display = 'none';
}

function deleteRoom(button) {
    // Tìm phần tử tr (dòng) chứa nút Xóa được click
    var row = button.closest('tr');
    // Xóa dòng đó
    row.remove();
}

function addRoom() {
    var table = document.getElementById("table").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    var cols = 3; // Số cột trong bảng

    for (var i = 0; i < cols; i++) {
        var cell = newRow.insertCell(i);
        cell.innerHTML = `<input type='text' />`;
    }

    // Hiển thị nút "Lưu phòng"
    document.getElementById('saveRoomButton').style.display = 'inline-block';
}

function saveRoomOutsideTable() {
    var table = document.getElementById("table").getElementsByTagName('tbody')[0];
    var newRow = table.rows[table.rows.length - 1]; // Lấy hàng cuối cùng (hàng vừa thêm)

    var inputs = newRow.getElementsByTagName('input');
    var values = []; // Mảng để lưu trữ giá trị của các input

    // Lưu giá trị của các input vào mảng values
    for (var i = 0; i < inputs.length; i++) {
        values.push(inputs[i].value);
    }

    // Ghi đè nội dung của các ô cell với giá trị từ mảng values
    for (var i = 0; i < values.length; i++) {
        newRow.cells[i].textContent = values[i];
    }
    // Thêm cell thứ 4 với hai nút "Sửa" và "Xóa"
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
        // table.removeChild(newRow); // Xóa hàng hiện tại khỏi bảng
    };
    editCell.appendChild(deleteButton);

    document.getElementById('saveRoomButton').style.display = 'none'; // Ẩn nút "Lưu phòng"
}
</script>