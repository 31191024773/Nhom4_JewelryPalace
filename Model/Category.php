<?php

class Category
{
    private $id_category;
    private $name_category;

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
    public function getNameCategory()
    {
        return $this->name_category;
    }

    /**
     * @param mixed $name_category
     */
    public function setNameCategory($name_category): void
    {
        $this->name_category = $name_category;
    }


    public function __construct($id_category, $name_category)
    {
        $this->id_category = $id_category;
        $this->name_categoryname = $name_category;
    }
}