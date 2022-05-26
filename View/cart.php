<?php
session_start();
if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
}
?>
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


</head>
<body>

<?php
error_reporting(E_ERROR | E_PARSE);
?>
<div class="reponsive">
    <div class="reponsive-header">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="shop.php?page=1">Shop</a>
                <ul class="shop-list">
                    <li><a href="bongtai.php">Bông tai</a></li>
                    <li><a href="daychuyen.php">Dây chuyền</a></li>
                    <li><a href="vongtay.php">Vòng tay</a></li>
                    <li><a href="nhan.php">Nhẫn</a></li>
                </ul>
            </li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>

            <li><a href="#"><i class="fa-solid fa-user"></i></a>
                <ul class=" avt-reponsive">
                    <li><a href="../View/profile.php">Profile</a></li>
                    <li><a href="../View/logout.php">Logout</i></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

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
            <li class="active" id="lg-bag"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
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

    <!--reponsive thanh mở hiện trên điện thoại ,còn máy tính thì ko -->
    <div id="mobile">
        <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
        <i id="bar" class="fa-solid fa-outdent"></i>
    </div>
</section>

<section id="page-header" class="about-header">

    <h2>#let's_talk</h2>

    <p>LEAVE A MESSAGE, We love to hear from you!</p>

</section>

<section id="cart" class="section-p1">
    <table width="100%" id="order">
        <thead>
        <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Product</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once('../Controller/Controller.php');
        if (!empty($_GET['message'])) {
            $message = $_GET['message'];
            echo "<script type='text/javascript'>alert('" . $message . "');</script>";
        }
        if (checkOrderId($_COOKIE['orderId'])) {
            $listOrder = getlistOrder();
            if (isset($listOrder)) {
                $total = 0;
                $i = 0;
                foreach ($listOrder as $value) {
                    $product = getProductById($value->getIdProduct())
                    ?>
                    <tr>
                        <td>
                            <a href="../Controller/Controller.php?oId=<?php echo $value->getIdOrder() ?>&pId=<?php echo $value->getIdProduct() ?>"><i
                                        class="fa-solid fa-circle-xmark"></i></a></td>
                        <td>
                            <img src="http://drive.google.com/uc?export=view&id=<?php echo substr($product->getImageProduct(), 32, 33) ?>"
                                 alt=""></td>
                        <td><?php echo $product->getNameProduct() ?></td>
                        <td><input style="border: none; width: 70px" type="text" readonly
                                   value="<?php echo number_format($product->getPrice(), 3, '.', '.') ?>"
                                   id="p<?php echo $i ?>">VND
                        </td>
                        <td><input min="1" type="number" value="<?php echo $value->getQuanlity() ?>"
                                   onchange="Change(<?php echo $i ?>)" id="q<?php echo $i ?>"></td>
                        <td><input style="border: none; width: 70px" readonly type="text"
                                   value="<?php $total = $total + $value->getPrice();
                                   echo number_format($value->getPrice(), 3, '.', '.') ?>" id="s<?php echo $i ?>">VND
                        </td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
            }
        }
        ?>

        </tbody>
    </table>
</section>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Apply Coupon</h3>
        <div>
            <input type="text" placeholder="Enter Your Coupon">
            <button class="normal">Apply</button>
        </div>
    </div>

    <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
            <tr>
                <td>Cart Subtotal</td>
                <td><input style="border: none; width: 70px;" type="text" readonly
                           value="<?php echo number_format($total, 3, '.', '.') ?>" id="cs">VND
                </td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong><input style="border: none; width: 70px; font-weight: bold" type="text" readonly
                                   value="<?php echo number_format($total, 3, '.', '.') ?>" id="total">VND</strong></td>
            </tr>
        </table>
        <form method="post" action="../Controller/Controller.php">
            <button class="normal" type="submit" id="payment" name="payment">Payment</button>
        </form>
    </div>
</section>

<footer class="section-p1">

    <div class="col">
        <img class="logo2" src="../ds/img/chototlogo.png" alt="">
        <h4>Contact</h4>
        <p><strong>Address:</strong>02 Ngô Đức Kế, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh</p>
        <p><strong>Phone:</strong>(+84) 0312120782</p>
        <p><strong>Hours:</strong>10:00 - 18:00, Mon - Sat</p>
        <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-tiktok"></i>
                <i class="fa-brands fa-whatsapp"></i>
            </div>
        </div>
    </div>


    <div class="col">
        <h4>About</h4>
        <a href="#">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#"> Contacts Us</a>
    </div>

    <div class="col">
        <h4> My Account</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Whistlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
    </div>


    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
            <img src="../ds/img/pay/app.jpg" alt="">
            <img src="../ds/img/pay/play.jpg" alt="">
        </div>
        <p>Secured Payment Gateways</p>
        <img src="../ds/img/pay/pay.png" alt="">
    </div>

    <div class="copyright">
        <p>© 2022, chotot - All Rights Reverved</p>
    </div>


</footer>


<script src="../ds/script.js"></script>
</body>
<script src="../ds/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#bar').click(function (e) {
            // xử lý class
            $('.reponsive-header').toggleClass('noidunghienra');
        });
    })
</script>
</html>