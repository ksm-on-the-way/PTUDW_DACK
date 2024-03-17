<?php
include_once "header.php";
?>
<?php
require_once "module.php";
if(isset ($_GET["id"])) {
    $article_id = $_GET["id"];
    $link = null;
    taoKetNoi($link);
    $sql = "SELECT * FROM tbl_news WHERE id =".$article_id;
    $result = chayTruyVanTraVeDL($link, $sql);
    $rows=mysqli_fetch_row($result);
    giaiPhongBoNho($link, $result);
}
else { echo "Error 404";}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="news_article.css" type="text/css">
</head>
<body>
<div class="container">
  <div class = "first_container">
  <div class="maininfo">
      <div class="news_title">Spider-Man: No Way Home Rilis Trailer Terbaru</div>
      <div class="upload_date">17 Nov 2021 | TIX ID</div>
  </div>
  <img
    loading="lazy"
    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/d952155a1f4eaf980351e1eb14cef8adfefafd33abadceeb21166e12ffc58776?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/d952155a1f4eaf980351e1eb14cef8adfefafd33abadceeb21166e12ffc58776?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d952155a1f4eaf980351e1eb14cef8adfefafd33abadceeb21166e12ffc58776?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/d952155a1f4eaf980351e1eb14cef8adfefafd33abadceeb21166e12ffc58776?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/d952155a1f4eaf980351e1eb14cef8adfefafd33abadceeb21166e12ffc58776?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d952155a1f4eaf980351e1eb14cef8adfefafd33abadceeb21166e12ffc58776?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/d952155a1f4eaf980351e1eb14cef8adfefafd33abadceeb21166e12ffc58776?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/d952155a1f4eaf980351e1eb14cef8adfefafd33abadceeb21166e12ffc58776?apiKey=26bc666b112f4cabba6b77c16b9bc389&"
    class="news_img"
  />
  <div class="news_content">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Laoreet quis vitae
    molestie eleifend in. Proin volutpat id congue diam. Gravida lorem augue
    senectus nunc et, sagittis in mattis feugiat. Pharetra eleifend eget
    pellentesque faucibus laoreet. Fames amet hac quis suscipit proin amet.
    Neque rutrum nam parturient ac. Egestas ut vestibulum ac diam odio malesuada
    potenti. Donec vitae consequat consequat ornare ante et pulvinar. Diam vitae
    neque ridiculus diam at posuere volutpat. Donec in pellentesque diam congue.
    <br />
    <br />
    Ultrices malesuada diam condimentum risus. In velit justo eu ac amet fusce
    lorem urna. Quis sed neque sed duis. Eleifend purus nam at cras nisi, vitae.
    Eleifend mollis sem odio morbi faucibus. Adipiscing in libero pharetra odio
    quam. Suspendisse tortor, viverra odio ultrices.
    <br />
    Eu arcu odio neque malesuada ut blandit sit. In justo, suspendisse sit
    faucibus morbi egestas ut facilisis egestas. Turpis non amet massa a, elit,
    in. Lectus at elementum, a nullam in. Commodo magna senectus malesuada ut
    rhoncus in. Placerat arcu congue faucibus auctor purus, fringilla praesent
    maecenas
    <br />
    <br />
    Quis sed lobortis sed amet nec eu, dolor. Elementum in integer sagittis
    tellus scelerisque imperdiet felis sit mauris. Scelerisque nunc, nullam
    malesuada leo odio malesuada lobortis egestas. Neque at fringilla morbi
    nulla facilisi tellus sit lobortis cursus. Venenatis at aliquet auctor ut
    elit, urna. Consequat quis risus turpis amet.
  </div>
  <div class="other_article_txt">Xem thêm các bài viết khác</div>
  </div>
  
  <div class="other_news">
  <div class="news_items">
    <div class="column" id="column_1">
        <img
          loading="lazy"
          srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/ef2a30bb30cd1d60eb924a537f9a3c3bb70a5a76c553fb3532a04139a0017ad7?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/ef2a30bb30cd1d60eb924a537f9a3c3bb70a5a76c553fb3532a04139a0017ad7?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ef2a30bb30cd1d60eb924a537f9a3c3bb70a5a76c553fb3532a04139a0017ad7?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/ef2a30bb30cd1d60eb924a537f9a3c3bb70a5a76c553fb3532a04139a0017ad7?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/ef2a30bb30cd1d60eb924a537f9a3c3bb70a5a76c553fb3532a04139a0017ad7?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ef2a30bb30cd1d60eb924a537f9a3c3bb70a5a76c553fb3532a04139a0017ad7?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/ef2a30bb30cd1d60eb924a537f9a3c3bb70a5a76c553fb3532a04139a0017ad7?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/ef2a30bb30cd1d60eb924a537f9a3c3bb70a5a76c553fb3532a04139a0017ad7?apiKey=26bc666b112f4cabba6b77c16b9bc389&"
          class="img"
        />
        <div class ="otnews_content">
        <div class = "news_category">News</div>
        <div class="other_news_title">
          Ghostbusters: Afterlife Hadir Menampilkan Variasi Hantu Baru
        </div>
        <div class="other_news_date">08 Nov 2021 | TIX ID</div>
        </div>
    </div>
    <div class="column" id="column_2">
        <img
          loading="lazy"
          srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/aa9b3e0530843484631008c865366b1fdd6998bc11f043e4fea3f7f8619f471e?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/aa9b3e0530843484631008c865366b1fdd6998bc11f043e4fea3f7f8619f471e?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/aa9b3e0530843484631008c865366b1fdd6998bc11f043e4fea3f7f8619f471e?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/aa9b3e0530843484631008c865366b1fdd6998bc11f043e4fea3f7f8619f471e?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/aa9b3e0530843484631008c865366b1fdd6998bc11f043e4fea3f7f8619f471e?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/aa9b3e0530843484631008c865366b1fdd6998bc11f043e4fea3f7f8619f471e?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/aa9b3e0530843484631008c865366b1fdd6998bc11f043e4fea3f7f8619f471e?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/aa9b3e0530843484631008c865366b1fdd6998bc11f043e4fea3f7f8619f471e?apiKey=26bc666b112f4cabba6b77c16b9bc389&"
          class="img"
        />
        <div class="other_news_title">
          House of Gucci: Kisah Pewaris Tunggal Gucci Pada Tahun 1955.
        </div>
        <div class="other_news_date">09 Nov 2021 | TIX ID</div>
    </div>
    <div class="column" id="column_3">
        <img
          loading="lazy"
          srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/ed23c4feb0151894ad2b8a0b0696102fde9b1b793fa0f9b8f52746aacc458501?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed23c4feb0151894ad2b8a0b0696102fde9b1b793fa0f9b8f52746aacc458501?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed23c4feb0151894ad2b8a0b0696102fde9b1b793fa0f9b8f52746aacc458501?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed23c4feb0151894ad2b8a0b0696102fde9b1b793fa0f9b8f52746aacc458501?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed23c4feb0151894ad2b8a0b0696102fde9b1b793fa0f9b8f52746aacc458501?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed23c4feb0151894ad2b8a0b0696102fde9b1b793fa0f9b8f52746aacc458501?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed23c4feb0151894ad2b8a0b0696102fde9b1b793fa0f9b8f52746aacc458501?apiKey=26bc666b112f4cabba6b77c16b9bc389&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/ed23c4feb0151894ad2b8a0b0696102fde9b1b793fa0f9b8f52746aacc458501?apiKey=26bc666b112f4cabba6b77c16b9bc389&"
          class="img"
        />
        <div class="other_news_title">
          Aksi Donnie Yen Dalam Film Aksi Hongkong Terbaru
        </div>
        <div class="other_news_date">15 Nov 2021 | TIX ID</div>
    </div>
  </div>
</div>
</div>

</body>
</html>

<?php
include_once "footer.php";
?>