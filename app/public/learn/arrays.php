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

<h3>Sortera en array med ex sort(), rsort()</h3>

<?php

echo "Sorterad array numbers:";
sort($numbers);
print_r2($numbers);

?>


<h3>Unika värden med array_unique()</h3>

<?php
$unique_numbers = array_unique($numbers);

echo "Unika värden:";
print_r2($unique_numbers);

?>

<h2>Associative arrays</h2>

<h3>En dimensionella</h3>

<?php

// skriv Hello på önskat språk
$hello = [
    "sv" => "Hej",
    "en" => "Hi",
    "fr" => "Salut"
];

print_r2($hello['fr']);

// en iteration 
foreach ($hello as $key => $value) {
    # code...
    // print_r2($value);
    echo "$key: $value <br>";
}

?>

<h3>Fler värden i en associative array - två dimensionell array</h3>

<?php
$users = [
    ["name" => "Flisa", "tool" => "kvist"],
    ["name" => "Sten", "tool" => "sten"],
    ["name" => "Knota", "tool" => "eld"]
];

// foreach
foreach ($users as $key => $user) {
    # code...

    // använd var_dump för att se datatyp och info om ...
    // var_dump($user);
    print_r2($user);
}

// visa ett värde
echo $users[0]['tool'];

// en funktion som presenterar en stenålderskaraktär
function get_user($users, $user)
{
    // filter_array returnerat ett resultat
    $result = array_filter($users, function($name) use ($user) {return $name['name'] === $user;});

    return array_merge(...$result);
}

// anropa funktionen
$one_user = get_user($users, "Flisa");

// print_r2($one_user);

function render_user_presentation($user)
{
    echo $user['name'] . " använder gärna " . $user['tool'];
}


render_user_presentation($one_user);

?>

<h3>Ett sätt att använda multidimensionell array för att skifta språk</h3>

<?php

// skapa en array med standardspråk
$english = [
    "name" => "Name",
    "save" => "Save",
    "reset" => "Reset",
    "welcome" => "Hello! Please write your name"
];

// fler språk - använd samma key!
$swedish = [
    "name" => "Namn",
    "save" => "Spara",
    "reset" => "Nollställ",
    "welcome" => "Hej! Ange uppgidfterna nedan"
];

$norwegian = [
    "name" => "Navn",
    "save" => "Lagre",
    "reset" => "Nullstille",
    "welcome" => "Hei, skriv navnet ditt"
];

// bestäm språk - med: en | sv | ... 
$language = "no";

// skapa en array av språken
$languages = [
    "en" => $english,
    "sv" => $swedish,
    "no" => $norwegian
]

?>


<h3><?= $languages[$language]['welcome'] ?></h3>
<input type="text" name="name" id="name" placeholder="<?= $languages[$language]['name'] ?>">
<input type="reset" value="<?= $languages[$language]['reset'] ?>">
<button><?= $languages[$language]['save'] ?></button>











<h3>Tips att testa: array_rand(), in_array()</h3>



<!-- footer -->
<?php
include "_includes/post.php";
?>