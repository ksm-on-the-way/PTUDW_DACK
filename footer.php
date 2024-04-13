<div class="footer">
    <div class="footer-line"></div>
    <div class="footer-container">
        <img loading="lazy" srcset="./images/header-logo.png" class="img-logo__footer" />
        <div class="footer-category">
            <div class="footer-category__container">
                <div class="footer-category__item">

                    <div><strong>TIX ID</strong></div>
                    <div>Liên hệ</div>
                    <div>Về chúng tôi</div>
                    <div>Đối tác</div>

                </div>
                <div class="footer-category__item">

                    <div><strong>Mua vé xem phim</strong></div>
                    <div>Tin tức</div>
                    <div>Rạp chiếu phim</div>
                    <div>Vé của tôi</div>
                    <div>Thanh toán</div>
                    <div>Trả góp</div>

                </div>
                <div class="footer-category__item">

                    <div><strong>Hỗ trợ</strong></div>
                    <div>Trung tâm trợ giúp</div>
                    <div>Chính sách bảo mật</div>
                    <div>FAQ</div>
                    <div>Điều khoản & Điều kiện</div>

                </div>
            </div>
        </div>
        <div class="footer-social">
            <div class="follow-title">Theo dõi TIX ID</div>
            <div class="social-container">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/5b8fa93cc29d50df9760b627d48135a7dbadd49b8b1e585d1e8eed284fa0e1cc?"
                    class="img" />
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/e8620ff9de9fbf7819b69526474a6f1f65380ea433d6b886495490641c02d04a?"
                    class="img" />
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/24a966dd74f3fe546af8ace34e38507b34e6a2648b933814d50a9cd72800ffb4?"
                    class="img" />
            </div>
            <div class="download-title">Tải ứng dụng TIX ID</div>
            <div class="download-container">
                <img loading="lazy" srcset="./images/google-play.png" class="img-download" />
                <img loading="lazy" srcset="./images/app-store.png" class="img-download" />
            </div>
            <div class="term">Công ty TNHH TIX ID</div>
        </div>
    </div>
</div>
<style>
    .footer {
        background-color: var(--White, #fff);
        display: flex;
        padding-bottom: 80px;
        flex-direction: column;
        margin-top: 100px
    }

    @media (max-width: 991px) {
        .footer {
            padding-bottom: 20px;
        }
    }


    .footer-line {
        background-color: var(--Shade-300, #bdc5d4);
        min-height: 1px;
        width: 100%;
    }

    @media (max-width: 991px) {
        .footer-line {
            max-width: 100%;
        }
    }

    .footer-container {

        margin-top: 39px;
        width: 100%;
        max-width: 1179px;
        gap: 20px;
        text-align: center;
    }

    @media (min-width: 765px) {
        .footer-container {
            align-self: center;
            display: flex;
            text-align: left;
        }
    }

    .img-logo__footer {
        aspect-ratio: 3.57;
        object-fit: auto;
        object-position: center;
        width: 130px;
        align-self: start;
        max-width: 100%;
    }

    .footer-category {
        flex-grow: 1;
        flex-basis: auto;
    }

    @media (max-width: 991px) {
        .footer-category {
            max-width: 100%;
        }
    }

    .footer-category__container {
        gap: 20px;
        display: flex;
    }

    @media (max-width: 991px) {
        .footer-category__container {
            flex-direction: column;
            align-items: stretch;
            gap: 36px;
            margin-top: 36px;
        }
    }

    .footer-category__item {
        display: flex;
        row-gap: 20px;
        flex-direction: column;
        line-height: normal;
        width: 33%;
        margin-left: 0px;
        font-size: 16px;
        color: var(--Shade-900, #333);
        text-align: center;
    }

    @media (max-width: 991px) {
        .footer-category__item {
            width: 100%;
        }
    }


    .footer-social {
        display: flex;
        flex-direction: column;
    }

    @media (max-width: 991px) {
        .footer-social {
            margin-top: 30px;
            text-align: center;
        }
    }

    .footer-social .follow-title {
        color: var(--Shade-900, #333);
        font: 500 18px Roboto, sans-serif;
    }

    .footer-social .social-container {
        display: flex;
        margin-top: 24px;
        padding-right: 80px;
        gap: 18px;
    }

    @media (max-width: 991px) {
        .footer-social .social-container {
            padding-right: unset;
            justify-content: center;
        }
    }

    .footer-social .img {
        aspect-ratio: 1;
        object-fit: auto;
        object-position: center;
        width: 24px;
    }

    .footer-social .download-title {
        color: var(--Shade-900, #333);
        margin-top: 42px;
        font: 500 18px Roboto, sans-serif;
    }

    @media (max-width: 991px) {
        .footer-social .download-title {
            margin-top: 40px;
        }
    }

    .footer-social .download-container {
        display: flex;
        margin-top: 24px;
        gap: 20px;
        justify-content: space-between;
    }

    @media (max-width: 991px) {
        .footer-social .download-container {
            justify-content: center;
        }
    }


    .footer-social .img-download {
        aspect-ratio: 3.33;
        object-fit: auto;
        object-position: center;
        width: 110px;
        max-width: 100%;
    }

    .footer-social .term {
        color: var(--Shade-900, #333);
        margin-top: 38px;
        font: 400 12px Roboto, sans-serif;
    }
</style>