<?php
require_once 'Producte.php';

// Exemple d'ús
try {
    $p = new Producte("Portàtil", 799.99);
    echo $p->mostrar();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

