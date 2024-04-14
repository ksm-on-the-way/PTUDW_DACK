<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
    font-family: Roboto, sans-serif;

}

.header {
    justify-content: space-between;
    background-color: #fff;
    display: flex;
    gap: 20px;
    font-size: 18px;
    color: var(--Shade-900, #333);
    font-weight: 500;
    text-align: center;
    padding: 8px 72px;
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;

}

@media (max-width: 991px) {
    .header {
        padding: 0 10px;
        position: sticky;
        top: 0;
        left: 0;
        z-index: 4;
    }


}

.img-header {
    aspect-ratio: 1;
    object-fit: contain;
    object-position: center;
    cursor: pointer;
    width: 64px;
}

.header-right_container {
    justify-content: flex-end;
    align-items: center;
    display: flex;
    gap: 20px;
    margin: auto 0;
}

@media (max-width: 991px) {
    .header-right_container {
        flex-wrap: wrap;
        display: none;
    }
}

.header-navigation {
    /* color: var(--royal-blue-while-pressed, #383782); */
    align-self: stretch;
    flex-grow: 1;
    margin: auto 0;
    cursor: pointer;
}



.header-navigation:hover {
    color: #282764;

}

.header-noti {
    aspect-ratio: 1;
    object-fit: auto;
    object-position: center;
    width: 32px;
    align-self: stretch;
    margin: auto 0;
    cursor: pointer;
}

.header-right_container .avt-container {
    align-self: stretch;
    display: flex;
    flex-direction: column;
    color: #fff;
    white-space: nowrap;
    line-height: 100%;
    justify-content: center;
    cursor: pointer;
}

@media (max-width: 991px) {
    .header-right_container .avt-container {
        white-space: initial;
    }
}

.header-right_container .avt {
    font-family: Poppins, sans-serif;
    background-color: #F2C46F;
    border-radius: 50%;
    display: flex;
    align-items: center;
    width: 40px;
    justify-content: center;
    height: 40px;

}

@media (max-width: 991px) {
    .header-right_container .avt {
        white-space: initial;
    }
}




/* CSS cho dropdown */
.dropdown {
    position: relative;
    /* Đặt dropdown là relative để các thành phần con có thể được định vị dựa trên nó */
}

.dropdown-content {
    display: none;
    /* Ẩn dropdown content mặc định */
    position: absolute;
    top: 100%;
    transform: translateX(-50%);
    left: 50%;
    /* Đặt dropdown content là absolute để nó không ảnh hưởng đến các phần tử khác */
    background-color: #f9f9f9;
    min-width: 160px;
    /* Đặt chiều rộng tối thiểu */
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    /* Thêm hiệu ứng bóng cho dropdown */
    z-index: 1;
    /* Đảm bảo dropdown content hiển thị trên tất cả các phần tử khác */
}

.dropdown-content a {
    text-decoration: none;
    color: black;
    padding: 10px 20px;

}

.dropdown-content a:hover {
    background: #c6c6c6;
}

.dropdown:hover .dropdown-content {
    display: flex;
    flex-direction: column;
    text-decoration: none;
    /* Hiển thị dropdown content khi hover vào dropdown */
}

.login-register {
    text-align: right;
    /* Di chuyển sang phải */
    background-color: #1a2c50;
    /* Màu nền */
    padding: 10px 20px;
    /* Khoảng cách bên trong */
    border-radius: 8px;
}

.login-register a {
    color: #f2c46f;
    /* Màu chữ */
    text-decoration: none;
    /* Loại bỏ gạch chân */
}

#myLinks {
    display: none;
}

.header-right_mobile {
    display: flex;
    align-items: center;
    position: relative;
}

.header-right_mobile img {
    width: 40px;
    height: 40px;
}

@media (min-width: 768px) {
    .header-right_mobile {
        display: none;
    }
}

#myLinks {
    display: none;
    position: absolute;
    background-color: #fff;
    /* Màu nền */
    width: 100%;
    /* Chiều rộng 100% */
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    /* Hiệu ứng bóng */
    z-index: 4;
    /* Đảm bảo nằm trên các phần tử khác */
    top: 100%;
    left: 0px;
    background-color: black;
    color: white;

}

#myLinks .header-navigation {
    padding: 10px;
    /* Khoảng cách bên trong */
}
</style>
<?php
if (isset($_POST['action']) && $_POST['action'] == 'logout') {
    unset($_SESSION["email"]);
    unset($_SESSION["phone"]);
    unset($_SESSION["fullname"]);
    unset($_SESSION["birth_date"]);
    unset($_SESSION["gender"]);
    unset($_SESSION["userid"]);
    unset($_SESSION["role_id"]);

}
?>

<body>
    <div class="header">
        <img loading="lazy" srcset="./images/header-logo.png" onclick="redirectToHomePage()" class="img-header" />
        <div class="header-right_container">
            <div class="header-navigation" onclick="redirectToHomePage()">Trang chủ</div>
            <div class="header-navigation" onclick="redirectToMyTicket()">Vé của tôi</div>
            <div class="header-navigation" onclick="redirectToNews()">Tin tức</div>
            <?php if (isset($_SESSION['fullname'])): ?>
            <div class="dropdown avt-container">
                <div class="avt"></div>
                <div class="dropdown-content">
                    <a href="update_info.php">Thông tin cá nhân</a>
                    <a href="#" onclick="signOut()">Đăng xuất</a>
                </div>

            </div>
            <?php else: ?>
            <div class="login-register">
                <a href="login.php">Đăng nhập</a>
            </div>
            <?php endif; ?>


        </div>
        <div id="myLinks">
            <div class="header-navigation" onclick="redirectToHomePage()">Trang chủ</div>
            <div class="header-navigation" onclick="redirectToMyTicket()">Vé của tôi</div>
            <div class="header-navigation" onclick="redirectToNews()">Tin tức</div>
            <?php if (isset($_SESSION['fullname'])): ?>
            <div class="header-navigation" onclick='redirectToUpdateInfo()' href="update_info.php">Thông tin cá nhân
            </div>
            <div class="header-navigation" href="#" onclick="signOut()">Đăng xuất</div>
            <?php else: ?>
            <div class="header-navigation">
                <a href="login.php">Đăng nhập</a>
            </div>
            <?php endif; ?>

        </div>
        <div class='header-right_mobile'>
            <img href="javascript:void(0);" class="icon" onclick="myFunction()"
                src='https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Hamburger_icon.svg/1200px-Hamburger_icon.svg.png' />
        </div>

    </div>

</body>

<script>
function redirectToHomePage() {
    window.location = './homepage.php';
}

function redirectToNews() {
    window.location = './news.php';
}

function redirectToMyTicket() {
    window.location = './my-ticket.php';
}

function redirectToUpdateInfo() {
    window.location = './update_info.php';
}



// function toggleMenu() {
//     var menu = document.getElementById("burgerMenu");
//     menu.classList.toggle("shown");
// }



function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Lấy fullname từ session
    var fullname = "<?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?> ";

    // Lấy chữ cái đầu tiên của fullname
    var firstInitial = fullname.charAt(0).toUpperCase();

    // Đặt chữ cái đầu tiên vào class avt
    var avtElement = document.querySelector(".avt");
    if (avtElement) {
        avtElement.textContent = firstInitial;
    }
});
// JavaScript để đóng dropdown khi click ra ngoài nó
document.addEventListener("click", function(event) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
        var dropdown = dropdowns[i];
        if (dropdown.style.display === "block" &&
            !dropdown.parentNode.contains(event.target)) {
            dropdown.style.display = "none";
        }
    }
});

function signOut() {
    var xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData.append('action', 'logout');
    xhr.open("POST", window.location.href, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 &&
            xhr.status === 200) { // Nếu request thành công, redirect hoặc thực hiện các hành động khác // Ví dụ:
            window.location.href = "login.php";
        }
    };
    xhr.send(formData);

}
</script>

</html>