<?php
declare(strict_types=1);

// inludera filer som ex globala funktioner
include("_includes/global-functions.php");


// print_r2($_SERVER);
// print_r2($_SERVER['REQUEST_METHOD']);

// deklarera variabler som ska användas i ett formulär - för att visa aktuellt värde
$first_name = "";
$country = "";
$message = "";
$terms = "";
$email = "";


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

    // select option - no need to check option values...
    $country = isset($_POST['country']) ? $_POST['country'] : "";
    print_r2($country);

    // textarea
    $message = isset($_POST['message']) ? $_POST['message'] : "";

    // är tags ok? annars  strip_tags()
    // är följande tecken "äventyrliga" < > " ' & ... ersätt med htmlspecialchars()
    $message = htmlspecialchars($message);

    // checkbox
    // print_r2($_POST['terms']);

    $terms = isset($_POST['terms']) ? $_POST['terms'] : "";


    // validering server-side av email - använd inbyggt filter 
    // filter_input()  filter_var()
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    

    print_r2($email);

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
    <p>
        Land:
        <select name="country" id="">
            <option value="sweden" <?= $country === "sweden"  ? "selected" : "" ?>>Sverige</option>
            <option value="norway" <?= $country === "norway"  ? "selected" : "" ?>>Norge</option>
            <option value="denmark" <?= $country === "denmark"  ? "selected" : "" ?>>Danmark</option>
        </select>
    </p>
    <p>
        Meddelande:
        <textarea name="message" id="" cols="30" rows="10"><?= $message ?></textarea>
    </p>
    <p>
        Jag accepterar villkoren <input type="checkbox" name="terms" value="1" <?= $terms === "1" ? "checked" : "" ?> >
    </p>

    <p>
        E-post: <input type="text" name="email" id="" value="<?= $email ?>">
    </p>

    <input type="submit" value="Sänd request">
</form>


Meddelande som finns:
<p>
    <?= $message ?>
</p>




<!-- footer -->
<?php
include "_includes/post.php";
?>