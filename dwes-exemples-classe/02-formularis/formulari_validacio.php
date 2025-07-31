<DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <title>Pujar Fitxer i Selecció Opció</title>
    </head>
    <body>

    <?php
    $nom = $email = "";
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validació del nom
        if (empty($_POST["nom"])) {
            $errors["nom"] = "El nom és obligatori.";
        } else {
            $nom = htmlspecialchars(trim($_POST["nom"]));
        }

        // Validació del correu electrònic
        if (empty($_POST["email"])) {
            $errors["email"] = "El correu és obligatori.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "El correu no és vàlid.";
        } else {
            $email = htmlspecialchars(trim($_POST["email"]));
        }

        // Si no hi ha errors, mostrar dades
        if (empty($errors)) {
            echo "<h2>Dades rebudes:</h2>";
            echo "<p>Nom: $nom</p>";
            echo "<p>Email: $email</p>";
            exit;
        }
    }
    ?>

    <h2>Formulari amb validació</h2>
    <form method="post">
        Nom: <input type="text" name="nom" value="<?= $nom ?>"><br>
        <?php if (isset($errors["nom"])): ?>
            <span style="color:red"><?= $errors["nom"] ?></span><br>
        <?php endif; ?>

        Correu: <input type="text" name="email" value="<?= $email ?>"><br>
        <?php if (isset($errors["email"])): ?>
            <span style="color:red"><?= $errors["email"] ?></span><br>
        <?php endif; ?>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
