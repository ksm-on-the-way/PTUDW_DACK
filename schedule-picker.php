<?php
require_once './db_module.php';

// Kết nối đến cơ sở dữ liệu
$link = null;
taoKetNoi($link);


$html = '';
$previousRoomTypeName = '';
$previousTheater = '';
if (isset($_POST['action']) && $_POST['action'] === 'getShowsByDateAndLocation') {


    // Lấy dữ liệu từ POST request
    $date = $_POST['date'];
    $city_id = $_POST['city_id'];
    $input_value = isset($_POST['input_value']) ? $_POST['input_value'] : '';


    // Prepare and execute the SQL query
    $query = '';
    if ($input_value !== '') {
        $query = "SELECT theaters.theater_name, theaters.theater_address, room_types.room_type_name, room_types.room_price, shows.start_time
        FROM shows
        LEFT JOIN rooms ON shows.room_id = rooms.room_id
        LEFT JOIN theaters ON rooms.theater_id = theaters.theater_id
        LEFT JOIN room_types ON rooms.room_type_id = room_types.room_type_id 
        WHERE shows.date = '$date' AND theaters.city_id = $city_id  AND shows.movie_id = 25  AND theaters.theater_name LIKE '%$input_value%'
        ORDER BY theaters.theater_name, room_types.room_type_name;
        ";
    } else {
        $query = "SELECT theaters.theater_name, theaters.theater_address, room_types.room_type_name, room_types.room_price, shows.start_time
        FROM shows
        LEFT JOIN rooms ON shows.room_id = rooms.room_id
        LEFT JOIN theaters ON rooms.theater_id = theaters.theater_id
        LEFT JOIN room_types ON rooms.room_type_id = room_types.room_type_id 
        WHERE shows.date = '$date' AND theaters.city_id = $city_id  AND shows.movie_id = 25
        ORDER BY theaters.theater_name, room_types.room_type_name;
        ";
    }

    $result = chayTruyVanTraVeDL($link, $query);

    if ($result->num_rows > 0) {

        // Xuất dữ liệu ra HTML
        while ($row = $result->fetch_assoc()) {

            //nếu theater_name hiện tại khác với theater_name trước đó thì render theater_name
            if ($row["theater_name"] != $previousTheater) {
                if ($previousTheater != '') {
                    $html .= '</div>'; // Kết thúc thẻ div thằng time-container vì có thể trùng room_type mà khác theater_name
                }
                $html .= '<div class="title-container">';
                $html .= '<div class="cinema-name__container">';
                $html .= '<img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/96ed6622c9dba11b0894363b2f38395ed612e9461e4aede93f19c5c1bcb78cac?" class="img" />';
                $html .= '<div class="name">' . $row["theater_name"] . '</div>';
                $html .= '</div>';
                $html .= '<div class="cinema-address">' . $row["theater_address"] . '</div>';
                $html .= '</div>';
            }
            // Cập nhật theater_name trước đó với theater_name hiện tại



            // Nếu room_type_name hiện tại khác với room_type_name trước đó, render room_type_name mới
            if ($row["theater_name"] != $previousTheater || $row["room_type_name"] != $previousRoomTypeName) {
                // Nếu room_type_name trước đó không rỗng, kết thúc thẻ div trước đó
                if ($previousRoomTypeName != '') {
                    $html .= '</div>'; // Kết thúc thẻ div cho room_type_name trước đó
                }

                $html .= '<div class="cinema-type">';
                $html .= '<div class="name">' . $row["room_type_name"] . '</div>';
                $html .= '<div class="price">' . number_format($row["room_price"], 0, ',', '.') . ' VNĐ</div>';
                $html .= '</div>';
                $html .= '<div class="time-container">';
            }
            // Xuất start_time
            $html .= '<div class="time-item" cinema-type-name="' . $row["room_type_name"] . '" cinema-name="' . $row["theater_name"] . '">' . substr($row["start_time"], 0, 5) . '</div>';
            $previousTheater = $row["theater_name"];
            // Cập nhật room_type_name trước đó với room_type_name hiện tại
            $previousRoomTypeName = $row["room_type_name"];

        }

    } else {
        $html .= "Không có dữ liệu";
    }
    echo json_encode($html); // Trả về một JSON phản hồi
    exit;
}


// Giải phóng bộ nhớ sau khi sử dụng
giaiPhongBoNho($link, $result);

?>

<div class="schedule-picker__container">
    <!-- <div class="title-container">
        <div class="cinema-name__container">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/96ed6622c9dba11b0894363b2f38395ed612e9461e4aede93f19c5c1bcb78cac?"
                class="img" />
            <div class="name">GRAND INDONESIA CGV</div>
        </div>
        <div class="cinema">CGV</div>
    </div>
    <div class="cinema-address">JL. MH. TAHMRIN NO.1</div>
    <div class="cinema-type">
        <div class="name">REGULAR 2D</div>
        <div class="price">Rp. 45.000 - 50.000</div>
    </div>
    <div class="time-container">
        <div class="time-item">11:00</div>
        <div class="time-item">13:45</div>
        <div class="time-item">14:40</div>
        <div class="time-item">15:40</div>
        <div class="time-item">17:15</div>
        <div class="time-item">18:15</div>
        <div class="time-item">20:00</div>
        <div class="time-item">21:00</div>
    </div>
    <div class="cinema-type">
        <div class="name">GOLD CLASS 2D</div>
        <div class="price">Rp. 100.000</div>
    </div>
    <div class="time-container">
        <div class="time-item">11:00</div>
        <div class="time-item">13:45</div>
        <div class="time-item">14:40</div>
        <div class="time-item">15:40</div>
        <div class="time-item">17:15</div>
        <div class="time-item">18:15</div>
        <div class="time-item">20:00</div>
        <div class="time-item">21:00</div>
    </div> -->

</div>

<style>
body {
    font-family: Roboto, sans-serif;
}

.schedule-picker__container {
    display: flex;
    max-width: 638px;
    flex-direction: column;
    margin-top: 42px;
}

.schedule-picker__container .title-container {
    justify-content: space-between;
    display: flex;
    width: 100%;
    gap: 20px;
    margin-top: 10px;
}

@media (max-width: 991px) {
    .schedule-picker__container .title-container {
        max-width: 100%;
        flex-wrap: wrap;
    }
}

.schedule-picker__container .title-container .cinema-name__container {
    display: flex;
    padding-right: 20px;
    gap: 16px;
    font-size: 24px;
    color: var(--Shade-900, #333);
    font-weight: 500;
    line-height: 133%;
}

.schedule-picker__container .title-container .cinema-name__container .img {
    aspect-ratio: 1;
    object-fit: auto;
    object-position: center;
    width: 32px;
}



.schedule-picker__container .title-container .cinema {
    justify-content: center;
    border-radius: 4px;
    background-color: #EC1E2B;
    color: var(--Shade-100, #fff);
    white-space: nowrap;
    text-align: center;
    margin: auto 0;
    padding: 6px 8px;
    font: 700 12px Roboto, sans-serif;
}

@media (max-width: 991px) {
    .schedule-picker__container .title-container .cinema {
        white-space: initial;
    }
}

.schedule-picker__container .cinema-address {
    color: var(--Shade-600, #5a637a);
    margin-top: 18px;
    width: fit-content;
    font: 400 16px/150% Roboto, sans-serif;
}

@media (max-width: 991px) {
    .sch edule-picker__container .cinema-address {
        max-width: 100%;
    }
}

.schedule-picker__container .cinema-type {
    justify-content: space-between;
    display: flex;
    margin-top: 24px;
    width: 100%;
    gap: 20px;
    color: var(--Shade-600, #5a637a);

}

@media (max-width: 991px) {
    .schedule-picker__container .cinema-type {
        max-width: 100%;
        flex-wrap: wrap;
    }
}

.schedule-picker__container .cinema-type .name {
    font: 500 24px/133% Roboto, sans-serif;
}

.schedule-picker__container .cinema-type .price {
    text-align: right;
    margin: auto 0;
    font: 400 18px/156% Roboto, sans-serif;
}

.schedule-picker__container .time-container {
    align-self: start;
    display: flex;
    margin-top: 16px;
    max-width: 362px;
    flex-wrap: wrap;
    gap: 18px;
    font-size: 14px;
    color: var(--Shade-400, #9da8be);
    font-weight: 700;
    white-space: nowrap;

}

@media (max-width: 991px) {
    .schedule-picker__container .time-container {
        white-space: initial;
    }
}

.schedule-picker__container .time-item {
    font-family: Roboto, sans-serif;
    justify-content: center;
    border-radius: 4px;
    /* background-color: var(--Shade-200, #dadfe8); */
    background-color: #fff;
    color: black;
    font-weight: 500;
    border: 1px solid #9DA8BE;
    cursor: pointer;
    padding: 12px 20px;
}

.schedule-picker__container .time-item:hover {
    background-color: #1A2C50;
    color: white;
}

.schedule-picker__container .time-item.active {
    background-color: #1A2C50;
    color: white;
}


@media (max-width: 991px) {
    .schedule-picker__container .time-item {
        white-space: initial;
    }
}
</style>