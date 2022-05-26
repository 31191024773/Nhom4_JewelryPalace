<?php

class Order
{
    private $id_order;
    private $id_user;
    private $note;
    private $create_date;
    private $id_payment;

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
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * @param mixed $create_date
     */
    public function setCreateDate($create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return mixed
     */
    public function getIdPayment()
    {
        return $this->id_payment;
    }

    /**
     * @param mixed $id_payment
     */
    public function setIdPayment($id_payment): void
    {
        $this->id_payment = $id_payment;
    }

    /**
     * @param $id_order
     * @param $id_user
     * @param $note
     * @param $create_date
     * @param $id_payment
     */
    public function __construct($id_order, $id_user, $note, $create_date, $id_payment)
    {
        $this->id_order = $id_order;
        $this->id_user = $id_user;
        $this->note = $note;
        $this->create_date = $create_date;
        $this->id_payment = $id_payment;
    }
}