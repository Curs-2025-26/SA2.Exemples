<?php
session_start();

$usuariCorrecte = "admin";
$clauCorrecta = "1234";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["usuari"] === $usuariCorrecte && $_POST["clau"] === $clauCorrecta) {
        $_SESSION["login"] = true;
        $_SESSION["usuari"] = $usuariCorrecte;
        header("Location: 03-session-login.php");
        exit;
    } else {
        $error = "Usuari o contrasenya incorrectes.";
    }
}

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: 03-session-login.php");
    exit;
}
?>

<?php if (!isset($_SESSION["login"])): ?>
    <form method="post">
        Usuari: <input name="usuari"><br>
        Clau: <input type="password" name="clau"><br>
        <button>Iniciar sessió</button>
        <?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
    </form>
<?php else: ?>
    <p>Benvingut, <?= htmlspecialchars($_SESSION["usuari"]) ?>!</p>
    <a href="?logout=1">Tancar sessió</a>
<?php endif; ?>

