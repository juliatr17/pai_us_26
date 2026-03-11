<?php

// 1. pobranie parametrów

$loan = $_REQUEST["loan"] ?? "";
$interest = $_REQUEST["interest"] ?? "";
$years = $_REQUEST["years"] ?? "";

// 2. walidacja

$error = "";

if (!is_numeric($loan) || !is_numeric($interest) || !is_numeric($years)){
    $error = "Podaj poprawne liczby";
}

// 3. wykonanie zadania

if ($error == ""){

    $loan = floatval($loan);
    $interest = floatval($interest);
    $years = floatval($years);

    $payment = ($loan * $interest) / (12 * $years);
}

// 4. widok

include "calc_view.php";

?>