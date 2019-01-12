<?php

namespace Entity;

/**
 * Class ClientEntity
 * @package Entity
 */
class ClientEntity {
    /** @var string */
    protected $firstName;

    /** @var string */
    protected $lastName;

    /** @var LoanEntity */
    protected $loan;

    /**
     * ClientEntity constructor.
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return ClientEntity
     */
    public function setFirstName(string $firstName): ClientEntity {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return ClientEntity
     */
    public function setLastName(string $lastName): ClientEntity {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return LoanEntity
     */
    public function getLoan(): LoanEntity {
        return $this->loan;
    }

    /**
     * @param LoanEntity $loan
     * @return ClientEntity
     */
    public function setLoan(LoanEntity $loan): ClientEntity {
        $this->loan = $loan;
        return $this;
    }
}