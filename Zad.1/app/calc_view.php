<?php require_once dirname(__FILE__).'/../config.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Calculator</title>

    <meta name="author" content="Wojciech Bialas">
    <meta name="description" content="PHP application made by Wojciech Bialas for Network Applications faculty">
    <meta name="keywords" content="network, app, faculty, silesian university">

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=font1|font2|etc" type="text/css">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
</head>
<body>

<h1>Credit Calculator</h1>


<form action="<?php print(_APP_URL);?>src/app/calc.php" method="post">
    <label>Kwota kredytu: </label><br>
    <input type="number" name="loanAmount" value="<?php if(isset($loanAmount)) print($loanAmount); ?>" /><br>
    <label>Ilosc lat: </label><br>
    <input type="number" name="loanYears" value="<?php if(isset($loanYears)) print($loanYears); ?>" /><br>
    <label>Oprocentowanie: </label><br>
    <input type="number" name="interest" value="<?php if(isset($interest)) print($interest); ?>" /><br><br>
    <input type="submit" value="Oblicz" />
</form>

<?php
if (isset($errors)) {
    if (count($errors) > 0) {
        foreach ($errors as $key => $msg) {
            echo '<ol>';
            echo '<br>'.$msg.'<br>';
            echo '</ol>';
        }
    }
}

if (isset($result)) {
    echo '<div>';
    echo '<br>'.'Miesięczna rata: '.round($result, 2).'zł';
    echo '</div>';
}
?>

</body>
</html>