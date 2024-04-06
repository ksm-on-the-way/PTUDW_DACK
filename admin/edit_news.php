<?php
    if(isset($_GET['id'])) {
        $news_id = $_GET['id'];
        require_once "../module.php";
        $link = NULL;
        taoKetNoi($link);
        $sql = "SELECT * FROM news WHERE newsid=$news_id";
        $result = chayTruyVanTraVeDL($link,$sql);
        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gettitle = $row['news_title'];
        $getcontent = $row['news_content'];
        $getbanner = $row['news_banner_src'];
        $getcategory = $row['news_category'];
        $getdate = $row['news_date'];
        echo '
        <html>
            <head>
                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet">
                <link href ="new_news.css" rel="stylesheet">
                <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>';
                echo '<script>var getcontent = '.json_encode($getcontent).';</script>';//encode bien thanh json object
            echo '</head>
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
                        <div class ="title">Chỉnh sửa bài viết</div>
                        <form form id="myForm" action= '.htmlspecialchars($_SERVER["PHP_SELF"]).' method="POST">
                            <label>Tiêu đề bài viết</label>
                            <input type="text" name="title" maxlength="100" required value = "'.htmlspecialchars($gettitle).'">
                            <label>Ngày đăng bài</label>
                            <input type="date" name="date" required value = '.$getdate.'>
                            <label>Phân loại</label>
                            <select name="category" required>
                                <option value="" disabled selected hidden>Chọn phân loại</option>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
                            <label>Banner</label>
                            <input type="text" name="banner" value = '.$getbanner.' required>
                            <label>Nội dung</label>
                            <div id="toolbar">
                                <button class="ql-bold">Bold</button>
                                <button class="ql-italic">Italic</button>
                                <button class="ql-underline">Underline</button>
                            </div>
                            <div id="editor" font-family = "Roboto" width ="100%"></div>
                            <input type="hidden" id="content" name="content"> <!-- Hidden input cho div id "editor" -->
                            <input type="hidden" id="newsid" name="newsid" value= '.$news_id.'> <!-- Hidden input cho newsid -->
                            <div class="action">
                                <button type="button">Hủy</button>
                                <button type="submit" style="background-color: var(--Royal-Blue, #1a2c50); color: var(--Shade-100, #fff);">Lưu bài viết</button>
                            </div>
                        </form>
                        
                        <script>
                            const quill = new Quill("#editor", {
                            modules: {
                                toolbar: "#toolbar"
                            },
                            theme: "snow"
                            });
                            document.querySelector(".ql-editor").innerHTML = getcontent;
                            const editorContentInput = document.getElementById("content");
                            document.getElementById("myForm").addEventListener("submit", function() {
                                var htmlContent = document.querySelector(".ql-editor").innerHTML;
                                editorContentInput.value = htmlContent;
                            });
                        </script>
                    </div>
                </div>
            </div>
            </body>
        </html>
        ';
        }
        else echo "ERROR: cannot find that news";
    }
    else echo "hehe";
?>
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../module.php";
    // Retrieve form data
    $newsid = $_POST["newsid"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $news_banner_src = $_POST["banner"];
    $news_category = $_POST["category"];
    $news_date = $_POST["date"];
    $link = NULL;
    taoKetNoi($link);
    $sql = "UPDATE news SET news_title = ?, news_content = ?, news_banner_src = ?, news_category = ?, news_date = ? WHERE newsid = ?";
    // // Prepare SQL statement to insert data into database
    // $sql = "INSERT INTO news VALUES ($title, $content, $news_banner_src, $news_category, $news_date )";
    // chayTruyVanKhongTraVeDL($link,$sql);
    $stmt = mysqli_prepare($link, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssi", $title, $content, $news_banner_src, $news_category, $news_date, $newsid);

    // Execute the statement
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "thành công r m oi";
        echo "<script> 
        window.alert('thanh cong r')
        window.location.href='edit_news.php?id=$newsid';</script>";
    } else {
        echo "Error: " . mysqli_error($link);
    }
    // Close the statement
    mysqli_stmt_close($stmt);
    // $result = chayTruyVanKhongTraVeDL($link,$sql);
    giaiPhongBoNho($link,$result);


} else {
    // Redirect to the form page if form is not submitted
}
?>
