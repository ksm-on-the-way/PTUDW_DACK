<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./owlcarousel/assets/owl.theme.default.min.css">
    <script src="./jquery.min.js"></script>
    <script src="./owlcarousel/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
.carousel-film__container {
    width: 100%;
    margin: 0 auto;
    position: relative;
    margin-top: 20px;
}

@media (min-width: 768px) {
    .carousel-film__container {
        max-width: 1300px;
        margin-top: 70px;

    }
}

.carousel-film__container .owl-item {
    display: flex;
    justify-content: center;
}

.carousel-film__container .owl-carousel {
    position: relative;
}

.carousel-film__container .owl-carousel .owl-nav .owl-prev {
    position: absolute;
    left: 25px;
    top: 50%;
}

.carousel-film__container .owl-carousel .owl-nav .owl-next {
    position: absolute;
    right: 25px;
    top: 50%;
}

.carousel-film__container .owl-carousel .owl-nav .owl-next,
.owl-prev {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    z-index: 90;
}

.card-film {
    display: flex;
    max-width: 400px;
    flex-direction: column;
    font-weight: 700;
    text-align: center;
}

@media (min-width: 768px) {
    .card-film {
        padding: 0 20px;
    }
}

.card-film .img {
    aspect-ratio: 0.81;
    object-fit: auto;
    object-position: center;
    width: 100%;
    border-radius: 16px;
}

.card-film .img:hover {
    cursor: pointer;
}

@media (max-width: 991px) {
    .card-film .img {
        max-width: 100%;
    }
}

.card-film .title {
    color: var(--Shade-900, #333);
    margin-top: 32px;
    width: 100%;
    font: 28px Roboto, sans-serif;
}

@media (max-width: 991px) {
    .card-film .title {
        max-width: 100%;
        margin-top: 20px;
    }
}

.card-film .cinema-container {
    align-self: center;
    display: flex;
    margin-top: 24px;
    gap: 18px;
    font-size: 12px;
    color: var(--Shade-100, #fff);
    white-space: nowrap;
}

@media (max-width: 991px) {
    .card-film .cinema-container {
        white-space: initial;
    }
}

.card-film .cinema-container .cinema-name {
    font-family: Roboto, sans-serif;
    justify-content: center;
    border-radius: 4px;
    background-color: #F2C46F;
    padding: 4px 8px;
}

@media (max-width: 991px) {
    .card-film .cinema-container .cinema-name {
        white-space: initial;
    }
}
</style>

<body>
    <div class='carousel-film__container'>
        <div class="owl-carousel">

            <?php
            include "card-film.php";
            ?>

        </div>
    </div>
</body>

</script>

<script>
$('.carousel-film__container .owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    navText: [
        "<i class='fas fa-chevron-left'></i>",
        "<i class='fas fa-chevron-right'></i>",
    ],
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        600: {
            items: 2
        },

    }
})
</script>

</html>