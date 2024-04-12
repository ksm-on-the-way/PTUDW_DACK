<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card-film">
        <img loading="lazy" srcset="./images/image-1.png" class="img" onclick="redirecToFilmDetail(movieid)"/>
        <div class="title">Spider-Man: No Way Home</div>
        <!-- <div class="cinema-container">
            <div class="cinema-name">XXI</div>
            <div class="cinema-name">CGV</div>
            <div class="cinema-name">CINÉPOLIS</div>
        </div> -->
    </div>

    <script>
        function redirectToFilmDetail(movieid){
            window.location.href = "./film-details.php?movieid="+id;
        }
    </script>
    <style>
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
    .card-film .img:hover{
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
</body>

</html>