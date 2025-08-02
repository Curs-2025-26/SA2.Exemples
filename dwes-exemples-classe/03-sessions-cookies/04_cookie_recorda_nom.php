<?php
$nom = $_COOKIE['nom'] ?? "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['nom']));
    setcookie('nom', $nom, time() + 3600); // 1 hora
    header("Location: 04_cookie_recorda_nom.php");
    exit;
}
?>

<h2>Recorda el teu nom</h2>
<form method="post">
    Nom: <input name="nom" value="<?= $nom ?>">
    <button>Enviar</button>
</form>

<?php if ($nom): ?>
    <p>Hola de nou, <?= $nom ?>!</p>
<?php endif; ?>

