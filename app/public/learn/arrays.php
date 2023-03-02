<?php
declare(strict_types=1);

// inludera filer som ex globala funktioner
include("_includes/global-functions.php");

$title = "Arrays";
include "_includes/pre.php";
?>



<!-- php -->
<h1><?= $title ?></h1>

<ul>
    <li>https://www.php.net/manual/en/function.array.php</li>
    <li>Vissa inbyggda metoder returnerar ett resultat</li>
    <li>Kontrollera datatyp is_array()</li>
    <li>nyckelordet explode skapar en array från en sträng</li>
    <li>nyckelordet implode skapar en sträng an en array</li>
</ul>


<h3>Lägg till element med array_push()</h3>

<?php

// en array skapas med array() eller en array literal [] 
$a = [1,2,3];
array_push($a, 4);

print_r2($a);

array_push($a, 5,6);
print_r2($a);

// array_push($a, [23, 45]);
// print_r2($a);
?>


<h3>Lägg till, ta bort med array_pop(), array_shift()</h3>
<!--  -->

<h3>Räkna antal element i en array med count()</h3>

<?php
$number_of_elements = count($a);
echo "Antal element: $number_of_elements";
?>

<h3>Merga arrayer med array_merge() - return...</h3>

<?php

$result = array_merge($a, [2,5,9]);

print_r2($result);

?>

<h3>Filter array med array_filter() - return...</h3>

<?php

$numbers = [1,2,3,4,5,6,7,8,9,3,6,3,6,8,344,121];

// som en anonym funktion
$reduced_numbers = array_filter($numbers, function($x) {return $x > 5;});

print_r2($reduced_numbers);

// använd namngiven funktion som ett filter
// deklarerad i global functions

$even_numbers = array_filter($numbers, "even");

print_r2($even_numbers);

$odd_numbers = array_filter($numbers, "odd");

print_r2($odd_numbers);


?>



<!-- footer -->
<?php
include "_includes/post.php";
?>