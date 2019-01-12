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
        $categoryCharge = new BookEntryCategoryDictionaryEntity(
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_CHARGE,
            BookEntryCategoryDictionaryEntity::COLUMN_OWE
        );

        // book capital
        $typeCapital = new BookEntryTypeDictionaryEntity(BookEntryTypeDictionaryEntity::TYPE_NAME_CAPITAL);
        $amountCapital = $loan->getAmount();
        $entryCapital = new BookEntryEntity($amountCapital, $categoryCharge, $typeCapital);
        $loan->addEntryToBook($entryCapital);

        // book provision
        $typeProvision = new BookEntryTypeDictionaryEntity(BookEntryTypeDictionaryEntity::TYPE_NAME_PROVISION);
        $amountProvision = $loan->getAmount() * $loan->getProvisionPercent() / 100;
        $entryProvision = new BookEntryEntity($amountProvision, $categoryCharge, $typeProvision);
        $loan->addEntryToBook($entryProvision);
    }

    /**
     * @param LoanEntity $loan
     * @throws \Exception
     */
    public function chargeInterest(LoanEntity $loan): void {
        // book interest
        $category = new BookEntryCategoryDictionaryEntity(
            BookEntryCategoryDictionaryEntity::CATEGORY_NAME_CHARGE,
            BookEntryCategoryDictionaryEntity::COLUMN_OWE);
        $type = new BookEntryTypeDictionaryEntity(BookEntryTypeDictionaryEntity::TYPE_NAME_INTEREST);
        $amount = $loan->getAmount() * $loan->getInterestPercent() / 100;
        $entry = new BookEntryEntity($amount, $category, $type);
        $loan->addEntryToBook($entry);
    }
}