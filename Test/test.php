<?php

namespace Test;

foreach (glob(dirname(__DIR__) . '/Entity/*.php') as $filename) {
    include $filename;
}

foreach (glob(dirname(__DIR__) . '/Entity/Dictionary/*.php') as $filename) {
    include $filename;
}

use Entity\BookEntryEntity;
use Entity\ClientEntity;
use Entity\Dictionary\BookEntryCategoryDictionaryEntity;
use Entity\Dictionary\BookEntryTypeDictionaryEntity;
use Entity\LoanEntity;

// utworzenie encji klienta
$client = new ClientEntity('Piotr', 'Nowak');

// utworzenie słowników wpisów księgowych:

// 3 kategorie: obciążenie, uznanie, rozliczenie
$categoryCharge = new BookEntryCategoryDictionaryEntity('charge', 'own');
$categoryRecognition = new BookEntryCategoryDictionaryEntity('recognition', 'has');
$categorySettlement = new BookEntryCategoryDictionaryEntity('settlement', 'has');

// 4 typy: kapitał, odsetki, prowizja, wpłata
$typeCapital = new BookEntryTypeDictionaryEntity('capital');
$typeInterest = new BookEntryTypeDictionaryEntity('interest');
$typeProvision = new BookEntryTypeDictionaryEntity('provision');
$typePayment = new BookEntryTypeDictionaryEntity('payment');

// utworzenie encji pożyczki
$loan = new LoanEntity($client, 1700, 27.45, 0.026);