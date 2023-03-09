<?php
declare(strict_types=1);

// inludera filer som ex globala funktioner
include("_includes/global-functions.php");


// print_r2($_SERVER);
// print_r2($_SERVER['REQUEST_METHOD']);

// deklarera variabler som ska användas i ett formulär - för att visa aktuellt värde
$first_name = "";



// kontrollera om request POST är aktuell
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // en global array $_POST
    // print_r2($_POST);

    // first_name
    // print_r2($_POST['first_name']);

    // undefined key...use isset()
    // $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : ""; 

    // check i text is ok?
    // skip html tags....use strip_tags()
    // use trim() to remove blanks
    // ...vad är giltiga i ett förnamn ... regex
    $first_name = isset($_POST['first_name']) ? trim(strip_tags($_POST['first_name']))  : ""; 

}



$title = "PHP Post";
include "_includes/pre.php";
?>



<!-- php -->
<h1><?= $title ?></h1>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <p>
        Förnamn:
        <input type="text" name="first_name" value="<?= $first_name ?>">
    </p>
    <input type="submit" value="Sänd request">
</form>




<!-- footer -->
<?php
include "_includes/post.php";
?>