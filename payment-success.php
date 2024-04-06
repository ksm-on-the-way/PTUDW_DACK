<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .payment-success-container {
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .success-title {
            color: #333;
            margin-top: 50px;
            font: 700 56px Roboto, sans-serif;
        }

        @media (max-width: 991px) {
            .success-title {
                max-width: 100%;
                margin-top: 40px;
                font-size: 40px;
            }
        }

        .success-image {
            aspect-ratio: 1.64;
            object-fit: auto;
            object-position: center;
            width: 182px;
            max-width: 100%;
            margin: 117px 0 0 54px;
            alt: "Illustration of successful payment";
        }

        @media (max-width: 991px) {
            .success-image {
                margin-top: 40px;
            }
        }

        .success-description {
            color: #5a637a;
            text-align: center;
            margin-top: 55px;
            width: 680px;
            font: 400 20px/27px Roboto, sans-serif;
        }

        @media (max-width: 991px) {
            .success-description {
                max-width: 100%;
                margin-top: 40px;
            }
        }

        .tickets-button {
            justify-content: center;
            border-radius: 8px;
            border: 2px solid #5a637a;
            margin-top: 39px;
            color: #9da8be;
            text-align: center;
            padding: 16px 12px;
            font: 500 24px/133% Roboto, sans-serif;
        }
    </style>
    <?php
    include_once "./header.php";
    ?>
    <div class="payment-success-container">
        <h1 class="success-title">Pembayaran berhasil!</h1>
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f1cca73b1853a9c378b3f4073a452054930f6d24f4a7ffb58ffb4f43a5b5126b?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" class="success-image" alt="Illustration of successful payment" />

        <p class="success-description">
            Detail transaksi telah dikirimkan ke email anda, anda juga dapat memeriksa rincian tiket lainnya di tiket saya baik di website ataupun smartphone anda.
        </p>

        <button class="tickets-button">Tiket Saya</button>

    </div>
    <?php
    include_once "./footer.php";
    ?>
</body>

</html>