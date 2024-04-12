<?php
require_once "db_module.php";
if(isset ($_GET["id"])) { //kiểm tra phương thức get
    $article_id = $_GET["id"];
    $link = null;
    taoKetNoi($link);
    $sql = "SELECT * FROM news WHERE news_id ='.$article_id.' AND is_deleted='0'";
    $result = chayTruyVanTraVeDL($link, $sql);
if(mysqli_num_rows($result)!=0) { //kiểm tra có id hay không
    include_once "header.php";
    $rows=mysqli_fetch_assoc($result);
    giaiPhongBoNho($link, $result);
echo //fetch dữ liệu từ db 
'<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
  $sql = "SELECT n.*, news_categories.*
  FROM news n
  JOIN news_categories ON n.news_category_id = news_categories.news_category_id
  WHERE n.news_id != $article_id AND n.is_deleted='0'
  ORDER BY n.news_date DESC
  "; //truy vấn các bài viết và sắp xếp dựa trên ngày đăng
  $result = chayTruyVanTraVeDL($link, $sql);;
  echo '
  <div class="other_news">
  <div class="news_items">';
  for ($x=1; $x<=3;$x++) {
    $rows=mysqli_fetch_assoc($result);
    echo '
    <div class="column" onclick="navigateToArticle('.$rows['news_id'].')">
        <img
          loading="lazy"
          srcset="'.$rows['news_banner_src'].'"
          class="img"
        />
        <div class ="otnews_content">
        <div class = "news_category">'.$rows['news_category_name'].'</div>
        <div class="other_news_title">
        '.$rows['news_title'].'
        </div>
        <div class="other_news_date">'.$rows['news_date'].'</div>
        </div>
    </div>';
  };
  echo '<script>
        function navigateToArticle(articleId) {
            window.location.href = "news_article.php?id=" + articleId;
        }
      </script>';
echo '</div>
</div>

</body>
</html>';
include_once "footer.php";
}
else { echo "Không tìm thấy bài viết";}
}
else { echo "Không tìm thấy bài viết";}
?>
<style>
    html {
    display: flex;
    justify-content: center;
    font: 400 18px/28px Roboto, sans-serif;
    color: var(--Shade-900, #333);
  }
  .container {
    margin: auto;
    width: 70%;
    align-self: center;
    display: flex;
    flex-direction: column;
  }
  .first_container {
    margin-top: 102px;
    max-width: 100%;
    padding: 0 20px;
  }
  @media (max-width: 991px) {
    .container {
      margin-top: 40px;
    }
  }
  .maininfo {
    display: flex;
    flex-direction: column;
    position: relative;
  }
  .news_title {
    color: var(--Shade-900, #333);
    font: 700 56px Roboto, sans-serif;
  }
  @media (max-width: 991px) {
    .news_title {
      max-width: 100%;
      font-size: 40px;
    }
  }
  .upload_date {
    color: var(--Shade-600, #5a637a);
    margin-top: 32px;
    font: 400 24px/58% Roboto, sans-serif;
  }
  @media (max-width: 991px) {
    .upload_date {
      max-width: 100%;
    }
  }
  .news_img {
    aspect-ratio: 1.92;
    object-fit: auto;
    object-position: center;
    width: 100%;
    margin-top: 88px;
  }
  @media (max-width: 991px) {
    .news_img {
      max-width: 100%;
      margin-top: 40px;
    }
  }
  .news_content {
    color: var(--Shade-900, #333);
    margin-top: 73px;
  }
  @media (max-width: 991px) {
    .news_content {
      max-width: 100%;
      margin-top: 40px;
    }
  }

  .other_article_txt {
    color: #000;
    text-align: center;
    align-self: center;
    margin-top: 70px;
    white-space: nowrap;
    font: 700 36px Roboto, sans-serif;
  }
  @media (max-width: 991px) {
    .other_article_txt {
      margin-top: 40px;
      white-space: initial;
    }
  }
  .other_news {
    align-self: center;
    margin-top: 89px;
    width: 100%;
    max-width: 100%;
    padding: 0 20px;
    margin-bottom: 80px;
  }
  @media (max-width: 991px) {
    .other_news {
      max-width: 100%;
      margin-top: 40px;
    }
  }
  .news_items {
    gap: 20px;
    display: flex;
  }
  @media (max-width: 991px) {
    .news_items {
      flex-direction: column;
      align-items: stretch;
      gap: 0px;
    }
  }
  .column {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 33%;
    margin-left: 0px;
    border: 1px solid #ddd;
    border-radius: 2%;
    transition: transform .2s;;
  }
  @media (max-width: 991px) {
    .column {
      width: 100%;
      margin: 30px;
    }
  }
  .img {
    aspect-ratio: 1.75;
    object-fit: auto;
    object-position: center;
    width: 100%;
  }
  .other_news_title {
    margin-top: 10px;
    font: 500 24px/32px Roboto, sans-serif;
  }
  .other_news_date {
    color: var(--Shade-600, #5a637a);
    margin-top: 18px;
    font: 16px/150% Roboto, sans-serif;
  }
  .column:hover {
    transform: scale(1.05);
    box-shadow: 2px 2px 10px #888888;
  }
  .news_category {
    justify-content: center;
    border: 1.5px solid rgba(51, 61, 88, 1);
    margin-top: 12px;
    padding: 0.5rem 1rem;
    width: fit-content;
    white-space: nowrap;
    padding: 8px 12px;
    font: 12px Roboto, sans-serif;
    border-radius: 7%;
  }
  .otnews_content {
    padding: 6px;
  }
</style>