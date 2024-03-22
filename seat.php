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
        width: 1300px;
        margin: 0 auto;
    }

    .choosing-seat__container .title {
        color: var(--Shade-900, #333);
        width: 100%;
        font: 700 36px Roboto, sans-serif;
    }

    .choosing-seat__container .description {
        color: var(--Shade-600, #5a637a);
        margin-top: 32px;
        width: 100%;
        font: 400 16px/150% Roboto, sans-serif;
    }

    .choosing-seat__container .heading {
        display: flex;
        align-items: center;
        width: 1100px;
        margin: 0 auto;
        justify-content: space-between;
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
        background-color: var(--Royal-Blue, #1a2c50);
        width: 16px;
        height: 16px;
    }

    .seat-container {
        width: 1100px;
        margin: 0 auto;
        display: flex;
        column-gap: 80px;
        margin-top: 50px;
    }

    .seat-container .seat-left,
    .seat-container .seat-right {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .seat-container .seat-item {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        width: 30px;
        height: 30px;
        padding: 10px;
        border-radius: 6px;
        border-color: rgba(157, 168, 190, 1);
        border-style: solid;
        border-width: 1px;
    }

    .seat-container .seat-item:hover {
        background: #1A2C50;
        color: white;
    }

    .seat-container .seat-item.chose {
        background: #118EEA;
    }

    .seat-container .seat-item.choosing {
        background: #1A2C50;
        color: white;
    }
    </style>
    <div>
        <?php
        include "header.php";
        ?>
        <div class='choosing-seat__container'>
            <div class='title'>
                PILIH KURSI
            </div>
            <div class='description'>
                Pilih kursi yang akan kamu tempati selama pemutaran film
            </div>
            <div class='heading'>
                <div class="time-picker">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/ef01070ca0e7b2d03dc7322aea01d47a05565d973e84bd7efb7922c5818f9ff1?"
                        class="img" />

                    <div class="time">14:40</div>
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/ac9b9726ebb0f6eb68e38f83ef0329e574536bc628c5ccf18a081b93b712b19a?"
                        class="img-2" />

                </div>
                <div class='seat-status'>
                    <div class='item'>
                        <div class='status'></div>
                        <div class='name'>Terisi</div>
                    </div>
                    <div class='item'>
                        <div class='status'></div>
                        <div class='name'>Kursi Kosong</div>
                    </div>
                    <div class='item'>
                        <div class='status'></div>
                        <div class='name'>Dipilih</div>
                    </div>
                </div>
            </div>
            <div class='seat-container'>
                <div class='seat-left'>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item chose'>
                        A1
                    </div>
                    <div class='seat-item chose'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item choosing'>
                        A1
                    </div>
                    <div class='seat-item choosing'>
                        A1
                    </div>
                    <div class='seat-item choosing'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                    <div class='seat-item'>
                        A1
                    </div>
                </div>
                <div class='seat-right'>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                    <div class='seat-item'>
                        B1
                    </div>
                </div>
            </div>
        </div>
        <div class="seat-footer__container">
            <div class="title">Layar Bioskop Disini</div>
            <div class="seat-info">
                <div class="price-info">
                    <div class="">Total</div>
                    <div class="price">Rp. 150.000</div>
                </div>
                <div class="seat-chose">
                    <div class="">Kursi</div>
                    <div class="seat-number">C8, C9, C10</div>
                </div>
                <div class="confirm-container">
                    <div class="confirm-button back">Kembali</div>
                    <div class="confirm-button confirm">KONFIRMASI</div>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </div>
    <style>
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
            padding: 0 20px;
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
        padding: 0 20px;
    }

    @med ia (max-width: 991px) {
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
        font: 700 36px Roboto, sans-serif;
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
        font: 700 36px/128% Roboto, sans-serif;
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
    }

    .seat-footer__container .confirm-container .confirm-button.confirm {
        background-color: var(--Royal-Blue, #1a2c50);
        color: var(--Sunshine-Yellow, #ffbe00);
    }
    </style>
</body>

</html>