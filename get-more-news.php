<?php
// Include database connection
require_once("./db_module.php");

// Function to fetch more news items
function fetchMoreNews($offset, $limit, $newsCategoryId, $link)
{
    $sql = "SELECT news.*, news_categories.news_category_name 
            FROM news 
            INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id 
            WHERE news.news_category_id = $newsCategoryId
            ORDER BY news_date DESC
            LIMIT $offset, $limit";
    $result = $link->query($sql);

    $output = '';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= "<article>";
            $output .= "<img src='" . $row["news_banner_src"] . "'>";
            $output .= "<div class='wrapper'>";
            $output .= "<p class='category'>" . $row["news_category_name"] . "</p>";
            $output .= "<h2 class='mt-2'>" . $row["news_title"] . "</h2>";
            $output .= "<p class='body_shade600 line_clamp'>" . $row["news_content"] . "</p>";
            $output .= "</div>";
            $output .= "</article>";
        }
    } else {
    }

    return $output;
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

    // Close database connection
    giaiPhongBoNho($link, null);

    // Send the fetched news items as response
    echo $moreNews;
} else {
    // Handle error if offset, limit, or news category ID are not set
    echo "Error: Offset, limit, and news category ID parameters are required.";
}
