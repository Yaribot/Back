<?php 
echo "<h1>Détails du film n° <strong>$_GET[id_film]</strong></h1>";

echo '<pre>'; print_r($_GET); echo '</pre>';

foreach($_GET as $key => $value)
{
    echo"$key => $value<br>";
}
?>