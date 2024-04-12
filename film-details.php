<?php
require_once("./db_module.php");

if(isset ($_GET["id"])) {
    $filmDetails_id = $_GET["id"];
    $link = NULL;
    taoKetNoi($link);
    $sql = "SELECT m.movie_id, m.movie_name, m.movie_description, m.trailer_url, d.movie_director_name, g.movie_genre_name, m.movie_duration, m.release_date, b.image_url, r.movie_rate_name FROM movies m 
    LEFT JOIN movie_rates r ON m.movie_rate_id = r.movie_rate_id
    LEFT JOIN movie_banner_images b ON m.movie_id = b.movie_id
    LEFT JOIN movie_genres g ON m.movie_genre_id = g.movie_genre_id
    LEFT JOIN movie_directors d ON m.movie_director_id = d.movie_director_id
    WHERE  m.movie_id = ".$filmDetails_id;
    //ORDER BY m.movie_id ASC";
    $result=chayTruyVanTraVeDL($link, $sql);

if(mysqli_num_rows($result)!=0) {
    // include_once "header.php";
    $rows=mysqli_fetch_assoc($result);
    // giaiPhongBoNho($link, $result);
echo 
'
<html>
<head>
<meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
</head>

<body>

<div class="detail-container">
  <div class="detail-container-gen">
    <div class="detail-item">
      <div class="column-1">
        <img loading="lazy" srcset="'.$rows['image_url'].'" class="img" />
      </div>
      <div class="column-2">
        <div class="detail-content">
          <div class="title">'.$rows['movie_name'].'
          <br/>
          </div>
          <div class="content1"> '.$rows['movie_description'].'
            <br/>
            <br>
          </div>
          <div class="content2">
            Phân loại:
            <span style="color: rgba(26, 44, 80, 1)"><b>'.$rows['movie_rate_name'].'</b></span>
            <br/>
            <br/>
            Đạo diễn:
            <span style="color: rgba(26, 44, 80, 1)"><b>'.$rows['movie_director_name'].'</b></span>
            <br/>
            <br/>
            Thể loại:
            <span style="color: rgba(26, 44, 80, 1)"><b>'.$rows['movie_genre_name'].'</b></span>
            <br/>
            <br/>
            Khởi chiếu:
            <span style="color: rgba(26, 44, 80, 1)"><b>'.$rows['release_date'].'</b></span>
            <br/>
            <br/>
            Thời lượng:
            <span style="color: rgba(26, 44, 80, 1)"><b>'.$rows['movie_duration'].'</b></span>
          </div>

          <div class="btn">
          
            <button class="btn-trailer">XEM TRAILER</button>
            <div id="overlay"></div>
            <button class="btn-mua-ve" onclick="redirectToSchedule('.$rows['movie_id'].')">MUA VÉ</button>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</html>'; 
}
else { echo "Error 404";}
}
else { echo "Error 404";}
?>

<script>
//Mua vé
function redirectToSchedule(id) {

window.location.href = "schedule.php?id=" + id;
}

//Trailer

</script>
<style>
html {
        margin: 0px;
        padding: 0px;
    }
.detail-container {
    display: flex;
    width: 100%;
    margin-top: 28px;
    flex-direction: column;
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
  }
  @media (max-width: 991px) {
    .detail-head {
      max-width: 100%;
      margin-right: 12px;
    }
  }
  .detail-container-gen {
    align-self: center;
    margin-top: 50px auto;
    width: 90%;
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
      display: block;
      gap: 0px;
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
      display: block;
      margin: 0 auto;
      width: 70%;
      align-items: center;
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
      width: 90%;
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
      font-size: 18px;
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
      font-size: 20px;
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
  .content2{
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
    gap: 70px;
    font-size: 30px;
    text-align: center;
    line-height: 133%;
    margin: 100px 120px 0;
    justify-content: space-between;
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
    padding: 15px 15px;
    width: 15%;
    font-size: 22px;
  }
  .btn-mua-ve {
    font-family: Roboto, sans-serif;
    justify-content: center;
    border-radius: 12px;
    background-color: var(--Royal-Blue, #1a2c50);
    color: var(--Sunshine-Yellow, #ffbe00);
    flex-grow: 1;
    padding: 15px 15px;
    width: 15%;
    font-size: 22px;
  }
  #overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
  z-index: 9999; /* Ensure it appears above other elements */
  display: none; /* Initially hide the overlay */;
  align-items: center; /* Center vertically */
  justify-content: center; 
}
@media screen and (max-width: 768px) {
  iframe {
    width: 100%;
    height: auto;
  }
}
</style>
<script>
 
    
  document.addEventListener("DOMContentLoaded", function() {
  const btnTrailer = document.querySelector(".btn-trailer");
  const overlay = document.getElementById("overlay"); //gán biến overlay cho id overlay

  btnTrailer.addEventListener("click", function() {
    const trailerUrl = "<?php echo $rows['trailer_url']; ?>";
    const videoId = trailerUrl.split("v=")[1];  //trích xuất vid id
    // Tạo các thuộc tính của iframe dựa trên URL video
    const iframe = document.createElement("iframe");
    iframe.setAttribute("src", `https://www.youtube.com/embed/${videoId}?autoplay=1`);
    iframe.setAttribute("allowfullscreen", "");
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("width", "711");
    iframe.setAttribute("height", "400");
    iframe.style.position = "absolute";
    iframe.style.top = "50%";
    iframe.style.left = "50%";
    iframe.style.transform = "translate(-50%, -50%)";
    // Gắn iframe cho id overlay
    overlay.appendChild(iframe);

    // Hiển thị overlay
    overlay.style.display = "block";
  });

  // Đóng overlay khi click vào overlay
  if (overlay) {
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        overlay.style.display = "none";
        overlay.innerHTML = ""; // Xóa iframe khỏi overlay
      }
    });
  }
});

</script>