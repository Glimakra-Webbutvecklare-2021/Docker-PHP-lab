<?php
declare(strict_types=1);

// inludera filer som ex globala funktioner
include("_includes/global-functions.php");

// print_r2($_FILES);

$upload_success = false;

if (!empty($_FILES)) {

    $name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $size = $_FILES['image']['size'];

    // utgå från att fel fil laddas upp

    if ($error) {
        exit("Filen laddades inte upp, code: $error");
    }

    // kontrollera om det är rätt filtyp, dvs en bild
    $allowed_file_extensions = ["gif", "jpg", "jpeg", "png"];

    // aktuell filtyp för uppladdad fil
    $type_parts = explode("/", $type);

    // print_r($type_parts);
    $extension = $type_parts[1];
    
    // kontrollera med in_array
    if (!in_array($extension, $allowed_file_extensions)) {
        exit("Inte en giltig filtyp: $extension");
    }

    // alternativ för att spara uppladdad bild: katalogstrukturen som en fil, i databas
    // lämpligt att spara fil i mappen public
    $target_directory = $_SERVER['DOCUMENT_ROOT'] . "/content/uploads/";

    // en temporärt uppladdad fil kan flyttas med php: move_uploaded_file()

    // om filnamnet inte ska vara original, kan man generera en random text sträng med uniqid()
    print_r2(uniqid());


    if (move_uploaded_file($tmp_name, $target_directory . $name)) {

        echo "Filen $name laddades upp, storlek: $size";
        $upload_success = true;
    }

}


$title = "Ladda upp filer";
include "_includes/pre.php";
?>



<!-- php -->
<h1><?= $title ?></h1>


<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="Ladda upp fil">
</form>

<div>

<?php

    if ($upload_success) {
        echo "<img src='/content/uploads/$name' alt='Bilden $name'>";
    }

?>

</div>


<!-- footer -->
<?php
include "_includes/post.php";
?>