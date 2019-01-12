<?php
foreach (glob(dirname(__DIR__). '/Entity/*.php') as $filename) {
    include $filename;
}