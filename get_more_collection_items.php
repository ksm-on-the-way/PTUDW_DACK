<?php
// Include database connection
require_once("./db_module.php");

// Function to fetch more news items
function fetchMoreNews($offset, $limit, $link)
{
    $sql = "SELECT news.*, news_categories.news_category_name 
            FROM news 
            INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id 
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
        $output .= "<p>No more news available.</p>";
    }

    return $output;
}

// Check if offset and limit are set
if (isset($_GET['offset']) && isset($_GET['limit'])) {
    // Connect to the database
    $link = NULL;
    taoKetNoi($link);

    // Fetch more news items
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    $moreNews = fetchMoreNews($offset, $limit, $link);

    // Close database connection
    giaiPhongBoNho($link, null);

    // Send the fetched news items as response
    echo $moreNews;
} else {
    // Handle error if offset and limit are not set
    echo "Error: Offset and limit parameters are required.";
}
?>