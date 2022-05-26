<?php

include_once($_COOKIE['path'] . '/Model/Product.php');
include_once($_COOKIE['path'] . '/Model/User.php');
include_once($_COOKIE['path'] . '/Model/OrderDetail.php');
include_once($_COOKIE['path'] . '/Model/Order.php');

class Model
{
    private static $instance;

    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function excuteData($query)
    {
        $connect = mysqli_connect("localhost", "root", "", "qlbh");
        if ($connect) {
            return mysqli_query($connect, $query);
        }
    }

    public function getAllProducts($ten, $id)
    {
        try {
            if ($id == 0)
                $query = "select * from product where ProductName like '%" . $ten . "%'";
            if ($id == 1)
                $query = "select * from product where MaterialName = 'Bông tai' and ProductName like '%" . $ten . "%'";
            if ($id == 2)
                $query = "select * from product where MaterialName = 'Dây chuyền' and ProductName like '%" . $ten . "%'";
            if ($id == 3)
                $query = "select * from product where MaterialName = 'Vòng tay' and ProductName like '%" . $ten . "%'";
            if ($id == 4)
                $query = "select * from product where MaterialName = 'Nhẫn' and ProductName like '%" . $ten . "%'";
            $result = $this->excuteData($query);
            $i = 0;
            $product = [];
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $product[$i++] = new Product($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
                }
                return $product;
            } else return null;
        } catch (Exception $exception) {
            echo 'Caught exception: ', $exception->getMessage(), "\n";
        }
    }

    public function getProductById($id)
    {
        try {
            $query = "select * from product where ProductId = '" . $id . "'";
            $result = $this->excuteData($query);
            if ($result) {
                if ($row = mysqli_fetch_array($result)) {
                    return new Product($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
                }
            }
        } catch (Exception $exception) {
            echo 'Caught exception: ', $exception->getMessage(), "\n";
        }
    }

    public function getUserById($id)
    {
        try {
            $query = "select * from users where UserId = '" . $id . "'";
            $result = $this->excuteData($query);
            if ($result) {
                if ($row = mysqli_fetch_array($result)) {
                    return new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
                }
            }
        } catch (Exception $exception) {
            echo 'Caught exception: ', $exception->getMessage(), "\n";
        }
    }

    public function getAllOrderDetail($orderId)
    {
        $slq = "select * from orderdetail where OrderId = '" . $orderId . "'";
        $result = $this->excuteData($slq);
        $i = 0;
        $listOrder = [];
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $listOrder[$i++] = new OrderDetail($row[0], $row[1], $row[2], $row[3]);
            }
            return $listOrder;
        } else {
            return null;
        }
    }

    public function getAllUser()
    {
        try {
            $query = "select * from users";
            $result = $this->excuteData($query);
            $i = 0;
            $user = [];
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $user[$i++] = new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
                }
                return $user;
            }
        } catch (Exception $exception) {
            echo 'Caught exception: ', $exception->getMessage(), "\n";
        }
    }

    public function getAllOrder()
    {
        try {
            $query = "select * from orders where ship = '0' and status = '1'";
            $result = $this->excuteData($query);
            $i = 0;
            $order = [];
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $order[$i++] = new Order($row[0], $row[1], $row[2], $row[3], $row[4]);
                }
                return $order;
            }
        } catch (Exception $exception) {
            echo 'Caught exception: ', $exception->getMessage(), "\n";
        }
    }

    public function getPriceByOrderId($OrderId)
    {
        $query = "select * from orderdetail where OrderId = '" . $OrderId . "'";
        $result = $this->excuteData($query);
        $total = 0;
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $total += $row[3];
            }
            return $total;
        }
    }

}