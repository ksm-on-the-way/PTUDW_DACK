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
        width: 46px;
        height: 46px;
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

    .schedule-left .line {}

    .schedule-left .line {
        background-color: var(--Shade-300, #bdc5d4);
        min-height: 1px;
        width: 100%;
    }

    @media (max-width: 991px) {
        .schedule-left .line {
            max-width: 100%;
        }
    }

    .schedule-right {
        width: 100%;
        height: 100%;

    }

    .schedule-filter {
        width: 100%;
        font-weight: 400;
        margin-top: 30px
    }

    @media (min-width: 768px) {
        .schedule-filter {
            margin-top: 50px;
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

    .schedule-right .film-order .address {
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
                        <div>Genre</div>
                        <div>Duration</div>
                        <div>Director</div>
                        <div>Rate</div>
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


    // Giải phóng bộ nhớ sau khi sử dụng
    giaiPhongBoNho($link, $result);
    ?>
    <?php
    include "header.php";
    ?>
    <div class='schedule-container'>
        <div class='schedule-left'>
            <div class="schedule-title">Schedule</div>
            <div class="schedule-desc">Pilih jadwal bioskop yang akan kamu tonton</div>

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
                <div class="name">GRAND INDONESIA CGV</div>
                <div class="address">Kamis, 16 Desember 2021</div>
                <div class="type">
                    <div class="name">REGULAR 2D</div>
                    <div class="time">14:40</div>
                </div>
                <div class="term">* Pemilihan kursi dapat dilakukan setelah ini</div>
                <div class="order">BELI SEKARANG</div>
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
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
    return date.getDate() + " " + monthNames[date.getMonth()];
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
        const dayNames = ["CN", "T2", "T3", "T4", "T5", "T6", "T7"];
        dayDiv.textContent = dayNames[dayOfWeek];
        scheduleBox.appendChild(dateDiv);
        scheduleBox.appendChild(dayDiv);
        scheduleBox.setAttribute('data-date', currentDate.getTime()); // Set data-date attribute

        scheduleBox.addEventListener('click', handleClickEvent); // Add click event listener

        scheduleContainer.appendChild(scheduleBox);

    }
    $('.carousel-schedule__container .owl-carousel').owlCarousel({
        margin: 24,

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
                items: 5
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

    // Prepare data to be sent
    var formData = new FormData();
    formData.append('action', 'getShowsByDate');
    formData.append('date', formattedDate);

    // AJAX request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(xhttp.responseText);
            if (response) {
                var scheduleContainer = document.querySelector('.schedule-picker__container');
                scheduleContainer.innerHTML = response;
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
};
</script>

</html>