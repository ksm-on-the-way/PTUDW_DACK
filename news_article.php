<?php
require_once "module.php";
if(isset ($_GET["id"])) {
    $article_id = $_GET["id"];
    $link = null;
    taoKetNoi($link);
    $sql = "SELECT * FROM news WHERE newsid =".$article_id;
    $result = chayTruyVanTraVeDL($link, $sql);
if(mysqli_num_rows($result)!=0) {
    include_once "header.php";
    $rows=mysqli_fetch_assoc($result);
    giaiPhongBoNho($link, $result);
echo
'<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="news_article.css" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  <div class = "first_container">
  <div class="maininfo">
      <div class="news_title">'.$rows['news_title'].'</div>
      <div class="upload_date">'.$rows['news_date'].'</div>
  </div>
  <img
    loading="lazy"
    srcset = '.$rows['news_banner_src'].'
    class="news_img"
  />
  <div class="news_content">'.$rows['news_content'].'</div>
  <div class="other_article_txt">Xem thêm các bài viết khác</div>
  </div>';
  $link = null;
  taoKetNoi($link);
  $sql = "SELECT * FROM news WHERE newsid != $article_id ORDER BY news_date DESC";
  $result = chayTruyVanTraVeDL($link, $sql);
  // mysqli_num_rows($result);
  echo '
  <div class="other_news">
  <div class="news_items">';
  for ($x=1; $x<=3;$x++) {
    $rows=mysqli_fetch_assoc($result);
    echo '
    <div class="column" onclick="navigateToArticle('.$rows['newsid'].')">
        <img
          loading="lazy"
          srcset="'.$rows['news_banner_src'].'"
          class="img"
        />
        <div class ="otnews_content">
        <div class = "news_category">'.$rows['news_category'].'</div>
        <div class="other_news_title">
        '.$rows['news_title'].'
        </div>
        <div class="other_news_date">'.$rows['news_date'].'</div>
        </div>
    </div>';
  };
  echo '<script>
        function navigateToArticle(articleId) {
            // window.location.href = "news_article.php?id=" + articleId;
            const column = document.querySelector(".column");
            column.style.transition = "transform 0.5s ease-in-out";
            column.style.transform = "scale(0.9)"; 
            setTimeout(() => {
              window.location.href = "news_article.php?id=" + articleId;
            }, 50); 
        }
      </script>';
echo '</div>
</div>

</body>
</html>';
include_once "footer.php";
}
else { echo "Error 404";}
}
else { echo "Error 404";}
?>