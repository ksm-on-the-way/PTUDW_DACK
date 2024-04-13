<?php
require_once './db_module.php';
$link = NULL;
taoKetNoi($link);
$queryfilm = "SELECT * FROM movies m
              LEFT JOIN movie_banner_images mb ON mb.movie_id = m.movie_id
";
$resultfilm = chayTruyVanTraVeDL($link, $queryfilm);
while ($row = mysqli_fetch_assoc($resultfilm)) {

    echo "<div class='card-film'>";
    echo "<img loading='lazy' srcset='" . $row['image_url'] . "' class='img' onclick='redirectToFilmDetail(" . $row['movie_id'] . ")'/>";
    echo "<div class='title'>" . $row['movie_name'] . "</div>";
    echo "</div>";
}
giaiPhongBoNho($link, $resultfilm)
    ?>

<script>
function redirectToFilmDetail(movieid) {
    window.location.href = "./film-details.php?movieid=" + movieid;
}
</script>