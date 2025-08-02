<?php
session_start();
require_once 'Usuari.php';

// Usuari fix per a demostració
$usuariDemo = new Usuari("admin", "1234");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuariInput = $_POST["usuari"] ?? '';
    $clauInput = $_POST["clau"] ?? '';

    if ($usuariDemo->validar($usuariInput, $clauInput)) {
        $_SESSION["login"] = true;
        $_SESSION["usuari"] = $usuariDemo->getNom();
        header("Location: login.php");
        exit;
    } else {
        $error = "Credencials incorrectes.";
    }
}

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<?php if (!isset($_SESSION["login"])): ?>
    <h2>Inici de sessió</h2>
    <form method="post">
        Usuari: <input name="usuari"><br>
        Clau: <input type="password" name="clau"><br>
        <button>Entrar</button>
        <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    </form>
<?php else: ?>
    <p>Hola, <?= htmlspecialchars($_SESSION["usuari"]) ?>!</p>
    <a href="?logout=1">Tanca sessió</a>
<?php endif; ?>

