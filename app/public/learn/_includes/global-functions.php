<?php


/**
 * render_copyright
 *
 * @return void
 */
function render_copyright()
{
    // årtal med PHP date funktion
    $year = date("Y");

    echo "&copy; $year Webbutvecklare";
}


// funktion som med print_r skapar html elementet pre för bättre överblick
function print_r2($a)
{
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}

/**
 * even - check even numbers
 *
 * @param  int $x
 * @return void
 */
function even(int $x)
{
    return $x % 2 === 0;
}


/**
 * odd - check odd numbers
 *
 * @param  int $x
 * @return void
 */
function odd(int $x)
{
    return $x % 2 !== 0;
}


?>