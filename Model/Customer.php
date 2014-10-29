<?php

namespace FJL\ChargifyBundle\Model;

class Customer extends CustomerAttributes
{
    protected $id;
    protected $createdAt;
    protected $updatedAt;
    protected $vatNumber;

    public function getArrayCopy()
    {
        return array_merge(parent::getArrayCopy(), array(
            'id'         => $this->id,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'vat_number' => $this->vatNumber,
        ));
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $vatNumber
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;
    }

    /**
     * @return mixed
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }


}