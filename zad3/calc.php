<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');

$loan = isset($_GET["loan"]) ? $_GET["loan"] : "";
$interest = isset($_GET["interest"]) ? $_GET["interest"] : "";
$years = isset($_GET["years"]) ? $_GET["years"] : "";

$errorLoan = "";
$errorInterest = "";
$errorYears = "";
$payment = null;

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
        $r = floatval($interest) / 100 / 12;
        $n = floatval($years) * 12;

        if ($r == 0) {
            $payment = $P / $n;
        } else {
            $payment = $P * ($r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
        }
    }
}

$smarty->assign('loan', $loan);
$smarty->assign('interest', $interest);
$smarty->assign('years', $years);
$smarty->assign('errorLoan', $errorLoan);
$smarty->assign('errorInterest', $errorInterest);
$smarty->assign('errorYears', $errorYears);
$smarty->assign('payment', $payment);

$smarty->display('calculator.tpl');

?>