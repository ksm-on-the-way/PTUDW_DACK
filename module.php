<?php
require_once "config.php";
function taoKetNoi(&$link) {
        $link = mysqli_connect(HOST, USER, PASSWORD, DB);
        if (mysqli_connect_errno()) {
            echo "Lỗi kết nối đến máy chủ: " . mysqli_connect_error();
            exit();
        }
    }
    
    // Execute a query and return the result set
    function chayTruyVanTraVeDL($link, $q)
    {
        $result = mysqli_query($link, $q);
        return $result;
    }
    
    // Execute a query without returning data
    function chayTruyVanKhongTraVeDL($link, $q)
    {
        $result = mysqli_query($link, $q);
        return $result;
    }
    
    // Release memory resources
    function giaiPhongBoNho($link, &$result)
    {
        try {
            mysqli_close($link);
            mysqli_free_result($result);
        } catch (TypeError $e) {
            // Handle any exceptions here
        }
    }
?>

