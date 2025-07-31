<?php

$nota = 8;
$resultat = match (true) {
    $nota === 10 => 'Excel·lent',
    $nota >= 8 && $nota <= 9 => 'Molt bé',
    $nota >= 5 && $nota <= 7 => 'Bé',
    default => 'Insuficient',
};
echo $resultat;


$producte = 'formatge';
$preu = match ($producte) {
    'pa' => 1.00,
    'llet' => 0.80,
    'formatge' => 2.50,
    default => 0.00,
};
echo "El preu de $producte és $preu euros.";
