<?php
require_once ("db_module.php");
$link = NULL;
$result = null;
taoKetNoi($link);

// Function to fetch more Collection items
function fetchMoreNews($offset, $limit, $link)
{
    $sql = "SELECT news.*, news_categories.news_category_name 
            FROM news 
            INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id 
            ORDER BY news_date DESC
            LIMIT $offset, $limit";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<article onclick = 'redirectToNewsDetail(" . $row['news_id'] . ")'>";
            echo "<img src='" . $row["news_banner_src"] . "'>";
            echo "<div class='wrapper'>";
            echo "<p class='category'>" . $row["news_category_name"] . "</p>";
            echo "<h2 class='mt-2'>" . $row["news_title"] . "</h2>";
            echo "<span class='body_shade600 line_clamp'>" . strip_tags($row["news_content"]) . "</span>";
            echo "</div>";
            echo "</article>";

        }
    } else {
        echo "";
    }
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