<div class="news-container">
    <div class="heading">
        <div>
            <div class="heading-title">TIX ID News</div>
            <div class="heading-description">
                Berita tentang dunia perfilman terbaru untuk anda!
            </div>
        </div>
        <div class="show-all">Lihat Semua</div>
    </div>
    <div class="news-items__container">
        <div class="news-items__row">
            <div class="news-item">
                <img loading="lazy" srcset="./images/news-img1.png" class="img" />
                <div class="description-box">Spotlight</div>
                <div class="title">
                    Spider-Man: No Way Home Rilis Trailer Terbaru.
                </div>
                <div class="date">08 Nov 2021 | TIX ID</div>
            </div>
            <div class="news-item">
                <img loading="lazy" srcset="./images/news-img1.png" class="img" />
                <div class="description-box">Spotlight</div>
                <div class="title">
                    Spider-Man: No Way Home Rilis Trailer Terbaru.
                </div>
                <div class="date">08 Nov 2021 | TIX ID</div>
            </div>
            <div class="news-item">
                <img loading="lazy" srcset="./images/news-img1.png" class="img" />
                <div class="description-box">Spotlight</div>
                <div class="title">
                    Spider-Man: No Way Home Rilis Trailer Terbaru.
                </div>
                <div class="date">08 Nov 2021 | TIX ID</div>
            </div>
        </div>
    </div>
</div>
<style>
.news-container {
    display: flex;
    flex-direction: column;
    width: 100%;
    margin: 0 auto;
}

@media (min-width: 768px) {
    .news-container {
        width: 1300px;
    }
}

.news-container .heading {
    display: flex;
    width: 100%;
    gap: 20px;

}

@media (min-width: 768px) {
    .news-container .heading {
        padding: 0 20px;
    }
}

@media (max-width: 991px) {
    .news-container .heading {
        max-width: 100%;
        flex-wrap: wrap;
    }
}

.news-container .heading .heading-title {
    color: var(--Shade-900, #333);
    font: 500 24px/133% Roboto, sans-serif;
}

.news-container .heading .heading-description {
    color: var(--Shade-600, #5a637a);
    margin-top: 21px;
    font: 400 16px/150% Roboto, sans-serif;
}

.news-container .heading .show-all {
    color: var(--Sky-blue, #118eea);
    text-align: right;
    align-self: start;

    flex-basis: auto;
    font: 500 24px/133% Roboto, sans-serif;
}

@media (min-width: 768px) {
    .news-container .heading .show-all {

        flex-grow: 1;

    }
}

.news-items__container {
    margin-top: 52px;
    width: 100%;
    padding: 0 20px;
}

@media (max-width: 991px) {
    .news-items__container {
        max-width: 100%;
        margin-top: 40px;
        padding: unset;
    }
}

.news-items__row {
    gap: 20px;
    display: flex;
}

@media (max-width: 991px) {
    .news-items__row {
        flex-direction: column;
        align-items: stretch;
        gap: 0px;
    }
}

.news-item {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 33%;
    margin-left: 0px;
    color: var(--Shade-900, #333);
    font-weight: 400;
}

@media (max-width: 991px) {
    .news-item {
        width: 100%;
    }
}


.news-item .img {
    aspect-ratio: 1.75;
    object-fit: auto;
    object-position: center;
    width: 100%;
}

.news-item .description-box {
    justify-content: center;
    border-color: rgba(51, 61, 88, 1);
    border-style: solid;
    border-width: 1px;
    align-self: start;
    margin-top: 40px;
    white-space: nowrap;
    padding: 8px 12px;
    font: 12px Roboto, sans-serif;
}

@media (max-width: 991px) {
    .news-item .description-box {
        white-space: initial;
    }
}

.news-item .title {
    margin-top: 14px;
    font: 500 24px/32px Roboto, sans-serif;
}

.news-item .date {
    color: var(--Shade-600, #5a637a);
    margin-top: 18px;
    font: 16px/150% Roboto, sans-serif;
}
</style>