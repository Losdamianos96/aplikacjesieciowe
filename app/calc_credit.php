<?php
    require_once dirname(__FILE__).'/../config.php';

    $loanValue = $_POST['loanValue'];
    $yearsOfCredit = $_POST['yearsOfCredit'];
    $percent = $_POST['percent'];

    if (!(isset($loanValue) && isset($yearsOfCredit) && isset($percent))) {
        $errorMessages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
    }

    if (empty($loanValue)) {
        $errorMessages [] = 'Nie podano kwoty kredytu.';
    }
    if (empty($yearsOfCredit)) {
        $errorMessages [] = 'Nie podano na ile lat jest kredyt.';
    }
    if (empty($percent)) {
        $errorMessages [] = 'Nie podano jakie jest oprocentowanie.';
    }

    if (empty($errorMessages)) {
        $result = ($loanValue / $yearsOfCredit * 12 * ($percent / 100)) + $loanValue / $yearsOfCredit * 12;
    }

    include 'calc_credit_view.php';
    ?>