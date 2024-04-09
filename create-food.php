<?php
require "./db_module.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['banner']) && isset($_POST['price'])) {
        
        $title = $_POST["title"];
        $description = $_POST["description"];
        $banner_src = $_POST["banner"];
        $price = $_POST["price"];

        // Kiểm tra nếu các cột nhập vô đều đã tồn tại r
        $link = NULL;
        taoKetNoi($link);
        $sql_check = "SELECT * FROM combo_food WHERE combo_name = ? AND img_url = ? AND price = ? AND is_deleted = '0'";
        $stmt_check = mysqli_prepare($link, $sql_check);
        mysqli_stmt_bind_param($stmt_check, "sss", $title, $banner_src, $price);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);
        $rows_check = mysqli_stmt_num_rows($stmt_check);

        // If data already exists, show error message
        if ($rows_check > 0) {
            $combo_name = $_POST['title'];
            // Hiển thị thông báo với tên combo đã tồn tại
            echo "<script>alert('Combo $combo_name đã tồn tại.');</script>";
        } else {
            // Insert data into the database
            $sql_insert = "INSERT INTO combo_food (combo_name, description, img_url, price) VALUES (?, ?, ?, ?)";
            $stmt_insert = mysqli_prepare($link, $sql_insert);
            mysqli_stmt_bind_param($stmt_insert, "ssss", $title, $description, $banner_src, $price);
            mysqli_stmt_execute($stmt_insert);
            mysqli_stmt_close($stmt_insert);

            $_SESSION['success_message'] = "Thêm combo thành công.";
            echo "<script> window.location.href='admin.php?handle=food-management';</script>";
        }

        // Close statement and connection
        mysqli_stmt_close($stmt_check);
    }
}
?>



<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>
<div class="create-food__container">
    <div class="title">Tạo combo</div>
    <form id="myForm" action="admin.php?handle=create-food" method="POST">
        <label>Tên combo</label>
        <input type="text" name="title" placeholder="Tên combo" required>
        <label>Giá</label>
        <input type="text" name="price" placeholder="Giá" required>
        <label>Banner</label>
        <input type="text" name="banner" placeholder="Link banner" required>
        <label>Mô tả</label>
        <div id="toolbar">
            <button class="ql-bold">Bold</button>
            <button class="ql-italic">Italic</button>
            <button class="ql-underline">Underline</button>
        </div>
        <div id="editor" font-family='Roboto' width="100%" ></div>
        <input type="hidden" id="description" name="description">
        <div class="action">
            <button type="button" onclick="Cancel()">Hủy</button>
            <button type="submit" style="background-color: var(--Royal-Blue, #1a2c50); color: var(--Shade-100, #fff);">Tạo combo</button>
        </div>
    </form>
    <script>
        const quill = new Quill('#editor', {
            modules: {
                toolbar: '#toolbar'
            },
            theme: 'snow'
        });
        const editorContentInput = document.getElementById('description');
        document.getElementById('myForm').addEventListener('submit', function () {
            var htmlContent = document.querySelector('.ql-editor').innerHTML;
            editorContentInput.value = htmlContent;
        });

        function Cancel() {
            window.location.href = "admin.php?handle=food-management";
        };
    </script>
</div>

<script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
        var editorContent = document.querySelector('.ql-editor');
        var htmlContent = editorContent.innerHTML.trim();
        var descriptionInput = document.getElementById('description');
        console.log(htmlContent);
        if (!htmlContent || htmlContent === '<p><br></p>') {
            event.preventDefault(); // Ngăn chặn form được submit nếu trường input description trống
            alert('Vui lòng nhập mô tả.');
        } else {
            // Gán giá trị của trường description vào trường input ẩn
            descriptionInput.value = htmlContent;
        }
        
    });
</script>





<style>
    * {
    margin: 0px;
    box-sizing: border-box;
}

/* Nội dung */
.create-food__container {
    margin: 25px 55px;
    font-family: Roboto, sans-serif;
}

.content .title {
    color: var(--Grey-400, #4f4f4f);
    margin: 25px 0;
    font-size: 24px;
    font-weight: 550;
}

#editor {
    width: 100%; /* Set the desired width */
    max-width: 100%; /* Limit the width to the viewport width */
    height: 300px; /* Set the desired height */
    overflow-y: auto; /* Add vertical scrollbar when content overflows */
    border: 1px solid #ccc; /* Add border for visual clarity */
    padding: 5px; /* Add padding for spacing */
    margin: 0 auto; /* Center the container horizontally */
}

form {
    width: 75%;
}

form label {
    display: block;
    margin-bottom: 8px;
    font-weight: 560;
}

input {
    margin-bottom: 25px;
    width: 100%;
    font-family: Roboto, sans-serif;
    font-size: 14px;
    padding: 5px;
}

select {
    margin-bottom: 25px;
    width: 40%;
    font-family: Roboto, sans-serif;
    font-size: 14px;
    padding: 5px;
}
.action {
    display: flex;
    margin-top: 30px;
    gap: 20px;
    font-size: 20px;
    text-align: center;
    justify-content: center;
  }

.action button {
    justify-content: center;
    width: 216px;
    border-radius: 5.067px;
    border-color: rgba(90, 99, 122, 1);
    border-style: solid;
    border-width: 1px;
    background-color: var(--White, #fff);
    color: var(--Shade-600, #5a637a);
    white-space: nowrap;
    padding: 12px 8px;
  }
  

</style>
