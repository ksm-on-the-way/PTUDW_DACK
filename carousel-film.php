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