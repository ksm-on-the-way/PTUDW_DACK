<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <style>
    body {
        font-family: Roboto, sans-serif;
    }

    .choosing-seat__container {
        width: 100%;
        margin: 0 auto;
    }

    @media (min-width: 768px) {
        .choosing-seat__container {
            width: 1300px;
            margin: 0 auto;
        }
    }

    .choosing-seat__container .title {
        color: var(--Shade-900, #333);
        width: 100%;
        font: 700 36px Roboto, sans-serif;
    }

    .choosing-seat__container .description {
        color: var(--Shade-600, #5a637a);
        margin-top: 16px;
        width: 100%;
        font: 400 16px/150% Roboto, sans-serif;
    }

    @media (min-width: 768px) {
        .choosing-seat__container .description {
            margin-top: 32px;
        }
    }

    .choosing-seat__container .heading {

        width: 100%;

    }

    @media (min-width: 768px) {
        .choosing-seat__container .heading {
            display: flex;
            align-items: center;
            width: 1100px;
            margin: 0 auto;
            justify-content: space-between;
        }
    }

    .choosing-seat__container .heading .time-picker {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
        gap: 0 10px;
    }

    .choosing-seat__container .heading .time-picker .time {
        font-size: 24px;
    }

    .choosing-seat__container .heading .seat-status {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0 20px;
    }

    @media (max-width: 991px) {
        .choosing-seat__container .heading .seat-status {
            margin-top: 15px;
        }
    }

    .choosing-seat__container .heading .seat-status .item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0 12px;
    }

    .choosing-seat__container .heading .seat-status .item .status {
        border-color: rgba(157, 168, 190, 1);
        border-style: solid;
        border-width: 1px;
        background-color: #fff;
        width: 16px;
        height: 16px;
    }

    .choosing-seat__container .heading .seat-status .item .status.choose {
        background-color: #118EEA;

    }

    .choosing-seat__container .heading .seat-status .item .status.choosing {
        background-color: #1A2C50;
        color: white;
    }

    .choosing-seat__container .heading .seat-status .item .status.choosingByOther {
        background-color: yellow;

    }



    .seat-container {
        width: 100%;
        margin-top: 30px;
    }

    @media (min-width: 768px) {
        .seat-container {
            width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 80px;
            margin-top: 50px;
        }
    }

    .seat-container .seat-left,
    .seat-container .seat-right {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 12px;
    }

    @media (min-width: 768px) {

        .seat-container .seat-left,
        .seat-container .seat-right {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }
    }

    .seat-container .seat-item {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        width: 32px;
        height: 30px;
        padding: 10px;
        border-radius: 6px;
        border-color: rgba(157, 168, 190, 1);
        border-style: solid;
        border-width: 1px;
        cursor: pointer;
    }

    .seat-container .seat-item:hover {
        background: #1A2C50;
        color: white;
    }

    .seat-container .seat-item.chose {
        background: #118EEA;
        pointer-events: none;
    }

    .seat-container .seat-item.choosing {
        background: #1A2C50;
        color: white;
    }

    .seat-container .seat-item.choosingByOther {
        background: yellow;
        pointer-events: none;

    }


    body {
        margin: 0;
        padding: 0;
    }

    .seat-footer__container {

        display: flex;
        flex-direction: column;
        margin-top: 50px;
    }

    .seat-footer__container .title {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--Sky-blue, #118eea);
        width: 100%;
        color: var(--Shade-200, #dadfe8);
        padding: 19px 0px;
        font: 700 24px Roboto, sans-serif;
    }

    @media (max-width: 991px) {
        .seat-footer__container .title {
            max-width: 100%;

        }
    }

    .seat-footer__container .seat-info {
        align-self: center;
        display: flex;
        margin-top: 64px;
        width: 100%;
        max-width: 1097px;
        align-items: center;
        gap: 20px;
        justify-content: space-between;

    }

    @media(min-width: 768px) {
        .seat-footer__container .seat-info {

            padding: 0 20px;
        }
    }

    @media (max-width: 991px) {
        .seat-footer__container .seat-info {
            max-width: 100%;
            flex-wrap: wrap;
            margin-top: 40px;
        }
    }

    .seat-footer__container .price-info {
        align-self: stretch;
        display: flex;
        flex-direction: column;
        margin: auto 0;
    }

    /* .div-5 {
    color: var(--Shade-600, #5a637a);
    font: 500 18px Roboto, sans-serif;
        } */

    .seat-footer__container .price-info .price {
        color: var(--Shade-900, #333);
        margin-top: 23px;
        font: 700 26px Roboto, sans-serif;
    }

    @media (min-width: 768px) {
        .seat-footer__container .price-info .price {

            font: 700 36px Roboto, sans-serif;
        }
    }

    .seat-footer__container .seat-chose {
        align-self: stretch;
        display: flex;
        flex-direction: column;
    }

    /* .div-8 {
    color: var(--Shade-600, #5a637a);
    font: 500 18px Roboto, sans-serif;
        } */

    .seat-footer__container .seat-chose .seat-number {
        color: var(--Shade-900, #333);
        margin-top: 16px;
        font: 700 26px/128% Roboto, sans-serif;
    }

    @media (min-width: 768px) {
        .seat-footer__container .seat-chose .seat-number {

            font: 700 36px/128% Roboto, sans-serif;
        }
    }

    .seat-footer__container .confirm-container {
        align-self: stretch;
        display: flex;
        gap: 20px;
        font-size: 20px;
        font-weight: 500;
        white-space: nowrap;
        text-align: center;
        justify-content: space-between;
        margin: auto 0;
    }

    @media (max-width: 991px) {
        .seat-footer__container .confirm-container {
            flex-wrap: wrap;
            white-space: initial;
        }
    }

    .seat-footer__container .confirm-container .confirm-button {
        font-family: Roboto, sans-serif;
        justify-content: center;
        border-radius: 5.067px;
        border-color: rgba(90, 99, 122, 1);
        border-style: solid;
        border-width: 1px;
        padding: 12px 8px;
    }

    .seat-footer__container .confirm-container .confirm-button.back {
        background-color: var(--White, #fff);
        color: var(--Shade-600, #5a637a);
        cursor: pointer
    }

    .seat-footer__container .confirm-container .confirm-button.confirm {
        background-color: var(--Royal-Blue, #1a2c50);
        color: var(--Sunshine-Yellow, #ffbe00);
        cursor: pointer
    }
    </style>
    <?php
    // Kiểm tra xem session 'isLogin' tồn tại và có giá trị true hay không
    // $account = '';
    // if (isset($_SESSION)) {
    //     $account .= '<div>';
    //     $account .= '    Tài khoản đang đăng nhập: ' . $_SESSION['email'];
    //     $account .= '</div>';
    
    // }
    ?>
    <?php
    require_once './db_module.php';

    // Kết nối đến cơ sở dữ liệu
    $link = null;
    taoKetNoi($link);
    // Lấy show_id từ định danh nào đó (ví dụ: show_id = 1)
    $show_id = isset($_GET['show_id']) ? $_GET['show_id'] : 1;



    // Truy vấn để lấy room_id và room_type_id dựa vào show_id
    $sql = "SELECT s.room_id, r.room_type_id 
            FROM shows s
            INNER JOIN rooms r ON s.room_id = r.room_id
            WHERE s.show_id = $show_id";
    $result = chayTruyVanTraVeDL($link, $sql);
    $seat_container = '';
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $room_id = $row["room_id"];
        $room_type_id = $row["room_type_id"];

        // Truy vấn để lấy room_price từ bảng room_types dựa vào room_type_id
        $sql = "SELECT room_price FROM room_types WHERE room_type_id = $room_type_id";
        $room_price_result = chayTruyVanTraVeDL($link, $sql);
        $room_price_row = $room_price_result->fetch_assoc();
        $room_price = $room_price_row["room_price"];

        // Truy vấn để lấy danh sách ghế dựa vào room_id
        $sql = "SELECT seat_id, seat_name FROM seats WHERE room_id = $room_id AND is_deleted = '0'";
        $result = chayTruyVanTraVeDL($link, $sql);


        if ($result->num_rows > 0) {
            $left_seats = [];
            $right_seats = [];
            $halfway_point = ceil($result->num_rows / 2); // Điểm chia làm tròn lên
    
            // Chia danh sách ghế thành hai phần bên trái và bên phải
            $index = 0;
            while ($row = $result->fetch_assoc()) {
                if ($index < $halfway_point) {
                    $left_seats[] = $row;
                } else {
                    $right_seats[] = $row;
                }
                $index++;
            }

            // Lấy tất cả reservation_id dựa vào show_id
            $sql = "SELECT reservation_id FROM reservations WHERE show_id = $show_id";
            $reservation_result = chayTruyVanTraVeDL($link, $sql);

            // Mảng lưu trữ tất cả các seat_id đã được chọn
            $chosen_seats = [];

            // Duyệt qua từng reservation_id
            while ($reservation_row = $reservation_result->fetch_assoc()) {
                $reservation_id = $reservation_row['reservation_id'];

                // Lấy tất cả các seat_id từ bảng reservation_details
                $sql = "SELECT seat_id FROM reservation_details WHERE rsv_id = $reservation_id";
                $seat_result = chayTruyVanTraVeDL($link, $sql);

                // Thêm các seat_id vào mảng chosen_seats
                while ($seat_row = $seat_result->fetch_assoc()) {
                    $chosen_seats[] = $seat_row['seat_id'];
                }
            }

            // Render HTML
            $seat_container = "<div class='seat-container'>";

            // Thêm phần bên trái
            $seat_container .= "<div class='seat-left'>";
            foreach ($left_seats as $seat) {
                $class = in_array($seat['seat_id'], $chosen_seats) ? 'chose' : '';

                // Thêm giá vào thông tin ghế
                $seat_container .= "<div class='seat-item $class' data-id='{$seat['seat_id']}' data-price='$room_price'>{$seat['seat_name']}</div>";
            }
            $seat_container .= "</div>";

            // Thêm phần bên phải
            $seat_container .= "<div class='seat-right'>";
            foreach ($right_seats as $seat) {
                $class = in_array($seat['seat_id'], $chosen_seats) ? 'chose' : '';

                // Thêm giá vào thông tin ghế
                $seat_container .= "<div class='seat-item $class' data-id='{$seat['seat_id']}' data-price='$room_price'>{$seat['seat_name']}</div>";
            }
            $seat_container .= "</div>";

            // Đóng thẻ div chính
            $seat_container .= "</div>";
        } else {
            echo "No seats found for this room.";
        }
    } else {
        echo "No room found for this show.";
    }
    ?>
    <div>
        <?php
        include "header.php";
        ?>
        <div class='choosing-seat__container'>
            <div class='title'>
                CHỌN GHẾ
            </div>
            <div class='description'>
                Vui lòng chọn chỗ ngồi bạn mong muốn </div>
            <div class='heading'>
                <div class="time-picker">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/ef01070ca0e7b2d03dc7322aea01d47a05565d973e84bd7efb7922c5818f9ff1?"
                        class="img" />

                    <div class="time"></div>


                </div>
                <div class='seat-status'>
                    <div class='item '>
                        <div class='status choose'></div>
                        <div class='name'>Đã được đặt</div>
                    </div>
                    <div class='item'>
                        <div class='status'></div>
                        <div class='name'>Ghế trống</div>
                    </div>
                    <div class='item '>
                        <div class='status choosing'></div>
                        <div class='name'>Đang chọn</div>
                    </div>
                    <div class='item '>
                        <div class='status choosingByOther'></div>
                        <div class='name'>Đang được chọn</div>
                    </div>
                </div>
            </div>
            <div id="countdown"></div>

            <?php echo $seat_container ?>
        </div>
        <div class="seat-footer__container">
            <div class="title">Màn hình chiếu</div>
            <div class="seat-info">
                <div class="price-info">
                    <div class="">Tổng tiền</div>
                    <div class="price"></div>
                </div>
                <div class="seat-chose">
                    <div class="">Ghế</div>
                    <div class="seat-number"></div>
                </div>
                <div class="confirm-container">
                    <div class="confirm-button back" onclick='redirectBackSchedule()'>Quay lại</div>
                    <div class="confirm-button confirm" onclick='redirectConfirm()'>Xác nhận</div>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </div>

    <script>
    var conn = new WebSocket('ws://localhost:8081');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };
    const selectedShowObject = localStorage.getItem('selectedShow') ? JSON.parse(localStorage.getItem(
        'selectedShow')) : undefined;
    const time = document.querySelector('.time-picker .time');
    time.textContent = selectedShowObject.show_time;


    conn.onmessage = function(e) {
        var data = JSON.parse(e.data)
        console.log(data);
        // Lặp qua mảng selectedSeats và thêm class choosingByOther cho các ghế tương ứng
        if (data.event == 'seat-selected') {
            // Lấy dữ liệu từ localStorage và chuyển đổi thành mảng các id
            var localStorageData = JSON.parse(localStorage.getItem('selectedSeats')) || [];
            var localStorageIds = localStorageData.map(function(item) {
                return item.id;
            });

            // Loại bỏ các phần tử có id trùng với các id từ localStorage
            data.selectedSeats = data.selectedSeats.filter(function(seat) {
                return !localStorageIds.includes(seat.id);
            });

            // Loại bỏ class 'choosingByOther' từ tất cả các phần tử có class 'seat-item'
            var allSeatElements = document.querySelectorAll('.seat-item');
            allSeatElements.forEach(function(seatElement) {
                seatElement.classList.remove('choosingByOther');
            });

            // Lặp qua mảng selectedSeats và thêm class 'choosingByOther' cho các ghế tương ứng
            data.selectedSeats.forEach(function(seat) {
                var seatId = seat.id;

                // Tìm các phần tử div có class 'seat-item' và có attribute data-id bằng với id của ghế
                var seatElements = document.querySelectorAll('.seat-item[data-id="' + seatId + '"]');

                // Thêm class 'choosingByOther' cho các phần tử tìm được
                seatElements.forEach(function(seatElement) {
                    seatElement.classList.add('choosingByOther');
                });
            });
        }
    };
    // Tạo một mảng để lưu trữ các ghế đã chọn
    var selectedSeats = [];

    // Lấy tất cả các phần tử có class 'seat-item'
    var seatItems = document.getElementsByClassName('seat-item');

    // Duyệt qua từng phần tử và thêm sự kiện onClick
    for (var i = 0; i < seatItems.length; i++) {
        seatItems[i].addEventListener('click', function() {
            // Lấy id và tên của ghế
            var seatId = this.getAttribute('data-id');
            var seatName = this.innerText; // hoặc this.textContent;
            var seatPrice = this.getAttribute('data-price');


            // Toggle class 'choosing' để thể hiện ghế đã chọn hay chưa
            this.classList.toggle('choosing');

            // Kiểm tra xem ghế đã được chọn hay không
            var isChoosing = this.classList.contains('choosing');

            // Tạo một object chứa thông tin về ghế
            var seatInfo = {
                id: seatId,
                name: seatName,
                price: seatPrice,
            };

            // Nếu ghế được chọn, thêm vào mảng selectedSeats, ngược lại, loại bỏ khỏi mảng
            if (isChoosing) {
                selectedSeats.push(seatInfo);
                var data = {
                    event: 'pick-seat',
                    selectedSeats: selectedSeats
                }
                conn.send(JSON.stringify(data))
            } else {
                // Xóa ghế khỏi mảng nếu không được chọn nữa
                var index = selectedSeats.findIndex(function(seat) {
                    return seat.id === seatId;
                });
                var data = {
                    event: 'delete-pick-seat',
                    seatId: seatId
                }
                conn.send(JSON.stringify(data))
                if (index !== -1) {
                    selectedSeats.splice(index, 1);
                }
            }


            // Lưu mảng selectedSeats vào localStorage
            localStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
            // Duyệt qua mảng selectedSeats để cập nhật thông tin ghế được chọn ban đầu
            updateSelectedSeatsInfo();
            console.log('Seat ID:', seatId, 'is now', isChoosing ? 'chosen' : 'unchosen');
            // Thực hiện các hành động khác tại đây, ví dụ: gửi id qua AJAX...
        });
    }
    // Lấy phần tử có class 'seat_chose'
    var seatChoseElement = document.querySelector('.seat-chose .seat-number');

    // Lấy phần tử có class 'count_seat'
    var priceElement = document.querySelector('.price-info .price');

    function updateSelectedSeatsInfo() {
        // Danh sách tên các ghế được chọn
        var selectedSeatNames = selectedSeats.map(function(seat) {
            return seat.name;
        });
        var updatedSeats = JSON.parse(localStorage.getItem('selectedSeats')) || [];
        if (updatedSeats.length > 0) {
            // Nếu có thay đổi, bắt đầu lại đếm ngược
            startCountdown();
        }
        // Hiển thị danh sách tên các ghế được chọn
        seatChoseElement.innerText = selectedSeatNames.join(', ');

        // Đếm số lượng ghế đã chọn và hiển thị
        var selectedSeatsCount = selectedSeats.length;
        // Lấy giá tiền từ thuộc tính data-price của phần tử đầu tiên trong seatItems
        var pricePerSeat = parseFloat(seatItems[0].getAttribute('data-price'));

        // Tính tổng giá tiền
        var totalPrice = selectedSeatsCount * pricePerSeat;

        // Định dạng giá tiền theo mong muốn và hiển thị trên giao diện
        priceElement.innerText = totalPrice.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
    }
    // Hằng số định thời gian đếm ngược (5 phút)
    const COUNTDOWN_DURATION = 1 * 60 * 1000; // 5 phút tính bằng mili giây

    // Hàm đếm ngược
    var countdownInterval; // Biến để lưu trữ interval của countdown

    var countdownDiv = document.getElementById('countdown');

    function startCountdown() {
        // Nếu countdownInterval đã tồn tại, xóa interval cũ trước khi tạo interval mới
        if (countdownInterval) {
            clearInterval(countdownInterval);
        }

        // Lấy thời gian bắt đầu đếm ngược
        var startTime = new Date().getTime();

        // Cập nhật thời gian mỗi giây
        countdownInterval = setInterval(function() {
            // Lấy thời gian hiện tại
            var now = new Date().getTime();
            // Tính thời gian còn lại
            var remainingTime = COUNTDOWN_DURATION - (now - startTime);

            // Kiểm tra xem thời gian còn lại có lớn hơn 0 không
            if (remainingTime > 0) {
                // Chuyển thời gian còn lại thành phút và giây
                var minutes = Math.floor(remainingTime / 60000);
                var seconds = Math.floor((remainingTime % 60000) / 1000);

                // Hiển thị thời gian còn lại trong thẻ div
                countdownDiv.textContent = 'Bạn có: ' + minutes + ' minutes ' + seconds + ' seconds để đặt chỗ';
            } else {
                // Hết thời gian đếm ngược, xóa các phần tử trong mảng selectedSeats
                selectedSeats = [];
                var data = {
                    event: 'delete-all-pick-seat',
                    selectedSeats: JSON.parse(localStorage.getItem('selectedSeats'))
                }
                conn.send(JSON.stringify(data))
                localStorage.removeItem('selectedSeats');
                clearInterval(countdownInterval); // Dừng hẹn giờ
                console.log('Countdown ended. Selected seats cleared.');
                var allSeatElements = document.querySelectorAll('.seat-item');
                allSeatElements.forEach(function(seatElement) {
                    seatElement.classList.remove('choosing');
                });


                countdownDiv.textContent = '';
            }
        }, 1000); // Hẹn giờ mỗi 1 giây
    }

    function redirectBackSchedule() {
        window.location.href = 'schedule.php';
    }

    function redirectConfirm() {
        const updatedSeats = JSON.parse(localStorage.getItem('selectedSeats')) || [];

        if (updatedSeats.length == 0) {
            alert("Bạn phải chọn ghế trước khi chuyển qua trang khác")

        } else {
            window.location.href = 'food_order_customer.php';
        }
        // Chuyển hướng đến URL chứa tham số "handle=create-movie"

    }
    </script>
</body>


</html>