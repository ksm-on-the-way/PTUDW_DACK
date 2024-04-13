<?php
require_once "db_module.php";
$link = NULL;
taoKetNoi($link);
$q = "SELECT * FROM news_categories"; //fetch tất cả các phân loại tin tức để ghép vào chuỗi $options
$catelist = chayTruyVanTraVeDL($link, $q);
$options = "";
while ($cate = mysqli_fetch_assoc($catelist)) {
    $cate_id = $cate['news_category_id'];
    $cate_name = $cate['news_category_name'];
    $options .= "<option value='$cate_id'>$cate_name</option>";
}
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>
    <!--trỏ đến địa chỉ thư viện Quill -->
</head>

<body>
    <div class="content">
        <div class="title">Tạo bài viết</div>
        <form form id="myForm" action="" method="POST" enctype="multipart/form-data">
            <label>Tiêu đề bài viết</label>
            <input type="text" name="title" placeholder="Title" required>
            <label>Ngày đăng bài</label>
            <input type="date" name="date" placeholder="" required>
            <label>Phân loại</label>
            <select name="category" required>
                <option value="" disabled selected hidden>Chọn phân loại</option>
                <?php echo $options; ?>
            </select>
            <label>Banner</label>
            <input type="file" name="banner" placeholder="Tải tệp lên">
            <label>Nội dung</label>
            <div id="toolbar">
                <button class="ql-bold">Bold</button>
                <button class="ql-italic">Italic</button>
                <button class="ql-underline">Underline</button>
                <button class="ql-indent" value="-1" ngbPopover="Indent -1" triggers="mouseenter:mouseleave"></button>
                <button class="ql-indent" value="+1" ngbPopover="Indent +1" triggers="mouseenter:mouseleave"></button>
            </div>
            <div id="editor" font-family='Roboto' width="100%"></div>
            <input type="hidden" id="content" name="content"> <!-- Hidden input cho div id "editor" -->
            <div class="action">
                <button type="button" onclick="Cancel()">Hủy</button>
                <button type="submit"
                    style="background-color: var(--Royal-Blue, #1a2c50); color: var(--Shade-100, #fff);">Tạo bài
                    viết</button>
            </div>
        </form>
        <script>
            const quill = new Quill('#editor', {
                modules: {
                    toolbar: '#toolbar'
                },
                theme: 'snow'
            });
            const editorContentInput = document.getElementById('content');
            document.getElementById('myForm').addEventListener('submit', function () {
                var htmlContent = document.querySelector('.ql-editor').innerHTML;
                editorContentInput.value = htmlContent;
            });
            function Cancel() {
                window.location.href = "admin.php?handle=dashboard";
            };
        </script>
    </div>
</body>

</html>
<?php
// Kiểm tra phương thức post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //lấy file source
    function uploadFileTo($uploadfile, $uploaddir, &$oldfilename)
    {
        $filetemp = $_FILES["$uploadfile"]['tmp_name'];
        $oldfilename = $_FILES["$uploadfile"]['name'];
        return move_uploaded_file($filetemp, $uploaddir . $oldfilename);
    }

    $folderSaveFileUpload = "./uploadFile/";
    $fileNameBanner = '';
    $result_upload_banner = uploadFileTo("banner", $folderSaveFileUpload, $fileNameBanner);
    //gán dữ liệu form vào các biến
    $title = $_POST["title"];
    $content = $_POST["content"];
    $news_banner_src = $folderSaveFileUpload . $fileNameBanner;
    $news_category = $_POST["category"];
    $news_date = $_POST["date"];
    // Chuẩn bị câu lệnh SQL để thực thi với các tham số ?
    $sql = "INSERT INTO news (news_title, news_content, news_banner_src, news_category_id, news_date ) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);

    // Hàm liên kết các tham số với truy vấn SQL và cho cơ sở dữ liệu biết các tham số là gì
    mysqli_stmt_bind_param($stmt, "sssss", $title, $content, $news_banner_src, $news_category, $news_date);

    // Hàm liên kết các tham số với truy vấn SQL và cho cơ sở dữ liệu biết các tham số là gì
    //Thực thi câu lệnh
    $insert_result = mysqli_stmt_execute($stmt);
    if ($insert_result) {
        $_SESSION['success_message'] = "Thêm bài viết thành công.";
        echo "<script> window.location.href='admin.php?handle=news-management';</script>";
    } else {
        echo "<script>alert('Đã có lỗi xảy ra.');</script>";
    }
    // Đóng câu lệnh
    mysqli_stmt_close($stmt);
    giaiPhongBoNho($link, $result);


} else {
}
?>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0px;
    }

    .admin-management {
        display: grid;
        grid-template-columns: auto 1fr;
        width: 100%;
    }

    .sidebar {
        background-color: #1a2c50;
        display: flex;
        max-width: 241px;
        flex-direction: column;
        align-items: center;
        font-size: 16px;
        color: #fff;
        font-weight: 400;
        line-height: 150%;
        padding: 25px 25px 80px;
    }

    .logo {
        aspect-ratio: 1.96;
        object-fit: auto;
        object-position: center;
        width: 119px;
        max-width: 100%;
    }

    .welcome-text {
        font-family: Roboto, sans-serif;
        border-radius: 8px;
        margin-top: 32px;
        white-space: nowrap;
        justify-content: center;
    }

    .menu-container {
        align-self: stretch;
        display: flex;
        margin-top: 67px;
        flex-direction: column;
    }

    .menu-item {
        justify-content: center;
        border-radius: 4px;
        display: flex;
        gap: 20px;
        padding: 8px 16px;
    }

    .menu-item-active {
        background-color: #ffbe00;
    }

    .menu-item-default {
        background-color: #118eea;
        margin-top: 16px;
    }

    .menu-item-content {
        display: flex;
        gap: 16px;
    }

    .menu-item-icon {
        aspect-ratio: 1;
        object-fit: auto;
        object-position: center;
        width: 16px;
        margin: auto 0;
    }

    .menu-item-text {
        font-family: Roboto, sans-serif;
    }

    .menu-item-arrow {
        aspect-ratio: 0.6;
        object-fit: auto;
        object-position: center;
        width: 6px;
        stroke-width: 2px;
        stroke: #fff;
        border-color: rgba(255, 255, 255, 1);
        border-style: solid;
        border-width: 2px;
        margin: auto 0;
    }

    .menu-item-text-multiline {
        line-height: 24px;
    }

    .header {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
        padding: 8px 60px;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 1);
        font-size: 18px;
        font-weight: 500;
        color: var(--Pastel-Yellow, #f2c46f);
        text-align: center;
    }

    @media (max-width: 991px) {
        .header {
            padding: 0 20px;
        }
    }

    .user-info {
        display: flex;
        justify-content: flex-end;
        gap: 20px;
    }

    @media (max-width: 991px) {
        .user-info {
            margin-right: 10px;
        }
    }

    .user-avatar {
        width: 32px;
        aspect-ratio: 1;
        object-fit: cover;
        object-position: center;
        margin: auto 0;
    }

    .logout-button {
        padding: 12px 8px;
        font-family: Roboto, sans-serif;
        background-color: var(--Royal-Blue, #1a2c50);
        border-radius: 5.067px;
        color: inherit;
        cursor: pointer;
    }

    /* Nội dung */
    .content {
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
        width: 100%;
        /* Set the desired width */
        max-width: 100%;
        /* Limit the width to the viewport width */
        height: 300px;
        /* Set the desired height */
        overflow-y: auto;
        /* Add vertical scrollbar when content overflows */
        border: 1px solid #ccc;
        /* Add border for visual clarity */
        padding: 5px;
        /* Add padding for spacing */
        margin: 0 auto;
        /* Center the container horizontally */
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
        margin-top: 87px;
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

    select:required:invalid {
        color: rgba(189, 197, 212, 1);
    }

    option {
        color: black;
    }
</style>