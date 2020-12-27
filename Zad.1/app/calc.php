<?php
require_once dirname(__FILE__).'/../config.php';

$loanAmount = $_POST['loanAmount'];
$loanYears = $_POST['loanYears'];
$interest = $_POST['interest'];

if ( !(isset($loanAmount) && isset($loanYears) && isset($interest)) ) {
    $errors [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if (empty($loanAmount)) {
    $errors [] = 'Nie podano kwoty!';
}

if (empty($loanYears)) {
    $errors [] = 'Nie podano okresu spłaty!';
}

if (empty($interest)) {
    $errors [] = 'Nie podano oprocentowania!';
}

if (empty($errors)) {
    $result = ( $loanAmount + $loanAmount * ($interest/100) ) / ( $loanYears*12 );
}

include 'calc_view.php';