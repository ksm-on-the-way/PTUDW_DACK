<div class="film-comming__container">
    <div class="heading">
        <div>
            <div class="heading-title">Phim sắp đến</div>
            <div class="heading-description">
                Chờ đón sự xuất hiện của bộ phim yêu thích của bạn tại TIX ID!
            </div>
        </div>
        <div class="show-all">Xem tất cả</div>
    </div>
    <div class="comming-items__container">
        <div class="comming-items__row">
            <?php
            include "card-film.php";
            ?>
            <?php
            include "card-film.php";
            ?>
            <?php
            include "card-film.php";
            ?>
        </div>
    </div>
</div>
<style>
.film-comming__container {
    display: flex;
    flex-direction: column;
    width: 100%;
    margin: 0 auto;
    margin-top: 50px;
}

@media (min-width: 768px) {
    .film-comming__container {
        max-width: 1300px;
        margin-top: 100px;
    }
}

.film-comming__container .heading {
    display: flex;
    width: 100%;
    gap: 20px;
    padding: unset;
}



@media (max-width: 991px) {
    .film-comming__container .heading {
        max-width: 100%;
        flex-wrap: wrap;
    }
}

.film-comming__container .heading .heading-title {
    text-transform: uppercase;
    color: var(--Shade-900, #333);
    font: 500 24px/133% Roboto, sans-serif;
}

.film-comming__container .heading .heading-description {
    color: var(--Shade-600, #5a637a);
    margin-top: 21px;
    font: 400 16px/150% Roboto, sans-serif;
}

.film-comming__container .heading .show-all {
    color: var(--Sky-blue, #118eea);
    text-align: right;
    align-self: start;

    flex-basis: auto;
    font: 500 24px/133% Roboto, sans-serif;
}

@media (min-width: 768px) {
    .film-comming__container .heading .show-all {

        flex-grow: 1;

    }
}

.comming-items__container {
    margin-top: 42px;
    width: 100%;
    padding: unset;
}


@media (max-width: 991px) {
    .comming-items__container {
        max-width: 100%;
        margin-top: 30px;
    }
}

.comming-items__row {
    gap: 20px;
    display: flex;
}

@media (max-width: 991px) {
    .comming-items__row {
        flex-direction: column;
        align-items: stretch;
    }
}
</style>