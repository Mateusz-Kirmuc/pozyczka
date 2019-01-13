<?php

namespace Test;

foreach (glob(dirname(__DIR__) . '/Entity/*.php') as $filename) {
    include $filename;
}

foreach (glob(dirname(__DIR__) . '/Entity/Dictionary/*.php') as $filename) {
    include $filename;
}

foreach (glob(dirname(__DIR__) . '/Service/*.php') as $filename) {
    include $filename;
}

use Entity\ClientEntity;
use Entity\LoanEntity;
use Service\LoanService;

// utworzenie encji klienta
$client = new ClientEntity('Piotr', 'Nowak');

// utworzenie encji pożyczki
$loan = new LoanEntity($client, 1700, 27.45, 0.026);

// pobranie serwisu
$service = new LoanService();

// pierwszy dzień, inicjacja pożyczki
$service->initLoan($loan);

// naliczenie odsetek
$service->chargeInterest($loan);

// drugi dzień, naliczenie odsetek
$service->chargeInterest($loan);

// trzeci dzień, naliczenie odsetek
$service->chargeInterest($loan);

// wpłata od klienta
$service->payment($loan, 1000);

print_r($loan->getBook());
