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
        $categoryCharge = new BookEntryCategoryDictionaryEntity('charge', 'owe');

        // book capital
        $typeCapital = new BookEntryTypeDictionaryEntity('capital');
        $amountCapital = $loan->getAmount();
        $entryCapital = new BookEntryEntity($amountCapital, $categoryCharge, $typeCapital);
        $loan->addEntryToBook($entryCapital);

        // book provision
        $typeProvision = new BookEntryTypeDictionaryEntity('provision');
        $amountProvision = $loan->getAmount() * $loan->getInterestPercent() / 100;
        $entryProvision = new BookEntryEntity($amountProvision, $categoryCharge, $typeProvision);
        $loan->addEntryToBook($entryProvision);
    }
}