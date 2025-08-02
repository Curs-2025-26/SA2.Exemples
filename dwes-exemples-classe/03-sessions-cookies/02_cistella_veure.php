<?php
session_start();
$cistella = $_SESSION["cistella"] ?? [];
?>

<h2>Productes en la cistella</h2>
<?php if (empty($cistella)): ?>
    <p>No hi ha cap producte encara.</p>
<?php else: ?>
    <ul>
        <?php foreach ($cistella as $item): ?>
            <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <button name="buidar" value="1">Buidar cistella</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["buidar"])) {
    unset($_SESSION["cistella"]);
    header("Location: 02-cistella-veure.php");
    exit;
}
?>

