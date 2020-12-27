<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Damian Krawczyk">
    <title>Kalkulator Kredytowy</title>
</head>
<body>
        <div style="width:90%; margin: 2em auto;">
             <a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
             <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
        </div>

        <div style="width:90%; margin: 2em auto;">

             <form action="<?php print(_APP_URL);?>/app/calc_credit.php" method="post" class="pure-form pure-form-stacked">
                <label >Kwota kredytu: </label>
                <input type="number" min="0" name="loanValue" value="<?php if(isset($loanValue)) print($loanValue); ?>" /><br />
                <label >Na ile lat: </label>
                <input type="number" min="0" name="yearsOfCredit" value="<?php if(isset($yearsOfCredit)) print($yearsOfCredit); ?>" /><br />
                <label >Oprocentowanie: </label>
                <input type="number" min="0" name="percent" value="<?php if(isset($percent)) print($percent); ?>" /><br />
                <input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
             </form>

            <?php
                if (isset($messages)) {
                    if (count($messages) > 0) {
                        echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';

                        foreach ($messages as $key => $msg) {
                            echo '<li>'.$msg.'</li>';
                        }

                        echo '</ol>';
                    }
                }
                if (isset($result)) {
                    echo '<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #aaff00; width:300px;">';
                    echo 'Miesięczna rata będzie wynosić: '.round($result, 2).'zł';
                    echo '</div>';
                }
            ?>

        </div>
    
</body>
</html>