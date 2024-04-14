<?php
require_once ("db_module.php");
$link = NULL;
$result = null;
taoKetNoi($link);

function fetchMoreNews($offset, $limit, $newsCategoryId, $link)
{
    $sql = "SELECT news.*, news_categories.news_category_name 
            FROM news 
            INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id 
            WHERE news.news_category_id = $newsCategoryId
            ORDER BY news_date DESC
            LIMIT $offset, $limit";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<article onclick = 'redirectToNewsDetail(" . $row['news_id'] . ")'>";
            echo "<article>";
            echo "<img src='" . $row["news_banner_src"] . "'>";
            echo "<div class='wrapper'>";
            echo "<p class='category'>" . $row["news_category_name"] . "</p>";
            echo "<h2 class='mt-2'>" . $row["news_title"] . "</h2>";
            echo "<p class='body_shade600 line_clamp'>" . strip_tags($row["news_content"]) . "</p>";
            echo "</div>";
            echo "</article>";
        }
    } else {
        echo "";
    }
}

// Check if offset, limit, and news category ID are set
if (isset($_GET['offset']) && isset($_GET['limit']) && isset($_GET['news_category_id'])) {
    // Connect to the database
    $link = NULL;
    taoKetNoi($link);

    // Fetch more news items
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    $newsCategoryId = $_GET['news_category_id'];
    $moreNews = fetchMoreNews($offset, $limit, $newsCategoryId, $link);

    giaiPhongBoNho($link, $result);

    // Send the fetched news items as response
    echo $moreNews;
} else {
    // Handle error if offset, limit, or news category ID are not set
    echo "Error: Offset, limit, and news category ID parameters are required.";
}
?>