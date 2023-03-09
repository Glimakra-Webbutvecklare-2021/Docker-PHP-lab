<?php
declare(strict_types=1);

// inludera filer som ex globala funktioner
include("_includes/global-functions.php");

$title = "Tree structure";
include "_includes/pre.php";
?>



<!-- php -->
<h1><?= $title ?></h1>

<ul>
    <li>Frukt
        <ul>
            <li>Äpple
                <ul>
                    <li>Åkerö</li>
                    <li>Ribston</li>
                    <li>Cox Orange</li>
                </ul>
            </li>
            <li>Päron
                <ul>
                    <li>Greve Moltke</li>
                    <li>Gråpäron</li>
                </ul>
            </li>
            <li>Citrus
                <ul>
                    <li>Apelsin</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>Grönsaker
        <ul>
            <li>Tomat
                <ul>
                    <li>Röda</li>
                    <li>Gula</li>
                </ul>
            </li>
            <li>Sallad</li>
        </ul>
    </li>
</ul>

<nav id="breadcrumb">
    Frukt &raquo; Päron &raquo; Greve Moltke
</nav>

<h3>En lista baserad på an associative array</h3>

<?php

$categories = [
    ["id" => 1, "parent_id" => 0, "title" => "Frukt"],
    ["id" => 2, "parent_id" => 1, "title" => "Äpple"],
    ["id" => 3, "parent_id" => 2, "title" => "Åkerö"],
    ["id" => 4, "parent_id" => 2, "title" => "Ribston"],
    ["id" => 5, "parent_id" => 2, "title" => "Cox Orange"],
    ["id" => 6, "parent_id" => 1, "title" => "Päron"],
    ["id" => 7, "parent_id" => 6, "title" => "Greve Moltke"],
    ["id" => 8, "parent_id" => 6, "title" => "Gråpäron"],
    ["id" => 9, "parent_id" => 1, "title" => "Citrus"],
    ["id" => 10, "parent_id" => 9, "title" => "Apelsin"],
    ["id" => 11, "parent_id" => 0, "title" => "Grönsaker"],
    ["id" => 12, "parent_id" => 11, "title" => "Tomat"],
    ["id" => 13, "parent_id" => 12, "title" => "Röda"],
    ["id" => 14, "parent_id" => 12, "title" => "Gula"],
    ["id" => 15, "parent_id" => 11, "title" => "Sallad"]
];

// print_r2($categories);

// en rekursiv funktion används för en trädstruktur
// funktionen kallar på sig själv
function print_tree($a, int $parent_id = 0)
{
    foreach ($a as $item) {
        if ($item['parent_id'] === $parent_id) {
            echo $item['title'] . "<br>";
            print_tree($a, $item['id']);
        }
    }
}

// lab
// hur många iterationer krävdes....?
$counter = 0;
function print_tree1($a, int $parent_id = 0, $rounds = 0)
{
    global $counter;
    foreach ($a as $item) {
        $counter++;
        if ($item['parent_id'] === $parent_id) {
            echo str_repeat("&nbsp;", $rounds);
            echo $item['title'] . "<br>";
            print_tree1($a, $item['id'], $rounds + 4);
        }
    }
}

// uppgift
// se om ni kan skapa en funktion som istället skriver trädet som en ul li lista





// random array med shuffle()
shuffle($categories);
// print_r($categories);


echo "Antal iterationer innan: $counter <br>";
// print_tree($categories, 0);
print_tree1($categories, 0);
echo "Antal iterationer efter: $counter <br>";


?>


<!-- footer -->
<?php
include "_includes/post.php";
?>