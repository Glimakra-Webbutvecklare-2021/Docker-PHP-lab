<?php
declare(strict_types=1);

// inludera filer som ex globala funktioner
include("_includes/global-functions.php");


$title = "Funktioner";
include "_includes/pre.php";
?>

<!-- php -->
<h1><?= $title ?></h1>

<ul>
    <li>Använd beskrivande funktionsnamn</li>
    <li>Följ en kodstandard</li>
    <li>Validera variablers värde</li>
    <li>Använd flera funktioner istället för stora komplexa</li>
    <li>Dokumentera funktionen</li>
</ul>


<?php


// en funktions namn bör berätta vad funktionen gör
/* function calculate_total($price, $amount) 
{
    return $price * $amount;
}
 */

/* function calculate_total($price, $amount) 
{

    // kolla datatyp met gettype()
    echo gettype($price);
    echo gettype($amount);

    // om datatypen inte är integer avbryt funktionen
    if (gettype($price) !== "integer") {
        die("Wrong datatype");
    }

    return $price * $amount;
}
 */ 




/**
 * calculate_total 
 *
 * @param  int $price
 * @param  int $amount
 * @return int
 */
function calculate_total(int $price, int $amount): int
{
    if (!is_number($price) || !is_number($amount)) {
        exit("Not valid");
    }
    return $price * $amount;
}


//  testa funktionen
$total = calculate_total(7, 103);

// presentera summan
echo "Kostnad: $total";


// 

/**
 * is_number
 * ett rimligt tal inom min max
 *
 * @param  mixed $x
 * @return bool
 */
function is_number($x) 
{
    // retunera true | false
    return ($x >= 0 && $x <= 1000);
}


?>

<!-- footer -->
<?php
include "_includes/post.php";
?>