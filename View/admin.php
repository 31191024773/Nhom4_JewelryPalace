<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEWELRYxPALACE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../ds/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="../ds/style.css">
    <link rel="stylesheet" href="../ds/admin.css">
</head>
<body>
<?php
include_once('../Controller/Controller.php');
checkOrder($_COOKIE['id']);
?>
<section id="header">
    <a href="../index.php"><img class="logo" src="../ds/img/chototlogo.png" alt=""></a>
    <div>
        <ul id="navbar">
            <li><a href="../index.php">Home</a></li>
            <li><a href="shop.php?page=1">Shop</a>
                <ul class="dropdown">
                    <li><a href="bongtai.php">Bông tai</a></li>
                    <li><a href="daychuyen.php">Dây chuyền</a></li>
                    <li><a href="vongtay.php">Vòng tay</a></li>
                    <li><a href="nhan.php">Nhẫn</a></li>
                </ul>
            </li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
            <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            <?php
            if (isset($_COOKIE['id'])) {
                ?>
                <nav role="navigation">
                    <ul>
                        <li><a class="active" href="#"><i class="fa-solid fa-user"></i></a>
                            <ul class="dropdown">
                                <li><a href="../View/profile.php">Profile</a></li>
                                <li><a href="../View/logout.php">Logout</i></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <?php
            } else {
                ?>
                <li><a href="../View/login.php">Login</a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</section>
<div class="content">
    <div class="category">
        <a href="admin.php"><p class="title-admin">Admin Dashboard</p></a>
        <ul class="category-management">
            <li class="manage"><a href="user.php">User management <i class="fa-solid fa-user"></i></a></li>
            <li class="manage"><a href="order.php">Order management <i class="fa-solid fa-cart-shopping"></i></a></li>
            <li class="manage"><a href="statistical.php">Revenue statistics <i class="fa-solid fa-chart-line"></i></a>
            </li>
            <li class="manage"><a href="../View/logout.php">Log out <i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
        </ul>
    </div>
    <div class="main">
        <div class="nen"></div>
        <img src="../ds/img/images-removebg-preview.png" alt="" class="anh1">
        <img src="../ds/img/p4.png" alt="" class="anh2">
        <img src="../ds/img/p5.png" alt="" class="anh3">
        <img src="../ds/img/p7.png" alt="" class="anh4">
        <img src="../ds/img/p3.png" alt="" class="anh5">
        <div class="chunho">Welcome to</div>
        <div class="chuto">ADMIN DASHBOARD</div>
    </div>
</div>
<body>