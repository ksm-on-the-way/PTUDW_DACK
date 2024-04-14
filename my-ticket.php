<?php include_once './header.php'; ?>
<style>
.ticket-validity {
    display: flex;
    gap: 16px;
    color: #333;
    padding: 0 20px;
    align-items: center;
    margin-top: 10px;
}

.ticket-validity:hover {
    cursor: pointer;
}

.icon {
    width: 32px;
    height: 32px;
    object-fit: contain;
}

.validity-text {
    font-family: Roboto, sans-serif;
    font-size: 18px;
    font-weight: 500;
}

.separator {
    height: 1px;
    width: 100%;
    background-color: #dadfe8;
    margin: 10px 0;
}

.transaction-list {
    display: flex;
    gap: 16px;
    color: #118eea;
    padding: 0 20px;
    align-items: center;
}

.transaction-list:hover {
    cursor: pointer;
}

.list-text {
    font-family: Roboto, sans-serif;
    font-size: 18px;
    font-weight: 500;
}

.my-ticket-content-header {
    display: flex;
    flex-direction: column;
    padding: 0 20px;
    font-size: 16px;
    font-weight: 400;
    margin-bottom: 39px;
}

.ticket-title {
    width: 100%;
    margin-top: 24px;
    color: #333;
    font: 500 24px/133% Roboto, sans-serif;
}

.ticket-description {
    width: 100%;
    margin-top: 0rem;
    color: #5a637a;
    font-family: Roboto, sans-serif;
}

.ticket-options {
    display: flex;
    gap: 18px;
    margin-top: 22px;
}

.movie-option {
    padding: 12px 20px;
    color: #118eea;
    font-family: Roboto, sans-serif;
    white-space: nowrap;
    border: 1px solid #118eea;
    border-radius: 23px;
    justify-content: center;
}

.promo-option {
    padding: 12px 20px;
    color: #333d58;
    font-family: Roboto, sans-serif;
    border: 1px solid #333d58;
    border-radius: 23px;
    justify-content: center;
}

.ticket-container {
    justify-content: space-between;
    align-self: stretch;
    max-width: 768px;
    margin: 30px 0px;
}

.ticket-content {
    gap: 20px;
    display: flex;
}

@media (max-width: 991px) {
    .ticket-content {
        flex-direction: column;
        align-items: stretch;
        gap: 0;
    }
}

.ticket-details {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 81%;

}

@media (max-width: 991px) {
    .ticket-details {
        width: 100%;
    }
}

.ticket-info {
    flex-grow: 1;
}

@media (max-width: 991px) {
    .ticket-info {
        max-width: 100%;
    }
}

.ticket-layout {
    gap: 20px;
    display: flex;
}

@media (max-width: 991px) {
    .ticket-layout {
        flex-direction: column;
        align-items: stretch;
        gap: 0;
    }
}

.movie-poster {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 29%;
    margin-left: 0;
}

@media (max-width: 991px) {
    .movie-poster {
        width: 100%;
    }
}

.poster-image {
    aspect-ratio: 0.67;
    object-fit: cover;
    object-position: center;
    width: 135px;
    max-width: 100%;
    flex-grow: 1;
}

@media (max-width: 991px) {
    .poster-image {
        margin-top: 40px;
    }
}

.movie-info {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 71%;
}

@media (max-width: 991px) {
    .movie-info {
        width: 100%;
    }
}

.movie-details {
    display: flex;
    flex-direction: column;
    align-self: stretch;
    margin: auto 0;
}

@media (max-width: 991px) {
    .movie-details {
        margin-top: 40px;
    }
}

.movie-header {
    display: flex;
    flex-direction: column;
    padding: 0 20px;
}

.movie-title {
    color: var(--Shade-900, #333);
    font: 500 24px/133% Roboto, sans-serif;
}

.movie-datetime {
    color: var(--Shade-700, #414a63);
    margin-top: 12px;
    font: 400 16px Roboto, sans-serif;
}

.movie-location {
    align-items: center;
    display: flex;
    margin-top: 24px;
    gap: 5px;
    font-size: 16px;
    padding: 0 20px;
}

.location-icon {
    aspect-ratio: 1;
    object-fit: contain;
    object-position: center;
    width: 32px;
    align-self: stretch;
}

.cinema-name {
    color: var(--Shade-400, #9da8be);
    font-family: Roboto, sans-serif;
    font-weight: 400;
    line-height: 150%;
    align-self: stretch;
    margin: auto 0;
}

.cinema-type {
    color: var(--Shade-700, #414a63);
    font-family: Roboto, sans-serif;
    font-weight: 500;
    align-self: stretch;
    margin: auto 0;
}

.ticket-status {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 19%;
    margin-left: 20px;
}

@media (max-width: 991px) {
    .ticket-status {
        width: 100%;
        margin-left: unset;
    }
}

.status-label {
    display: flex;
    border-radius: 4px;
    background-color: var(--Sky-blue, #118eea);
    align-self: stretch;
    color: var(--Shade-200, #dadfe8);
    width: 100%;
    justify-content: center;
    margin: auto 0;
    padding: 10px 24px;
    font: 500 16px Roboto, sans-serif;
}

@media (max-width: 991px) {
    .status-label {
        margin-top: 40px;
        padding: 0 20px;
        width: unset;
    }
}

body {
    margin: 0;
}

.my-ticket-container {
    display: grid;
    grid-template-columns: 313px 1fr;
    column-gap: 88px;
}

.my-ticket-sidebar {
    background-color: #f5f5f5;
    margin-top: 1rem;
}

.my-ticket-content-header {
    padding: 0;
}

.menu-item-active {
    color: #118eea;
}

.menu-item-default {
    color: #333;
}


@media (max-width: 767px) {

    .my-ticket-container {
        grid-template-columns: 1fr;
        column-gap: 0;
        padding: 0 2em;
    }

    .my-ticket-content {
        margin-top: 20px;
    }

    .poster-image {
        width: 100%;
    }

    .movie-poster {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ticket-details {
        margin-top: -3rem;
    }

}


@media (min-width: 768px) {
    .my-ticket-sidebar {
        min-width: 313px;
    }


}
</style>
<div class="my-ticket-container">
    <div class="my-ticket-sidebar">
        <div class="ticket-info">
            <div class="ticket-validity" onclick="redirectTo('ticket-validity')">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/434531a98bee73d39a6db8c48649ae17affa61d2d4c4af5d07af0bbd1400fd72?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&"
                    alt="" class="icon" />
                <p
                    class="validity-text <?php echo isset($_GET['handle']) && ($_GET['handle'] == 'ticket-validity') || !isset($_GET['handle']) ? 'menu-item-active' : 'menu-item-default'; ?>">
                    VÉ CÒN HIỆU LỰC</p>
            </div>
            <div class="separator"></div>
            <div class="transaction-list" onclick="redirectTo('transaction-list')">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ce9c06e26de6424759bdd0fb88770a28c1cde34e26ad6c76667a9aed0aaccbd9?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&"
                    alt="" class="icon" />
                <p
                    class="list-text <?php echo isset($_GET['handle']) && ($_GET['handle'] == 'transaction-list') ? 'menu-item-active' : 'menu-item-default'; ?>">
                    DANH SÁCH GIAO DỊCH</p>
            </div>
            <div class="separator"></div>
        </div>
    </div>
    <div class="my-ticket-content">
        <div class="my-ticket-content-header">
            <h2 class="ticket-title">Vé của tôi</h2>
            <p class="ticket-description">Danh sách vé và giao dịch bạn đã thực hiện</p>
            <div class="ticket-options">
                <button class="movie-option">Phim</button>
                <button class="promo-option">Mã khuyến mãi</button>
            </div>
        </div>

        <?php
        if (!isset($_SESSION['userid'])) {
            echo '<script>
            var confirmIntoPage = confirm("Bạn cần đăng nhập trước khi xem vé. Bạn có muốn đăng nhập không?");
            if(confirmIntoPage) {
                window.location.href = "login.php"
            } else {
                window.location.href = "homepage.php"
            }

            </script>';
        }
        $userid = $_SESSION['userid'];
        require_once './db_module.php';
        $link = null;
        taoKetNoi($link);

        // Số lượng dòng trên mỗi trang
        $rowsPerPage = 4;

        // Lấy trang hiện tại từ biến currentPage
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $startRow = ($currentPage - 1) * $rowsPerPage;
        if (isset($_GET['handle']) && $_GET['handle'] == 'transaction-list') {
            $query = "SELECT m.movie_id, m.movie_name, s.date, s.start_time, t.theater_name, rt.room_type_name, rsv.reservation_id
            FROM reservations rsv
            LEFT JOIN shows s ON rsv.show_id = s.show_id
            LEFT JOIN movies m ON s.movie_id = m.movie_id
            LEFT JOIN rooms rm ON rm.room_id = s.room_id
            LEFT JOIN room_types rt ON rm.room_type_id = rt.room_type_id
            LEFT JOIN theaters t ON rm.theater_id = t.theater_id
            WHERE rsv.user_id = $userid
            ORDER BY rsv.reservation_id DESC
            LIMIT $startRow, $rowsPerPage";
        } else {
            $query = "SELECT m.movie_id, m.movie_name, s.date, s.start_time, t.theater_name, rt.room_type_name, rsv.reservation_id
            FROM reservations rsv
            LEFT JOIN shows s ON rsv.show_id = s.show_id
            LEFT JOIN movies m ON s.movie_id = m.movie_id
            LEFT JOIN rooms rm ON rm.room_id = s.room_id
            LEFT JOIN room_types rt ON rm.room_type_id = rt.room_type_id
            LEFT JOIN theaters t ON rm.theater_id = t.theater_id
            WHERE rsv.user_id = $userid AND (s.date > CURRENT_DATE() OR (s.date = CURRENT_DATE() AND s.start_time > NOW()))
            ORDER BY rsv.reservation_id DESC
            LIMIT $startRow, $rowsPerPage";
        }


        $queryCount = "SELECT COUNT(*) AS total FROM (SELECT m.movie_name, s.date, s.start_time, t.theater_name, rt.room_type_name
            FROM reservations rsv
            LEFT JOIN shows s ON rsv.show_id = s.show_id
            LEFT JOIN movies m ON s.movie_id = m.movie_id
            LEFT JOIN rooms rm ON rm.room_id = s.room_id
            LEFT JOIN room_types rt ON rm.room_type_id = rt.room_type_id
            LEFT JOIN theaters t ON rm.theater_id = t.theater_id
            WHERE rsv.user_id = $userid
            ORDER BY rsv.reservation_id DESC) as subtable";
        $resultCount = chayTruyVanTraVeDL($link, $queryCount);
        $rowCount = mysqli_fetch_assoc($resultCount);
        $totalPages = ceil($rowCount['total'] / $rowsPerPage);

        $result = chayTruyVanTraVeDL($link, $query);

        $content_body = "";

        ?>


        <div class="my-ticket-content-body">
            <?php
            if (mysqli_num_rows($result) > 0) {
                // Bắt đầu vòng lặp để xây dựng chuỗi HTML
                while ($row = mysqli_fetch_assoc($result)) {

                    $queryBanner = "SELECT image_url from movie_banner_images WHERE movie_id =" . $row['movie_id'];
                    $resultBanner = chayTruyVanTraVeDL($link, $queryBanner);
                    $imageurl = "";
                    while ($rowBanner = mysqli_fetch_assoc($resultBanner)) {
                        $imageurl = $rowBanner['image_url'];
                    }
                    $content_body .= "<div class='ticket-container'>";
                    $content_body .= "<div onclick='viewDetail(" . $row['reservation_id'] . ")' class='ticket-content'>";
                    $content_body .= "<div class='ticket-details'>";
                    $content_body .= "<div class='ticket-info'>";
                    $content_body .= "<div class='ticket-layout'>";
                    $content_body .= "<div class='movie-poster'>";
                    $content_body .= "<img src='" . "$imageurl" . "' alt='banner' class='poster-image' />";
                    $content_body .= "</div>";
                    $content_body .= "<div class='movie-info'>";
                    $content_body .= "<div class='movie-details'>";
                    $content_body .= "<div class='movie-header'>";
                    $content_body .= "<h2 class='movie-title'>" . $row['movie_name'] . "</h2>";
                    $content_body .= "<p class='movie-datetime'>" . $row['date'] . ", " . $row['start_time'] . "</p>";
                    $content_body .= "</div>";
                    $content_body .= "<div class='movie-location'>";
                    $content_body .= "<img src='https://cdn.builder.io/api/v1/image/assets/TEMP/b6c6ae098c0909f905d3ee7419ca93a45a3590b9236f0f372575964103f3460e?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&' alt='' class='location-icon' />";
                    $content_body .= "<p class='cinema-name'>" . $row['theater_name'] . "</p>";
                    $content_body .= "<p class='cinema-type'>(" . $row['room_type_name'] . ")</p>";
                    $content_body .= "</div>";
                    $content_body .= "</div>";
                    $content_body .= "</div>";
                    $content_body .= "</div>";
                    $content_body .= "</div>";
                    $content_body .= "</div>";
                    $content_body .= "<div class='ticket-status'>";
                    if (isset($_GET['handle']) && $_GET['handle'] == 'transaction-list') {
                        $content_body .= "<div class='status-label'>Thành công</div>";
                    }
                    $content_body .= "</div>";
                    $content_body .= "</div>";
                    $content_body .= "</div>";
                    $content_body .= "<div class='separator'></div>";
                }
                echo $content_body;
            } else {
                // Nếu không có dữ liệu, hiển thị dòng thông báo
                $content_body .= "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
            }
            ?>
            <div>
                <?php include_once './pagination.php'; ?>
            </div>
        </div>
    </div>

</div>
<?php include './footer.php'; ?>
<script>
function redirectTo(handle) {
    window.location.href = 'my-ticket.php?handle=' + handle;
}

function viewDetail(id) {
    window.location.href = 'transaction-detail.php?reservation_id=' + id;
}
</script>