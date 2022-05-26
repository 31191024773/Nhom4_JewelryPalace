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
    <link rel="stylesheet" href="../ds/user-admin.css">


</head>
<body>
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
        <div class="add-new">
            <button class="btn">Add new <i class="fa-solid fa-plus"></i></button>
        </div>
        <table class="table">
            <tr>
                <th>Email</th>
                <th>Username</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <?php
            include_once("../Controller/Controller.php");
            if (!empty($_GET['message'])) {
                $message = $_GET['message'];
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
            $listUser = getAllUsers();
            if (isset($listUser)) {
                $i = 0;
                foreach ($listUser as $user) {
                    ?>
                    <tr>
                        <td><input type="hidden" style="border: none" value="<?php echo $user->getEmail() ?>"
                                   id="uEmail<?php echo $i ?>"><input type="hidden" id="IdUser<?php echo $i ?>"
                                                                      value="<?php echo $user->getIdUser() ?>"><?php echo $user->getEmail() ?>
                        </td>
                        <td><input type="hidden" style="border: none" value="<?php echo $user->getNameUser() ?>"
                                   id="uName<?php echo $i ?>"><?php echo $user->getNameUser() ?></td>
                        <td><input type="hidden" style="border: none" value="<?php echo $user->getAddress() ?>"
                                   id="uAddress<?php echo $i ?>"><?php echo $user->getAddress() ?></td>
                        <td><input type="hidden" style="border: none" value="<?php echo $user->getPhone() ?>"
                                   id="uPhone<?php echo $i ?>"><?php echo $user->getPhone() ?></td>
                        <td>
                            <a href="#" onclick="Edit(<?php echo $i ?>); return false;"><span class="edit-icon"><i
                                            class="fa-solid fa-pen-to-square"></i></span></a>
                            <form method="post" action="../Controller/Controller.php">
                                <input type="hidden" name="uId" value="<?php echo $user->getIdUser() ?>">
                            </form>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>

        </table>
        <img src="../ds/img/p7.png" alt="" class="anhmay">
    </div>
</div>
<div class="lopmo"></div>
<div class="profile">
    <div class="info">
        <p class="title">CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG</p>
        <form action="../Controller/Controller.php" method="post">
            <input type="hidden" id="idS" name="idS">
            <span>Email</span>
            <input type="email" id="emailS" name="emailS" placeholder="email ...">
            <br>
            <span>Phone</span>
            <input type="text" id="phoneS" name="phoneS" placeholder="Phone ...">
            <br>
            <span>Address</span>
            <input type="text" id="addressS" name="addressS" placeholder="Address ...">
            <br>
            <span>User name</span>
            <input type="text" id="usernameS" name="usernameS" placeholder="user name ...">
            <button id="edit_admin" name="edit_admin" type="submit" class="submit">Save Changes</button>
        </form>
        <button class="close">Close</button>
    </div>
</div>
<div class="add-user">
    <div class="info">
        <p class="title">THÊM MỚI NGƯỜI DÙNG</p>
        <form method="post" action="../Controller/Controller.php">
            <span>Email</span>
            <input type="email" name="email" placeholder="email ...">
            <br>
            <span>Phone</span>
            <input type="text" name="phone" placeholder="Phone ...">
            <br>
            <span>Address</span>
            <input type="text" name="address" placeholder="Address ...">
            <br>
            <span>Username</span>
            <input type="text" name="username" placeholder="username ...">
            <br>
            <span>Password</span>
            <input type="password" name="password" placeholder="password ...">
            <button class="submit" id="add_admin" name="add_admin" type="submit">Save User</button>
        </form>
        <button class="close-user">Close</button>
    </div>
</div>
</div>
</body>
<script src="../ds/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.edit-icon').click(function (e) {
            // xử lý class
            $('.profile').addClass('noidunghienra');
            $('.lopmo').addClass('lopmohienra');
        });
        $('.close, .lopmo').click(function (e) {
            $('.profile').removeClass('noidunghienra');
            $('.lopmo').removeClass('lopmohienra');
        });
        $('.add-new').click(function (e) {
            // xử lý class
            $('.add-user').addClass('noidunghienra');
            $('.lopmo').addClass('lopmohienra');
        });
        $('.close-user, .lopmo').click(function (e) {
            $('.add-user').removeClass('noidunghienra');
            $('.lopmo').removeClass('lopmohienra');
        });

    })

    function Edit(i) {
        document.getElementById('idS').value = document.getElementById('IdUser' + i).value
        document.getElementById('emailS').value = document.getElementById('uEmail' + i).value
        document.getElementById('phoneS').value = document.getElementById('uPhone' + i).value
        document.getElementById('addressS').value = document.getElementById('uAddress' + i).value
        document.getElementById('usernameS').value = document.getElementById('uName' + i).value
    }

    function Delete(i) {

    }
</script>
</html>