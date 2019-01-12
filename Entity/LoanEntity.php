<?php

namespace Entity;

/**
 * Class LoanEntity
 * @package Entity
 */
class LoanEntity {
    /** @var \DateTime */
    protected $date;

    /** @var ClientEntity */
    protected $client;

    /** @var float */
    protected $amount;

    /** @var float */
    protected $provisionPercent;

    /** @var float */
    protected $interestPercent;

    /** @var BookEntryEntity[] */
    protected $book;

    /**
     * LoanEntity constructor.
     * @param $client
     * @param $amount
     * @param $provisionPercent
     * @param $interestPercent
     * @throws \Exception
     */
    public function __construct($client, $amount, $provisionPercent, $interestPercent) {
        $this->client = $client;
        $this->amount = $amount;
        $this->provisionPercent = $provisionPercent;
        $this->interestPercent = $interestPercent;
        $this->date = new \DateTime();
        $this->book = [];
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return LoanEntity
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return ClientEntity
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param ClientEntity $client
     * @return LoanEntity
     */
    public function setClient($client)
    {
        $this->client = $client;
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
     * @return LoanEntity
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getProvisionPercent()
    {
        return $this->provisionPercent;
    }

    /**
     * @param float $provisionPercent
     * @return LoanEntity
     */
    public function setProvisionPercent($provisionPercent)
    {
        $this->provisionPercent = $provisionPercent;
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestPercent()
    {
        return $this->interestPercent;
    }

    /**
     * @param float $interestPercent
     * @return LoanEntity
     */
    public function setInterestPercent($interestPercent)
    {
        $this->interestPercent = $interestPercent;
        return $this;
    }

    /**
     * @return BookEntryEntity[]
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param BookEntryEntity[] $book
     * @return LoanEntity
     */
    public function setBook($book)
    {
        $this->book = $book;
        return $this;
    }
}