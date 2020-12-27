<?php
    require_once dirname(__FILE__).'/../config.php';

    include _ROOT_PATH.'/app/security/check.php';

    function getParams(&$loanValue, &$yearsOfCredit, &$percent){
        $loanValue = isset($_POST['loanValue']) ? $_POST['loanValue'] : null;
        $yearsOfCredit = isset($_POST['yearsOfCredit']) ? $_POST['yearsOfCredit'] : null;
        $percent = isset($_POST['percent']) ? $_POST['percent'] : null;
    }

    function validate(&$loanValue, &$yearsOfCredit, &$percent, &$messages){
        if (!(isset($loanValue) && isset($yearsOfCredit) && isset($percent))) {
            return false;
        }

        if ($loanValue == null) {
            $messages [] = 'Nie podano kwoty kredytu.';
        }
        if (empty($yearsOfCredit)) {
            $messages [] = 'Nie podano na ile lat jest kredyt.';
        }
        if (empty($percent)) {
            $messages [] = 'Nie podano jakie jest oprocentowanie.';
        }

        if (count($messages) != 0) {
            return false;
        }
        else {
            return true;
        }
    }

    function process(&$loanValue,&$yearsOfCredit,&$percent,&$messages,&$result){
        global $role;

        if ($role == 'admin') {
            if (empty($messages)) {
                $result = (($loanValue + ($loanValue * ($percent / 100))) / ($yearsOfCredit * 12));
            }
        } else {
            $messages [] = 'Tylko administrator może wyliczyć oprocentowanie !';
        }
    }

    $loanValue = null;
    $yearsOfCredit = null;
    $percent = null;
    $result = null;
    $messages = array();

    getParams($loanValue,$yearsOfCredit,$percent);

    if (validate($loanValue,$yearsOfCredit,$percent,$messages)) {
        process($loanValue,$yearsOfCredit,$percent,$messages,$result);
    }

    include 'calc_credit_view.php';