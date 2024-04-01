<?php
require_once './config.php';
function taoKetNoi(&$link)
{
    $link = mysqli_query(HOST, USER, PASSWORD, DB);
    if (mysqli_connect_error()) {
        echo "Lỗi kết nối đến máy chủ: " . mysqli_connect_error();
        exit();
    }
}

function chayTruyVanTraVeDL($link, $q)
{
    $result = mysqli_query($link, $q);
    return $result;
}

function giaiPhongBoNho($link, $result)
{
    try {
        mysqli_close($link);
        mysqli_free_result($link);
    } catch (TypeError $e) {
    }
}

?>