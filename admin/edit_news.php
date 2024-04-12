<?php
    if(isset($_GET['id'])) { //kiểm tra có phương thức get
        $news_id = $_GET['id'];
        require_once "../db_module.php";
        $link = NULL;
        taoKetNoi($link);
        $sql = " SELECT n.newsid, n.news_title, n.news_date, c.news_category_name, n.news_content, n.news_banner_src, c.news_category_id
        FROM news n
        LEFT JOIN news_categories c ON n.news_category_id = c.news_category_id
        WHERE newsid = $news_id AND is_deleted = '0';
        ";
        //query dữ liệu
        $result = chayTruyVanTraVeDL($link,$sql);
        if (mysqli_num_rows($result) > 0) { //kiểm tra có id đó không
        $row = mysqli_fetch_assoc($result);
        $gettitle = $row['news_title']; //gán biến theo dữ liệu query
        $getcontent = $row['news_content'];
        $getbanner = $row['news_banner_src'];
        $getcategory = $row['news_category_name'];
        $getdate = $row['news_date'];
        $q = "SELECT * FROM news_categories";
        $catelist = chayTruyVanTraVeDL($link,$q); //truy vấn tất cả các phân loại tin tức
        $options =""; //tạo biến option
        while ($cate = mysqli_fetch_assoc($catelist)) { //tạo vòng lặp duyệt qua mỗi phân loại tin tức
        $selectedcate = chayTruyVanTraVeDL($link,$sql); //truyền hàng chứa id vào biến selectedcate
        $selected = mysqli_fetch_assoc($selectedcate);
        $cate_id = $cate['news_category_id'];
        $cate_name = $cate['news_category_name'];
        if ($selected['news_category_id'] == $cate_id) { //kiểm tra nếu phân loại tin tức cate bằng với phân loại của dòng dữ liệu chứa id
            $options .= "<option value='$cate_id' selected>$cate_name</option>";
        } //nếu bằng thì ghép chuỗi tag option và phân loại đó trở thành lựa chọn mặc định vào biến option
        else $options .= "<option value='$cate_id'>$cate_name</option>";
        } //nếu không bằng thì ghép chuỗi tag option
        echo '
        <html>
            <head>
                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet">
                <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>';
                echo '<script>var getcontent = '.json_encode($getcontent).';
                var getbanner = '.json_encode($getbanner).'; //encode các biến thành json object
                </script>';
                //fetch dữ liệu thành html
            echo '</head>
            <body>
                    <div class = "content">
                        <div class ="title">Chỉnh sửa bài viết</div>
                        <form form id="myForm" action= "" method="POST" enctype="multipart/form-data">
                            <label>Tiêu đề bài viết</label>
                            <input type="text" name="title" maxlength="100" required value = "'.htmlspecialchars($gettitle).'">
                            <label>Ngày đăng bài</label>
                            <input type="date" name="date" required value = '.$getdate.'>
                            <label>Phân loại</label>
                            <select name="category" required>';
                            echo $options;
                            echo '</select>
                            <label>Banner</label>
                            <img src='.$getbanner.'>
                            <input type="file" name="banner" id="bannerInput"> <span id = "filename">'.$getbanner.'</span>
                            <label>Nội dung</label>
                            <div id="toolbar">
                                <button class="ql-bold">Bold</button>
                                <button class="ql-italic">Italic</button>
                                <button class="ql-underline">Underline</button>
                                <button class="ql-indent" value="-1" ngbPopover="Indent -1" triggers="mouseenter:mouseleave"></button>
                                <button class="ql-indent" value="+1" ngbPopover="Indent +1" triggers="mouseenter:mouseleave"></button>
                            </div>
                            <div id="editor" font-family = "Roboto" width ="100%"></div>
                            <input type="hidden" id="content" name="content"> <!-- Hidden input cho div id "editor" -->
                            <input type="hidden" id="newsid" name="newsid" value= '.$news_id.'> <!-- Hidden input cho newsid -->
                            <div class="action">
                                <button type="button" onclick="Cancel()">Hủy</button>
                                <button type="submit" style="background-color: var(--Royal-Blue, #1a2c50); color: var(--Shade-100, #fff);">Lưu bài viết</button>
                            </div>
                            
                            </div>
                        </form>
                        
                    </div>
            </body>
        </html>
        ';
        }
        else echo "ERROR: Không tìm thấy bài viết";
    }
    else echo "ERROR: Không thể tìm thấy bài viết";
?>
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Kiểm tra phương thức post
    function uploadFileTo($uploadfile, $uploaddir, &$oldfilename)
    {
        $filetemp = $_FILES["$uploadfile"]['tmp_name'];
        $oldfilename = $_FILES["$uploadfile"]['name'];
        return move_uploaded_file($filetemp, $uploaddir . $oldfilename);
    }
    $folderSaveFileUpload = "./uploadFile/";
    $fileNameBanner = '';
    $result_upload_banner = uploadFileTo("banner", $folderSaveFileUpload, $fileNameBanner);
    // Gán các biến bằng dữ liệu form được fetch lên
    $newsid = $_POST["newsid"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    //check có update banner hay không, nếu không thì biến news_banner_src bằng biến được fetch lên từ DB trước đó
    if ($result_upload_banner) {
        $news_banner_src = $folderSaveFileUpload.$fileNameBanner;
     } else $news_banner_src = $getbanner;
    $news_category = $_POST["category"];
    $news_date = $_POST["date"];
    $link = NULL;
    taoKetNoi($link);
    
    $sql = "UPDATE news SET news_title = ?, news_content = ?, news_banner_src = ?, news_category_id = ?, news_date = ? WHERE newsid = ?";
    // Chuẩn bị câu lệnh SQL để thực thi với các tham số ?
    $stmt = mysqli_prepare($link, $sql);
    // Hàm liên kết các tham số với truy vấn SQL và cho cơ sở dữ liệu biết các tham số là gì
    mysqli_stmt_bind_param($stmt, "sssssi", $title, $content, $news_banner_src, $news_category, $news_date, $newsid);

    //Thực thi câu lệnh
    $insert_result= mysqli_stmt_execute($stmt);
    if ($insert_result) {
        $_SESSION['success_message'] = "Sửa bài viết thành công.";
        echo "<script> 
        window.location.href='admin.php?handle=news-management';</script>";
    } else {
        echo "<script>alert('Đã có lỗi xảy ra.');</script>";
    }

    // Đóng câu lệnh
    mysqli_stmt_close($stmt);
    giaiPhongBoNho($link,$result);


} else {
    
}
?>
<script>          
    const quill = new Quill("#editor", { //tạo đối tượng QUill editor
        modules: {
            toolbar: "#toolbar"
        },
        theme: "snow"
        });
    document.querySelector(".ql-editor").innerHTML = getcontent; //fetch dữ liệu từ biến getcontent vào trong thành phần có id ql-editor
    const editorContentInput = document.getElementById("content");
    document.getElementById("myForm").addEventListener("submit", function() { //khi submit form, lấy dữ liệu từ trong id ql-editor đổ vào trường dữ liệu content ở dạng hidden
        var htmlContent = document.querySelector(".ql-editor").innerHTML;
        editorContentInput.value = htmlContent;
    });
    function Cancel() {

        window.location.href = "admin.php?handle=dashboard"; //điều hướng về dashboard
    }
    document.addEventListener("DOMContentLoaded", function() { 
        const bannerInput = document.getElementById("bannerInput");
        const filenameSpan = document.getElementById("filename");
                        
        bannerInput.addEventListener("change", function(event) {
            const files = event.target.files;
            if (files.length > 0) { //Nếu có file được up lên thì thay tên file vào vị trí class filename
                filenameSpan.textContent = files[0].name;
            } else {
                filenameSpan.textContent = "getcontent"; //Nếu không có file được up lên thì không đổi tên
            }
        });
    });
</script>
<style>
    body {
    margin: 0px;
}

/* Nội dung */
* {
    box-sizing: border-box;
}
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
    max-width: 100%;
    height: 300px;
    overflow-y: auto;
    border: 1px solid #ccc;
    padding: 5px;
    margin: 0 auto;
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
  
form img {
    width: 50%;
    margin: 15px 0px;
    display: block;
}
#bannerInput {
    width:100px;
    
}

#filename {
    font-size: 14px;
}
</style>