<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {font-family: monospace;}
    </style>
</head>
<body>
    <header>
        <a href="/">Tillbaka till startsidan</a> | 
        <a href="/learn">Learn</a> | 
        <a href="<?= $_SERVER['PHP_SELF'] ?>">Ladda om</a> |
    </header>
    <hr>