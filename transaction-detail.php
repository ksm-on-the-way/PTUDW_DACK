<?php include_once './header.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .transaction-detail-heading {
            color: #333;
            max-width: 255px;
            font: 700 36px Roboto, sans-serif;
        }

        .ticket {
            border-radius: 16px 16px 0px 0px;
            display: flex;
            max-width: 638px;
            flex-direction: column;
        }

        .ticket-header {
            background-color: #1a2c50;
            z-index: 10;
            width: 100%;
            padding: 44px 80px 44px 32px;
        }

        @media (max-width: 991px) {
            .ticket-header {
                max-width: 100%;
                padding: 0 20px;
            }
        }

        .ticket-info {
            gap: 20px;
            display: flex;
        }

        @media (max-width: 991px) {
            .ticket-info {
                flex-direction: column;
                align-items: stretch;
                gap: 0px;
            }
        }

        .movie-details {
            display: flex;
            flex-direction: column;
            line-height: normal;
            width: 77%;
            margin-left: 0px;
        }

        @media (max-width: 991px) {
            .movie-details {
                width: 100%;
            }
        }

        .movie-info {
            display: flex;
            flex-grow: 1;
            align-items: flex-start;
            gap: 7px;
            font-weight: 500;
        }

        @media (max-width: 991px) {
            .movie-info {
                margin-top: 40px;
            }
        }

        .movie-info-details {
            align-self: start;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            flex-basis: 0;
            width: fit-content;
        }

        .movie-title {
            color: #f2c46f;
            font: 24px/133% Roboto, sans-serif;
        }

        .location-label {
            color: #9da8be;
            margin-top: 36px;
            font: 16px Roboto, sans-serif;
        }

        .location {
            color: #fff;
            margin-top: 20px;
            font: 18px Roboto, sans-serif;
        }

        .date-time {
            display: flex;
            margin-top: 39px;
            gap: 20px;
            justify-content: space-between;
        }

        @media (max-width: 991px) {
            .date-time {
                padding-right: 20px;
            }
        }

        .date-details {
            display: flex;
            flex-direction: column;
        }

        .date-label {
            color: #9da8be;
            font: 16px Roboto, sans-serif;
        }

        .date {
            color: #fff;
            margin-top: 17px;
            font: 18px Roboto, sans-serif;
        }

        .time-details {
            align-self: start;
            display: flex;
            flex-direction: column;
            white-space: nowrap;
        }

        @media (max-width: 991px) {
            .time-details {
                white-space: initial;
            }
        }

        .time-label {
            color: #9da8be;
            font: 16px Roboto, sans-serif;
        }

        .time {
            color: #fff;
            margin-top: 20px;
            font: 18px Roboto, sans-serif;
        }

        .divider {
            background-color: #9da8be;

            margin-top: 56px;
            width: 1px;
            height: 300px;
        }

        @media (max-width: 991px) {
            .divider {
                margin-top: 40px;
            }
        }

        .ticket-details {
            display: flex;
            flex-direction: column;
            line-height: normal;
            width: 23%;
            margin-left: 20px;

        }

        @media (max-width: 991px) {
            .ticket-details {
                width: 100%;
            }
        }

        .ticket-info-details {
            display: flex;
            margin-top: 59px;
            flex-direction: column;
            font-size: 16px;
            color: #9da8be;
            font-weight: 500;
        }

        @media (max-width: 991px) {
            .ticket-info-details {
                margin-top: 40px;
            }
        }

        .ticket-class-label {
            font-family: Roboto, sans-serif;
        }

        .ticket-class {
            color: #fff;
            margin-top: 20px;
            font: 18px Roboto, sans-serif;
        }

        .studio-label {
            font-family: Roboto, sans-serif;
            margin-top: 35px;
        }

        .studio {
            color: #fff;
            margin-top: 20px;
            font: 18px Roboto, sans-serif;
        }

        .ticket-footer {
            fill: #f2c46f;
            overflow: hidden;
            width: 100%;
            padding: 71px 32px;
            background-color: #F2C46F;
        }

        @media (max-width: 991px) {
            .ticket-footer {
                max-width: 100%;
                padding: 0 20px;
            }
        }

        .ticket-footer-info {
            gap: 20px;
            display: flex;
        }

        @media (max-width: 991px) {
            .ticket-footer-info {
                flex-direction: column;
                align-items: stretch;
                gap: 0px;
            }
        }

        .ticket-footer-details {
            display: flex;
            flex-direction: column;
            line-height: normal;
            width: 83%;
            margin-left: 0px;
        }

        @media (max-width: 991px) {
            .ticket-footer-details {
                width: 100%;
            }
        }

        .ticket-footer-info-details {
            display: flex;
            flex-grow: 1;
            gap: 20px;
            color: #333;
            font-weight: 500;
            justify-content: space-between;
        }

        @media (max-width: 991px) {
            .ticket-footer-info-details {
                margin-top: 40px;
            }
        }

        .ticket-footer-info-labels {
            align-self: start;
            display: flex;
            flex-direction: column;
            font-size: 16px;
        }

        .booking-code-label {
            font-family: Roboto, sans-serif;
        }

        .password-key-label {
            font-family: Roboto, sans-serif;
            margin-top: 22px;
        }

        .seat-label {
            font-family: Roboto, sans-serif;
            margin-top: 22px;
        }

        .ticket-footer-info-values {
            display: flex;
            flex-direction: column;
            font-size: 18px;
        }

        .booking-code {
            font-family: Roboto, sans-serif;
        }

        .password-key {
            font-family: Roboto, sans-serif;
            margin-top: 24px;
        }

        .seat {
            font-family: Roboto, sans-serif;
            margin-top: 24px;
        }

        .ticket-footer-qr {
            display: flex;
            flex-direction: column;
            line-height: normal;
            width: 17%;
            margin-left: 20px;
        }

        @media (max-width: 991px) {
            .ticket-footer-qr {
                width: 100%;
            }
        }

        .qr-code {
            aspect-ratio: 1;
            object-fit: auto;
            object-position: center;
            width: 80px;
            margin-top: 12px;
        }

        @media (max-width: 991px) {
            .qr-code {
                margin-top: 40px;
            }
        }
    </style>



    <h1 class="transaction-detail-heading">Detail Transaksi</h1>
    <div class="ticket">
        <div class="ticket-header">
            <div class="ticket-info">
                <div class="movie-details">
                    <div class="movie-info">
                        <div class="movie-info-details">
                            <h1 class="movie-title">Spiderman: No Way Home</h1>
                            <p class="location-label">Lokasi</p>
                            <p class="location">Grand Indonesia CGV</p>
                            <div class="date-time">
                                <div class="date-details">
                                    <p class="date-label">Tanggal</p>
                                    <p class="date">16 December 2021</p>
                                </div>
                                <div class="time-details">
                                    <p class="time-label">Jam</p>
                                    <p class="time">14:40</p>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="ticket-details">
                    <div class="ticket-info-details">
                        <p class="ticket-class-label">Kelas</p>
                        <p class="ticket-class">Regular 2D</p>
                        <p class="studio-label">Studio</p>
                        <p class="studio">Studio 1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ticket-footer">
        <div class="ticket-footer-info">
            <div class="ticket-footer-details">
                <div class="ticket-footer-info-details">
                    <div class="ticket-footer-info-labels">
                        <p class="booking-code-label">Kode Booking</p>
                        <p class="password-key-label">Password Key</p>
                        <p class="seat-label">Kursi</p>
                    </div>
                    <div class="ticket-footer-info-values">
                        <p class="booking-code">037491740184392</p>
                        <p class="password-key">147294</p>
                        <p class="seat">C8, C9, 10</p>
                    </div>
                </div>
            </div>
            <div class="ticket-footer-qr">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/95336c6984e73b5c71ab8a9d67da8b1016f21bd0fc143b7244a7fd49dba87c24?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="QR code for ticket" class="qr-code" />
            </div>
        </div>
    </div>
    </div>

    <?php include_once './footer.php'; ?>
</body>

</html>