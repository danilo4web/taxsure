<?php

namespace App\Entity;

/**
 * CustomerEntity
 */
class CustomerEntity
{

    /** @var integer */
    const STATUS_ENABLED = 1;

    /** @var integer */
    const STATUS_DISABLED = 0;

    /** @return string */
    private $id;

    /** @return string */
    private $name;

    /** @return string */
    private $email;

    /** @return string */
    private $phone;

    /** @return string */
    private $address;

    /** @return string */
    private $gender;

    /** @return integer */
    private $status;

    /** @return integer */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return \App\Entity\CustomerEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return \App\Entity\CustomerEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return \App\Entity\CustomerEntity
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return \App\Entity\CustomerEntity
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return \App\Entity\CustomerEntity
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return \App\Entity\CustomerEntity
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }


    /**
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $status
     * @return \App\Entity\CustomerEntity
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}
