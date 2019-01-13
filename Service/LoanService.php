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
            BookEntryCategoryDictionaryEntity::COLUMN_OWE,
            BookEntryTypeDictionaryEntity::TYPE_NAME_CAPITAL
        );
        $loan->addEntryToBook($entryCapital);

        // book provision
        $amountProvision = $loan->getAmount() * $loan->getProvisionPercent() / 100;
        $entryProvision = $this->createBookEntry($amountProvision,
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_CHARGE,
            BookEntryCategoryDictionaryEntity::COLUMN_OWE,
            BookEntryTypeDictionaryEntity::TYPE_NAME_PROVISION
        );
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
            BookEntryCategoryDictionaryEntity::COLUMN_OWE,
            BookEntryTypeDictionaryEntity::TYPE_NAME_INTEREST
        );
        $loan->addEntryToBook($entry);
    }

    /**
     * @param float $amount
     * @param string $categoryName
     * @param string $column
     * @param string $typeName
     * @return BookEntryEntity
     * @throws \Exception
     */
    private function createBookEntry(float $amount, string $categoryName, string $column, string $typeName): BookEntryEntity {
        $category = new BookEntryCategoryDictionaryEntity($categoryName, $column);
        $type = new BookEntryTypeDictionaryEntity($typeName);
        $entry = new BookEntryEntity($amount, $category, $type);
        return $entry;
    }
}