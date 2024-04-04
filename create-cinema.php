<style>
.create-cinema__container {
    width: 100%;
    max-width: 1075px;
    margin: 0 auto;
    margin-top: 30px;
}

.create-cinema__container .create-cinema__form form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.create-cinema__container .create-cinema__form .form-input {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 5px;
}

.create-cinema__container .create-cinema__form .form-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.create-cinema__container .create-cinema__form .form-btn button {
    width: 150px;
    border-radius: 8px;
    padding: 10px 0px;
    border: 1px solid #1A2C50;
}

.create-cinema__container .create-cinema__form .form-btn .btn-add {
    background-color: #1A2C50;
    color: white;
}
</style>
<div class='create-cinema__container'>
    <div>
        <h3>Tạo rạp mới</h3>
    </div>
    <div class='create-cinema__form'>
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
            <div class='form-btn'>
                <button class='btn-cancel'>Hủy</button>
                <button class='btn-add'>Tạo rạp</button>
            </div>
        </form>
    </div>
</div>