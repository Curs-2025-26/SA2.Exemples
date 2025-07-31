<?php

$edat = 20;
if ($edat < 0) {
    echo "Edat invàlida<br/>";
} else{
    if ($edat >= 18) {
        echo "Ets major d'edat<br/>";
    } else {
        echo "Ets menor d'edat<br/>";
    }
}