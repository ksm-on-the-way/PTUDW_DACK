<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./owlcarousel/assets/owl.theme.default.min.css">
    <script src="./jquery.min.js"></script>
    <script src="./owlcarousel/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <style>
    .body {
        font-family: Roboto, sans-serif;
    }

    .schedule-container {

        width: 100%;
        margin: 0 auto;
    }

    @media (min-width: 768px) {
        .schedule-container {
            display: grid;
            grid-template-columns: 644px 1fr;
            column-gap: 100px;
            width: 1200px;

        }

    }

    .schedule-title {
        color: var(--Shade-900, #333);
        width: 100%;
        font: 700 36px Roboto, sans-serif;
    }

    @media (max-width: 991px) {
        .schedule-title {
            max-width: 100%;
        }
    }

    .schedule-desc {
        color: var(--Shade-600, #5a637a);
        margin-top: 32px;
        width: 100%;
        font: 400 16px/150% Roboto, sans-serif;
    }

    @media (max-width: 991px) {
        .schedule-desc {
            max-width: 100%;
        }
    }

    .schedule-box {
        justify-content: center;
        border-radius: 8px;
        border-color: rgba(90, 99, 122, 1);
        border-style: solid;
        border-width: 1px;
        background-color: var(--White, #fff);
        display: flex;
        flex-direction: column;
        width: fit-content;
        height: 54px;
        padding: 18px;
        margin-top: 20px;
    }

    .schedule-box:hover {
        background-color: #1A2C50;
    }

    .schedule-box.active {
        background-color: #1A2C50;

    }

    .schedule-box.active .date {

        color: white !important;
    }

    .schedule-box.active .day {

        color: white !important;
    }

    .schedule-box .date {
        text-align: center;
        color: var(--Shade-600, #5a637a);
        font: 500 15px Roboto, sans-serif;
    }

    .schedule-box .day {
        color: var(--Shade-900, #333);
        margin-top: 4px;
        font: 900 20px Roboto, sans-serif;
    }

    .carousel-schedule__container {
        width: 100% !important;
        position: relative;

    }

    .carousel-schedule__wrapper {
        padding: unset;
    }

    @media (min-width: 768px) {
        .carousel-schedule__wrapper {
            padding: 0px 62px;
        }
    }


    .carousel-schedule__container .owl-carousel {
        position: relative;
    }

    .carousel-schedule__container .owl-carousel .owl-stage {
        display: flex;
    }

    .carousel-schedule__container .owl-item {
        display: flex;
        justify-content: center;
        width: unset !important;

    }

    .carousel-schedule__container .owl-carousel .owl-nav .owl-prev,
    .owl-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 90;


    }

    .carousel-schedule__container .owl-carousel .owl-nav .owl-prev {
        left: -25px;
    }

    .carousel-schedule__container .owl-carousel .owl-nav .owl-next {
        right: -25px;
    }

    .schedule-left {
        /* width: calc(1200px - 412px - 100px); */
        width: 100%;
    }


    .schedule-left .line {
        margin-top: 20px;
        background-color: var(--Shade-300, #bdc5d4);
        min-height: 1px;
        width: 100%;
    }

    @media (max-width: 991px) {
        .schedule-left .line {
            max-width: 100%;
        }
    }

    .schedule-left .address-filter {
        max-width: 440px;
        margin-top: 20px;
        position: relative;

    }

    .schedule-left .address-filter .address-filter__container {
        width: fit-content;
        position: relative;
        cursor: pointer;
        align-items: center;
        display: flex;
        z-index: 30;
    }

    .schedule-left .address-filter .address-filter__container .location {
        text-transform: uppercase;
    }


    .schedule-left .address-filter img {
        aspect-ratio: 1;
        object-fit: auto;
        object-position: center;
        width: 32px;
        margin: auto 0;
    }

    .schedule-left .address-filter .address-item__container {
        position: absolute;
        display: none;
        gap: 20px;
        flex-wrap: wrap;
        padding: 0 20px;
        justify-content: center;
        padding-top: 60px;
        padding-bottom: 20px;
        max-width: 400px;
        background-color: #fff;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        z-index: 20;
        top: 0;
        transition: all 0.6s ease;
        /* Thêm transition vào đây */

    }



    .schedule-left .address-item__container.show {
        display: flex;
        top: -10px;

    }

    .schedule-left .address-filter .arrow-down-icon {
        display: block;
    }

    .schedule-left .address-filter .arrow-down-icon.show {
        display: none;
    }

    .schedule-left .address-filter .arrow-up-icon {
        display: none;
    }

    .schedule-left .address-filter .arrow-up-icon.show {
        display: block;
    }


    .schedule-left .address-filter .address-item__container .address-item {

        width: 90px;
        padding: 10px;
        text-align: center;
        background-color: #fff;
        border: 1px solid #000;
    }

    .schedule-left .address-filter .address-item__container .address-item:hover {
        background-color: #1A2C50;
        color: white;

    }

    .schedule-left .address-filter .address-item__container .address-item.active {
        background-color: #1A2C50;
        color: white;

    }


    .schedule-right {
        width: 100%;
        height: 100%;

    }

    .schedule-filter {
        width: 100%;
        font-weight: 400;
        margin-top: 10px
    }

    @media (min-width: 768px) {
        .schedule-filter {
            margin-top: 20px;
            display: flex;
            max-width: 644px;
        }

    }

    .filter-input {
        position: relative;
        align-self: start;
    }

    .filter-input input {
        align-self: start;
        display: flex;
        gap: 0px;
        font-size: 20px;
        color: #000;
        white-space: nowrap;
        height: 35px;
        outline: none;
        border-radius: 6px;
    }


    @media (max-width: 991px) {
        .filter-input input {
            white-space: initial;
            width: 100%;
            padding: 0;
        }
    }

    .img-search {
        aspect-ratio: 1;
        object-fit: auto;
        object-position: center;
        width: 32px;
        margin: auto 0;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 10px;
    }

    .schedule-filter .filter {
        display: flex;
        gap: 4px;
        font-size: 14px;
        white-space: nowrap;
        flex-grow: 1;
        flex-basis: auto;
        margin: auto 0;
        padding: 0 20px;
    }

    @media (max-width: 991px) {
        .schedule-filter .filter {
            white-space: initial;
            padding: 0;
            gap: 20px;
            margin-top: 15px;
        }
    }

    .schedule-filter .filter-item {
        box-shadow: 0px 1px 6px 0px rgba(0, 0, 0, 0.3);
        display: flex;
        gap: 8px;
        padding: 8px;
    }

    @media (max-width: 991px) {
        .schedule-filter .filter-item {
            white-space: initial;
        }
    }



    .schedule-filter .filter-item .icon {
        aspect-ratio: 1;
        object-fit: auto;
        object-position: center;
        width: 18px;
    }

    .schedule-right .film-container {
        display: flex;
        width: 100%;
        max-width: 413px;
        flex-direction: column;
    }

    @media (max-width: 991px) {
        .schedule-right .film-container {
            margin-top: 30px;
        }
    }

    .schedule-right .film-container .img {
        aspect-ratio: 1.14;
        object-fit: auto;
        object-position: center;
        width: 100%;
    }

    .schedule-right .film-container .name {
        color: var(--Shade-900, #333);
        margin-top: 55px;
        width: 100%;
        font: 500 24px/133% Roboto, sans-serif;
    }

    .schedule-right .film-container .detail-film {
        margin-top: 28px;
        width: 100%;
    }

    .schedule-right .film-container .detail-film__container {
        gap: 20px;
        display: flex;
    }

    @media (max-width: 991px) {
        .schedule-right .film-container .detail-film__container {

            align-items: stretch;
            gap: 0px;
        }
    }

    .schedule-right .film-container .detail-film__container .title,
    .schedule-right .film-container .detail-film__container .value {
        display: flex;
        flex-direction: column;
        row-gap: 10px;
        line-height: normal;
        width: 43%;
        margin-left: 0px;
        font-size: 16px;
        color: var(--Shade-900, #333);
        font-weight: 400;
    }

    @media (max-width: 991px) {

        .schedule-right .film-container .detail-film__container .title,
        .schedule-right .film-container .detail-film__container .value {
            width: 100%;
        }
    }

    .schedule-right .film-container .detail-film__container .value>div {
        flex: 1;
        max-height: 20px;
        overflow: hidden;
    }

    .schedule-right .film-order {
        margin-top: 50px;
        justify-content: center;
        border-radius: 12px;
        border-color: rgba(90, 99, 122, 1);
        border-style: solid;
        border-width: 1px;
        background-color: var(--White, #fff);
        display: flex;

        flex-direction: column;
        font-weight: 500;
        padding: 36px 24px;
        max-width: 370px !important;
    }

    .schedule-right .film-order .name {
        color: var(--Shade-900, #333);
        font: 700 28px Roboto, sans-serif;
    }

    .schedule-right .film-order .time {
        color: var(--Shade-600, #5a637a);
        margin-top: 29px;
        font: 18px Roboto, sans-serif;
    }

    .schedule-right .film-order .type {
        justify-content: space-between;
        display: flex;
        margin-top: 13px;
        gap: 20px;
        font-size: 24px;
        color: var(--Shade-900, #333);
        line-height: 133%;
    }

    .schedule-right .film-order .term {
        color: var(--Shade-400, #9da8be);
        margin-top: 24px;
        font: 400 12px Roboto, sans-serif;
    }

    .schedule-right .film-order .order {
        justify-content: center;
        border-radius: 8px;
        background-color: var(--Royal-Blue, #1a2c50);
        margin-top: 36px;
        color: var(--Sunshine-Yellow, #ffbe00);
        text-align: center;
        padding: 16px 12px;
        font: 24px/133% Roboto, sans-serif;
        text-transform: uppercase;
        cursor: pointer;
    }
    </style>
    <?php
    require_once './db_module.php';

    // Kết nối đến cơ sở dữ liệu
    $link = null;
    taoKetNoi($link);
    $movie_id = 25;
    $query = "SELECT m.movie_name, m.movie_duration, md.movie_director_name, mg.movie_genre_name, mr.movie_rate_name
            FROM movies m
            LEFT JOIN movie_directors md ON m.movie_director_id = md.movie_director_id
            LEFT JOIN movie_genres mg ON m.movie_genre_id = mg.movie_genre_id
            LEFT JOIN movie_rates mr ON m.movie_rate_id = mr.movie_rate_id
            WHERE m.movie_id = $movie_id";
    $result = chayTruyVanTraVeDL($link, $query);
    $film_container = "";
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $film_container = '
        <div class="film-container">
            <img loading="lazy" src="./images/film-detail1.png" class="img" />
            <div class="name">' . $row['movie_name'] . '</div>
            <div class="detail-film">
                <div class="detail-film__container">
                    <div class="title">
                        <div>Thể loại</div>
                        <div>Thời lượng</div>
                        <div>Đạo diễn</div>
                        <div>Độ tuổi</div>
                    </div>
                    <div class="value">
                        <div>' . $row['movie_genre_name'] . '</div>
                        <div>' . $row['movie_duration'] . '</div>
                        <div>' . $row['movie_director_name'] . '</div>
                        <div>' . $row['movie_rate_name'] . '</div>
                    </div>
                </div>
            </div>
        </div>';
    } else {
        // Nếu không có dữ liệu, hiển thị dòng thông báo
        $film_container .= "Không có dữ liệu";
    }

    // Truy vấn để lấy dữ liệu từ bảng cities
    $queryCity = "SELECT city_id, city_name FROM cities";
    $resultCity = chayTruyVanTraVeDL($link, $queryCity);

    // Mảng để lưu trữ các tùy chọn thành phố
    $htmlCity = "";

    // Kiểm tra xem truy vấn có thành công không
    if ($resultCity) {
        // Duyệt qua kết quả và tạo tùy chọn cho từng thành phố
        while ($row = mysqli_fetch_assoc($resultCity)) {
            $city_id = $row['city_id'];
            $city_name = $row['city_name'];
            $htmlCity .= "<div class='address-item' data-id='$city_id'>
            $city_name
        </div>";

        }


    } else {
        echo "Không thể lấy dữ liệu từ cơ sở dữ liệu.";
    }



    // Giải phóng bộ nhớ sau khi sử dụng
    giaiPhongBoNho($link, $result);
    ?>
    <?php
    include "header.php";
    ?>
    <div class='schedule-container'>
        <div class='schedule-left'>
            <div class="schedule-title">Lịch chiếu</div>
            <div class="schedule-desc">Chọn lịch chiếu phim bạn muốn xem</div>

            <div class='carousel-schedule__wrapper'>
                <div class='carousel-schedule__container'>
                    <div class="owl-carousel" id="schedule-carousel">
                        <!-- <div class="schedule-box">
                            <div class="date">15 Des</div>
                            <div class="day">RAB</div>
                        </div>
                        <div class="schedule-box">
                            <div class="date">15 Des</div>
                            <div class="day">RAB</div>
                        </div>
                        <div class="schedule-box">
                            <div class="date">15 Des</div>
                            <div class="day">RAB</div>
                        </div>
                        <div class="schedule-box">
                            <div class="date">15 Des</div>
                            <div class="day">RAB</div>
                        </div>
                        <div class="schedule-box">
                            <div class="date">15 Des</div>
                            <div class="day">RAB</div>
                        </div>
                        <div class="schedule-box">
                            <div class="date">15 Des</div>
                            <div class="day">RAB</div>
                        </div>
                        <div class="schedule-box">
                            <div class="date">15 Des</div>
                            <div class="day">RAB</div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="address-filter">
                <div class='address-filter__container' onclick='toggleAddressFilter()'>
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/acf2f9407bd2f78d3b82c23f23d53b213acf81bddb064781db34e9422db81152?"
                        class="location-icon" />

                    <div class="location">HỒ CHÍ MINH</div>
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/e492189f017ec2bc07a5f804b6c1aa40297b9b478d5945b992f8d885176ea783?"
                        class="arrow-down-icon" />
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/ac9b9726ebb0f6eb68e38f83ef0329e574536bc628c5ccf18a081b93b712b19a?"
                        class="arrow-up-icon" />
                </div>
                <div class='address-item__container'>
                    <?php echo $htmlCity; ?>
                </div>
            </div>
            <div class="schedule-filter">
                <div class='filter-input'>
                    <input />
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/9871662a97dcd33b7140a451d52b8a0b810d4e52b35d6f4e1d62332833a82584?"
                        class="img-search" />

                </div>
                <div class="filter">
                    <div class="filter-item">
                        <div class="title">Studio</div>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b5b8b88bcb1a0dda55b3497dff662b635a5e53102cf9d7eaa1e22ad65242b4eb?"
                            class="icon" />
                    </div>
                    <div class="filter-item">
                        <div class="title">Sortir</div>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b5b8b88bcb1a0dda55b3497dff662b635a5e53102cf9d7eaa1e22ad65242b4eb?"
                            class="icon" />
                    </div>
                    <div class="filter-item">
                        <div class="title">Bioskop</div>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b5b8b88bcb1a0dda55b3497dff662b635a5e53102cf9d7eaa1e22ad65242b4eb?"
                            class="icon" />
                    </div>
                </div>
            </div>

            <?php
            include "schedule-picker.php";
            ?>
        </div>
        <div class='schedule-right'>
            <!-- <div class="film-container">
                <img loading="lazy" srcset="./images/film-detail1.png" class="img" />
                <div class="name">SPIDERMAN : NO WAY HOME</div>
                <div class="detail-film">
                    <div class="detail-film__container">
                        <div class="title">
                            <div>Genre</div>
                            <div>Durasi</div>
                            <div>Sutradara</div>
                            <div>Rating Usia</div>
                        </div>
                        <div class="value">

                            <div>Action</div>
                            <div>2 jam 28 menit</div>
                            <div>Jon Watts</div>
                            <div>SU</div>

                        </div>
                    </div>
                </div>
            </div> -->
            <?php echo $film_container; ?>
            <div class="film-order">
                <div class="name"></div>
                <div class="time"></div>
                <div class="type">
                    <div class="name"></div>
                    <div class="time-show"></div>
                </div>
                <div class="term">* Bạn có thể chọn chỗ ngồi sau khi đã chọn thông tin phim</div>
                <div class="order">Mua ngay</div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>
<script>
// Function to get date in format DD MMM (e.g., 15 Apr)
function getFormattedDate(date) {
    const day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
    const month = date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1;
    return day + "/" + month;
}

// Function to render schedule boxes with dates greater than current date
function renderSchedule() {

    const today = new Date();
    const scheduleContainer = document.getElementById('schedule-carousel');
    console.log(scheduleContainer)
    scheduleContainer.innerHTML = ''; // Clear existing content

    // Loop through each day in the current month
    for (let i = today.getDate(); i <= new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate(); i++) {
        const currentDate = new Date(today.getFullYear(), today.getMonth(), i);
        const scheduleBox = document.createElement('div');
        scheduleBox.classList.add('schedule-box');
        const dateDiv = document.createElement('div');
        dateDiv.classList.add('date');
        dateDiv.textContent = getFormattedDate(currentDate);
        const dayDiv = document.createElement('div');
        dayDiv.classList.add('day');
        // Get the day of the week (0: Sunday, 1: Monday, ..., 6: Saturday)
        const dayOfWeek = currentDate.getDay();
        const dayNames = ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"];
        dayDiv.textContent = dayNames[dayOfWeek];
        scheduleBox.appendChild(dateDiv);
        scheduleBox.appendChild(dayDiv);
        scheduleBox.setAttribute('data-date', currentDate.getTime()); // Set data-date attribute

        scheduleBox.addEventListener('click', handleClickEvent); // Add click event listener

        scheduleContainer.appendChild(scheduleBox);

    }
    $('.carousel-schedule__container .owl-carousel').owlCarousel({

        margin: 20,
        navText: [
            "<i class='fas fa-chevron-left'></i>",
            "<i class='fas fa-chevron-right'></i>",
        ],
        nav: true,
        responsive: {
            0: {
                items: 3,
                nav: false
            },
            600: {
                items: 4,
            },

        }
    })
}
// Function to handle click event on schedule boxes
function handleClickEvent(event) {
    // Remove 'active' class from all schedule boxes
    const allScheduleBoxes = document.querySelectorAll('.schedule-box');
    allScheduleBoxes.forEach(function(box) {
        box.classList.remove('active');
    });

    // Add 'active' class to the clicked schedule box
    event.currentTarget.classList.add('active');

    // Get the date from the clicked schedule box
    const currentDate = new Date(parseInt(event.currentTarget.getAttribute('data-date')));
    const formattedDate = currentDate.toLocaleDateString('pt-br').split('/').reverse().join('-');
    localStorage.setItem('selectedSchedule', JSON.stringify(formattedDate));

    // Prepare data to be sent
    var formData = new FormData();
    formData.append('action', 'getShowsByDateAndLocation');
    formData.append('date', formattedDate);
    formData.append('city_id', 1)

    // AJAX request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(xhttp.responseText);
            if (response) {
                var scheduleContainer = document.querySelector('.schedule-picker__container');
                scheduleContainer.innerHTML = response;
                implementScriptSchedule();

            }
        }
    };
    xhttp.open("POST", "schedule-picker.php", true);
    xhttp.send(formData); // Send form data
}
// Call the render function when the page loads
window.onload = function() {
    renderSchedule();
    // Trigger click event on the first scheduleBox element
    document.querySelector('.schedule-box').click();
    var activeDateClass = document.querySelector('.schedule-box.active');
    const currentDate = new Date(parseInt(activeDateClass.getAttribute('data-date')));
    const formattedDate = currentDate.toLocaleDateString('pt-br').split('/').reverse().join('-');
    localStorage.setItem('selectedSchedule', JSON.stringify(formattedDate));
    implementScriptSchedule();

};
var container = document.querySelector('.address-item__container');
var filterContainer = document.querySelector('.address-filter__container');
var downArrow = filterContainer.querySelector('.arrow-down-icon');
var upArrow = filterContainer.querySelector('.arrow-up-icon');

document.addEventListener('click', function(event) {


    // Kiểm tra nếu phần tử được click không thuộc address-filter hoặc container
    if (!event.target.closest('.address-filter') && !container.contains(event.target)) {
        container.classList.remove('show');
        downArrow.classList.remove('show');
        upArrow.classList.remove('show');
    }
});
var addressItems = document.querySelectorAll('.address-item');
var locationText = document.querySelector('.address-filter__container .location');

addressItems.forEach(function(item) {
    item.addEventListener('click', function() {
        // Loại bỏ class 'active' từ tất cả các phần tử address-item
        addressItems.forEach(function(item) {
            item.classList.remove('active');
        });
        // Thêm class 'active' cho phần tử được click
        this.classList.add('active');
        locationText.textContent = '';
        locationText.textContent = this.textContent;
        // Prepare data to be sent
        var formData = new FormData();
        formData.append('action', 'getShowsByDateAndLocation');
        formData.append('date', JSON.parse(localStorage.getItem('selectedSchedule')) || null);
        formData.append('city_id', this.getAttribute('data-id'));


        // AJAX request
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(xhttp.responseText);
                if (response) {
                    var scheduleContainer = document.querySelector('.schedule-picker__container');
                    scheduleContainer.innerHTML = response;
                    implementScriptSchedule();
                }
            }
        };
        xhttp.open("POST", "schedule-picker.php", true);
        xhttp.send(formData); // Send form data


        toggleAddressFilter()
    });
});

function toggleAddressFilter() {

    container.classList.toggle('show');
    downArrow.classList.toggle('show');
    upArrow.classList.toggle('show');
}

function implementScriptSchedule() {
    var timeItems = document.querySelectorAll('.time-item');
    var orderNameCinema = document.querySelector('.film-order .name');
    var orderTime = document.querySelector('.film-order .time');
    var orderTypeNameCinema = document.querySelector('.film-order .type .name');
    var orderTimeShow = document.querySelector('.film-order .type .time-show');
    timeItems.forEach(function(item) {
        item.addEventListener('click', function() {

            // Bỏ active của những time-item khác
            timeItems.forEach(function(otherItem) {
                otherItem.classList.remove('active');
            });

            // Thêm class active cho time-item được click
            item.classList.add('active');


            orderTimeShow.textContent = item.textContent;
            // Lấy textContent của các thẻ name và cinema-name__container tương ứng
            var cinemaType = this.getAttribute('cinema-type-name')
            var cinemaName = this.getAttribute('cinema-name')
            orderTypeNameCinema.textContent = cinemaType;
            orderNameCinema.textContent = cinemaName;


            // Chuỗi ngày có định dạng yyyy-MM-dd
            var dateString = JSON.parse(localStorage.getItem('selectedSchedule')) || null;

            // Chuyển đổi chuỗi thành đối tượng Date
            var dateObj = new Date(dateString);

            // Mảng chứa các tên của các ngày trong tuần
            var dayNames = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];

            // Lấy thứ trong tuần từ đối tượng Date (0 là Chủ Nhật, 1 là Thứ Hai, ..., 6 là Thứ Bảy)
            var dayOfWeek = dateObj.getDay();

            // Chuyển đổi định dạng ngày thành "DD/MM/YYYY"
            var formattedDate = ('0' + dateObj.getDate()).slice(-2) + '/' + ('0' + (dateObj.getMonth() +
                1)).slice(-2) + '/' + dateObj.getFullYear();

            // Tạo chuỗi kết quả
            var result = dayNames[dayOfWeek] + ', ' + formattedDate;

            // In ra kết quả
            orderTime.textContent = result;

            var showObject = {
                order_date: JSON.parse(localStorage.getItem('selectedSchedule')),
                show_time: item.textContent,
                theater_name: cinemaName,
                type_room_name: cinemaType
            }
            localStorage.setItem('selectedShow', JSON.stringify(showObject));


        });
    });
    if (document.querySelector('.time-item') != null) {
        document.querySelector('.time-item').click();
    }


}
</script>

</html>