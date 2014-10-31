<?php

namespace FJL\ChargifyBundle\Model;

class Coupon
{
    protected $allowNegativeBalance;
    protected $amountInCents;
    protected $archivedAt;
    protected $code;
    protected $conversionLimit;
    protected $createdAt;
    protected $description;
    protected $durationInterval;
    protected $durationIntervalUnit;
    protected $durationPeriodCount;
    protected $endDate;
    protected $id;
    protected $name;
    protected $percentage;
    protected $productFamilyId;
    protected $recurring;
    protected $startDate;
    protected $updatedAt;

    public function getArrayCopy()
    {
        $data = array();

        foreach($this as $key => $value) {
            $keyUscore = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
            if($value && $value != '') {
                $data[$keyUscore] = $value;
            }
        }

        return $data;
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
     * @param mixed $allowNegativeBalance
     */
    public function setAllowNegativeBalance($allowNegativeBalance)
    {
        $this->allowNegativeBalance = $allowNegativeBalance;
    }

    /**
     * @return mixed
     */
    public function getAllowNegativeBalance()
    {
        return $this->allowNegativeBalance;
    }

    /**
     * @param mixed $amountInCents
     */
    public function setAmountInCents($amountInCents)
    {
        $this->amountInCents = $amountInCents;
    }

    /**
     * @return mixed
     */
    public function getAmountInCents()
    {
        return $this->amountInCents;
    }

    /**
     * @param mixed $archivedAt
     */
    public function setArchivedAt($archivedAt)
    {
        $this->archivedAt = $archivedAt;
    }

    /**
     * @return mixed
     */
    public function getArchivedAt()
    {
        return $this->archivedAt;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $conversionLimit
     */
    public function setConversionLimit($conversionLimit)
    {
        $this->conversionLimit = $conversionLimit;
    }

    /**
     * @return mixed
     */
    public function getConversionLimit()
    {
        return $this->conversionLimit;
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
     * @param mixed $durationInterval
     */
    public function setDurationInterval($durationInterval)
    {
        $this->durationInterval = $durationInterval;
    }

    /**
     * @return mixed
     */
    public function getDurationInterval()
    {
        return $this->durationInterval;
    }

    /**
     * @param mixed $durationIntervalUnit
     */
    public function setDurationIntervalUnit($durationIntervalUnit)
    {
        $this->durationIntervalUnit = $durationIntervalUnit;
    }

    /**
     * @return mixed
     */
    public function getDurationIntervalUnit()
    {
        return $this->durationIntervalUnit;
    }

    /**
     * @param mixed $durationPeriodCount
     */
    public function setDurationPeriodCount($durationPeriodCount)
    {
        $this->durationPeriodCount = $durationPeriodCount;
    }

    /**
     * @return mixed
     */
    public function getDurationPeriodCount()
    {
        return $this->durationPeriodCount;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
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

    /**
     * @param mixed $percentage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    }

    /**
     * @return mixed
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param mixed $productFamilyId
     */
    public function setProductFamilyId($productFamilyId)
    {
        $this->productFamilyId = $productFamilyId;
    }

    /**
     * @return mixed
     */
    public function getProductFamilyId()
    {
        return $this->productFamilyId;
    }

    /**
     * @param mixed $recurring
     */
    public function setRecurring($recurring)
    {
        $this->recurring = $recurring;
    }

    /**
     * @return mixed
     */
    public function getRecurring()
    {
        return $this->recurring;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
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


}