<?php include_once './header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIX ID News</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    // Kết nối đến cơ sở dữ liệu
    require_once("db_module.php");
    $link = NULL;
    $result = null;
    taoKetNoi($link);
    ?>
    <main>
        <div class="filter">
            <?php
            $current_category_id = isset($_GET['news_category_id']) ? $_GET['news_category_id'] : null;
            ?>
            <!-- Danh sách thể loại tin tức -->
            <div class="category_list">
                <ul>
                    <li><a href='news.php' <?php if (!$current_category_id)
                                                        echo 'class="selected"' ?>>Mới
                            nhất</a></li>
                    <?php
                    // Truy vấn để lấy danh sách thể loại tin tức
                    $sql_categories = "SELECT * FROM news_categories";
                    $result_categories = $link->query($sql_categories);

                    if ($result_categories->num_rows > 0) {
                        while ($row_category = $result_categories->fetch_assoc()) {
                            $category_id = $row_category["news_category_id"];
                            $category_name = $row_category["news_category_name"];
                    ?>
                            <li><a href='news.php?news_category_id=<?php echo $category_id ?>' <?php if ($current_category_id == $category_id)
                                                                                                            echo 'class="selected"' ?>><?php echo $category_name ?></a></li>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </ul>
            </div>
            <!-- Ô tìm kiếm -->
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search...">
                <button id="searchButton"><img src="./images/search_icon.svg" alt="Search Icon"></button>
                <button id="clearSearch"><i class="fa fa-trash-o" style="font-size:20px ; color: #333"></i></button>
            </div>

        </div>

        <div class="">
            <?php
            // Xử lý lọc tin tức theo danh mục
            $news_category_id = isset($_GET['news_category_id']) ? $_GET['news_category_id'] : null;

            // Check if the news category is not "Mới nhất" (Latest)
            if ($news_category_id !== null && $news_category_id !== '') {
                // Truy vấn để lấy tin tức theo danh mục được chọn
                $sql_news = "SELECT news.*, news_categories.news_category_name 
        FROM news 
        INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id";
                if ($news_category_id) {
                    $sql_news .= " WHERE news.news_category_id = $news_category_id";
                }
                $sql_news .= " ORDER BY news_date DESC LIMIT 3";

                $result_news = $link->query($sql_news);

                if ($result_news->num_rows > 0) {
                    // Hiển thị tin tức theo danh mục đã chọn
                    echo '<div class="collection_items">';
                    while ($row_news = $result_news->fetch_assoc()) {
                        echo "<article>";
                        echo "<img src='" . $row_news["news_banner_src"] . "'>";
                        echo "<div class='wrapper'>";
                        echo "<p class='category'>" . $row_news["news_category_name"] . "</p>";
                        echo "<h2 class='mt-2'>" . $row_news["news_title"] . "</h2>";
                        echo "<span class='body_shade600 line_clamp'>" . $row_news["news_content"] . "</span>";
                        echo "</div>";
                        echo "</article>";
                    }
                    echo '</div>';
                } else {
                    echo "0 results";
                }
            }
            ?>

        </div>

        <?php
        if (!$news_category_id) {
        ?>
            <div class="spotlight_items" id="1">
                <?php
                // Truy vấn để lấy tin tức nổi bật
                $sql_spotlight = "SELECT news.*, news_categories.news_category_name 
                      FROM news 
                      INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id 
                      WHERE news.news_category_id = 1 
                      ORDER BY news_date DESC
                      LIMIT 2";
                $result_spotlight = $link->query($sql_spotlight);

                if ($result_spotlight->num_rows > 0) {
                    $order = 1; // Khởi tạo biến order

                    // Hiển thị dữ liệu từ cơ sở dữ liệu
                    while ($row_spotlight = $result_spotlight->fetch_assoc()) {
                        // Thêm class và order cho phần tử
                        echo "<img src='" . $row_spotlight["news_banner_src"] . "' class='spotlight_img" . $order . "'>";
                        echo "<div class='spotlight_text" . $order . "'>";
                        echo "<p class='category'>" . $row_spotlight["news_category_name"] . "</p>";
                        echo "<h1 class='mt-2'>" . $row_spotlight["news_title"] . "</h1>";
                        echo "<span class='body_shade600 line_clamp mt-2'>" . $row_spotlight["news_content"] . "</span>";
                        echo "<h3 class='mt-1'>" . date("d/m/Y", strtotime($row_spotlight["news_date"])) . "</h3>";
                        echo "</div>";

                        $order++; // Tăng giá trị của biến order cho mỗi phần tử
                        $excluded_ids[] = $row_spotlight["news_id"];
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>


            <div class="review_items" id="2">
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
                        echo "<article>";
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

            <div class="collection_items" id="3">
                <?php
                // Truy vấn để lấy tất cả tin tức trừ những tin được hiển thị phía trên
                $sql_collection = "SELECT news.*, news_categories.news_category_name 
             FROM news 
             INNER JOIN news_categories ON news.news_category_id = news_categories.news_category_id 
             WHERE news.news_id NOT IN (" . implode(",", $excluded_ids) . ")
             LIMIT 3";
                $result_collection = $link->query($sql_collection);

                if ($result_collection->num_rows > 0) {
                    // Hiển thị dữ liệu từ cơ sở dữ liệu
                    while ($row_collection = $result_collection->fetch_assoc()) {
                        echo "<article>";
                        echo "<img src='" . $row_collection["news_banner_src"] . "'>";
                        echo "<div class='wrapper'>";
                        echo "<p class='category'>" . $row_collection["news_category_name"] . "</p>";
                        echo "<h2 class='mt-2'>" . $row_collection["news_title"] . "</h2>";
                        echo "<span class='body_shade600 line_clamp'>" . $row_collection["news_content"] . "</span>";
                        echo "</div>";
                        echo "</article>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        <?php
        }
        ?>

        <div class="center">
            <?php if (!$news_category_id) { ?>
                <button id="loadMoreNews" style="display: none;">Xem thêm</button>
            <?php } else { ?>
                <button id="loadMoreNews">Xem thêm</button>
            <?php } ?>

            <?php if ($news_category_id) { ?>
                <button id="loadMoreCollection" style="display: none;">Xem thêm</button>
            <?php } else { ?>
                <button id="loadMoreCollection">Xem thêm</button>
            <?php } ?>

        </div>



        <!-- Nút xem thêm vs ô tìm kiếm -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const loadMoreButton = document.querySelector('.center button');
                const searchButton = document.getElementById('searchButton');
                const searchInput = document.getElementById('searchInput');
                let offset = 3;
                const limit = 3;

                loadMoreButton.addEventListener('click', function() {
                    // Code load more items here...
                });

                searchButton.addEventListener('click', function() {
                    const searchQuery = searchInput.value.trim();
                    if (searchQuery !== '') {
                        const xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    document.querySelector('.collection_items').innerHTML = xhr.responseText;
                                } else {
                                    console.error('Failed to fetch search results.');
                                }
                            }
                        };
                        xhr.open('GET', 'search.php?search_query=' + searchQuery, true);
                        xhr.send();
                    }
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const loadMoreNewsButton = document.getElementById('loadMoreNews');
                const loadMoreCollectionButton = document.getElementById('loadMoreCollection');
                let newsOffset = 3;
                let collectionOffset = 3;
                const limit = 3;

                loadMoreNewsButton.addEventListener('click', function() {
                    const newsCategoryId = <?php echo json_encode($news_category_id); ?>;

                    const xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Chèn HTML trả về vào cuối phần hiển thị tin tức
                                document.querySelector('.collection_items').insertAdjacentHTML('beforeend', xhr.responseText);
                                // Tăng offset lên để lấy tin tức tiếp theo
                                newsOffset += limit;
                            } else {
                                console.error('Failed to fetch news items.');
                            }
                        }
                    };

                    // Gửi yêu cầu AJAX với tham số offset và limit
                    xhr.open('GET', 'get_more_news.php?offset=' + newsOffset + '&limit=' + limit + '&news_category_id=' + newsCategoryId, true);
                    xhr.send();
                });

                loadMoreCollectionButton.addEventListener('click', function() {
                    const xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Chèn HTML trả về vào cuối phần hiển thị bộ sưu tập
                                document.querySelector('.collection_items').insertAdjacentHTML('beforeend', xhr.responseText);
                                // Tăng offset lên để lấy bộ sưu tập tiếp theo
                                collectionOffset += limit;
                            } else {
                                console.error('Failed to fetch collection items.');
                            }
                        }
                    };

                    // Gửi yêu cầu AJAX với tham số offset và limit
                    xhr.open('GET', './get_more_collection_items.php?offset=' + collectionOffset + '&limit=' + limit, true);
                    xhr.send();
                });
            });
        </script>

        <!-- <script>
            document.addEventListener("DOMContentLoaded", function () {
                const loadMoreButton = document.querySelector('.center button');
                let offset = 3;
                const limit = 3;
                loadMoreButton.addEventListener('click', function () {
                    const xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                document.querySelector('.collection_items').insertAdjacentHTML('beforeend', xhr.responseText);
                                offset += limit;
                            } else {
                                console.error('Failed to fetch news items.');
                            }
                        }
                    };
                    xhr.open('GET', 'get_more_collection_items.php?offset=' + offset + '&limit=' + limit, true);
                    xhr.send();
                });
            });
        </script> -->

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const loadMoreButton = document.querySelector('.center button');
                const searchButton = document.getElementById('searchButton');
                const searchInput = document.getElementById('searchInput');
                let offset = 3;
                const limit = 3;

                loadMoreButton.addEventListener('click', function() {
                    // Code load more items here...
                });

                searchButton.addEventListener('click', function() {
                    const searchQuery = searchInput.value.trim();
                    if (searchQuery !== '') {
                        const xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    document.querySelector('.collection_items').innerHTML = xhr.responseText;
                                } else {
                                    console.error('Failed to fetch search results.');
                                }
                            }
                        };
                        xhr.open('GET', 'search_result.php?search_query=' + searchQuery, true);
                        xhr.send();
                    }
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const loadMoreButton = document.querySelector('.center button');
                const searchButton = document.getElementById('searchButton');
                const searchInput = document.getElementById('searchInput');
                let offset = 3;
                const limit = 3;
                const collectionItems = document.querySelector('.collection_items');

                loadMoreButton.addEventListener('click', function() {
                    // Code load more items here...
                });

                searchButton.addEventListener('click', function() {
                    const searchQuery = searchInput.value.trim();
                    if (searchQuery !== '') {
                        const xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    // Ẩn các phần khác
                                    document.querySelector('.spotlight_items').style.display = 'none';
                                    document.querySelector('.review_items').style.display = 'none';

                                    // Hiển thị kết quả tìm kiếm
                                    collectionItems.innerHTML = xhr.responseText;
                                    collectionItems.style.display = 'block';
                                } else {
                                    console.error('Failed to fetch search results.');
                                }
                            }
                        };
                        xhr.open('GET', 'search.php?search_query=' + searchQuery, true);
                        xhr.send();
                    }
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const searchButton = document.getElementById('searchButton');
                const searchInput = document.getElementById('searchInput');
                const clearSearchButton = document.getElementById('clearSearch');
                const collectionItems = document.querySelector('.collection_items');
                let excluded_ids = [];

                searchButton.addEventListener('click', function() {
                    // Xử lý tìm kiếm ở đây
                });

                clearSearchButton.addEventListener('click', function() {
                    // Xóa giá trị của ô nhập liệu
                    searchInput.value = '';
                    // Reload lại trang web
                    location.reload();
                });
            });
        </script>
    </main>

    <?php
    giaiPhongBoNho($link, $result);
    ?>

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
            flex-wrap: wrap;
            margin-block-end: 0.75em;
            margin-inline-start: 0.5em;
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
            padding: 0 10%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .spotlight_text2 {
            order: 3;
            padding: 0 10%;
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
            padding-bottom: 3rem;
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
            transform: translateY(-10px);
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        }

        button {
            --tw-border-opacity: 1;
            --tw-bg-opacity: 1;
            --tw-text-opacity: 1;
            background-color: rgb(41 41 41 / var(--tw-bg-opacity));
            border-color: rgb(41 41 41 / var(--tw-border-opacity));
            border-width: 1px;
            color: rgb(255 255 255 / var(--tw-text-opacity));

            align-items: center;
            border-radius: 32px;
            display: inline-flex;
            justify-content: center;

            height: 48px;
            padding: 0.75rem 1.5rem;
            margin: 1.25rem 0;

            text-transform: uppercase;
            transition-duration: 0.3s;
            vertical-align: middle;
            font-weight: 600;
            text-align: center;
            white-space: nowrap;
        }

        .center {
            text-align: center;
        }

        button:hover {
            background-color: rgb(41 41 41 / calc(var(--tw-bg-opacity) - 0.9));
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 36px;
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

            .category_list {
                margin-bottom: 1rem;
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
    </style>
</body>

</html>