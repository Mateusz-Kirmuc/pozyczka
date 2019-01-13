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

    /** @var boolean */
    protected $isSettled;

    /**
     * BookEntryEntity constructor.
     * @param float $amount
     * @param BookEntryCategoryDictionaryEntity $category
     * @param BookEntryTypeDictionaryEntity $type
     * @throws \Exception
     */
    public function __construct(float $amount, BookEntryCategoryDictionaryEntity $category, BookEntryTypeDictionaryEntity $type) {
        $this->date = new \DateTime();
        $this->isSettled = false;
        $this->amount = $amount;
        $this->category = $category;
        $this->type = $type;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return BookEntryEntity
     */
    public function setDate(\DateTime $date): BookEntryEntity {
        $this->date = $date;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return BookEntryEntity
     */
    public function setAmount(float $amount): BookEntryEntity {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return BookEntryCategoryDictionaryEntity
     */
    public function getCategory(): BookEntryCategoryDictionaryEntity {
        return $this->category;
    }

    /**
     * @param BookEntryCategoryDictionaryEntity $category
     * @return BookEntryEntity
     */
    public function setCategory(BookEntryCategoryDictionaryEntity $category): BookEntryEntity {
        $this->category = $category;
        return $this;
    }

    /**
     * @return BookEntryTypeDictionaryEntity
     */
    public function getType(): BookEntryTypeDictionaryEntity {
        return $this->type;
    }

    /**
     * @param BookEntryTypeDictionaryEntity $type
     * @return BookEntryEntity
     */
    public function setType(BookEntryTypeDictionaryEntity $type): BookEntryEntity {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSettled(): bool {
        return $this->isSettled;
    }

    /**
     * @param bool $isSettled
     * @return BookEntryEntity
     */
    public function setIsSettled(bool $isSettled): BookEntryEntity {
        $this->isSettled = $isSettled;
        return $this;
    }
}