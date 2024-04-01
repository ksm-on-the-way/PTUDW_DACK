<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .confirm-payment-schedule {
            display: grid;
            grid-template-columns: 644px 1fr;
            column-gap: 100px;
            width: 1200px;
            margin: 0 auto;
        }

        .confirm-payment-title {
            color: var(--Shade-900, #333);
            width: 100%;
            font: 700 36px Roboto, sans-serif;
        }

        .confirm-payment-desc {
            color: var(--Shade-600, #5a637a);
            margin-top: 32px;
            width: 100%;
            font: 400 16px/150% Roboto, sans-serif;
        }

        .detail-jadwal {
            display: flex;
            max-width: 421px;
            flex-direction: column;
        }


        .judul-film-label {
            color: #414a63;
            font: 400 16px/150% Roboto, sans-serif;
        }

        .judul-film {
            color: #333;
            margin-top: 8px;
            font: 500 24px Roboto, sans-serif;
        }

        .judul-film-container {
            display: flex;
            margin-top: 36px;
            flex-direction: column;
        }

        .divider {
            background-color: #dadfe8;
            min-height: 1px;
            margin-top: 17px;
            width: 100%;
        }

        .tanggal-label {
            color: #414a63;
            font: 400 16px/150% Roboto, sans-serif;
        }

        .tanggal {
            color: #333;
            margin-top: 8px;
            font: 500 24px Roboto, sans-serif;
        }

        .tanggal-container {
            display: flex;
            margin-top: 17px;
            flex-direction: column;
        }

        .kelas-jam-container {
            display: flex;
            margin-top: 17px;
            gap: 20px;
        }

        .kelas-label {
            color: #414a63;
            font: 400 16px/150% Roboto, sans-serif;
        }

        .kelas {
            color: #333;
            margin-top: 8px;
            font: 500 24px Roboto, sans-serif;
        }

        .kelas-container {
            display: flex;
            flex-direction: column;
        }

        .jam-label {
            color: #414a63;
            font: 400 16px/150% Roboto, sans-serif;
        }

        .jam {
            color: #333;
            margin-top: 8px;
            font: 500 24px Roboto, sans-serif;
        }

        .jam-container {
            display: flex;
            flex-direction: column;
            white-space: nowrap;
        }

        .tiket-label {
            color: #414a63;
            font: 400 16px/150% Roboto, sans-serif;
        }

        .tiket {
            color: #333;
            margin-top: 8px;
            font: 500 24px Roboto, sans-serif;
        }

        .tiket-container {
            align-self: start;
            display: flex;
            margin-top: 17px;
            flex-direction: column;
        }


        /* left */
        .order-summary {
            border-radius: 13px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.3);
            border: 1px solid #c4c4c4;
            background-color: #fff;
            padding: 30px 32px 48px;
            display: flex;
            flex-direction: column;
            max-width: 499px;
            justify-content: center;
        }

        @media (max-width: 991px) {
            .order-summary {
                max-width: 100%;
            }
        }

        .order-summary-title {
            color: #333;
            font: 500 24px Roboto, sans-serif;
        }

        .transaction-details-title {
            color: #333;
            margin-top: 36px;
            font: 700 16px Roboto, sans-serif;
        }

        .regular-seat {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 20px;
            font-size: 16px;
            width: 100%;
        }

        .regular-seat-label {
            color: #333;
            font-family: Roboto, sans-serif;
            font-weight: 400;
        }

        .regular-seat-details {
            display: flex;
            gap: 12px;
            text-align: right;
        }

        .regular-seat-price {
            color: #333;
            font-family: Roboto, sans-serif;
            font-weight: 400;
            line-height: 150%;
        }

        .regular-seat-quantity {
            color: #414a63;
            font-family: Roboto, sans-serif;
            font-weight: 700;
        }

        .service-fee {
            display: flex;
            justify-content: space-between;
            margin-top: 7px;
            gap: 20px;
            font-size: 16px;
            width: 100%;
        }

        .service-fee-label {
            color: #333;
            font-family: Roboto, sans-serif;
            font-weight: 400;
        }

        .service-fee-details {
            display: flex;
            gap: 12px;
            text-align: right;
            white-space: nowrap;
        }

        @media (max-width: 991px) {
            .service-fee-details {
                white-space: initial;
            }
        }

        .service-fee-price {
            color: #333;
            font-family: Roboto, sans-serif;
            font-weight: 400;
            line-height: 150%;
        }

        .service-fee-quantity {
            color: #414a63;
            font-family: Roboto, sans-serif;
            font-weight: 700;
        }

        .divider {
            background-color: #bdc5d4;
            margin-top: 27px;
            height: 1px;
        }

        .promo-voucher-title {
            color: #333;
            margin-top: 35px;
            font: 700 16px Roboto, sans-serif;
        }

        .promo-tix-id {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 20px;
            font-size: 16px;
            color: #333;
            font-weight: 400;
        }

        .promo-tix-id-label {
            font-family: Roboto, sans-serif;
        }

        .promo-tix-id-amount {
            font-family: Roboto, sans-serif;
            text-align: right;
            line-height: 150%;
            justify-content: center;
        }

        .total-payment {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
            gap: 20px;
            font-size: 16px;
            color: #333;
            font-weight: 700;
        }

        .total-payment-label {
            font-family: Roboto, sans-serif;
        }

        .total-payment-amount {
            font-family: Roboto, sans-serif;
        }

        .payment-method-title {
            display: flex;
            justify-content: space-between;
            margin-top: 32px;
            gap: 20px;
            font-weight: 700;
        }

        .payment-method-label {
            color: #333;
            font: 16px Roboto, sans-serif;
        }

        .payment-method-link {
            color: #118eea;
            font: 12px Roboto, sans-serif;
        }

        .dana-payment {
            display: flex;
            align-self: start;
            margin-top: 24px;
            gap: 16px;
            font-size: 18px;
            color: #333;
            font-weight: 400;
            line-height: 156%;
            white-space: nowrap;
        }

        @media (max-width: 991px) {
            .dana-payment {
                white-space: initial;
            }
        }

        .dana-logo {
            width: 58px;
            aspect-ratio: 3.57;
            object-fit: auto;
            object-position: center;
            align-self: start;
        }

        .dana-label {
            font-family: Roboto, sans-serif;
        }

        .non-refundable-notice {
            color: #ff6b6b;
            margin-top: 35px;
            font: 400 12px Roboto, sans-serif;
        }

        .buy-ticket-button {
            border-radius: 8px;
            background-color: #1a2c50;
            margin-top: 25px;
            color: #ffbe00;
            text-align: center;
            padding: 16px 12px;
            font: 500 24px/133% Roboto, sans-serif;
            justify-content: center;
        }
    </style>
    <?php
    include_once("header.php");
    ?>
    <div class="confirm-payment-schedule">
        <div class="confirm-payment-right">
            <div class="confirm-payment-title">CONFIRM PAYMENT</div>
            <div class="confirm-payment-desc">Pilih jadwal bioskop yang akan kamu tonton</div>
            <section class="detail-jadwal">
                <h2 id="detail-jadwal-header">Detail Jadwal</h2>

                <div class="judul-film-container">
                    <p class="judul-film-label">Judul Film</p>
                    <p class="judul-film">SPIDERMAN NO WAY HOME</p>
                </div>

                <div class="divider"></div>

                <div class="tanggal-container">
                    <p class="tanggal-label">Tanggal</p>
                    <p class="tanggal">KAMIS, 17 DESEMBER 2021</p>
                </div>

                <div class="divider"></div>

                <div class="kelas-jam-container">
                    <div class="kelas-container">
                        <p class="kelas-label">Kelas</p>
                        <p class="kelas">REGULAR 2D</p>
                    </div>
                    <div class="jam-container">
                        <p class="jam-label">Jam</p>
                        <p class="jam">14:40</p>
                    </div>
                </div>

                <div class="divider"></div>

                <div class="tiket-container">
                    <p class="tiket-label">Tiket (3)</p>
                    <p class="tiket">C8, C9, C10</p>
                </div>
            </section>
        </div>
        <div class="confirm-payment-left">
            <section class="order-summary">
                <h2 class="order-summary-title">Ringkasan Order</h2>
                <h3 class="transaction-details-title">Detail Transaksi</h3>

                <div class="regular-seat">
                    <div class="regular-seat-label">REGULAR SEAT</div>
                    <div class="regular-seat-details">
                        <div class="regular-seat-price">Rp. 50.000</div>
                        <div class="regular-seat-quantity">X3</div>
                    </div>
                </div>

                <div class="service-fee">
                    <div class="service-fee-label">BIAYA LAYANAN</div>
                    <div class="service-fee-details">
                        <div class="service-fee-price">Rp.3.000</div>
                        <div class="service-fee-quantity">X3</div>
                    </div>
                </div>

                <div class="divider"></div>

                <h3 class="promo-voucher-title">Promo & Voucher</h3>
                <div class="promo-tix-id">
                    <div class="promo-tix-id-label">PROMO TIX ID</div>
                    <div class="promo-tix-id-amount">- Rp. 70.000</div>
                </div>

                <div class="divider"></div>

                <div class="total-payment">
                    <div class="total-payment-label">Total Bayar</div>
                    <div class="total-payment-amount">Rp. 89.000</div>
                </div>

                <div class="divider"></div>

                <div class="payment-method-title">
                    <div class="payment-method-label">Metode Pembayaran</div>
                    <a href="#" class="payment-method-link">Lihat Semua</a>
                </div>

                <div class="dana-payment">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ed129848d2cb5b1fed239fc00eb5ee9ebbef693b440002fe86edb88c63fca0c3?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="dana-logo" />
                    <div class="dana-label">DANA</div>
                </div>

                <div class="non-refundable-notice">*Pembelian tiket tidak dapat dibatalkan</div>
                <button class="buy-ticket-button">BELI TIKET</button>
            </section>
        </div>
    </div>
    <?php include_once './footer.php'; ?>
</body>

</html>