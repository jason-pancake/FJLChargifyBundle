<?php

namespace FJL\ChargifyBundle\Model;

class ProductFamily
{
    protected $id;
    protected $accountingCode;
    protected $handle;
    protected $name;
    protected $description;

    /**
     * @param mixed $accountingCode
     */
    public function setAccountingCode($accountingCode)
    {
        $this->accountingCode = $accountingCode;
    }

    /**
     * @return mixed
     */
    public function getAccountingCode()
    {
        return $this->accountingCode;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    /**
     * @return mixed
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


}