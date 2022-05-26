<?php

class User
{
    private $id_user;
    private $name_user;
    private $password;
    private $email;
    private $phone;
    private $address;

    /**
     * @param $id_user
     * @param $name_user
     * @param $password
     * @param $email
     * @param $phone
     * @param $address
     */
    public function __construct($id_user, $name_user, $password, $email, $phone, $address)
    {
        $this->id_user = $id_user;
        $this->name_user = $name_user;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
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
    public function getNameUser()
    {
        return $this->name_user;
    }

    /**
     * @param mixed $name_user
     */
    public function setNameUser($name_user): void
    {
        $this->name_user = $name_user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

}