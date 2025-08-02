<?php
session_start();

if (!isset($_SESSION["visites"])) {
    $_SESSION["visites"] = 1;
} else {
    $_SESSION["visites"]++;
}

echo "<p>Has visitat esta pàgina " . $_SESSION["visites"] . " vegades.</p>";
?>

    <form method="post">
        <button name="reset" value="1">Reinicia</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["reset"])) {
    session_destroy();
    header("Location: 01-visites.php");
    exit;
}

