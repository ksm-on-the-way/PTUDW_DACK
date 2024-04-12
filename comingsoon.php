<?php
include_once "header.php";
?>
<?php
require_once("db_module.php");

?>
<?php
echo '<html>
<head>
    <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

</head>
<body>
<div class= "head">
    <div class="comingsoon_head">Sắp chiếu</div>
    <div class="comingsoon_subtitle">Chờ đợi chúng đến rạp chiếu phim yêu thích của bạn!</div>
</div>
<div class="comingsoon_film_container">
  <div class="comingsoon_items">';
$link = NULL;
taoKetNoi($link); //thực hiện truy vấn
$sql = "SELECT m.movie_id, m.movie_name, g.movie_genre_name, m.movie_duration, m.release_date, b.image_url FROM movies m 
LEFT JOIN movie_rates r ON m.movie_rate_id = r.movie_rate_id
LEFT JOIN movie_banner_images b ON m.movie_id = b.movie_id
LEFT JOIN movie_genres g ON m.movie_genre_id = g.movie_genre_id
WHERE release_date > CURDATE() AND m.is_deleted = '0'
ORDER BY release_date ASC";
$result=chayTruyVanTraVeDL($link, $sql);
while($rows=mysqli_fetch_assoc($result)){
echo '
    <div class="column" onclick="redirectToFilmDetails('.$rows['movie_id'].')">
        <img
          loading="lazy"
          srcset="'.$rows['image_url'].'"
          class="img"
        />
        <div class="content">
        <div class="comingsoon_film_title">'.$rows['movie_name'].'</div>
        <div class = "comingsoon_info_container">
        <div class="comingsoon_film_info">
            <span class = "bold_info">Thể loại: </span><span class = "info">'.$rows['movie_genre_name'].'</span>
        </div>
        <div class="comingsoon_film_info">
            <span class = "bold_info">Thời lượng: </span><span class = "info">'.$rows['movie_duration'].'</span>
        </div>
        <div class="comingsoon_film_info">
            <span class = "bold_info">Ngày khởi chiếu: </span>'.$rows['release_date'].'<span class = "info"></span>
        </div>
        </div>
        </div>  
    </div>
  ';
}
echo '</div>
</div>

</body>
</html>';
giaiPhongBoNho($link, $result);
?>
<script>
  function redirectToFilmDetails(id) { //nhảy đến chi tiết phim

window.location.href = "film-details.php?id=" + id;
  }
</script>
<style>
    .head {
    display: flex;
    flex-direction: column;
    position: relative;
    margin-left: 68px;
  }

.comingsoon_head {
    color: var(--Shade-900, #333);
    font: 700 36px Roboto, sans-serif;
  }
  @media (max-width: 991px) {
    .comingsoon_head {
      max-width: 100%;
      margin-right: 6px;
    }
  }
  .comingsoon_subtitle {
    color: var(--Shade-700, #414a63);
    margin-top: 25px;
    font: 400 16px/150% Roboto, sans-serif;
  }
  @media (max-width: 991px) {
    .comingsoon_subtitle {
      max-width: 100%;
      margin-right: 6px;
    }
  }
  .comingsoon_film_container {
    display: flex;
    margin: 68px auto;
    max-width: 90%;
  }
  @media (max-width: 991px) {
    .comingsoon_film_container {
      max-width: 100%;
      padding-right: 20px;
      margin: 40px 40px;
    }
  }
  .comingsoon_items {
    display: grid;
    grid-template-columns: 30% 30% 30%;
    gap: 30px 5%;
  }
  @media (max-width: 991px) {
    .comingsoon_items {
      /* display: flex;
      flex-direction: column;
      align-items: stretch;
      gap: 30px;
      margin: auto; */
      display: grid;
      grid-template-columns: 45% 45%;
      margin: auto;
    }
  }
  .column {
    border: 1px solid #ddd;
    border-radius: 2%;
    transition: transform .2s;
    /* flex-direction: column; */
  }
  @media (max-width: 991px) {
    .column {
      width: 100%;
      margin-top: 50px;
    }
  }
  .img {
    aspect-ratio: 0.67;
    object-fit: auto;
    object-position: center;
    width: 100%;
    border-radius: 2%;
  }
  .comingsoon_film_title {
    color: var(--Shade-900, #333);
    margin-top: 30px;
    margin-bottom: 16px;
    font: 500 24px/133% Roboto, sans-serif;
  }
  @media (max-width: 991px) {
    .comingsoon_film_title {
      margin-top: 25px;
      margin-bottom: 10px;
    }
  }
  .comingsoon_film_info {
    font: 100 16px/133% Roboto, sans-serif;
    
  }
  .bold_info {
    color: var(--Shade-900, #333);
    font-weight: 600;
  }
  .comingsoon_info_container {
    bottom: 20px;
    position: absolute; 
  }
  .column:hover {
    transform: scale(1.05);
    box-shadow: 2px 2px 10px #888888;
  }
  .content {
    padding-left: 20px;
    height: 190px;
    position: relative;
    
  }

</style>

