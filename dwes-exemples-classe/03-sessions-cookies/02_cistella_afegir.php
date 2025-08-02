<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["producte"])) {
    $_SESSION["cistella"][] = htmlspecialchars($_POST["producte"]);
    header("Location: 02_cistella_veure.php");
    exit;
}
?>

<h2>Afegir producte a la cistella</h2>
<form method="post">
    Producte: <input name="producte">
    <button>Afegir</button>
</form>

<p><a href="02_cistella_veure.php">Veure cistella</a></p>

