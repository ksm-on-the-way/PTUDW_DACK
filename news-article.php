<!-- <div class="news-container">
    <div class="heading">
        <div>
            <div class="heading-title">TIN TỨC</div>
            <div class="heading-description">
                Những tin tức mới nhất về thế giới điện ảnh dành cho bạn!
            </div>
        </div>
        <div class="show-all" onclick = "redirectToNews()">Xem tất cả</div>
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
<script>
    function redirectToNews(){
        window.location.href = "./news.php";
    }
</script>
<style>
.news-container {
    display: flex;
    flex-direction: column;
    width: 100%;
    margin: 0 auto;
    margin-top: 50px;

}

@media (min-width: 768px) {
    .news-container {
        max-width: 1300px;
        margin-top: 100px;
    }
}

.news-container .heading {
    display: flex;
    width: 100%;
    gap: 20px;

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

.news-container .heading .show-all:hover{
    cursor: pointer;
}

@media (min-width: 768px) {
    .news-container .heading .show-all {

        flex-grow: 1;

    }
}

.news-items__container {
    margin-top: 42px;
    width: 100%;
    padding: 0 20px;
}

@media (min-width: 768px) {
    .news-items__container {

        padding: unset;

    }
}

@media (max-width: 991px) {
    .news-items__container {
        max-width: 100%;
        margin-top: 30px;
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
</style> -->
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

main {
    margin: 0 5%;
}

:host,
html {
    -webkit-text-size-adjust: 100%;
    font-family: "Roboto", sans-serif;
}

h1,
h2,
h6 {
    font-weight: 700;
}

h3,
h4,
h5 {
    font-weight: 500;
}

p {
    font-weight: 400;
    font-size: 16px;
    line-height: 1.5;
}

h1 {
    font-size: 56px;
}

h2 {
    font-size: 36px;
}

h3 {
    font-size: 24px;
}

.mt-1 {
    font-size: 1.3rem;
    margin-top: 1.5rem;
    color: #5a637a;
    opacity: 80%;
}

.mt-2 {
    margin-top: 0.5rem;
}

.mt-6 {
    margin-bottom: 1.2rem;

}

.filter {
    border-bottom: 2px solid #ddd;
    margin-bottom: 1.25em;
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
}

ul {
    --category-list-width: 30%;
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    margin-block-end: 0.5em;
}

.selected {
    color: #FF6B6B;
    transition: color 0.3s ease;
}

.selected:hover {
    transform: scale(1.1);
}

.selected:active {
    opacity: 0.8;
}


li {
    padding: 1.5rem;
    width: calc(var(--category-list-width) + 1);
}

.category_list ul li a {
    transition: color 0.3s, transform 0.3s;
}

.category_list ul li a:hover {
    color: #5a637a;
    transform: scale(1.1);
}

a {
    font-weight: 500;
    display: inline-block;
    font-size: 16px;
    font-style: normal;
    line-height: 1.4;
    letter-spacing: -0.12px;
    color: #5f5f5f;

    transition: all 0.3s;

    text-decoration: none;
    background-color: transparent;
}

.search-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #fcfcfc;
    margin-top: 1rem;
    padding-left: 30px;
    border-radius: 6px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    width: 30rem;
    height: 2.8rem;
    overflow: hidden;
}

.search-box input[type="text"] {
    flex: 1;
    border: none;
    font-size: 15px;
    opacity: 50%;
    outline: none;
    background-color: #fcfcfc;
    color: #333;
}

.search-box button {
    align-items: center;
    border: none !important;
    cursor: pointer;
    background-color: #fcfcfc;
    padding: 1rem;
    margin-right: 0.2rem;
    opacity: 50%;
}

.search-box button img {
    height: 15px;
}

.search-box button:hover {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 100px;
}

.spotlight_items {
    padding-top: 2rem;
    margin-bottom: 4rem;
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    column-gap: 8%;
    row-gap: 10%;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10rem;
}

.spotlight_img1 {
    order: 1;
    width: 100%;
    border-radius: 12px;
    max-height: 410px;
    object-fit: cover;
}

.spotlight_img2 {
    order: 4;
    width: 100%;
    border-radius: 12px;
    max-height: 410px;
    object-fit: cover;
}

.spotlight_text1 {
    order: 2;
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.spotlight_text2 {
    order: 3;
    display: flex;
    justify-content: center;
    flex-direction: column;
}


.line_clamp {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: pre-wrap;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}

.category {
    border: 1px solid rgba(90, 99, 122, 0.5);
    padding: 0.5rem 1rem;
    width: fit-content;
    color: #5a637a;
    font-weight: 300;
    opacity: 60%;
}

.description {
    margin-bottom: 2rem;
    color: #414a62;
}

.body_shade600 {
    color: #5a637a;
}

.review_items img,
.collection_items img,
.spotlight_items img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

article {
    display: flex;
    flex-direction: column;
    position: relative;
    width: 30%;
    min-height: 20rem;
    padding: 1.25rem;
    border-radius: 10px;
}

.review_items article {
    border: 1px solid rgba(90, 99, 122, 0.2);
}

.review_items {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 0 auto;
    width: 100%;
    /* padding-bottom: 3rem; */
    max-width: 1300px;
    cursor: pointer;
}

.review_items .category {
    font-size: 12px;
    padding: 0.25rem 0.375rem;
}

.review_items img {
    flex-grow: 1;
    width: 100%;
    max-height: 70%;
    border-radius: 12px;
    object-fit: cover;
    overflow: hidden;
}

.review_items p {
    font-size: 12px;
    color: #5a637a;
}

.mt-5 {
    position: absolute;
    bottom: 0;
    margin-bottom: 1rem;
}

.review_items h3 {
    font-style: bolder;
}

.review_items .category {
    border-color: #5a637a;
    color: #5a637a;
}

.collection_items article img {
    border-radius: 20px;
    max-width: 30%;
    height: auto;
    display: block;
    object-fit: cover;
    overflow: hidden;
}

.wrapper {
    gap: 0.5rem;
    margin-left: 5%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.collection_items article {
    width: 100%;
    flex-direction: row;
    border-radius: 0;
    border-top: 1px solid #ddd;
}

.spotlight_items img,
.review_items article,
.collection_items article img {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.spotlight_items img:hover,
.review_items article:hover,
.collection_items article img:hover {
    transform: translateY(-2px);
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

.spotlight_text1 h1:hover,
.spotlight_text2 h1:hover,
.collection_items h2:hover {
    text-decoration: underline;
    cursor: pointer;
}

button {
    background-color: rgb(26 44 80);
    color: rgb(255 255 255);
    border-style: none;

    align-items: center;
    border-radius: 8px;
    display: inline-flex;
    justify-content: center;

    height: 48px;
    padding: 0.75rem 1.5rem;
    margin: 1.25rem 0;

    text-transform: uppercase;
    transition-duration: 0.3;
    vertical-align: middle;
    font-weight: 600;
    text-align: center;
    white-space: nowrap;
}

.center {
    text-align: center;
}

button:hover {
    background-color: rgb(40 39 100);
}

button:active {
    background-color: rgb(56 55 130);
}

button:disabled {
    background-color: #dadfe8;
    color: #9DA8BE;

}

@media (max-width: 768px) {
    h1 {
        font-size: 36px;
    }

    .category_list ul {
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        scroll-snap-type: x mandatory;
        scroll-padding-left: 30px;
        -ms-overflow-style: none;
        scrollbar-width: none;
        margin-block-end: 0;
    }

    .category_list ul li {
        display: inline-block;
    }

    .mt-1 {
        font-size: 1rem;
        margin-top: 1rem;
    }

    .spotlight_items {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding-bottom: 50px;
        display: flex;
        flex-direction: column;
        align-content: center;
    }

    .spotlight_img2 {
        order: 3;
        width: 100%;
        border-radius: 12px;
        max-height: 410px;
        object-fit: cover;
    }

    .spotlight_img2 {
        order: 3;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .spotlight_text1,
    .spotlight_text2 {
        margin-top: 1rem;
    }

    .review_items {
        gap: 1rem;
    }

    .review_items article {
        width: 100%;
    }

    .collection_items article img {
        max-width: 100%;
        margin-bottom: 1rem;
    }

    .category {
        font-size: 12px;
        padding: 0.25rem 0.375rem;
    }

    .collection_items h2 {
        font-size: 24px;
    }

    .collection_items article {
        flex-direction: column;
        border-top: none;
    }

    .search-box {
        width: 100%;
        padding: 0 1rem;
    }

    .filter {
        display: flex;
        flex-direction: column-reverse;
    }
}

@media screen and (max-width: 1600) and (min-width: 600px) {
    .spotlight_items {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding-bottom: 50px;
    }

    .mt-2 {
        font-size: 1rem;
    }
}

.review_items .heading {
    display: flex;
    width: 100%;
    gap: 20px;
    margin-bottom: 30px;

}


@media (max-width: 991px) {
    .review_items .heading {
        max-width: 100%;
        flex-wrap: wrap;
    }
}

.review_items .heading .heading-title {
    color: var(--Shade-900, #333);
    font: 500 24px/133% Roboto, sans-serif;
}

.review_items .heading .heading-description {
    color: var(--Shade-600, #5a637a);
    margin-top: 21px;
    font: 400 16px/150% Roboto, sans-serif;
}

.review_items .heading .show-all {
    color: var(--Sky-blue, #118eea);
    text-align: right;
    align-self: start;

    flex-basis: auto;
    font: 500 24px/133% Roboto, sans-serif;
}

.review_items .heading .show-all:hover {
    cursor: pointer;
}

@media (min-width: 768px) {
    .review_items .heading .show-all {

        flex-grow: 1;

    }
}
</style>
<div class="review_items">
    <div class="heading">
        <div>
            <div class="heading-title">TIN TỨC</div>
            <div class="heading-description">
                Những tin tức mới nhất về thế giới điện ảnh dành cho bạn!
            </div>
        </div>
        <div class="show-all" onclick="redirectToNews()">Xem tất cả</div>
    </div>
    <?php
    // Truy vấn để lấy tin tức phổ biến
    $sql_review = "SELECT news.*, news_categories.news_category_name 
                                FROM news 
                                INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id 
                                WHERE news.news_category_id = 2 
                                ORDER BY news_date DESC
                                LIMIT 3";
    $result_review = $link->query($sql_review);

    if ($result_review->num_rows > 0) {
        // Hiển thị dữ liệu từ cơ sở dữ liệu
        while ($row_review = $result_review->fetch_assoc()) {
            echo "<article onclick = 'redirectToNewsDetail(" . $row_review['news_id'] . ")'>";
            echo "<img src='" . $row_review["news_banner_src"] . "'>";
            echo "<p class='category mt-2'>" . $row_review["news_category_name"] . "</p>";
            echo "<h3 class='mt-2'>" . $row_review["news_title"] . "</h3>";
            echo "<p class='mt-2'>" . date("d/m/Y", strtotime($row_review["news_date"])) . "</p>";
            echo "</article>";
            // Lưu ID của tin tức đã hiển thị để loại bỏ chúng khỏi truy vấn tiếp theo
            $excluded_ids[] = $row_review["news_id"];
        }
    } else {
        echo "0 results";
    }
    ?>
</div>
<script>
function redirectToNewsDetail(id) {
    window.location.href = "./news-detail.php?id=" + id;
}
</script>