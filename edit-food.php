<style>
    * {
    margin: 0px;
    box-sizing: border-box;
}

.food_management_container {
    width: 100%;
}

/* Nội dung */
.content {
    margin: 0px 30px;
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
    cursor: pointer;
  }


</style>

<?php
    if(isset($_GET['id'])) {
        $combo_id = $_GET['id'];
        require_once "./db_module.php";
        $link = NULL;
        taoKetNoi($link);
        $sql = " SELECT combo_id, combo_name, price, description, img_url
        FROM combo_food
        WHERE combo_id = $combo_id 
        ";
        
        $result = chayTruyVanTraVeDL($link,$sql);
        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $getname = $row['combo_name'];
        $getdescription = $row['description'];
        $getbanner = $row['img_url'];
        $getprice = $row['price'];

        echo '
        <html>
            <head>
                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet">
                <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>';
                echo '<script>var getdescription = '.json_encode($getdescription).';</script>';//encode bien thanh json object
            echo '</head>
            <body>
            <div class="food_management_container">
                <div class ="title">Chỉnh sửa Combo đồ ăn</div>
                <form form id="myForm" action= "" method="POST">
                    <label>Tên combo</label>
                    <input type="text" name="combo_name" maxlength="100" required value = "'.htmlspecialchars($getname).'">                 
                    
                    <label>Giá</label>
                    <input type="text" name="price" required value = '.$getprice.'>
                  
                    <label>Banner</label>
                    <input type="text" name="banner" value = '.$getbanner.' required>
                                      
                    <label>Mô tả</label>
                    <div id="toolbar">
                        <button class="ql-bold">Bold</button>
                        <button class="ql-italic">Italic</button>
                        <button class="ql-underline">Underline</button>
                    </div>

                    <div id="editor" font-family = "Roboto" width ="100%"></div>
                    <input type="hidden" id="content" name="content"> 
                    <input type="hidden" id="combo_id" name="combo_id" value= '.$combo_id.'> 
                    

                    <div class="action">
                        <button type="button" onclick="Cancel()">Hủy</button>
                        <button type="submit" style="background-color: var(--Royal-Blue, #1a2c50); color: var(--Shade-100, #fff);">Lưu combo</button>
                    </div>
                </form>
                        
                        <script>
                            const quill = new Quill("#editor", {
                            modules: {
                                toolbar: "#toolbar"
                            },
                            theme: "snow"
                            });
                            document.querySelector(".ql-editor").innerHTML = getdescription;
                            const editorContentInput = document.getElementById("content");
                            document.getElementById("myForm").addEventListener("submit", function() {
                                var htmlContent = document.querySelector(".ql-editor").innerHTML;
                                editorContentInput.value = htmlContent;
                            });
                            function Cancel() {

                                window.location.href = "admin.php?handle=food-management"; 
                            }
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
    else echo "Đã có lỗi xảy ra!";
?>
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "./db_module.php";
    // Retrieve form data   
    $combo_id = $_POST["combo_id"];
    $combo_name = $_POST["combo_name"];
    $description = $_POST["content"];
    $banner_src = $_POST["banner"];
    $price = $_POST["price"];

    $link = NULL;
    taoKetNoi($link);
    // Prepare SQL statement to insert data into database
    $sql = "UPDATE combo_food SET combo_name = ?, description = ?, img_url = ?, price = ? WHERE combo_id = ?";

    $stmt = mysqli_prepare($link, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssi", $combo_name, $description, $banner_src, $price, $combo_id);

    // Execute the statement
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Sửa thông tin combo đồ ăn thành công.";
        echo "<script> window.location.href='admin.php?handle=food-management';</script>";
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
