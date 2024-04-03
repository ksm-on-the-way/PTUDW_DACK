<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
    font-family: Roboto, sans-serif;

}

.header {
    justify-content: space-between;
    background-color: #fff;
    display: flex;
    gap: 20px;
    font-size: 18px;
    color: var(--Shade-900, #333);
    font-weight: 500;
    text-align: center;
    padding: 8px 72px;
}

@media (max-width: 991px) {
    .header {
        flex-wrap: wrap;
        padding: 0;
    }
}

.header .img {
    aspect-ratio: 1;
    object-fit: auto;
    object-position: center;
    width: 64px;
}

.header-right_container {
    justify-content: flex-end;
    align-items: center;
    display: none;
    gap: 20px;
    margin: auto 0;
}

@media (min-width: 768px) {
    .header-right_container {
        display: flex;
    }
}

@media (max-width: 991px) {
    .header-right_container {
        flex-wrap: wrap;
    }
}

.header-navigation {
    /* color: var(--royal-blue-while-pressed, #383782); */
    align-self: stretch;
    flex-grow: 1;
    margin: auto 0;
    cursor: pointer;
}



.header-navigation:hover {
    color: #282764;

}

.header-noti {
    aspect-ratio: 1;
    object-fit: auto;
    object-position: center;
    width: 32px;
    align-self: stretch;
    margin: auto 0;
    cursor: pointer;
}

.header-right_container .avt-container {
    align-self: stretch;
    display: flex;
    flex-direction: column;
    color: #fff;
    white-space: nowrap;
    line-height: 100%;
    justify-content: center;
}

@media (max-width: 991px) {
    .header-right_container .avt-container {
        white-space: initial;
    }
}


.header-right_container .avt {
    font-family: Poppins, sans-serif;
    background-color: #F2C46F;
    border-radius: 50%;
    display: flex;
    align-items: center;
    width: 40px;
    justify-content: center;
    height: 40px;

}

@media (max-width: 991px) {
    .header-right_container .avt {
        white-space: initial;
    }
}
</style>

<body>
    <div class="header">
        <img loading="lazy" srcset="./images/header-logo.png" class="img" />
        <div class="header-right_container">
            <div class="header-navigation">Trang chủ</div>
            <div class="header-navigation">Tiket Saya</div>
            <div class="header-navigation">Tin tức</div>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/7a3ca842d4cd4de61297eebe8f08acb763755b34885f1a9221275a7018273ae5?"
                class="header-noti" />
            <div class="avt-container">
                <div class="avt">A</div>
            </div>
        </div>

    </div>
</body>

</html>