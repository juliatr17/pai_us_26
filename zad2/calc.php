<?php

$loan     = $_GET["loan"]     ?? "";
$interest = $_GET["interest"] ?? "";
$years    = $_GET["years"]    ?? "";

$errorLoan     = "";
$errorInterest = "";
$errorYears    = "";

if ($_SERVER["REQUEST_METHOD"] === "GET" && !empty($_GET)) {

    if ($loan === "") {
        $errorLoan = "Podaj kwotę kredytu";
    } elseif (!is_numeric($loan) || $loan <= 0) {
        $errorLoan = "Kwota musi być liczbą dodatnią";
    }

    if ($interest === "") {
        $errorInterest = "Podaj oprocentowanie";
    } elseif (!is_numeric($interest) || $interest <= 0) {
        $errorInterest = "Oprocentowanie musi być dodatnie";
    }

    if ($years === "") {
        $errorYears = "Podaj liczbę lat";
    } elseif (!is_numeric($years) || $years <= 0 || $years > 50) {
        $errorYears = "Liczba lat musi być dodatnia (max 50)";
    }

    if ($errorLoan === "" && $errorInterest === "" && $errorYears === "") {
        $P = floatval($loan);
        $r = floatval($interest) / 100 / 12;  // monthly rate
        $n = floatval($years) * 12;            // total months

        // Annuity formula
        if ($r == 0) {
            $payment = $P / $n; // edge case: 0% interest
        } else {
            $payment = $P * ($r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
        }
    }
}

include "index.php";