<?php
    require_once dirname(__FILE__) .'/../config.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prosty kalkulator</title>
</head>
<body>
<form action="<?php print(_APP_URL);?>/apps/calc_credit.php" method="post">
            <label >Kwota kredytu: </label>
            <input type="number" min="0" name="loanValue" value="<?php if(isset($loanValue)) print($loanValue); ?>" /><br />
            <label >Na ile lat: </label>
            <input type="number" min="0" name="yearsOfCredit" value="<?php if(isset($yearsOfCredit)) print($yearsOfCredit); ?>" /><br />
            <label >Oprocentowanie: </label>
            <input type="number" min="0" name="percent" value="<?php if(isset($percent)) print($percent); ?>" /><br />
            <input type="submit" value="Oblicz" />
        </form>

        <?php
            if (isset($errorMessages)) {
                if (count($errorMessages) > 0) {
                    echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';

                    foreach ($errorMessages as $key => $msg) {
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
    
</body>
</html>