<style>
.dashboard-admin__container {
    width: 100%;
    max-width: 1075px;
    margin: 0 auto;
    margin-top: 30px;
}

.dashboard-admin__container .dashboard-admin__heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.dashboard-admin__container .dashboard-admin__heading .title {
    color: #4F4F4F;
    font: 600 24px/137% Inter, sans-serif;

}

.card-chart__container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    column-gap: 20px;
    margin-top: 20px;
}

.card-chart__container .card-item {
    width: calc(100% - 40px);
    background-color: #F4F5F7;
    border-radius: 8px;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 20px;

}

.card-chart__container .card-item .label {
    color: var(--Secondary, #64748b);
    margin-top: 16px;
    font: 400 14px/150% Inter, sans-serif;
}

.card-chart__container .card-item .value {
    color: var(--Dark, #1e293b);
    letter-spacing: -0.8px;
    margin-top: 8px;
    font: 600 24px/137% Inter, sans-serif;
}

.chart-container {
    display: flex;
    margin-top: 20px;
}

.chart-container #earning {
    height: 300px !important;
}
</style>
<?php
require_once './db_module.php';

// Kết nối đến cơ sở dữ liệu
$link = null;
taoKetNoi($link);
$query = "SELECT 
            DATE_FORMAT(res.reservation_time, '%Y-%m') AS reservation_month,
            SUM(rt.room_price) AS total_price
        FROM 
            reservations res
        JOIN 
            reservation_details rd ON res.reservation_id = rd.rsv_id
        JOIN 
            seats s ON rd.seat_id = s.seat_id
        JOIN 
            rooms r ON s.room_id = r.room_id
        JOIN 
            room_types rt ON r.room_type_id = rt.room_type_id
        GROUP BY 
            reservation_month
        ORDER BY
            reservation_month";
$result = chayTruyVanTraVeDL($link, $query);
$data = array_fill(0, 12, 0); // Khởi tạo mảng 12 phần tử có giá trị ban đầu là 0

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Lấy chỉ số của tháng từ chuỗi 'YYYY-MM'
        $month_index = intval(substr($row['reservation_month'], 5)) - 1;
        // Gán giá trị total_price vào mảng tại vị trí tháng tương ứng
        $data[$month_index] = intval($row['total_price']);
    }
}

$totalRevenueQuery = "SELECT SUM(rt.room_price) AS total_revenue
                    FROM reservations res
                    JOIN reservation_details rd ON res.reservation_id = rd.rsv_id
                    JOIN seats s ON rd.seat_id = s.seat_id
                    JOIN rooms r ON s.room_id = r.room_id
                    JOIN room_types rt ON r.room_type_id = rt.room_type_id";

$totalMovieQuery = "SELECT COUNT(c.movie_id) AS total_movie
                    FROM movies c";

$totalCustomerQuery = "SELECT COUNT(c.user_id) AS total_customer
                    FROM users c";

$totalOrdersQuery = "SELECT COUNT(res.reservation_id) AS total_orders
                    FROM reservations res";

// Execute queries
$totalRevenueResult = chayTruyVanTraVeDL($link, $totalRevenueQuery);
$totalMovieResult = chayTruyVanTraVeDL($link, $totalMovieQuery);
$totalCustomerResult = chayTruyVanTraVeDL($link, $totalCustomerQuery);
$totalOrdersResult = chayTruyVanTraVeDL($link, $totalOrdersQuery);

// Fetch values
$totalRevenue = mysqli_fetch_assoc($totalRevenueResult)['total_revenue'];
$totalMovie = mysqli_fetch_assoc($totalMovieResult)['total_movie'];
$totalCustomer = mysqli_fetch_assoc($totalCustomerResult)['total_customer'];
$totalOrders = mysqli_fetch_assoc($totalOrdersResult)['total_orders'];


// Giải phóng bộ nhớ sau khi sử dụng
giaiPhongBoNho($link, $result);
?>
<div class='dashboard-admin__container'>
    <div class='dashboard-admin__heading'>
        <div class='title'>
            Báo cáo
        </div>
    </div>
    <div class='card-chart__container'>
        <div class='card-item'>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/516e0ff0c4aa48ad1a4952b12b2ab9e050c5b491f1d041c0d28df5aed8d08d59?"
                class="img" />
            <div class="label">Total Movies</div>
            <div class="value">
                <?php echo $totalMovie; ?>
            </div>
        </div>
        <div class='card-item'>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c06ce7cda5444680e52dd40e0591e94afcc49a35d107e38043aa5dcabc6cf2a?"
                class="img" />
            <div class="label">Total Revenue</div>
            <div class="value">
                <?php echo number_format($totalRevenue, 0, ',', ',') . ' VNĐ'; ?>
            </div>
        </div>
        <div class='card-item'>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/395ffe4f85fa8826c4f42d771531fce130549b526fabf1d5b8ffda4c12d4de0a?"
                class="img" />
            <div class="label">Total Customer</div>
            <div class="value">
                <?php echo $totalCustomer; ?>
            </div>
        </div>
        <div class='card-item'>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/ce901b49f2d0ab854a1a932527c8c0c495f179bca7300797307662fbb3845068?"
                class="img" />
            <div class="label">Total Orders</div>
            <div class="value">
                <?php echo $totalOrders; ?>
            </div>
        </div>
    </div>
    <div class='chart-container'>
        <canvas id='earning'></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var earning = document.getElementById('earning').getContext('2d');
var myChart = new Chart(earning, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'
        ],
        datasets: [{
            label: 'Revenue',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',

            ]
        }]
    }
})
</script>