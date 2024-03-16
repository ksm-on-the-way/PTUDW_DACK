<?php
include_once "header.php"
?>
<html>
<head>
    <link rel="stylesheet" href="comingsoon.css">
</head>
<body>
<div class= "head">
    <div class="comingsoon_head">Sắp chiếu</div>
    <div class="comingsoon_subtitle">Chờ đợi chúng đến rạp chiếu phim yêu thích của bạn!</div>
</div>
<div class="container_flex">
<div class="container">
    <?php
        // Your database connection logic goes here
        // Fetch data from your database and return as JSON

        // For demonstration purposes, let's say you have an array of data
        $data = [
            ['id' => 1, 'title' => 'Item 1', 'description' => 'Description for Item 1'],
            ['id' => 2, 'title' => 'Item 2', 'description' => 'Description for Item 2'],
            ['id' => 3, 'title' => 'Item 3', 'description' => 'Description for Item 3'],
            ['id' => 4, 'title' => 'Item 4', 'description' => 'Description for Item 4'],
            ['id' => 5, 'title' => 'Item 5', 'description' => 'Description for Item 5'],
            // Add more data as needed
        ];

        // Loop through the data and display cards
        $rowCount = 0;
        foreach ($data as $item) {
            echo '<div class="card-row">';
            echo '<div class="card">';
            echo '<h2>' . $item['title'] . '</h2>';
            echo '<p>' . $item['description'] . '</p>';
            echo '</div>';
            $rowCount++;
        }
    ?>
</div>
</div>

</body>
</html>


