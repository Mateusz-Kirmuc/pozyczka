<?php

namespace Entity;

use Entity\Dictionary\BookEntryCategoryDictionaryEntity;
use Entity\Dictionary\BookEntryTypeDictionaryEntity;

/**
 * Class BookEntryEntity
 * @package Entity
 */
class BookEntryEntity {
    /** @var \DateTime */
    protected $date;

    /** @var float */
    protected $amount;

    /** @var BookEntryCategoryDictionaryEntity */
    protected $category;

    /** @var BookEntryTypeDictionaryEntity */
    protected $type;

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return BookEntryEntity
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return BookEntryEntity
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return BookEntryCategoryDictionaryEntity
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param BookEntryCategoryDictionaryEntity $category
     * @return BookEntryEntity
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return BookEntryTypeDictionaryEntity
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param BookEntryTypeDictionaryEntity $type
     * @return BookEntryEntity
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}