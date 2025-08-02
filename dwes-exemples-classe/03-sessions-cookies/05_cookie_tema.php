<?php
$tema = $_COOKIE['tema'] ?? 'clar';

if (isset($_GET['tema'])) {
    $tema = $_GET['tema'];
    setcookie('tema', $tema, time() + 86400); // 1 dia
    header("Location: 05_cookie_tema.php");
    exit;
}
?>

<body style="background-color: <?= $tema === 'fosc' ? '#222' : '#fff' ?>;
    color: <?= $tema === 'fosc' ? '#eee' : '#000' ?>;">
<h2>Preferència de tema: <?= htmlspecialchars($tema) ?></h2>

<a href="?tema=clar">Clar</a> |
<a href="?tema=fosc">Fosc</a>
</body>

