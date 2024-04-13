<?php
session_start();
require_once ("./db_module.php");

if (isset($_GET["movieid"])) {
  $filmDetails_id = $_GET["movieid"];
  $link = NULL;
  taoKetNoi($link);
  $sql = "SELECT m.movie_id, m.movie_name, m.movie_description, m.trailer_url, d.movie_director_name, g.movie_genre_name, m.movie_duration, m.release_date, b.image_url, r.movie_rate_name FROM movies m 
    LEFT JOIN movie_rates r ON m.movie_rate_id = r.movie_rate_id
    LEFT JOIN movie_banner_images b ON m.movie_id = b.movie_id
    LEFT JOIN movie_genres g ON m.movie_genre_id = g.movie_genre_id
    LEFT JOIN movie_directors d ON m.movie_director_id = d.movie_director_id
    WHERE m.is_deleted = '0' and m.movie_id = " . $filmDetails_id;
  //ORDER BY m.movie_id ASC";
  $result = chayTruyVanTraVeDL($link, $sql);

  if (mysqli_num_rows($result) != 0) {
    // include_once "header.php";
    $rows = mysqli_fetch_assoc($result);
    // giaiPhongBoNho($link, $result);
    echo
      '
<html>
<head>
<meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
</head>

<body>
';

    include_once "header.php";

    echo '
<div class="detail-container">
  <div class="detail-head">Mô tả</div>
  <div class="detail-container-gen">
    <div class="detail-item">
      <div class="column-1">
        <img loading="lazy" srcset="' . $rows['image_url'] . '" class="img" />
      </div>
      <div class="column-2">
        <div class="detail-content">
          <div class="title">' . $rows['movie_name'] . '
          <br/>
          </div>
          <div class="content1"> ' . $rows['movie_description'] . '
            <br/>
            <br>
          </div>
          <div class="content2">
            Phân loại:
            <span style="color: rgba(26, 44, 80, 1)"><b>' . $rows['movie_rate_name'] . '</b></span>
            <br/>
            <br/>
            Đạo diễn:
            <span style="color: rgba(26, 44, 80, 1)"><b>' . $rows['movie_director_name'] . '</b></span>
            <br/>
            <br/>
            Thể loại:
            <span style="color: rgba(26, 44, 80, 1)"><b>' . $rows['movie_genre_name'] . '</b></span>
            <br/>
            <br/>
            Khởi chiếu:
            <span style="color: rgba(26, 44, 80, 1)"><b>' . $rows['release_date'] . '</b></span>
            <br/>
            <br/>
            Thời lượng:
            <span style="color: rgba(26, 44, 80, 1)"><b>' . $rows['movie_duration'] . '</b></span>
          </div>

          <div class="btn">
          
            <button class="btn-trailer"><a href ="' . $rows['trailer_url'] . '" style="text-decoration: none;">XEM TRAILER</a></button>
            <button class="btn-mua-ve" onclick="checkAndRedirect(' . $rows['movie_id'] . ')">MUA VÉ</button>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>';
    // Script JavaScript để kiểm tra session và chuyển hướng
    echo '
<script>
function checkAndRedirect(movieId) {
    // Kiểm tra xem session đã tồn tại hay không
    var username = "' . (isset($_SESSION['email']) ? $_SESSION['email'] : '') . '";
    console.log("Giá trị của username là: " + username);

    if (username == "") {

        // Nếu không tồn tại, hiển thị cảnh báo
        var confirmLogin = confirm("Bạn cần đăng nhập trước khi mua vé. Bạn có muốn đăng nhập không?");
        if (confirmLogin) {
            // Nếu người dùng nhấn OK, chuyển hướng đến trang đăng nhập
            window.location.href = "login.php";
            localStorage.setItem("loginToBuyTicket", JSON.stringify(movieId));
        } else {
            // Nếu người dùng nhấn Cancel, không làm gì cả
        }
    } else {
        // Nếu session username tồn tại, chuyển hướng đến trang schedule.php với id của phim
        redirectToSchedule(movieId);
    }
}

function redirectToSchedule(movieId) {
    window.location.href = "schedule.php?id=" + movieId;
}
</script>';
    include_once "footer.php";
    echo '
</html>';
  } else {
    echo "Error 404";
  }
} else {
  echo "Error 404";
}
?>

<script>
  //Mua vé
 

//Trailer

</script>
<style>
  html {
    margin: 0px;
    padding: 0px;
  }

  .detail-container {
    display: flex;
    margin-top: 28px;
    width: 100%;
    flex-direction: column;
    padding: 0 px;
  }

  @media (max-width: 991px) {
    .detail-container {
      max-width: 100%;
      padding: 0 20px;
    }
  }

  .detail-head {
    color: var(--Shade-900, #333);
    font: 700 36px Roboto, sans-serif;
    margin-left: 120px;
  }

  @media (max-width: 991px) {
    .detail-head {
      max-width: 100%;
      margin-right: 12px;
    }
  }

  .detail-container-gen {
    align-self: center;
    margin-top: 50px;
    width: 100%;
    max-width: 1256px;
  }

  @media (max-width: 991px) {
    .detail-container-gen {
      max-width: 100%;
      margin-top: 20px;
    }
  }

  .detail-item {
    gap: 40px;
    display: flex;
  }

  @media (max-width: 991px) {
    .detail-item {
      display: flex;
      gap: 5px;
    }
  }

  .column-1 {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 30%;
    margin-left: 0px;
  }

  @media (max-width: 991px) {
    .column-1 {
      width: 32%;
    }
  }

  .img {
    aspect-ratio: 0.71;
    object-fit: auto;
    object-position: center;
    width: 100%;
    filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
    flex-grow: 1;
    border-radius: 15px;
    height: 65%;
  }

  @media (max-width: 991px) {
    .img {
      max-width: 100%;
      margin-top: 40px;
      height: 20%;
    }
  }

  .column-2 {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 65%;
    margin-left: 20px;
  }

  @media (max-width: 991px) {
    .column-2 {
      width: 72%;
    }
  }

  .detail-content {
    display: flex;
    flex-grow: 1;
    flex-direction: column;
    font-size: 18px;
    font-weight: 500;
  }

  @media (max-width: 991px) {
    .detail-content {
      max-width: 100%;
      margin-top: 40px;
      display: flex;
    }
  }

  .title {
    color: var(--Royal-Blue, #1a2c50);
    font: 700 36px Roboto, sans-serif;
    text-transform: uppercase;
  }

  @media (max-width: 991px) {
    .title {
      max-width: 100%;
    }
  }

  .content1 {
    color: var(--Shade-600, #5a637a);
    text-align: justify;
    margin-top: 16px;
    font: 400 16px/24px Roboto, sans-serif;
  }

  @media (max-width: 991px) {
    .content1 {
      max-width: 100%;
    }
  }

  .content2 {
    color: var(--Royal-Blue, #1a2c50);
    font-family: Roboto, sans-serif;
    margin-top: 16px;
  }

  @media (max-width: 991px) {
    .content2 {
      max-width: 100%;
    }
  }

  .btn {
    display: flex;
    gap: 25px;
    font-size: 20px;
    text-align: center;
    line-height: 133%;
    margin: 100px 120px 0;
  }

  @media (max-width: 991px) {
    .btn {
      flex-wrap: wrap;
      margin: 40px 10px 0 0;
    }
  }

  .btn-trailer {
    font-family: Roboto, sans-serif;
    justify-content: center;
    border-radius: 12px;
    border-color: rgba(26, 44, 80, 1);
    border-style: solid;
    border-width: 2px;
    color: var(--Royal-Blue, #1a2c50);
    flex-grow: 1;
    width: 60px;
    padding: 10px 10px;
  }

  .btn-mua-ve {
    font-family: Roboto, sans-serif;
    justify-content: center;
    border-radius: 12px;
    background-color: var(--Royal-Blue, #1a2c50);
    color: var(--Sunshine-Yellow, #ffbe00);
    flex-grow: 1;
    width: 60px;
    padding: 10px 10px;
    cursor: pointer;
  }
</style>