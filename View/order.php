<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEWELRYxPALACE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="../ds/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../ds/style.css">
    <link rel="stylesheet" href="../ds/admin.css">
    <link rel="stylesheet" href="../ds/oder-admin.css">


</head>
<body>
<?php
include_once('../Controller/Controller.php');
if (!empty($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('" . $message . "');</script>";
}
?>
<section id="header">
    <a href="../index.php"><img class="logo" src="../ds/img/chototlogo.png" alt=""></a>
    <div>
        <ul id="navbar">
            <li><a href="../index.php">Home</a></li>
            <li><a class="active" href="shop.php?page=1">Shop</a>
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
                        <li><a href="#"><i class="fa-solid fa-user"></i></a>
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
    <div class="main-table">
        <form method="post" action="../Controller/Controller.php">
            <table class="table">
                <tr>
                    <th>Oderid</th>
                    <th>Username</th>
                    <th>Note</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Accept oder</th>
                </tr>
                <?php

                $listOrder = getAllOrder();
                $i = 0;
                foreach ($listOrder as $order) {
                    $idUser = $order->getIdUser();
                    $user = getUserById($idUser);
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $user->getNameUser() ?></td>
                        <td><?php echo $order->getNote() ?></td>
                        <td><?php echo $order->getCreateDate() ?></td>
                        <td><?php echo getPriceByOrderId($order->getIdOrder()) ?>.000 VND</td>
                        <td>Accept <input type="checkbox" class="checkbox" name="check_list[]"
                                          value="<?php echo $order->getIdOrder() ?>"></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
            <button class="submit" type="submit" name="submit_order" id="submit_order">Submit oder</button>
        </form>
        <img src="../ds/img/p7.png" alt="" class="anhmay">
    </div>
    <div class="lopmo"></div>
    <div class="detail-product">
        <div class="info-product">
            <p class="title">CHI TIẾT SẢN PHẨM</p>
            <div class="info">
                <div class="name-prd">Name product: <p>Dây chuyền</p></div>
                <div class="qtt-prd">Quantity: <p>2</p></div>
                <div class="price-prd">Price : <p>2.250.000 (vnđ)</p></div>
            </div>
            <button class="close">Close</button>
        </div>
    </div>
</div>

</body>
<script src="../ds/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.eye-icon').click(function (e) {
            // xử lý class
            $('.detail-product').addClass('noidunghienra');
            $('.lopmo').addClass('lopmohienra');
        });
        $('.close, .lopmo').click(function (e) {
            $('.detail-product').removeClass('noidunghienra');
            $('.lopmo').removeClass('lopmohienra');
        });
    });
</script>
</html>