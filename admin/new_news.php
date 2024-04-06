<?php
require "../db_module.php";
$link = NULL;
taoKetNoi($link);
$q = "SELECT * FROM news_categories";
$catelist = chayTruyVanTraVeDL($link,$q);
$options ="";
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
    </head>
    <body>
    <div class="admin-management">
        <div class="sidebar">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d9143cf1fb8d6fc12272f9775cc3aeff77b9839d32e73495b6a9cf83d7d9c3b7?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Logo" class="logo" />
            <h2 class="welcome-text">Welcome</h2>
            <div class="menu-container">
                <div class="menu-item menu-item-active">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1645334a3bbbbf67bb257cdcb36aa05979f059c53a4ab1b308f97b9a5bf22a2f?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý rạp icon" class="menu-item-icon" />
                        <span class="menu-item-text">Quản lý rạp</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div class="menu-item menu-item-default">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1645334a3bbbbf67bb257cdcb36aa05979f059c53a4ab1b308f97b9a5bf22a2f?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý phim icon" class="menu-item-icon" />
                        <span class="menu-item-text">Quản lý phim</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div class="menu-item menu-item-default">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1645334a3bbbbf67bb257cdcb36aa05979f059c53a4ab1b308f97b9a5bf22a2f?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Lên lịch chiếu icon" class="menu-item-icon" />
                        <span class="menu-item-text">Lên lịch chiếu</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div class="menu-item menu-item-default">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/edf3b61290f0d8d6c17ab64b262286faf7283c49410ded99a4d96000414d0c34?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý bài viết icon" class="menu-item-icon" />
                        <span class="menu-item-text">Quản lý bài viết</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div class="menu-item menu-item-default">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5382fea06edfd087c3c420b810d431f2de371ca0b53e50740652e7ecad029b87?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Xem báo cáo icon" class="menu-item-icon" />
                        <span class="menu-item-text">Xem báo cáo</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div class="menu-item menu-item-default">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5554df1a377d30b44bcb9845c044dec02c6b2e4ad78606478e85ba3c42b9003b?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý người dùng icon" class="menu-item-icon" />
                        <span class="menu-item-text menu-item-text-multiline">Quản lý<br>người dùng</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d1f56a0d8d14a70950ba5a4e02499174d6ad1f18e94daca56d2614da3104b471?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div class="menu-item menu-item-default">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0dc8fa5f91f7673ed8b55eafd9703ee88d057f3b87ba663edaedff37d2eb4483?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Đổi mật khẩu icon" class="menu-item-icon" />
                        <span class="menu-item-text">Đổi mật khẩu</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
            </div>
        </div>
        <div class="header-content">
            <div class="header">
                <div class="user-info">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/88a804c5520def4dcdc79f06fa68269a7051516cb28777adf3b68509506917d3?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="User avatar" class="user-avatar" />
                    <button class="logout-button">Đăng xuất</button>
                </div>
            </div>
            <div class = "content">
                <div class ="title">Tạo bài viết</div>
                <form form id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <label>Tiêu đề bài viết</label>
                    <input type="text" name="title" placeholder="Title" required>
                    <label>Ngày đăng bài</label>
                    <input type="date" name="date" placeholder="Title" required>
                    <label>Phân loại</label>
                    <select name="category" required>
                    <option value="" disabled selected hidden>Chọn phân loại</option>
                    <?php echo $options; ?>
                    </select>
                    <label>Banner</label>
                    <input type="text" name="banner" placeholder="Link banner" required>
                    <label>Nội dung</label>
                    <div id="toolbar">
                        <button class="ql-bold">Bold</button>
                        <button class="ql-italic">Italic</button>
                        <button class="ql-underline">Underline</button>
                    </div>
                    <div id="editor" font-family = 'Roboto' width ="100%"></div>
                    <input type="hidden" id="content" name="content"> <!-- Hidden input cho div id "editor" -->
                    <div class="action">
                        <button type="button" onclick="Cancel()">Hủy</button>
                        <button type="submit" style="background-color: var(--Royal-Blue, #1a2c50); color: var(--Shade-100, #fff);">Tạo bài viết</button>
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
                    document.getElementById('myForm').addEventListener('submit', function() {
                        var htmlContent = document.querySelector('.ql-editor').innerHTML;
                        editorContentInput.value = htmlContent;
                    });
                    function Cancel() {
                        window.location.href = "admin.php?handle=dashboard";
                    };
                </script>
            </div>
        </div>
    </div>
    </body>
</html>
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../db_module.php";
    // Retrieve form data
    $title = $_POST["title"];
    $content = $_POST["content"];
    $news_banner_src = $_POST["banner"];
    $news_category = $_POST["category"];
    $news_date = $_POST["date"];
    $link = NULL;
    taoKetNoi($link);
    $sql = "INSERT INTO news (news_title, news_content, news_banner_src, news_category, news_date ) VALUES (?, ?, ?, ?, ?)";
    // // Prepare SQL statement to insert data into database
    // $sql = "INSERT INTO news VALUES ($title, $content, $news_banner_src, $news_category, $news_date )";
    // chayTruyVanKhongTraVeDL($link,$sql);
    $stmt = mysqli_prepare($link, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssss", $title, $content, $news_banner_src, $news_category, $news_date);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
    // $result = chayTruyVanKhongTraVeDL($link,$sql);
    // giaiPhongBoNho($link,$result);

} else {
    // Redirect to the form page if form is not submitted
}
?>
<style>
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
