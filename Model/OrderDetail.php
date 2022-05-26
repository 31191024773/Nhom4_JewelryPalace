<?php

class OrderDetail
{
    private $id_order;
    private $id_product;
    private $quanlity;
    private $price;

    /**
     * @param $id_order
     * @param $id_product
     * @param $quanlity
     * @param $price
     */
    public function __construct($id_order, $id_product, $quanlity, $price)
    {
        $this->id_order = $id_order;
        $this->id_product = $id_product;
        $this->quanlity = $quanlity;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getIdOrder()
    {
        return $this->id_order;
    }

    /**
     * @param mixed $id_order
     */
    public function setIdOrder($id_order): void
    {
        $this->id_order = $id_order;
    }

    /**
     * @return mixed
     */
    public function getIdProduct()
    {
        return $this->id_product;
    }

    /**
     * @param mixed $id_product
     */
    public function setIdProduct($id_product): void
    {
        $this->id_product = $id_product;
    }

    /**
     * @return mixed
     */
    public function getQuanlity()
    {
        return $this->quanlity;
    }

    /**
     * @param mixed $quanlity
     */
    public function setQuanlity($quanlity): void
    {
        $this->quanlity = $quanlity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

}