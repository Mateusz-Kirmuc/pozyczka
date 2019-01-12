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
    public function __construct(ClientEntity $client, float $amount, float $provisionPercent, float $interestPercent) {
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
    public function getDate(): \DateTime {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return LoanEntity
     */
    public function setDate(\DateTime $date): LoanEntity {
        $this->date = $date;
        return $this;
    }

    /**
     * @return ClientEntity
     */
    public function getClient(): ClientEntity {
        return $this->client;
    }

    /**
     * @param ClientEntity $client
     * @return LoanEntity
     */
    public function setClient(ClientEntity $client): LoanEntity {
        $this->client = $client;
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
     * @return LoanEntity
     */
    public function setAmount(float $amount): LoanEntity {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getProvisionPercent(): float {
        return $this->provisionPercent;
    }

    /**
     * @param float $provisionPercent
     * @return LoanEntity
     */
    public function setProvisionPercent(float $provisionPercent): LoanEntity {
        $this->provisionPercent = $provisionPercent;
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestPercent(): float {
        return $this->interestPercent;
    }

    /**
     * @param float $interestPercent
     * @return LoanEntity
     */
    public function setInterestPercent(float $interestPercent): LoanEntity {
        $this->interestPercent = $interestPercent;
        return $this;
    }

    /**
     * @return BookEntryEntity[]
     */
    public function getBook(): array {
        return $this->book;
    }

    /**
     * @param BookEntryEntity[] $book
     * @return LoanEntity
     */
    public function setBook(array $book): LoanEntity {
        $this->book = $book;
        return $this;
    }

    /**
     * @param BookEntryEntity $entry
     */
    public function addEntryToBook(BookEntryEntity $entry): void {
        $this->book[] = $entry;
    }
}