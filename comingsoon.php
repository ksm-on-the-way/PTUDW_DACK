<?php
include_once "header.php";
?>
<?php
require_once("module.php");

?>
<?php
echo '<html>
<head>
    <link rel="stylesheet" href="comingsoon.css">
    <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="comingsoon.js">
    // function showButtons() {
    //     document.querySelector(".overlay").style.display = "flex";
    // }
    
    // function hideButtons() {
    //     document.querySelector(".overlay").style.display = "none";
    // }
    </script>
</head>
<body>
<div class= "head">
    <div class="comingsoon_head">Sắp chiếu</div>
    <div class="comingsoon_subtitle">Chờ đợi chúng đến rạp chiếu phim yêu thích của bạn!</div>
</div>
<div class="comingsoon_film_container">
  <div class="comingsoon_items">';
$link = NULL;
taoKetNoi($link);
$result=chayTruyVanTraVeDL($link,"SELECT * FROM movie WHERE release_date > CURDATE() ORDER BY release_date ASC");
while($rows=mysqli_fetch_assoc($result)){
echo '
    <div class="column">
        <img
          loading="lazy"
          srcset="'.$rows['movie_banner_src'].'"
          class="img"
        />
        <div class="content">
        <div class="comingsoon_film_title">'.$rows['movie_name'].'</div>
        <div class = "comingsoon_info_container">
        <div class="comingsoon_film_info">
            <span class = "bold_info">Thể loại: </span><span class = "info">'.$rows['movie_genre'].'</span>
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


