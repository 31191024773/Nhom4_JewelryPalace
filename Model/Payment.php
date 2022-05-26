<?php

class Payment
{
    private $id_payment;
    private $name_payment;

    /**
     * @param $id_payment
     * @param $name_payment
     */
    public function __construct($id_payment, $name_payment)
    {
        $this->id_payment = $id_payment;
        $this->name_payment = $name_payment;
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
     * @return mixed
     */
    public function getNamePayment()
    {
        return $this->name_payment;
    }

    /**
     * @param mixed $name_payment
     */
    public function setNamePayment($name_payment): void
    {
        $this->name_payment = $name_payment;
    }

}