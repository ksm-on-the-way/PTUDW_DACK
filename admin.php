<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        * {
            margin: 0px;
        }

        .admin-management {
            display: grid;
            grid-template-columns: auto 1fr;
            width: 100%;
            height: 100vh;
        }

        .sidebar {
            background-color: #1a2c50;
            display: flex;
            max-width: 241px;
            flex-direction: column;
            align-items: center;
            font-size: 16px;
            color: #fff;
            font-weight: 400;
            line-height: 150%;
            padding: 25px 25px 80px;
        }

        .logo {
            aspect-ratio: 1.96;
            object-fit: auto;
            object-position: center;
            width: 119px;
            max-width: 100%;
        }

        .welcome-text {
            font-family: Roboto, sans-serif;
            border-radius: 8px;
            margin-top: 32px;
            white-space: nowrap;
            justify-content: center;
        }

        .menu-container {
            align-self: stretch;
            display: flex;
            margin-top: 67px;
            flex-direction: column;
            row-gap: 16px;
        }

        .menu-item {
            justify-content: space-between;
            border-radius: 4px;
            display: flex;
            gap: 20px;
            cursor: pointer;
            padding: 8px 16px;
        }

        .menu-item-active {
            background-color: #ffbe00;
        }

        .menu-item-default {
            background-color: #118eea;
        }

        .menu-item-content {
            display: flex;
            gap: 16px;
        }

        .menu-item-icon {
            aspect-ratio: 1;
            object-fit: auto;
            object-position: center;
            width: 16px;
            margin: auto 0;
        }

        .menu-item-text {
            font-family: Roboto, sans-serif;
        }

        .menu-item-arrow {
            aspect-ratio: 0.6;
            object-fit: auto;
            object-position: center;
            width: 6px;
            stroke-width: 2px;
            stroke: #fff;
            border-color: rgba(255, 255, 255, 1);
            border-style: solid;
            border-width: 2px;
            margin: auto 0;
        }

        .menu-item-text-multiline {
            line-height: 24px;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: center;
            padding: 8px 60px;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 1);
            font-size: 18px;
            font-weight: 500;
            color: var(--Pastel-Yellow, #f2c46f);
            text-align: center;
        }

        @media (max-width: 991px) {
            .header {
                padding: 0 20px;
            }
        }

        .user-info {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
        }

        @media (max-width: 991px) {
            .user-info {
                margin-right: 10px;
            }
        }

        .user-avatar {
            width: 32px;
            aspect-ratio: 1;
            object-fit: cover;
            object-position: center;
            margin: auto 0;
        }

        .logout-button {
            padding: 12px 8px;
            font-family: Roboto, sans-serif;
            background-color: var(--Royal-Blue, #1a2c50);
            border-radius: 5.067px;
            color: inherit;
            cursor: pointer;
        }
    </style>

    <div class="admin-management">
        <div class="sidebar">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d9143cf1fb8d6fc12272f9775cc3aeff77b9839d32e73495b6a9cf83d7d9c3b7?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Logo" class="logo" />
            <h2 class="welcome-text">Welcome</h2>
            <div class="menu-container">
                <div onclick="redirectTo('cinema-management')" class="<?php echo isset($_GET['handle']) && ($_GET['handle'] == 'cinema-management' || $_GET['handle'] == 'create-cinema' || $_GET['handle'] == 'edit-cinema') || !isset($_GET['handle']) ? 'menu-item menu-item-active' : 'menu-item menu-item-default'; ?>">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1645334a3bbbbf67bb257cdcb36aa05979f059c53a4ab1b308f97b9a5bf22a2f?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý rạp icon" class="menu-item-icon" />
                        <span class="menu-item-text">Quản lý rạp</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div onclick="redirectTo('film-management')" class="<?php echo isset($_GET['handle']) && ($_GET['handle'] == 'film-management' || $_GET['handle'] == 'create-movie' || $_GET['handle'] == 'edit-movie')  ? 'menu-item menu-item-active' : 'menu-item menu-item-default'; ?>">

                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1645334a3bbbbf67bb257cdcb36aa05979f059c53a4ab1b308f97b9a5bf22a2f?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý phim icon" class="menu-item-icon" />
                        <span class="menu-item-text">Quản lý phim</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div onclick="redirectTo('show-management')" class="<?php echo isset($_GET['handle']) && $_GET['handle'] == 'show-management' ? 'menu-item menu-item-active' : 'menu-item menu-item-default'; ?>">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1645334a3bbbbf67bb257cdcb36aa05979f059c53a4ab1b308f97b9a5bf22a2f?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Lên lịch chiếu icon" class="menu-item-icon" />
                        <span class="menu-item-text">Lên lịch chiếu</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div onclick="redirectTo('news-management')" class="<?php echo isset($_GET['handle']) && $_GET['handle'] == 'news-management' ? 'menu-item menu-item-active' : 'menu-item menu-item-default'; ?>">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/edf3b61290f0d8d6c17ab64b262286faf7283c49410ded99a4d96000414d0c34?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý bài viết icon" class="menu-item-icon" />
                        <span class="menu-item-text">Quản lý bài viết</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div onclick="redirectTo('report')" class="<?php echo isset($_GET['handle']) && $_GET['handle'] == 'report' ? 'menu-item menu-item-active' : 'menu-item menu-item-default'; ?>">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5382fea06edfd087c3c420b810d431f2de371ca0b53e50740652e7ecad029b87?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Xem báo cáo icon" class="menu-item-icon" />
                        <span class="menu-item-text">Xem báo cáo</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div onclick="redirectTo('food-management')" class="<?php echo isset($_GET['handle']) && ($_GET['handle'] == 'food-management'||$_GET['handle'] == 'create-food'||$_GET['handle'] == 'edit-food') ? 'menu-item menu-item-active' : 'menu-item menu-item-default'; ?>">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5382fea06edfd087c3c420b810d431f2de371ca0b53e50740652e7ecad029b87?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý đồ ăn icon" class="menu-item-icon" />
                        <span class="menu-item-text">Quản lý đồ ăn</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div onclick="redirectTo('user-management')" class="<?php echo isset($_GET['handle']) && $_GET['handle'] == 'user-management' ? 'menu-item menu-item-active' : 'menu-item menu-item-default'; ?>">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5554df1a377d30b44bcb9845c044dec02c6b2e4ad78606478e85ba3c42b9003b?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Quản lý người dùng icon" class="menu-item-icon" />
                        <span class="menu-item-text menu-item-text-multiline">Quản lý<br>người dùng</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d1f56a0d8d14a70950ba5a4e02499174d6ad1f18e94daca56d2614da3104b471?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
                <div onclick="redirectTo('change-password')" class="<?php echo isset($_GET['handle']) && $_GET['handle'] == 'change-password' ? 'menu-item menu-item-active' : 'menu-item menu-item-default'; ?>">
                    <div class="menu-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0dc8fa5f91f7673ed8b55eafd9703ee88d057f3b87ba663edaedff37d2eb4483?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Đổi mật khẩu icon" class="menu-item-icon" />
                        <span class="menu-item-text">Đổi mật khẩu</span>
                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe59e38e42cc9b61ab116a5b94255cd0b3258cd5dca2a48335db948db00bd06a?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="menu-item-arrow" />
                </div>
            </div>
        </div>
        <div class="header-content">
            <div class="header">
                <div class="user-info">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/88a804c5520def4dcdc79f06fa68269a7051516cb28777adf3b68509506917d3?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="User avatar" class="user-avatar" />
                    <button class="logout-button">Đăng xuất</button>
                </div>
            </div>
            <div class='content'>
                <?php
                // Kiểm tra tham số "handle" trong URL
                if (isset($_GET['handle'])) {
                    $handle = $_GET['handle'];
                    // Kiểm tra giá trị của tham số "handle" và include trang tương ứng
                    switch ($handle) {

                        case 'cinema-management':

                            include 'cinema-management.php';
                            break;
                        case 'create-cinema':
                            include 'create-cinema.php';
                            break;
                        case 'edit-cinema':
                            include 'edit-cinema.php';
                            break;

                        case 'film-management':
                            include 'film-management.php';
                            break;
                        case 'create-movie':
                            include 'create-movie.php';
                            break;
                        case 'edit-movie':
                            include 'edit-movie.php';
                            break;

                        case 'change-password':
                            include 'change-password.php';
                            break;
                        case 'show-management':
                            include 'show-management.php';
                            break;


                        case 'food-management':
                            include 'food-management.php';
                            break;
                        case 'create-food':
                            include 'create-food.php';
                            break;
                        case 'edit-food':
                            include 'edit-food.php';
                            break;
                            
                            
                        case 'news-management':
                            include 'news-management.php';
                            break;      
                        case 'create-news':
                            include 'create-news.php';
                            break; 
                        case 'edit-news':
                            include 'edit-news.php';
                            break;     

                        default:
                            include 'cinema-management.php'; // Trang mặc định khi không có tham số hoặc tham số không hợp lệ
                            break;
                    }
                } else {
                    include 'cinema-management.php'; // Trang mặc định khi không có tham số trong URL
                }
                ?>
            </div>




        </div>
    </div>

</body>
<script>
    function redirectTo(handle) {
        window.location.href = 'admin.php?handle=' + handle;
    }
    const arr = [1, 2, 3, 4];
    arr.forEach((number) => {
        return number * 2;
    })
    console.log(arr);
</script>


</html>