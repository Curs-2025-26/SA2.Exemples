<?php
$fitxer = 'productes.csv';
$missatge = "";

// Escriure al fitxer
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST["nom"] ?? '');
    $preu = floatval($_POST["preu"] ?? 0);

    if ($nom && $preu > 0) {
        $fp = fopen($fitxer, 'a');
        fputcsv($fp, [$nom, $preu]);
        fclose($fp);
        $missatge = "Producte afegit!";
    } else {
        $missatge = "Tots els camps són obligatoris.";
    }
}

// Llegir el fitxer
$files = [];
if (file_exists($fitxer)) {
    $fp = fopen($fitxer, 'r');
    while ($dades = fgetcsv($fp)) {
        $files[] = $dades;
    }
    fclose($fp);
}
?>

<h2>Afegir producte</h2>
<form method="post">
    Nom: <input name="nom"> <br>
    Preu: <input name="preu" type="number" step="0.01"> <br>
    <button>Afegir</button>
</form>

<p><?= $missatge ?></p>

<h2>Llista de productes</h2>
<?php if (empty($files)): ?>
    <p>No hi ha cap producte.</p>
<?php else: ?>
    <table border="1">
        <tr><th>Nom</th><th>Preu (€)</th></tr>
        <?php foreach ($files as [$n, $p]): ?>
            <tr><td><?= htmlspecialchars($n) ?></td><td><?= htmlspecialchars($p) ?></td></tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

