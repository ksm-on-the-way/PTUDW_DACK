<?php
    if(isset($_GET['id'])) {
        $news_id = $_GET['id'];
        require_once "../db_module.php";
        $link = NULL;
        taoKetNoi($link);
        $sql = " SELECT n.newsid, n.news_title, n.news_date, c.news_category_name, n.news_content, n.news_banner_src, c.news_category_id
        FROM news n
        LEFT JOIN news_categories c ON n.news_category_id = c.news_category_id
        WHERE newsid = $news_id AND is_deleted = '0';
        ";
        
        $result = chayTruyVanTraVeDL($link,$sql);
        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gettitle = $row['news_title'];
        $getcontent = $row['news_content'];
        $getbanner = $row['news_banner_src'];
        $getcategory = $row['news_category_name'];
        $getdate = $row['news_date'];
        $q = "SELECT * FROM news_categories";
        $catelist = chayTruyVanTraVeDL($link,$q);
        $options ="";
        while ($cate = mysqli_fetch_assoc($catelist)) {
        $selectedcate = chayTruyVanTraVeDL($link,$sql);
        $selected = mysqli_fetch_assoc($selectedcate);
        $cate_id = $cate['news_category_id'];
        $cate_name = $cate['news_category_name'];
        if ($selected['news_category_id'] == $cate_id) {
            $options .= "<option value='$cate_id' selected>$cate_name</option>";
        }
        else $options .= "<option value='$cate_id'>$cate_name</option>";
        }
        echo '
        <html>
            <head>
                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet">
                <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>';
                echo '<script>var getcontent = '.json_encode($getcontent).'; //encode bien thanh json object
                var getbanner = '.json_encode($getbanner).';
                </script>';
                
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
                            function Cancel() {

                                window.location.href = "admin.php?handle=dashboard"; //ve dashboard
                            }
                            document.addEventListener("DOMContentLoaded", function() {
                                const bannerInput = document.getElementById("bannerInput");
                                const filenameSpan = document.getElementById("filename");
                        
                                bannerInput.addEventListener("change", function(event) {
                                    const files = event.target.files;
                                    if (files.length > 0) {
                                        filenameSpan.textContent = files[0].name;
                                    } else {
                                        filenameSpan.textContent = "getcontent"; // Revert to original content if no file selected
                                    }
                                });
                            });
                        
                        </script>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function uploadFileTo($uploadfile, $uploaddir, &$oldfilename)
    {
        $filetemp = $_FILES["$uploadfile"]['tmp_name'];
        $oldfilename = $_FILES["$uploadfile"]['name'];
        return move_uploaded_file($filetemp, $uploaddir . $oldfilename);
    }
    $folderSaveFileUpload = "./uploadFile/";
    $fileNameBanner = '';
    $result_upload_banner = uploadFileTo("banner", $folderSaveFileUpload, $fileNameBanner);
    // Retrieve form data
    $newsid = $_POST["newsid"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    //check co update banner hay khong
    if ($result_upload_banner) {
        $news_banner_src = $folderSaveFileUpload.$fileNameBanner;
     } else $news_banner_src = $getbanner;
    $news_category = $_POST["category"];
    $news_date = $_POST["date"];
    $link = NULL;
    taoKetNoi($link);
    
    $sql = "UPDATE news SET news_title = ?, news_content = ?, news_banner_src = ?, news_category_id = ?, news_date = ? WHERE newsid = ?";
    // // Prepare SQL statement to insert data into database
    $stmt = mysqli_prepare($link, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssi", $title, $content, $news_banner_src, $news_category, $news_date, $newsid);

    // Execute the statement
    $insert_result= mysqli_stmt_execute($stmt);
    if ($insert_result) {
        $_SESSION['success_message'] = "Sửa bài viết thành công.";
        echo "<script> 
        window.location.href='admin.php?handle=news-management';</script>";
    } else {
        echo "<script>alert('Đã có lỗi xảy ra.');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
    giaiPhongBoNho($link,$result);


} else {
    // Redirect to the form page if form is not submitted
}
?>
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