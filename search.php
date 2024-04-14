<?php
require_once ("db_module.php");
$link = NULL;
$result = null;
taoKetNoi($link);

if (isset($_GET['search_query'])) {
    $search_query = $_GET['search_query'];
    $sql_search = "SELECT news.*, news_categories.news_category_name 
                   FROM news 
                   INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id 
                   WHERE news_title LIKE '%$search_query%'";

    $result_search = $link->query($sql_search);

    if ($result_search->num_rows > 0) {
        echo '<div>';
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
        echo '</div>';
    } else {
        echo "Không tìm thấy tin tức.";
    }
}

giaiPhongBoNho($link, $result);
?>

<script>
function redirectToNewsDetail(id) {
    window.location.href = "./news-detail.php?id=" + id;
}
</script>
