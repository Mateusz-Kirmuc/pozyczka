<?php

namespace Service;

use Entity\BookEntryEntity;
use Entity\Dictionary\BookEntryCategoryDictionaryEntity;
use Entity\Dictionary\BookEntryTypeDictionaryEntity;
use Entity\LoanEntity;

class LoanService {

    /**
     * @param LoanEntity $loan
     * @throws \Exception
     */
    public function initLoan(LoanEntity $loan): void {
        // book capital
        $amountCapital = $loan->getAmount();
        $entryCapital = $this->createBookEntry(
            $amountCapital,
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_CHARGE,
            BookEntryTypeDictionaryEntity::TYPE_NAME_CAPITAL
        );
        $entryCapital->setIsSettled(false);
        $loan->addEntryToBook($entryCapital);

        // book provision
        $amountProvision = $loan->getAmount() * $loan->getProvisionPercent() / 100;
        $entryProvision = $this->createBookEntry($amountProvision,
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_CHARGE,
            BookEntryTypeDictionaryEntity::TYPE_NAME_PROVISION
        );
        $entryProvision->setIsSettled(false);
        $loan->addEntryToBook($entryProvision);
    }

    /**
     * @param LoanEntity $loan
     * @throws \Exception
     */
    public function chargeInterest(LoanEntity $loan): void {
        // book interest
        $amount = $loan->getAmount() * $loan->getInterestPercent() / 100;
        $entry = $this->createBookEntry(
            $amount,
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_CHARGE,
            BookEntryTypeDictionaryEntity::TYPE_NAME_INTEREST
        );
        $entry->setIsSettled(false);
        $loan->addEntryToBook($entry);
    }

    /**
     * @param LoanEntity $loan
     * @param float $amount
     * @throws \Exception
     */
    public function payment(LoanEntity $loan, float $amount): void {
        // book capital
        $loan->addEntryToBook($this->createBookEntry(
            $amount,
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_RECOGNITION,
            BookEntryTypeDictionaryEntity::TYPE_NAME_PAYMENT
        ));

        // group book by entry type
        $groupedBook = [];

        foreach ($loan->getBook() as $entry) {
            if ($entry->isSettled() === false) {
                $groupedBook[$entry->getType()->getTypeName()][] = $entry;
            }
        }

        // settlement of interest
        $bookedInterests = $groupedBook[BookEntryTypeDictionaryEntity::TYPE_NAME_INTEREST];
        /** @var BookEntryEntity $interest */
        foreach ($bookedInterests as $interest) {
            $entry = $this->createBookEntry(
                $interest->getAmount(),
                BookEntryCategoryDictionaryEntity::CATEGORY_NAME_SETTLEMENT,
                $interest->getType()->getTypeName()
            );
            $amount -= $entry->getAmount();
            if($amount){
                $loan->addEntryToBook($entry);
                $interest->setIsSettled(true);
            }
        }

        // settlement of provision
        /** @var BookEntryEntity $bookedProvision */
        $bookedProvision = $groupedBook[BookEntryTypeDictionaryEntity::TYPE_NAME_PROVISION][0];
        $entryProvision = $this->createBookEntry(
            $bookedProvision->getAmount(),
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_SETTLEMENT,
            $bookedProvision->getType()->getTypeName()
        );

        $amount -= $entryProvision->getAmount();

        if ($amount) {
            $loan->addEntryToBook($entryProvision);
            $bookedProvision->setIsSettled(true);
        }

        // settlement of capital
        /** @var BookEntryEntity $bookedCapital */
        $bookedCapital = $groupedBook[BookEntryTypeDictionaryEntity::TYPE_NAME_CAPITAL][0];
        $entryCapital = $this->createBookEntry(
            $amount,
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_SETTLEMENT,
            $bookedCapital->getType()->getTypeName()
        );
        if ($amount){
            $loan->addEntryToBook($entryCapital);
            $bookedCapital->setIsSettled(true);
        }
    }

    /**
     * @param LoanEntity $loan
     * @param int $dayNumber
     * @return int
     * @throws \Exception
     */
    public function getBalance(LoanEntity $loan, int $dayNumber): int {
        $loanStartDay = new \DateTime($loan->getDate()->format('Y-m-d'));
        $loanRequestedDay = $loanStartDay->modify("+ {$dayNumber} day");
        $balance = 0;

        foreach ($loan->getBook() as $entry) {
            if ($entry->getDate() < $loanRequestedDay) {
                if ($entry->getCategory()->getCategoryName() === BookEntryCategoryDictionaryEntity::CATEGORY_NAME_RECOGNITION ||
                    $entry->getCategory()->getCategoryName() === BookEntryCategoryDictionaryEntity::CATEGORY_NAME_SETTLEMENT
                ) {
                    $balance -= $entry->getAmount();
                } elseif ($entry->getCategory()->getCategoryName() === BookEntryCategoryDictionaryEntity::CATEGORY_NAME_CHARGE) {
                    $balance += $entry->getAmount();
                }
            }
        }

        return $balance;
    }

    /**
     * @param float $amount
     * @param string $categoryName
     * @param string $typeName
     * @return BookEntryEntity
     * @throws \Exception
     */
    private function createBookEntry(float $amount, string $categoryName, string $typeName): BookEntryEntity {
        $category = new BookEntryCategoryDictionaryEntity($categoryName);
        $type = new BookEntryTypeDictionaryEntity($typeName);
        $entry = new BookEntryEntity($amount, $category, $type);
        return $entry;
    }
}