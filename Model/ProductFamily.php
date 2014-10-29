<?php

namespace FJL\ChargifyBundle\Model;

class ProductFamily
{
    protected $id;
    protected $accountingCode;
    protected $handle;
    protected $name;
    protected $description;

    public function getArrayCopy()
    {
        return array(
            'id'              => $this->id,
            'accounting_code' => $this->accountingCode,
            'handle'          => $this->handle,
            'name'            => $this->name,
            'description'     => $this->description,
        );
    }

    public function populate($data)
    {
        foreach ($data as $property => $value) {
            $method = 'set' . str_replace(' ','',ucwords(str_replace('_',' ',$property)));
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }

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