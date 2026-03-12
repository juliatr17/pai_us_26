<?php

// 1. pobranie parametrów

$loan = $_REQUEST["loan"] ?? "";
$interest = $_REQUEST["interest"] ?? "";
$years = $_REQUEST["years"] ?? "";

// zmienne błędów
$errorLoan = "";
$errorInterest = "";
$errorYears = "";

// 2. walidacja

if ($loan == "") {
    $errorLoan = "Podaj kwotę kredytu";
} elseif (!is_numeric($loan)) {
    $errorLoan = "Kwota musi być liczbą";
}

if ($interest == "") {
    $errorInterest = "Podaj oprocentowanie";
} elseif (!is_numeric($interest)) {
    $errorInterest = "Oprocentowanie musi być liczbą";
}

if ($years == "") {
    $errorYears = "Podaj liczbę lat";
} elseif (!is_numeric($years)) {
    $errorYears = "Liczba lat musi być liczbą";
}

// 3. wykonanie zadania

if ($errorLoan == "" && $errorInterest == "" && $errorYears == "") {

    $loan = floatval($loan);
    $interest = floatval($interest);
    $years = floatval($years);

    $payment = ($loan * $interest) / (12 * $years);
}

// 4. widok

include "calc_view.php";

?>