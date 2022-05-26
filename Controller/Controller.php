<?php
$session = session_id();
if (empty($session)) {
    session_start();
}
include_once($_COOKIE['path'] . '/Model/Model.php');

function getListProduct($key, $id)
{
    return Model::getInstance()->getAllProducts($key, $id);
}

$username_cookie = '';
$password_cookie = '';
$set_remember = "";
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' || $password == '') {
        echo "<script type='text/javascript'>alert('Please enter a valid username or password');</script>";
        include_once("../View/login.php");
    } else {
        $sql = "select * from users where UserName = '" . $username . "' and Password = '" . $password . "'";
        $result = Model::getInstance()->excuteData($sql);
        $user = mysqli_fetch_array($result);
        if ($user) {
            setcookie('id', $user[0], time() + 60 * 60 * 24 * 365, '/');
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + 60 * 60 * 24 * 365, '/');
                setcookie('password', $password, time() + 60 * 60 * 24 * 365, '/');
            } else {
                setcookie('username', "", time() + 60 * 60 * 24 * 365, '/');
                setcookie('password', "", time() + 60 * 60 * 24 * 365, '/');
            }
            $_SESSION['IS_LOGIN'] = 'yes';
            if ($user[0] == 1) {
                header('location:../View/admin.php');
            } else {
                header('location:../index.php');
            }
        } else {
            echo "<script type='text/javascript'>alert('Wrong username or password');</script>";
            include_once("../View/login.php");
        }
        mysqli_free_result($result);
    }
}


if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_pass = $_POST['re_pass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (isset($_POST['agree-term'])) {
        if ($username == '' and $password == '' and $re_pass == '' and $email == '' and $phone == '' and $address == '') {
            echo "<script type='text/javascript'>alert('Please enter valid information');</script>";
        } else {
            if ($re_pass != $password) {
                echo "<script type='text/javascript'>alert('Password incorrect');</script>";
                include_once("../View/login.php");
            } else {
                $sql = "insert into users (	UserName, Password, Email, Phone, Address) values ('$username', '$password', '$email', '$phone', '$address')";
                $result = Model::getInstance()->excuteData($sql);
                $user = mysqli_fetch_array($result);
                setcookie('username', $username, time() + 60 * 60 * 24 * 365);
                setcookie('password', $password, time() + 60 * 60 * 24 * 365);
                setcookie('id', $user[0], time() + 60 * 60 * 24 * 365);
                header('location:../View/login.php');
                die();
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('Please agree to our terms');</script>";
        include_once("../View/login.php");
    }
}

function getProductById($id)
{
    return Model::getInstance()->getProductById($id);
}

function getUserById($id)
{
    return Model::getInstance()->getUserById($id);
}

if (isset($_POST['saveChange'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $user = getUserById($_COOKIE['id']);

    if ($password && $newPass && $confirmPass) {
        if ($confirmPass != $newPass) {
            header('location:../View/profile.php?message=Password does not match!');
        } else {

            if ($user->getPassword() != $password) {
                header('location:../View/profile.php?message=Password does not match!');
            } else {
                if ($username != $user->getNameUser()) {
                    setcookie('username', $username, time() + 60 * 60 * 24 * 365, '/');
                }
                if ($newPass != $user->getPassword()) {
                    setcookie('password', $newPass, time() + 60 * 60 * 24 * 365, '/');
                }
                $sql = "UPDATE `users` SET `UserName` = '" . $username . "', `Password` = '" . $newPass . "', `Email` = '" . $email . "', `Phone` = '" . $phone . "', `Address` = '" . $address . "' WHERE `UserId` ='" . $_COOKIE['id'] . "'";
                Model::getInstance()->excuteData($sql);
                header('location:../View/profile.php?message=Successful update!');
            }
        }
    } elseif (!$password && !$newPass && !$confirmPass) {
        if ($username != $user->getNameUser())
            setcookie('username', $username, time() + 60 * 60 * 24 * 365, '/');
        $sql = "UPDATE `users` SET `UserName` = '" . $username . "', `Email` = '" . $email . "', `Phone` = '" . $phone . "', `Address` = '" . $address . "' WHERE `UserId` ='" . $_COOKIE['id'] . "'";
        Model::getInstance()->excuteData($sql);
        header('location:../View/profile.php?message=Successful update!');
    } else {
        header('location:../View/profile.php?message=Password cannot be blank!');
    }
}

if (isset($_POST['add'])) {
    $quantity = $_POST['quantity'];
    $productId = $_POST['productId'];
    $price = $_POST['price'];

    $sql = "select * from orderdetail where Productid = '" . $productId . "' and OrderId = '" . $_COOKIE['orderId'] . "'";
    $result = Model::getInstance()->excuteData($sql);
    if ($result->fetch_row()) {

        $sql1 = "UPDATE orderdetail SET Quantity = Quantity + " . $quantity . ", Price = " . $price . " * Quantity WHERE Productid ='" . $productId . "'";
        Model::getInstance()->excuteData($sql1);
    } else {

        $sql2 = "insert into orderdetail (OrderId, Productid, Quantity, Price) values ('" . $_COOKIE['orderId'] . "', '$productId', '$quantity', '" . $price * $quantity . "')";
        Model::getInstance()->excuteData($sql2);

    }
    header('location:../View/sproduct.php?id=' . $productId . '&message=Add cart successfully!');

}

function checkOrder($UserId)
{
    $sql = "select * from orders where UserId = '" . $UserId . "' and status = '0'";
    $result = Model::getInstance()->excuteData($sql);
    if (mysqli_num_rows($result) > 0) {
        $order = mysqli_fetch_array($result);
        setcookie('orderId', $order[0], time() + 60 * 60 * 24 * 365, '/');
    } else {
        $date = date("Y-m-d");
        $sql = "insert into orders (UserId, Note, CreateDate, PaymentId , status) values ('$UserId', 'Hàng dễ vỡ', '$date', '1', '0');";
        Model::getInstance()->excuteData($sql);
        $sql = "SELECT * FROM orders WHERE OrderId  = (SELECT MAX(OrderId) FROM orders);";
        $result = Model::getInstance()->excuteData($sql);
        $order = mysqli_fetch_array($result);
        setcookie('orderId', $order[0], time() + 60 * 60 * 24 * 365, '/');
    }
}

function checkOrderId($oderId)
{
    $sql = "select * from orders where OrderId  = '" . $oderId . "' and status = '0'";
    $result = Model::getInstance()->excuteData($sql);
    if ($result->fetch_row()) {
        return true;
    }
    return false;
}

function getlistOrder()
{
    return Model::getInstance()->getAllOrderDetail($_COOKIE['orderId']);
}

if (isset($_POST['payment'])) {
    $sql = "UPDATE orders SET status = '1' WHERE OrderId ='" . $_COOKIE['orderId'] . "'";
    Model::getInstance()->excuteData($sql);
    checkOrder($_COOKIE['id']);
    header('location:../View/cart.php?message=Payment success!');
}

function getAllUsers()
{
    return Model::getInstance()->getAllUser();
}

if (isset($_GET['oId']) && isset($_GET['pId'])) {
    $oderId = $_GET['oId'];
    $productId = $_GET['pId'];

    $sql = "delete from orderdetail where OrderId = '" . $oderId . "' and Productid = '" . $productId . "'";
    Model::getInstance()->excuteData($sql);

    header('location:../View/cart.php?message=Delete success!');
}

if (isset($_POST['edit_admin'])) {
    $id = $_POST['idS'];
    $username = $_POST['usernameS'];
    $email = $_POST['emailS'];
    $phone = $_POST['phoneS'];
    $address = $_POST['addressS'];

    try {
        $sql = "UPDATE users SET UserName = '" . $username . "',Email = '" . $email . "', Phone = '" . $phone . "', Address = '" . $address . "' WHERE UserId ='" . $id . "'";
        Model::getInstance()->excuteData($sql);
        header('location:../View/user.php?message=Update success!');
    } catch (Exception $e) {
        header('location:../View/user.php?message=' . $e->getMessage() . '!');
    }

}

if (isset($_POST['delete_user'])) {
    $id = $_POST['uId'];
    if ($id == $_COOKIE['id']) {
        header("location:../View/user.php?message=Can not delete the account that is logged in!");
    } else {
//        $sql = "select OrderId from orders where UserId = '".$id."'";
//        $data = Model::getInstance()->excuteData($sql);
//        $array=[];
//        while ($row = mysqli_fetch_array($data)) {
//            $array[] = $row['OrderId'];
//        }
//        foreach ($array as $arr){
//            $sql = "delete from orderdetail where OrderId = '".$arr."'";
//            Model::getInstance()->excuteData($sql);
//        }
//        $sql = "delete from orders where UserId = '".$id."'";
//        Model::getInstance()->excuteData($sql);
//        $sql = "delete from users where UserId = '".$id."'";
//        Model::getInstance()->excuteData($sql);
        header("location:../View/user.php?message=Delete success!");
    }
}

if (isset($_POST['add_admin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "insert into users (	UserName, Password, Email, Phone, Address) values ('$username', '$password', '$email', '$phone', '$address')";
    $result = Model::getInstance()->excuteData($sql);
    header("location:../View/user.php?message=Add success!");
}
function getAllOrder()
{
    return Model::getInstance()->getAllOrder();
}

function getPriceByOrderId($OrderId)
{
    return Model::getInstance()->getPriceByOrderId($OrderId);
}

if (isset($_POST['submit_order'])) {
    if (!empty($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $selected) {
            $sql = "update orders set ship = '1' where OrderId = '" . $selected . "'";
            Model::getInstance()->excuteData($sql);
        }
        header("location:../View/order.php?message=Successful shipping confirmation!");
    } else header("location:../View/order.php?message=There are no items selected!");
}