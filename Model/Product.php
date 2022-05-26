<?php

class Product
{
    private $id_product;
    private $name_product;
    private $image_product;
    private $price;
    private $quanlity;
    private $id_category;
    private $description;
    private $materialName;

    /**
     * @param $id_product
     * @param $name_product
     * @param $image_product
     * @param $price
     * @param $quanlity
     * @param $id_category
     * @param $material
     * @param $description
     */
    public function __construct($id_product, $name_product, $image_product, $price, $quanlity, $id_category, $description, $materialName)
    {
        $this->id_product = $id_product;
        $this->name_product = $name_product;
        $this->image_product = $image_product;
        $this->price = $price;
        $this->quanlity = $quanlity;
        $this->id_category = $id_category;
        $this->description = $description;
        $this->materialName = $materialName;
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
    public function getNameProduct()
    {
        return $this->name_product;
    }

    /**
     * @param mixed $name_product
     */
    public function setNameProduct($name_product): void
    {
        $this->name_product = $name_product;
    }

    /**
     * @return mixed
     */
    public function getImageProduct()
    {
        return $this->image_product;
    }

    /**
     * @param mixed $image_product
     */
    public function setImageProduct($image_product): void
    {
        $this->image_product = $image_product;
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
    public function getIdCategory()
    {
        return $this->id_category;
    }

    /**
     * @param mixed $id_category
     */
    public function setIdCategory($id_category): void
    {
        $this->id_category = $id_category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getMaterialName()
    {
        return $this->materialName;
    }

    /**
     * @param mixed $materialName
     */
    public function setMaterialName($materialName): void
    {
        $this->materialName = $materialName;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

}