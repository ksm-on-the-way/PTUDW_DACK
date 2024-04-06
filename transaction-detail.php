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
        .ticket {
            display: flex;
            max-width: 638px;
            flex-direction: column;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }

        .ticket-header {
            background-color: #1a2c50;
            z-index: 10;
            padding: 44px 80px 44px 32px;
            border-radius: 16px 16px 0px 0px;
            max-width: 100%;
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

        .movie-title-container {
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

        .date-time-info {
            display: flex;
            margin-top: 39px;
            gap: 20px;
            justify-content: space-between;
        }

        @media (max-width: 991px) {
            .date-time-info {
                padding-right: 20px;
            }
        }

        .date-container {
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

        .time-container {
            align-self: start;
            display: flex;
            flex-direction: column;
            white-space: nowrap;
        }

        @media (max-width: 991px) {
            .time-container {
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

        .divider-movie-info {
            background-color: #9da8be;
            align-self: end;
            margin-top: 56px;
            width: 1px;
            height: 250px;
        }

        @media (max-width: 991px) {
            .divider {
                margin-top: 40px;
            }
        }

        .ticket-class-info {
            display: flex;
            flex-direction: column;
            line-height: normal;
            width: 23%;
            margin-left: 20px;
            padding-top: 25px;
        }

        @media (max-width: 991px) {
            .ticket-class-info {
                width: 100%;
            }
        }

        .ticket-class-details {
            display: flex;
            margin-top: 59px;
            flex-direction: column;
            font-size: 16px;
            color: #9da8be;
            font-weight: 500;
        }

        @media (max-width: 991px) {
            .ticket-class-details {
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
            padding-top: 19px;
        }

        .studio {
            color: #fff;
            margin-top: 20px;
            font: 18px Roboto, sans-serif;
        }

        .ticket-footer {
            overflow: hidden;
            padding: 71px 32px;
            background-color: #F2C46F;
            max-width: 100%;
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

        .booking-details {
            display: flex;
            flex-direction: column;
            line-height: 20px;
            width: 83%;
            margin-left: 0px;
        }

        @media (max-width: 991px) {
            .booking-details {
                width: 100%;
            }
        }

        .booking-info {
            display: flex;
            flex-grow: 1;
            gap: 20px;
            color: #333;
            font-weight: 500;
        }

        @media (max-width: 991px) {
            .booking-info {
                margin-top: 40px;
            }
        }

        .booking-labels {
            align-self: start;
            display: flex;
            flex-direction: column;
            font-size: 16px;
        }

        .booking-code-label {
            font-family: Roboto, sans-serif;

        }

        .password-label {
            font-family: Roboto, sans-serif;
            margin-top: 16px;
        }

        .seat-label {
            font-family: Roboto, sans-serif;
            margin-top: 16px;
        }

        .booking-values {
            display: flex;
            flex-direction: column;
            font-size: 18px;
        }

        .booking-code {
            font-family: Roboto, sans-serif;
            margin: 16px;
        }

        .password {
            font-family: Roboto, sans-serif;
            margin: 16px;
        }

        .seat {
            font-family: Roboto, sans-serif;
            margin: 16px;
        }

        .qr-code-container {
            display: flex;
            flex-direction: column;
            line-height: normal;
            width: 17%;
            margin-left: 20px;
        }

        @media (max-width: 991px) {
            .qr-code-container {
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

        .purchase-details {
            display: flex;
            flex-direction: column;
            font-size: 16px;
            max-width: 638px;
        }

        .purchase-details__title {
            color: #000;
            font: 500 24px/133% Roboto, sans-serif;
            width: 100%;
        }

        @media (max-width: 991px) {
            .purchase-details__title {
                max-width: 100%;
            }
        }

        .order-number {
            display: flex;
            justify-content: space-between;
            margin-top: 28px;
            width: 100%;
            gap: 20px;
        }

        @media (max-width: 991px) {
            .order-number {
                flex-wrap: wrap;
                max-width: 100%;
            }
        }

        .order-number__label {
            color: var(--Shade-900, #333);
            font-family: Roboto, sans-serif;
            font-weight: 400;
        }

        .order-number__details {
            display: flex;
            gap: 12px;
            text-align: right;
        }

        .order-number__price {
            color: var(--Shade-900, #333);
            font-family: Roboto, sans-serif;
            font-weight: 400;
            line-height: 150%;
        }

        .order-number__quantity {
            color: var(--Shade-700, #414a63);
            font-family: Roboto, sans-serif;
            font-weight: 700;
        }

        .seat-type {
            display: flex;
            justify-content: space-between;
            margin-top: 13px;
            width: 100%;
            gap: 20px;
            padding: 0 1px;
        }

        @media (max-width: 991px) {
            .seat-type {
                flex-wrap: wrap;
                max-width: 100%;
            }
        }

        .seat-type__label {
            color: var(--Shade-900, #333);
            font-family: Roboto, sans-serif;
            font-weight: 400;
        }

        .seat-type__details {
            display: flex;
            gap: 12px;
            text-align: right;
        }

        .seat-type__price {
            color: var(--Shade-900, #333);
            font-family: Roboto, sans-serif;
            font-weight: 400;
            line-height: 150%;
        }

        .seat-type__quantity {
            color: var(--Shade-700, #414a63);
            font-family: Roboto, sans-serif;
            font-weight: 700;
        }

        .service-fee {
            display: flex;
            justify-content: space-between;
            margin-top: 13px;
            width: 100%;
            gap: 20px;
            padding: 0 1px;
        }

        @media (max-width: 991px) {
            .service-fee {
                flex-wrap: wrap;
                max-width: 100%;
            }
        }

        .service-fee__label {
            color: var(--Shade-900, #333);
            font-family: Roboto, sans-serif;
            font-weight: 400;
        }

        .service-fee__details {
            display: flex;
            gap: 12px;
            text-align: right;
        }

        .service-fee__price {
            color: var(--Shade-900, #333);
            font-family: Roboto, sans-serif;
            font-weight: 400;
            line-height: 150%;
        }

        .service-fee__quantity {
            color: var(--Shade-700, #414a63);
            font-family: Roboto, sans-serif;
            font-weight: 700;
        }

        .promo {
            display: flex;
            justify-content: space-between;
            margin-top: 13px;
            width: 100%;
            gap: 20px;
            color: var(--Shade-900, #333);
            font-weight: 400;
            padding: 0 1px;
        }

        @media (max-width: 991px) {
            .promo {
                flex-wrap: wrap;
                max-width: 100%;
            }
        }

        .promo__label {
            font-family: Roboto, sans-serif;
        }

        .promo__discount {
            font-family: Roboto, sans-serif;
            text-align: right;
            line-height: 150%;
            justify-content: center;
        }

        .divider-purchase-detail {
            background-color: var(--Shade-200, #dadfe8);
            min-height: 1px;
            margin-top: 11px;
            width: 100%;
        }

        @media (max-width: 991px) {
            .divider {
                max-width: 100%;
            }
        }

        .total-payment {
            display: flex;
            justify-content: space-between;
            margin-top: 16px;
            width: 100%;
            gap: 20px;
            color: var(--Shade-900, #333);
        }

        @media (max-width: 991px) {
            .total-payment {
                flex-wrap: wrap;
                max-width: 100%;
            }
        }

        .total-payment__label {
            font-family: Roboto, sans-serif;
            font-weight: 400;
        }

        .total-payment__amount {
            font-family: Roboto, sans-serif;
            font-weight: 700;
            text-align: right;
            justify-content: center;
        }

        .back-button {
            align-self: start;
            display: flex;
            margin-top: 48px;
            gap: 20px;
            font-size: 24px;
            color: var(--Royal-Blue, #1a2c50);
            font-weight: 700;
            white-space: nowrap;
            justify-content: space-between;
        }

        .back-button:hover {
            cursor: pointer;
        }

        @media (max-width: 991px) {
            .back-button {
                margin-top: 40px;
                white-space: initial;
            }
        }

        .back-button__icon {
            aspect-ratio: 1;
            object-fit: auto;
            object-position: center;
            width: 32px;
        }

        .back-button__text {
            font-family: Roboto, sans-serif;
            margin: auto 0;
        }

        .transaction-detail-header {
            color: #333;
            font: 700 36px Roboto, sans-serif;
            text-align: center;
        }
    </style>
    <h1 class="transaction-detail-header">Detail Transaksi</h1>
    <div class="ticket">
        <div class="ticket-header">
            <div class="ticket-info">
                <div class="movie-details">
                    <div class="movie-info">
                        <div class="movie-title-container">
                            <h1 class="movie-title">Spiderman: No Way Home</h1>
                            <p class="location-label">Lokasi</p>
                            <p class="location">Grand Indonesia CGV</p>
                            <div class="date-time-info">
                                <div class="date-container">
                                    <p class="date-label">Tanggal</p>
                                    <p class="date">16 December 2021</p>
                                </div>
                                <div class="time-container">
                                    <p class="time-label">Jam</p>
                                    <p class="time">14:40</p>
                                </div>
                            </div>
                        </div>
                        <div class="divider-movie-info"></div>
                    </div>
                </div>
                <div class="ticket-class-info">
                    <div class="ticket-class-details">
                        <p class="ticket-class-label">Kelas</p>
                        <p class="ticket-class">Regular 2D</p>
                        <p class="studio-label">Studio</p>
                        <p class="studio">Studio 1</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ticket-footer">
            <div class="ticket-footer-info">
                <div class="booking-details">
                    <div class="booking-info">
                        <div class="booking-labels">
                            <p class="booking-code-label">Kode Booking</p>
                            <p class="password-label">Password Key</p>
                            <p class="seat-label">Kursi</p>
                        </div>
                        <div class="booking-values">
                            <p class="booking-code">037491740184392</p>
                            <p class="password">147294</p>
                            <p class="seat">C8, C9, 10</p>
                        </div>
                    </div>
                </div>
                <div class="qr-code-container">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/95336c6984e73b5c71ab8a9d67da8b1016f21bd0fc143b7244a7fd49dba87c24?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="QR code for ticket" class="qr-code" />
                </div>
            </div>
        </div>
        <div class="purchase-details">
            <h2 class="purchase-details__title">Rincian Pembelian</h2>

            <div class="order-number">
                <div class="order-number__label">NO ORDER</div>
                <div class="order-number__details">
                    <div class="order-number__price">Rp. 70.000</div>
                    <div class="order-number__quantity">X3</div>
                </div>
            </div>

            <div class="seat-type">
                <div class="seat-type__label">REGULAR SEAT</div>
                <div class="seat-type__details">
                    <div class="seat-type__price">Rp. 70.000</div>
                    <div class="seat-type__quantity">X3</div>
                </div>
            </div>

            <div class="service-fee">
                <div class="service-fee__label">BIAYA LAYANAN</div>
                <div class="service-fee__details">
                    <div class="service-fee__price">Rp. 3.000</div>
                    <div class="service-fee__quantity">X3</div>
                </div>
            </div>

            <div class="promo">
                <div class="promo__label">PROMO TIX ID</div>
                <div class="promo__discount">- Rp. 50.000</div>
            </div>

            <div class="divider-purchase-detail"></div>

            <div class="total-payment">
                <div class="total-payment__label">TOTAL PEMBAYARAN</div>
                <div class="total-payment__amount">Rp. 129.000</div>
            </div>

            <div class="back-button">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8defa1d0c0d2b0c48d57096c1cf569b9d3e95cf373eb8bb8255570a6043b56ed?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="back-button__icon" />
                <div class="back-button__text">Kembali</div>
            </div>
        </div>
    </div>



    <?php include_once './footer.php'; ?>
</body>

</html>