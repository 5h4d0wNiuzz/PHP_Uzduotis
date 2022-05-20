<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    ##include "function.php";
    include "bootstrap.php";
    $readingFun = new readingFun();
    $fileName = "info.csv";
    echo $readingFun->readingCsv($fileName);
    print_r($readingFun->tabToArray($fileName));
?>
