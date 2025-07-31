<?php

// inicialització de l'array
$fruites = array("poma", "plàtan", "maduixa");
echo $fruites[0] . "<br>";
// afegir una fruita
$fruites[] = "taronja";
foreach ($fruites as $fruita) {
    echo $fruita . "<br>";
}
