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
            <li><a class="reponsive-active" href="contact.php">Contact</a></li>

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
            <li><a class="active" href="contact.php">Contact</a></li>
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

<section id="contact-details" class="section-p1">
    <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit one of our agency locations or contact us today</h2>
        <h3>Head Office</h3>
        <div>
            <li>
                <i class="fa-solid fa-map"></i>
                <p>59C Nguyễn Đình Chiểu</p>
            </li>
            <li>
                <i class="fa-solid fa-envelope"></i>
                <p>contact@example.com</p>
            </li>
            <li>
                <i class="fa-solid fa-phone"></i>
                <p>contact@example.com</p>
            </li>
            <li>
                <i class="fa-solid fa-clock"></i>
                <p>Monday to Saturday: 9.00am to 16.pm</p>
            </li>
        </div>
    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d979.8420329368683!2d106.69419622921198!3d10.783091116944135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f36c74caa99%3A0x743c446a2eef20a5!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVFAuSENNIChVRUgpIC0gQ8ahIHPhu58gQQ!5e0!3m2!1svi!2sus!4v1653258506911!5m2!1svi!2sus"
                width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">

        </iframe>
    </div>
</section>

<section id="form-details">
    <form action="">
        <span>LEAVE A MESSAGE</span>
        <h2>We love to hear from you</h2>
        <input type="text" placeholder="Your Name">
        <input type="text" placeholder="E-mail">
        <input type="text" placeholder="Subject">
        <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
        <button class="normal">Submit</button>
    </form>

    <div class="people">
        <div>
            <img src="../ds/img/people/1.png" alt="">
            <p><span>Shigeo Tokuda</span> Senior Marketing Manager <br> Phone: +84 0123456789 <br> Email:
                contact@example.com</p>
        </div>
        <div>
            <img src="../ds/img/people/2.png" alt="">
            <p><span>Justin Bieber</span> Senior Marketing Manager <br> Phone: +84 0123456789 <br> Email:
                contact@example.com</p>
        </div>
        <div>
            <img src="../ds/img/people/3.png" alt="">
            <p><span>Selena Gomez</span> Senior Marketing Manager <br> Phone: +84 0123456789 <br> Email:
                contact@example.com</p>
        </div>
    </div>
</section>

<section id="newsletter" class="section-p1 section-m1">

    <div class="newstext">
        <h4> Sign Up For Newsletter</h4>
        <p>Get E-mail updates about our latest shop and <span>special offer.</span></p>
    </div>

    <div class="form">
        <input type="text" placeholder="Your email address">
        <button class="normal">Sign Up</button>
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