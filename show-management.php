<style>
.show-admin__container {
    width: 100%;
    max-width: 1075px;
    margin: 0 auto;
    margin-top: 30px;
}

.show-admin__container .show-admin__heading {
    /* display: flex; */
    /* align-items: center; */
    justify-content: flex-start;
    font-family: Roboto, sans-serif;
    margin-top: 30px;
}

.show-admin__container .show-admin__heading .title {
    color: #4F4F4F;
    font-family: Roboto, sans-serif;
    font-size: 40;
}

.show-admin__container .show-admin__heading .button {
    padding: 12px 14px;
    background-color: #FFBE00;
    color: white;
    outline: none;
    border-radius: 8px;
    border: none;
    font-family: Roboto, sans-serif;
}

.show-admin__container .show-admin__heading .button_primary {
    padding: 12px 14px;
    background-color: #FFBE00;
    color: white;
    outline: none;
    border-radius: 8px;
    border: none;
    font-family: Roboto, sans-serif;
}

.show-admin__container .show-admin__heading .form_button {
    padding: 12px 14px;
    color: white;
    border-radius: 8px;
    border-style: dashed;
    border-color:#4F4F4F;
    border-width: 2px;
    font-family: Roboto, sans-serif;
}

.show-admin__container .table-container {
    margin-top: 20px;
}

.show-admin__container table {
    width: 100%;
    border-collapse: collapse;
}

.show-admin__container th,
td {
    padding: 8px;
    text-align: center;
    font-family: Roboto, sans-serif;

}

.show-admin__container th:not(:last-child),
td:not(:last-child) {
    border-right: 1px solid #ddd;
}

.show-admin__container th {
    background-color: #1A2C50;
    color: white;
}

.show-admin__container tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>

<?php
// Load the database configuration file
include_once './db_module.php';
$link = null;
taoKetNoi($link);

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<?php
// Số lượng dòng trên mỗi trang
$rowsPerPage = 4;

// Lấy trang hiện tại từ biến currentPage
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startRow = ($currentPage - 1) * $rowsPerPage;

// Truy vấn để lấy dữ liệu từ bảng cities với phân trang
$query = "SELECT  s.show_id, s.start_time, m.movie_name, s.room_id, s.date FROM shows s
LEFT JOIN movies m ON m.movie_id = s.movie_id
WHERE s.date > CURRENT_DATE()
ORDER BY show_id DESC
LIMIT $startRow, $rowsPerPage";

 $queryCount = "SELECT COUNT(*) AS total FROM shows s WHERE s.date > CURRENT_DATE()";
 $resultCount = chayTruyVanTraVeDL($link, $queryCount);
 $rowCount = mysqli_fetch_assoc($resultCount);
 $totalPages = ceil($rowCount['total'] / $rowsPerPage);


$result = chayTruyVanTraVeDL($link, $query);

$table_body = "";

// Kiểm tra xem truy vấn có thành công không
if (mysqli_num_rows($result) > 0) {
    
    // Bắt đầu vòng lặp để xây dựng chuỗi HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $table_body .= "<tr>";
        $table_body .= "<td>" . $row['movie_name'] . "</td>";
        $table_body .= "<td>" . $row['date'] . "</td>";
        $table_body .= "<td>" . $row['start_time'] . "</td>";
        $table_body .= "<td>" . $row['room_id'] . "</td>";
        $table_body .= "</tr>";
    }
} else {
    // Nếu không có dữ liệu, hiển thị dòng thông báo
    $table_body .= "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
}

?>


<div class='show-admin__container'>
    <div class='show-admin__heading'>
        <div class='title'>
            Lên lịch chiếu
        </div>
    </div>
    <div class="show-admin__heading">
    <!-- Import link -->
        <div class="show-admin__heading">
            <a href="javascript:void(0);" style="text-decoration: none;" class="button" onclick="formToggle('importFrm');"> Tải lên</a>
        </div>
        <!-- CSV file upload form -->
        <div class="show-admin__heading" id="importFrm" style="display: none;">
        <form class ="form_button" action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input class="button_primary" type="submit"  name="importSubmit" value="Tải lên">

        </form>
        </div>
    </div>
   

    <div class='table-container'>
        <table>
            <thead>
                <tr>
                    <th>Tên phim</th>
                    <th>Ngày chiếu</th>
                    <th>Giờ chiếu</th>
                    <th>ID Phòng chiếu</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $table_body; ?>
            </tbody>
        </table>
        <div>
            <?php
            include 'pagination.php'; // Trang mặc định khi không có tham số trong URL
            ?>
        </div>
    </div>

</div> 

<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>

<?php
// Load the database configuration file

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $show_id   = $line[0];
                $movie_id = $line[2];
                $date  = $line[4];
                $start_time = $line[1];
                $room_id = $line[3];
                //Check whether already exists in the database with the same id
                $prevQuery = "SELECT show_id FROM shows WHERE show_id = '".$line[0]."'";
                $prevResult = chayTruyVanTraVeDL($link, $prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Insert member data in the database
                    $link = NULL;
                taoKetNoi($link);
                $sql = "UPDATE shows SET start_time = ?, movie_id = ?, room_id = ?, date = ? WHERE show_id = $show_id";
                $stmt = mysqli_prepare($link, $sql);
                
                // Bind parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, "siis", $start_time, $movie_id, $room_id, $date);

                // Execute the statement
                mysqli_stmt_execute($stmt);
                } else{
                    // Insert member data in the database
                $link = NULL;
                taoKetNoi($link);
                $sql = "INSERT INTO shows (show_id,start_time, movie_id,room_id, date, is_deleted) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($link, $sql);
                $hihi = 0;
                // Bind parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, "issisi", $show_id, $start_time, $movie_id, $room_id, $date, $hihi);

                // Execute the statement
                mysqli_stmt_execute($stmt);
                }
                }
            

                // Close opened CSV file
                fclose($csvFile);
            
            // $qstring = '?status=succ';
            echo "hehe";
        }else{
            $qstring = '?status=err';
            echo "file name";
        }
    }else{
        $qstring = '?status=invalid_file';
        echo "dmm";
    }
}

// Redirect to the listing page
// header("Location: index.php".$qstring);