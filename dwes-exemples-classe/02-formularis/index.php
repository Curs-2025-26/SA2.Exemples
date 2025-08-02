<?php

$fitxers = glob("*.php");

echo "<h2>Exemples disponibles</h2>";
echo "<ul>";
foreach ($fitxers as $f) {
    if ($f !== "index.php") {
        echo "<li><a href='$f'>$f</a></li>";
    }
}
echo "</ul>";

