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
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return ClientEntity
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return ClientEntity
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return LoanEntity
     */
    public function getLoan()
    {
        return $this->loan;
    }

    /**
     * @param LoanEntity $loan
     * @return ClientEntity
     */
    public function setLoan($loan)
    {
        $this->loan = $loan;
        return $this;
    }
}